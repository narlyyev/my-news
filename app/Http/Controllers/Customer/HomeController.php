<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'desc')->paginate(4);

        if ($request->ajax()) {
            return view('customer.home.partials.news', compact('news'))->render();
        }

        return view('customer.home.index', compact('news'));
    }

    public function show(News $item)
    {
        return view('customer.home.show', compact('item'));
    }
}
