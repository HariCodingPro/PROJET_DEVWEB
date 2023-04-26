<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body>
        <?php include_once("header.php"); ?>

        <h1 class="title_race">Découvrir les animaux</h1>

        <h2 style="text-align:center;">Chez À poils, nous avons une myriade d'espèces</h2>

        

        <div id="liste_race_d">
            <?php
                $sql = "SELECT * FROM Espece";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                       echo "
                       <a href='liste_races.php?esp=".$row["nom"]."'><p style='background-image: url(./images/db_images/".$row["nom"]."/img_bg/liste_race_bg.jpg);'>".$row["nom"]."</p></a>
                       ";
                    }
                } 

                else {
                    echo "Aucune espèce disponible";
                }

            ?>
           
           
        </div>
        <?php include_once("footer.php"); ?>
    </body>
</html>