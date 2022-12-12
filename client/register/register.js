$(document).ready(function () {
    $("#alertError").hide();
    $("#alertSuccess").hide();
    $("#alertErrorbtn1").hide();
    // $("#step1").hide();
    $("#step2").hide();
    $("#step3").hide();
    $("#step4").hide();


    $("#step1Btn").click(function (e) {
        e.preventDefault();
        var checkContactValue = $('#contactNo').val();
        var checkEmailValue = $('#emailRegister').val();
        // checkEmailExist();
            
            
        //     function checkEmailExist(){
        //         $.ajax({
        //             type: 'post',
        //             url: 'registerProcess.php',
        //             data: {
        //                 email: checkEmailValue,
        //             },
        //             dataType: "JSON",
        //             success: function (response) {
        //                 console.log(response);
        //                 if (response.status == 'error') {
        //                     $('#emailRegister').val('');
        //                     // $("#alertErrorbtn1").html(response.msg);
        //                     // $("#alertErrorbtn1").show();
        //                     alert("Email Address already exist, please enter another email address.");
        //                 } 
        //                 // else {
        //                 //     $("#alertErrorbtn1").hide();
        //                 // }
        //             }, error: function (response) {
        //                 console.error(response);
        //             }
        //         });
        //     }
            if (checkContactValue != parseInt(checkContactValue)){

            $('#contactNo').val('');
            Swal.fire({
                title: 'Error!',
                text: 'Contact Number is Invalid, please try again.',
                icon: 'error',
                confirmButtonText: 'Cool'
              })
        }

        
        var form = $("#registerForm")[0];
        console.log($("#registerForm"));
        if (form[0].checkValidity()) {
            if (form[2].checkValidity()) {
                if (form[3].checkValidity()) {
                    if (form[4].checkValidity()) {
                        $("#step1").hide();
                        $("#step2").show();
                        $(".progress-bar").width("40%");
                    } else {
                        form[4].reportValidity();
                        
                    }

                } else {
                    form[3].reportValidity();
                }
            } else {
                form[2].reportValidity();
            }

        } else {
            form[0].reportValidity();
        }


    });

    $("#prev1Btn").click(function (e) {
        e.preventDefault();
        $("#step1").show();
        $("#step2").hide();
        $(".progress-bar").width("20%");
    });

    $("#step2Btn").click(function (e) {
        e.preventDefault();
        var form = $("#registerForm")[0];
        if (form[8].checkValidity()) {
            if (form[9].checkValidity()) {
                if (form[10].checkValidity()) {
                    $("#step2").hide();
                    $("#step3").show();
                    $(".progress-bar").width("70%");

                } else {
                    form[10].reportValidity();
                }
            } else {
                form[9].reportValidity();
            }

        } else {
            form[8].reportValidity();
        }

    });

    $("#prev2Btn").click(function (e) {
        e.preventDefault();
        $("#step2").show();
        $("#step3").hide();
        $(".progress-bar").width("30%");
    });
    $("#step3Btn").click(function (e) {
        e.preventDefault();
        var form = $("#registerForm")[0];
        if (form[13].checkValidity()) {
            if (form[14].checkValidity()) {
                $("#step3").hide();
                $("#step4").show();
                $(".progress-bar").width("100%");
            } else {
                form[14].reportValidity();

            }
        } else {
            form[13].reportValidity();

        }

    });

    $("#prev3Btn").click(function (e) {
        e.preventDefault();
        $("#step3").show();
        $("#step4").hide();
        $(".progress-bar").width("70%");
    });

    $('#registerForm').submit(function (event) {
        event.preventDefault();


        $.ajax({
            type: 'post',
            url: 'registerProcess.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status == 'error') {
                    $("#alertError").html(response.msg);
                    $("#alertError").show();
                } else {
                    $("#alertError").hide();
                    $("#alertSuccess").show();
                    $('#registerForm').trigger("reset");



                }
            }, error: function (response) {
                console.error(response);
            }
        });
    });

    $('#registerForm').change(function (event) {
        $("#alertError").hide();
        $("#alertSuccess").hide();
    });

    // function validatePassword() {
    //     var p = document.getElementById('newPassword').value,
    //         errors = [];
    //     if (p.length < 8) {
    //         errors.push("Your password must be at least 8 characters"); 
    //     }
    //     if (p.search(/[a-z]/i) < 0) {
    //         errors.push("Your password must contain at least one letter.");
    //     }
    //     if (p.search(/[0-9]/) < 0) {
    //         errors.push("Your password must contain at least one digit."); 
    //     }
    //     if (errors.length > 0) {
    //         alert(errors.join("\n"));
    //         return false;
    //     }
    //     return true;
    // }
});
