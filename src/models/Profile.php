<?php

class Profile
{
    private $userName;
    private $image;


    public function __construct($userName, $image)
    {
        $this->userName = $userName;
        $this->image = $image;
    }


    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }


}