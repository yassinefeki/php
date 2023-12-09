<?php

// Assurez-vous que ce chemin d'accès est correct pour le fichier 'Model.php'
require_once 'app\models\Model.php';

class ModelUser extends Model {
    
    public function __construct($db) {
        // Assurez-vous que le nom de la table '$table' est correct pour vos utilisateurs
        parent::__construct($db, 'login');
    }

    // Récupérer un utilisateur par email
    public function findByEmail($email) {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer l'erreur selon vos besoins
            die("Error finding user by email: " . $e->getMessage());
        }
    }
    public function verifier($email, $mdp) {
        try {
            // Préparer la requête SQL pour sélectionner l'utilisateur avec l'email donné
            $sql = "SELECT * FROM " . $this->table . " WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            // Récupérer l'utilisateur
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Si l'utilisateur existe, vérifier le mot de passe (haché)
            if ($user) {
                // Notez que $user['password'] doit être la colonne contenant le mot de passe haché
                if (password_verify($mdp, $user['password'])) {
                    return true;
                }
            }
            
            return false; // Retourner false si aucun utilisateur n'a été trouvé ou si les mots de passe ne correspondent pas
        } catch (PDOException $e) {
            die("Error verifying user credentials: " . $e->getMessage()); // Gérer l'erreur selon vos besoins
        }
    }


    public function register($email, $mdp_hash) {
        // Code pour insérer le nouvel utilisateur dans la base de données
        // Utilisez une déclaration préparée pour éviter les injections SQL
        $stmt = $this->db->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
        return $stmt->execute([$email, $mdp_hash]);
    }
    // Insérer un nouvel utilisateur (si vous souhaitez également gérer l'inscription)
    public function insertUser($email, $password) {
        try {
            $sql = "INSERT INTO " . $this->table . " (email, password) VALUES (:email, :password)";
            $stmt = $this->db->prepare($sql);
            
            // Hacher le mot de passe avant de le stocker
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->execute(['email' => $email, 'password' => $hashedPassword]);
            
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Gérer l'erreur selon vos besoins
            die("Error inserting new user: " . $e->getMessage());
        }
    }

    // ... Autres méthodes liées à la gestion des utilisateurs
}