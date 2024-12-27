<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->with('author')
            ->orderBy('id', 'desc')
            ->get();

        return view('panel.news.index', compact('news'));
    }

    public function create()
    {
        return view('panel.news.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $news = News::create($data);

        if ($request->has('image')) {
            $name = Str::random(10) . '.png';
            Storage::putFileAs('public/images/news', $request->image, $name);
            $news->image = $name;
            $news->update();
        }

        return redirect()->route('panel.news.index')->with('success', 'News created!');
    }

    public function edit(News $news)
    {
        return view('panel.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $news->update($data);

        if ($request->has('image')) {
            $name = Str::random(10) . '.png';
            Storage::putFileAs('public/images/news', $request->image, $name);
            $news->image = $name;
            $news->update();
        }

        return redirect()->route('panel.news.index')->with('success', 'News updated!');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('panel.news.index')->with('success', 'News deleted!');
    }
}
