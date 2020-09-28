<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Institution::all();
        return view('institution', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formAddInstitution');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Institution();
        $data->category = $request->category;
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->specific_content = $request->specific_content;
        $data->save();
        if($data){
            return redirect('/institution');
        }else{
            return view('formAddInstitution');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = Institution::find($id);
        return view('formEditInstitution', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Institution::find($id);
        $data->category = $request->category;
        $data->title = $request->title;
        $data->content = $request->contents;
        $data->specific_content = $request->specific_content;
        $data->save();
        if($data){
            return redirect('/institution');
        }else{
            return redirect('/institution/'.$id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Institution::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect('/institution');
        } else{
            return redirect('/institution');
        }
    }
}
