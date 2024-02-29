let div = document.getElementById("productosList");
let info = [];

fetch('./php/readProducto.php')
    .then(response => response.json())
    .then((data) => {
        //Parsea la respuesta a JSON
        info = JSON.parse(JSON.stringify(data));
        //Llama a la función y crea una tabla con los productos
        leerProductos();
    })
    .catch(error => {
        console.log(error);
    });

function leerProductos() {
    let cad = `<ol>`;
    info.forEach(producto => {
        cad += `<li><ul>
                <li>ID: ${producto.idP}</li>
                <li>NOMBRE: ${producto.nombreP}</li>
                <li>DESCRIPCION: ${producto.descripcionP}</li>
                <li>PRECIO: ${producto.precioP}</li>
                <button type="button" onclick="eliminarProducto(${producto.idP})">Borrar</button>
                <button type="button" onclick="actualizarProducto(${producto.idP}, '${producto.nombreP}', '${producto.descripcionP}', ${producto.precioP})">Actualizar</button>
                <br><br>
                </ul></li>`;
    });
    cad += `</ol>`;
    div.innerHTML = cad;
}

//Elimina un Producto con respecto al id de este
function eliminarProducto(sendId) {
    if(window.confirm("seguro que quieres borrar este producto?")){
        $.ajax({
            type: "POST", //POST para enviar los datos al php
            url: "./php/deleteProducto.php",
            data: { idToDelete: sendId }, // Enviar la variable como parte de los datos
            success: window.location = "./productoList.html"
        });
    }else{
        return;
    }
}

//Actualizar Producto con respecto a su id
function actualizarProducto(idP, nomP, descP, precioP){
    window.updateModal.showModal();
    let llenarDatos=document.getElementById("updateDatos");

    let cad=`<input type="text" name="idP" id="idP" value="${idP}" readonly style="width:15%;">
    <br>
    <label for="nomP">Nombre del Producto:</label>
    <input type="text" name="nomP" id="nomP" value="${nomP}" autofocus>
    <br>
    <label for="descP">Descripcion:</label>
    <input type="text" name="descP" id="descP" value="${descP}">
    <br>
    <label for="precioP">Precio:</label>
    <input type="number" name="precioP" id="precioP" value="${precioP}">
    <br>`;

    llenarDatos.innerHTML=cad;
}