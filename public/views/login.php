<!DOCTYPE html>

<head>
    <?
    include("public/core/head.php")
    ?>
    <title>LOGIN PAGE</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <button type="submit">LOGIN</button>
                <button onclick="location.href='signup'" type="button">SIGN UP</button>
            </form>
        </div>
    </div>
</body>