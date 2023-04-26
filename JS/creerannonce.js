function pour_race(x){
    var val=document.getElementById("fesp").value;
    if(val != "Vide"){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("frace").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET", "PHP/appelrace.php?e=" + val, true);
        xmlhttp.send();
    }
  
}



function verif_texte(x){
    const specialChars = /[`12345'67890!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  

    if(x==""){
        return false;
    }

    else if(x.length > 69){
        return false;
    }

    else if (specialChars.test(x)){
        
        return false;
    }

    else{
        return true;
    }
}

function verif_texte2(x){
    
    if(x==""){
        return false;
    }

    else if(x.length > 69){
        return false;
    }

    else{
        return true;
    }
}

/*FAIRE LES VERIF + vert quand tout est bon*/
function valider_annonce(){

    var fnom_a = document.getElementById("fnom_a");
    var fage_a = document.getElementById("fage_a");
    var fesp = document.getElementById("fesp");
    var frace = document.getElementById("frace");
    var fphoto = document.getElementById("fphoto");
    var fetat = document.getElementById("fetat");
    var fadj = document.getElementById("fadj");
    var imageSize = document.getElementById('fphoto');
    var texte = document.getElementById('grand');
    var valide=0;

    //VERIFIER 

    if (!verif_texte(fnom_a.value)){ 
        fnom_a.style.borderBottom= "1px solid red";
        value=1;
    }else{
        fnom_a.style.borderBottom = "1px solid black"; 
    }

    if (fage_a.value==""||isNaN(fage_a.value)){
        valide=1;
        fage_a.style.borderBottom = "1px solid red";
    }else{
        fage_a.style.borderBottom = "1px solid black";
    }

    if(fesp.value=="Vide" || frace.value==""){
        valide=1;
        fesp.style.border = "1px solid red";
    }else{
    
        fesp.style.border = "1px solid black";
    }

    if(frace.value=="Vide" || frace.value==""){
        valide=1;
        frace.style.border = "1px solid red";
    }else{
  
        frace.style.border = "1px solid black";
    }
       

    var troplour=[];
    var MAXSIZE=7000000;

    if(fphoto.value != ""){
        for(i=0;i<imageSize.files.length;i++){
            
            if (imageSize.files[i].size > MAXSIZE) {
                troplour.push(imageSize.files[i].name);
        }
    }}

    console.log(troplour);
    var newtxt="";
 
    if (troplour.length!=0) {
        newtxt=troplour.join(", ");
        console.log(newtxt);
        fphoto.style.borderBottom = "1px solid red";
        valide=1;

        texte.innerHTML="Fichier(s) trop grand(s) : "+newtxt;
        texte.style.display="flex";
    

    }
    else{ 
        texte.style.display="none";
        fphoto.style.borderBottom = "1px solid black";
    }
    




    troplour=[];

    if(!verif_texte2(fetat.value)){
        valide=1;
        fetat.style.borderBottom = "1px solid red";
    }else{
    
        fetat.style.borderBottom = "1px solid black";
    }

    if(!verif_texte2(fadj.value)){
        valide=1;
        fadj.style.borderBottom = "1px solid red";
    }else{
        
        fadj.style.borderBottom = "1px solid black"; 
    }           
                
   
    const champFichier = document.getElementById('fphoto');
    var trop = document.getElementById('trop');
    const maxFichiers = 5; // Limite à 5 fichiers

    // Écouteur d'événements pour la sélection de fichier

    //quand la page charge

    const fichiers = champFichier.files;
    
    // Vérification du nombre de fichiers
    if (fichiers.length > maxFichiers) {
    
        fphoto.style.borderBottom = "1px solid red";
        valide=1;
        if(trop.style.display=="none"){
            trop.style.display="flex";
        }
    }else {
        trop.style.display="none";
        fphoto.style.borderBottom = "1px solid black"; 
    }


    if(valide == 1){
        return false;
    }

}