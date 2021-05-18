<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassGenerate;
use App\Models\ClassInCompartment;
use App\Models\Compartment;
use App\Models\CompartmentSchedule;
use App\Models\Route;
use App\Models\Seat;
use App\Models\Transport;
use Illuminate\Http\Request;

class CompartmentController extends Controller
{
    // this controller added By Reyajul
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        if($role == 3){
            $compartments = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->select('re_compartments.*','re_transport.name as transport_name')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }else{
            $compartments = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->select('re_compartments.*','re_transport.name as transport_name')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
        return view('transport_management.compartments.index', compact('compartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        if($role == 3){
            $transports = Transport::where('author_id','=',$user_id)->get();
            $classes = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->select('re_classes.*')
                ->get();
        }else{
            $transports = Transport::get();
            $classes = Classes::get();
        }
        $routes = Route::get();
        return view('transport_management.compartments.create', compact('transports', 'classes', 'routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'total_seat' => 'required',
            'class' => 'required',
            'transport' => 'required',
            'route_start' => 'required',
            'route_end' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;

        $insert = new Compartment();
        $insert->name = $request->name;
        $insert->total_seat = $request->total_seat;
        $insert->total_class = count($request->class);
        if($role == 3){
            $transports = Transport::where('id','=',$request->transport)->where('author_id','=',$user_id)->count();
            if($transports > 0){
                $insert->transport_id = $request->transport;
            }else{
                $this->validate($request, [
                    'transport_id' => 'required'
                ],[
                    'transport_id.required' => 'You have given invalid transport.'
                ]);
            }
        }else{
            $insert->transport_id = $request->transport;
        }
        $insert->save();

        $compartment_id = Compartment::orderBy('id','DESC')->first();

        foreach($request->class as $class_id){
            if($role == 3){
                $classes = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                    ->where('re_transport.author_id','=',$user_id)
                    ->where('re_classes.id','=',$class_id)
                    ->count();
                if($classes > 0){
                    $class_in_compartment = new ClassInCompartment();
                }else{
                    ClassInCompartment::where('compartment_id','=',$compartment_id->id)->delete();
                    $compartment_id->delete();
                    $this->validate($request, [
                        'classes' => 'required'
                    ],[
                        'classes.required' => 'You have selected invalid class.'
                    ]);
                }
            }else{
                $class_in_compartment = new ClassInCompartment();
            }
            $class_in_compartment->class_id = $class_id;
            $class_in_compartment->compartment_id = $compartment_id->id;
            $class_in_compartment->save();
        }

        foreach($request->route_start as $key => $route_start){
            $insert_schedule = new CompartmentSchedule();
            $insert_schedule->route_start = $route_start;
            $insert_schedule->route_end = $request->route_end[$key];
            $insert_schedule->start_date = $request->start_date[$key];
            $insert_schedule->end_date = $request->end_date[$key];
            $insert_schedule->start_time = $request->start_time[$key];
            $insert_schedule->end_time = $request->end_time[$key];
            $insert_schedule->compartment_id = $compartment_id->id;
            $insert_schedule->save();
        }

        $seats = Seat::count();
        if($seats < $request->total_seat){
            $new_seat = (($request->total_seat) - $seats);

            for($i = 0; $i < $new_seat; $i++ ){
                $insert_seat = new Seat();
                $insert_seat->title = 'seats';
                $insert_seat->save();
            }
        }

        return redirect()->route('compartments.index')->with('success', 'Compartment has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        if($role == 3){
            $compartment = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_compartments.id','=',$id)
                ->select('re_compartments.*','re_transport.name as transport_name')
                ->first();
            $transports = Transport::where('author_id','=',$user_id)->get();
            $classes = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->select('re_classes.*')
                ->get();
        }else{
            $compartment = Compartment::find($id);
            $transports = Transport::get();
            $classes = Classes::get();
        }

        $class_in_compartment = ClassInCompartment::where('compartment_id', '=', $id)->pluck('class_id')->toArray();
        $routes = Route::get();
        $schedules = CompartmentSchedule::join('re_compartments', 're_compartment_schedules.compartment_id','re_compartments.id')
            ->where('re_compartment_schedules.compartment_id', '=', $id)
            ->get();
        return view('transport_management.compartments.show', compact('transports', 'classes', 'compartment', 'class_in_compartment', 'routes', 'schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        if($role == 3){
            $compartment = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_compartments.id','=',$id)
                ->select('re_compartments.*','re_transport.name as transport_name')
                ->first();
            $transports = Transport::where('author_id','=',$user_id)->get();
            $classes = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->select('re_classes.*')
                ->get();
        }else{
            $compartment = Compartment::find($id);
            $transports = Transport::get();
            $classes = Classes::get();
        }
        $class_in_compartment = ClassInCompartment::where('compartment_id', '=', $id)->pluck('class_id')->toArray();
        $routes = Route::get();
        $schedules = CompartmentSchedule::join('re_compartments', 're_compartment_schedules.compartment_id','re_compartments.id')
                                    ->where('re_compartment_schedules.compartment_id', '=', $id)
                                    ->get();
        return view('transport_management.compartments.edit', compact('transports', 'classes', 'compartment', 'class_in_compartment','routes','schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'total_seat' => 'required',
            'class' => 'required',
            'transport' => 'required',
            'route_start' => 'required',
            'route_end' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'end_date' => 'required',
            'end_time' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;

        if($role == 3){
            $insert = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_compartments.id','=',$id)
                ->select('re_compartments.id')
                ->first();
        }else{
            $insert = Compartment::find($id);
        }

        $insert->name = $request->name;
        $insert->total_seat = $request->total_seat;
        $insert->total_class = count($request->class);
        $insert->transport_id = $request->transport;
        if($role == 3){
            $transports = Transport::where('id','=',$request->transport)->where('author_id','=',$user_id)->count();
            if($transports > 0){
                $insert->transport_id = $request->transport;
            }else{
                $this->validate($request, [
                    'transport_id' => 'required'
                ],[
                    'transport_id.required' => 'You have given invalid transport.'
                ]);
            }
        }else{
            $insert->transport_id = $request->transport;
        }
        $insert->save();

        $classes_old = ClassInCompartment::where('compartment_id', '=', $id)->delete();
        foreach($request->class as $class_id){
            if($role == 3){
                $classes = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                    ->where('re_transport.author_id','=',$user_id)
                    ->where('re_classes.id','=',$class_id)
                    ->count();
                if($classes > 0){
                    $class_in_compartment = new ClassInCompartment();
                }else{
                    $this->validate($request, [
                        'classes' => 'required'
                    ],[
                        'classes.required' => 'You have selected some invalid class.'
                    ]);
                }
            }else{
                $class_in_compartment = new ClassInCompartment();
            }
            $class_in_compartment->class_id = $class_id;
            $class_in_compartment->compartment_id = $id;
            $class_in_compartment->save();
        }

        CompartmentSchedule::where('compartment_id', '=', $id)->delete();
        foreach($request->route_start as $key => $route_start){
            $insert_schedule = new CompartmentSchedule();
            $insert_schedule->route_start = $route_start;
            $insert_schedule->route_end = $request->route_end[$key];
            $insert_schedule->start_date = $request->start_date[$key];
            $insert_schedule->end_date = $request->end_date[$key];
            $insert_schedule->start_time = $request->start_time[$key];
            $insert_schedule->end_time = $request->end_time[$key];
            $insert_schedule->compartment_id = $id;
            $insert_schedule->save();
        }

        $seats = Seat::count();
        if($seats < $request->total_seat){
            $new_seat = (($request->total_seat) - $seats);

            for($i = 0; $i < $new_seat; $i++ ){
                $insert_seat = new Seat();
                $insert_seat->title = 'seats';
                $insert_seat->save();
            }
        }

        return redirect()->route('compartments.index')->with('success', 'Compartment has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        if($role == 3){
            $compartment = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_compartments.id','=',$id)
                ->select('re_compartments.id')
                ->first();
            ClassGenerate::where('compartment_id', '=', $compartment->id)->delete();
            ClassInCompartment::where('compartment_id', '=', $compartment->id)->delete();
            CompartmentSchedule::where('compartment_id', '=', $compartment->id)->delete();
            $compartment->delete();
        }else{
            ClassGenerate::where('compartment_id', '=', $id)->delete();
            ClassInCompartment::where('compartment_id', '=', $id)->delete();
            CompartmentSchedule::where('compartment_id', '=', $id)->delete();
            Compartment::find($id)->delete();
        }

        return redirect()->route('compartments.index')->with('success', 'Compartment has been successfully deleted.');
    }
}
