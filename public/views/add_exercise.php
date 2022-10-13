<!DOCTYPE html>
<head>
    <?
    include("public/core/head.php")
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">

    <title>EXERCISE</title>
</head>
<body>
<div class="base-container">
    <?
    include("public/core/navbar.php")
    ?>
    <main>
        <header>
            Add exercise
        </header>
        <div class="content-block">
            <div class="exercise-block add-exercise-block">
                <form class="exercise-form" action="add_ex" method="POST" ENCTYPE="multipart/form-data">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="exercise-name" type="text" placeholder="Exercise name" maxlength="50" required>
                    <select name="exercise-type" class="exercise-select">
                        <option value="endurance">Endurance</option>
                        <option value="strength">Strength</option>
                        <option value="team">Team</option>
                    </select>
                    <input name="statistic-name" type="text" placeholder="Name of statistic" maxlength="200">
                    <input type="hidden" name="email" value='<? echo $_SESSION['user'] ?>'>
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>