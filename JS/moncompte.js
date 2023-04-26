function new_doc(){
    var MAX=7000000;
    var info=document.getElementById("new_doc_files");
    if(info != ""){
        if(info.files[0].size > MAX){
            alert("Image trop lourde");
            return false;
        }
    }else{
        return false;
    }
   

}