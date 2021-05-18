<?php

namespace App\Http\Controllers;

use App\Models\ClassGenerate;
use App\Models\ClassInCompartment;
use App\Models\Compartment;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;

class TransportController extends Controller
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
            $transports = Transport::where('author_id','=', $user_id)->orderBy('id', 'DESC')->paginate('10');
        }else{
            $transports = Transport::orderBy('id', 'DESC')->paginate('10');
        }
        return view('transport_management.transports.index', compact('transports'));
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
            $users = User::where('id','=',$user_id)->select('id', 'name')->get();
        }else{
            $users = User::select('id', 'name')->get();
        }

        return view('transport_management.transports.create', compact('users'));
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
            'name' => 'required|unique:re_transport',
            'author' => 'required'
        ]);

        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;
        $insert = new Transport();
        $insert->name = $request->name;

        if($role == 3){
            $insert->author_id = $user_id;
        }else{
            $insert->author_id = $request->author;
        }
        $insert->save();

        return redirect()->route('transports.index')->with('success', 'Transport has been successfully created.');
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
            $transport = Transport::where('id','=',$id)->where('author_id','=',$user_id)->first();
            $users = User::where('id','=',$user_id)->select('id', 'name')->get();
        }else{
            $transport = Transport::find($id);
            $users = User::select('id', 'name')->get();
        }
        return view('transport_management.transports.show', compact('transport','users'));
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
            $transport = Transport::where('id','=',$id)->where('author_id','=',$user_id)->first();
            $users = User::where('id','=',$user_id)->select('id', 'name')->get();
        }else{
            $users = User::select('id', 'name')->get();
            $transport = Transport::find($id);
        }

        return view('transport_management.transports.edit', compact('transport','users'));
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
            'name' => 'required|unique:re_transport,name,'. $id,
            'author' => 'required'
        ]);
        $user_id = auth()->user()->id;
        $role = auth()->user()->roles()->first()->id;

        if($role == 3){
            $insert = Transport::where('id','=',$id)->where('author_id','=',$user_id)->first();
        }else{
            $insert = Transport::find($id);
        }

        $insert->name = $request->name;
        if($role == 3){
            $insert->author_id = $user_id;
        }else{
            $insert->author_id = $request->author;
        }
        $insert->save();

        return redirect()->route('transports.index')->with('success', 'Transport has been successfully updated.');
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
            $transport = Transport::where('id','=',$id)->where('author_id','=',$user_id)->first();
            ClassGenerate::join('re_compartments', 're_compartments.id', 're_generate_seat.compartment_id')
                ->where('re_compartments.transport_id', '=', $transport->id)
                ->delete();
            ClassInCompartment::join('re_compartments', 're_compartments.id', 're_class_in_compartment.compartment_id')
                ->where('re_compartments.transport_id', '=', $transport->id)
                ->delete();
            Compartment::where('transport_id', '=', $transport->id)->delete();
            $transport->delete();
        }else{
            ClassGenerate::join('re_compartments', 're_compartments.id', 're_generate_seat.compartment_id')
                ->where('re_compartments.transport_id', '=', $id)
                ->delete();
            ClassInCompartment::join('re_compartments', 're_compartments.id', 're_class_in_compartment.compartment_id')
                ->where('re_compartments.transport_id', '=', $id)
                ->delete();
            Compartment::where('transport_id', '=', $id)->delete();
            Transport::find($id)->delete();
        }

        return redirect()->route('transports.index')->with('success', 'Transport has been successfully deleted.');

    }
}
