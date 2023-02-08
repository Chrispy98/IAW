function enableClick(){
    let tds=document.getElementsByTagName('td');
    for (let i=0; i<tds.length; i++){
        tds[i].onclick=function(){ponQuita(i);};
    }
}

function disableClick(){
    let tds=document.getElementsByTagName('td');
    for (let i=0; i<tds.length; i++){
        tds[i].onclick="";
    }
}

function ponQuita(pos){
    let td=document.getElementsByTagName('td')[pos];
    if (td.innerHTML==""){
        td.innerHTML=pos+1;
    }
    else {
        td.innerHTML="";
    }
}