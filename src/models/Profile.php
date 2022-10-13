<?php

class Profile
{
    private $userName;
    private $name;
    private $surname;
    private $phone;
    private $city;
    private $image;


    public function __construct($userName, $name, $surname, $phone, $city, $image)
    {
        $this->userName = $userName;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->city = $city;
        $this->image = $image;
    }

    public function getUserName()
    {
        return $this->userName;
    }


    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }


    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }


    public function getPhone()
    {
        return $this->phone;
    }


    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getCity()
    {
        return $this->city;
    }


    public function setCity($city): void
    {
        $this->city = $city;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image): void
    {
        $this->image = $image;
    }


}