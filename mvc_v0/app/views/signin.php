<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<!-- Ajoutez ici vos liens vers les feuilles de style CSS -->
</head>
<body>
<div class="signup-container">
    <h1>Inscription</h1>
    <form action="index.php?url=signupProcess" method="post">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <div class="form-group">
            <label for="mdp-confirm">Confirmez le mot de passe :</label>
            <input type="password" id="mdp-confirm" name="mdp-confirm" required>
        </div>
        <div class="form-group">
            <button type="submit">Inscription</button>
        </div>
    </form>
    <p>Déjà inscrit ? <a href="index.php?url=login">Connectez-vous</a></p>
</div>
</body>
</html>