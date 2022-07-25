@extends('layouts.app_admin')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
<script src="{{ asset('/js/makegraph.js') }}"></script>


<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">みんなの勉強時間</div>
                <div class="learning-time center-block">
                    <canvas id="japanese_people_chart" width="500" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
        <div>
        <table class="table table-bordered">
            <!-- 汚い入れ子構造になっているのでどうにかしたい。 -->
            <tr>
                <th>学生番号</th>
                <th><? $today = date("m/d",strtotime("-6 day"));print_r($today); ?></th>
                <th><? $today = date("m/d",strtotime("-5 day"));print_r($today); ?></th>
                <th><? $today = date("m/d",strtotime("-4 day"));print_r($today); ?></th>
                <th><? $today = date("m/d",strtotime("-3 day"));print_r($today); ?></th>
                <th><? $today = date("m/d",strtotime("-2 day"));print_r($today); ?></th>
                <th><? $today = date("m/d",strtotime("-1 day"));print_r($today); ?></th>
                <th><? $today = date("m/d");print_r($today); ?></th>
            </tr>
            <tr>
                <td>
                    <table class="table-borderless">
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->user_id }}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ floor($student->time / 60) }}時間{{ $student->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students2 as $student2)
                        <tr>
                            <td>{{ floor($student2->time / 60) }}時間{{ $student2->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students3 as $student3)
                        <tr>
                            <td>{{ floor($student3->time / 60) }}時間{{ $student3->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students4 as $student4)
                        <tr>
                            <td>{{ floor($student4->time / 60) }}時間{{ $student4->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students5 as $student5)
                        <tr>
                            <td>{{ floor($student5->time / 60) }}時間{{ $student5->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table class="table-borderless">
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students6 as $student6)
                        <tr>
                            <td>{{ floor($student6->time / 60) }}時間{{ $student6->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table-borderless">
                        @foreach ($students7 as $student7)
                        <tr>
                            <td>{{ floor($student7->time / 60) }}時間{{ $student7->time % 60}}分</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection
