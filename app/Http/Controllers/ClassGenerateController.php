<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassGenerate;
use App\Models\Compartment;
use App\Models\Seat;
use Illuminate\Http\Request;

class ClassGenerateController extends Controller
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

        return view('transport_management.generate_class.index', compact('compartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
                ->select('re_compartments.*')
                ->first();
        }else{
            $compartment = Compartment::where('id', '=', $id)->first();
        }

        $classes = Classes::join('re_class_in_compartment', 're_classes.id', 're_class_in_compartment.class_id')
                            ->join('re_compartments', 're_compartments.id', 're_class_in_compartment.compartment_id')
                            ->where('re_class_in_compartment.compartment_id', '=', $id)
                            ->select('re_classes.*')
                            ->get();
        $total_seat = Compartment::where('id', '=', $id)->pluck('total_seat')->first();
        $seats = Seat::orderBy('id', 'ASC')->pluck('id')->take($total_seat);
        $class_in_seats = ClassGenerate::join('re_classes', 're_generate_seat.class_id', 're_classes.id')->where('compartment_id', '=', $id)->select('re_classes.color','re_generate_seat.seat_id','re_generate_seat.class_id')->get();
        return view('transport_management.generate_class.edit', compact('compartment','classes', 'seats', 'id','class_in_seats'));
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
        $class_values = explode('||', $request->class_val);

        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        if($role == 3){
            $compartment = Compartment::join('re_transport', 're_transport.id', 're_compartments.transport_id')
                ->where('re_transport.author_id','=',$user_id)
                ->where('re_compartments.id','=',$id)
                ->select('re_compartments.*')
                ->first();
        }else{
            $compartment = Compartment::where('id', '=', $id)->first();
        }

        if(isset($compartment->id)){
            ClassGenerate::where('compartment_id', '=', $compartment->id)->delete();
            foreach($class_values as $class_value){

                $id_val = explode('=>',$class_value);
                if(isset($id_val[1])){
                    $insert = new ClassGenerate();
                    $insert->class_id = $id_val[0];
                    $insert->seat_id = $id_val[1];
                    $insert->compartment_id = $compartment->id;
                    $insert->save();
                }
            }
        }else{
            $this->validate($request, [
                'compartment_id' => 'required'
            ],[
                'compartment_id.required' => 'You have generated invalid compartment!.'
            ]);
        }

        return redirect()->back()->with('success', 'Class generate successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
