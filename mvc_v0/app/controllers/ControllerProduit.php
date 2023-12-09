<?php
require_once 'app\models\ModelProduit.php';
require_once 'app\models\Database.php';
require_once 'app\models\Model.php';
require_once 'app\controllers\Controller.php';
class ControllerProduit extends Controller {
    private $model;
    public function __construct(){
        $db= Database::getInstance()->getConnection();
        $this->model = new ModelProduit($db,);
    }
    public function signin(){
        $data = [
                
            'email' => $_GET['email'],
            'mdp' => $_GET['mdp'],
        ];
        $login=$this->model->create($data);
        $controller = "login";
        //zeyda include('app\views\signin.php');

    }
    public function index(){
        $produits=$this->model->findAll();
        $controller = "Produit";
        include('app\views\Produit\crud.php');
        /*if(session[admin]=){
        include('app\views\Produit\crud.php');


        }else{
            include('app\views\signin.php');

        include('app\views\login.php');
        }
        
        */
        
    }
    public function create(){
        //self::loggedOnly();
        $db = Database::getInstance()->getConnection();
        $modelCategorie = new Model($db,"categorie");
        $categorie=$modelCategorie->findAll();
        include('app/views/produit/add.php');
        
        //return $categorie;
    }
    
    public function createProcess() {
        echo"gea";
        $image = "c";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
            if (isset($_FILES["image"])) {
                $image = basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $image);
            }
    
            // Handle form submission
            $data = [
                
                'designation' => $_GET['designation'],
                'code_categorie' => $_GET['categorie'],
                'quantite' => $_GET['quantite'],
                'prix' => $_GET['prix'],
                'image' => $image 
            ];
            foreach ($data as &$value) {
                echo $value ;
                echo "/";
            }
            
            // Call the model to create a new product
            $this->model->create($data);
    
            // Redirect to the product list page
            header('Location: /ENIS/mvc_v0/index.php?url=products');
        } else {
            // Handle non-POST request (e.g., redirect to an error page)
            header('Location: /MVC_V0/app?url=error');
        }
    }
  ////jdid
  
    public function delete(){
        if (isset($_GET['pp'])) {
            $productCode = $_GET['pp'];
            $this->model->delete($productCode);
            header('Location: /ENIS/mvc_v0/index.php?url=products');
        
        
        
        }
    }
    public function edit(){
        //self::loggedOnly();
        $db = Database::getInstance()->getConnection();
        $modelCategorie = new Model($db,"categorie");
        $categorie=$modelCategorie->findAll();
        return $categorie;
        include('app/views/produit/edit.php');
    }
    public function editProcess(){

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
        if (isset($_FILES["image"])) {
            $image = basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
        }
        $productCode=$_GET['code'];
        echo "productCode";
        // Handle form submission
        $data = [
            'code' => $_GET['code'],
            'designation' => $_GET['designation'],
            'code_categorie' => $_GET['categorie'],
            'quantite' => $_GET['quantite'],
            'prix' => $_GET['prix'],
            'image' => $image 
        ];
      
        foreach ($data as &$value) {
            echo $value ;
            echo "/";
        }
        
        // Call the model to create a new product
        $this->model->update($productCode,$data);

        // Redirect to the product list page
        header('Location: /ENIS/mvc_v0/index.php?url=products');
    } else {
        // Handle non-POST request (e.g., redirect to an error page)
        header('Location: /MVC_V0/app?url=error');
    }

}}



?>
