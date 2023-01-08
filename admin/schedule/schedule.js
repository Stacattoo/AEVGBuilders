

    // $('#dateFilter').submit(function (event) {
    //     event.preventDefault();
    //     $.ajax({
    //         url: "schedule/scheduleProcess.php",
    //         type: "POST",
    //         data: {
    //             displayResults: true
    //         },
    //         dataType: 'JSON',
    //         success: function (result) {

    //             var filtered = result.filter(function (data) {

    //                 let startDate = Date.parse($('#startDate').val())
    //                 let endDate = Date.parse($('#endDate').val())
    //                 let register_date = Date.parse(data.register_date)

    //                 if ((register_date <= endDate && register_date >= startDate)) {
    //                     return true;
    //                 }

    //                 return false;
    //             });
    //             console.log(filtered);
    //             var content = ``;
    //             $.each(filtered, function (i, data) {
    //                 content += `
    //                 <tr>
    //                 <td>` + data.fullName + `</td>
    //                 <td>` + data.register_date + `</td>
    //                 <td>` + data.result + `</td>
                    
    //                 </tr>
    //                 `;
    //             });
    //             $('#table').html(content);
    //         }
    //     });



    // });
