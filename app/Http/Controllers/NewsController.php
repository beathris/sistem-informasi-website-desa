<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('news', ['data' => News::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('formAddNews', ['data' => NewsCategory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $directory = 'assets/images/news';
            $file = $request->file('image');
            $file->move($directory, $file->getClientOriginalName());

            $data = new News();
            $data->title = $request->title;
            $data->news_category_id = $request->news_category_id;
            $data->author = auth()->user()->name;
            $data->visitor = $request->visitor;
            $data->content = $request->Content;
            $data->image = $directory . "/" . $file->getClientOriginalName();
            $data->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('/news');
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
        $news = News::where('id', $id)->with('news_category')->first();
        $categories = NewsCategory::where('id', '!=', $news['news_category_id'])->get();
        return view('formEditNews', ['data' => $news, 'categories' =>$categories]);
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
        try {
            $directory = 'assets/images/news';
            $file = $request->file('image');
            $file->move($directory, $file->getClientOriginalName());

            $data = News::find($id);
            $data->title = $request->title;
            $data->author = auth()->user()->name;
            $data->visitor = $request->visitor;
            $data->content = $request->Content;
            $data->image = $directory . "/" . $file->getClientOriginalName();
            $data->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $data = News::find($id);
            $data->delete();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('/news');
    }
}
