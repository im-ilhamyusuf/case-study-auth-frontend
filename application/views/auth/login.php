<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Auth</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row" style="height: 100vh;">
			<div class="d-flex align-items-center justify-content-center">
				<div class="card" style="width: 350px">
					<div class="card-body p-4">
						<form id="formLogin">
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" id="email" class="form-control" required>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" id="password" class="form-control" required>
							</div>
							<input type="submit" value="Login" class="btn btn-primary w-100">
							<div class="alert alert-danger mt-3 mb-2 d-none" id="alertFailled">
								Email / Password Salah!
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
	</script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
		crossorigin="anonymous"></script>

	<script>
		$('#formLogin').on('submit', e => {
			e.preventDefault();

			let data = {
				'email': $('#email').val(),
				'password': $('#password').val()
			}

			$.ajax({
				method: 'POST',
				url: 'https://account.bisa.ai/auth/login',
				data,
				success: (res) => {
					if (res.status) {
						localStorage.setItem('userData', JSON.stringify(res.userdata))
						localStorage.setItem('tokenSSO', res.token)

						window.location.href = `/${location.search.split('redirect=')[1]}`
					} else {
						$('#alertFailled').removeClass('d-none');
					}
				}
			})
		})

	</script>
</body>

</html>
