<?php

namespace App\Http\Controllers;

use App\AdministrationArea;
use Illuminate\Http\Request;

class AdministrationAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('administrationArea', ['data'=> AdministrationArea::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formAddAdministrationArea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $admin = new AdministrationArea();
        $admin->dusun_name = $request->dusun_name;
        $admin->kasun_name = $request->kasun_name;
        $admin->neighborhood_association = $request->neighborhood_association;
        $admin->family = $request->family;
        $admin->amount_of_people = $request->amount_of_people;
        $admin->female = $request->female;
        $admin->male = $request->male;
        $admin->save();
        if ($admin) {
            return redirect('/administration-area');
        } else {
            return view('formAddInstitution');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(AdministrationArea::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = AdministrationArea::find($id);
        return view('formEditAdministrationArea', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $admin = AdministrationArea::find($id);
        $admin->dusun_name = $request->dusun_name;
        $admin->kasun_name = $request->kasun_name;
        $admin->neighborhood_association = $request->neighborhood_association;
        $admin->family = $request->family;
        $admin->amount_of_people = $request->amount_of_people;
        $admin->female = $request->female;
        $admin->male = $request->male;
        $admin->save();
        if ($admin) {
            return redirect('/administration-area');
        } else {
            return redirect('/administration-area');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $admin = AdministrationArea::find($id);
        $delete = $admin->delete();
        if ($delete) {
            return redirect('/administration-area');
        } else {
            return redirect('/administration-area');
        }
    }
}
