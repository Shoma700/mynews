<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/aaa', function () {
// テスト
    echo DNS1D::getBarcodeHTML("1300013501754","EAN13");
    echo "_";
    echo DNS2D::getBarcodeHTML("123456789012","QRCODE");
    //return view('welcome');
    
});

// Route::get('/a', function () {
//     echo DNS1D::getBarcodeHTML("9999999999999","EAN13");
// });

//

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/bbb', function() {
    return view('admin.news.create');
});


//news
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create'); //13章追記
    Route::get('news', 'Admin\NewsController@index'); //15章追記
    Route::get('news/edit', 'Admin\NewsController@edit'); //16章追記
    Route::post('news/edit', 'Admin\NewsController@update'); //16章追記
    Route::get('news/delete', 'Admin\NewsController@delete');
});

//profile
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/cleate', 'Admin\ProfileController@create'); //13章課題追記
    Route::get('profile', 'Admin\ProfileController@index');
    Route::get('profile/edit', 'Admin\ProfileController@edit'); //13章課題追加
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    //Route::get('/apiview', 'Api\NewsController@apiview');
});

//news_front
Route::get('/', 'NewsController@index');

//profiles_front
Route::get('profile', 'ProfileController@index');


Route::get('/apiview', 'Api\NewsController@apiview');






//ルーティングとコントローラー：PHPフレームワークLaravel入門第一般　掌田　津耶乃　著　株式会社秀和システム発行　P1~P55
//ヒアドキュメントを使ってHTMLを表示
$html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body { font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px opx -50px 0px; }
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>This is sample page</p>
    <p>これは、サンプルで作ったページです</p>
</body>
</html>
EOF;

Route::get('/ddd', function () use ($html){
    return $html;
});

//ルートパラメータの利用（必須パラメーター･･･指定しないとエラー）
Route::get('/eee/{id}/{pass}', function ($id,$pass) {
$html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body { font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px opx -50px 0px; }
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>受け取ったidは:{$id}</p>
    <p>受け取ったpassは:{$pass}</p>
    <p>これは、サンプルで作ったページです</p>
</body>
</html>
EOF;

return $html;
});

//任意パラメータ－
Route::get('/fff/{msg?}', function ($msg='no message.') {
$html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body { font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px opx -50px 0px; }
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>{$msg}</p>
    <p>これは、サンプルで作ったページです</p>
</body>
</html>
EOF;

return $html;
});

Route::get('helloaaa/{id?}/{pass?}', 'TestController@indexaaa');
Route::get('hello', 'TestController@index');
Route::get('hello/other', 'TestController@other');
Route::get('single', 'SingleActionTestController');
Route::get('request_response', 'TestController@indexbbb');

//ビュー：PHPフレームワークLaravel入門第一般　掌田　津耶乃　著　株式会社秀和システム発行　P58~106
Route::get('phpTemplate', function(){
   return view('test_index');
});
Route::get('phpTemplate2/{id?}', 'TestController@phpTemplate');
Route::get('testBlade', 'TestController@bladeIndex');
Route::post('testBlade', 'TestController@post');

//javaScriptTest
Route::get('jsTest', 'TestController@jsTest');

//メール送信
Route::get('sendMail', 'TestController@sendMail');

