<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $home = Home::all();
        return view('index_user', ['home' => $home]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('formAddDashboard');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        if ($request->method() == "POST") {
            $directory = 'assets/images/home';
            $file = $request->file('image');
            $file->move($directory, $file->getClientOriginalName());


            $home = new Home;
            $home->title = $request->title;
            $home->author = auth()->user()->name;
            $home->visitor = $request->visitor;
            $home->description = $request->description;
            $home->image = $directory . "/" . $file->getClientOriginalName();
            $home->save();
            return redirect('/dashboard');
        } else {
            return redirect('/dashboard');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $home = Home::find($id);
        return view('formEditDashboard', ['home' => $home]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $directory = 'assets/images/home';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());


        $home = Home::find($id);
        $home->title = $request->title;
        $home->author = auth()->user()->name;
        $home->visitor = $request->visitor;
        $home->description = $request->description;
        $home->image = $directory . "/" . $file->getClientOriginalName();
        $home->save();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $home = Home::find($id);
        $hapus = $home->delete();
        if($hapus){
            return redirect('/dashboard');
        }
    }
}
