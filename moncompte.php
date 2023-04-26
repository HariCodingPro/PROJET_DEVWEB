<!DOCTYPE html>
<html>
    <?php include_once("head.php");
    
    
        if(isset($_SESSION["connexion"])){
            if($_SESSION["connexion"]==0){
                header("Location: index.php");  
            }
        
        }

        if(isset($_POST["logout_but"])){
            $_SESSION["connexion"]=0;
            header("Location: index.php"); 
        }

        if(isset($_POST["sandy"])){


            $sql = "SELECT * FROM Utilisateur WHERE id='".$_SESSION["idUser"]."'";
    
            $result = $conn->query($sql);
            $i=0;
            if ($result->num_rows> 0) {
        
                while($row = $result->fetch_assoc()) {
                    $chemin=$row["photo_id"];
                }
            } 
        
            else {
                echo "0 résultat pour la race";
            }

         

            if(isset($_FILES["new_doc_files"])){
            
                $file=$chemin."/id_pics/".$_FILES["new_doc_files"]["name"];
                if (move_uploaded_file($_FILES['new_doc_files']['tmp_name'], $file)) {
                    //echo "File is valid, and was successfully uploaded.\n";
                } 
                else {
                    //echo "Possible file upload attack!\n";
                }
    
            
                //echo 'Here is some more debugging info:';
                //print_r($_FILES);


                $sql = "UPDATE Utilisateur SET valide='0' WHERE id='".$_SESSION["idUser"]."'";
                $result = $conn->query($sql);
        

                if ($result == TRUE) {
                    //echo "everyting is ok";
                } 
            
                else {
                    echo "Error: <br>" . $conn->error;
                }
            }

            else{
                echo "la photo n'a pas bougé";
            }


            
        }

    ?>
    <body>
       
        <?php include_once("header.php");?>

        <main>
          
            <h1 style="text-align:center;">Mon profil</h1>
           
            <div class="alignement">
                <div class="formsannonce">
                            <div class="profile_content">

                                <?php 
                                    
                                    $sql = "SELECT * FROM Utilisateur WHERE id='".$_SESSION["idUser"]."'";
                                    $result = $conn->query($sql);
        
                                    if ($result->num_rows > 0) {
                                    
                                 
                                        while($row = $result->fetch_assoc()) {

                                            if(is_dir($row["photo_id"])){
                                                $tab_img=scandir($row["photo_id"]."/profil");
                                                   
                                            }
                                            //Si le compte a été activé
                                            if($row["valide"]==1){
                                                $validite="Compte activé <i class='fas fa-check' style='color: #00ff62;'></i>";
                                                $_SESSION["compte_valide"]=1;
                                            }
                                            //Si l'utilisateur n'a pas encore regardé les fichiers
                                            else if($row["valide"]==0){
                                                $validite="Validation en cours <i class='fas fa-hourglass' style='color: #a35a48;'></i>";
                                                $_SESSION["compte_valide"]=0;
                                            }

                                            //Si les fichiers ont été refusés par l'utilisateur
                                            else if($row["valide"]==2){
                                                $_SESSION["compte_valide"]=0;
                                                $validite="Fichtre, un document n'est pas conforme ! <br> Veuillez ajouter le recto de votre pièce d'identité : ";
                                                $page_valider="<input type='file' id='new_doc_files' name='new_doc_files' accept='.png, .jpg, .jpeg' required><br><br>
                                                                <input type='submit' name='sandy' value='Envoyer'>
                                                ";
                                            }

                                            if($row["administrateur"]==1){
                                                $page_valider="<a href='validation.php'>Comptes à valider </a>";
                                            
                                            }

                                            else if(($row["administrateur"]==0)&&($row["valide"]!=2)){
                                                $page_valider='';
                                            }

                                           echo "
                                           
                                           <label class='titre_compte'>Nom  </label><br>
                                            <p>".$row["nom"]."</p><br><br>

                                            <label class='titre_compte'>Prénom  </label><br>
                                            <p>".$row["prenom"]."</p><br><br>

                                            <label class='titre_compte'>Date de naissance  </label><br>
                                            <p>".$row["ddn"]."</p><br><br>

                                            <label class='titre_compte'>Mail  </label><br>
                                            <p>".$row["mail"]."</p><br><br>

                                            <label class='titre_compte'>Téléphone  </label>
                                            <i class='fas fa-phone'></i><br>
                                            <p>".$row["telephone"]."</p><br><br>
                                            </div>
                                            </div>
                                            <div class='formsannonce'>
                                                <div class='profile_content'>
                                                
                                                
                                                    <label class='titre_compte'>Identifiant</label><br>
                                                    <p>".$row["login_u"]."</p><br><br>

                                                    <label class='titre_compte'>Mot de passe</label><br>
                                                    <p>*********</p><br><br>

                                                    <label class='titre_compte'>Activation compte</label><br>
                                                    <p style='font-style:italic;'>".$validite."</p>

                                                    <form enctype='multipart/form-data' action='moncompte.php' method='POST' onsubmit='return new_doc()'>
                                                    <input type='hidden' name='MAX_FILE_SIZE' value='7000000'/>
                                                    ".$page_valider."
                                                    </form>

                                                </div>
                                            </div>

                                            <div class='formsannonce'>
                                            <div class='alignements' >
                                                <img class='moncompte_image' src='./images/db_images_personne/".$_SESSION["idUser"]."/profil/".$tab_img[2]."'><br><br>
                                                <input type='file' name='image_profil' id='image_profil'>
                                                <input type='submit' id='bouton_compte' value='Changer de photo de profil'>
                                                        
                                            </div>
                                            </div>
                                           ";
                                        }
                                    } 

                                    else{
                                        echo "0 result !";
                                    }
                                    
                                ?>

                                
                            
                
            </div>
            

            <h2>Annnonces possédées</h2>
            <?php                   
                $sql = "SELECT * FROM Animal WHERE idUti='".$_SESSION["idUser"]."'";

                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    

                // output data of each row
                    while($row = $result->fetch_assoc()) {

                        if(is_dir($row["photo"])){
                            $tab_img=scandir($row["photo"]);

                            echo "
                            <div class='liste_annonces_compte'>

                                <a class='pageanimal_compte_but' href='pageanimal.php?esp=".$row["idEspece"]."&race=".$row["idRace"]."&id=".$row["id"]."'><div class='annonces_compte'>
                                    <div class='an_compte_img'>
                                        <img src=".$row["photo"]."/".$tab_img[2].">
                                    </div>
                                    <div class='an_infos'>
                                        <p style='color:black;'>".$row["nom"]."</p>
                                        <p style='color:black;'>".$row["age"]. "ans"."</p>
                                    </div>
                                </div></a>
                            </div>                  
                        ";

                        }
                        else{
                            echo "erreur dossier image!";
                        }

                    }
                }    

                else{
                    echo "vide";
                }
            ?>

            <div class="formannonce">
                <form class="forms" method="post" style="text-align:center;">
                    <a href="index.php" class="un">Accueil</a><br><br><br>
                    <a href="adoption.php" class="un">Découvrir nos animaux</a><br><br><br>
                    <input type="submit" id="logout_but" name="logout_but" value="Déconnexion">
                    <br><br>
                </form>
            
            </div>
            
        
        </main>



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