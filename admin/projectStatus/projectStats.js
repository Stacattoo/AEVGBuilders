$(document).ready(function () {
    
    $.ajax({
        type: "POST",
        url: "projectStatus/projectStatsProcess.php",
        data: {pojStats: true},
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            var content = ``;
            $.each(response, function (indexInArray, stats) { 
                content += `
                <tr id="clientid" class="clientReport"">
                   
                    <td>${stats.clientName}</td>
                    <td>${stats.empName}</td>
                    <td>${stats.id}</td>
                    <td>${stats.status}</td>
                    <td>${stats.transaction_date}</td>
                </tr>
            `;
            });
            $("#projStatus").html(content);
        }, error: function (error) {
            console.error(error);
        }
    });
});