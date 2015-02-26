<?php

$loginForm = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example Login Form</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <form class="form-signin" method="POST" action="http://local.dev/Project1/public/auth.php">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" required autofocus name="username" />
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" required name="password" />
                <div class="radio">
                    <label>
                        <input type="radio" name="auth" value="in-memory" checked> In Memory
                        <input type="radio" name="auth" value="file-based"> File Based
                    </label>
                </div>
                <button class="btn" type="submit" value="Login" />Login</button>
            </form>
        </div>
    </body>
</html>
LOGIN_FORM;

echo $loginForm;
