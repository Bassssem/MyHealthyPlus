<?php 

include '../init.php';

session_start();
if (!isset($_SESSION['id'])) {header("Location: ../index.php");}

if (isset($_POST['create'])) {
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $solde = $_POST['solde'];
    $specialiter = $_POST['specialiter'];
    $date = $_POST['date'];
    
    
    
    
    
    
    
    
    
    
    
    
    
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    
    $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed_exs = array("jpg", "jpeg", "png");
    if (in_array($img_ex, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex;
        $img_upload_path = '../dashboard/uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

            
       
    } else {
        // Handle disallowed file extension
        echo "Only JPG, JPEG, and PNG files are allowed.";
    }
}


		
$sql = "SELECT * FROM `medecin` WHERE email like '$email'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
	$sql = "INSERT INTO `medecin` (`id`, `nom`, `image`, `date`, `specialiter`, `solde`, `email`, `password`) VALUES (NULL, '$nom', '$new_img_name', '$date', '$specialiter', '$solde', '$email', '$password');";
		$result = mysqli_query($conn, $sql);
		}
   
}
header("Location: ../admin/index.php"); 
?>