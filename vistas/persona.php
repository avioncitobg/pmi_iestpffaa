<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PERSONA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <div class="row">
            <div class="table-responsive">
                <div class="card">
                    <!-- onclick="showModalRegister()"  -->
                    <button data-toggle="modal" data-target="#modalPersonaCreate"  type="button" class="btn btn-success"><i class="fas fa-plus"> Nuevo</i></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nombre</th>
                            <th scope="col">precio</th>
                            <th scope="col">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>s/12</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm"> <i class="fas fa-edit"> Editar</i></button>
                                    <button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash"> Eliminar</i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm"> <i class="fas fa-edit"> Editar</i></button>
                                    <button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash"> Eliminar</i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm"> <i class="fas fa-edit"> Editar</i></button>
                                    <button type="button" class="btn btn-danger btn-sm"> <i class="fas fa-trash"> Eliminar</i></button>
                                </div>
                            </td>
                        </tr>
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
                    <button type="button" onclick="submit()" class="btn btn-success"> <i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>


</body>
<script>
    function showModalRegister() {
        console.log('boton que abrira un modal')
        $('modalPersonaCreate').show()
    }

    function submit(){
        const nombre = document.getElementById('nombre').value
        const edad = document.getElementById('edad_persona').value

        console.log('nombre: '.nombre);
        console.log('edad: '.edad);
    }
</script>

</html>