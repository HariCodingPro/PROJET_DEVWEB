function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }
  

function isValidPhoneNumber(tel) {
    const phonePattern = /^\d{10}$/;
    return phonePattern.test(tel);
}

function age_limit(){ //Pour ne pas pouvoir être né demain

    var jour = new Date();
    var year = String(jour.getFullYear()).padStart(2, '0'); /*changer 18 */
    var month = String(jour.getMonth()+1).padStart(2, '0');
    var day = String(jour.getDate()).padStart(2, '0');
    var limit="";
    limit = year+'-'+month+'-'+day;
    
    document.getElementById("addn").max = limit;
   
}

window.onload = function() {
    age_limit();  
   
}

function verif_texte(x){
    const specialChars = /[`1234567890!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  

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

/*FAIRE LES VERIF + vert quand tout est bon*/
function ajouter_compte(){

    var fnom_a = document.getElementById("anom");
    var fprenom = document.getElementById("aprenom");
    var fddn = document.getElementById("addn");
    var email = document.getElementById("amail");
    var tel = document.getElementById("atel");
    var login = document.getElementById("alogin");
    var mdp = document.getElementById("apassword");
    var frecto = document.getElementById("apdi");
    var fverso = document.getElementById("apdis");
    var fpp = document.getElementById("ppdi");
    var texte=document.getElementsByClassName("error_compte");
    var valide=1;



    var MAXSIZE=7000000;


    if(frecto.value != ""){
        if (frecto.files[0].size > MAXSIZE) {
            texte[0].innerHTML="Fichier trop grand (7MO max)";
            texte[0].style.display="flex";
            frecto.style.borderBottom = "1px solid red";
            valide=0;
        
        }

        else{
            texte[0].style.display="none";
            frecto.style.borderBottom = "1px solid green";
        }
      
    }

    else{ 
        texte[0].style.display="none";
        frecto.style.borderBottom = "1px solid green";
    }

    if(fverso.value != ""){
        if (fverso.files[0].size > MAXSIZE) {
            texte[1].innerHTML="Fichier trop grand (7MO max)";
            texte[1].style.display="flex";
            fverso.style.borderBottom = "1px solid red";
            valide=0;
        
        }

        else{
            texte[1].style.display="none";
            fverso.style.borderBottom = "1px solid green";
        }
      
    }

    else{ 
        texte[1].style.display="none";
        fverso.style.borderBottom = "1px solid green";
    }

    if(fpp.value != ""){
        if (fpp.files[0].size > MAXSIZE) {
            texte[2].innerHTML="Fichier trop grand (7MO max)";
            texte[2].style.display="flex";
            fpp.style.borderBottom = "1px solid red";
            valide=0;
        
        }

        else{
            texte[2].style.display="none";
            fpp.style.borderBottom = "1px solid green";
        }
      
    }

    else{ 
        texte[2].style.display="none";
        fpp.style.borderBottom = "1px solid green";
    }

 

    if (!verif_texte(fnom_a.value)){ 
        fnom_a.style.borderBottom= "1px solid red";
        valide=0;
    }else{
          fnom_a.style.borderBottom = "1px solid black";   
      
    }


    if (!verif_texte(fprenom.value)){ 
        fprenom.style.borderBottom= "1px solid red";
        valide=0;
    }else{

        fprenom.style.borderBottom = "1px solid black"; 
    }


    if (fddn.value == ""){ 
        fddn.style.borderBottom= "1px solid red";
        valide=0;
    }else{

        fddn.style.borderBottom = "1px solid black"; 
    }


    if (isValidEmail(email.value)) {
        email.style.borderBottom = "1px solid black";
      } else {
        email.style.borderBottom = "1px solid red";
        valide=0;
      }
      
      if (isValidPhoneNumber(tel.value)) {
        tel.style.borderBottom = "1px solid black";
      } else {
        tel.style.borderBottom = "1px solid red";
        valide=0;
      }



    if (login.value == ""){ 
        login.style.borderBottom= "1px solid red";
        valide=0;
    }else{

        login.style.borderBottom = "1px solid black"; 
    }


    if (mdp.value == ""){ 
        mdp.style.borderBottom= "1px solid red";
        valide=0;
    }else{

        mdp.style.borderBottom = "1px solid black";
    }


    if (valide == 0){
        return false;
    }

    //AJAX VERIFIER SI ID EXISTE DEJA
 

}