<?php 
include '../init.php';
session_start();

if (!isset($_SESSION['id'])) {header("Location: ../index.php");}

    $sql = "SELECT * FROM `medecin` WHERE id = ".$_SESSION['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $nom= $row['nom'];
    $solde= $row['solde'];
    $img= $row['image'];


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>MyHealthy+</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="app-header">
    <div class="app-header-left">
      <span class="app-icon"></span>
      <p class="app-name">MyHealthy+</p>
      <div class="search-wrapper">
        <input class="search-input" type="text" placeholder="Search">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
          <defs></defs>
          <circle cx="11" cy="11" r="8"></circle>
          <path d="M21 21l-4.35-4.35"></path>
        </svg>
      </div>
    </div>
    <div class="app-header-right">
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
      
      <button class="profile-btn">
        <img src=uploads/<?php echo $img; ?>" />
        <span><?php echo $nom; ?></span>
      </button>
    </div>
    <button class="messages-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" /></svg>
    </button>
  </div>
  <div class="app-content">
    <div class="app-sidebar">
      <a href="" class="app-sidebar-link active">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
          <polyline points="9 22 9 12 15 12 15 22" /></svg>
      </a>
      <a href="logout.php" class="app-sidebar-link">
        <button class="logoutButton logoutButton--dark">
    <svg class="doorway" viewBox="0 0 100 100">
      <path d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z" />
      <path class="bang" d="M40.5 43.7L26.6 31.4l-2.5 6.7zM41.9 50.4l-19.5-4-1.4 6.3zM40 57.4l-17.7 3.9 3.9 5.7z" />
    </svg>
    <svg class="figure" viewBox="0 0 100 100">
      <circle cx="52.1" cy="32.4" r="6.4" />
      <path d="M50.7 62.8c-1.2 2.5-3.6 5-7.2 4-3.2-.9-4.9-3.5-4-7.8.7-3.4 3.1-13.8 4.1-15.8 1.7-3.4 1.6-4.6 7-3.7 4.3.7 4.6 2.5 4.3 5.4-.4 3.7-2.8 15.1-4.2 17.9z" />
      <g class="arm1">
        <path d="M55.5 56.5l-6-9.5c-1-1.5-.6-3.5.9-4.4 1.5-1 3.7-1.1 4.6.4l6.1 10c1 1.5.3 3.5-1.1 4.4-1.5.9-3.5.5-4.5-.9z" />
        <path class="wrist1" d="M69.4 59.9L58.1 58c-1.7-.3-2.9-1.9-2.6-3.7.3-1.7 1.9-2.9 3.7-2.6l11.4 1.9c1.7.3 2.9 1.9 2.6 3.7-.4 1.7-2 2.9-3.8 2.6z" />
      </g>
      <g class="arm2">
        <path d="M34.2 43.6L45 40.3c1.7-.6 3.5.3 4 2 .6 1.7-.3 4-2 4.5l-10.8 2.8c-1.7.6-3.5-.3-4-2-.6-1.6.3-3.4 2-4z" />
        <path class="wrist2" d="M27.1 56.2L32 45.7c.7-1.6 2.6-2.3 4.2-1.6 1.6.7 2.3 2.6 1.6 4.2L33 58.8c-.7 1.6-2.6 2.3-4.2 1.6-1.7-.7-2.4-2.6-1.7-4.2z" />
      </g>
      <g class="leg1">
        <path d="M52.1 73.2s-7-5.7-7.9-6.5c-.9-.9-1.2-3.5-.1-4.9 1.1-1.4 3.8-1.9 5.2-.9l7.9 7c1.4 1.1 1.7 3.5.7 4.9-1.1 1.4-4.4 1.5-5.8.4z" />
        <path class="calf1" d="M52.6 84.4l-1-12.8c-.1-1.9 1.5-3.6 3.5-3.7 2-.1 3.7 1.4 3.8 3.4l1 12.8c.1 1.9-1.5 3.6-3.5 3.7-2 0-3.7-1.5-3.8-3.4z" />
      </g>
      <g class="leg2">
        <path d="M37.8 72.7s1.3-10.2 1.6-11.4 2.4-2.8 4.1-2.6c1.7.2 3.6 2.3 3.4 4l-1.8 11.1c-.2 1.7-1.7 3.3-3.4 3.1-1.8-.2-4.1-2.4-3.9-4.2z" />
        <path class="calf2" d="M29.5 82.3l9.6-10.9c1.3-1.4 3.6-1.5 5.1-.1 1.5 1.4.4 4.9-.9 6.3l-8.5 9.6c-1.3 1.4-3.6 1.5-5.1.1-1.4-1.3-1.5-3.5-.2-5z" />
      </g>
    </svg>
    <svg class="door" viewBox="0 0 100 100">
      <path d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z" />
      <circle cx="66" cy="50" r="3.7" />
    </svg>
  </button>
      </a>
      
    </div>
    
    
    
    
    <div class="projects-section">
      <div class="projects-section-header">
        <p>Listes les medecines</p>
        <p class="time"><?php echo date("Y-m-d"); ?></p>
      </div>
      
      <div class="project-boxes jsGridView">
      
      
      
     
   <?php 
    $sql = "SELECT * FROM `rendevouz` where idclient = ".$_SESSION['id']." and date <= now() order by `date`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    
    $sql1 = "SELECT * FROM `client` where id = ".$row['idclient'];
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    
    ?>
    
    
    
    
    
        <div>
        <?php echo $row1['nom']; ?>
        <?php echo "uploads/".$row1['image']; ?>
        <?php echo $row['date']; ?>
        </div>
        <br>
    
    
     <?php }
    ?>
    
    
  </div>
</div>

</div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>
<script>
document.querySelectorAll('.logoutButton').forEach(button => {
  button.state = 'default'

  // function to transition a button from one state to the next
  let updateButtonState = (button, state) => {
    if (logoutButtonStates[state]) {
      button.state = state
      for (let key in logoutButtonStates[state]) {
        button.style.setProperty(key, logoutButtonStates[state][key])
      }
    }
  }

  // mouse hover listeners on button
  button.addEventListener('mouseenter', () => {
    if (button.state === 'default') {
      updateButtonState(button, 'hover')
    }
  })
  button.addEventListener('mouseleave', () => {
    if (button.state === 'hover') {
      updateButtonState(button, 'default')
    }
  })

  // click listener on button
  button.addEventListener('click', () => {
    if (button.state === 'default' || button.state === 'hover') {
      button.classList.add('clicked')
      updateButtonState(button, 'walking1')
      setTimeout(() => {
        button.classList.add('door-slammed')
        updateButtonState(button, 'walking2')
        setTimeout(() => {
          button.classList.add('falling')
          updateButtonState(button, 'falling1')
          setTimeout(() => {
            updateButtonState(button, 'falling2')
            setTimeout(() => {
              updateButtonState(button, 'falling3')
              setTimeout(() => {
                button.classList.remove('clicked')
                button.classList.remove('door-slammed')
                button.classList.remove('falling')
                updateButtonState(button, 'default')
              }, 1000)
            }, logoutButtonStates['falling2']['--walking-duration'])
          }, logoutButtonStates['falling1']['--walking-duration'])
        }, logoutButtonStates['walking2']['--figure-duration'])
      }, logoutButtonStates['walking1']['--figure-duration'])
    }
  })
})

const logoutButtonStates = {
  'default': {
    '--figure-duration': '100',
    '--transform-figure': 'none',
    '--walking-duration': '100',
    '--transform-arm1': 'none',
    '--transform-wrist1': 'none',
    '--transform-arm2': 'none',
    '--transform-wrist2': 'none',
    '--transform-leg1': 'none',
    '--transform-calf1': 'none',
    '--transform-leg2': 'none',
    '--transform-calf2': 'none'
  },
  'hover': {
    '--figure-duration': '100',
    '--transform-figure': 'translateX(1.5px)',
    '--walking-duration': '100',
    '--transform-arm1': 'rotate(-5deg)',
    '--transform-wrist1': 'rotate(-15deg)',
    '--transform-arm2': 'rotate(5deg)',
    '--transform-wrist2': 'rotate(6deg)',
    '--transform-leg1': 'rotate(-10deg)',
    '--transform-calf1': 'rotate(5deg)',
    '--transform-leg2': 'rotate(20deg)',
    '--transform-calf2': 'rotate(-20deg)'
  },
  'walking1': {
    '--figure-duration': '300',
    '--transform-figure': 'translateX(11px)',
    '--walking-duration': '300',
    '--transform-arm1': 'translateX(-4px) translateY(-2px) rotate(120deg)',
    '--transform-wrist1': 'rotate(-5deg)',
    '--transform-arm2': 'translateX(4px) rotate(-110deg)',
    '--transform-wrist2': 'rotate(-5deg)',
    '--transform-leg1': 'translateX(-3px) rotate(80deg)',
    '--transform-calf1': 'rotate(-30deg)',
    '--transform-leg2': 'translateX(4px) rotate(-60deg)',
    '--transform-calf2': 'rotate(20deg)'
  },
  'walking2': {
    '--figure-duration': '400',
    '--transform-figure': 'translateX(17px)',
    '--walking-duration': '300',
    '--transform-arm1': 'rotate(60deg)',
    '--transform-wrist1': 'rotate(-15deg)',
    '--transform-arm2': 'rotate(-45deg)',
    '--transform-wrist2': 'rotate(6deg)',
    '--transform-leg1': 'rotate(-5deg)',
    '--transform-calf1': 'rotate(10deg)',
    '--transform-leg2': 'rotate(10deg)',
    '--transform-calf2': 'rotate(-20deg)'
  },
  'falling1': {
    '--figure-duration': '1600',
    '--walking-duration': '400',
    '--transform-arm1': 'rotate(-60deg)',
    '--transform-wrist1': 'none',
    '--transform-arm2': 'rotate(30deg)',
    '--transform-wrist2': 'rotate(120deg)',
    '--transform-leg1': 'rotate(-30deg)',
    '--transform-calf1': 'rotate(-20deg)',
    '--transform-leg2': 'rotate(20deg)'
  },
  'falling2': {
    '--walking-duration': '300',
    '--transform-arm1': 'rotate(-100deg)',
    '--transform-arm2': 'rotate(-60deg)',
    '--transform-wrist2': 'rotate(60deg)',
    '--transform-leg1': 'rotate(80deg)',
    '--transform-calf1': 'rotate(20deg)',
    '--transform-leg2': 'rotate(-60deg)'
  },
  'falling3': {
    '--walking-duration': '500',
    '--transform-arm1': 'rotate(-30deg)',
    '--transform-wrist1': 'rotate(40deg)',
    '--transform-arm2': 'rotate(50deg)',
    '--transform-wrist2': 'none',
    '--transform-leg1': 'rotate(-30deg)',
    '--transform-leg2': 'rotate(20deg)',
    '--transform-calf2': 'none'
  }
}
</script>
<style>

.logoutButton {
  --figure-duration: 100ms;
  --transform-figure: none;
  --walking-duration: 100ms;
  --transform-arm1: none;
  --transform-wrist1: none;
  --transform-arm2: none;
  --transform-wrist2: none;
  --transform-leg1: none;
  --transform-calf1: none;
  --transform-leg2: none;
  --transform-calf2: none;
  background: none;
  border: 0;
  color: #f4f7ff;
  cursor: pointer;
  display: block;
  font-family: "Quicksand", sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  outline: none;
  padding: 0 0 0 20px;
  perspective: 100px;
  position: relative;
  text-align: left;
  width: 50px;
  -webkit-tap-highlight-color: transparent;
}
.logoutButton::before {
  background-color: #1f2335;
  border-radius: 5px;
  content: "";
  display: block;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  transform: none;
  transition: transform 50ms ease;
  width: 100%;
  z-index: 2;
}
.logoutButton:hover .door {
  transform: rotateY(20deg);
}
.logoutButton:active::before {
  transform: scale(0.96);
}
.logoutButton:active .door {
  transform: rotateY(28deg);
}
.logoutButton.clicked::before {
  transform: none;
}
.logoutButton.clicked .door {
  transform: rotateY(35deg);
}
.logoutButton.door-slammed .door {
  transform: none;
  transition: transform 100ms ease-in 250ms;
}
.logoutButton.falling {
  animation: shake 200ms linear;
}
.logoutButton.falling .bang {
  animation: flash 300ms linear;
}
.logoutButton.falling .figure {
  animation: spin 1000ms infinite linear;
  bottom: -1080px;
  opacity: 0;
  right: 1px;
  transition: transform calc(var(--figure-duration) * 1ms) linear, bottom calc(var(--figure-duration) * 1ms) cubic-bezier(0.7, 0.1, 1, 1) 100ms, opacity calc(var(--figure-duration) * 0.25ms) linear calc(var(--figure-duration) * 0.75ms);
  z-index: 1;
}
.logoutButton--light::before {
  background-color: #f4f7ff;
}
.logoutButton--light .button-text {
  color: #1f2335;
}
.logoutButton--light .door,
.logoutButton--light .doorway {
  fill: #1f2335;
}

.button-text {
  color: #f4f7ff;
  font-weight: 500;
  position: relative;
  z-index: 10;
}

svg {
  display: block;
  position: absolute;
}

.figure {
  bottom: 5px;
  fill: #4371f7;
  right: 18px;
  transform: var(--transform-figure);
  transition: transform calc(var(--figure-duration) * 1ms) cubic-bezier(0.2, 0.1, 0.8, 0.9);
  width: 30px;
  z-index: 4;
}

.door,
.doorway {
  bottom: 4px;
  fill: #f4f7ff;
  right: 12px;
  width: 32px;
}

.door {
  transform: rotateY(20deg);
  transform-origin: 100% 50%;
  transform-style: preserve-3d;
  transition: transform 200ms ease;
  z-index: 5;
}
.door path {
  fill: #4371f7;
  stroke: #4371f7;
  stroke-width: 4;
}

.doorway {
  z-index: 3;
}

.bang {
  opacity: 0;
}

.arm1, .wrist1, .arm2, .wrist2, .leg1, .calf1, .leg2, .calf2 {
  transition: transform calc(var(--walking-duration) * 1ms) ease-in-out;
}

.arm1 {
  transform: var(--transform-arm1);
  transform-origin: 52% 45%;
}

.wrist1 {
  transform: var(--transform-wrist1);
  transform-origin: 59% 55%;
}

.arm2 {
  transform: var(--transform-arm2);
  transform-origin: 47% 43%;
}

.wrist2 {
  transform: var(--transform-wrist2);
  transform-origin: 35% 47%;
}

.leg1 {
  transform: var(--transform-leg1);
  transform-origin: 47% 64.5%;
}

.calf1 {
  transform: var(--transform-calf1);
  transform-origin: 55.5% 71.5%;
}

.leg2 {
  transform: var(--transform-leg2);
  transform-origin: 43% 63%;
}

.calf2 {
  transform: var(--transform-calf2);
  transform-origin: 41.5% 73%;
}

@keyframes spin {
  from {
    transform: rotate(0deg) scale(0.94);
  }
  to {
    transform: rotate(359deg) scale(0.94);
  }
}
@keyframes shake {
  0% {
    transform: rotate(-1deg);
  }
  50% {
    transform: rotate(2deg);
  }
  100% {
    transform: rotate(-1deg);
  }
}
@keyframes flash {
  0% {
    opacity: 0.4;
  }
  100% {
    opacity: 0;
  }
}


</style>
</body>
</html>
