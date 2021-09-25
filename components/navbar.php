<nav class="navbar navbar-expand-lg navbar-light bg-nav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="images/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        addMe
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contactus.php">Contact</a>
        </li>
        
      </ul>
      
      
      <div class="dropdown dropstart">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Action
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <?php
         echo  !isset($_COOKIE['email']) && !isset($_SESSION['user']) ?
          '<li><a class="dropdown-item" href="signin.php">Sign In</a></li>
          <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>' 
          : '<li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>' ;
        ?>
      </ul>
    
      </div>
    </div>
  </div>
</nav>