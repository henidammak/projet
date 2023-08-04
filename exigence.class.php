<?php
class exigence{
    public $id_exigence;
    public $exigence;
    public $archive;
    function get_listeExigence(){
        require_once("config.php");
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="SELECT * FROM exigence WHERE archive=0";
        $res=$pdo->query($req)or print_r($pdo->errorinfo());
        return $res;  

    }

}
?>