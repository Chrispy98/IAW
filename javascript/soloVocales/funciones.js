function esVocal(letra){
    return letra=="a" || letra=="e" || letra=="i" || letra=="o" || letra=="u";
}

function transformar(){
    let eleccion=document.f1.opcion.value;
    let cadena=document.f1.word.value;
    let nuevo="";
    if (eleccion=="reves"){
        for (let i=cadena.length-1; i>=0; i--){
            nuevo+=cadena[i];
        }
    }
    else if (eleccion=="inifin"){
        nuevo=cadena[0]+cadena[cadena.length-1];
    }
    else {
        for (let i=0; i<cadena.length; i++){
            let letra=cadena[i].toLowerCase();
            if (esVocal(letra)){
                nuevo+=cadena[i];
            }
            else {
                nuevo+="*";
            }
        }
    }
    document.getElementsByTagName('span')[0].innerHTML=nuevo;
}