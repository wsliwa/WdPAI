<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index() {
        $this->render('login');
    }

    public function signup() {
        $this->render('signup');
    }

    public function profile() {
        $this->render('profile');
    }

    public function friends() {
        $this->render('friends');
    }

    public function profile_settings()
    {
        $this->render('profile_settings');
    }
}