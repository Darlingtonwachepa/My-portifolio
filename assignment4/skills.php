<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <style type="text/css">
        body {
            width: 100%;
            background-position: center;
            background-size: cover;
            text-align: left;
            margin: 0;
            position: relative;
        }
    
        div {
            padding: 50px;
    
            margin:15 15px 0 15px;
            background-color: rgba(229, 239, 243, 0.084);
    
        }
    
        li {
            background-color: lightgray;
            margin-top: 4vh;
            list-style:disc;
            padding-left: 5px;
            position: relative;
            cursor: pointer;
            height: 5.5vh;
            display: flex;
            align-items: center;
            width: 80%;
        }
        a {
            width: 150px;
            height: 4vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(3, 106, 143);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
    
        #main li .hint {
            content: 'Main skill';
            position: absolute;
            top: -25px;
            right: 0;
            background-color: rgba(45, 45, 45, 0.664);
            color: white;
            padding: 2px;
            border-radius: 2px;
    
        }
    
        .vanish {
            display: none;
        }
        #main li:hover .vanish {
            display: block;
        }
    
        .primary-skill {
            background-color: rgb(3, 106, 143);
            color: white;
        }
    
        h1 {
            font-family: Times, serif;
            font-size: xx-large;
            color: black;
        }
        .bar-wrapper {
            width: 40px;
            height: 400px;
            background-color: darkgrey;
            position: absolute;
            right: 5%;
            bottom: 15vh;
        }
        .bar {
            width: 100%;
            background-color: black;
            position: absolute;
            bottom: 0;
            transition: all 1s;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .title {
            position: absolute;
            bottom: -5vh;
            left: -15px;
            font-weight: bold;
        }
    </style>
    

    <div>
        <h1>My Skills</h1>
    
        <?php
                        
                            $dbConn = new mysqli('localhost', 'root', '', 'potifolio');
        
                            if ($dbConn->connect_error) {
                                die($dbConn->connect_error);
                            }
        
                            echo "<ol id='main'>";
                            $query = "SELECT `skill` FROM `skills` WHERE `skill_type` = 'main';";
                            $result = $dbConn->query($query);
        
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $skill = $row['skill'];
                                    echo "<li class='primary-skill'>$skill<span class='hint vanish'>Main Skill</span></li>";
                                }
                                $result->free();
                            } else {
                                echo "Error executing the query: " . $dbConn->error;
                            }
        
                            echo "</ol>";
        
                            // Close the database connection if necessary
                            $dbConn->close();




                     $dbConn = new mysqli('localhost', 'root', '', 'potifolio');
        
                            if ($dbConn->connect_error) {
                                die($dbConn->connect_error);
                            }
        
                            echo "<ol>";
                            $query = "SELECT `skill` FROM `skills` WHERE `skill_type` = 'other'";
                            $result = $dbConn->query($query);
        
                            if ($result) {
                                while ($row = $result->fetch_assoc()) {
                                    $skill = $row['skill'];
                                    echo "<li> $skill </li>";
                                }
                                $result->free();
                            } else {
                                echo "Error executing the query: " . $dbConn->error;
                            }
        
                            echo "</ol>";
        
                            // Close the database connection if necessary
                            $dbConn->close();



        
        ?>
        
    
        <a href="index.html">Go Home</a>
        
    </div>


    <script>

        // select first element in main skills list
        let primary_skill = document.getElementsByClassName('primary-skill')[0];

        //toggle style every second to attain attention
        let i_ID = setInterval(() => {
            primary_skill.classList.toggle('primary-skill');
        }, 150);

        setTimeout(() => {
            clearInterval(i_ID);
            primary_skill.classList.remove('primary-skill');
        }, 3000);


    </script>

</body>
</html>

