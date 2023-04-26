<!--
    LE CSS de ce fichier est dans compte.css et creerannonce.css
 -->

<!DOCTYPE html>
<html>
    <?php include_once("head.php"); 

    if(isset($_POST["submit_co_but"])){
        if(isset($_POST["blogin"])&&isset($_POST["bmdp"])){
            $sql = "SELECT * FROM Utilisateur WHERE login_u='".$_POST['blogin']."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($_POST["bmdp"]==$row["mdp"] && $_POST["blogin"]==$row["login_u"]){
                        $_SESSION["connexion"]=1;
                        $_SESSION["idUser"]=$row["id"];
                        header("location: moncompte.php");
                    }

                    else{
                        echo "mdp ou login different";   
                    }
                }
            } 

            else {
                echo "ERREUR";
            }

        }

        else{
            /*aff erreur*/
        }
    }

    ?>
    <body>
        <?php include_once("header.php"); ?>
            <div id="images_connexion">
                <h1 style="text-align:center; color:white;">Connexion</h1>
                    <div id="formannonce">
                        <form id="forms" method="post">
                            <label for="blogin" style="text-align:center;">Identifiant</label><br>
                            <input type="text" id="blogin" name="blogin"><br><br>

                            <label for="bmdp" style="text-align:center;">Mot de passe</label><br>
                            <input type="password" id="bmdp" name="bmdp"><br><br>

                            <a href="creationcompte.php" id="un">Je n'ai pas de compte</a><br><br><br>

                            <input type="submit" class="submit_co" id="submit_co_but" name="submit_co_but">
                        </form>
                    </div>
            </div>
        <?php include_once("footer.php"); ?> 
    </body>
</html>
        