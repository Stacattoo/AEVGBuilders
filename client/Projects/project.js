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
        console.log(response);
          // var filter = response.filter(function (data) {
        //         return data.category == "renovation";
            // })
            let content = ``;
            $.each(response, function (indexInArray, data) {
                console.log(data.image);
                let images = ``;
                $.each(data.image, function (indexInArray, path) {
                    let active = '';
                    if (indexInArray == 0) {
                        active = "active";
                    }
                    images += `<div class="carousel-item ${active}">
									<img src="../../employee/projects/${path}" class="d-block w-70 img-fluid img ">
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
								<p class="card-text">${data.description}</p>
							</div>
						</div>
					</div>
                 `;
            });
            $("#materials").html(content);
           
        },
        error: function (response) {
            console.error(response.responseText);
        }
    });
});