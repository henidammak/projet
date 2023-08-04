<?php
class session {
    public $login;
    public $pass;
    function __construct() {
        session_start();
    }
    function rechsession ($login,$pass)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req= "SELECT count(*) FROM session WHERE login='$login' and pass='$pass' " ;
        $res=$pdo->query($req);
        return $res;
    }

    function insertsession ($login,$pass)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="insert into session values('$login','$pass')";
        $pdo->exec($req);
    }
    function modifsession ($login,$pass,$ancienpass)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="UPDATE session SET pass='$pass' WHERE login='$login' and pass='$ancienpass' ";
        $pdo->exec($req);
    } 
    function suppsession ($login,$pass)
    {
        require_once('config.php');
        $cnx=new connexion();
        $pdo=$cnx->CNXbase();
        $req="DELETE FROM session WHERE login='$login' and pass='$pass'"; 
        $pdo->exec($req);
    }
    function destruction() {
        session_destroy();
    }
}
?>