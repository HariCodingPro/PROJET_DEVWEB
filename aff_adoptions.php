<?php
    $num_animal=$_GET["esp"];

?>

<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body>
        <?php include_once("header.php"); ?>

        <main>
            <div >
                <h1 style="text-align:center;">Regardez comme ils sont beaux</h1>

                <div id="contenu_adoption">
                    <div id="filtres_rec">
                        <!--Faire le php pour actualiser la partie droite -->
                        <h2 style="text-align:center;">Filtres</h2>
                        <div class="filtre_section">
                            <p>Race</p>
                            <select id="race_filtre">
                                <option value='Toutes'>Toutes</option>
                            <?php 
                                $sql = "SELECT * FROM Race WHERE idEspece=".$_GET["esp"];
                                $result = $conn->query($sql);
                                $i=0;
                                if ($result->num_rows> 0) {
                                    //On regarde si l'utilisateur appuie sur l'un de ses animaux à lui
                                    while($row = $result->fetch_assoc()) { 
                                        echo "<option value='".$row["nom_r"]."'>".$row["nom_r"]."</option>";
                                    }
                                } 
                        
                                else {
                                    echo "0 résultat";
                                }
                           
                            
                            
                            ?>
                            
                               
                            </select>
                        </div>

                        

                        <div class="filtre_section">
                            <p>Age</p>
                            <select>
                                <option value="Tous">Tous</option>
                                <option value="0-5ans">0-5ans</option>
                                <option value="5-10ans">5-10ans</option>
                                <option value="+10ans">+10ans</option>
                            </select>
                        </div>

                        
                        <br>
                        <input type="button" value="Réinitialiser filtres" class="app_filtres">
                        <br><br>
                        <input type="button" value="Appliquer filtres" class="app_filtres" onclick='filtrer()'>

                    </div>
                    <div id="liste_animaux_adoption" name="liste_animaux_adoption">
                        <?php

                            /*APPLIQUER les filtres */
                            $sql = "SELECT * FROM Animal WHERE idEspece=$num_animal";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            
                            // output data of each row
                                while($row = $result->fetch_assoc()) {

                                    if(is_dir($row["photo"])){
                                        $tab_img=scandir($row["photo"]);

                                        echo "<div class='cell_ani'>
                                        <a href='pageanimal.php?esp=".$num_animal."&race=".$row["idRace"]."&id=".$row["id"]."'>
                                        <img class='cell_ani_img' src='".$row["photo"]."/".$tab_img[2]."'>
                                        <p style='font-weight:bold;' class='aff_adopt_info'>".$row["nom"]."</p>
                                        <p>".$row["age"]." ans</p>
                                        </a>
                                        </div>";
                                    }

                                    else{
                                        echo "Le dossier image de l'animal n'est pas correct";
                                    }

                                    
                                }
                            } 

                            else {
                                echo "
                                <div class='no_animal_av'>
                                <h1>Aucun animal disponible</h1><br>
                                <a href='creerannonce.php'><input type='button' class='app_filtres' value='Créer une annonce'></a>
                            
                                ";
                                
                            }
                        ?>
                       
                        
                    </div>
                </div>
            </div> 

        </main>

        <?php include_once("footer.php"); ?> 
        <!--LE FOOTER !!!!!!-->
    </body>
</html>