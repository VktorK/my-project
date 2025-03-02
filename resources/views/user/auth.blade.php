<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form id="login-form" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<div id="response"></div>

<script>
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('/login', {
            method: 'POST',
            body: formData,
            headers: {
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    localStorage.setItem('jwt', data.token);
                    document.getElementById('response').innerText = 'Login successful!';
                } else {
                    document.getElementById('response').innerText = 'Login failed: ' + data.error;
                }
            })
            .catch(error => {
                document.getElementById('response').innerText = 'An error occurred: ' + error.message;
            });
    });
</script>
</body>
</html>
