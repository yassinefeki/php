<?php

require_once 'app\models\ModelUser.php'; // Assurez-vous que le chemin d'accès est correct
require_once 'app\models\Database.php'; // Assurez-vous que le chemin d'accès est correct
session_start();

class ControllerUser {
    
    private $modelUser;

    public function __construct(){
        $db = Database::getInstance()->getConnection();
        $this->modelUser = new ModelUser($db,);
    }

    public function showLoginForm() {
        include('app\views\login.php');
    }

    public function loginProcess(){
        echo"hy";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            
            $mdp = $_POST['mdp'];
            echo $email;
            echo $mdp;
            //$user = $this->modelUser->findByEmail($email);
            $db = Database::getInstance()->getConnection();
            $modelCategorie = new Model ($db, "login");
            $user=$modelCategorie->findByEmail($email);

            $user=$user["password"];
            //var_dump($user);
            echo"///";

            echo $user;
           // $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

            echo"///";
           // echo $mdp_hash;
            if ($mdp===$user) {
            echo"aa";

                //$_SESSION['user_id'] = $user['id'];
                //$_SESSION['is_logged_in'] = true;
                header('Location: /ENIS/mvc_v0/index.php?url=products');
                exit();
            } else {
                echo"asc";
                //$_SESSION['error_messages'][] = 'Invalid credentials';
                header('Location: /ENIS/mvc_v0/index.php?url=login');
                exit();
            }
        }
    }


    public function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('Location: /mvc_v0/index.php');
        exit();
    }

    public function showSignupForm() {
        include('app\views\signin.php');
    }

    public function signupProcess(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $mdp_confirm = $_POST['mdp-confirm'];

            if ($mdp === $mdp_confirm) {
                //$mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
                $isRegistered = $this->modelUser->register($email, $mdp);

                if ($isRegistered) {
                    $_SESSION['success_messages'][] = 'Registration successful';
                    header('Location: /ENIS/mvc_v0/index.php?url=login');
                    exit();
                } else {
                    $_SESSION['error_messages'][] = 'Registration failed';
                }
            } else {
                $_SESSION['error_messages'][] = 'Passwords do not match';
            }

            header('Location: /mvc_v0/index.php?url=signin');
            exit();
        }
    }

    // Vous pouvez implémenter d'autres méthodes ici selon les besoins de l'application...
}
