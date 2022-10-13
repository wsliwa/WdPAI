<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Profile.php';

class ProfileRepository extends Repository
{

    public function getProfile(string $email): ?Profile
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users
            INNER JOIN users_details ud on ud.id = users.id_users_details
            WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$profile) {
            return null;
        }

        return new Profile(
            $profile['username'],
            $profile['name'],
            $profile['surname'],
            $profile['phone'],
            $profile['city'],
            $profile['image']
        );
    }

    public function checkIfUsernameExist(string $username)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT 1 check FROM users_details WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);



        if (!$result) {
            return 0;
        }
        else {
            return $result['check'];
        }

    }

    public function getUserDetailsId(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id_users_details FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$id) {
            return null;
        }

        return $id['id_users_details'];
    }

    public function updateUserDetails(string $name, string $surname, string $phone, string $city, string $username, string $image, int $userId)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE public.users_details
            SET name     = :name,
                surname  = :surname,
                phone    = :phone,
                city     = :city,
                username = :username,
                image    = :image
            WHERE id = :id;
        ');
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function getFile(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users
            INNER JOIN users_details ud on ud.id = users.id_users_details
            WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $file_path = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$file_path) {
            return 'temp.png';
        }

        return $file_path['image'];
    }
}