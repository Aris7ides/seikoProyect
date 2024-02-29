function openNav(){
    let nav=document.querySelector("header nav");
    if(nav.style.display=="none" || nav.style.display==""){
        nav.style.display="block";
    }else{
        nav.style.display="none";
    }
}