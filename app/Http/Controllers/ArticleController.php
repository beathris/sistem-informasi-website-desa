<?php

namespace App\Http\Controllers;

use App\Article;
use App\NewsCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $article = Article::with('news_category')->get();
        return view('article', ['data' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category = NewsCategory::all();
        return view('formAddArticle', ['data' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $directory = 'assets/images/article';
            $file = $request->file('image');
            $file->move($directory, $file->getClientOriginalName());

            $data = new Article();
            $data->title = $request->title;
            $data->news_category_id = $request->news_category_id;
            $data->author = auth()->user()->name;
            $data->visitor = $request->visitor;
            $data->article = $request->article;
            $data->image = $directory . "/" . $file->getClientOriginalName();
            $data->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('/article');
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
        $article = Article::where('id', $id)->with('news_category')->first();
        $categories = NewsCategory::where('id', '!=', $article['news_category_id'])->get();
        return view('formEditArticle', ['data' => $article, 'categories' => $categories]);
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
        try {
            $directory = 'assets/images/article';
            $file = $request->file('image');
            $file->move($directory, $file->getClientOriginalName());

            $data = Article::find($id);
            $data->title = $request->title;
            $data->news_category_id = $request->news_category_id;
            $data->author = auth()->user()->name;
            $data->visitor = $request->visitor;
            $data->article = $request->article;
            $data->image = $directory . "/" . $file->getClientOriginalName();
            $data->save();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $data = Article::find($id);
            $data->delete();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect('/article');
    }
}
