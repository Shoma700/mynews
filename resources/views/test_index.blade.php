<html>
<head>
    <title>Index</title>
    <style>
    body { font-size: 16pt; color: #999; }
    h1 { font-size: 50pt; text-align: right; color: #f6f6f6;
        margin: -20px 0px -30px 0px; letter-spacing:-4pt; }
    </style>
</head>
<body>
    <h1>Blade/index</h1>
    @isset ( $data['msg'] )
    <p>こんにちは、{{ $data['msg'] }}さん。</p>
    @else
    <a>何か書いて下さい。</a>
    @endisset
    <form method="post" action="/testBlade">
        {{ csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
    </form>
    @isset($data)
        @php
            dump($data['listData']);
            dump($data['msg']);
            isset($data)? dump($data) : print '$dataの形ではわたされていません';
        @endphp
        <p>foreachディレクティブの例</p>
        <ol>
            @foreach($data['listData'] as $item)
                @if (is_array($item))
                <li>{{ implode(',', $item) }}</li>
                @else
                <li>{{ $item }}</li>
                @endif
            @endforeach
        </ol>
    @endisset
    @php
    isset($a)? dump($a) : print '$aの形では渡されていません';
    @endphp
</body>

</html>