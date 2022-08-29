$(document).ready(function () {

    $('#registerForm').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'registerProcess.php',
            data: new FormData(this),
        });
    });
});
