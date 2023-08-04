<body>
    
</body>
<script src='https://unpKg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<?php

require_once("inspecteur.class.php");
$ins=new inspecteur();

$cin_inspecteur=$_POST['cin_inspecteur'];
$motpasse_inspecteur=$_POST['motpasse_inspecteur'];
$row=$ins-> recherche_Inspecteur($cin_inspecteur,$motpasse_inspecteur); 
$n= $row->fetchColumn(0) ;
if($cin_inspecteur== "" || $motpasse_inspecteur == ""){
    echo "
    <script>Swal.fire({
        title:'erreur ! saisir votre cin et mot de passe  !',
        icon:'warning',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            location.replace('index.php');
    }})</script>";

}
else{
        if ($n == 0)
        {
            echo "
            <script>Swal.fire({
                title:'erreur ! cin ou mot de passe est introuvable !',
                icon:'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.replace('index.php');
            }})</script>";
            // echo "
            // <script>Swal.fire({
            //     title:'Connexion Avec Succès',
            //     icon:'success',
            //     confirmButtonText: 'OK'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         location.replace('../index.php');
            // }})</script>";
        }
        else
        {
            $in=new inspecteur();
            $res = $in->select_inspecteur($cin_inspecteur);
            $data = $res->fetchAll(PDO::FETCH_ASSOC);
            $cin_inspecteur = $data[0]["cin_inspecteur"];
            session_start();

            $_SESSION['cin_inspecteur']=$cin_inspecteur;
            $ses=$_SESSION['cin_inspecteur'];
            echo "<script>console.log($ses) </script>";
            header("location:home.php");
            
            
}
}
?>