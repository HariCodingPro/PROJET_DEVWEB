<?php

    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "cytech0001";
    $dbname = "apoils";  
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    

    $espece=$_REQUEST["e"];

    /*Je récupère l'espèce, puis je trouve ses races grâce à une requête sql */

    $sql = "SELECT * FROM Race R, Espece E WHERE R.idEspece=E.id AND E.nom='$espece'";

    $result = $conn->query($sql);
    $i=0;

    echo "<option>Vide</option>";
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            /*echo est le responseText*/
            echo "
                
                <option>
                    ".$row["nom_r"]."
                </option>
            ";
        }
    } 

    else {
        echo "Aucune espece disponible";
    }

    //var_dump($_SESSION["liste_race"]);

?>