$(document).ready(function () {
    displayTotalNumOfClients(new Date().getFullYear());

    // TOP 5 MOST POPULAR PROJECT
    $.ajax({
        type: "POST",
        url: "dashboard/dashboardProcess.php",
        data: { getTop5Reaction: true },
        dataType: "JSON",
        success: function (response) {
            let content = ``;
            $.each(response, function (indexInArray, project) {
                content += `
                    <tr>
                        <td class="text-center"><img src="../employee/profile/${project.profile_picture}" class="rounded-circle" width="50px" height="50px" alt=""></td>
                        <td>${project.fullName}</td>
                        <td>${project.ctr}</td>
                        <td>${project.title}</td>
                        <td>${project.category}</td>
                        <td class="text-center"><button type="button" class="viewBtn btn btn-dark" data-id="${project.id}" data-bs-toggle="modal" data-bs-target="#viewModal">View</button></td>
                    </tr>
                `;
            });
            $("#popularProject").html(content);
            $(".viewBtn").click(function (e) {
                e.preventDefault();
                let id = $(this).data("id");
                var selected = response.filter(function (data) {
                    return data.id == id;
                })[0];
                let images = ``;
                console.log(selected);
                $.each(selected.image, function (indexInArray, path) {
                    let active = '';
                    if (indexInArray == 0) {
                        active = "active";
                    }
                    images += `<div class="carousel-item ${active}">
                                <img src="../employee/projects/${path}" class="d-block w-100 img-fluid img-modal">
                                </div>`;
                });
                let content = `
                <div id="carouselExampleIntervalModal" class="carousel slide">
                    <div class="carousel-inner">
                        ${images}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIntervalModal" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIntervalModal" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="d-flex justify-content-between w-100 mt-3">
                    <h2 class="fw-normal">${selected.title} </h2>
                </div>
                <p>${selected.description}</p>
                `;


                $("#projectModalBody").html(content);

            });

        }, error: function (response) {
            // console.error(response); 4
        }
    });

    // CLIENTS FEEDBACK
    displayFeedback();
    function displayFeedback() {
        $.ajax({
            type: "POST",
            url: "dashboard/dashboardProcess.php",
            data: { getClientsFeedback: true },
            dataType: "JSON",
            success: function (response) {
                let content = ``;
                $.each(response, function (indexInArray, feedback) {
                    content += `
                    <tr>
                        <td>${feedback.id}</td>
                        <td>${feedback.fullname}</td>
                        <td>${feedback.email}</td>
                        <td>${feedback.contact_no}</td>
                        <td>${feedback.feedback}</td>
                        <td>${feedback.date}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success post-feedback" data-id="${feedback.id}">Post</button>
                            <button type="button" class="btn btn-sm btn-warning remove-feedback" data-id="remove">Remove</button>
                        </td>
                    </tr>
                `;

                });
                $("#feedbackContent").html(content);

                $(".post-feedback").click(function (e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "dashboard/dashboardProcess.php",
                        data: { changeClientsFeedback: true, feedbackId: id },
                        dataType: "JSON",
                        success: function (response) {
                            displayFeedback();
                        }
                    });
                });
            }, error: function (response) {
                console.error(response);
            }
        });
    }

    //PROJECT APPROVAL
    displayProjects();
    function displayProjects() {
        $.ajax({
            type: "POST",
            url: "dashboard/dashboardProcess.php",
            data: { getPendingProjects: true },
            dataType: "JSON",
            success: function (response) {
                let content = ``;
                $.each(response, function (indexInArray, project) {
                    content += `
                     <tr>
                        <td>${project.id}</td>
                        <td>${project.fullname}</td>
                        <td>${project.employee_id}</td>
                        <td>${project.title}</td>
                        <td>${project.category}</td>
                        <td>${project.description}</td>
                        <td>${project.date_time}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success post-project" data-id="${project.id}">Approve</button>
                            <button type="button" class="btn btn-sm btn-warning remove-project" data-id="${project.id}">Disapprove</button>
                        </td>
                    </tr>
                     `
                });

                $("#projectContent").html(content);

                $(".post-project").click(function (e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "dashboard/dashboardProcess.php",
                        data: { approveProjects: true, projectId: id },
                        dataType: "JSON",
                        success: function (response) {
                            console.log("pasok???");
                            displayProjects();
                        }
                    });

                });

                $(".remove-project").click(function (e) { 
                    e.preventDefault();
                    var id = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "dashboard/dashboardProcess.php",
                        data: {disapprovedProjects: true, projectId2: id},
                        dataType: "JSON",
                        success: function (response) {
                            console.log("pasok ba 'to");
                            displayProjects();
                        }
                    });
                    
                });
            }
        });
    }
    // PROJECT COUNT
    $.ajax({
        type: "POST",
        url: "dashboard/dashboardProcess.php",
        data: { getProjects: true },
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#totalProjects").html(response.length);
        }, error: function (error) {
            console.log(error);
        }
    });

    //REGISTERED USER COUNT
    $.ajax({
        type: "POST",
        url: "dashboard/dashboardProcess.php",
        data: { getRegisteredUsers: true },
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#totalRegisteredUser").html(response.length);
        }, error: function (error) {
            console.log(error);
        }
    });

    //EMPLOYEE USER COUNT
    $.ajax({
        type: "POST",
        url: "dashboard/dashboardProcess.php",
        data: { getEmployees: true },
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            $("#totalEmployees").html(response.length);
        }, error: function (error) {
            console.log(error);
        }
    });




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
                    // console.log(); 2
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
                $("#totalClients1").html(response.length);
                myChart.data.datasets[0].data = ctr;
                myChart.update();
            },
            error: function (error) {
                // console.error(error); 1
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


