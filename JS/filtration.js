function filtrer(){
    var cells=document.getElementsByClassName("cell_ani");
    var age=0;
    for(i=0;i<cells.length;i++){
    
        age=cells[i].getElementsByTagName("p")[1].innerHTML;
        size=cells[i].getElementsByTagName("p")[1].innerHTML.length;
        age=age.substring(0, size-4);
        age=parseInt(age);
        console.log(age);
        if(age<=5){
            cells[i].getElementsByClassName.display='none';
        }

        else{
            console.log("hey");
        }

       
    }

    
}