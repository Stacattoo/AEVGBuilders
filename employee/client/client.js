function displayClient(searchQuery = '') {
	$(document).ready(function () {
		$.ajax({
			type: "POST",
			url: "../client/clientProcess.php",
			data: { displayClient: true },
			dataType: "JSON",
			success: function (response) {
				var content = ``;
				var filtered = response.filter(function (data) {
					searchQuery = searchQuery.toLowerCase();
					return data.email.includes(searchQuery)
						|| data.fullName.toLowerCase().includes(searchQuery)
						|| data.status == searchQuery;
				});
				$.each(filtered, function (i, data) {

					content += `
					<button type="button" class="client list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<h5 class="text-capitalize mb-1">`+ data.fullName + `</h5>
						<p class="mb-1">`+ data.email + `</p>
					</button>`;
				});
				$('#list').html(content);
			},
			error: function (dataResult) {
				console.log(dataResult);
			},
			complete: function () {
				
				$(".client").click(function (e) {
					e.preventDefault();
					$(".client").removeClass("active");
					$(this).addClass("active");
					var userid = $(this).attr("data-id");
					$.ajax({
						url: "../client/clientRecords.php",
						type: "POST",
						data: {
							id: userid
						},
						success: function (dataResult) {
							$("#records").html(dataResult);
						},
						error: function (result) {
							console.log(result);
						}
					});
				});
			}
		});
	});
}


$(document).ready(function () {
$('.statusBtn').click(function(e) {
	e.preventDefault();
	var status = $(this).data("status");
	var id = $('#idClient').html();
	debugger
	$.ajax({
		url: "../client/clientProcess.php",
		type: "POST",
		data: {
			updateStatus: id,
			clientStatus: status 
		},
		success: function(dataResult) {
			$('#statusId').html(status);
			console.log(dataResult);
		}, error: function (error) {
			console.error(error);
		}
	});
});
});
