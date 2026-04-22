<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PERSONA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <div class="row">
            <div class="table-responsive">
                <div class="card">
                    <!-- onclick="showModalRegister()"  -->
                    <button onclick="nuevoRegistro()" data-toggle="modal" data-target="#modalPersonaCreate" class="btn btn-success"><i class="fas fa-plus"> Nuevo</i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nombre</th>
                            <th scope="col">edad</th>
                            <th scope="col">acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal para persona -->
    <div class="modal" tabindex="-1" id="modalPersonaCreate" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nombre (*)</label>
                                    <input type="text" id="nombre" value="" name="nombre" class="form-control" required>
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Edad (*)</label>
                                    <input type="number" value="" id="edad_persona" name="edad" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btnGuardar" onclick="submit()" class="btn btn-success"> <i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    $(document).ready(function() {
        listarPersonas();
    });

    let idEditar = null;

    //limpiar datos al ser nuevo
    function nuevoRegistro() {
        limpiarFormulario();
    }
    // funcion para listar personas
    function listarPersonas() {
        $.ajax({
            url: '../controlador/PersonaController.php?op=listar',
            type: 'GET',
            success: function(response) {
                const data = JSON.parse(response);
                let html = '';

                data.forEach((item, index) => {
                    html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.nombre}</td>
                        <td>${item.edad}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning btn-sm" onclick="editar(${item.id}, '${item.nombre}', ${item.edad})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="eliminar(${item.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#tableBody').html(html);
            }
        });
    }

    //delega al que corresponda si viene con id ejecuta actualizar, si el id es vacio ejecuta guardar
    function submit() {
        if (idEditar === null) {
            guardar();
        } else {
            actualizar();
        }
    }

    function guardar() {
        const nombre = $('#nombre').val();
        const edad = $('#edad_persona').val();
        if (!nombre || !edad) {
            alert('Completa los campos');
            return;
        }

        $.ajax({
            url: '../controlador/PersonaController.php?op=guardar',
            type: 'POST',
            data: {
                nombre,
                edad
            },
            success: function(res) {
                const r = JSON.parse(res);
                alert(r.message);

                if (r.status) {
                    $('#modalPersonaCreate').modal('hide');
                    listarPersonas();
                    limpiarFormulario();
                }
            }
        });
    }

    function actualizar() {
        const nombre = $('#nombre').val();
        const edad = $('#edad_persona').val();

        if (!nombre || !edad) {
            alert('Completa los campos');
            return;
        }

        $.ajax({
            url: '../controlador/PersonaController.php?op=actualizar',
            type: 'POST',
            data: {
                id: idEditar,
                nombre,
                edad
            },
            success: function(res) {
                const r = JSON.parse(res);
                alert(r.message);

                if (r.status) {
                    $('#modalPersonaCreate').modal('hide');
                    listarPersonas();
                    limpiarFormulario();
                }
            }
        });
    }

    //editar registro de persona
    function editar(id, nombre, edad) {
        idEditar = id;
        $('#nombre').val(nombre);
        $('#edad_persona').val(edad);

        $('#modalPersonaCreate').modal('show');
        $('#btnGuardar').text('Actualizar'); //cambiamos el nombre del boton a actualizar
    }

    //funcion para eliminar segun el id del registro
    function eliminar(id) {
        if (!confirm('¿Eliminar registro?')) return;

        $.ajax({
            url: '../controlador/PersonaController.php?op=eliminar',
            type: 'POST',
            data: {
                id
            },
            success: function() {
                listarPersonas();
            }
        });
    }

    //limpiamos el formulario despues de cada accion create - update
    function limpiarFormulario() {
        $('#nombre').val('');
        $('#edad_persona').val('');
        $('#btnGuardar').text('Guardar');
        idEditar = null;

    }
</script>

</html>