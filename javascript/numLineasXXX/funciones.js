function pintaEquises(){
    let zona=document.getElementsByTagName('span')[0];
    let lineas=document.f1.num.value;
    zona.innerHTML="";
    for (let i=0; i<lineas; i++){
        zona.innerHTML+='<p onmouseover="cambio(this)" style="color: blue">xxx</p>';
    }
}

function cambio(e){
    if (e.style.color=="blue"){
        e.innerHTML="yyy";
        e.style.color="red";
    } 
    else {
        e.innerHTML="xxx";
        e.style.color="blue";
    }
}   