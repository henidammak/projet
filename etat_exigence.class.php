<?php
   class etat_exigence{
    public $id_etat;
    public $id_rapport;
    public $id_exigence;
    public $etat;
    function insertEtat($id_rapport,$id_exigence,$etat){
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="insert into etat_exigence(id_rapport,id_exigence,etat) values ('$id_rapport',$id_exigence,'$etat')";
        $pdo->exec($req) or print_r($pdo->errorInfo());
    }
   }


?>