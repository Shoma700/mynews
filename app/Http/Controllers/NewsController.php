<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        if (count($posts) > 0)
        {
            $headline = $posts->shift();//shiftメソッドはコレクションから最初のアイテムを削除し、その値を返す
        }else{
            $headline = null;
        }
        //news/index.blade.php ファイルを渡している
        //またViewテンプレートにheadline、postsという変数を渡している
        return view('news.index',['headline' => $headline, 'posts' => $posts]);
    }
}
