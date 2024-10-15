document.getElementById("ini1").onchange = filtrarTabla;
document.getElementById("fin1").onchange = filtrarTabla;
document.getElementById("ini3").onchange = filtrarTabla2;
document.getElementById("fin3").onchange = filtrarTabla2;

function filtrarTabla(){
	var ini = document.getElementById("ini1").value;
	var fin = document.getElementById("fin1").value;
    document.getElementById("ini2").value = ini;
	document.getElementById("fin2").value = fin;
}
function filtrarTabla2(){
	var ini = document.getElementById("ini3").value;
	var fin = document.getElementById("fin3").value;
    document.getElementById("ini4").value = ini;
	document.getElementById("fin4").value = fin;
}