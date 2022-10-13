<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Exercise.php';

class ExerciseRepository extends Repository
{

    public function getExercises(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT exercises.id, et.name type, exercises.name, u.email, exercises.status, exercises.statistic_name FROM exercises
            INNER JOIN exercise_types et on et.id = exercises.id_type
            INNER JOIN users u on u.id = exercises.created_by
            WHERE status = 1 ORDER BY et.name
        ');
        $stmt->execute();
        $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($exercises as $exercise){
            $result[] = new Exercise(
                $exercise['id'],
                $exercise['type'],
                $exercise['name'],
                $exercise['email'],
                $exercise['status'],
                $exercise['statistic_name']
            );
        }

        return $result;

    }

    public function addExercise(int $idType, int $idUser, string $name, string $statName)
    {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO public.exercises (id, id_type, name, created_by, status, statistic_name)
            VALUES (DEFAULT, :idType , :name, :idUser, 0, :statName);
        ");
        $stmt->bindParam(':idType', $idType, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->bindParam(':statName', $statName, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function exerciseForValidation(): ?Exercise
    {
        $stmt = $this->database->connect()->prepare("
            SELECT exercises.id, et.name type, exercises.name, u.email, exercises.status, exercises.statistic_name FROM exercises
            INNER JOIN exercise_types et on et.id = exercises.id_type
            INNER JOIN users u on u.id = exercises.created_by
            WHERE status = 0 LIMIT 1
        ");

        $stmt->execute();
        $exercise = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$exercise) {
            return null;
        }

        return new Exercise(
            $exercise['id'],
            $exercise['type'],
            $exercise['name'],
            $exercise['email'],
            $exercise['status'],
            $exercise['statistic_name']
        );
    }

    public function changeStatus(int $id)
    {
        $stmt = $this->database->connect()->prepare("
            UPDATE public.exercises
            SET status = 1
            WHERE id = :id;
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteExercise(int $id)
    {
        $stmt = $this->database->connect()->prepare("
            DELETE
            FROM public.exercises
            WHERE id = :id;
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}