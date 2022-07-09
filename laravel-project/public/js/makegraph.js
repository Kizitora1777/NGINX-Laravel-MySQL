window.onload = function() {
    let context = document.querySelector("#japanese_people_chart").getContext('2d')
    new Chart(context, {
    type: 'bar',
    data: {
    labels: ['2015年', '2016年', '2017年', '2018年', '2019年', '2020年'],
        datasets: [{
        label: "日本の人口推移",
        data: [127094745, 127041812, 126918546, 126748506, 126555078, 126146099],
        }],
    },
    options: {
        responsive: false
    }
    })
}