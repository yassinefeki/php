<?php
require_once 'app\models\Model.php';
class ModelProduit extends Model{
private $data=array();
// La syntaxe ... = NULL signifie que l'argument est optionel
// Si un argument optionnel n'est pas fourni,
// alors il prend la valeur par défaut, NULL dans notre cas
public function __construct($db,$code=null,$designation=null, $prix=null,
$quantite=null, $categorie=null,$image=null){
parent::__construct($db, 'Produit');
if (!is_null($designation) && !is_null($prix) && !is_null($quantite) &&
!is_null($categorie)&&!is_null($image)) {

// Si aucun des paramètre n'est nul,
// c'est forcement qu'on les a fournis
// donc on retombe sur le constructeur à 1 argument
$this->data['code'] = $code;
$this->data['designation'] = $designation;
$this->data['code_categorie'] = $categorie;
$this->data['quantite'] = $quantite;
$this->data['prix'] = $prix;
$this->data['image'] = $image;

}
}
public function __get($attr){
if (!isset($this->data[$attr]))
return "erreur";
else return ($this->data[$attr]);
}
public function __set($attr,$value) {
$this->data[$attr] = $value;
}
public function findAll() {
try {
$sql = "SELECT produit.code, produit.designation, produit.prix,

produit.quantite, produit.image, categorie.nom as categorie

FROM produit
LEFT JOIN categorie
ON code_categorie = categorie.code";
$stmt = $this->db->query($sql);
return $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
die("Error finding data: " . $e->getMessage());
}
}
}