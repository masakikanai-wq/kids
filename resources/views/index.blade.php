@extends('layout')
@section('title', '登録一覧')

@section('index')
    <!-- エラーメッセージ表示 -->
    @if (session('errors'))
        <div class="alert alert-success text-center" role="alert">
            <p class="mb-0">{{ session('errors')}}</p>
        </div>
     @endif
    <button type="button" class="btn btn-outline-warning mb-4" onclick="location.href='{{ route('post_add') }}'">新規登録</button>
    <p>とうろくいちらん</p>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">なまえ</th>
                    <th scope="col">たんじょうび</th>
                    <th scope="col">げんざい</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
            @foreach($kids as $kid)
                <tr>
                    <th scope="row">{{ $kid->id }}</th>
                    <td>{{ $kid->name }}</td>
                    <td>{{ $kid->birthday }}</td>
                    <td>げんざい</td>
                    <td><a href="/kids/{{ $kid->id }}" class="text-warning">詳細</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection