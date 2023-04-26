<?php
    
    session_start();

    if(isset($_SESSION["connexion"])&&($_SESSION["connexion"]==1)){
       // echo $_SESSION["idUser"];
    }

    else{
        $_SESSION["connexion"]=0;
    }

    if(isset($_SESSION["compte_valide"]) && $_SESSION["connexion"]==1){
        //echo "  | ".$_SESSION["compte_valide"];
    }

  

    $servername = "localhost";
    $username = "root";
    $password = "cytech0001";
    $dbname = "apoils";  
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    

?> 

<head>
    <title>A poils !</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/accueil.css">
    <link rel="stylesheet" href="./CSS/adoptions.css">
    <link rel="stylesheet" href="./CSS/creerannonce.css">
    <link rel="stylesheet" href="./CSS/compte.css">
    <link rel="stylesheet" href="./CSS/moncompte.css">
    <link rel="stylesheet" href="./CSS/apropos.css">
    <link rel="stylesheet" href="./CSS/poursuivre.css">
    <link rel="stylesheet" href="./CSS/description.css">
    <link rel="stylesheet" href="./CSS/validation.css">
    <link rel="stylesheet" href="./CSS/footer.css">
    <link rel="stylesheet" href="./CSS/liste_description.css">
    <link rel="stylesheet" href="./CSS/contacteznous.css">
    <link rel="stylesheet" href="./CSS/favoris.css">
    <link rel="stylesheet" href="./CSS/pageanimal.css">
    <link rel="stylesheet" href="./CSS/adopter.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
    <link rel="stylesheet" href="https://kit.fontawesome.com/3973c994c7.css" crossorigin="anonymous">
    <script src="JS/header.js"></script>
    <script src="JS/creerannonce.js"></script>
    <script src="JS/connexion.js"></script>
    <script src="JS/verifannonce.js"></script>
    <script src="JS/creationcompte.js"></script>
    <script src="JS/moncompte.js"></script>
    <script src="JS/pageanimal.js"></script>
    <script src="JS/filtration.js"></script>
    <link rel="shortcut icon" href="./images/icon2.png" type="image/x-icon">
</head>

