<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Styles personnalisés pour le bouton */
        .custom-button {
            background-color: #fff; /* Couleur de fond */
            color: #000; /* Couleur du texte */
            border: none; /* Suppression de la bordure */
            padding: 10px 20px; /* Espacement intérieur du bouton */
            border-radius: 5px; /* Coins arrondis */
            cursor: pointer; /* Curseur pointeur au survol */
        }
        /* Styles pour le bouton de déconnexion */
.custom-buttone {
    background-color: #fff; /* Couleur de fond */
    color: #000; /* Couleur du texte */
    border: none; /* Suppression de la bordure */
    padding: 10px 20px; /* Espacement intérieur du bouton */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur pointeur au survol */
    text-decoration: none; /* Suppression du soulignement du lien */
    display: inline-block; /* Pour que le lien se comporte comme un bouton */
    margin-right: 10px; /* Espacement à droite (facultatif) */
}

/* Styles pour le bouton de déconnexion au survol */
.custom-buttone:hover {
    background-color: #FF4500; /* Couleur de fond au survol */
}

    </style>
</head>
<body>
  <?php
  session_start();
  
  ?>
  <header>
    <div class="px-3 py-2 text-bg-dark border-bottom">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <img src="inc/images/Fichier1.png" alt="" height=60>
            <h1 class="px-5">vape store</h1>
          </div>
          <div class="d-flex align-items-center">
          <a href="deconnexion.php" class="custom-buttone">Se déconnecter</a>

          </div>
          <div class="d-flex align-items-center">
            
            <button class="custom-button end-0"><?php if(!(empty($_SESSION["nome"]))){
              
             echo $_SESSION["nome"]; }
             else {
              
             }
             ?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">
        <p>Gestion des produits</p>
        <form class="col-12  mb-2 mb-lg-0 me-lg-auto flex-row-reverse " role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
      </div>
    </div>
  </header>  


