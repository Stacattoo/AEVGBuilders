$(document).ready(function () {
    // console.log("alert");
    var userid = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "../reports/reportProcess.php",
        data: { getHandledClients: true },
        dataType: "JSON",
        success: function (dataResult) {
            var content = ``;
            $.each(dataResult.clients, function (indexInArray, c) {
                console.log(c);
                content += `
                <tr id="clientid" value="${c.id}">
            <td>${c.id}</td>
            <td>${c.name}</td>
            <td>${c.email}</td>
            <td>${c.contact_no}</td>
            <td>${c.status}</td>
        </tr>
                `;
            });
            $("#handledClientContent").html(content);

            //function pag ciniclick si table, nailaw.
            $('.tr').click(function() {

                $(this).find('tr id:clientid').prop('checked', true);
                $('.tr').removeClass("table-primary");
                $(this).addClass("table-primary");
            })
        }
    });

});