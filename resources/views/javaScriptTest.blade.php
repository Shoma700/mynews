
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<title>template</title>
<link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<header>
<div class="header-contents">
<h1>タイトル</h1>
<h2>サブタイトル</h2>
</div><!-- /.header-contents -->
</header>
<div class="main-wrapper">
<section>
	<!-- Html -->
	<p id="choice">ここに日時を表示します</p>
</section>
</div><!-- /.main-wrapper -->
<footer>JavaScript Samples</footer>
    <!-- Javacript -->
<script src="{{ secure_asset('js/test.js') }}"></script>

<script>
// console.log('ブラウザのコンソールって便利、なお、phpは一手間いりそう');
// document.getElementById('choice').textContent = new Date();
// console.log(document.getElementById('choice'));
// window.alert('アプリ連携が完了しました。');
// window.alert('3 + 6 = ' + (3 + 6));

// console.log(window.alert('アラートテスト'));
// console.log(window.confirm('ゲームスタート！　準備はいい？'));

// if(window.confirm('ifテスト')){
//     console.log('OK');
// } else {
//     console.log('キャンセル')
// }
// var answer = window.prompt('ヘルプを見ますか？ /yes?');
// //console.log(answer);
// if(answer === 'yes'){
//     window.alert('ヘルプ画面です');
// } else {
//     answer = 'no';
// }
// console.log(answer);
</script>
<footer>JavaScript Samples</footer>
<script>
// var number = Math.floor(Math.random() * 6);
// var answer = parseInt(window.prompt('数当てゲーム。0~5の数字を入力してね'));
// var message;
//     if(answer > 6){
//         message = '数字が大きすぎるよ';
//     } else if(answer === number){
//         message = '当たり';
//     } else if(answer < number){
//         message = '残念でした！もっと大きい';
//     } else if(answer > number){
//         message = '残念でした！もっと小さい';
//     } else {
//         message = '0~5の数値でを入力してね';
//     }
// 　　window.alert(message);
// 　　console.log(number);
// 　　console.log(answer);
</script>
<script>
// var hour = parseInt(new Date().getHours());
// console.log(hour);
// hour = parseInt(window.prompt('時間操作'));
// console.log(hour);
// if(hour >= 19 && hour < 21) {
//     window.alert('お弁当30%OFF!');
// } else if(hour === 9 || hour === 15) {
//     window.alert('お弁当買ったら一個おまけ!');
// } else {
//     window.alert('お弁当はいかがですか');
// }
</script>

<script>
for(var i = 1; i <= 10; i++) {
    console.log('for文処理中・・・' + i);
}
</script>

</body>
</html>
