<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//以下を追加でNews Model text23
use App\News;

class NewsController extends Controller
{
    // 以下を追加
    public function add()
    {
        return view('admin.news.create');
    }
    
    //以下を追記 text22
    public function create(Request $request)
    {
        
        // 以下を追記 text23
        // Varidationを行う
          $validatedData = $request->validate([
              'title' => 'required',
              'body' => 'required',
              'image' => 'image',
              ]);
              
              $news = new News();
              $news->title = $validatedData['title'];
              $news->body = $validatedData['body'];
              
              if (isset($validatedData['image'])) {
                  $path = $validatedData['image']->store('images');
                  $news->image_path = basename($path);
              }
              $news->save();
              return redirect('admin/news/create');
    }
}