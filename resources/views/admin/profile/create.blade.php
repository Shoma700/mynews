@extends('layouts.profile')
@section('title', 'プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
                <div class="col-md-4 form-group">
                <a href="{{ action('Admin\ProfileController@index') }}" role="button" class="btn btn-primary">登録一覧</a>
                </div>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        <label class="col-md-2" for="name">氏名</label>　<!-- ニュース新規作成ではタイトル -->
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2" for="gender">性別</label>　<!-- ニュース新規作成ではタイトル -->
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2" for="hobby">趣味</label> <!-- ニュース新規作成では本文で20行 -->
                        <div class="col-md-10">
                            <br><textarea style="display:block; box-sizing:content-box;" class="form-control" name="hobby" rows="5">{{ old('hobby') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label> <!-- ニュース新規作成では本文で20行 -->
                        <div class="col-md-10">
                            <textarea style="display:block;"class="form-control" name="introduction" rows="5">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}

                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
