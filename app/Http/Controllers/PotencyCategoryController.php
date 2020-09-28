<?php

namespace App\Http\Controllers;

use App\PotencyCategory;
use Illuminate\Http\Request;

class PotencyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = PotencyCategory::all();
        return view('kategoriPotensi', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formAddPotencyCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PotencyCategory();
        $data->name = $request->name;
        $data->save();
        if ($data) {
            return redirect('/potency-category');
        } else {
            return redirect('formAddPotencyCategory');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = PotencyCategory::find($id);
        return view('formEditPotencyCategory', ['data' => $data]);
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
        $data = PotencyCategory::find($id);
        $data->name = $request->name;
        $data->save();
        if ($data) {
            return redirect('/potency-category');
        } else {
            return redirect('formAddPotencyCategory');
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
        $data = PotencyCategory::find($id);
        $delete = $data->delete();
        if ($delete) {
            return redirect('/potency-category');
        } else {
            return redirect('/potency-category');
        }
    }

}
