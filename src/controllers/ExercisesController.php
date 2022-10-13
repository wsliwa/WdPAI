<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Exercise.php';
require_once __DIR__ . '/../repository/ExerciseRepository.php';

class ExercisesController extends AppController
{

    private $exerciseRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->exerciseRepository = new ExerciseRepository();
        $this->userRepository = new UserRepository();
    }

    public function exercises()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['role'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $exercises = $this->exerciseRepository->getExercises();
        $this->render('exercises', ['exercises' => $exercises]);
    }

    public function add_exercise(array $message = [])
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['role'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $this->render('add_exercise', ['messages' => $message]);
    }

    public function settings(array $message = [])
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['role'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

        $exercise = $this->exerciseRepository->exerciseForValidation();
        $this->render('settings', ['exercise' => $exercise, 'messages' => $message]);
    }

    public function add_ex()
    {
        if ($this->isPost()) {
            $id = $this->userRepository->getUserID($_POST['email']);

            $id_type = 0;

            if ($_POST['exercise-type'] === 'endurance'){
                $id_type = 1;
            }
            elseif ($_POST['exercise-type'] === 'strength') {
                $id_type = 2;
            }
            elseif ($_POST['exercise-type'] === 'team') {
                $id_type = 3;
            }

            if (empty($_POST['statistic-name'])) {
                $statistic = '';
            }
            else{
                $statistic = $_POST['statistic-name'];
            }

            $this->exerciseRepository->addExercise($id_type, $id, $_POST['exercise-name'], $statistic);
//            $this->render('add_exercise', ['messages' => ['Added new exercise!']]);
            $this->add_exercise(['Added new exercise!']);
        }
        else {
//            $this->render('add_exercise', ['messages' => ['Error']]);
            $this->add_exercise(['Error!']);
        }
    }

    public function accept_ex()
    {
        if ($this->isPost()) {
            $this->exerciseRepository->changeStatus($_POST['id']);

            $this->settings(['Accepted exercise']);
        }
        else {
            $this->settings(['Could not accepted exercise']);
        }
    }

    public function reject_ex()
    {
        if ($this->isPost()) {
            $this->exerciseRepository->deleteExercise($_POST['id']);

            $this->settings(['Rejected exercise']);
        }
        else {
            $this->settings(['Could not rejected exercise']);
        }
    }


}