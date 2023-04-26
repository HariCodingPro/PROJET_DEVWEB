function derouler(){
    var menu=document.getElementById("menu");
    var gbg=document.getElementById("gray_bg"); 

    if(menu.style.display=="flex"){
        menu.style.display="none";
        gbg.style.display="none";
    }

    else{
        menu.style.display="flex";
        gbg.style.display="flex";
    }
}