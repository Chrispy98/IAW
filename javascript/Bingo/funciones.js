function crearTabla(){
    document.getElementsByTagName('span')[0].innerHTML='<table border="1px solid black"></table>';
    let altura=document.f1.altura.value;
    let tabla=document.getElementsByTagName('table')[0];
    for (let i=0; i<altura; i++){
        tabla.innerHTML+="<tr></tr>";
        for (let j=0; j<i+1; j++){
            let fila=document.getElementsByTagName('tr')[i];
            fila.innerHTML+='<td onclick="cambiarTD(this)" onmouseover="cambiarRojo(this)" \
             onmouseleave="cambiarBlanco(this)" border="1px solid black">'+(Math.floor(Math.random()*10)+1)+'</td>';
        }
    }
}

function cambiarTD(td){
    if (td.innerHTML<=5){
        td.innerHTML="0";
    }
    else {
        td.innerHTML="";
    }
}

function cambiarRojo(td){
    td.style.backgroundColor="red";
}

function cambiarBlanco(td){
    td.style.backgroundColor="white";
}