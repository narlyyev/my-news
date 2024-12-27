<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $news = News::limit(5)->get();
        $newsTitles = $news->pluck('title');
        $descriptionLengths = $news->map(fn($item) => strlen($item->description));

        $authors = User::withCount('news')->orderBy('news_count', 'desc')->get();
        $authorNames = $authors->pluck('username');
        $newsCounts = $authors->pluck('news_count');

        if (auth()->user()->role === 'admin') {
            return view('panel.index', compact('newsTitles', 'descriptionLengths', 'authorNames', 'newsCounts'));
        } else {
            $news = News::orderBy('id', 'desc')->get();

            return view('panel.news.index', compact('news'));
        }
    }
}
