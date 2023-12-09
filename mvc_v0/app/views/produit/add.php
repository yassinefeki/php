
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="w-96 bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-4 text-center">Ajout Produit</h1>

        <form action="/ENIS/MVC_V0/index.php?url=products/createProcess" method="GET" enctype="multipart/form-data">

            <label for="designation" class="block mb-2">designation</label>
            <input type="text" id="designation" name="designation" class="w-full px-3 py-2 border rounded mb-4" required>
            
            <label for="categorie" class="block mb-2">Catégorie</label>
            <!--<select id="categorie" name="categorie" class="w-full px-3 py-2 border rounded mb-4">
                <?php
                    /*$sql = "SELECT nom from categorie";
                    $result = $pdo->query($sql);
                    $rows = $result->fetchAll(PDO::FETCH_OBJ);
                    $result->closeCursor();
                    foreach ($rows as $categorie) {
                        
                            echo "<option value=\"" . htmlspecialchars($categorie->nom) . "\">" . htmlspecialchars($categorie->nom) . "</option>";

                    }*/
                    /*include_once "../../controllers/ControllerProduit.php";
                    $c= new ControllerProduit();
                    $categorie=$c->create();
                    foreach ($rows as $categorie) {
                        
                        echo "<option value=\"" . htmlspecialchars($categorie->nom) . "\">" . htmlspecialchars($categorie->nom) . "</option>";
                                http://localhost/ENIS/mvc_v0/index.php?url=products
                }*/

                ?>
                
                
            
            </select>-->
            <select id="categorie" name="categorie">
                <option value="fruit">Fruit</option>
                <option value="gourmet">Gourmet</option>
            </select>
            <label for="prix" class="block mb-2">Prix unitaire</label>
            <input type="text" id="prix" name="prix" class="w-full px-3 py-2 border rounded mb-4" required>

            <label for="quantite" class="block mb-2">Quantité</label>
            <input type="text" id="quantite" name="quantite" class="w-full px-3 py-2 border rounded mb-4" required>
            
                <label for="image" class="block mb-2">Image</label>
                <input type="file" id="image" name="image" class="w-full mb-4">
            
                <input type="hidden" name="url" value="products/createProcess" />
            <input type="submit" value="Ajouter" class="bg-green-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-600">
        </form>
    </div>


</body>
</html>