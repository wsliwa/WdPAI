<!DOCTYPE html>

<head>
    <?
    include("public/core/head.php")
    ?>
    <title>SIGNUP</title>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="login">
                <img src="public/img/logo.svg"/>
            </a>
        </div>
        <div class="login-container">
            <form class="signup" action="register" method="POST">
                <div class="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com" required>
                <input name="password" type="password" placeholder="password" required>
                <input name="r_password" type="password" placeholder="repeat password" required>
                <input name="username" type="text" placeholder="username" required>
                <button type="submit">SIGN UP</button>
            </form>
        </div>
    </div>
</body>