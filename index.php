<?php 

session_start();
include './includes/cnx.php';
$l="";
         $msg1= "";
         $msg2="";
if (isset($_POST['signin'])) {

    $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

    if (empty($Email) || empty($Password)) {
        if (trim($Email) == "") {
          $msg1='champ est vide!';
          $msg2='Tous les champs sont requis.';
          
        }

        if ($Password == "") {
          $msg1='champ est vide!';
          $msg2='Tous les champs sont requis.';
            
        }
    } else {
        $mainSql = "SELECT * FROM client WHERE NameUser=? AND password=?";
        $mainResult = $cnx->prepare($mainSql);
         $mainResult->execute(array($Email,$Password));
         if ($l = $mainResult->fetch()) {
           $_SESSION['iduser'] = $l['id_client'];
        $_SESSION['Enseign'] = $l['enseigne'];
        $_SESSION['logo'] = $l['logo'];
        $_SESSION['NumC'] = $l['numclient'];
        $_SESSION['CodeUser'] = $l['codeclient'];
        $_SESSION['Login'] = $l['NameUser'];
        $_SESSION['password'] = $l['password'];
        $_SESSION['statU'] = $l['statuser'];
         if ( $_SESSION['statU']!=0){
            ?>
            <script>
                window.location.href="page.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                window.location.href="./pagesClient/accueil.php";
            </script>
            <?php
            } 
         } else {
          $msg1='Erreur!';
          $msg2='pseudo ou mot de passe incorrect.';

         }
         
              
         /*if (!empty($l)) {
        $_SESSION['iduser'] = $l['id_client'];
        $_SESSION['Enseign'] = $l['enseigne'];
        $_SESSION['logo'] = $l['logo'];
        $_SESSION['NumC'] = $l['numclient'];
        $_SESSION['CodeUser'] = $l['codeclient'];
        $_SESSION['Login'] = $l['NameUser'];
        $_SESSION['password'] = $l['password'];
        $_SESSION['statU'] = $l['statuser'];
         }*/
          /*if ($_SESSION['login']=$Email && $_SESSION['password']=$Password) {
              
        if ($_SESSION['statU'] = 1) {
            ?>
            <script>
                window.location.href="page.php";
            </script>
            <?php
        } elseif ($_SESSION['statU'] = 0) {
            ?>
            <script>
                window.location.href="../pagesClient/accueil.php";
            </script>
            <?php
          }
        } else{
            $errors[] = "pseudo ou mot de passe incorrect !";
        }*/
    }
    }
    if (empty($msg1) && empty($msg2)){
      $hidden='hidden';
   
    } else {
      $hidden='';
    }
    
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/cad1" style="width: 200%">

    <title>CADERAC</title>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-image: url(./img/img7.jpg);">
    <b style="color: white"> </b>
    
    <form class="form-signin" method="POST" action="">
      <img class="mb-4" src="img/cader.png" alt="" width="170" height="130">
      <h1 class="h2 mb-3 font-weight-normal" style="color: white;"><b>Please sign in</b></h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name="Email" id="" class="form-control" placeholder="Pseudo ou Email address"  autofocus><br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="Password"  class="form-control" placeholder="Password" >
      <div class="checkbox mb-3">
        <br>
      </div>
      <div class="alert alert-warning alert-dismissible fade show" role="alert" <?=$hidden?>>
  <strong><?=$msg1?></strong><?=$msg2?>
  <a href="index.php">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></a>
</div>
      <button type="submit" class="btn btn-lg btn-primary btn-block"  name="signin">Sign in</button>
      <p class="mt-5 mb-3 text-muted"> <b style="color: white">&copy;2020-2021</b></p>
    </form>
  </body>
</html>