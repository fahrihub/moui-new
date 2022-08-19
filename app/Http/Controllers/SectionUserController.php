<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserShowResource;

class SectionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Section $section)
    {
        return new UserCollection(
            $section->users()
                ->sectionOnly()
                ->filter($request->filters)
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section)
    {
        $this->validate($request, []);

        return User::storeRecord($request, $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, User $user)
    {
        return new UserShowResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section, User $user)
    {
        $this->validate($request, []);

        return User::updateRecord($user, $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Section $section, User $user)
    {
        $this->validate($request, []);

        return User::destroyRecord($section, $user);
    }
}
