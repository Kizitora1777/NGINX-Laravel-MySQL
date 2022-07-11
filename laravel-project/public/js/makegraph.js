window.onload = function() {
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
}