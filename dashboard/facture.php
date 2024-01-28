<?php 
include '../init.php';
session_start();

if (!isset($_SESSION['id'])) {header("Location: ../index.php");}

    $sql = "SELECT * FROM `client` WHERE id = ".$_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $nomcl= $row['nom'];
    $solde= $row['solde'];
    
    
    
    $idmed = $_GET['idmed'];
    $sql = "SELECT * FROM `medecin` WHERE id = ".$idmed;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $nommed= $row['nom'];
    $soldemed= $row['solde'];
    
    
    date_default_timezone_set('UTC');
    $dateActuelle = new DateTime();
    $dateDansDeuxJours = $dateActuelle->modify('+2 days');
    $dateDansDeuxJours->setTime($dateDansDeuxJours->format('H'), 0, 0);
    $newdate = $dateDansDeuxJours->format('Y-m-d H:i:s');
    
    if (isset($_POST['t'])) {
        if($solde < $soldemed)
            echo " Solde insuffisant";
        else{
            $sql = "INSERT INTO `rendevouz` VALUES (".$_SESSION['id'].",'$idmed','$newdate')";
            mysqli_query($conn, $sql);
            
            $sql = "UPDATE `client` SET `solde` = `solde` - '$soldemed' WHERE id = ".$_SESSION['id'];
            mysqli_query($conn, $sql);
            $sql = "UPDATE `admin` SET `solde` = `solde` + '$soldemed'";
            mysqli_query($conn, $sql);

            header("Location: index.php"); 
        }
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>facture</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
</head>
<body>

<!-- partial:index.partial.html -->
<div class="container">
  <div class="invoice">
    <div class="row">
      <div class="col-7">
        
  <div class="col-7">
    <img src="uploads/image.jpg" height="110">
  </div>
       
      </div>
      <div class="col-5">
        <h1 class="document-type display-4">FACTURE</h1>
      
      </div>
    </div>
    <div class="row">
     
      <div class="col-5">
       
  
      </div>
    </div>
    <br>
    <br>
   <h1> Votre sold : <?php echo $solde." DT"; ?> </h1>
    <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>nom de patient : </th>
          <th>nom de medecin :  </th>
          <th>date : </th>
          <th>montant : </th>
        </tr>
        <tr>
          <th><?php echo $nomcl; ?></th>
          <th><?php echo $nommed; ?></th>
          <th><?php echo $newdate; ?></th>
          <th><?php echo $soldemed." DT"; ?></th>
        </tr>
      </thead>
    
    </table>
    <form name="f" action="" method="POST">
    <center><input type="submit" name="t" value="passe"></center>
    </form>
    <div class="row">
      <div class="col-8">
      </div>
      <div class="col-4">
        <br>
      </div>
    </div>
   
    
    <p class="conditions">
      Si vous ne vous présentez pas au rendez-vous, vous ne serez pas remboursé
    </p>
    
    <br>
    <br>
    <br>
    <br>
    
    
  </div>
</div>
<!-- partial -->
 <style>
     body {
  background: #ccc;
  padding: 30px;
}

.container {
  width: 21cm;
  min-height: 29.7cm;
}

.invoice {
  background: #fff;
  width: 100%;
  padding: 50px;
}

.logo {
  width: 2.5cm;
}

.document-type {
  text-align: right;
  color: #444;
}

.conditions {
  font-size: 0.7em;
  color: #666;
}

.bottom-page {
  font-size: 0.7em;
}
 </style> 
</body>
</html>
