<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    public function login()
    {
        $userRepository = new UserRepository();


        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);


        if (!$user) {
            return $this->render('login', ['messages' => ['User does not exist!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        $userVerification = password_verify($password, $user->getPassword());

        if (!$userVerification) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $this->session->sessionStart($user);
//        session_start();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/profile");
    }

    /**
     * @throws Exception
     */
    public function register() {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('signup');
        }

        $email = $_POST['email'];
        $password = $_POST['r_password'];
        $username = $_POST['username'];

        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        $userID = $userRepository->getID($username);

        $userMail = $userRepository->getEmail($email);

        if ($userID === null && $userMail === null) {
            $userRepository->createUserDetails($username);
            $userID = $userRepository->getID($username);
            $userRepository->createUser($userID, $email, $password_hashed);

            return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
        }
        else {
            return $this->render('signup', ['messages' => ['User exists!']]);
        }
    }

    public function logout()
    {
        $this->session->sessionDestroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/index");
    }
}