$(document).ready(function () {

    filterProject("All");

    var cat = "All";
    $(".category").click(function (e) {
        e.preventDefault();
        cat = $(this).html();
        filterProject(cat);
    });

    function filterProject(category) {
        $.ajax({
            type: "post",
            url: "projectProcess.php",
            data: {
                getAllProjects_req: true    
            },
            dataType: "json",
            success: function (response) {
                var filter = response.filter(function (data) {
                    if (category == "All") {
                        return true;
                    }
                    // images += `<div class="carousel-item ${active}">
					// 				<img src="../../employee/projects/${path}" class="d-block w-70 img-fluid img ">
					// 				</div>`;
                    return data.category == category;
                })
                let content = ``;
                $.each(filter, function (indexInArray, data) {
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
                            <div class="card" data-bs-toggle="modal" data-bs-target="#openModalProj">
    
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
        
                                    <p class="card-text text-truncate">${data.description}</p> 
                                    <i class="${(data.reaction) ? "fas" : "far"} fa-heart react" data-react="${(data.reaction)}" data-id="${data.id}"></i> <span> ${data.reactionCtr}</span>
                                </div>
                            </div>
                        </div>
                     `;
                });
                $("#materials").html(content);

                $('.react').click(function (e) { // dito yung dpat mag cchange to solid
                    e.preventDefault();
                    var postId = $(this).data("id");
                    var react = $(this).data("react");

                    console.log(postId);
                    $.ajax({
                        type: "post",
                        url: "projectProcess.php",
                        data: {
                            setPostReaction: true, 
                            projectId: postId, 
                            react: react
                        },
                        dataType: "json",
                        success: function (response) {
                            filterProject(cat);
                        }
                    });


                });

            },
            error: function (response) {
                console.error(response.responseText);
            }
        });
    }

});