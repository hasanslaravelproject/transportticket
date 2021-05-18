<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use Illuminate\Http\Request;
use App\Http\Requests\BusRouteStoreRequest;
use App\Http\Requests\BusRouteUpdateRequest;

class BusRouteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BusRoute::class);

        $search = $request->get('search', '');

        $busRoutes = BusRoute::search($search)
            ->latest()
            ->paginate(5);

        return view('app.bus_routes.index', compact('busRoutes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BusRoute::class);

        return view('app.bus_routes.create');
    }

    /**
     * @param \App\Http\Requests\BusRouteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRouteStoreRequest $request)
    {
        $this->authorize('create', BusRoute::class);

        $validated = $request->validated();

        $busRoute = BusRoute::create($validated);

        return redirect()
            ->route('bus-routes.edit', $busRoute)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BusRoute $busRoute)
    {
        $this->authorize('view', $busRoute);

        return view('app.bus_routes.show', compact('busRoute'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BusRoute $busRoute)
    {
        $this->authorize('update', $busRoute);

        return view('app.bus_routes.edit', compact('busRoute'));
    }

    /**
     * @param \App\Http\Requests\BusRouteUpdateRequest $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function update(BusRouteUpdateRequest $request, BusRoute $busRoute)
    {
        $this->authorize('update', $busRoute);

        $validated = $request->validated();

        $busRoute->update($validated);

        return redirect()
            ->route('bus-routes.edit', $busRoute)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BusRoute $busRoute)
    {
        $this->authorize('delete', $busRoute);

        $busRoute->delete();

        return redirect()
            ->route('bus-routes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
