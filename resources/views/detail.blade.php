@extends('layout')
@section('title', '詳細表示')

@section('detail')
    <p class="pt-4 mb-2">{{ $kid->name }} のとうろくデータ</p>
    <p><a href="/index" class="text-warning">＜＜＜ いちらんへもどる</a></p>
    <div>
        <div class="row m-0 float-right">
            <p class="mr-2"><a href="{{ route('post_edit', $kid->id) }}"><i class="fas fa-user-edit yellow-ac"></i></a></p>
            <form method="POST" action="{{ route('post_destroy', $kid->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="&#xf2ed;" class="fas fa-trash-alt yellow-ac" onclick='return confirm("削除してよろしいですか？");'>
            </form>
        </div>
        <table class="table">
        <tbody>
            <tr>
                <th scope="row" style="width:35%">せいべつ</th>
                @if($kid->sex === "man")
                    <td style="width:65%"><i class="fas fa-male yellow-ac"></i> おとこのこ</td>
                @else
                    <td style="width:65%"><i class="fas fa-female yellow-ac"></i> おんなのこ</td>
                @endif
            </tr>
            <tr>
                <th scope="row">たんじょうび</th>
                <td>{{ $kid->birthday }}</td>
            </tr>
            <tr>
                <th scope="row">おとうさん</th>
                <td>{{ $kid->father_name }}</td>
            </tr>
            <tr>
                <th scope="row">おかあさん</th>
                <td>{{ $kid->mother_name }}</td>
            </tr>
            <tr>
                <th scope="row">リマインドメール</th>
                @if($kid->gridRadios === "sent")
                    <td><i class="fas fa-envelope yellow-ac"></i> 送信する</td>
                @else
                    <td>送信しない</td>
                @endif
            </tr>
            <tr>
                <th scope="row">メモ</th>
                <td>{{ $kid->memo }}</td>
            </tr>
        </tbody>
        </table>
        
        <div class="form-group row">
            <div class="col-sm-12 text-center py-4">
            <button type="button" class="btn btn-outline-warning mb-4" onclick="location.href='{{ route('index') }}'">もどる</button>
            </div>
        </div>
    </div>
@endsection