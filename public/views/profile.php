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
                My Profile
            </header>
            <section class="profile">
                <div class="profile-card">
                    <div class="profile-picture"><img src="public/uploads/<?= $profile->getImage() ?>"></div>
                    <div class="profile-text"><?= $profile->getUserName() ?></div>
                    <button type="button" class="profile-btn"><a href="profile_settings" class="profile-link">Settings</a></button>
                </div>

                <div class="statistics">
                    <div class="stat-title">Statistics</div>
                    <div class="stats">
                        <div class="stat">Weight: </div>
                        <div class="stat">The longest run: </div>
                        <div class="stat">The longest bike ride: </div>
                        <div class="stat">The longest swim distance: </div>
                        <div class="stat">The longest plank: </div>
                        <div class="stat">The heaviest bench press: </div>
                    </div>
                    <span>View more detailed statistics</span>
                </div>

                <div class="planned-exercises">
                    <div class="planned-exercises-title">Planned exercises</div>
                    <div class="plans">
                        <div class="plans-block">
                            <div class="title">
                                <span class="date">Date </span>
                                <span class="time">Time</span>
                            </div>
                        </div>
                        <div class="plans-block">
                            <div class="title">
                                <span class="date">Date </span>
                                <span class="time">Time</span>
                            </div>
                        </div>
                        <div class="plans-block">
                            <div class="title">
                                <span class="date">Date </span>
                                <span class="time">Time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>