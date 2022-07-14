@extends('layouts.app')

@section('content')
<link href="css/hidden.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>

{{-- chartjs-adapter-date-fns --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

{{-- chartjs-adapter-luxon --}}
<script src="https://cdn.jsdelivr.net/npm/luxon@^2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"></script>

{{-- chartjs-adapter-moment --}}
<script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>

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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">勉強時間を追加する</div>
                <div class="add-learning-time">
                    <form>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>科目</th>
                                    <th class="subject">
                                        <td colspan=2>
                                            <p><input type="subject" name="subject" autocomplete="subject" class="form-control" placeholder="国語" required/></p>
                                        </td>
                                    </th>
                                 <tr>
                                 <tr>
                                    <th>学習時間</th>
                                    <th class="learn-time">
                                        <td class="firstcell">
                                            <select name="hour" class="hour">
                                                <option disabled selected>時間</option>
                                                <option value="0">00</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                            </select>
                                            時間
                                        </td>
                                        <td>
                                            <select name="minute" class="minute">
                                                <option disabled selected>分</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="36">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                            </select>
                                            分
                                        </td>
                                    </th>
                                 <tr>
                            </tbody>
                        </table>
                        <div class="pdn10 comment">
                            <textarea class="form-control" placeholder="学習した内容や感想" name="comment"></textarea>
                        </div>

                        <div class="text-center my-5">
                        <button type="submit" class="btn btn-primary btn-block">勉強時間を登録(送信しません)</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>
@endsection
