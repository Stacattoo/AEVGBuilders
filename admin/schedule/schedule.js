

function displayResults() {
    $(document).ready(function () {
        $('#table').html("");
        $.ajax({
            url: "schedule/scheduleProcess.php",
            type: "POST",
            data: {
                displayResults: true
            },
            dataType: 'JSON',
            success: function (result) {
                console.log(result);
                var content = ``;
                $.each(result, function (i, data) {
                    content += `
                    <tr>
                    <td>` + data.employeeName + `</td>
                    <td>` + data.clientName + `</td>
                    <td>` + data.dateStart + `</td>
                    <td>` + data.dateEnd + `</td>
                    <td>` + data.status + `</td>
                    
                    </tr>
                    `;
                });
                $('#table').html(content);
            }
        });

        $("#print").click(function (e) {
           e.preventDefault();
           
        });

    });

    $('#dateFilter').submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "schedule/scheduleProcess.php",
            type: "POST",
            data: {
                displayResults: true
            },
            dataType: 'JSON',
            success: function (result) {

                var filtered = result.filter(function (data) {

                    let startDate = Date.parse($('#startDate').val())
                    let endDate = Date.parse($('#endDate').val())
                    let register_date = Date.parse(data.register_date)

                    if ((register_date <= endDate && register_date >= startDate)) {
                        return true;
                    }

                    return false;
                });
                console.log(filtered);
                var content = ``;
                $.each(filtered, function (i, data) {
                    content += `
                    <tr>
                    <td>` + data.fullName + `</td>
                    <td>` + data.register_date + `</td>
                    <td>` + data.result + `</td>
                    
                    </tr>
                    `;
                });
                $('#table').html(content);
            }
        });



    });
}

const sampleTable = [{
    id: 1,
    firstname: "Christian",
    lastname: "Aniag",
    age: 23,
    result: 'yes'
}, {
    id: 2,
    firstname: "Gaeb",
    lastname: "Pangan",
    age: 22,
    result: 'yes'
}, {
    id: 3,
    firstname: "Hanna",
    lastname: "Sagun",
    age: 22,
    result: 'yes'
}, {
    id: 1,
    firstname: "Christian",
    lastname: "Aniag",
    age: 23,
    result: 'no'
},

];

// console.log(sampleTable);

var content = ``;
$.each(sampleTable, function (i, data) {
    content += `
    <tr>
    <td>` + data.firstname + `</td>
    <td>` + data.lastname + `</td>
    <td>` + data.age + `</td>
    <td>` + data.result + `</td>
    
    </tr>
    `;
});
$('#tableSample').html(content);
