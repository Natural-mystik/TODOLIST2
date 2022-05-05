<?php
     /* ======================================*/
    /*db connection function*/
    /* ======================================*/

    function dbConnect()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "todo_list";
    
        $conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connetion failed.");
        return $conn;
    }
   
    $conn = dbConnect();

    /* ======================================*/
    /*check email is valid or not function*/
    /* ======================================*/

    function emailIsValid($email)
    {
        $conn = dbConnect();
        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn,  $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0){
            return true;
        }else{
            return false;
        }
    }

    /* ======================================*/
    /*check login detail is valid or not function*/
    /* ======================================*/

    function checkLoginDetails($email, $password)
    {
        $conn = dbConnect();
        $sql = "SELECT email FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn,  $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0){
            return true;
        }else{
            return false;
        }
    }

    /* ======================================*/
    /*create users function*/
    /* ======================================*/

    function createUsers($email, $password)
    {
        $conn = dbConnect();
        $sql = "INSERT INTO users (email, password) VALUES ('$email','$password')";
        $result = mysqli_query($conn,  $sql);
        return $result;
    }

  /* ======================================*/
    /*Get Head function*/
    /* ======================================*/

    function getHead()
    {
       $output = '<!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
   
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link href="style.css" rel="stylesheet">
   
       <title>MYTOTOOL</title>';

       echo $output;
    }

    /* ======================================*/
    /*Get Headear  function*/
    /* ======================================*/

    function getHeader()
    {
       $output = '<header class="py-3 mb-4 border-bottom bg-white">
        <div class="d-flex flex-wrap justify-content-center container">
                <a href="todos.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                
                <span class="fs-4">MY TOTOOL</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="todos.php" class="nav-link active" aria-current="page">Accueil</a></li>
                <li class="nav-item"><a href="add-todo.php" class="nav-link text-dark">Ajouter votre Tâches</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link bg-danger text-white">Déconnexion</a></li>

    
            </ul>
        </div>
        </header>';

       echo $output;
    }
    
     /* ======================================*/
    /*  Text Limit function*/
    /* ======================================*/

    function textLimit($string, $limit)
    {
       if (strlen($string) > $limit) { 
            return substr($string, 0, $limit) . "...";
        }else {
            return $string;
        }
    }

     /* ======================================*/
    /*  Get Todo  function*/
    /* ======================================*/

    function getTodo($todo)
    {
       $output = '<div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">'. textLimit($todo['title'], 28) .'</h4>   
            <p class="card-text">'. textLimit($todo['description'], 75) .'</p>
            <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <a href="view-todo.php?id='. $todo['id'] .'" class="btn btn-sm btn-outline-secondary">Voir</a>
                <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
            </div>
            <small class="text-muted">'. $todo['date'] .'</small>
            </div>
        </div>
        </div>';

       echo $output;
    }
