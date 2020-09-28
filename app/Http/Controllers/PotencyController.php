<?php

namespace App\Http\Controllers;

use App\Potency;
use App\PotencyCategory;
use Illuminate\Http\Request;

class PotencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Potency::with('potency_category')->get();
        return view('potency', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = PotencyCategory::all();
        return view('formAddPotency', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $directory = 'assets/images/potency';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = new Potency();
        $data->potency_category_id = $request->potency_category_id;
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if ($data) {
            return redirect('/potency');
        } else {
            return view('formAddPotency');
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
        $data = Potency::where('id', $id)->with('potency_category')->first();
        $categories = PotencyCategory::where('id', '!=', $data->potency_category->id)->get();
        return view('formEditPotency', ['data' => $data, 'categories' => $categories]);
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
        $directory = 'assets/images/potency';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = Potency::find($id);
        $data->potency_category_id = $request->potency_category_id;
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if ($data) {
            return redirect('/potency');
        } else {
            return view('/potency');
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
        $data = Potency::find($id);
        $delete = $data->delete();
        if ($delete) {
            return redirect('/potency');
        } else {
            return redirect('/potency');
        }
    }
}
