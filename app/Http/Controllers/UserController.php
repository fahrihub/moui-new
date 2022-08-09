<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Section;
use App\Models\SubSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserShowResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Section $section, Subsection $subsection)
    {
        return new UserCollection(
            $subsection->users()->filter($request->filters)
                ->applyMode($request->mode)
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
    public function store(Request $request, Section $section, Subsection $subsection)
    {
        $this->validate($request, []);

        return User::storeRecord($request, $subsection);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Subsection $subsection, User $user)
    {
        return new UserShowResource($subsection, $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, []);

        return User::updateRecord($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->validate($request, []);

        return User::destroyRecord($user);
    }

    public function getUser(Request $request)
    {
        return response()->json([
            'is_administrator' => is_null($request->user()->section_id) && is_null($request->user()->subsection_id),

        ]);
    }
}
