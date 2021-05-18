<?php

namespace App\Http\Controllers;

use App\Models\ClassGenerate;
use App\Models\ClassInCompartment;
use App\Models\Compartment;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    // this controller added By Reyajul
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::orderBy('id', 'DESC')->paginate('10');
        return view('transport_management.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transport_management.routes.create');
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
            'name' => 'required'
        ]);

        $insert = new Route();
        $insert->name = $request->name;
        $insert->save();

        return redirect()->route('routes.index')->with('success', 'Route has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = Route::find($id);
        return view('transport_management.routes.show', compact('route'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = Route::find($id);
        return view('transport_management.routes.edit', compact('route'));
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
            'name' => 'required'
        ]);

        $insert = Route::find($id);
        $insert->name = $request->name;
        $insert->save();

        return redirect()->route('routes.index')->with('success', 'Route has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassGenerate::join('re_compartments', 're_compartments.id', 're_generate_seat.compartment_id')
            ->where('re_compartments.route_start', '=', $id)
            ->orWhere('re_compartments.route_end', '=', $id)
            ->delete();
        ClassInCompartment::join('re_compartments', 're_compartments.id', 're_class_in_compartment.compartment_id')
            ->where('re_compartments.route_start', '=', $id)
            ->orWhere('re_compartments.route_end', '=', $id)
            ->delete();
        Compartment::where('route_start', '=', $id)->orWhere('route_end', '=', $id)->delete();

        Route::find($id)->delete();

        return redirect()->route('routes.index')->with('success', 'Route has been successfully deleted.');
    }
}
