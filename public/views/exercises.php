<!DOCTYPE html>
<head>
    <?
    include("public/core/head.php")
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">

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
                <div class="search-bar">
                    <button class="new-exercise" onclick="location.href='add_exercise'">Add new exercise</button>
                </div>
                <div class="exercise-list">
                    <div class="exercise-tittle">Exercises</div>
                    <div class="exercise-link-tittle">
                        <table class="exercise-table">
                            <tbody class="exercise-tbody">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Author</th>
                            </tr>
                            <? foreach ($exercises as $exercise): ?>
                                <tr>

                                    <td>
                                        <form action="exercise" method="POST" ENCTYPE="multipart/form-data">
                                            <input type="hidden" name="id" value='<?= $exercise->getId() ?>'>
                                            <button class="new-exercise" type="submit"><?= $exercise->getExerciseName(); ?></button>
                                        </form>
                                    </td>
                                    <td><?= $exercise->getTypeName(); ?></td>
                                    <td><?= $exercise->getCreatedBy(); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>