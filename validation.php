<!DOCTYPE html>
<html>

    <?php include_once("head.php"); ?>

    <?php
    

    if(isset($_SESSION["valider_nb"])){
       
        for($i=0;$i<$_SESSION["valider_nb"];$i++){
            if(isset($_POST["acc_but".$i])){

                //ACTIVATION DU COMPTE
                $sql = "UPDATE Utilisateur SET valide='1' WHERE id='".$_POST["id_val".$i]."'";
                $result = $conn->query($sql);
        

                if ($result == TRUE) {
                    echo "everyting is fine";
                } 
            
                else {
                    echo "Error: <br>" . $conn->error;
                }

                //SUPPRESSION DE LA TABLE VALIDER
                $sql = "DELETE FROM Valider WHERE id='".$_POST["id_val".$i]."'";
                $result = $conn->query($sql);
           

                if ($result == TRUE) {
                    echo "everyting is fine";
                } 
            
                else {
                    echo "Error: <br>" . $conn->error;
                }

                break;
            }

            else if(isset($_POST["ref_but".$i])){
                $sql = "UPDATE Utilisateur SET valide='2' WHERE id='".$_POST["id_val".$i]."'";
                $result = $conn->query($sql);
        

                if ($result == TRUE) {
                  //  echo "everyting is ok";
                } 
            
                else {
                    echo "Error: <br>" . $conn->error;
                }
            }

           
        }

        unset($_SESSION["valider_nb"]);
    }


    

?>

    <body>

        <?php include_once("header.php"); ?>
           <h1 style='text-align:center;'>Comptes en attente de validation</h1>
        <main>
            <?php
                $count=0;
                $sql = "SELECT * FROM Valider";
        
                $result = $conn->query($sql);
                $i=0;
                if ($result->num_rows > 0) {
            
                    while($row = $result->fetch_assoc()) {
                    
                        $location="./images/db_images_personne/".$row["id"]."/id_pics";
                        if(is_dir($location)){
                            $dossier_im=scandir($location);
                   
                            echo "<div class='persona'>
                                <div class='valider_gauche'>
                                    <p>".$row["nom"]." ".$row["prenom"]."</p>
                                  
                                    <p>Né(e) le : ".$row["ddn"]."</p>
                                    <img src='./images/db_images_personne/".$row["id"]."/id_pics/".$dossier_im[2]."' class='image_validation'>
                                    <img src='./images/db_images_personne/".$row["id"]."/id_pics/".$dossier_im[3]."' class='image_validation'>
                                </div>
                
                                <div class='valider_droite'>
                                    <form method='POST'>
                                        <input type='hidden' name='id_val".$count."' value='".$row["id"]."'>
                                        <input class='accepter_val' type='submit' name='acc_but".$count."' value='Accepter'>
                                        <input class='accepter_val' type='submit' name='ref_but".$count."' value='Refuser'>
                                    </form>
                                </div>
                            </div>";
                        }

                        else{
                            //echo "non frr";
                        }

                        $count++;
                        
                    }
                } 
            
                else {
                    echo "0 résultat!";
                }

                $_SESSION["valider_nb"]=$count;

            ?>
         
            
        </main>

        <?php include_once("footer.php");?> 

    </body>

</html>
        