<?php

namespace App\Http\Controllers;

use App\Models\BusSchedule;
use Illuminate\Http\Request;
use App\Http\Requests\BusScheduleStoreRequest;
use App\Http\Requests\BusScheduleUpdateRequest;

class BusScheduleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BusSchedule::class);

        $search = $request->get('search', '');

        $busSchedules = BusSchedule::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.bus_schedules.index',
            compact('busSchedules', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BusSchedule::class);

        return view('app.bus_schedules.create');
    }

    /**
     * @param \App\Http\Requests\BusScheduleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusScheduleStoreRequest $request)
    {
        $this->authorize('create', BusSchedule::class);

        $validated = $request->validated();

        $busSchedule = BusSchedule::create($validated);

        return redirect()
            ->route('bus-schedules.edit', $busSchedule)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusSchedule $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BusSchedule $busSchedule)
    {
        $this->authorize('view', $busSchedule);

        return view('app.bus_schedules.show', compact('busSchedule'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusSchedule $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BusSchedule $busSchedule)
    {
        $this->authorize('update', $busSchedule);

        return view('app.bus_schedules.edit', compact('busSchedule'));
    }

    /**
     * @param \App\Http\Requests\BusScheduleUpdateRequest $request
     * @param \App\Models\BusSchedule $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(
        BusScheduleUpdateRequest $request,
        BusSchedule $busSchedule
    ) {
        $this->authorize('update', $busSchedule);

        $validated = $request->validated();

        $busSchedule->update($validated);

        return redirect()
            ->route('bus-schedules.edit', $busSchedule)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusSchedule $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BusSchedule $busSchedule)
    {
        $this->authorize('delete', $busSchedule);

        $busSchedule->delete();

        return redirect()
            ->route('bus-schedules.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
