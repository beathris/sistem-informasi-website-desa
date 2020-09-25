<?php

namespace App\Http\Controllers;

use App\Staff;
use App\StaffCategory;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Staff::with('staff_category')->get();
        return view('staff', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $data = StaffCategory::all();
        return view('formAddStaff', ['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $directory = 'assets/images/staff';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = new Staff();
        $data->name = $request->name;
        $data->birth_of_date = $request->birth_of_date;
        $data->birth_of_place = $request->birth_of_place;
        $data->address = $request->address;
        $data->position = $request->position;
        $data->staff_category_id = $request->staff_category_id;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if($data){
            return redirect('/staff');
        }else{
            return redirect('/staff/create');
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
        $data= Staff::where('id',$id)->with('staff_category')->first();
        $categories = StaffCategory::where('id', '!=', $data->staff_category_id)->get();
        return view('formEditStaff', ['data' => $data], ['categories' => $categories]);
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
        $directory = 'assets/images/staff';
        $file = $request->file('image');
        $file->move($directory, $file->getClientOriginalName());

        $data = Staff::find($id);
        $data->name = $request->name;
        $data->birth_of_date = $request->birth_of_date;
        $data->birth_of_place = $request->birth_of_place;
        $data->address = $request->address;
        $data->position = $request->position;
        $data->staff_category_id = $request->staff_category_id;
        $data->image = $directory . "/" . $file->getClientOriginalName();
        $data->save();
        if($data){
            return redirect('/staff');
        }else{
            return redirect('/staff/create');
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
        $data = Staff::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect('/staff');
        }else{
            return redirect('/staff/'.$id);
        }
    }
}
