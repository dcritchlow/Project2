<?php

namespace Views;


class Error extends View
{
    public function __construct($message = '')
    {
        $this->content = <<<ERROR

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="bs-callout bs-callout-warning">$message</div>
            <form class="form-signin" method="POST" action="/auth">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" required autofocus name="username" />
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" required name="password" />
                <div class="radio">
                    <label>
                        <input type="radio" name="auth" value="in-memory" checked> In Memory
                        <input type="radio" name="auth" value="file-based"> File Based
                        <input type="radio" name="auth" value="mysql"> MySQL
                        <input type="radio" name="auth" value="sqlite"> SQLite
                    </label>
                </div>
                <button class="btn" name="Login" type="submit" value="Login" />Login</button>
            </form>
        </div>
    </body>
</html>

ERROR;

    }
}