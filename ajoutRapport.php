<?php
    require_once("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    require_once('config.php');
    $cnx=new connexion();
    $pdo=$cnx->CNXbase();
    require_once("rapport.class.php");
    require_once("client.class.php");
    require_once("etat_exigence.class.php");

    $client = $_POST['client'];
    echo "Le client sélectionné est : " . $client;

    //9samna client 
    $arrayClient = explode(" ", $client);
    echo"<br>";
    echo" <br>";
    print_r($arrayClient[0]); // prenom
    echo"<br>";
    print_r($arrayClient[1]); // nom

    $arrayClientslach = explode("/", $client);
    echo"<br>";
    print_r($arrayClientslach[1]); // adress
    $cli= new client();
    $getcinCli=$cli->geCinClient($arrayClient[1] , $arrayClient[0] ,$arrayClientslach[1]);
    //  $n= $cinCli->fetchColumn(0) ;
    $cinCliget = $getcinCli->fetchAll(PDO::FETCH_ASSOC);

    echo"<br>";
    print_r($cinCliget[0]['cin_client']);
    $cinCli=$cinCliget[0]['cin_client'];

    // rapport 
    $sess=$_SESSION['cin_inspecteur'];  
    $dateSys=date('Y-m-d');
    $idRapp=$cinCli."/".$sess."/".$dateSys;
    echo"<br>";
    print_r($dateSys);
    echo"<br>";
    print_r($idRapp);
    $rapp=new rapport();
    $rapp->insertRapport($idRapp,$cinCli,$sess,$dateSys); 
    echo"inse";
    require_once("exigence.class.php");
    $exi=new exigence();
    $res=$exi->get_listeExigence();
    //$i=0;
    echo"<br>";
    foreach($res as $row){
            $valeurSelectionnee = $_POST[$row[0]];
            echo"<br>";
            echo "La valeur sélectionnée est : " . $valeurSelectionnee . "l'exicece est  :  " .$row[0]. "   valeur :  " .$row[1] ;
            $etat=new etat_exigence();
            $etat->insertEtat($idRapp,$row[0],$valeurSelectionnee);   
    }
    header('location:home.php');

?>