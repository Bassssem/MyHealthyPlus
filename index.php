<?php 

include 'init.php';

session_start();
if (isset($_SESSION['id'])) {
    header("Location: /dashboard/index.php");

}
if (isset($_POST['signin'])) {
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM `client` WHERE email like '$email' AND password like '$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['id'] = $row['id'];
  header("Location: /dashboard/index.php");
} 
$sql = "SELECT * FROM `medecin` WHERE email like '$email' AND password like '$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['id'] = $row['id'];
  header("Location: /dashboard/medecin.php");
}
$sql = "SELECT * FROM `admin` WHERE email like '$email' AND password like '$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['id'] = $row['id'];
  header("Location: /admin/index.php");
}
else {
  echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
}
}



if (isset($_POST['signup'])) {
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$password = $_POST['password'];
    $numero = $_POST['numero'];
    $genre = $_POST['genre'];
    $date = $_POST['date'];
    $cin = $_POST['cin'];
    
    
    
    
    
    
    
    
    
    
    
    
    
if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];

    
    $img_ex = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed_exs = array("jpg", "jpeg", "png");
    if (in_array($img_ex, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex;
        $img_upload_path = 'dashboard/uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

            
       
    } else {
        // Handle disallowed file extension
        echo "Only JPG, JPEG, and PNG files are allowed.";
    }
}

    
    
    
    
    
    
    
    
    
    
    
    
    
				
	$sql = "SELECT * FROM `client` WHERE email like '$email'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO `client` (`id`, `nom`, `email`, `password`, `numero`, `cin`, `date`, `genre`, `image`, `solde`) VALUES (NULL, '$nom', '$email', '$password', '$numero', '$cin', '$date', '$genre', '$new_img_name',1000);";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Wow! User Registration Completed.')</script>";
				
		} else {
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style4.css">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form name="f" action="" method="post"  class="form" id="form2" enctype="multipart/form-data">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" id="1" placeholder="nom et prenom " name="nom" class="input" />
                <input type="email" id="2" placeholder="Email" name="email" class="input" />
                <input type="password" id="3" placeholder="Mot de passe" name="password" class="input" />
                <input type="text" id="4" placeholder="CIN" name="cin" class="input" />
                <input type="text" id="5" placeholder="numéro de téléphone" name="numero" class="input" />
                <input type="date" id="6" placeholder="date de naissence " name="date" class="input" />
        
                
                <div><input type="radio" name="genre" value="homme" id="masculin">homme
                    <input type="radio" name="genre" value="femme" id="feminin">famme</div>
            
            


                
                <div class="wrapper">
                  <div class="box">
                    <div class="js--image-preview"></div>
                    <div class="upload-options">
                      <label>
                        <input type="file" name="img" class="image-upload" required>
                      </label>
                    </div>
                  </div>
                
                  
                
                 
                </div>











                  




                <input type="submit" name="signup" class="btn" value="Sign Up">
            </form>
        </div>
    
        <!-- Sign In -->
        <div class="container__form container--signin">
            <form action="" name="f" method="post" class="form" id="form2">
                <h2 class="form__title">Sign In</h2>
                <input type="email" placeholder="Email" name="email" class="input" />
                <input type="password" placeholder="Password" name="password" class="input" />
                <a href="#" class="link">Forgot your password?</a>
                <input type="submit" name="signin" class="btn" value="Sign Up">
            
            </form>
        </div>
    
        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="sign&&.js"></script>


    <script>
        function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for (let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}



/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}

    </script>
</body>
</html>