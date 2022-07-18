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
                <th>勉強時間</th>
            </tr>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->user_id }}</td>
                <td>{{ floor($student->time / 60) }}時間{{ $student->time % 60}}分</td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>


</div>


@endsection
