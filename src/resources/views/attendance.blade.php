<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Atte</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
</head>

<style>
  body {
    font-family: 'Noto Sans JP', sans-serif;
  }
</style>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">Atte</a>

<!--ヘッダー右側のリンク３つ-->
          <ul class="flex__header-nav">
            @if (Auth::check())
            <li class="header-nav__item">
                <a href="/">ホーム</a>
            </li>
            <li class="header-nav__item">
                <form action="/attendance" method="get">
                    @csrf
                    <button class="header-nav__button">日付一覧</button>
                </form>
            </li>
            <li class="header-nav__item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="header-nav__button">ログアウト</button>
                </form>
            </li>
            @endif
          </ul>

</div>
</header>

<main>

<div class="attendance__content">
    <div class="attendance-content__heading">
        <h2>福場凛太郎さんお疲れ様です！</h2>
    </div>

<!--データテーブル-->

<div class="data-table">
            <table>
                <tr>
                    <th>id</th>
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
@foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->clock_in }}</td>
                    <td>{{ $user->clock_out }}</td>
                    <td>{{ $user->total_break }}</td>
                    <td>{{ $user->total_work }}</td>
                </tr>
@endforeach
            </table>
        </div>

        <div class="flex__pagination">{{ $users->links('pagination::bootstrap-4') }}</div>
</main>
<footer class="footer">
    <div class="footer__inner">
        <h5>Atte, inc.</h5>
    </div>
</footer>

</body>
</html>