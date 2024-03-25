<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header('Location: loginform.html');
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saidb";

$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>"; // Debugging message
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robotics</title>
    <link rel="stylesheet" href="../components/navbar/navbar.css">
    <link rel="stylesheet" href="../components/Robot/robot.css">
    <link rel="stylesheet" href="../pages/css/main.css">
    <link rel="icon" href="../components/images/icon.png">
</head>
<body>
    <!-- inserting navbar component -->
    <div id="navbar"></div>
    <script>
        fetch('../components/navbar/navbar.php')
        .then(response => response.text())
        .then(data => {
        document.getElementById('navbar').innerHTML = data;
        });
    </script>

    <main>
        <aside class="left-sidebar" id="sidebar">
            <div class="sidebar-content">

                <h3 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Find Repositories</h3>
                <form id="form2" role="search">
                    <input type="search" id="query" name="q"
                     placeholder="Search..."
                     aria-label="Search through site content">
                    <button><i class="bi bi-search"></i></button>
                </form>
                <div class="repo-source">
    <ul>
        <?php
        // Select the database
        if (!$conn->select_db($dbname)) {
            die("Database selection failed: " . $conn->error);
        }

        // Fetch Repository Names
        $sql = "SELECT name FROM repositories";
        $result = $conn->query($sql);

        if ($result === FALSE) {
            echo "Error fetching repository names: " . $conn->error;
        } else {
            while ($row = $result->fetch_assoc()) {
                $repo_name = htmlspecialchars($row['name']);
                echo '<li class="user-source">';
                echo '<div class="repolist">';
                echo '<a href="#" class="repo-pic"><img src="../components/images/profile.jpg" alt=""></a>';
                echo '<div class="reponame">';
                echo '<a href="#">' . $repo_name . '</a>';
                echo '</div>';
                echo '</div>';
                echo '</li>';
            }
        }
        ?>
    </ul>
</div>

                <form action="">
                    <div class="repo-creation">
                    <h3>Lets build a new project!</h3>
                    <a id="repo-btn" class="repo-btn" data-target="#login" data-toggle="modal">Create New Repo</a>
                </div>
                </form>
                

                <div class="popup-container" id="popupContainer">
                    <div class="popup">
                        <span class="close" onclick="closePopup()">&times;</span>

                        <form id="repo-form" method="post" action="create_repo.php">
    <h2>Create New Repository</h2>
    <label for="repo-name">Username:</label>
    <input type="text" disabled id="username" name="username" placeholder="alex">

    <label for="repo-name">Repository Name:</label>
    <input type="text" id="repo-name" name="repo_name" required>
    
    <label for="repo-desc">Description:</label>
    <textarea id="description" name="repo_description" rows="4" cols="50" required></textarea>

    <input type="submit" id="repo-submit" name="create_repo"  value="Create New Repo">
</form>

                    </div>
                </div>

                
        </aside>
        


        <div class="main">
            <div class="about">
                    <h1>Welcome </h1>
                    <h2>Our Journey</h2>
                    <p>UnleashRobotics was founded with a vision to create an inclusive space for robotics enthusiasts of all backgrounds and skill levels...</p>           
                    <h2>Our Mission</h2>
                    <p>At UnleashRobotics, our mission is to empower individuals to explore the vast realm of robotics...</p>
            
                    <h2>What Sets Us Apart</h2>
                    <ul>
                        <li><strong>Open-Source Excellence:</strong> Discover a treasure trove of open-source robot designs contributed by our diverse community...</li>
                        <li><strong>Collaboration Redefined:</strong> Forge connections with like-minded individuals, form teams, and embark on collaborative projects...</li>
                        <li><strong>Learning Resources Galore:</strong> Elevate your robotics skills with our rich collection of learning resources...</li>
                        <li><strong>Project Showcases:</strong> Explore the incredible projects developed by our community members...</li>
                    </ul>
            </div>


            <div class="project-ideas">
                <h1>Are you Beginner?</h1>
                <h3>here are some Robotics project ideas pick up and start a new project</h3>
            </div>          
            <div id="contentContainer"></div>
            <script id="contentTemplate" type="text/x-handlebars-template">
                {{#each sections}}
                <div class="section">
                    <h2>{{subtitle}}</h2>
                    {{#each paragraphs}}
                        <p>{{this}}</p>
                    {{/each}}
                </div>
                {{/each}}
            </script> 
        
            
        </div>
        <div class="right-sidebar">
            <!-- <div class="img">
                <img src="components/images/robot-img.png" alt="robot-img" height="350" width="300">
            </div> -->

            <div class="robots" onmouseover="playaudio()" onmouseout="pauseaudio()">
                <div class="android" > 
                    <div class="head"> 
                        <div class="eyes"> 
                            <div class="left_eye"></div> 
                            <div class="right_eye"></div>
                        </div> 
                    </div> 
                    <div class="upper_body"> 
                        <div class="left_arm"></div> 
                        <div class="torso">
                </div> 
                        <div class="right_arm"></div> 
                    </div> 
                    <div class="lower_body"> 
                        <div class="left_leg"></div> 
                        <div class="right_leg"></div> 
                    </div> 
                    <audio id="audio" src="../robot-voice.mp3">
                        Your browser does not support the audio tag.
                    </audio>
                </div>
               
            </div>
            <canvas id="myCanvas" width="300" height="100" >
                Your browser does not support the HTML canvas tag.</canvas>
            <script>
                var c = document.getElementById("myCanvas");
                var ctx = c.getContext("2d");
                ctx.font = "30px Arial";
                ctx.strokeStyle = "white";
                ctx.strokeText("Hello Robot Engineers", 0, 50);            
            </script>
            
            <video width="320" height="240" controls>
                <source src="../What is ROBOTICS Robotics Explained Robotics Technology What are Robots.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <!-- <iframe width="60" height="25" src="https://www.youtube.com/watch?v=RpVUTxE9Bdk" frameborder="0" allowfullscreen></iframe> -->
        </div>
        
    </main>     
</div>
<script src="./js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
</body>
</html>