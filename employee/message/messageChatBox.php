<?php
include('../include/dbh.employee.php');
$dbh = new dbHandler();
$userData = $dbh->getAllClientInfoByID($_POST['id']);
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="../message/message.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="card" style="background-color:#f8f9fa;">
    <div class="card-body h-100">
        <div class="d-flex justify-content-between">
            <h5 class="text-capitalize mx-3 mt-1"><?php echo $userData->fullname; ?></h5>

            <div class="dropdown m-0">
                <button class="btn" type="button" id="filesTab" href="#fileModal" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-images fs-4"></i>
                </button>
                <ul class="dropdown-menu">
                    <div id="filesContent">
                        <div class="" id="scrollBar" style="height: 500px; overflow-y:scroll; background-color:#f8f9fa;">
                            <div class="p-3" id="filesRetrieve">
                                <div class="">
                                    <!-- <small class="text-start" id="clientNameHeader"></small>
                            <div class="text-bg-secondary p-2 rounded-4" id="messageBubble"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </ul>
            </div>
        </div>

        <form id="messageEmployee">
            <input class="card-subtitle text-muted align-bottom m-0" name="clientID" id="clientID" value="<?php echo $userData->id; ?>" hidden>
            <!-- <div class="card-body p-4" id="scrollBar" style="height: 700px; overflow: scroll; overflow-x: hidden;"> -->
            <div class="p-3" id="messageRetrieve" style="height: 700px; overflow: scroll; overflow-x: hidden;">
                <div class="">
                    <small class="text-start" id="clientNameHeader"></small>
                    <div class="text-bg-secondary p-2 rounded-4" id="messageBubble"></div>
                </div>
            </div>
            <!-- </div> -->


            <div class="card-footer d-flex justify-content-start align-items-center px-0" style="background-color:#f8f9fa;">
                <textarea type="text" class="form-control " id="contentID" name="employeeMessage" placeholder="Type message..." style="height: 20px;"></textarea>
                <div class="dropdown m-0">
                    <button class="btn ms-1 text-muted" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-paperclip"></i>
                    </button>
                    <!-- <input type="text"> -->
                    <ul class="dropdown-menu">
                        <input type="file" class="filesEmp d-none" id="filesEmployee" name="filesEmployee[]">
                        <input type="file" class="costEst d-none" id="costEstimate" name="costEstimate">
                        <li>
                            <button class="dropdown-item" type="button" id="filesEmployeeBtn">
                                <i class="fas fa-file-pdf"></i> Upload File
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="button" id="costEstimateBtn">
                                <i class="fas fa-dollar-sign"></i> Upload Cost Estimate
                            </button>
                        </li>
                    </ul>
                </div>

                <button class="btn ms-1 btn-primary" type="submit">
                    <i class="fas fa-paper-plane"></i>
                </button>
                <!-- <input type="submit">
                <i class="fa-solid fa-paper-plane-top"></i>
                </input> -->

            </div>
        </form>



    </div>
</div>
<script>
    $(document).ready(function() {

        $("#filesEmployeeBtn").click(function(e) {
            e.preventDefault();
            $("#filesEmployee").trigger("click");
        });
        $("#costEstimateBtn").click(function(e) {
            e.preventDefault();
           $("#costEstimate").trigger("click");
        });
        $("#filesContent").hide();
        $("#messageTab").click(function() {

            $(this).addClass("active");
            $("#filesTab").removeClass("active");
            $("#messageEmployee").show();
            $("#filesContent").hide();

        });

        $("#filesTab").click(function() {

            $(this).addClass("active");
            $("#messageTab").removeClass("active");
            $("#filesContent").show();

        });


        $('#messageBubble').hide();
        $('#errorFiles').hide();
        displayMessage();
        setTimeout(() => {
            $("#messageRetrieve").animate({
                scrollTop: $("#messageRetrieve").get(0).scrollHeight
            }, 1000);
        }, 1000)
        setInterval(displayMessage, 1000);

        $("#subBtn").click(function(e) {
            // e.preventDefault();
            console.log("subBtn");
        });
        $('#messageEmployee').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "../message/messageProcess.php",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('#contentID').html("");
                    if (response.status == 'success') {
                        $('#messageEmployee').trigger("reset");
                        $('#filesEmployee').trigger("reset");
                        $('#costEstimate').trigger("reset");
                    }
                },
                error: function(response) {
                    console.error(response.responseText);
                }
            });
        });


        $('#filesEmployee').change(function(e) {
            e.preventDefault();
            var $fileUpload = $("input[name='filesEmployee']");
            if (parseInt($fileUpload.get(0).files.length) > 5) {

                $('#errorFiles').show();
                $('#errorFiles').html("You can only upload a maximum of 5 files. Please Try again!");
                $('#filesEmployee').trigger("reset");

            } else {
                $('#errorFiles').hide();
            }
        });

        // $('#costEstimate').change(function(e){
        //     e.preventDefault();
        //     var costEstUpload = $("#costEstimate");
        //     var dotIndex = costEstUpload.lastIndexOf('.');
        //     var ext = costEstUpload.substring(dotIndex);
        //     if(ext == '.xlsx' || '.xls' || '.pdf' || '.doc' || '.docx'){
        //         $('#errorFiles').show();
        //         $('#errorFiles').html("File type does not match correct format: .xlsx, .xls, .pdf, .docx, doc");
        //         $('#costEstimate').trigger("reset");
        //     }else{
        //         $('#errorFiles').hide();
        //     }
        // });

        function displayMessage() {

            var id = $('#clientID').val();

            $.ajax({
                type: "POST",
                url: "../message/messageProcess.php",
                data: {
                    getMessage: true,
                    id: id
                },

                dataType: "JSON",
                success: function(response) {
                    var splitBack = '';
                    var content = ``;
                    var filesContMsg = ``;
                    $.each(response.content, function(indexInArray, val) {
                        response.content.sort(function(a, b) {
                            return new Date(a.dateTime) - new Date(b.dateTime);
                        });

                        var isEmployee = false;
                        if (val.sender == "employee") {
                            isEmployee = true;
                        }

                        var contentMsgDisplay = '';
                        var imgArr = val.content.split('&&^%$%$');
                        var fileArr = val.type;
                        // debugger

                        for (let i in imgArr) {
                            contentMsgDisplay = imgArr[i];

                            //console.log(contentMsgDisplay);
                            //--- para sa mga files ---

                            if (isEmployee) {
                                if (fileArr == "image") {
                                    content += `<div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                                    <div class="pe-2">
                                        <div>
                                            <div class="card text-white d-inline-block p-1  border-0 rounded-4" title="${val.dateTime}" style="background-color: #00a6fb">
                                            <a href="${contentMsgDisplay}" target="_blank"><img src="${contentMsgDisplay}" class="d-block img-fluid img rounded-4 fs-6" style="max-height: 300px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative avatar">
                                        <img src="../../images/defaultUserImage.jpg" style="max-height: 40px;" class="img-fluid rounded-circle" alt="">
                                    </div>
                                </div> `;
                                } else if (fileArr == "file") {
                                    splitBack = contentMsgDisplay.replace("../../clientEmployeeFiles/", '');

                                    filesContMsg += `
                                            <div class="form-control">
                                            <div>${splitBack}</div>
                                            <button type="button" class="fileBtn btn btn-dark btn-sm mt-1">Download</button>
                                            </div>`;

                                    content += `<div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                                    <div class="pe-2">
                                        <div>
                                            <div class="card d-inline-block p-2 px-3 m-1 border-0 rounded-4 fs-6t" title="${val.dateTime}" style="background-color: #00a6fb;">
                                            <div>${splitBack}</div>
                                            <button type="button" class="fileBtn btn btn-dark btn-sm mt-1">Download</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative avatar">
                                        <img src="../../images/defaultUserImage.jpg" style="max-height: 40px;" class="img-fluid rounded-circle" alt="">
                                    </div>
                                </div> `;
                                } else if (fileArr == "text") {
                                    content += `<div class="d-flex align-items-baseline text-end justify-content-end mb-4 ">
                                    <div class="pe-2">
                                        <div>
                                            <div class="card text-white d-inline-block p-2 px-3 m-1 border-0 rounded-4 fs-6" title="${val.dateTime}" style="background-color: #00a6fb">
                                            ${contentMsgDisplay}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative avatar">
                                        <img src="../../images/defaultUserImage.jpg" style="max-height: 40px;" class="img-fluid rounded-circle" alt="">
                                    </div>
                                </div> `;
                                }

                            } else {
                                if (fileArr == "image") {
                                    content += `
                            <div class="d-flex align-items-baseline mb-4">
                            <div class="position-relative avatar">
                            <img src="../../images/defaultUserImage.jpg" style="max-height: 40px;" class="img-fluid rounded-circle rounded-4" alt="">
                            </div>
                            <div class="pe-2">
                                <div>
                                    <div class="card  text-white d-inline-block p-1  border-0 rounded-4 fs-6" title="${val.dateTime}" style="background-color: #0582ca">
                                    <img src="${contentMsgDisplay}" class="d-block img-fluid img" style="max-height: 150px;"><a href="${contentMsgDisplay}" target="_blank">
                                    </div>
                                </div>

                            </div>
                        </div>
                    `;
                                } else if (fileArr == "file") {
                                    splitBack = contentMsgDisplay.replace("../../clientEmployeeFiles/", '');

                                    filesContMsg += `
                                    <div class="form-control">
                                    <div>${splitBack}</div>
                                    <button type="button" class="fileBtn btn btn-dark btn-sm mt-1">Download</button>
                                    </div>`;

                                    content += `
                                    <div class="d-flex align-items-baseline mb-4">
                                    <div class="position-relative avatar">
                                        <img src="../../images/defaultUserImage.jpg" style="max-height: 40px;" class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="pe-2">
                                        <div>
                                            <div class="card d-inline-block p-2 px-3 m-1 border-0 rounded-4 fs-6" title="${val.dateTime}" style="background-color: #00a6fb">
                                            <div>${splitBack}</div>
                                                    <button type="button" class="fileBtn btn btn-dark btn-sm mt-1" >Download</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            `;
                                } else {
                                    content += `
                            <div class="d-flex align-items-baseline mb-4">
                            <div class="position-relative avatar">
                                <img src="../../images/defaultUserImage.jpg" style="max-height: 40px" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="pe-2">
                                <div>
                                    <div class="card  text-white d-inline-block p-2 px-3 m-1 border-0 rounded-4 fs-6" title="${val.dateTime}" style="background-color: #0582ca">
                                    ${contentMsgDisplay}
                                    </div>
                                </div>

                            </div>
                        </div>
                    `;
                                }
                            }


                        }


                    });

                    $("#messageRetrieve").html(content);
                    $("#filesRetrieve").html(filesContMsg);

                    $('.fileBtn').click(function(e) {
                        e.preventDefault();
                        var path = 'http://localhost:/AEVGBuilders/clientEmployeeFiles/';
                        var url = path.concat(splitBack);
                        var docuFilesMsg = window.open(url);
                        docuFilesMsg.location;

                    });
                },
                error: function(response) {
                    console.error(response);
                }
            });
        }



    });
</script>