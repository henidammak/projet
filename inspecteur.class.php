<?php
class inspecteur{
    public $cin_inspecteur;
    public $nom;
    public $prenom;
    public $numtel;
    public $motpasse_inspecteur;
    public $archive;
    public $date_fin_service;
    function get_listeInspecteur(){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM inspecteur WHERE archive=0";
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;     
    }
    function get_Inspecteur($cin){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM inspecteur WHERE cin_inspecteur=$cin";
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;  

    }
    function getIdInspecteur($nom,$prenom){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM inspecteur WHERE nom='$nom' and prenom='$prenom'";
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;  

    }
    function recherche_Inspecteur($cin,$mdp)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req= "SELECT count(*) FROM Inspecteur WHERE cin_Inspecteur=$cin and motpasse_Inspecteur='$mdp' and archive=0" ;
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }
        function select_inspecteur($cin)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req= "SELECT * FROM inspecteur WHERE cin_inspecteur=$cin " ;
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }
}
?>