$(document).ready(function () {

    $("#alertError").hide();
    $("#alertSuccess").hide();

    refreshTable();
    $("#uploadMaterials").submit(function (event) {
        console.log("kahit ano");
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'materials/materialsProcess.php',
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
                    $("#alertSuccess").html(response.msg);
                    $("#alertSuccess").show();
                    $("#uploadMaterials").trigger("reset");
                    refreshTable();
                }
            }
        });
    });

    $('#uploadMaterials').change(function (event) {

        $("#alertError").hide();
        $("#alertSuccess").hide();

    });

    function refreshTable() {
        $.ajax({

            type: "POST",
            url: "materials/dispMaterials.php",
            data: {
                displayMaterials: true
            },
            dataType: "JSON",
            success: function (response) {
                console.log("harold");
                var content = ``;
                $.each(response, function (i, val) {
                    console.log(val.id);
                    content += `
            <tr id="matChoose" class="materialContainer" value="${val.id}" name="select">
            <th scope="row">${val.id}</th>
            <td>${val.code}</td>
            <td>${val.name}</td>
            <td>${val.category}</td>
            <td>${val.description}</td>
        </tr>
        `;
                });
                console.log(content);
                $('#materialsList').html(content);

                $('#table tr').click(function () {

                    $(this).find('tr id:matChoose').prop('checked', true);
                    $('#table tr').removeClass("table-primary");
                    $(this).addClass("table-primary");
                });

                $('.materialContainer').click(function (e) { //pwede yata i call si #table tr
                    e.preventDefault();
                    materialsId = $(this).data("id");
                    $('#hiddenId').val(materialsId);
                    dataFilter = response.filter(function (eachEditInfo) {
                        return eachEditInfo.id == materialsId;
                    })[0];

                    function imageRefresh() {
                        let contentEdit = ``;
                        $.each(dataFilter.image, function (indexInArray, data) {
                            contentEdit += `
                             <div class="col">
                                    <div class="border position-relative">
                                        <img src="../materials/${data}" class="d-block img-fluid img">
                                        <span class="deleteImgBtn position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            id="imageDeleteBtn"  data-id="${indexInArray}">
                                            X
                                        </span>
                                       
                                    </div>
                                </div>
                                <style> 
                                    .deleteImgBtn {
                                        cursor: pointer;
                                    }

                                    .deleteImgBtn:hover {
                                        background: #461217 !important;
                                    }
                                </style>
                             `
                        });
                        $('#view-editMats').html(contentEdit);
                        $('#edit-image').val(dataFilter.image);

                    }
                    imageRefresh();
                    $('#deleteBtn').attr("data-id", dataFilter.id);
                    $('#hiddenId').data("id", dataFilter.id);
                    $('#edit-title').val(dataFilter.title);
                    $('#edit-category').val(dataFilter.category);
                    $('#edit-description').html(dataFilter.description);
                    $('#editMaterialsModal').modal("show");

                    $('.deleteImgBtn').click(function (e) {
                        e.preventDefault();
                        deleteId = $(this).attr('data-id');
                        imageSplice = dataFilter.image.splice(deleteId, 1);
                        console.log(imageSplice);
                        imageRefresh();

                    });

                    $("#alertErrorEdit").hide();
                    $("#alertSuccessEdit").hide();

                    //create dito ng function pag magsusubmit ng edit materials
                });

            },
            error: function (response) {
                console.log("hello");
                console.log(response);
            }
        });
    }

});
