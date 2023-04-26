


<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body>
        <?php include_once("header.php"); 
        
        $nb_animal=0;
       
        $sql = "SELECT Count(*) AS CT FROM Animal";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $nb_animal=$row["CT"];
            }
        } 
        
        else {
            echo "0 results";
        }
?>

        

        <main>
            <div style="text-align:center;">
                <h1>Déjà plus de <?php echo $nb_animal;?> animaux adorables disponibles à l'adoption !</h1>
                <h2>Je veux un : </h2>  
            </div> 

            <div id="categories_animaux">
                <?php

                    $sql = "SELECT * FROM Espece";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $key=$row["nom"];

                            
                            echo "<div class='cate_cell'>   
                            <a href='aff_adoptions.php?esp=".$row["id"]."'>
                                <img class='cate_cell_img' src='./images/db_images/".$row["nom"]."/img_bg/bg_image.jpg'>
                                <p>".$row["nom"]."</p>
                            </a>
                            </div>
                            ";
                        }
                    } 
                    
                    else {
                        echo "<h1>Aucune espèce disponible</h1>";
                    }

                ?>


                
                
            </div>
        </main>

        <?php include_once("footer.php"); ?> 
        <!--LE FOOTER !!!!!!-->
    </body>
</html>