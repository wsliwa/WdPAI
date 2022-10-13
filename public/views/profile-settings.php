<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">

    <script src="https://kit.fontawesome.com/307549276f.js" crossorigin="anonymous"></script>
    <title>MY PROFILE</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fa-solid fa-address-card"></i>
                    <a href="#" class="button">My Profile</a>
                </li>
                <li>
                    <i class="fa-solid fa-dumbbell"></i>
                    <a href="#" class="button">My Exercises</a>
                </li>
                <li>
                    <i class="fa-solid fa-user-group"></i>
                    <a href="#" class="button">Friends</a>
                </li>
                <li>
                    <i class="fa-solid fa-inbox"></i>
                    <a href="#" class="button">Inbox</a>
                </li>
                <li>
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="#" class="button">Logout</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                Profile settings
            </header>
            <section class="profile-form">
                <form action="profileSettings" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $messages;
                        }
                    }
                    ?>
                    <input name="userName" type="text" placeholder="Username">
                    <input type="file" name="file">
                    <button type="submit">Save</button>
                </form>
            </section>
        </main>
    </div>
</body>