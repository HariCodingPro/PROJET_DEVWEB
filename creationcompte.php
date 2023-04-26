<!DOCTYPE html>
<html>
    <?php include_once("head.php");
    //phpinfo();
   
    ?>
    
    <?php

    /*Fabriquer un ID*/
    function generate_id(){
        $aid='';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($a = 0; $a < 5; $a++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $aid="'USR-".time().$randomString."'";

        return $aid;

    }

    $tab_info=array(); //Tableau qui va contenir les informations a ajouter dans la bdd


    if(isset($_POST["compte_but"])){

     
        $tab_info["id"]=generate_id();
        $tab_info["nom"]="'".$_POST["anom"]."'"; //les ' sont importants pour l'ajout à la bdd dans VALUES('a')
        $tab_info["prenom"]="'".$_POST["aprenom"]."'";
        $tab_info["ddn"]="'".$_POST["addn"]."'";
        $tab_info["mail"]="'".$_POST["amail"]."'";
        $tab_info["telephone"]="'".$_POST["atel"]."'";
        $tab_info["identifiant"]="'".$_POST["alogin"]."'";
        $tab_info["mdp"]="'".$_POST["apassword"]."'";
       

        // Création dossier pour les images de l'utilisateur
        $nom_dossier="./images/db_images_personne/".substr($tab_info["id"], 1, -1);
        mkdir($nom_dossier); //DOSSIER GLOBAL, AVEC ID

        $nom_dossier_pp=$nom_dossier."/profil";  //DOSSIER DANS ID de la pp
        mkdir($nom_dossier_pp);

        $nom_dossier_id=$nom_dossier."/id_pics";

        mkdir($nom_dossier_id);
        $tab_info["photo"]="'".$nom_dossier."'";

      
       

        //Déplacement des photos du formulaire, au serveur puis à l'emplacement souhaité
        if(isset($_FILES["apdi"])){
            
            $file=$nom_dossier_id."/".$_FILES["apdi"]["name"];
            if (move_uploaded_file($_FILES['apdi']['tmp_name'], $file)) {
                echo "File is valid, and was successfully uploaded.\n";
            } 
            else {
                echo "Possible file upload attack!\n";
            }

        
          //  echo 'Here is some more debugging info:';
            print_r($_FILES);
        }
        else{
            echo "images FILES not working";
        }

    //Deuxieme photo!
        if(isset($_FILES["apdis"])){
            
            $file=$nom_dossier_id."/".$_FILES["apdis"]["name"];
            if (move_uploaded_file($_FILES['apdis']['tmp_name'], $file)) {
                echo "File is valid, and was successfully uploaded.\n";
            } 
            else {
                echo "Possible file upload attack!\n";
            }

        
            echo 'Here is some more debugging info:';
            print_r($_FILES);
        }
        
        else{
            echo "not working";
        }

        if(isset($_FILES["ppdi"])){
            
            $file=$nom_dossier_pp."/".$_FILES["ppdi"]["name"];
            if (move_uploaded_file($_FILES['ppdi']['tmp_name'], $file)) {
                echo "File is valid, and was successfully uploaded.\n";
            } 
            else {
                echo "Possible file upload attack!\n";
            }

        
            echo 'Here is some more debugging info:';
            print_r($_FILES);
        }
        else{
            echo "not working";
        }



        $tab_info["valide"]=0;
        $tab_info["admin"]=0;
        $tab_info["favoris"]="''";

        $compte=implode(",", $tab_info);


        $sql = "INSERT INTO Utilisateur VALUES ($compte)";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "New record created successfully";
            $_SESSION["connexion"]=1;
            $_SESSION["idUser"]=substr($tab_info["id"],1,-1);
            //header('Location: moncompte.php');
          } 
          
          else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

        $tab_valider["id"]=$tab_info["id"];
        $tab_valider["nom"]=$tab_info["nom"];
        $tab_valider["prenom"]=$tab_info["prenom"];
        $tab_valider["ddn"]=$tab_info["ddn"];

        $info_valider=implode(",", $tab_valider);

        $sql = "INSERT INTO Valider VALUES (".$info_valider.")";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            //echo "New record created successfully";
            
            header('Location: moncompte.php');
          } 
          
          else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
    
?>
    <body>
    <?php include_once("header.php")?>

            <div id="images_connexion">
                <h1 style="text-align:center; color:white;">Création de compte</h1>
                <div id="formannonce">
                    <form id="forms"  enctype="multipart/form-data" action="creationcompte.php" method="POST" onsubmit="return ajouter_compte()"> 
                        <h3>Informations personnelles</h3>

                        <label for="anom">Nom  </label><br>
                        <input type="text" id="anom" name="anom" ><br><br>
              

                        <label for="aprenom">Prénom  </label><br>
                        <input type="text" id="aprenom" name="aprenom" ><br><br>

                        <label for="addn">Date de naissance  </label><br>
                        <input type="date" id="addn" name="addn" ><br><br>

                        <label for="amail">Mail  </label><br>
                        <input type="email" id="amail" name="amail" ><br><br>

                        <label for="atel">Téléphone  </label>
                        <i class="fas fa-phone"></i><br>
                        <input type="text" id="atel" name="atel" ><br><br><br>

                        <label for="apdi" style="font-weight:bold;">Pièce d'identité  </label>

                        <h5>Veuillez rentrer le recto ici &nbsp <i class="fas fa-id-card" style="color:orange;"></i></h5>
                        <input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
                        <input type="file"  id="apdi" name="apdi"  accept=".png, .jpg, .jpeg" required> <br>
                        <span class="error_compte">zrr</span>
                        <br><br>


                        <h5>Veuillez rentrer le verso ici &nbsp <i class="fas fa-id-card" style="color:orange;"></i></h5>
                        <input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
                        <input type="file"  id="apdis" name="apdis"  accept=".png, .jpg, .jpeg" required> <br>
                        <span class="error_compte">zrr</span><br><br>


                        <h5>Choisissez une photo de profil &nbsp <i class="fas fa-camera" style="color:orange;" aria-hidden="true"></i></h5>
                        <input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
                        <input type="file"  id="ppdi" name="ppdi"  accept=".png, .jpg, .jpeg" required> <br>
                        <span class="error_compte">zr!r</span>
                           <br> <br>

                        <h3>Informations de connexion</h3>

                        <label for="alogin">Identifiant</label><br>
                        <input type="text" id="alogin" name="alogin"  ><br><br>

                        <label for="apassword">Mot de passe</label><br>
                        <input type="password" id="apassword" name="apassword" ><br><br>

                        <a href="connexion.php" id="un">J'ai déjà un compte</a><br><br><br>

                        <input type="submit" id='compte_but' name="compte_but" class="submit_co" onclick="ajouter_compte()">
                    
                    </form>
                </div>    

            </div>
        
            <footer>

                <ul id="texte">
                    <li><a href="cookie.php">Cookies</a></li>
                    <li ><a href="mention.php">Mention légales</a></li>
                    <li ><a href="politique.php">Politique de confidentialité</a></li>
                    <li><a href="contacteznous.php">Contactez-nous</a></li>
                    <li><a href="plandusite.php">Plan du site</a></li>
                    <li>A Poils - @ Copyright 2023</a></li>
                </ul>


            </footer>
    </body>
</html>
        