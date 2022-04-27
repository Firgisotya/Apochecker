<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Http\Requests\StoreNewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('photo', 'like', '%' . 'img/latest-news' . '%')->get();
        $news1 = News::where('photo', 'like', 'news/' . '%')->get();
        if (News::where('photo', 'like', '%' . 'img/latest-news' . '%')->get()) {
        } else {
        }
        return view('admin.news.index', [
            'news' => News::latest()->paginate(10),
            'opt' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'required',
            'photo' => 'image|file',
        ]);
        $validateData['slug'] = Str::slug($request->title);
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 200);
        $validateData['user_id'] = auth()->user()->id;
        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('news', 'public');
        }
        News::create($validateData);
        return redirect('/admin/news')->with('success', 'News created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', [
            'news' => $news,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'photo' => 'image|file',
        ]);
        $validateData['slug'] = Str::slug($request->title);
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 200);
        $validateData['user_id'] = auth()->user()->id;
        if ($news->photo && file_exists(storage_path('app/public/' . $news->photo))) {
            Storage::delete('public/' . $news->photo);
        }
        $validateData['photo'] = $request->file('photo')->store('news', 'public');
        News::where('id', $news->id)->update($validateData);
        return redirect('/admin/news')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        News::where('id', $news->id)->delete();
        return redirect('/admin/news')->with('success', 'News deleted successfully');
    }
}
