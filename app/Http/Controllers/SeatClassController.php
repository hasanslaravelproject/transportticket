<?php

namespace App\Http\Controllers;

use App\Models\SeatClass;
use Illuminate\Http\Request;
use App\Http\Requests\SeatClassStoreRequest;
use App\Http\Requests\SeatClassUpdateRequest;

class SeatClassController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SeatClass::class);

        $search = $request->get('search', '');

        $seatClasses = SeatClass::search($search)
            ->latest()
            ->paginate(5);

        return view('app.seat_classes.index', compact('seatClasses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', SeatClass::class);

        return view('app.seat_classes.create');
    }

    /**
     * @param \App\Http\Requests\SeatClassStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatClassStoreRequest $request)
    {
        $this->authorize('create', SeatClass::class);

        $validated = $request->validated();

        $seatClass = SeatClass::create($validated);

        return redirect()
            ->route('seat-classes.edit', $seatClass)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SeatClass $seatClass
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SeatClass $seatClass)
    {
        $this->authorize('view', $seatClass);

        return view('app.seat_classes.show', compact('seatClass'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SeatClass $seatClass
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SeatClass $seatClass)
    {
        $this->authorize('update', $seatClass);

        return view('app.seat_classes.edit', compact('seatClass'));
    }

    /**
     * @param \App\Http\Requests\SeatClassUpdateRequest $request
     * @param \App\Models\SeatClass $seatClass
     * @return \Illuminate\Http\Response
     */
    public function update(
        SeatClassUpdateRequest $request,
        SeatClass $seatClass
    ) {
        $this->authorize('update', $seatClass);

        $validated = $request->validated();

        $seatClass->update($validated);

        return redirect()
            ->route('seat-classes.edit', $seatClass)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SeatClass $seatClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SeatClass $seatClass)
    {
        $this->authorize('delete', $seatClass);

        $seatClass->delete();

        return redirect()
            ->route('seat-classes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
