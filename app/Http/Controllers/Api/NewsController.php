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
            ->get([
                'id',
                'name',
                'image',
                'user_id'
            ]);

        return response()->json([
            'news' => $news
        ]);
    }

    public function show(News $item)
    {
        return response()->json([
            'item' => $item
        ]);
    }
}
