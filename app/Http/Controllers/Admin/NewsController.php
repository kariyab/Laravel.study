<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //以下を追加
    public function add()
    {
        return view('admin.news.create');
    }
    
    //以下を追記 text22
    public function create(Request $request)
    {
        return redirect('admin/news/create');
    }
}