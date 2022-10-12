<?php

class Session
{
    public function sessionStart(User $user) {
        session_start();
        $_SESSION['user'] = $user->getEmail();
        $_SESSION['role'] = $user->getRole();
    }


    public function sessionDestroy(){
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(isset($_SESSION)){
            unset($_SESSION['user']);
            unset($_SESSION['role']);
            session_destroy();
        }
    }
}