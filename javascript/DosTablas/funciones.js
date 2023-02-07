function pintaBorrar(pos){
    let num=document.getElementsByTagName('td')[pos];
    let letras=["A","B","C","D"];
    if (num.innerHTML==""){
        num.innerHTML=letras[pos];
    }
    else {
        num.innerHTML="";
    }
}

function fondoRojo(pos){
    document.getElementsByTagName('td')[pos].style.backgroundColor="red";
}

function fondoBlanco(pos){
    document.getElementsByTagName('td')[pos].style.backgroundColor="white";
}