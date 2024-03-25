<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Robotics</title>
    <link rel="stylesheet" href="navbar.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  </head>
  <body>
    <nav class="navbar fixed-top">
      <div class="navdiv">
        <div class="content">
          <div class="logo">
            <img src="robot.png" height="50px" width="55px">
          </div>
          <nav role="navigation">
            <ul>
                <li><a href="#" class="home-title">Dashboard</a></li>
              </ul>
          </nav>
          
          <form id="search-form" role="search">
            <input type="search" id="query" name="q"
             placeholder="Search..."
             aria-label="Search through site content">
            <button><i class="bi bi-search"></i></button>
          </form>
          <div class="option-menu">
            <div class="options" title="Logout" onclick="logout_func()">
              <a href="./logout.php"><i class="bi bi-box-arrow-right"></i></a>
            </div>
            <div class="options" title="profile">
                <a href="./profile.html"><i class="bi bi-person-fill"></i></a>
            </div>
            <label class="switch">
              <input type="checkbox" id="checkbox">
              <span class="slider round"></span>
            </label>
          </div>
          
          
        </div>
      </div>
    </nav>
  </body>
</html>
<?php
 function logout_func(){
  session_destroy();
 }
?>
