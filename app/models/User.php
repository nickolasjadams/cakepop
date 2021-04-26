<?php

namespace App\Models;

use App\Helpers\Facades\Log;
use App\Models\Model;
use Database\Connection as DB;
use App\Helpers\Session;
use PDO;

class User extends Model
{

    private $password, $admin;

    public $id, $email, $first_name, $last_name, $created_at;
        
    /**
     * Creates and returns a User object. Does not save to database.
     * Save to database by chaining the save method.
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $email
     * @param  string $password plaintext
     * @return User
     */
    public function create($first_name, $last_name, $email, $hash_password) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $hash_password;
        return $this;
    }
    
    /**
     * Save a user object with the minimum requirements from the create method
     * to the database.
     */
    public function save() {
        $db = DB::make();
        $statement = $db->prepare(
            'INSERT INTO users ' .
            '       (first_name, last_name, email, password)' .
            "VALUES ((:first_name), (:last_name), (:email), (:password));"
        );
        $statement->bindParam(":first_name", $this->first_name);
        $statement->bindParam(":last_name", $this->last_name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":password", $this->password);
        $statement->execute();
        $db = null;
    }
    
    /**
     * Returns the password.
     *
     * @return string Password
     */
    public function password() {
        return $this->password;
    }

        
    /**
     * Sets password on object and saves to database.
     *
     * @param  mixed $id
     * @param  string $password plaintext
     * @return void
     */
    public function setPassword($id, $password) {
        $password = htmlspecialchars($password);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hash_password;
        $db = DB::make();
        $statement = $db->prepare(
            'UPDATE users ' .
            '   SET password = (:password)' .
            '   WHERE id = ' . $id
        );
        $statement->bindParam(":password", $this->password);
        $statement->execute();
        $db = null;
    }

    public function isAdmin() {
        return $this->admin;
    }
    
    /**
     * Updates user info on the object and saves to database.
     *
     * @param  mixed $form_data_array Assosiative array can be retrieved by post or session. email, first_name, last_name
     * @return bool Returns true if successful
     */
    public function updateInfo($form_data_array) {

        // update this object
        foreach ($form_data_array as $key => $value) {
            if (array_key_exists($key, $form_data_array)) {
                $this->{$key} = $form_data_array[$key];
            }
        }

        $db = DB::make();
        $statement = $db->prepare(
            'UPDATE users ' .
            '   SET email = (:email), first_name = (:first_name), last_name = (:last_name)' .
            '   WHERE id = (:id)'
        );
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":first_name", $this->first_name);
        $statement->bindParam(":last_name", $this->last_name);
        $statement->bindParam(":id", $this->id);
        $success = $statement->execute();
        $db = null;
        if (!$success) {
            Session::pushError('db_update', 'Error updating your account. Please try again later.');
            Log::error("User {$this->id()} account database could not be updated.");
            return false;
        }
        return true;
    }

    public static function exists($email) {
        $db = DB::make();
        $statement = $db->prepare("SELECT email FROM users WHERE email = (:email)");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        d($users);
        $db = null;
        return (sizeof($users) > 0) ? true : false;
    }
}