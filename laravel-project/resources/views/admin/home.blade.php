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
                <div class="card-header">あなたの勉強時間</div>
                <div class="learning-time text-center">
                    <canvas id="japanese_people_chart" width="400" height="400"></canvas>
                </div>
                </div>
            </div>
        </div>
        <div class="table">
        <table class="table">
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
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->user_id }}</td>
            </tr>
            <tr>
                <td>{{ floor($student->time / 60) }}時間{{ $student->time % 60}}分</td>
            </tr>
            @endforeach

            @foreach ($students2 as $student2)
                <td>{{ floor($student2->time / 60) }}時間{{ $student2->time % 60}}分</td>
            @endforeach

            @foreach ($students3 as $student3)
                <td>{{ floor($student3->time / 60) }}時間{{ $student3->time % 60}}分</td>
            @endforeach

            @foreach ($students4 as $student4)
                <td>{{ floor($student4->time / 60) }}時間{{ $student4->time % 60}}分</td>
            @endforeach

            @foreach ($students5 as $student5)
                <td>{{ floor($student5->time / 60) }}時間{{ $student5->time % 60}}分</td>
            @endforeach

            @foreach ($students6 as $student6)
                <td>{{ floor($student6->time / 60) }}時間{{ $student6->time % 60}}分</td>
            @endforeach

            @foreach ($students7 as $student7)
                <td>{{ floor($student6->time / 60) }}時間{{ $student6->time % 60}}分</td>
            @endforeach
            <tr>
        </table>
    </div>
<!-- <script>
    const studies = @json($students);
    
    // DEBUG
    /*
    studies.forEach(function(element) {
        console.log(element);
    });
    */
    // 今日を含めた一週間前までの横軸データを作成する
    // 例えば今日が「2022/07/12」とすると、yearsに作られるデータは
    // ["2022-07-06", "2022-07-07", "2022-07-08", "2022-07-09", "2022-07-10", "2022-07-11", "2022-07-12"]
    // となる。
    let years = []
    // 6日前までの日付を求めるので、-6から始める
    for (let i = -6; i <= 0; i++) {
        var date = moment().add(i, 'd').format('YYYY-MM-DD');
        years.push(date)
    }
    const ctx = document.getElementById('japanese_people_chart').getContext('2d');
    // 縦軸に載せるデータをまとめる
    // 今日を含めた一週間分のうち、その日ごとの勉強時間のhとmをまとめあげる
    
    // sum配列はsum[0]に今日の勉強時間、sum[1]に1日前の勉強時間、sum[2]に2日前の...と続く
    // 各配列はhとmのキーを持ち、ここにStudentテーブルの"hour"と"minute"が入る 
    let sum = [7]
    for (var i = 0; i < 7; i++) {
        sum[i] = [];
        sum[i]['h'] = 0; 
        sum[i]['m'] = 0;
    }
    // Studentテーブルの全てのデータを探索
    // 注意：このアルゴリズムはテーブルのデータをすべて探索するため、データ量が増えると処理時間も増大してしまう
    // 必要なのは1週間前までのデータなので、何かメソッドを使って効率化できるかもしれない
    studies.forEach(function(study) {
        create_time = study['created_at'];
        study_day = moment(create_time)
        today = moment()
        // 今日の日付と勉強時間の記録された日を比較し、それが何日前なのかを算出する
        d = today.diff(create_time, 'days')
        if (0 <= d && d < 7) {
            sum[d]['h'] += study['hour']
            sum[d]['m'] += study['minute']
            // 60分を超えたら1時間に変換
            if (sum[d]['m'] >= 60) {
                hour = Math.floor(sum[d]['m'] / 60)
                
				sum[d]['h'] += hour
				sum[d]['m'] %= 60
            }
            // 勉強時間が24時間を越えるとドットが消えるので、24時間を越えたら上から押さえつける
            if (sum[d]['h'] >= 24) {
                sum[d]['h'] = 24
                sum[d]['m'] = 0
            }
        }
    });
    let times = [7]
    for (var i = 0; i < 7; i++) {
        times[i] = String(sum[i]['h']).padStart(2, '0') + ":" + String(sum[i]['m']).padStart(2, '0') + ':00'
    }
    // 現在のtimes配列は0番目に今日の勉強時間、1番目に1日前の勉強時間が入っているが、
    // グラフに表示する際は前の日にちから表示させていくので、順番を逆にさせる
    times = times.reverse()
  
    let data = years.map((year, index) => ({
    x: moment(`${year}`), 
    y: moment(`1970-02-01 ${times[index]}`).valueOf()
    }));
  let myChart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [
            {
                label: "勉強時間",
                backgroundColor: 'rgba(0, 0, 0, 0.6)',
                data: data,
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }
        ]
    },
    options: {
        scales: {
            x: {
                type: 'time',
                time: {
                  unit: 'day'
                }
              },
            y: {
                type: 'linear',
                position: 'left',
                ticks: {
                  min: moment('1970-02-01 00:00:00').valueOf(),
                  max: moment('1970-02-01 23:59:59').valueOf(),
                  stepSize: 3.6e+6,
                  beginAtZero: false,
                  callback: value => {
                    let date = moment(value);
                    if(date.diff(moment('1970-02-01 23:59:59'), 'minutes') === 0) {
                      return null;
                    }
                    
                    return date.format('H');
                  }
                }
            }
        }
    }
    });
</script> -->
</div>

@endsection
