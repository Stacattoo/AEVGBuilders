$(document).ready(function () {
    displayTotalNumOfClients(new Date().getFullYear());
    function displayTotalNumOfClients(year) {
        $.ajax({
            type: "POST",
            url: "dashboard/dashboardProcess.php",
            data: { getClients: true },
            dataType: "JSON",
            success: function (response) {
                var ctr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                var yr = [];

                const distinct = (value, index, self) => {
                    return self.indexOf(value) === index;
                }

                $.each(response, function (indexInArray, val) {
                    var formattedDate = new Date(val.transaction_date);
                    var y = formattedDate.getFullYear();
                    var m = formattedDate.getMonth();
                    console.log();
                    if (year == y) {
                        ctr[m]++;
                    }
                    yr.push(y)

                });
                const distinctYears = yr.filter(distinct);
                $("#years").html("");
                $.each(distinctYears, function (indexInArray, val) {
                    $('#years').append($('<option>', {
                        value: val,
                        text: val
                    }));
                });
                $("#totalClients").html(response.length);
                myChart.data.datasets[0].data = ctr;
                myChart.update();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    $("#years").change(function (e) {
        e.preventDefault();
        var year = $(this).val();
        displayTotalNumOfClients(year);
    });
});// END OF DOCUMENT READY 


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Clients',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            tension: 0.4
        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

