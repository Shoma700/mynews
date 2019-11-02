<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use APP\Profile_history;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
      return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        //varidate関数を使用して、&requestの中の情報にProfileモデルの$rulesに当てはまるものがあれば適用する
        $this->validate($request, Profile::$rules);
        //$profilesという変数をProfileモデルの新規レコードとする
        $profile = new Profile;
        //$formという変数に$requestのすべてを代入する（'name','gender','hobby','introduction','_token'）
        $form = $request->all();
        //dump($request);
        //dump($form);        
        //送信されてきた$form内の'_token'を削除する
        unset($form['_token']);
        //データベースに保存する
        $profile->fill($form);
        $profile->save();
        //dump($form);     
        return redirect('admin/profile/create');
    }
    
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            //検索されたら検索結果を取得する
            $posts = Profile::where('name', $cond_name)->get();
        } else {
            //それ以外はすべてニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }

    public function edit(Request $request)
    {
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        //dump($profiles);
        if (empty($profile)) {
        abort(404);    
        }
        return view('admin.profile.edit', ['profiles_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        // dd($profile_form);
        unset($profile_form['_token']);
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        //17章追記
        $profile_history = new Profile_history;
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        
        //前回から変更があったら「前回より変更有」なければ「前回より変更無」としたい・・・
        //もしくは頭5文字とか
        $profile_history->edited_name = $profile->name;
        $profile_history->edited_gender = $profile->gender;
        $profile_history->edited_hobby = $profile->hobby;
        $profile_history->edited_introduction = $profile->introduction;
        
        $profile_history->save();
        
        return redirect('admin/profile/');
    }
    

    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $profile = Profile::find($request->id);
        // 削除する
        $profile -> delete();
        return redirect('admin/profile/');
        }
}