<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <style>
        body {
            width: 100%;
            background-position: center;
            background-size: cover;
            text-align: left;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
        }
    
        h1 {
            font-size: xx-large;
            color: black;
    
        }
        li {
            height: 5vh;
            list-style: square;
        }
    
        .hide {
            display: none;
        }
    
        input[type="text"], a{
            position: absolute;
            top: 10px;
            right: 10px;
            height: 4vh;
            width: 200px;
            border: 2px solid black;
        }
    
        a {
            margin-top: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background-color: rgb(3, 106, 143);
            color: white;
        }
    </style>
    
    <h1>My Projects </h1>

    <?php
                            $dbConn = new mysqli('localhost', 'root', '', 'potifolio');
    
                            if ($dbConn->connect_error) {
                                die($dbConn->connect_error);
                            }
    
                            $query = "SELECT `project_name` FROM `projects`;";
    
                            $res = $dbConn->query($query);
    
                            if($res) {
                                while ($data = $res->fetch_assoc() ) {
                                    $pj = $data['project_name'];
                                    echo "<li>$pj</li>";
                                }
                            }
    
                            $dbConn->close();
                            ?>

    <form action="">
        <label for=""><input type="text" placeholder="search for Projects" class="searchfield"></label>
    </form>

    <a href="index.html">HOME</a>
    
    <script>
        document.querySelectorAll('li').forEach(li => {
            li.setAttribute('class', '');
        });

        let searchField = document.querySelector('.searchfield');

        searchField.onkeyup = function () {
            document.querySelectorAll('li').forEach(li => {
                if (!(li.innerHTML.toLocaleLowerCase().includes(searchField.value))) {
                    li.classList.add('hide')
                } else {
                    li.classList.remove('hide')
                }
            })
        }
    </script>
</body>
</html>

