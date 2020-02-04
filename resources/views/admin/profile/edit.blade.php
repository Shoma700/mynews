@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <div class="col-md-10 form-group row">
                <a href="{{ action('Admin\ProfileController@index') }}" role="button" class="btn btn-primary">編集中止:登録一覧へ</a>
                </div>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ $profile_form->gender }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <br><textarea style="display:block; box-sizing:content-box;" class="form-control" name="hobby" rows="5">{{ $profile_form->hobby }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea style="display:block;"class="form-control" name="introduction" rows="5">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $profile_form->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                
                <div class="row mt-5">
                    <div class="col-md-20 col-auto flex-md-fill">
                        <h2 class="aaaa">編集履歴</h2>
                        <h6 class="aaaa">更新された内容は頭に｢★｣がつきます</h6>
                        <table class="text-center ms_table_g">
                            <thead class="theaed-default">  {{-- class="list-group" --}}
                                <tr>
                                    <th class="ms_th_g">ID</th>
                                    <th class="ms_th">更新時間</th>
                                    <th class="ms_th">名前履歴</th>
                                    <th class="ms_th">性別履歴</th>
                                    <th class="ms_th">趣味履歴</th>
                                    <th class="ms_th"> 自己紹介履歴</th>
                                </tr>
                                @if ($profile_form->profiles_histories != NULL)
                                     @foreach ($profile_form->profiles_histories as $profile_history)
                                        <tr> {{-- class="list-group" --}}
                                            <td class="ms_td_g">{{ mb_substr($profile_history->profile_id,0,3) }}</td>
                                            <td class="ms_td">{{ $profile_history->edited_at }}</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_name,0,6) }}</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_gender,0,2) }}</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_hobby,0,5) }}...</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_introduction,0,5) }}...</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </thead>
                        </table>
                        <h2></h2>

                        <table class="text-center ms_table_g">
                            <thead class="theaed-default">  {{-- class="list-group" --}}
                                <tr>
                                    <th class="ms_th_g">ID</th>
                                    <th class="ms_th">更新時間</th>
                                    <th class="ms_th">名前履歴</th>
                                    <th class="ms_th">性別履歴</th>
                                    <th class="ms_th">趣味履歴</th>
                                    <th class="ms_th"> 自己紹介履歴</th>
                                </tr>
                                @if ($profile_form->profiles_histories != NULL)
                                     @foreach ($profile_form->profiles_histories as $profile_history)
                                        <tr> {{-- class="list-group" --}}
                                            <td class="ms_td_g">{{ mb_substr($profile_history->profile_id,0,3) }}</td>
                                            <td class="ms_td">{{ $profile_history->edited_at }}</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_name,0,6) }}</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_gender,0,2) }}</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_hobby,0,5) }}...</td>
                                            <td class="ms_td">{{ mb_substr($profile_history->edited_introduction,0,5) }}...</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </thead>
                        </table>

                        <h2 class="aaaa">ページネーションの実験中</h2>
                        <table class="text-center ms_table_g">
                            <thead class="theaed-default">  {{-- class="list-group" --}}
                                <tr>
                                    <th class="ms_th_g">ID</th>
                                    <th class="ms_th">更新時間</th>
                                    <th class="ms_th">名前履歴</th>
                                    <th class="ms_th">性別履歴</th>
                                    <th class="ms_th">趣味履歴</th>
                                    <th class="ms_th"> 自己紹介履歴</th>
                                </tr>
                                @if ($profile_form->profiles_histories != NULL)
                                    @foreach ($pg as $pgp)
                                        <tr> {{-- class="list-group" --}}
                                            <td class="ms_td_g">{{ mb_substr($pgp->profile_id,0,3) }}</td>
                                            <td class="ms_td">{{ $pgp->edited_at }}</td>
                                            <td class="ms_td">{{ mb_substr($pgp->edited_name,0,6) }}</td>
                                            <td class="ms_td">{{ mb_substr($pgp->edited_gender,0,2) }}</td>
                                            <td class="ms_td">{{ mb_substr($pgp->edited_hobby,0,5) }}...</td>
                                            <td class="ms_td">{{ mb_substr($pgp->edited_introduction,0,5) }}...</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </thead>
                        </table>
                        <!--ページネーション追加-->
                        <div class="d-flex justify-content-center">
                        {{ $pg->links()}}
                        </div>
                        <!--ページネーション追加-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection