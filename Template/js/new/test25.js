//Estas son las funciones del lado de las Ventas
var productosVen = new Array();
var proAllVen = document.getElementById("venLista");
document.getElementById("venAgrPro").onclick = cargarProductosVen;
document.getElementById("venAgregar").onclick = agregarProductoVen;
document.getElementById("venGenVen").onclick = mostrarArreglosVen;
function cargarProductosVen(){
    var miSelect = document.getElementById("venProducto");
    while (miSelect.firstChild) {
        miSelect.removeChild(miSelect.firstChild);
    }
    for (var i=0; i<proAllVen.length; i++) {
        var ID = proAllVen.options[i].value;
        var miOption = document.createElement("option");
        miOption.setAttribute("value",ID);
        miOption.setAttribute("label",$('#venProDes'+ID).val()+' : '+$('#venProMar'+ID).val());
        miSelect.appendChild(miOption);
    }
    for(var i=0; i<productosVen.length; i++){
        for(var j=0; j<miSelect.length; j++){
            if (miSelect.options[j].value == productosVen[i]){
                miSelect.remove(j);
            }
        }
    }
}
function agregarProductoVen(){
    var miSelect = document.getElementById("venProducto");
    if(miSelect.length>0){
        var ID = $('#venProducto').val();
        //variables extraidas
        var descripcion = $('#venProDes'+ID).val();
        var marca = $('#venProMar'+ID).val();
        var precio = $('#venProPre'+ID).val();
        var max = $('#venProAlm'+ID).val();
        var color = "blue";
        if(max < 20){
            var color = "red";       
        }
        $('table tbody').append(`
        <tr>
            <td>${descripcion+"- "+marca}</td>
            <td><input id="detVenGlo${ID}" name="glosa${ID}" type="text" pattern="[ñ,Ñ,A-Z,a-z,\ ]{0,255}" class="form-control" value="glosa${ID}"></td>
            <td><b style="color:${color};">${max}</b></td>
            <td><input id="detVenCan${ID}" name="cantidad${ID}" onchange="calibrarVen(${ID})" type="number" min="0" max=${max} class="form-control" value=0 required></td>
            <td><input id="detVenPreUni${ID}" name="precioUni${ID}" onchange="calibrarVen(${ID})" type="number" min="0" step="0.50" max="10000" class="form-control" value=${precio}></td>
            <td><input id="detVenPre${ID}" name="importe${ID}" type="number" class="form-control" value=0 readonly></td>
            <td><button onclick="eliminarFilaVen(${ID})" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
        </tr>`
        );
        productosVen.push(ID);
        calibrarProductosVen();
        calibrarVenIDs();
    }
}
function mostrarArreglosVen(){
    mostrarArregloVen("detVenGlo","venArrGlo");
    mostrarArregloVen("detVenCan","venArrCan");
    mostrarArregloVen("detVenPreUni","venArrUni");
    mostrarArregloVen("detVenPre","venArrImp");
}
function mostrarArregloVen(input,texto){
    var arreglo = "";
    for(var i=0; i<productosVen.length; i++){
        if(i==productosVen.length-1){
            arreglo += document.getElementById(input+productosVen[i]).value;
        }else{
            arreglo += document.getElementById(input+productosVen[i]).value+",";
        }
    }
    document.getElementById(texto).value = arreglo;
}
function eliminarFilaVen(ID){
    opcion = confirm('¿Esta seguro de eliminar el producto seleccionado?');
    if (opcion == true) {
        $(event.target).closest('tr').remove();
        find = productosVen.findIndex(function checkAge(num) {
            return num == ID;
        })
        productosVen.splice(find, 1);
        calibrarProductosVen();
        calibrarVenIDs();
    }
}
function calibrarVen(ID){
    var can = document.getElementById('detVenCan'+ID).value;
    var preUni = document.getElementById('detVenPreUni'+ID).value;
    var cal = can*preUni;
    document.getElementById('detVenPre'+ID).value = cal;
    calibrarProductosVen();
}
function calibrarProductosVen(){
    var totalPag = 0;
    var totalPro = 0;
    for(var i=0; i<productosVen.length; i++){
        var num1 = Number(document.getElementById('detVenPre'+productosVen[i]).value);
        totalPag += num1;
        var num2 = Number(document.getElementById('detVenCan'+productosVen[i]).value);
        totalPro += num2;
    }
    document.getElementById('venTotalPag').value = totalPag;
    document.getElementById('venTotalPro').value = totalPro;
}
function calibrarVenIDs(){
    var arreglo = "";
    for(var i=0; i<productosVen.length; i++){
        if(i==productosVen.length-1){
            arreglo += productosVen[i];
        }else{
            arreglo += productosVen[i]+",";
        }
    }
    document.getElementById("venArrPro").value = arreglo;
}