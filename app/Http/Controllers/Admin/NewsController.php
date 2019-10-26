<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下を追加でNews Model text23
use App\News;

class NewsController extends Controller
{
    // 以下を追加
    public function add()
    {
        return view('admin.news.create');
    }
    
    // 以下を追記 text22
    public function create(Request $request)
    {
        
        // 以下を追記 text23
        // Varidationを行う
        // 以下text25に合わせて書き直し
      $this->validate($request, News::$rules);
      
      $news = new News;
      $form = $request->all();

      // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $news->fill($form);
      $news->save();

        // ここまでtext25修正
        
      return redirect('admin/news/create');
    }
  // 以下を追記 text25
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = News::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = News::all();
      }
      return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  // 以下を追記text26
  
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = News::find($request->id);

      return view('admin.news.edit', ['news_form' => $news]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, News::$rules);
      // News Modelからデータを取得する
      $news = News::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      unset($news_form['_token']);

      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/news/');
  }

  // 以下を追記　　
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $news = News::find($request->id);
      // 削除する
      $news->delete();
      return redirect('admin/news/');
  }


}