<?php

namespace App\Http\Controllers;

use App\Models\BusCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BusCategoryStoreRequest;
use App\Http\Requests\BusCategoryUpdateRequest;

class BusCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BusCategory::class);

        $search = $request->get('search', '');

        $busCategories = BusCategory::search($search)
            ->latest()
            ->paginate(5);

        return view(
            'app.bus_categories.index',
            compact('busCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', BusCategory::class);

        return view('app.bus_categories.create');
    }

    /**
     * @param \App\Http\Requests\BusCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusCategoryStoreRequest $request)
    {
        $this->authorize('create', BusCategory::class);

        $validated = $request->validated();

        $busCategory = BusCategory::create($validated);

        return redirect()
            ->route('bus-categories.edit', $busCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusCategory $busCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BusCategory $busCategory)
    {
        $this->authorize('view', $busCategory);

        return view('app.bus_categories.show', compact('busCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusCategory $busCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BusCategory $busCategory)
    {
        $this->authorize('update', $busCategory);

        return view('app.bus_categories.edit', compact('busCategory'));
    }

    /**
     * @param \App\Http\Requests\BusCategoryUpdateRequest $request
     * @param \App\Models\BusCategory $busCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        BusCategoryUpdateRequest $request,
        BusCategory $busCategory
    ) {
        $this->authorize('update', $busCategory);

        $validated = $request->validated();

        $busCategory->update($validated);

        return redirect()
            ->route('bus-categories.edit', $busCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusCategory $busCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BusCategory $busCategory)
    {
        $this->authorize('delete', $busCategory);

        $busCategory->delete();

        return redirect()
            ->route('bus-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
