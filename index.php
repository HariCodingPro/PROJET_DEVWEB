<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body>
        <?php include_once("header.php"); ?>

        <main>
            <div id="accueil_div">
                <div id="texte_accueil">
                    <p>Bienvenue sur notre site !</p>
                
                  
                </div> 

                <div id="first_bouton" name="first_bouton">
                    <ul>
                        <li><a href="adoptions.php"><input type="button" value="J'adopte"></a></li>
                        <li><a href="creerannonce.php"><input type="button" value="Créer mon annonce"></a></li>
                    </ul>
                </div>
            </div>

            <div id='new_video'>
                <iframe width="840" height="472" id='vid_acc' src="https://www.youtube.com/embed/slTrT_LcaqY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div>
                    <h2>Des adopteurs de plus en plus ravis !</h2>
                    <p>Adopter, c’est permettre à un animal abandonné de prendre un nouveau départ, de retrouver une vie,
                    un foyer. En les adoptant, on leur offre une chance d’être enfin heureux.</p>
                    <br><br>
                    <p>
                    <h3> Témoignages</h3>
                    <p>
                    <i>« Mon meilleur des thérapeutes est à poils et à 4 pattes ! »</i> <br>Sophie Lafroge
                    <br><br>
                    « Mon chat est mon meilleur ami ! On s’amuse tellement ensemble » <br> <i>Francis Prait</i></p>
                    
                </div>
            </div>
        </main>

        <?php include_once("footer.php"); ?> 
    </body>
</html>