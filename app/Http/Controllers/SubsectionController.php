<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subsection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubsectionCollection;
use App\Http\Resources\SubsectionShowResource;

class SubsectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Section $section)
    {
        return new SubsectionCollection(
            $section->subsections()->filter($request->filters)
                ->search($request->findBy)
                ->sortBy($request->sortBy, $request->sortDesc)
                ->paginate($request->itemsPerPage)
                ->appends([
                    'sortBy' => $request->sortBy,
                    'sortDesc' => $request->sortDesc,
                    'findBy' => $request->findBy,
                    'findOn' => $request->findOn,
                    'filters' => $request->filters,
                ])
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section)
    {
        $this->validate($request, []);

        return Subsection::storeRecord($request, $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, Subsection $subsection)
    {
        return new SubsectionShowResource($section, $subsection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subsection $subsection)
    {
        $this->validate($request, []);

        return Subsection::updateRecord($subsection);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subsection  $subsection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Section $section, Subsection $subsection)
    {
        $this->validate($request, []);

        return Subsection::destroyRecord($subsection, $section);
    }
}
