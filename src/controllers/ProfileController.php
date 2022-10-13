<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Profile.php';
require_once __DIR__ . '/../repository/ProfileRepository.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class ProfileController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $profileRepository;

    public function __construct()
    {
        parent::__construct();
        $this->profileRepository = new ProfileRepository();
    }

    public function profile()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['role'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $profile = $this->profileRepository->getProfile($_SESSION['user']);
        $schedule = $this->profileRepository->getSchedule();
        $this->render('profile', ['profile' => $profile, 'schedule' => $schedule]);
    }

    public function profile_settings(array $message = [])
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['role'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $profile = $this->profileRepository->getProfile($_SESSION['user']);
        $this->render('profile_settings', ['profile' => $profile, 'messages' => $message]);
    }

    public function profileSettings()
    {
        if (!empty($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))
        {
            $file_path = $_FILES['file']['name'];
            $validation = $this->validate($_FILES['file']);
            if (!$validation) {
                return $this->render('profile-settings', ['messages' => $this->messages]);
            }
            else {
                move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY . $file_path
                );
            }
        }
        else {
            $file_path = $this->profileRepository->getFile($_POST['email']);
        }


        if ($this->isPost()) {

            $username = $this->profileRepository->checkIfUsernameExist($_POST['userName']);
            if ($username === 1) {
                return $this->profile_settings(['Username already exists!']);
            }

            $userID = $this->profileRepository->getUserDetailsId($_POST['email']);


            $this->profileRepository->updateUserDetails($_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['city'], $_POST['userName'], $file_path, $userID);


            $profile = new Profile($_POST['userName'], $_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['city'], $file_path);

            $this->profile_settings(['Settings saved']);
        }
        else {
            $this->profile_settings(['Can not update settings!']);
        }
    }

    private function validate($file)
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type not supported';
            return false;
        }

        return true;
    }
}