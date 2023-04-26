<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body>
        <?php include_once("header.php"); ?>

        <?php
            if(isset($_GET["esp"])){
                echo " <h1 class='title_race'>Races de ".$_GET["esp"]."</h1>";
            }

            else{
                echo " <h1 class='title_race'>Voici les races</h1>";
            }
        ?>
       
        <br><br>
        <div id='div_liste_race'>
                    <div class="liste_race_par_esp">
        <?php

            if(isset($_GET["esp"])){
                $esp=$_GET["esp"];
                $sql = "SELECT R.idEspece, R.nom_r, R.id FROM Race R, Espece E WHERE R.idEspece=E.id AND E.nom='$esp'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<a href='description.php?esp=".$row["idEspece"]."&race=".$row["id"]."'><p>".$row["nom_r"]."</p></li></a>";
                    }
                } 

                else {
                    echo "Aucune race disponible";
                }
            }

            else{
                echo "URL invalide !";
            }
            

        ?>
                <!--
                <a href="description.php"><p>Golden retriever</li></a>
                <a href="description.php"><p>Husky</p></a>
                <a href="description.php"><p>Bouledogue</p></a>-->
                
            </div>

            <div id="side_img_liste_race">
                    <img src="images/annonce.png">
            </div>
        </div>
        <br>
        <?php include_once("footer.php"); ?>
    </body>
</html>