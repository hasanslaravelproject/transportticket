<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Requests\BusStoreRequest;
use App\Http\Requests\BusUpdateRequest;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Bus::class);

        $search = $request->get('search', '');

        $buses = Bus::search($search)
            ->latest()
            ->paginate(5);

        return view('app.buses.index', compact('buses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Bus::class);

        return view('app.buses.create');
    }

    /**
     * @param \App\Http\Requests\BusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusStoreRequest $request)
    {
        $this->authorize('create', Bus::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $bus = Bus::create($validated);

        return redirect()
            ->route('buses.edit', $bus)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Bus $bus)
    {
        $this->authorize('view', $bus);

        return view('app.buses.show', compact('bus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Bus $bus)
    {
        $this->authorize('update', $bus);

        return view('app.buses.edit', compact('bus'));
    }

    /**
     * @param \App\Http\Requests\BusUpdateRequest $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function update(BusUpdateRequest $request, Bus $bus)
    {
        $this->authorize('update', $bus);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($bus->image) {
                Storage::delete($bus->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $bus->update($validated);

        return redirect()
            ->route('buses.edit', $bus)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bus $bus)
    {
        $this->authorize('delete', $bus);

        if ($bus->image) {
            Storage::delete($bus->image);
        }

        $bus->delete();

        return redirect()
            ->route('buses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
