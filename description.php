<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body>
        <?php include_once("header.php"); ?>

        <main>
        <?php 
            $sql="SELECT * FROM Race R, Espece E WHERE R.id=".$_GET["race"]." AND E.id=".$_GET["esp"]."";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()){ 
                echo "
                <div class='race_content e1'>
                    <img id='round_img' src='images/db_images/".$row["nom"]."/img_bg/".$row["nom_r"]."/race.jpg'>
                    <h1>".$row["nom_r"]."<h1>
                </div>
            
                    <div class='race_content e2'>
                        <div class='left_race'>
                            <h2 style='text-align: center;'>Résumé</h2>
                            <p style='padding: 1em;'>".$row["res_race"]."
                        </div>

                        <div class='right_race' style='text-align: center;'>
                            <img src='images/db_images/".$row["nom"]."/img_bg/".$row["nom_r"]."/race2.jpg' >
                        </div>

                        
                        <h2 style='text-align: center; width:100%;'>Caractéristiques à noter</h2>

                        <div class='carac_race'>
                            
                            <div class='features_race'>
                                <h4>Particularité</h4>
                                <p>".$row["particularite_physique"]."</p>
                            </div>  

                            <div class='features_race'>
                                <h4>Espérance de vie</h4>
                                <p>".$row["esperance_vie"]." ans</p>
                            </div>  

                            <div class='features_race'>
                                <h4>Education</h4>
                                <p>".$row["education"]."</p>
                            </div>  

                            <div class='features_race'>
                                <h4>Activité physique</h4>
                                <p>".$row["activite_physique"]."</p>
                            </div>  

                            <div class='features_race'>
                                <h4>Entretien Hygiène</h4>
                                <p>".$row["entretien_hygiene"]."</p>
                            </div>  
                        </div>
                        ";
                    }
                } ?>
                <!--Afficher les animaux dans la db-->
                <?php
                    $sql="SELECT * FROM Race  WHERE id=".$_GET["race"];
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {                          
                                while($row = $result->fetch_assoc()){ 
                                    echo"
                                    <!--Afficher les animaux dans la db-->
                                        <h2>Nos ".$row["nom_r"]."</h2>

                                    ";
                                }         
                            }
                ?>
                
                    <div class="ex_race">
                        <?php
                            $acc=0;
                            $sql="SELECT * FROM Animal A WHERE A.idRace=".$_GET["race"];
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) { 
    
                                while($row = $result->fetch_assoc()){
                                    
                                    if ($acc==3){
                                        break;
                                    }
                                    else{
                                        $tab_img=scandir($row["photo"]);                                  
                                        echo "
                                            
                                            <div class='ex_race_item'>
    
                                                        <a href='pageanimal.php?esp=".$_GET["esp"]."&race=".$_GET["race"]."&id=".$row["id"]."'>
                                                        <img src='".$row["photo"]."/".$tab_img[2]."'>
                                                        <p>".$row["nom"]."</p></a>
                                                                                                    
                                            </div>
                                        ";
                                    } 
                                    $acc++;           
                                } 
                                echo"
                                <div class='ex_race_item last_p'>
                                                <a href='aff_adoptions.php?esp=".$_GET["esp"]."'><button>Voir plus</button></a>
                                </div>";                                                                 
                                       
                            }else {
                                echo "
                                    
                                        <h2>Aucune annonce disponible</h2>
                                    ";
                            }
                        ?>

                        
                        </div>
                    </div>   
                </div>

        </main>
        <?php include_once("footer.php"); ?> 
    </body>
</html>