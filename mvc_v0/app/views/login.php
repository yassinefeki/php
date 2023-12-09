<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion</title>
<!-- Ajoutez ici vos liens vers les feuilles de style CSS -->
</head>
<body>
<div class="login-container">
    <h1>Connexion</h1>
    <!-- Affichage des messages d'erreur éventuels -->
    <?php if(!empty($_SESSION['error_messages'])): ?>
        <div class="error-messages">
          <?php 
            foreach($_SESSION['error_messages'] as $message): 
                echo $message;
            endforeach; 
            unset($_SESSION['error_messages']);
          ?>
        </div>
    <?php endif; ?>
    <form action="index.php?url=loginProcess" method="POST">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <div class="form-group">
            <button type="submit">Connexion</button>
        </div>
    </form>
    <p>Vous n'avez pas de compte ? <a href="index.php?url=signin">Inscrivez-vous</a></p>
</div>
</body>
</html>