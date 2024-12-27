<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->with('author')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'news' => $news
        ]);
    }
}
