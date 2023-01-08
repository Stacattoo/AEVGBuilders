$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "homeProcess.php",
        data: { getFeedback: true },
        dataType: "JSON",
        success: function (response) {
            let content = ``;
            $.each(response, function (indexInArray, data) {
                content += `
                    <div class="swiper-slide">
                        <div class="content-wrapper">
                            <div class="content">
                                <div class="swiper-avatar"><img src="../profile/${data.image}">
                                </div>
                                <p>"${data.feedback}"</p>
                                <p class="cite">- ${data.fullname}</p>
                            </div>
                        </div>
                    </div>
            `;
            });

            $("#feedbackContent").html(content);
        }
        
    });
});