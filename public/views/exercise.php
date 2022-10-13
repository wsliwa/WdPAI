<!DOCTYPE html>
<head>
    <?php
    include("public/core/head.php")
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">
    <link rel="stylesheet" type="text/css" href="public/css/exercise.css">

    <title>EXERCISE</title>
</head>
<body>
<div class="base-container">
    <?php
    include("public/core/navbar.php")
    ?>
    <main>
        <header>
            Exercise
        </header>
        <div class="content-block">
            <div class="exercise-block exercise-schedule-block">
                <div class="exercise-schedule">
                    <div>Name of exercise: <?= $exercise->getExerciseName() ?></div>
                    <div>Type of exercise: <?= $exercise->getTypeName() ?></div>
                    <div>Exercise created by: <?= $exercise->getCreatedBy() ?></div>
                    <div>Statistic tittle: <?= $exercise->getStatisticName() ?></div>
                </div>
                <form class="exercise-schedule-form" action="schedule_ex" method="POST" ENCTYPE="multipart/form-data">
                    <input type="datetime-local" id="meeting-time"
                           name="schedule" value="<?php
                            $currentDateTime = date('Y-m-d H:i:s');
                            echo $currentDateTime;
                            ?>"
                           min="<?= $currentDateTime?>>" max="2025-06-14T00:00">
                    <input type="hidden" name="id" value='<?= $exercise->getId() ?>'>
                    <input type="hidden" name="email" value='<?= $_SESSION['user'] ?>'>
                    <button class="new-exercise" type="submit">Schedule</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>