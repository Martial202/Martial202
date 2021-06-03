<?php
session_start();
include 'cnx.php';

if (isset($_POST['signin'])) {

    $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

    if (empty($Email) || empty($Password)) {
        if (trim($Email) == "") {
            $errors[] = "Le pseudo ou Email est requis!";
        }

        if ($Password == "") {
            $errors[] = "Le mot de passe est requis!";
        }
    } else {
        $mainSql = "SELECT * FROM client ";
        $mainResult = $cnx->prepare($mainSql);
         $mainResult->execute()  ;
        $l = $mainResult->fetch();        
         if (!empty($l)) {
        $_SESSION['iduser'] = $l['id_client'];
        $_SESSION['Enseign'] = $l['enseigne'];
        $_SESSION['logo'] = $l['logo'];
        $_SESSION['NumC'] = $l['numclient'];
        $_SESSION['CodeUser'] = $l['codeclient'];
        $_SESSION['Login'] = $l['NameUser'];
        $_SESSION['password'] = $l['password'];
        $_SESSION['statU'] = $l['statuser'];
         }
          if ($_SESSION['login']=$Email && $_SESSION['password']=$Password) {
              
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
        }
    }
}
?>