<!DOCTYPE html>
<head>
    <?
    include("public/core/head.php")
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">

    <title>MY PROFILE</title>
</head>
<body>
    <div class="base-container">
        <?
        include("public/core/navbar.php")
        ?>
        <main>
            <header>
                Profile settings
            </header>
            <section class="profile-form">
                <form class="profile-settings-form" action="profileSettings" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="userName" type="text" placeholder="Username" maxlength="25" value='<? echo $profile->getUserName() ?>' required>
                    <input name="name" type="text" placeholder="Name" maxlength="25" value='<? echo $profile->getName() ?>' required>
                    <input name="surname" type="text" placeholder="Surname" maxlength="50" value='<? echo $profile->getSurname() ?>' required>
                    <input name="phone" type="tel" pattern="[0-9]{9}" placeholder="Phone number" max="9" value='<? echo $profile->getPhone() ?>' required>
                    <input name="city" type="text" placeholder="City" maxlength="50" value='<? echo $profile->getCity() ?>' required>
                    <input type="file" name="file">
                    <input type="hidden" name="email" value='<? echo $_SESSION['user'] ?>'>
                    <button type="submit">Save</button>
                </form>
            </section>
        </main>
    </div>
</body>