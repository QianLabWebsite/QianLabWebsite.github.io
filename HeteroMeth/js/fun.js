function assignValueath()
{
var id = "AT1G48410,";
id+= "AT1G31280,";
id+= "AT2G27040,";
id+= "AT2G32940,";
id+= "AT5G21150,";
document.getElementById("#gene").value=id;
 for(var i=0;i<x.length;i++)
 {
     if(x[i].value=="existed")
     {
        x[i].checked=true;
     }else{
    x[i].checked=false;
  }
 }
}


function assignValueosa()
{
var id = "LOC_Os02g45070\n";
id+= "LOC_Os04g52540\n";
id+= "LOC_Os04g06770\n";
id+= "LOC_Os01g16870\n";
id+= "LOC_Os04g47870\n";
id+= "LOC_Os04g52550\n";
id+= "LOC_Os02g58490\n";
id+= "LOC_Os03g33650\n";
id+= "LOC_Os01g16850\n";
document.atidsearch.origList.value=id;
document.atidsearch.species.style.display = 'block';
document.atidsearch.species.value="Os";
 for(var i=0;i<x.length;i++)
 {
     if(x[i].value=="existed")
     {
        x[i].checked=true;
     }else{
    x[i].checked=false;
  }
 }
}

function assignValuezma()
{
var id = "GRMZM2G039455\n";
id+= "GRMZM2G354867\n";
id+= "GRMZM2G589579\n";
id+= "GRMZM2G441583\n";
id+= "GRMZM2G007791\n";
id+= "GRMZM2G141818\n";
id+= "GRMZM5G892991\n";
id+= "GRMZM2G089743\n";
id+= "GRMZM2G347402\n";
id+= "AC209206.3_FG011";
document.atidsearch.origList.value=id;
document.atidsearch.species.style.display = 'block';
document.atidsearch.species.value="Zm";
 for(var i=0;i<x.length;i++)
 {
     if(x[i].value=="existed")
     {
        x[i].checked=true;
     }else{
    x[i].checked=false;
  }
 }
}



function fileExample(){
var id = "AT1G48410\n";
id+= "AT1G31280\n";
id+= "AT2G27040\n";
id+= "AT2G32940\n";
id+= "AT5G21150\n";

document.atidsearch.origList.value=id;
}
