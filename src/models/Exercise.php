<?php

class Exercise
{
    private $id;
    private $typeName;
    private $exerciseName;
    private $createdBy;
    private $status;
    private $statistic_name;

    public function __construct($id, $typeName, $exerciseName, $createdBy, $status, $statistic_name)
    {
        $this->typeName = $typeName;
        $this->exerciseName = $exerciseName;
        $this->createdBy = $createdBy;
        $this->status = $status;
        $this->id = $id;
        $this->statistic_name = $statistic_name;
    }

    public function getStatisticName()
    {
        return $this->statistic_name;
    }

    public function setStatisticName($statistic_name): void
    {
        $this->statistic_name = $statistic_name;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTypeName()
    {
        return $this->typeName;
    }

    public function setTypeName($typeName): void
    {
        $this->typeName = $typeName;
    }

    public function getExerciseName()
    {
        return $this->exerciseName;
    }

    public function setExerciseName($exerciseName): void
    {
        $this->exerciseName = $exerciseName;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function setCreatedBy($createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }



}