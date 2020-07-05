<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Mail;

//--------//ルーティングとコントローラー：PHPフレームワークLaravel入門第一般　掌田　津耶乃　著　株式会社秀和システム発行　P1~P55
global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body {font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
EOF;
$body = '</head><body>';
$end = '</body></head>';

function tag($tag, $txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}
//--------



class TestController extends Controller
{
//ルーティングとコントローラー：PHPフレームワークLaravel入門第一般　掌田　津耶乃　著　株式会社秀和システム発行　P1~P55
    public function indexaaa($id='noname', $pass='unknown') {
        return <<<EOF
<html>
<head>
<title>HELLO</title>
<style>
body {font-size:16pt; color:#999; }
h1 {font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
</head>
<body>
    <h1>Index</h1>
    <p>これは、Helloコントローラのindexaaaアクションです。</p>
    <ul>
        <li>ID: {$id}</li>
        <li>PASS: {$pass}</li>
    </ul>
</body>
</html>
EOF;
    }

    public function index() {
        global $head, $style, $body, $end;
        $html = $head . tag('title', 'Hello/Index') . $style .
            $body
                . tag('h1', 'Index') . tag('p', 'This is Index page')
                . '<a Href="/hello/other">go to Other page</a>'
                . $end;
        return $html;
    }
    
    public function other() {
        global $head, $style, $body, $end;
        $html = $head . tag('title', 'Hello/Other') . $style .
            $body
                . tag('h1', 'Other') . tag('p', 'This is Other page')
                . $end;
        return $html;
    }
    
    public function indexbbb(Request $request, Response $response) {
        $html = <<<EOF
<html>
<head>
<title>Request $ Response</title>
<style>
body { font-size:16pt; color:#999; }
h1 { font-size:120pt; text-align:right; color:#fafafa;
    margin:-50px 0px -120px 0px; }
</style>
</head>
<body>
    <h1>Hello</h1>
    <h3>Request</h3>
    <pre>{$request}</pre>
    <h3>Response</h3>
    <pre>{$response}</pre>
    <h3>request->url</h3>
    <pre>{$request->url()}</pre>
    <h3>request->fullUrl</h3>
    <pre>{$request->fullUrl()}</pre>
    <h3>request->path</h3>
    <pre>{$request->path()}</pre>
    <h3>response->status</h3>
    <pre>{$response->status()}</pre>
</body>
</html>
EOF;
        $response->setContent($html);
        return $response;
        }
//ビュー：PHPフレームワークLaravel入門第一般　掌田　津耶乃　著　株式会社秀和システム発行　P58~106
    public function phpTemplate($id='zero', Request $request)
    {
        $data = [
            'msg' => 'これはコントローラから渡されたメッセージです。',
            'id' => $id,
            'queryString' => $request->id
            ];
        return view('test_index', $data);
    }
    
    public function bladeIndex() 
    {
    //$data = [
    //    'msg' => ''
    //    ];
        return view('test_index');//, $data);
    }
    
    public function post(Request $request)
    {
        $msg = $request->msg;
        //$c = 999;
        $b = ['あ', 'い', 'う'];
        $listData = ['one', 'two', 'three', 'four', 'b' => $b];
        $data = [
            'msg' => $msg,
            'listData' => $listData,
            ];
        dump($data);
        $a = 800;
        //return view('test_index', ['data' => $data], $a);
        return view('test_index', ['data' => $data ,'a' => $a]);
        
        //return view('test_index', compact('a'));
        //return view('test_index')->with('a', $a);
         //↑こうすること（どちらでもよい）
        //return view('test_index', $a); //×この方法ではダメ
        
    }
    
    public function jsTest(Request $request) {
        return view('javaScriptTest');
    }
    
    public function sendMail(){

    	$data = [];

    	Mail::send('aaa' , $data, function($message){
    	    $message->to('s-maeda@autobacs.com', 'Test')->subject('This is a test mail');
    	});
    	return view('test_index');
    }
    
    
}
    

