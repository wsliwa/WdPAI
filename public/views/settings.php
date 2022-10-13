<!DOCTYPE html>
<head>
    <?
    include("public/core/head.php")
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">

    <title>EXERCISES</title>
</head>
<body>
<div class="base-container">
    <?
    include("public/core/navbar.php")
    ?>
    <main>
        <header>
            Exercises
        </header>
        <div class="content-block">
            <div class="exercise-block">
                <div class="exercise-list">
                    <div class="settings-tittle">Exercises settings</div>
                    <? if (!isset($exercise)) {
                            echo 'No new exercises';
                        }
                        else {
                            echo ('
                                <div class="exercise-settings">
                                    <div>Name of exercise: '.$exercise->getExerciseName().'</div>
                                    <div>Type of exercise: '.$exercise->getTypeName().'</div>
                                    <div>Exercise created by: '.$exercise->getCreatedBy().'</div>
                                    <div>Statistic tittle: '.$exercise->getStatisticName().'</div>
                                </div>
                                <div class="exercise-choice">
                                    <form class="exercise-form exercise-form-choice" action="accept_ex" method="POST" ENCTYPE="multipart/form-data">
                                        <input type="hidden" name="id" value='.$exercise->getId().'>
                                        <button class="new-exercise" type="submit">Accept</button>
                                    </form>
                                    <form class="exercise-form exercise-form-choice" action="reject_ex" method="POST" ENCTYPE="multipart/form-data">
                                        <input type="hidden" name="id" value='.$exercise->getId().'>
                                        <button class="new-exercise" type="submit">Reject</button>
                                    </form>
                                </div>
                            ');
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
</div>
</body>