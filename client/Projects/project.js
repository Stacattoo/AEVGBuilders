$(document).ready(function () {
    $.ajax({
        type: "post",
        url: "projectProcess.php",
        data: {
            getAllMaterial_req: true
        },
        dataType: "json",
        success: function (response) {
            let content = ``;
            $.each(response, function (indexInArray, data) { 
                 content += `
                 <div class="col"><a href=""></a>
                    <div class="card text-bg-light">
                        <img src="../../${data.image}" class="card-img" alt="">
                        <div class="card-img-overlay">
                            <h5 class="card-title">${data.id}</h5>
                            <p class="card-text">${data.description}</p>
                        </div>							
                    </div>
                </div>
                 `;
            });
            
            $("#materials").html(content);
            // console.log(response);
        }
    });
});