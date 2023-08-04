<?php
class rapport
{
    public $id_rapport;
    public $cin_client;
    public $cin_inspecteur;
    public $date;
    function insertRapport($id_rapport1,$cin_client1,$cin_inspecteur1,$dateSys1)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        
        $req="insert into rapport(id_rapport,cin_client,cin_inspecteur,date) values ('$id_rapport1',$cin_client1,$cin_inspecteur1,'$dateSys1')";
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function getRapport($id_rapport,$cin_client,$cin_inspecteur){
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM rapport where  id_rapport=$id_rapport,cin_client=$cin_client,cin_inspecteur=$cin_inspecteur";
        $res=$pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }
    function getIdRappNv($cin_client,$cin_inspecteur){
        require_once('config.php');
        $cnx=new connexion(); 
        $pdo=$cnx->CNXbase(); 
        $req="SELECT DISTINCT id_rapport FROM rapport WHERE cin_client=$cin_client and cin_inspecteur=$cin_inspecteur ";      
    }
    function getIdRapp(){
        require_once('config.php');
        $cnx=new connexion(); 
        $pdo=$cnx->CNXbase(); 
        $req="SELECT max(id_rapport) FROM rapport";  
        $res=$pdo->query($req) or print_r($pdo->errorInfo()); 
        $x=$res->fetchColumn();
        return $x;     
    }    
}
?>