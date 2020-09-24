<?php

namespace App\Http\Controllers;

use App\History;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SejarahDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     * @return  View
     */
    public function index()
    {
        $data = History::all();
        return view('sejarahDesa', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('formAddSejarahDesa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $directory = 'assets/images/sejarah_desa';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = new History();
        $data->title = $request->title;
        $data->author = auth()->user()->name;
        $data->visitor = $request->visitor;
        $data->history = $request->history;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if($data){
            return redirect('/sejarah-desa');
        }else{
            return redirect('/sejarah-desa/create');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $data = History::find($id);
        return view('formEditSejarahDesa', ['data'=>$data]);
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
        $directory = 'assets/images/sejarah_desa';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = History::find($id);
        $data->title = $request->title;
        $data->author = auth()->user()->name;
        $data->visitor = $request->visitor;
        $data->history = $request->history;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if($data){
            return redirect('/sejarah-desa');
        }else{
            return redirect('/sejarah-desa/'.$id.'/edit');
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
        $data = History::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect('/sejarah-desa');
        } else{
            return redirect('/sejarah-desa');
        }
    }
}
