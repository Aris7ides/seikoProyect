let div = document.getElementById("usuariosList");
let info = [];

fetch('./php/readUsuario.php')
    .then(response => response.json())
    .then((data) => {
        //Parsea la respuesta a JSON
        info = JSON.parse(JSON.stringify(data));
        //Llama a la función y crea una tabla con los Usuarios
        leerUsuarios();
    })
    .catch(error => {
        console.log(error);
    });

function leerUsuarios() {
    let cad = `<ol>`;
    info.forEach(usuario => {
        cad += `<li><ul>
                <li>ID: ${usuario.id} </li>
                <li>NOMBRE: ${usuario.user}</li>
                <li>EMAIL: ${usuario.email}</li>
                <li>PASSWD: ${usuario.psswd}</li>
                <button type="button" onclick="eliminarUsuario(${usuario.id})">Borrar</button>
                <button type="button" onclick="actualizarUsuario(${usuario.id}, '${usuario.user}', '${usuario.email}')">Editar</button>
                <br><br>
                </ul></li>`;
    });
    cad += `</ol>`;
    div.innerHTML = cad;
}

//Elimina un usuario con respecto al id de este
function eliminarUsuario(sendId) {
    if(window.confirm("seguro que quieres borrar este usuario?")){
        $.ajax({
            type: "POST", //POST para enviar los datos al php
            url: "./php/deleteUsuario.php",
            data: { idToDelete: sendId }, // Enviar la variable como parte de los datos
            success: window.location = "./usuarioList.html"
        });
    }else{
        return;
    }
}

//Actualizar Usuario con respecto a su id
function actualizarUsuario(idS, user, email){
    window.updateModal.showModal();
    let llenarDatos=document.getElementById("updateDatos");

    let cad=`<input type="text" name="idS" id="idS" value="${idS}" readonly style="width:15%;">
    <br>
    <label for="user">Usuario:</label>
    <input type="text" name="user" id="user" value="${user}" autofocus>
    <br>
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="${email}">
    <br>
    <label for="psswd">Contraseña:</label>
    <input type="number" name="psswd" id="psswd">
    <br>`;

    llenarDatos.innerHTML=cad;

    //puedo añadir que le pida la contraseña actual y si es correcta que se actualice
}