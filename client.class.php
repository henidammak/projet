<?php
class client{
    public $cin_client;
    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    public $numtel;
    public $date_ouverture;
    public $archive;
    public $date_fermeture;
    function get_listeClient(){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM client WHERE archive=0";
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;  
    }
    function get_Client($cin){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM client WHERE cin_client=$cin";
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;  

    }
    function geCinClient($nom1,$prenom1,$adresse1){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();

        $req="SELECT * FROM client WHERE nom='$nom1' AND prenom='$prenom1' AND adresse='$adresse1'";
        // 
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;  

    }


}
?>