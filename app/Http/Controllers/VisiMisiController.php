<?php

namespace App\Http\Controllers;

use App\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = VisiMisi::all();
        return view('visiMisi', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('formAddVisiMisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vm = new VisiMisi();
        $vm->title = $request->title;
        $vm->category_name = $request->category_name;
        $vm->content = $request->Content;
        $vm->specific = $request->specific;
        $vm->save();
        if($vm){
            return redirect('/visi-misi');
        } else{
            return redirect('/visi-misi/create');
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
        $data = VisiMisi::find($id);
        return view('formEditVisiMisi', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $data = VisiMisi::find($id);
        $data->title = $request->title;
        $data->category_name = $request->category_name;
        $data->content = $request->Content;
        $data->specific = $request->specific;
        $data->save();
        if($data){
            return redirect('/visi-misi');
        } else{
            return redirect('/visi-misi'.$id.'/edit');
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
        $data = VisiMisi::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect('/visi-misi');
        }
    }
}
