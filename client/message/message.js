$(document).ready(function () {
    
    $('#messageBubble').hide();
    displayMessage();

    $('#messageForm').submit(function (e) {
        
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../message/messageProcess.php",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $('#contentID').html("");
                if (response.status == 'success') {
                    displayMessage();
                }
            }, error: function(response) {
                console.error(response.responseText);
            }
        });
    });


    function displayMessage() {
        $.ajax({
            type: "POST",
            url: "../message/messageProcess.php",
            data: { getMessage: true },
            dataType: "JSON",
            success: function (response) {
                // $('#contentID').trigger("reset");
                console.log(response);
                var content = ``;
                $.each(response.content, function (indexInArray, val) { 
                    console.log(val);
                    var isClient = false;
                    if (val.sender == "client") {
                        isClient = true;
                    }
                     content += `
                        <div class="mb-3">
                            <small>${val.sender}</small>
                            <div class="${(isClient) ? "text-bg-primary":"text-bg-secondary"} p-2 rounded-4">${val.content}</div>
                            <small>${val.dateTime}</small>
                        </div>
                    `;
                });
                $('#contentID').trigger("reset");
                // $('#messageBubble').show();
                $("#messageRetrieve").html(content);
    
            }, error: function(response) {
                console.error(response);
            }
        });
    }
});