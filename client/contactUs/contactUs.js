$(document).ready(function () {

    $("#alertError").hide();
    // $("#flexCheckChecked7").hide();
    $("#projectID").hide();
    $("#meetLoc").prop('disabled', true);
    $("#appointForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "../contactUs/appointmentProcess.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (result) {
                console.log(result);
                if (result.status == 'error') {
                    $("#alertError").html(result.msg);
                    $("#alertError").fadeIn();
                }else{
                    window.location.href="../aboutUs/aboutUs.php";
                    // $('#appointForm').trigger("reset");
                    // $('#flexCheckChecked7').hide();
                    // $('#projectID').hide();
                }
            }
        });
    });
    // $("#btnOthers").click(function (event){
    //     event.preventDefault();
    //     $("#flexCheckChecked7").show();
    // });
    // $("#btnOthers").change(function (event){
    //     event.preventDefault();
    //     $("#flexCheckChecked7").hide();
    // });

    // $("[name='businessType[]']").change(function (event){
    //     event.preventDefault();
    //     if ($(this).val() == "Others") {
    //         $("#flexCheckChecked7").show();
    //     } else {
    //         $("#flexCheckChecked7").hide();
    //     }
    // });

    $("[name='projectType']").change(function (event){
        event.preventDefault();
        if ($(this).val() == "Others") {
            $("#projectID").show();
        } else {
            $("#projectID").hide();
        }
    });


    $("#meetType").change(function (event){
        event.preventDefault();
        // console.log("gumana naman");
        var type = $(this).val();
        if(type == "virtual"){
            $("#meetLoc").prop('disabled', true);
        }else if(type == "meetUp"){
            $("#meetLoc").prop('disabled', false);
        }
        
    });
   
        var today = new Date().toISOString().split('T')[0];
        $("#appointmentDate").attr('min', today);
        var today = new Date().toISOString().split('T')[0];
        $("#targetDate").attr('min', today);
        
});
