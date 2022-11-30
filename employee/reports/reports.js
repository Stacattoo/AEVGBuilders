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
                // console.log(c);
                content += `
                        <tr id="clientid" data-bs-toggle="modal" href="#activitiesModal" data-id="${c.id}">
                            <td id="reportclientid">${c.id}</td>
                            <td>${c.name}</td>
                            <td>${c.email}</td>
                            <td>${c.contact_no}</td>
                            <td>${c.status}</td>
                        </tr>
                    `;
            });
            $("#handledClientContent").html(content);

            
            $('#clientid').click(function () {
                // pag ciniclick si table, nailaw.
                // $(this).find('tr id:clientid').prop('checked', true);
                // $('.tr').removeClass("table-primary");
                // $(this).addClass("table-primary");
                var id = $('#reportclientid').html();
                console.log(id);
                $.ajax({
                    type: "POST",
                    url: "../reports/reportProcess.php",
                    data: {getActivities: true, 
                    clientId: id
                    },
                    dataType: "JSON",
                    success: function (activities) {
                        console.log("pasok ba");
                        var content = ``;
                        $.each(activities, function (indexInArray, act) { 
                            console.log(act);
                            content += `
                                <tr id="actrow" >
                                    <td>${act.client_id}</td>
                                    <td>Registration date: </td>
                                    <td>${act.date_time}</td>
                                </tr>
                            `;
                        });
                        $("#activities").html(content);
                    }, error: function(error){
                        //
                    }
                });

            })
        }
    });

});