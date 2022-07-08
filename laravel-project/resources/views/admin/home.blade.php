@extends('layouts.app_admin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
<script src="{{ asset('/js/makegraph.js') }}"></script>

<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">みんなの勉強時間</div>
                <div class="learning-time text-center">
                    <canvas id="japanese_people_chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <div class="table">
            <table class="table">
                <tr>
                <th>学生番号</th>
                <th></th>
                <th>商品名</th>
                <th>価格</th>
                </tr>
                <tr>
                <td>1</td>
                <td>Panasonic</td>
                <td>DVDレコーダー</td>
                <td>59800</td>
                </tr>
                </table>
        </div>
    </div>
    <div>
        <h1>{{ $msg }}</h1>
        <table border="1">
            <tr>
                <th>科目</th>
                <th>時間</th>
                <th>分</th>
            </tr>
            @foreach ($studies as $study)
            <tr>
                <td>{{ $study->subject }}</td>
                <td>{{ $study->hour }}</td>
                <td>{{ $study->minute }}</td>
            </tr>
            @endforeach
        </table>
    </div>

</div>


@endsection
