<!DOCTYPE html>
<head>
    <?php
    include("public/core/head.php")
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <title>MY PROFILE</title>
</head>
<body>
<div class="base-container">
    <?php
    include("public/core/navbar.php")
    ?>
    <main>
        <header>
            My Profile
        </header>
        <section class="profile">
            <div class="profile-card">
                <!--                    TODO fix it-->
                <div class="profile-picture">
                    <img src="public/uploads/<?= $profile->getImage(); ?>">
                    <!--                        <img src="public/uploads/temp.png">-->
                </div>
                <div class="profile-text">
                    <?= $profile->getUserName() ?>
                </div>
                <button onclick="location.href='profile_settings'" type="button" class="profile-btn"> Settings</button>
            </div>

            <div class="statistics">
                <div class="stat-title">Statistics</div>
                <div class="stats">
                    <div class="stat">Weight:</div>
                    <div class="stat">The longest run:</div>
                    <div class="stat">The longest bike ride:</div>
                    <div class="stat">The longest swim distance:</div>
                    <div class="stat">The longest plank:</div>
                    <div class="stat">The heaviest bench press:</div>
                </div>
                <span>View more detailed statistics</span>
            </div>

            <div class="planned-exercises">
                <div class="planned-exercises-title">Planned exercises</div>
                <div class="plans">
                    <div class="plans-block">
                        <div class="title">
                            <div><?= $schedule->getExerciseName() ?></div>
                            <div><?= $schedule->getExerciseType() ?></div>
                            <div><?php
                                $date = str_replace('T', ' ', $schedule->getDate());
                                echo $date ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>