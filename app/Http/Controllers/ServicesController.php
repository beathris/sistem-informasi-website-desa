<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Services::all();
        return view('services', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formAddService');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $directory = 'assets/images/service';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = new Services();
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->specific_content = $request->specific_content;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if($data){
            return redirect('/service');
        } else{
            return view('formAddService');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data  = Services::find($id);
        return view('formEditService', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $directory = 'assets/images/service';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = Services::find($id);
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->specific_content = $request->specific_content;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if($data){
            return redirect('/service');
        } else{
            return redirect('/service');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $data = Services::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect('/service');
        } else{
            return redirect('/service');
        }
    }
}
