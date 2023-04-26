<!DOCTYPE html>
<html>
    <?php include_once("head.php"); 
       if($_SESSION["connexion"]==0){
            header('Location: connexion.php');
       }
    ?>
   
        
<?php
    $tab_info = array();
    if(isset($_POST["fsubmit"])&&empty($tab_info)){
        function generate_id(){
            $aid='';
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
        
            for ($a = 0; $a < 5; $a++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
    
            $aid="ANI-".time().$randomString;
    
            return $aid;
        
        }

        $tab_info["id"]="'".generate_id()."'";
        $tab_info["nom"]="'".str_replace("'", " ",$_POST["fnom_a"])."'";
        $tab_info["idEspece"]=0;
        $tab_info["idRace"]=1;
        $tab_info["age"]=intval($_POST["fage_a"],10);
        $tab_info["adjectif"]="'".str_replace("'", " ",$_POST["fadj"])."'";
        $tab_info["etat"]="'".str_replace("'", " ",$_POST["fetat"])."'";
        /*Gérer les images*/

       
    
        $nom_dossier=substr($tab_info["id"], 1, -1);
    
        $tab_info["photo"]="'./images/db_images/".$_POST["fesp"]."/".$nom_dossier."'";


        /* UPLOAD DES IMAGES DANS DOSSIER*/
        

        /*VERIFIER TAILLE FICHIER */
        $dossier_final="./images/db_images/".$_POST["fesp"]."/".$nom_dossier."";
        mkdir($dossier_final);


        //DEPLACER IMAGES
        if(isset($_FILES["fphoto"])){
            for($i=0;$i<count($_FILES["fphoto"]["name"]);$i++){

                $file=$dossier_final."/".$_FILES["fphoto"]["name"][$i];
              

                if (move_uploaded_file($_FILES['fphoto']['tmp_name'][$i], $file)) {
                            //echo "File is valid, and was successfully uploaded.\n";
                        } 
                else {
                   // echo "Possible file upload attack!\n";
                }
                
                /*VOIR ERROR */
                /*echo 'Here is some more debugging info:';
                print_r($_FILES);*/
            }
        }

        /*Recuperer image puis mettre dans le dossier ! */
    

        $tab_info["idUti"]="'".$_SESSION["idUser"]."'";

        
        /*Requête pour trouver l'id de l'espèce*/
        $sql = "SELECT id FROM Espece WHERE nom='".$_POST["fesp"]."'";
    
        $result = $conn->query($sql);
        $i=0;
        if ($result->num_rows > 0) {
    
            while($row = $result->fetch_assoc()) {
                $tab_info["idEspece"]=intval($row["id"], 10);
                
            }
        } 
    
        else {
            echo "0 résultat";
        }
    
    
        /*Requête pour trouver l'id de la race*/
        $sql = "SELECT id FROM Race WHERE nom_r='".$_POST["frace"]."'";
    
        $result = $conn->query($sql);
        $i=0;
        if ($result->num_rows> 0) {
    
            while($row = $result->fetch_assoc()) {
                $tab_info["idRace"]=intval($row["id"], 10);
            }
        } 
    
        else {
            echo "0 résultat pour la race";
        }
    
    
    
        /*var_dump($tab_info);*/
    
        $for_sql=implode(',', $tab_info);

        // echo $for_sql;

        //ajout a la bdd
        $sql = "INSERT INTO Animal VALUE(".$for_sql.")";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            header("Location: pageanimal.php?esp=".$tab_info["idEspece"]."&race=".$tab_info["idRace"]."&id=".$nom_dossier);
        } 
    
        else {
            echo "Error: <br>" . $conn->error;
        }

  
 }

        ?>
           
    <body>

        <?php include_once("header.php"); ?>

        <main>
            <h1 style="text-align:center;">Créer mon annonce</h1>
        
          
            <div id="form_annonce">
                <form id="form" name="form_add_ani"  enctype="multipart/form-data" action="creerannonce.php" method="POST" onsubmit="return valider_annonce()"> 
                    

                    <h2>Informations sur l'animal</h2>

                    <label for="fnom_a">Nom  </label><br>
                    <input type="text" id="fnom_a" name="fnom_a"><br><br>

                    <label for="fage_a">Age  </label><br>
                    <input type="text" id="fage_a" name="fage_a"><br><br>

                    <label for="fesp">Espèce</label><br>

                    <br>
                    
                    <div onclick="pour_race(this)">
                    <select id="fesp" name="fesp">
                        <option>Vide</option>
                        <?php
                            $sql = "SELECT * FROM Espece";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                    <option value='".$row["nom"]."'>
                                        ".$row["nom"]."
                                    </option>
                                    ";
                                }
                            } 

                            else {
                                echo "Aucune espece disponible";
                            }

                            /*PUIS AJAX POUR RACE*/
                        ?>
                    </select></div><br><br>

                            

                    <label for="frace">Race</label><br><br>
                    
                    <select type="text" id="frace" name="frace">
                    <option>Vide</option>
                    </select>    
                    <br><br>

                
                    <label for="fphoto" >Photo</label>
                    <i class="fas fa-image"></i><br><br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="7000000"/>
                    <input type="file" id="fphoto" multiple name="fphoto[]" accept=".png, .jpg, .jpeg" required>
                    <p id="grand" style="display:none; color:red">Fichier(s) trop grand(s)</p>
                    <p id="trop" style="display:none; color:red">Vous pouvez choisir 5 photos maximums</p>
                    <br><br>

                    

                    <!--mettre un select -->
                    <label for="fetat">Etat de santé</label><br>
                    <input type="text" id="fetat" name="fetat"><br><br>

                    <label for="fadj">Un petit mot pour décrire votre animal ?</label><br>
                    <input type="text" id="fadj" name="fadj"><br><br>
                    
                    <?php 
                    if($_SESSION["compte_valide"]==0){
                        echo "<input type='submit' id='fsubmit' name='fsubmit' value='Envoyer' disabled>
                            <p style='font-size:0.7em;'>Votre compte doit être vérifié afin de pouvoir créer une annonce</p>";
                    }

                    else{
                        echo "<input type='submit' id='fsubmit' name='fsubmit' value='Envoyer'>";
                    }
                    ?>
                    
                </form>


                <div id="side_img_annonce">
                    <img src="images/annonce.png">
                </div>
            </div>
        </main>

        <?php include_once("footer.php"); 
        
        ?>


    </body>
</html>

