@extends('layout')
@section('title', '新規登録')

@section('add')
    <p class="py-4">データを入力しましょう！</p>
    <div>
        <form action="{{ route('post_create') }}" method="post" onsubmit="return submitChk()">
        @csrf
            <div class="form-group row">
                <label for="kids_name" class="col-sm-2 col-form-label">おなまえ</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="kids_name" name="name" placeholder="お子さんのおなまえ">
                </div>
            </div>

            <div class="form-group row">
                <label for="kids_sex" class="col-sm-2 col-form-label">せいべつ</label>
                <div class="col-sm-10">
                <select class="form-control" id="kids_sex" name="sex">
                    <option value="man">おとこのこ</option>
                    <option value="woman">おんなのこ</option>
                </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="kids_birthday" class="col-sm-2 col-form-label">たんじょうび</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="kids_birthday" name="birthday" placeholder="たんじょうび">
                </div>
            </div>

            <div class="form-group row">
                <label for="father_name" class="col-sm-2 col-form-label">おとうさん</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="father_name" name="father" placeholder="おとうさんのおなまえ">
                </div>
            </div>

            <div class="form-group row">
                <label for="mother_name" class="col-sm-2 col-form-label">おかあさん</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="mother_name" name="mother" placeholder="おかあさんのおなまえ">
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">リマインドメール</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="remind_sent" value="sent" checked>
                            <label class="form-check-label" for="remind_sent">
                                送信
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="remind_not_sent" value="not_sent">
                            <label class="form-check-label" for="remind_not_sent">
                                非送信
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <label for="kids_memo" class="col-sm-2 col-form-label">メモ</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="kids_memo" rows="3" name="memo"></textarea>
                </div>
            </div>

            <!-- 保留 -->
            <!-- <div class="form-group row">
                <div class="col-sm-2">Checkbox</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                        Example checkbox
                        </label>
                    </div>
                </div>
            </div> -->

            <div class="form-group row">
                <div class="col-sm-12 text-center py-4">
                <button type="submit" class="btn btn-outline-warning">登録する</button>
                </div>
            </div>
        </form>
    </div>
@endsection