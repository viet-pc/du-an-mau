<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    #chart {
        width: 500px;
        margin: 0 auto;
    }
</style>
<div id="chart">
    <canvas id="myChart" width="200" height="200"></canvas>
</div>

<script>
    $(document).ready(function() {


        // var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: [<?php foreach ($data['ds_hang_hoa'] as $values)
                                echo '"' . $values['ten_loai'] . '",';
                            ?>],
                datasets: [{
                    label: "# of Votes",
                    data: [<?php foreach ($data['ds_hang_hoa'] as $values)
                                echo $values['so_luong'] . ',';
                            ?>],
                    backgroundColor: [
                        "#8333e9",
                        "#ff7fae",
                        "#ffc6bf",
                        "#f9f7f1",
                        "#f7444e",
                        "#78bcc4",
                        "#3e503c",
                        "#7f886a",
                        "#ff6f3d",
                        "#38d7e7",
                        "#ee316b",
                        "#f97350",
                        "#f8b5c1",
                        "#2b92e4",
                        "#ffa883",
                        "#c1b9b9",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "right",
                        labels: {
                            color: 'rgb(255, 99, 132)'
                        }
                    },
                    title: {
                        display: true,
                        text: "Tỷ lệ hàng hóa",
                    },
                },
            },
        });
        var chart = c3.generate({
            bindto: "#myChart",
            color: {
                pattern: ["#5969ff", "#ff407b", "#25d5f2", "#ffc750"]
            },
            data: {
                // iris data from R
                columns: [
                    ['30 days', 120],
                    ['60 days', 70],
                    ['90 days', 50],
                    ['90+ Days', 30],

                ],
                type: 'pie',

            }
        });

        setTimeout(function() {
            chart.load({

            });
        }, 1500);

        setTimeout(function() {
            chart.unload({
                ids: 'data1'
            });
            chart.unload({
                ids: 'data2'
            });
        }, 2500);
    })
</script>