$(document).on('click','.btn-search',function()
    {
        let year=$('#year').val();
        let orders=[];
        $.ajax({
            url:'report.php',
            method:'post',
            data:{year:year},
            success:function(response)
            {
                $('.reporttable').html(response);
            }
        })
        $.ajax({
            url:"report_chart.php",
            method:'post',
            data:{year:year},
            success:function(response)
            {
                alert(JSON.parse(response))
                orders=JSON.parse(response);
                console.log(orders)
                new Chart(document.getElementById("chartjs-line"), {
                    type: "line",
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Sales ($)",
                            fill: true,
                            backgroundColor: "transparent",
                            borderColor: window.theme.primary,
                            data:orders
                        }, {
                            label: "Orders",
                            fill: true,
                            backgroundColor: "transparent",
                            borderColor: "#adb5bd",
                            borderDash: [4, 4],
                            data: orders
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.05)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 5
                                },
                                display: true,
                                borderDash: [5, 5],
                                gridLines: {
                                    color: "rgba(0,0,0,0)",
                                    fontColor: "#fff"
                                }
                            }]
                        }
                    }
                })
            }
        })
    })
		
	