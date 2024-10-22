//Este es las funciones del lado de las Compras
var productosCom = new Array();
var proAllCom = document.getElementById("comLista");
document.getElementById("comAgrPro").onclick = cargarProductosCom;
document.getElementById("comAgregar").onclick = agregarProductoCom;
document.getElementById("comGenEnt").onclick = mostrarArreglosCom;
function cargarProductosCom(){
    var miSelect = document.getElementById("comProducto");
    while (miSelect.firstChild) {
        miSelect.removeChild(miSelect.firstChild);
    }
    for (var i=0; i<proAllCom.length; i++) {
        var ID = proAllCom.options[i].value;
        var miOption = document.createElement("option");
        miOption.setAttribute("value",ID);
        miOption.setAttribute("label",$('#comProDes'+ID).val()+' : '+$('#comProMar'+ID).val());
        miSelect.appendChild(miOption);
    }
    for(var i=0; i<productosCom.length; i++){
        for(var j=0; j<miSelect.length; j++){
            if (miSelect.options[j].value == productosCom[i]){
                miSelect.remove(j);
            }
        }
    }
}
function agregarProductoCom(){
    var miSelect = document.getElementById("comProducto");
    if(miSelect.length>0){
        var ID = $('#comProducto').val();
        //variables extraidas
        var descripcion = $('#comProDes'+ID).val();
        var marca = $('#comProMar'+ID).val();
        var precio = $('#comProPre'+ID).val();
        $('table tbody').append(`
        <tr>
            <td>${descripcion+"-"+marca}</td>
            <td><input id="detComGlo${ID}" name="glosa${ID}" type="text" pattern="[ñ,Ñ,A-Z,a-z,\ ]{0,255}" class="form-control" value="glosa${ID}"></td>
            <td><input id="detComCan${ID}" name="cantidad${ID}" onchange="calibrarCom(${ID})" type="number" min="1" max="1000" class="form-control" value=0 required></td>
            <td><input id="detComPreUni${ID}" name="precioUni${ID}" onchange="calibrarCom(${ID})" type="number" min="0" step="0.50" max="10000" class="form-control" value=${precio}></td>
            <td><input id="detComPre${ID}" name="importe${ID}" type="number" class="form-control" value=0 readonly></td>
            <td><button onclick="eliminarFilaCom(${ID})" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
        </tr>`
        );
        productosCom.push(ID);
        calibrarProductosCom();
        calibrarComIDs();
    }
}
function mostrarArreglosCom(){
    mostrarArregloCom("detComGlo","comArrGlo");
    mostrarArregloCom("detComCan","comArrCan");
    mostrarArregloCom("detComPreUni","comArrUni");
    mostrarArregloCom("detComPre","comArrImp");
}
function mostrarArregloCom(input,texto){
    var arreglo = "";
    for(var i=0; i<productosCom.length; i++){
        if(i==productosCom.length-1){
            arreglo += document.getElementById(input+productosCom[i]).value;
        }else{
            arreglo += document.getElementById(input+productosCom[i]).value+",";
        }
    }
    document.getElementById(texto).value = arreglo;
}
function eliminarFilaCom(ID){
    opcion = confirm('¿Esta seguro de eliminar el producto seleccionado?');
    if (opcion == true) {
        $(event.target).closest('tr').remove();
        find = productosCom.findIndex(function checkAge(num) {
            return num == ID;
        })
        productosCom.splice(find, 1);
        calibrarProductosCom();
        calibrarComIDs();
    }
}
function calibrarCom(ID){
    var can = document.getElementById('detComCan'+ID).value;
    var preUni = document.getElementById('detComPreUni'+ID).value;
    var cal = can*preUni;
    document.getElementById('detComPre'+ID).value = cal;
    calibrarProductosCom();
}
function calibrarProductosCom(){
    var totalPag = 0;
    var totalPro = 0;
    for(var i=0; i<productosCom.length; i++){
        var num1 = Number(document.getElementById('detComPre'+productosCom[i]).value);
        totalPag += num1;
        var num2 = Number(document.getElementById('detComCan'+productosCom[i]).value);
        totalPro += num2;
    }
    document.getElementById('comTotalPag').value = totalPag;
    document.getElementById('comTotalPro').value = totalPro;
}
function calibrarComIDs(){
    var arreglo = "";
    for(var i=0; i<productosCom.length; i++){
        if(i==productosCom.length-1){
            arreglo += productosCom[i];
        }else{
            arreglo += productosCom[i]+",";
        }
    }
    document.getElementById("comArrPro").value = arreglo;
}
function cargarClientes() {
    $.ajax({
        url: 'ruta/a/tu/api/clientes', // Cambia esto a la ruta correcta
        method: 'GET',
        success: function(data) {
            let tabla = $('#tablaClientes');
            tabla.empty(); // Limpiar tabla antes de llenarla
            data.forEach(cliente => {
                tabla.append(`
                    <tr>
                        <td>${cliente.nombre}</td>
                        <td>${cliente.ci}</td>
                        <td><button class="btn btn-primary seleccionarCliente" data-id="${cliente.id}" data-nombre="${cliente.nombre}">Seleccionar</button></td>
                    </tr>
                `);
            });
        }
    });
}
$('#buscadorCliente').on('keyup', function() {
    let valor = $(this).val().toLowerCase();
    $('#tablaClientes tr').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
    });
});
$(document).on('click', '.seleccionarCliente', function() {
    let idCliente = $(this).data('id');
    let nombreCliente = $(this).data('nombre');

    // Actualizar los campos del formulario
    $('input[name="idCli"]').val(idCliente);
    $('input[type="text"][disabled]').val(nombreCliente); // Cambia el valor del campo de texto

    // Cerrar el modal
    $('#seleccionarClienteModal').modal('hide');
});
$('#seleccionarClienteModal').on('show.bs.modal', function() {
    cargarClientes(); // Llamar a la función para cargar clientes
});