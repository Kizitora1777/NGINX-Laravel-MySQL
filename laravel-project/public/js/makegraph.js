window.onload = function() {
    let context = document.querySelector("#japanese_people_chart").getContext('2d')
    new Chart(context, {
    type: 'bar',
    data: {
    labels: ['07/19','07/20', '07/21', '07/22', '07/23', '07/24', '07/25'],
        datasets: [{
        label: "みんなの勉強時間",
        data: [400, 500, 450, 500, 350, 430, 380],
        backgroundColor: 'skyblue'
        }],
    },
    options: {
        responsive: false
    }
    })
}