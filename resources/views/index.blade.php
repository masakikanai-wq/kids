@extends('layout')
@section('title', '登録一覧')

@section('index')
    @if(Auth::check())
        <div class="container py-4">
            <!-- エラーメッセージ表示 -->
            @if (session('errors'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0">{{ session('errors')}}</p>
                </div>
            @endif
            <button type="button" class="btn btn-outline-warning mb-4" onclick="location.href='{{ route('post_add') }}'">新規登録</button>
            <p>とうろくいちらん</p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col" class="text-nowrap">なまえ</th>
                            <th scope="col" class="text-nowrap">たんじょうび</th>
                            <th scope="col" class="text-nowrap">げんざい</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kids as $kid)
                            @if(( $kid->user_id ) === ( Auth::user()->id ))
                            <!-- 誕生日から現在までの日数を計算する処理 -->
                            <?php $now = new DateTime('now'); ?>
                            <?php $birthday = $kid->birthday; ?>
                            <?php $diff = $now->diff($birthday); ?>
                            <?php $formated_interval = $diff->format('%Y年 %mヶ月 %d日'); ?>
                            <!-- 処理ここまで -->
                            <tr>
                                <th scope="row">{{ optional($kid)->id }}</th>
                                <td class="text-nowrap">{{ optional($kid)->name }}</td>
                                <td class="text-nowrap">{{ optional($kid)->birthday->format('Y年 m月 d日') }}</td>
                                <td class="text-nowrap">{{ $formated_interval }}</td>
                                <td class="text-nowrap"><a href="/kids/{{ optional($kid)->id }}" class="text-warning">詳細</a></td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <!-- cover -->
        <div class="jumbotron cover">
            <div class="container-fluid">
                <h1 class="display-4 text-white">Kids Log</h1>
                <p class="lead text-white">「たんじょうびおめでとう！」を<br>すべてのこどもたちに贈りたい</p>
                <p><a class="btn btn-warning text-white" href="/register" role="button">今すぐはじめる</a></p>
            </div>
        </div>

        <!-- jumbotron -->
        <div class="jumbotron jumbotron-fluid m-0 py-5">
            <div class="container">
                <p class="lead text-center mb-2">Kids Logは、お子さんのおたんじょうびを一括管理することができるサービスです。</p>
                <p class="lead text-center mb-2">友人のお子さんのたんじょうびを記録し</p>
                <p class="lead text-center mb-2">「おたんじょうび、おめでとう！」を届けましょう。</p>
            </div>
        </div>

        <!--- Two Column Section -->
        <div class="container p-4 mt-4">
            <div class="row explanation">
                <div class="col-md-12 col-lg-6 my-auto">
                    <h2 class="mb-4 yellow-ac">シンプルな機能で<br>たんじょうびを簡単管理！</h2>
                    <p class="mb-2">Kids Logはシンプルで直感的に使えるデザインが特徴です。</p>
                    <p class="mb-4">おとうさん、おかあさんだけでなく、おじいちゃんやおばあちゃんもご利用いただけます。</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('image/photo-1.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <div class="container p-4 mt-4">
            <div class="row explanation">
                <div class="col-md-12 col-lg-6 my-auto">
                    <h2 class="mb-4 yellow-ac">「あの子、今何才だっけ？」<br>なんてもう悩まない</h2>
                    <p class="mb-2">たんじょうびを入力すると、現在の年齢をアプリが自動的に計算して一覧表示！</p>
                    <p class="mb-4">プレゼントを送る際に年齢を確認する必要はもうありません！</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('image/photo-2.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <div class="container p-4 mt-4">
            <div class="row explanation">
                <div class="col-md-12 col-lg-6 my-auto">
                    <h2 class="mb-4 yellow-ac">リマインドメール機能で<br>メッセージはもう忘れない！</h2>
                    <p class="mb-2">登録したたんじょうびの１週間前にリマインドメールを自動送信！</p>
                    <p class="mb-4">これでお祝いのメッセージが遅れることはもうありません。</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('image/photo-3.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="jumbotron jumbotron-fluid bg-white mb-0">
            <div class="container text-center">
                <p class="lead text-dark">＼ 無料登録はこちら ／</p>
                <a class="btn btn-warning text-white" href="/register" role="button">今すぐはじめる</a>
            </div>
        </div>

        <!--- Welcome Section -->
        <div class="container-fluid mb-4">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">たんじょうび管理に必要な機能がオールインワン</h1>
                </div>
            </div>
        </div>

        <!--- Three Column Section -->
        <div class="container-fluid padding py-4">
            <div class="row text-center feature">
                <div class="col-xs-12 col-sm-6 col-md-4 mb-2">
                    <i class="fas fa-mail-bulk"></i>
                    <h3 class="font-small">自動メール送信</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 mb-2">
                    <i class="fas fa-user-clock"></i>
                    <h3 class="font-small">リアルタイム年齢表示</h3>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fas fa-calendar-alt"></i>
                    <h3 class="font-small">大量のデータも一括管理</h3>
                </div>
            </div>
        </div>

        <!-- Comment -->
        <div class="jumbotron jumbotron-fluid my-4">
            <div class="container">
                <p class="lead">「自分の子どもが生まれてから『お子さんは今何ヶ月でしたっけ？』と何度も訊かれることに気付きました。振り返ると、自分自身も知人の子どもの誕生日までは全く覚えてないことに気付きました。たくさんの子どもたちの誕生日を一元管理して、お祝いのメッセージを忘れずに届けるためにこのアプリを開発しました。」</p>
                <hr class="my-4">
                <p>Developer : Masaki Kanai</p>
            </div>
        </div>

        <!--- Welcome Section -->
        <div class="container-fluid py-4 mb-4">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4 mb-4">たくさんのたんじょうびも、かんたん一括管理！</h1>
                    <a class="btn btn-warning text-white" href="/register" role="button">今すぐはじめる</a>
                </div>
            </div>
        </div>

        <!--- Footer -->
        <footer>
            <div class="container-fluid padding">
                <div class="row text-center">
                    <div class="col-md-12">
                        <p>Masaki Kanai</p>
                        <p>contact : m.kanai.51@gmail.com</p>
                        <a href="https://twitter.com/barley_teas"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                    <div class="col-md-12">
                        <hr class="light-100">
                        <p>Kids Log</p>
                    </div>
                </div>
            </div>
        </footer>
    @endif
@endsection