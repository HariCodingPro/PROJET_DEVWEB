<!DOCTYPE html>
<html>

    <?php include_once("head.php"); 

        if(isset($_SESSION["connexion"])&&$_SESSION["connexion"]==0){
            header("Location: connexion.php");
        }

        if(isset($_SESSION["future_adoption"])){
            //echo $_SESSION["future_adoption"];
        }
        else{
            echo "Pas d'id de l'animal à adopter";
         
        }

        if(isset($_POST["lets_go"])){

            $sql = "DELETE FROM Animal WHERE id='".$_SESSION["future_adoption"]."'";
            $result = $conn->query($sql);
        
            if ($result == TRUE) {
                echo "Le jeune animal a été supprimé";
            } 
        
            else {
                echo "Error: <br>" . $conn->error;
            }

            header("Location: adopter.php");
        }

       
    ?>

    <body>

        <?php include_once("header.php"); ?>

        <main>
            <h1 id="last_step">On y est preque !</h1>
            <form method='POST' action='poursuivre.php'>
                <div id='texte_motivation'>
                    <p>Alors, ça y est ! Vous avez choisi votre bout'chou. <b>C’est une belle décision</b>. Votre quotidien est sur le point de changer pour le mieux (enfin, on l’espère) ! Choisir son animal est un moment vraiment agréable de la vie. Vous devez être tellement impatient !</p>
                    <p style='text-decoration:underline;'>Éléments à bien garder en tête :</p>
                    <ul>
                        <li><b>Vous vous engagez à prendre soin de cet animal.</b> C'est à dire le nourrir, lui faire des calin etc. Faites comme si c'était votre enfant</li>
                        <li>Préparez-lui un bon lit douillet pour ses premières nuit. La science dit que ça leur permet de plus facilement être à l'aise</li>
                        <li>Graou !</li>
                    </ul>
                    <input type='submit' value="C'est parti, j'adopte !" name='lets_go' class='final_butt'>
               
                </div>
            </form>
        </main>

        <?php include_once("footer.php"); ?> 

    </body>

</html>
        