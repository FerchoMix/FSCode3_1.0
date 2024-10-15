//Ventas
var productos = new Array();
var proAll = document.getElementById("comLista");
document.getElementById("comAgrPro").onclick = cargarProductos;
document.getElementById("comAgregar").onclick = agregarProducto;
//document.getElementById("comGenerarEntrada").onclick = mostrarArreglo;
function cargarProductos(){
    var miSelect = document.getElementById("comProducto");
    while (miSelect.firstChild) {
        miSelect.removeChild(miSelect.firstChild);
    }
    for (var i=0; i<proAll.length; i++) {
        var ID = proAll.options[i].value;
        var miOption = document.createElement("option");
        miOption.setAttribute("value",ID);
        miOption.setAttribute("label",$('#comProDes'+ID).val()+' : '+$('#comProMar'+ID).val());
        miSelect.appendChild(miOption);
    }
    for(var i=0; i<productos.length; i++){
        for(var j=0; j<miSelect.length; j++){
            if (miSelect.options[j].value == productos[i]){
                miSelect.remove(j);
            }
        }
    }
}
function agregarProducto(){
    var miSelect = document.getElementById("comProducto");
    if(miSelect.length>0){
        var ID = $('#comProducto').val();
        //variables extraidas
        var descripcion = $('#comProDes'+ID).val();
       
        var marca = $('#comProMar'+ID).val();
        var precio = $('#comProPre'+ID).val();
        var hoy = $('#hoydia').val();
        $('table tbody').append(`
        <tr>
            <td>${descripcion+" - "+marca}</td>
            <td><input id="gl" name="glosa${ID}" type="text" pattern="[ñ,Ñ,A-Z,a-z,\ ]{0,255}" class="form-control" value="glosa${ID}"></td>
            <td><input id="detComFec${ID}" name="fechaVen${ID}"  min="${hoy}" class="form-control"></td>
            <td><input id="detComCan${ID}" name="cantidad${ID}" onchange="calibrar(${ID})" type="number" min="1" max="1000" class="form-control" value=0></td>
            <td><input id="detComPreUni${ID}" name="precioUni${ID}" onchange="calibrar(${ID})" type="number" min="0" step="0.50" max="10000" class="form-control" value=${precio}></td>
            <td><input id="detComPre${ID}" name="importe${ID}" type="number" class="form-control" value=0 readonly></td>
            <td><button onclick="eliminarFila(${ID})" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
        </tr>`
        );
        productos.push(ID);
        calibrarProductos();
        calibrarIDs();
    }
}
function eliminarFila(ID){
    opcion = confirm('¿Esta seguro de eliminar el producto seleccionado?');
    if (opcion == true) {
        $(event.target).closest('tr').remove();
        find = productos.findIndex(function checkAge(num) {
            return num == ID;
        })
        productos.splice(find, 1);
        calibrarProductos();
        calibrarIDs();
    }
}
function calibrar(ID){
    var can = document.getElementById('detComCan'+ID).value;
    var preUni = document.getElementById('detComPreUni'+ID).value;
    var cal = can*preUni;
    document.getElementById('detComPre'+ID).value = cal;
    calibrarProductos();
}
function calibrarProductos(){
    var totalPag = 0;
    var totalPro = 0;
    for(var i=0; i<productos.length; i++){
        var num1 = Number(document.getElementById('detComPre'+productos[i]).value);
        totalPag += num1;
        var num2 = Number(document.getElementById('detComCan'+productos[i]).value);
        totalPro += num2;
    }
    document.getElementById('comTotalPag').value = totalPag;
    document.getElementById('comTotalPro').value = totalPro;
}
function calibrarIDs(){
    var arreglo = "";
    for(var i=0; i<productos.length; i++){
        if(i==productos.length-1){
            arreglo += productos[i];
        }else{
            arreglo += productos[i]+",";
        }
    }
    document.getElementById("comArrPro").value = arreglo;
}
function prueba(){
    window.alert("Hello");
    //document.getElementById().value;
}
document.getElementById("comLista").onclick = prueba;