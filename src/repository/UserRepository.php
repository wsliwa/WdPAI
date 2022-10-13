<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users 
                INNER JOIN users_details ud on ud.id = users.id_users_details
                     WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['id_role'],
            $user['username']
        );
    }

    public function createUserDetails(string $username)
    {
        $stmt = $this->database->connect()->prepare("
            INSERT INTO public.users_details (id, name, surname, phone, city, username, image)
            VALUES (DEFAULT, null, null, null, null, :username, 'temp.png');
        ");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

    }

    public function checkIfUserExists(string $username)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT 1 FROM users_details WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);


    }

    public function getID( string $username)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM users_details WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return $user['id'];
    }

    public function getEmail(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT 1 FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }else{
            return 1;
        }
    }

    public function getUserName(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT username FROM users_details INNER JOIN users u on users_details.id = u.id_users_details WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @throws Exception
     */
    public function createUser(int $id, string $email, string $password)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (id, id_users_details, id_role, email, password, created_at)
            VALUES (DEFAULT, :id, 2, :email, :password, :time);
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $datetime = new DateTime("now", new DateTimeZone("Europe/Warsaw"));
        $time = $datetime->format('Y-m-d H:i:s');
        $stmt->bindParam('time', $time, PDO::PARAM_STR);
        $stmt->execute();

    }


    public function getUserID(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['id'];
    }

}