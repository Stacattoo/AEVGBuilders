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
                            <div class="card" >
    
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
                                    <div>
                                    <i class="${(data.reaction) ? "fas" : "far"} fa-heart react" data-react="${(data.reaction)}" data-id="${data.id}"></i> <span> ${data.reactionCtr}</span>
                                    </div>
                                    <button class="btn btn-link text-secondary text-decoration-none projectBtn" data-bs-toggle="modal" data-bs-target="#openModalProj" data-id="${data.id}">See more...</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                     `;
                });
                $("#materials").html(content);



                $(".projectBtn").click(function (e) {
                    e.preventDefault();
                    let id = $(this).data("id");
                    var selected = filter.filter(function (data) {
                        return data.id == id;
                    })[0];
                    let images = ``;
                    $.each(selected.image, function (indexInArray, path) {
                        let active = '';
                        if (indexInArray == 0) {
                            active = "active";
                        }
                        images += `<div class="carousel-item ${active}">
                                    <img src="../../employee/projects/${path}" class="d-block w-100 img-fluid img-modal">
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
                    <div class="d-flex justify-content-between w-100 mt-3">
						<h2 class="fw-normal">${selected.title} </h2>
						<div>
                        <i id="clickHart" class="${(selected.reaction) ? "fas" : "far"} fa-heart react" data-react="${(selected.reaction)}" data-id="${selected.id}"></i> <span> ${selected.reactionCtr}</span>

						</div>
                    </div>
                    <p>${selected.description}</p>
                    `;


                    $("#projectModalBody").html(content);
                    clickReact();

                    $('#clickHart').click(function(e){
                        e.preventDefault();
                        console.log("na click");
                    });
                });

                clickReact();
                function clickReact() {
                    $('.react').click(function (e) {
                        e.preventDefault();
                        var postId = $(this).data("id");
                        var react = $(this).data("react");
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
                }


            },
            error: function (response) {
                console.error(response.responseText);
            }
        });
    }

});