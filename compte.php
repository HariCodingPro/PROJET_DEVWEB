<!DOCTYPE html>
<html>
    <?php include_once("head.php"); 
         if($_SESSION["connexion"]==1){
            header('Location: moncompte.php');
        }
    
    ?>
    <body>
        <?php include_once("header.php"); ?>
        <div id="connexion">
            <h2>Espace de connexion</h2>
        </div>

        <div id="image_connexion">
           
            <div id="bouton_connexion" name="bouton_connexion">
                        <ul>
                            <li><a href="connexion.php"><input type="button" id="monbouton" value="Connexion"></a></li>
                            <li><a href="creationcompte.php"><input type="button" id="monboutons" value="Création d'un compte"></a></li>
                        </ul>
            </div>
        </div>
            
        <?php include_once("footer.php"); ?> 
    </body>
</html>