
function displayUsers(searchQuery='') {
	$(document).ready(function () {
		$("#records").html("");
		$.ajax({
			type: "POST",
			url: "employeeProcess.php",
			data: { displayUsers: true },
			dataType: "JSON",
			success: function (response) {
				var content = ``;
				// var filtered = response.filter(function(data) {
				// 	searchQuery = searchQuery.toLowerCase();
				// 	return data.studentno.includes(searchQuery) 
				// 	|| data.fullName.toLowerCase().includes(searchQuery)
				// 	|| data.email.toLowerCase().includes(searchQuery)
				// 	|| data.strand.toLowerCase().includes(searchQuery); 
				// });
				$.each(response, function (i, data) {
					content += `
					<button type="button" class="student list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<h5 class="mb-1">`+ data.fullName + `</h5>
						<p class="mb-1">`+ data.email + `</p>
						<p class="mb-1">`+ data.address + `</p>
					</button>`;
				});
				$('#list').html(content);
			},
			error: function (dataResult) {
				console.log(dataResult);
			},
			complete: function () {
				$(".employee").click(function (e) {
					e.preventDefault();
					$(".employee").removeClass("active");
					$(this).addClass("active");
					var userid = $(this).attr("data-id");
					$.ajax({
						url: "employeeRecords.php",
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

