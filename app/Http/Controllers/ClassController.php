<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassGenerate;
use App\Models\ClassInCompartment;
use App\Models\SpecialPrice;
use App\Models\Transport;
use Illuminate\Http\Request;

class ClassController extends Controller
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
            $classes = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->select('re_classes.*')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }else{
            $classes = Classes::orderBy('id', 'DESC')->paginate(10);
        }
        return view('transport_management.classes.index', compact('classes'));
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
        }else{
            $transports = Transport::get();
        }
        return view('transport_management.classes.create', compact('transports'));
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
            'color' => 'required',
            'transport_id' => 'required',
            'price' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;

        if($request->s_status == 1 && isset($request->start_date)){
            for($i = 0; $i < count($request->start_date); $i++){
                if($request->start_date[$i] == null && $request->end_date[$i] == null && $request->s_price[$i] == null){
                    $this->validate($request, [
                        'start_dates' => 'required',
                        'end_dates' => 'required',
                        's_prices' => 'required'
                    ]);
                }
            }
        }

        $insert = new Classes();
        $insert->name = $request->name;
        $insert->color = $request->color;
        $insert->seat_price = $request->price;
        if($role == 3){
            $transports = Transport::where('id','=',$request->transport_id)->where('author_id','=',$user_id)->count();
            if($transports > 0){
                $insert->transport_id = $request->transport_id;
            }else{
                $this->validate($request, [
                    'transport' => 'required'
                ],[
                    'transport.required' => 'You have given invalid transport.'
                ]);
            }
        }else{
            $insert->transport_id = $request->transport_id;
        }
        $insert->save();

        if($request->s_status == 1 && isset($request->start_date)){
            $class_id = Classes::orderBy('id','DESC')->first();

            for($i = 0; $i < count($request->start_date); $i++){
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $s_price = $request->s_price;

                $special_price = new SpecialPrice();
                $special_price->start_date = $start_date[$i];
                $special_price->end_date = $end_date[$i];
                $special_price->price = $s_price[$i];
                $special_price->class_id = $class_id->id;
                $special_price->save();
            }
        }

        return redirect()->route('class.index')->with('success','Class has been successfully created.');
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
            $class = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_classes.id','=',$id)
                ->select('re_classes.*')
                ->first();
            $transports = Transport::where('author_id','=',$user_id)->get();
        }else{
            $class = Classes::find($id);
            $transports = Transport::get();
        }
        $special_price = SpecialPrice::where('class_id', '=', $id)->orderBy('start_date', 'DESC')->paginate(5);
        return view('transport_management.classes.show', compact('class', 'special_price','transports'));
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
            $class = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_classes.id','=',$id)
                ->select('re_classes.*')
                ->first();
            $transports = Transport::where('author_id','=',$user_id)->get();
        }else{
            $class = Classes::find($id);
            $transports = Transport::get();
        }
        $today = date('Y-m-d');
        $special_price = SpecialPrice::where('start_date', '>=', $today)->where('class_id', '=', $id)->get();
        return view('transport_management.classes.edit', compact('class', 'special_price','transports'));
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
            'color' => 'required',
            'transport_id' => 'required',
            'price' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;

        if($request->s_status == 1 && isset($request->start_date)){
            for($i = 0; $i < count($request->start_date); $i++){
                if($request->start_date[$i] == null && $request->end_date[$i] == null && $request->s_price[$i] == null){
                    $this->validate($request, [
                        'start_dates' => 'required',
                        'end_dates' => 'required',
                        's_prices' => 'required'
                    ]);
                }
            }
        }

        $today = date('Y-m-d');
        if($role == 3){
            $insert = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_classes.id','=',$id)
                ->select('re_classes.id')
                ->first();
        }else{
            $insert = Classes::find($id);
        }

        $insert->name = $request->name;
        $insert->color = $request->color;
        $insert->seat_price = $request->price;
        if($role == 3){
            $transports = Transport::where('id','=',$request->transport_id)->where('author_id','=',$user_id)->count();
            if($transports > 0){
                $insert->transport_id = $request->transport_id;
            }else{
                $this->validate($request, [
                    'transport' => 'required'
                ],[
                    'transport.required' => 'You have given invalid transport.'
                ]);
            }
        }else{
            $insert->transport_id = $request->transport_id;
        }
        $insert->save();

        $special_price = SpecialPrice::where('start_date', '>=', $today)->where('class_id', '=', $id)->get();
        if($request->s_status != 1 && count($special_price) > 0){
            foreach($special_price as $s_price){
                SpecialPrice::find($s_price->id)->delete();
            }
        }

        if($request->s_status == 1 && isset($request->start_date)){
            foreach($special_price as $s_price){
                SpecialPrice::find($s_price->id)->delete();
            }

            for($i = 0; $i < count($request->start_date); $i++){
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $s_price = $request->s_price;

                $special_price = new SpecialPrice();
                $special_price->start_date = $start_date[$i];
                $special_price->end_date = $end_date[$i];
                $special_price->price = $s_price[$i];
                $special_price->class_id = $id;
                $special_price->save();
            }
        }

        return redirect()->route('class.index')->with('success','Class has been successfully updated.');
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
            $class = Classes::join('re_transport', 're_transport.id', 're_classes.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_classes.id','=',$id)
                ->select('re_classes.id')
                ->first();
            ClassInCompartment::where('class_id', '=', $class->id)->delete();
            ClassGenerate::where('class_id', '=', $class->id)->delete();
            SpecialPrice::where('class_id', '=', $class->id)->delete();
            $class->delete();
        }else{
            ClassInCompartment::where('class_id', '=', $id)->delete();
            ClassGenerate::where('class_id', '=', $id)->delete();
            SpecialPrice::where('class_id', '=', $id)->delete();
            Classes::find($id)->delete();
        }

        return redirect()->route('class.index')->with('success','Class has been successfully deleted.');
    }
}
