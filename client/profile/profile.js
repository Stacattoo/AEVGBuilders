$(document).ready(function () {

    messagePopover();
    appStatus();
    showCostEstimate();
    filterPortfolio();
    $('[data-bs-toggle="tooltip"]').tooltip();
    $("#alertError").hide();
    $("#alertSuccess").hide();
    $("#schedAppProfile").show();
    $("#viewAppModal").hide();
    $("#haveASchedule").hide();
    var feedbackContent = `
    <div>
        <h5><b>Thank you for trusting us!</b></h5>
        <p>We would like to hear your feedback.</p>
        <form id="feedbackForm">
            <div class="form-label">
                <textarea class="form-control" id="feedbackArea" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-end ">
                <button class="btn btn-secondary" type="submit">Submit</button>
            </div>
        </form>
    </div>`;

    var mesContent = ``;
    var splitBack = '';

    function messagePopover() {
        // var id = '';
        $.ajax({
            type: "POST",
            url: "messageProcess.php",
            data: {
                getMessage: true,
                // clientID: id
            },
            dataType: "JSON",
            success: function (response) {
                // $('#contentID').trigger("reset");
                // console.log(response);
                var contentMsgDisplay = '';
                $.each(response.content, function (indexInArray, val) {

                    response.content.sort(function (a, b) {
                        return new Date(a.dateTime) - new Date(b.dateTime);
                    });

                    var isClient = false;
                    if (val.sender == "client") {
                        isClient = true;
                    }

                    var imgArr = val.content.split(',');
                    for (let i in imgArr) {
                        contentMsgDisplay = imgArr[i];
                        // console.log(contentMsgDisplay);

                        var dotIndex = contentMsgDisplay.lastIndexOf('.');
                        var ext = contentMsgDisplay.substring(dotIndex);
                        // console.log(ext);
                        if (contentMsgDisplay != ext) {

                            if (ext == '.jpg' || ext == '.png') {
                                // console.log(ext);
                                if (isClient) {
                                    mesContent +=
                                        `<div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                                    <div class="pe-2">
                                        <div>
                                            <div class="card text-white d-inline-block p-1 border-0 rounded-6" style="background-color: #00a6fb">
                                            <a href="${contentMsgDisplay}" target="_blank"><img src="${contentMsgDisplay}" class="d-block img-fluid img rounded-6" style="max-height: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                <div class="position-relative avatar border-0 px-1">
                                    <img src="../../images/defaultUserImage.jpg" class="img-fluid rounded-circle border-0" style="max-height: 30px;" alt="">
                                </div>
                            </div> `;
                                } else {
                                    mesContent += `
                                    <div class="d-flex align-items-baseline mb-4">
                                        <div class="position-relative avatar  border-0 px-1">
                                            <img src="../../images/defaultUserImage.jpg" class="img-fluid rounded-circle border-0" style="max-height: 30px;" alt="">
                                        </div>
                                        <div class="pe-2">
                                            <div>
                                                <div class="card  text-white d-inline-block p-1 border-0 rounded-4" style="background-color: #0582ca">
                                                <a href="${contentMsgDisplay}" target="_blank"><img src="${contentMsgDisplay}" class="d-block img-fluid img rounded-4" style="max-height: 150px;"></a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                    `;
                                }

                            } else if (ext == '.doc' || ext == '.docx') {

                                splitBack = contentMsgDisplay.replace("../../clientEmployeeFiles/", '');
                                if (isClient) {
                                    mesContent +=
                                        `<div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                                    <div class="pe-2">
                                        <div>
                                       
                                            <div class="card text-white d-inline-block p-2 px-3 m-1 border-0 rounded-2" style="background-color: #00a6fb">
                                            <div>${splitBack}</div>
                                            <button type="button" class="fileBtnClient btn btn-dark btn-sm mt-1">Download</button>
                                            </div>
                                        </div>
                                    </div>
                                <div class="position-relative avatar  border-0 px-1">
                                    <img src="../../images/defaultUserImage.jpg" class="img-fluid rounded-circle  border-0 " style="max-height: 30px;" alt="">
                                </div>
                            </div> `;
                                } else {
                                    mesContent += `
                                    <div class="d-flex align-items-baseline mb-4">
                                        <div class="position-relative avatar  border-0 px-1">
                                            <img src="../../images/defaultUserImage.jpg" class="img-fluid rounded-circle  border-0 " style="max-height: 30px;" alt="">
                                        </div>
                                        <div class="pe-2">
                                            <div>
                                           
                                                <div class="card  text-white d-inline-block p-2 px-3 m-1 border-0 rounded-2" style="background-color: #0582ca">
                                                <div>${splitBack}</div>
                                                <button type="button" class="fileBtnClient btn btn-dark btn-sm mt-1">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                    `;
                                }
                            }
                        } else {
                            if (isClient) {
                                mesContent +=
                                    `<div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                                    <div class="pe-2">
                                        <div>
                                            <div class="card text-white d-inline-block p-2 px-3 m-1 border-0 rounded-5 fs-6" style="background-color: #00a6fb">
                                            ${val.content}
                                            </div>
                                        </div>
                                    </div>
                                <div class="position-relative avatar  border-0 px-1">
                                    <img src="../../images/defaultUserImage.jpg" class="img-fluid rounded-circle border-0  style="max-height: 30px;" alt="">
                                </div>
                            </div> `;
                            } else {
                                mesContent += `
                                    <div class="d-flex align-items-baseline mb-4">
                                        <div class="position-relative avatar  border-0 px-1">
                                            <img src="../../images/defaultUserImage.jpg" class="img-fluid rounded-circle  border-0"style="max-height: 30px;" alt="">
                                        </div>
                                        <div class="pe-2">
                                            <div>
                                                <div class="card  text-white d-inline-block p-2 px-3 m-1 border-0 rounded-5 fs-6" style="background-color: #0582ca">
                                                ${val.content}
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                    `;
                            }

                        }

                    }

                });
                $('#contentID').trigger("reset");
                // $('#messageBubble').show();
                // $("#splitBack").html(content);
                // console.log(mesContent);
                $('#mesBody').html(mesContent);


            }, error: function (response) {
                console.error(response);
            }
        });
    }
    var messageContent =
        `<form id="messageForm" class="mb-0">
                <div class="card mx-auto" style="width:400px">
                    <div class="card-header bg-transparent">
                        <div class="navbar navbar-expand p-0">
                            <ul class="navbar-nav me-auto align-items-center">

                                <li class="nav-item">
                                <h5 class="mt-2">AEVG Live Chat</h5> 
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                    
                    <div class="card-body p-4" id="mesBody" style="height: 432px;overflow: scroll; overflow-x: hidden;">

                    </div>
                    
                    <div class="card-footer bg-white w-100 m-0 p-1">
                        <div class="d-flex justify-content-between">
                            <input class="card-subtitle text-muted align-bottom m-0" name="clientID" id="clientID" value="" hidden>
                            <textarea class="form-control border-0" type="text" name="clientMessage" style="height: 20px;" placeholder="Write a message..."></textarea>
                            <div class="dropdown m-0">
                                <button class="btn btn-light text-secondary  fas fa-paperclip text-primary" data-bs-toggle="dropdown" id="aria-expanded=" false>
                                    
                                </button>
                                <ul class="dropdown-menu">
                                <input type="file" class="filesEmp" id="filesEmployee" name="filesEmployee[]" multiple>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-light text-secondary">
                                <i class="far fa-paper-plane text-primary"></i>
                            </button>
                        </div>
                    </div>    
                </div>      
            </form>
                `;



    $("#fb").click(function (e) {
        e.preventDefault();

    });
    $("#fb").popover({
        placement: "left",
        html: true,
        sanitize: false,
        title: "Feedback",
        content: feedbackContent,
    }).on("shown.bs.popover", function () {
        $('#msg').popover('hide');
        $("#feedbackForm").submit(function (e) {
            e.preventDefault();
            console.log($("#feedback").val());
            $.ajax({
                type: "POST",
                url: "profileProcess.php",
                data: { insertFeedback: $("#feedbackArea").val() },
                success: function (response) {
                    console.log(response);
                    alert("Feedback Successfully Sent!")
                }, error: function (response) {
                    console.error(response);
                }
            });
        });
    });

    $("#msg").popover({
        // setInterval(messagePopover, 1000);
        placement: "left",
        html: true,
        sanitize: false,
        content: messageContent,

    }).on("shown.bs.popover", function () {
        $('#fb').popover('hide');
        var popover = $("#" + $("#msg").attr("aria-describedby"));
        $(popover).addClass("popover-msg");
        $('#mesBody').html(mesContent);
        $("#mesBody").animate({
            scrollTop: $("#mesBody").get(0).scrollHeight
        }, 10);
        // setInterval(displayMessage, 1000);
        $('#messageForm').submit(function (e) {

            console.log("okay naman");
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "messageProcess.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $('#messageForm').trigger("reset");
                    $('#contentID').html("");
                    if (response.status == 'success') {
                        // messagePopover();
                        $(".popover-body").html(messageContent);
                        $('#mesBody').html(mesContent);
                        
                        $("#mesBody").animate({
                            scrollTop: $("#mesBody").get(0).scrollHeight
                        }, 10);

                    }
                }, error: function (response) {
                    console.error(response.responseText);
                }
            });
        });
        $('.fileBtnClient').click(function (e) {
            e.preventDefault();
            console.log("ayos naman");
            var path = 'http://localhost:/AEVGBuilders/clientEmployeeFiles/';
            var url = path.concat(splitBack);
            console.log(url);
            var docuFilesMsg = window.open(url);
            docuFilesMsg.location;

        });
    });



    $("#profileForm").submit(function (event) {
        // console.log('test lang');
        event.preventDefault();
        $.ajax({
            url: "profileProcess.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (result) {
                console.log(result);
                //alert("Record successfully updated");
                if (result.status == 'error') {
                    $("#alertError").html(result.msg);
                    $("#alertError").fadeIn();
                } else {
                    $("#alertSuccess").html(result.msg);
                    $("#alertSuccess").fadeIn();
                }
            },
            error: function (result) {
                console.error(result);
            }
        });
    });



    $('input').focus(function (e) {
        e.preventDefault();
        $("#alertError").fadeOut();
        $("#alertSuccess").fadeOut();

    });

    $('#imgBtn').change(function () {

        var file = $("input[type=file]").get(0).files[0];

        if (file) {

            var reader = new FileReader();

            reader.onload = function () {
                $("#profileImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }

    });

    $("#errorPass").hide();
    $("#changePassForm").hide();

    $("#profileInfo").click(function () {

        $(this).addClass("active");
        $("#passBtn").removeClass("active");
        $("#profileForm").show();
        $("#changePassForm").hide();

    });

    $("#passBtn").click(function () {

        $(this).addClass("active");
        $("#profileInfo").removeClass("active");
        $("#changePassForm").show();
        $("#profileForm").hide();

    });


    $("#changePassForm").submit(function (event) {
        
        event.preventDefault();
        $.ajax({
            url: "changePassProcess.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                console.log(result);
                if (result.status == "error") {
                    $("#errorPass").html(result.msg);
                    $("#errorPass").show();
                } else {
                    alert("Password Changed Succesfully");
                    $("#changePass").hide();
                    $("#errorPass").hide();
                    $('#changePassForm').trigger("reset");

                }

            }
        });
    });

    $('#changePassForm').click(function () {
        $("#errorPass").hide();
    });


    //     $("#scheduleForm").submit(function (event) {
    //         event.preventDefault();
    function appStatus() {
        $.ajax({
            url: "../contactUs/getData.php",
            type: "POST",
            dataType: "json",
            data: {
                checkAppointmentProfile: true
            },
            success: function (result) {
                // console.log(result.status);
                if (result.status == 'pending') {
                    $("#schedAppProfile").hide();
                    $("#haveASchedule").hide();
                    $("#viewAppModal").show();
                    $("#viewModBtn").show();
                } else if (result.status == 'canceled') {
                    $("#schedAppProfile").show();
                    $("#haveASchedule").hide();
                    $("#viewAppModal").hide();
                    $("#editBtnSched").show();
                    $("#viewModBtn").show();
                } else if (result.status == 'ongoing') {
                    $("#schedAppProfile").hide();
                    $("#haveASchedule").show();
                    $("#viewAppModal").hide();
                    $("#editBtnSched").hide();
                    $("#viewModBtn").show();
                }

            }
        });
    }
    function showCostEstimate() {
        $.ajax({
            type: "POST",
            url: "profileProcess.php",
            data: {
                getCostEstimate: true
            },
            dataType: "json",
            success: function (response) {
                // console.log(response.content);
                var content = ``;
                var dateTime = '';
                
                $.each(response.content, function (indexInArray, val) {
                    // dateTime = ;
                    var d = new Date(val.dateTime);
                    var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                    var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
                    var time = d.toLocaleTimeString().toLowerCase();
                    dateTime = date + " at " + time;
                    // console.log(val.content);
                    splitBack = val.content.replace("../../clientEmployeeFiles/", '');
                    content += `
                    <tr>

                        <td>${dateTime}</td>
                        <td>${splitBack}</td>
                        <td><button type="button" class="fileBtn btn btn-info btn-sm">Download</button></td>
                    </tr>`;
                });
                $('#costEstiTable').html(content);
                $('.fileBtn').click(function(e) {
                    e.preventDefault();
                    var path = 'http://localhost:/AEVGBuilders/clientEmployeeFiles/';
                    var url = path.concat(splitBack);
                    console.log(url);
                    var docuFilesMsg = window.open(url);
                    docuFilesMsg.location;

                });
            },
            error: function (responseError) {
                console.log(responseError);
            }
        });
    }
    $.ajax({
        type: "POST",
        url: "profileProcess.php",
        data: {
            getPortfolioUploads: true,
        },
        dataType: "JSON",
        success: function (response) {
            
        }
    });

    function filterPortfolio() {
        $.ajax({
            type: "post",
            url: "portfolioProcess.php",
            data: {
                getAllPortfolioClient: true
            },
            dataType: "json",
            success: function (response) {
                let content = ``;
                $.each(response, function (indexInArray, data) {
                    let images = ``;
                    $.each(data.image, function (indexInArray, path) {
                        let active = '';
                        if (indexInArray == 0) {
                            active = "active";
                        }
                        images += `<div class="carousel-item ${active}">
                                        <img src="${path}" class="d-block w-70 img-fluid img ">
                                        
                                        </div>`;
                    });
                    
                    content += `
                    <div class="col">
                            <div class="card">
    
                                <div id="carouselExampleInterval${indexInArray}" class="carousel slide">
                                    <div class="carousel-inner">
                                        ${images}
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval${indexInArray}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval${indexInArray}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="card-body">

                                    <h6 class="card-text">${data.title}</h6> 
                                    <p class="card-text text-truncate">${data.description}</p> 
                                    <div class= "d-flex justify-content-between"> 
                                    
                                    <button class="btn btn-link text-secondary text-decoration-none portfolioBtn" data-bs-toggle="modal" data-bs-target="#openPortfolioModal" data-id="${data.client_id}">See more...</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     `;
                });
                $("#portfolioOnsite").html(content);
                console.log(images);


                $(".portfolioBtn").click(function (e) {
                    e.preventDefault();
                    let id = $(this).data("client_id");
                    var selected = response.client_id(function (data) {
                        return data == id;
                    })[0];
                    let images = ``;
                    $.each(selected.image, function (indexInArray, path) {
                        let active = '';
                        if (indexInArray == 0) {
                            active = "active";
                        }
                        images += `<div class="carousel-item ${active}">
                                    <img src="${path}" class="d-block w-100 img-fluid img-modal">
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
                    <p>${selected.description}</p>
                    `;


                    
                    $("#portfolioContent").html(content);
                });


            },
            error: function (response) {
                console.error(response.responseText);
            }
        });
    }

}); // end of document ready function