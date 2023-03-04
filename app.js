listar();
const modal_form = new bootstrap.Modal('#modal_form');

function listar() {

    fetch('controllers/usuarios/ListarUsuariosController.php')
    .then(res => res.json())
    .then(data => {

        // Validar si no hay registros
        if(data.length == 0) {
            document.getElementById('table_data').innerHTML = `<tr><td colspan="8" class="text-center">¡No hay usuarios para listar!</td></tr>`;
            return;
        }

        let str = '';
        data.map(item => {
            str += `<tr>
                        <td>${item.nombre} ${item.apellido}</td>
                        <td>${item.email}</td>
                        <td>${item.edad} años</td>
                        <td>${item.genero}</td>
                        <td>${item.celular}</td>
                        <td>${item.cargo}</td>
                        <td>${ (item.habilitado == 1) ? '<span class="badge rounded-pill bg-success">Activo</span>' : '<span class="badge rounded-pill bg-danger">Inactivo</span>' }</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-primary" onclick="mostrar_usuario(${item.id})">Editar</button>
                            <button class="btn btn-sm btn-danger" onclick="eliminar_usuario(${item.id})">Eliminar</button>
                        </td>
                    </tr>`
        });

        document.getElementById('table_data').innerHTML = str;

    });

}

function mostrar_usuario(id) {

    fetch(`controllers/usuarios/MostrarUsuarioController.php?id=${id}`)
    .then(res => res.json())
    .then(data => {

        document.getElementById('id').value = id;
        document.getElementById('txt_nombre').value = data.nombre;
        document.getElementById('txt_apellido').value = data.apellido;
        document.getElementById('txt_email').value = data.email;
        document.getElementById('txt_edad').value = data.edad;
        document.getElementById('sel_genero').value = data.genero;
        document.getElementById('txt_celular').value = data.celular;
        document.getElementById('sel_cargo').value = data.cargo;
        document.getElementById('check_habilitado').checked = (data.habilitado == 1);
    
    })
    .then(() => {
        modal_form.show();
    });

}

function guardar_usuario() {

    let formData = new FormData();
    formData.append('id', document.getElementById('id').value);
    formData.append('nombre', document.getElementById('txt_nombre').value);
    formData.append('apellido', document.getElementById('txt_apellido').value);
    formData.append('email', document.getElementById('txt_email').value);
    formData.append('edad', document.getElementById('txt_edad').value);
    formData.append('genero', document.getElementById('sel_genero').value);
    formData.append('celular', document.getElementById('txt_celular').value);
    formData.append('cargo', document.getElementById('sel_cargo').value);
    formData.append('habilitado', (document.getElementById('check_habilitado').checked) ? 1 : 0);

    fetch(`controllers/usuarios/GuardarUsuarioController.php`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        alert(data);
        modal_form.hide();
    }).then(() => {
        listar();
    });

}

function eliminar_usuario(id) {

    if(confirm("¿Quiere eliminar este usuario?")) {

        fetch(`controllers/usuarios/EliminarUsuarioController.php?id=${id}`)
        .then(res => res.text())
        .then(data => {
            alert(data);
        })
        .then(() => {
            listar();
        });

    }

}

function limpiar() {

    document.getElementById('id').value = '';
    document.getElementById('txt_nombre').value = '';
    document.getElementById('txt_apellido').value = '';
    document.getElementById('txt_email').value = '';
    document.getElementById('txt_edad').value = '';
    document.getElementById('sel_genero').value = '';
    document.getElementById('txt_celular').value = '';
    document.getElementById('sel_cargo').value = '';
    document.getElementById('check_habilitado').checked = true;

}