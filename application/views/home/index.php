<!DOCTYPE html>
<html>

<head>
	<title>Ajax API</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<h2>Ajax API</h2>
	<div id="loginForm">
		<input type="text" id="username" placeholder="Username">
		<input type="password" id="password" placeholder="Password">
		<button id="btnLogin">Login</button>
	</div>
	<div id="loggedInContent">
		<h3>Welcome!</h3>
		<button id="btnLogout">Logout</button>

		<div id="dataContainer"></div>
		<h3>Add Data</h3>
		<input type="text" id="title" placeholder="Title">
		<input type="text" id="author" placeholder="Author">
		<button id="btnAdd">Add</button>

		<h3>Update Data</h3>
		<input type="text" id="updatedTitle" placeholder="Updated Title">
		<input type="text" id="updatedAuthor" placeholder="Updated Author">
		<input type="text" id="updateId" placeholder="Id Update">

		<button id="btnUpdate">Update</button>

		<h3>Delete Data</h3>
		<input type="text" id="deleteId" placeholder="ID">
		<button id="btnDelete">Delete</button>
	</div>

	<script>

		var userToken;
		var userId;
		$(document).ready(function () {
			$('#btnLogin').click(function () {
				var username = $('#username').val();
				var password = $('#password').val();

				var loginData = {
					username: username,
					password: password
				};
				$.ajax({
					url: 'http://localhost/CodeigniterRestApi/index.php/auth/login',
					type: 'POST',
					data: loginData,
					headers: {
						'Client-Service': 'frontend-client',
						'Auth-Key': 'simplerestapi'
					},
					success: function (response) {
						console.log(response);
						let dataResponse = JSON.parse(response);
						if (dataResponse.status === 200) {
							localStorage.setItem('userId', dataResponse.id);
							localStorage.setItem('userToken', dataResponse.token);

						} else {
							console.log('Login failed');
						}
					},
					error: function (xhr, status, error) {
						console.log(xhr.status + ': ' + xhr.responseText);
					}
				});
			});
			$('#btnLogout').click(function () {

				$.ajax({
					url: 'http://localhost/CodeigniterRestApi/index.php/auth/logout',
					type: 'POST',
					headers: {
						'Client-Service': 'frontend-client',
						'Auth-Key': 'simplerestapi'
					},
					success: function (response) {
						if (response.status === 200) {
							$('#loginForm').show();
							$('#loggedInContent').hide();
							$('#username').val('');
							$('#password').val('');
						} else {
							alert('Logout failed. Please try again.');
						}
					},
					error: function (xhr, status, error) {
						console.log(xhr.responseText);
					}
				});
			});
		});

		$('#btnAdd').click(function () {
			var title = $('#title').val();
			var author = $('#author').val();
			var newData = {
				title: title,
				author: author,
			};

			$.ajax({
				url: 'http://localhost/CodeigniterRestApi/index.php/book/create',
				type: 'POST',
				data: newData,
				headers: {
					'Client-Service': 'frontend-client',
					'Auth-Key': 'simplerestapi',
					'User-ID': localStorage.getItem('userId'),
					'Authorization': localStorage.getItem('userToken'),
				},
				success: function (response) {
					if (response.status === 201) {
						console.log('Data has been created');
						loadData();

					} else {
						console.log(response);
					}
				},
				error: function (xhr, status, error) {
					console.log(xhr.responseText);
				}
			});
		});


		// Update data
		$('#btnUpdate').click(function () {
			var updatedTitle = $('#updatedTitle').val();
			var updatedAuthor = $('#updatedAuthor').val();

			var updatedData = {
				title: updatedTitle,
				author: updatedAuthor
			};

			var idUpdate = $('#updateId').val();
			console.log(idUpdate);

			$.ajax({
				url: 'http://localhost/CodeigniterRestApi/index.php/book/update/' + idUpdate,
				type: 'PUT',
				data: updatedData,
				headers: {
					'Client-Service': 'frontend-client',
					'Auth-Key': 'simplerestapi',
					'User-ID': localStorage.getItem('userId'),
					'Authorization': localStorage.getItem('userToken'),
				},
				success: function (response) {
					if (response.status === 200) {
						console.log('Data has been updated');
						loadData();

					} else {
						console.log('Update data failed');
					}
				},
				error: function (xhr, status, error) {
					console.log(xhr.responseText);
				}
			});
		});

		// Delete data
		$('#btnDelete').click(function () {
			var id = $('#deleteId').val();
			$.ajax({
				url: 'http://localhost/CodeigniterRestApi/index.php/book/delete/' + id,
				type: 'DELETE',
				headers: {
					'Client-Service': 'frontend-client',
					'Auth-Key': 'simplerestapi',
					'User-ID': localStorage.getItem('userId'),
					'Authorization': localStorage.getItem('userToken'),
				},
				success: function (response) {
					if (response.status === 200) {
						console.log('Data has been deleted');
						loadData();


					} else {
						console.log('Delete data failed');
					}
				},
				error: function (xhr, status, error) {
					console.log(xhr.responseText);
				}
			});
		});

		// Function to load data from the API
		function loadData() {
			$.ajax({
				url: 'http://localhost/CodeigniterRestApi/index.php/book',
				type: 'GET',
				dataType: 'json', // Specify the expected data type
				headers: {
					'Client-Service': 'frontend-client',
					'Auth-Key': 'simplerestapi',
					'User-ID': localStorage.getItem('userId'),
					'Authorization': localStorage.getItem('userToken'),
				},
				success: function (response) {
					console.log(response);
					if (response.status === 200) {
						var dataContainer = $('#dataContainer');
						dataContainer.empty(); // Clear previous data

						// Iterate over the data and display it
						$.each(response.data, function (index, item) {
							var dataItem = $('<p>').text('ID: ' + item.id + ', Title: ' + item.title + ', Author: ' + item.author);
							dataContainer.append(dataItem);
						});
					} else {
						console.log('Load data failed');
					}
				},
				error: function (xhr, status, error) {
					console.log(xhr.responseText);
				}
			});
		}

		loadData();



	</script>
</body>

</html>
