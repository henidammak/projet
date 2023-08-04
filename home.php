
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
rel="stylesheet"
/>
<body> 
<?php 
  session_start();
  $ses=$_SESSION['cin_inspecteur'];
  echo "<script>console.log($ses) </script>";
  if(!isset($_SESSION['cin_inspecteur']))
  {
    header("location:index.php"); 
    
  }
?>

    <section id="bg" class="h-100 h-custom" style=" background-image: url('image/bg.png');">
    <!-- background-color: #8fc4b7; -->
        <div   class="container py-5 h-100">
          <div  class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div  class="card rounded-3">
                <img src="image/Screenshot_20230719-030305_Facebook.jpg"
                  class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                  alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                <a class="out" href="index.php" >
                  <h9>
                    Déconexion
                  </h9>
              </a>
      
                  <form  id='formi' class="px-md-2" method="POST" action="ajoutRapport.php">
                  <h1 class="title">تقرير</h1>
                  <br/>
                      <div  class="row">
                        <!-- <div class="col">
                        <select name="inspecteur" class="form-select" aria-label="Default select example">
                        <option selected hidden>المتفقد</option>
                          <?php
                          // require_once("inspecteur.class.php");
                          // $ins=new inspecteur();
                          // $res=$ins->get_listeInspecteur();
                          
                          // foreach($res as $row){
                          //  echo" <option value='" . $row[2] . " " . $row[1] . "'> $row[2]  $row[1] </option>";
                          // }
                          
                       ?>
                       </select>
                        </div> -->
                        <!-- </div>
                        <div > -->
                        <div class="col">
                        <select name="client" class="form-select" aria-label="Default select example">
                        <option selected hidden>الحريف</option>
                          <?php
                             require_once("client.class.php");
                             $cli=new client();
                             $res=$cli->get_listeClient();
                             foreach($res as $row){
                              echo"  
                              <option value='" . $row[2] . " " . $row[1] . " /" . $row[3] . "'>  $row[2] $row[1]/ $row[3] </option>
                              ";
                             }
                          ?>
                          <!-- <option value='client'> <a href=ajoutClient.php?id=$row[0]> $row[1] $row[2]</a> </option> -->
                           <!-- العميل  -->
                           </select>
                           </div>
                          </div>

      
                      <?php
                      require_once("exigence.class.php");
                      $exi=new exigence();
                      $res=$exi->get_listeExigence();
                    
                      foreach($res as $row){
                    echo"<div class='form-outline mb-4'>
                      <div>

                        <h6 >: $row[1] </h6>
      
                        <div class='form-check form-check-inline'>
                        <input  class='form-check-input' id='bn' type='radio' name='{$row[0]}' value='مواضب'  <a href=ajoutRapport.php?id=$row[0]> مواضب </a> 
                        </div>
                        <div class='form-check form-check-inline'>
                        <input  class='form-check-input' id='bn' type='radio' name='{$row[0]}' value='معتدل'  <a href=ajoutRapport.php?id=$row[0]> معتدل </a> 
                        </div>
                        <div class='form-check form-check-inline'>
                        <input class='form-check-input'  id='bn' type='radio' name='{$row[0]}' value='غير مواضب'  <a href=ajoutRapport.php?id=$row[0]>غير مواضب </a> 
                        </div>
                        </div>
                    </div>";
                  }
                  ?>              
                  </div>
                         <div class="button"><button type="submit" id="btn" class="btn btn-success btn-lg mb-1">موافق</button></div>
                  </form>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>