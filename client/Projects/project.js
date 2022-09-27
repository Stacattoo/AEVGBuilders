$(document).ready(function () {
    var dummy = [
        {
            "id": 1,
            "description": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat vitae",
            "category": "building"
        }, {
            "id": 2,
            "description": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat vitae",
            "category": "building"
        }, {
            "id": 3,
            "description": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat vitae",
            "category": "renovation"
        }
    ]


    $.ajax({
        type: "post",
        url: "projectProcess.php",
        data: {
            getAllProjects_req: true
        },
        dataType: "json",
        success: function (response) {
          // var filter = response.filter(function (data) {
        //         return data.category == "renovation";
            // })
            let content = ``;
            $.each(response, function (indexInArray, data) {
                console.log(data);
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
        },
        error: function (response) {
            console.error(response.responseText);
        }
    });
});