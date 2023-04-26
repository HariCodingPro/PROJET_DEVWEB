var index=0;

function Previous(x) {

    var val= document.getElementById("liste_pics").innerHTML;
    var images = val.split(',');
    var add=document.getElementById("image-annonce");
    /*for(i=0;i<images.length;i++){
        console.log(images[i]);
    }*/
    //console.log(add.src);

    if(x==1){
        index--;
    // Si on arrive au début du tableau, aller à la fin
        if (index < 0) {
            index = images.length - 1;
        }

        // Afficher la nouvelle image

        add.src = images[index];
    }
    else if(x==0){
        index++;

    // Si on arrive à la fin du tableau, aller au début
        if (index >= images.length) {
            index = 0;
        }                   
        // Afficher la nouvelle image
        add.src = images[index];
    }
    // Décrémenter l'index pour passer à l'image précédente
    
   
}  

