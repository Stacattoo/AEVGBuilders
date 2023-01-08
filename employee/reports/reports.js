$(document).ready(function () {

    // console.log("alert");
    var userid = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "../reports/reportProcess.php",
        data: { getHandledClients: true },
        dataType: "JSON",
        success: function (dataResult) {
            // console.log(dataResult);
            var content = ``;
            $.each(dataResult.clients, function (indexInArray, c) {
                console.log(c.id);
                content += `
                        <tr id="clientid" class="clientReport" data-id="${c.id}">
                            <td id="reportclientid">${c.id}</td>
                            <td>${c.name}</td>
                            <td>${c.email}</td>
                            <td>${c.contact_no}</td>
                            <td>${c.status}</td>
                        </tr>
                    `;
            });
            $("#handledClientContent").html(content);


            $('.clientReport').click(function () {
                // pag ciniclick si table, nailaw.
                // $(this).find('tr id:clientid').prop('checked', true);
                // $('.tr').removeClass("table-primary");
                // $(this).addClass("table-primary");

                var id = $(this).data("id");
                console.log($(this).html());
                $.ajax({
                    type: "POST",
                    url: "../reports/reportProcess.php",
                    data: {
                        getActivities: true,
                        clientId: id
                    },
                    dataType: "JSON",
                    success: function (activities) {
                        console.log(activities);
                        var content = ``;
                        $.each(activities, function (indexInArray, act) {
                            console.log(act);
                            content += `
                                <tr>
                                    <td>${act.status} </td>
                                    <td>${act.date_time}</td>
                                </tr>
                            `;
                        });
                        console.log(content);
                        $("#activities").html(content);
                        $("#activitiesModal").modal("show");

                        $('#printBtn').click(function (e) {
                            e.preventDefault();
                            print();
                        })
                    }, error: function (error) {
                        //
                    }
                });

            })
        }
    });

});