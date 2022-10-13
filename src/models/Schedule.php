<?php

class Schedule {
    private $exerciseName;
    private $exerciseType;
    private $date;

    public function __construct($exerciseName, $exerciseType, $date)
    {
        $this->exerciseName = $exerciseName;
        $this->exerciseType = $exerciseType;
        $this->date = $date;
    }

    public function getExerciseName()
    {
        return $this->exerciseName;
    }

    public function setExerciseName($exerciseName): void
    {
        $this->exerciseName = $exerciseName;
    }

    public function getExerciseType()
    {
        return $this->exerciseType;
    }

    public function setExerciseType($exerciseType): void
    {
        $this->exerciseType = $exerciseType;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }



}