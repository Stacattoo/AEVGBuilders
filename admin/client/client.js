
function displayUsers(searchQuery='') {
	$(document).ready(function () {
		// $("#records").html("");
		
		$.ajax({
			type: "POST",
			url: "client/clientProcess.php",
			data: { displayUsers: true },
			dataType: "JSON",
			success: function (response) {
				var content = ``;
				var filtered = response.filter(function(data) {
					searchQuery = searchQuery.toLowerCase();
					return data.email.includes(searchQuery) 
					|| data.fullName.toLowerCase().includes(searchQuery)
					|| data.email.toLowerCase().includes(searchQuery)
				});
				$.each(filtered, function (i, data) {
					content += `
					<button type="button" class="student list-group-item list-group-item-action" data-id='`+ data.id + `'>
						<h5 class="mb-1">`+ data.fullName + `</h5>
						<p class="mb-1">`+ data.email + `</p>
					</button>`;
				});
				$('#list').html(content);
			},
			error: function (dataResult) {
				console.log(dataResult);
			},
			complete: function () {
				$(".student").click(function (e) {
					e.preventDefault();
					$(".student").removeClass("active");
					$(this).addClass("active");
					var userid = $(this).attr("data-id");
					$.ajax({
						url: "client/clientRecords.php",
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

