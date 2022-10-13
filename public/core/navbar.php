<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['role'])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}
?>
<!--<button onclick="location.href='profile_settings'" type="button" class="profile-btn" > Settings</button>-->
<nav>
    <img src="public/img/logo.svg">
    <ul>
        <li>
            <i class="fa-solid fa-address-card"></i>
            <a href="profile" class="button">My Profile</a>
        </li>
        <li>
            <i class="fa-solid fa-dumbbell"></i>
            <a href="exercises" class="button">Exercises</a>
        </li>

        <!--        <li>-->
        <!--            <i class="fa-solid fa-user-group"></i>-->
        <!--            <a href="#" class="button">Friends</a>-->
        <!--        </li>-->
        <!--        <li>-->
        <!--            <i class="fa-solid fa-inbox"></i>-->
        <!--            <a href="#" class="button">Inbox</a>-->
        <!--        </li>-->


        <?
        if (!isset($_SESSION['role'])) {
            session_start();
        }
        if ($_SESSION['role'] === 1) {
            echo '<li>
                <i class="fa-solid fa-sliders"></i>
                <a href="settings" class="button">Settings</a>
            </li>';
        }
        ?>

        <li>
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="logout" class="button">Logout</a>
        </li>
    </ul>
</nav>