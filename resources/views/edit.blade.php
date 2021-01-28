@extends('layout')
@section('title', '投稿編集')

@section('edit')
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <p class="py-4">データを編集しましょう！</p>
    <div>
        <form action="{{ route('post_update', $kid->id) }}" method="post" onsubmit="return submitChk()">
        @method('PUT')
        @csrf
            <div class="form-group row">
                <label for="kids_name" class="col-sm-2 col-form-label">おなまえ</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="kids_name" name="name" value="{{ old('name') ?: $kid->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="kids_sex" class="col-sm-2 col-form-label">せいべつ</label>
                <div class="col-sm-10">
                <select class="form-control" id="kids_sex" name="sex">
                    @if($kid->sex === "man")
                        <option value="man" selected>おとこのこ</option>
                        <option value="woman">おんなのこ</option>
                    @else
                        <option value="man">おとこのこ</option>
                        <option value="woman" selected>おんなのこ</option>
                    @endif
                </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="kids_birthday" class="col-sm-2 col-form-label">たんじょうび</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="kids_birthday" name="birthday" value="{{ old('birthday') ?: $kid->birthday->format('Y-m-d') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="father_name" class="col-sm-2 col-form-label">おとうさん</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="father_name" name="father" value="{{ old('father_name') ?: $kid->father_name }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="mother_name" class="col-sm-2 col-form-label">おかあさん</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="mother_name" name="mother" value="{{ old('mother_name') ?: $kid->mother_name }}">
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">リマインドメール</legend>
                    <div class="col-sm-10">
                        @if($kid->gridRadios === "sent")
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
                        @else
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="remind_sent" value="sent">
                                <label class="form-check-label" for="remind_sent">
                                    送信
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="remind_not_sent" value="not_sent" checked>
                                <label class="form-check-label" for="remind_not_sent">
                                    非送信
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <label for="kids_memo" class="col-sm-2 col-form-label">メモ</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="kids_memo" rows="3" name="memo">{{ old('memo') ?: $kid->memo }}</textarea>
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
                <button type="submit" class="btn btn-outline-warning">ほぞん</button>
                </div>
            </div>
        </form>
    </div>
@endsection