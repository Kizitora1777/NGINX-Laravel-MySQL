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
    let y = [1, 2, 3, 4, 5, 6]
    let context = document.querySelector("#japanese_people_chart").getContext('2d')
    new Chart(context, {
    type: 'bar',
    data: {
    labels: ['2015年', '2016年', '2017年', '2018年', '2019年', '2020年'],
        datasets: [{
        label: "日本の人口推移",
        data: y,
        }],
    },
    options: {
        responsive: false
    }
    })
</script>
@endsection
