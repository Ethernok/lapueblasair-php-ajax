<?php
include 'conexion.php';
$db = new db();
/*session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
}*/
$vuelos = $db->getListaVuelos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



  <!--########################### Modal Añadir #############################-->

  <div class="modal" id="newModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Añadir Vuelo</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="procesarNuevoVuelo.php" method="POST">

          <div class="modal-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" name="idVuelo" class="form-control" placeholder="Introduce el ID" required>
            </div>
            <div class="form-group">
              <label>Vuelo</label>
              <input type="text" name="vuelo" class="form-control" placeholder="Introduce el Vuelo" required>
            </div>
            <div class="form-group">
              <label>Origen</label>
              <input type="text" name="origenVuelo" class="form-control" placeholder="Introduce el origen del vuelo." required>
            </div>
            <div class="form-group">
              <label>Destino</label>
              <input type="text" name="destinoVuelo" class="form-control" placeholder="Introduce el destino del vuelo" required>
            </div>
            <div class="form-group">
              <label>Horario</label>
              <input type="text" name="horarioVuelo" class="form-control" placeholder="Introduce el Horario" required>
            </div>
            <div class="form-group">
              <label>Compañia</label>
              <input type="text" name="companiaVuelo" class="form-control" placeholder="Introduce la compañia de vuelo" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="guardar" class="btn btn-primary">Añadir Vuelo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--########################### Modal Añadir #############################-->


  <!--########################### Modal Editar #############################-->

  <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Editar Vuelo</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-edit">

          <div class="modal-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" name="editId" id="editId" class="form-control" placeholder="Introduce el ID" readonly>
            </div>
            <div class="form-group">
              <label>Vuelo</label>
              <input type="text" name="editVuelo" id="editVuelo" class="form-control" placeholder="Introduce el Vuelo" required>
            </div>
            <div class="form-group">
              <label>Origen</label>
              <input type="text" name="editOrigenVuelo" id="editOrigenVuelo" class="form-control" placeholder="Introduce el origen del vuelo." required>
            </div>
            <div class="form-group">
              <label>Destino</label>
              <input type="text" name="editDestinoVuelo" id="editDestinoVuelo" class="form-control" placeholder="Introduce el destino del vuelo" required>
            </div>
            <div class="form-group">
              <label>Horario</label>
              <input type="text" name="editHorarioVuelo" id="editHorarioVuelo" class="form-control" placeholder="Introduce el Horario" required>
            </div>
            <div class="form-group">
              <label>Compañia</label>
              <input type="text" name="editCompaniaVuelo" id="editCompaniaVuelo" class="form-control" placeholder="Introduce la compañia de vuelo" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" name="updatedata" class="btn btn-primary" id="update-data">Aceptar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--########################### Modal editar #############################-->

  <!--############## Modal Eliminar ################# -->
  <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="eliminar.php" method="POST">
          <input type="hidden" name="deleteId" id="deleteId">
          <div class="modal-body">
            <p> ¿Estás seguro? </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="deletedata" class="btn btn-danger">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--############## Modal Eliminar ################# -->
  <div class="container">
    <div class="row">

      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

      <!-- FORM  -->
      <div class="col-md-12">

        <form class="form-horizontal" id="form-edit-client">
          <fieldset>

            <!-- Form Name -->
            <legend><a href="logout.php">Cerrar sesion</a>
              <h1>Bienvenido/a.</h1>

            </legend>

          </fieldset>
        </form>


      </div>

      <!-- LIST -->
      <div class=col-md-12>

        <form id="form-list-client">
          <legend>Lista de Vuelos</legend>


          <table class="table table-bordered table-condensed table-hover" id="tabla-vuelos">
            <thead>
              <tr>
                <th>ID</th>
                <th>Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Horario</th>
                <th>Compañia</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody id="form-list-client-body" id="cuerpo-tabla">
              <?php
              foreach ($vuelos as $vuelo) {
              ?>
                <tr class="id-vuelos" id='<?php echo $vuelo->id_vuelo; ?>'>
                  <td id='id-<?php echo $vuelo->id_vuelo; ?>'><?php echo $vuelo->id_vuelo; ?></td>
                  <td id='vuelo-<?php echo $vuelo->id_vuelo; ?>'><?php echo $vuelo->vuelo; ?></td>
                  <td id='origen-<?php echo $vuelo->id_vuelo; ?>'><?php echo $vuelo->origen; ?></td>
                  <td id='destino-<?php echo $vuelo->id_vuelo; ?>'><?php echo $vuelo->destino; ?></td>
                  <td id='horario-<?php echo $vuelo->id_vuelo; ?>'><?php echo $vuelo->horario; ?></td>
                  <td id='compania-<?php echo $vuelo->id_vuelo; ?>'><?php echo $vuelo->compañia; ?></td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="editModal" class="btn btn-default btn-sm editbtn "><i class="glyphicon glyphicon-edit text-primary"></i></button>
                    <button type="button" title="Eliminar" class="btn btn-default btn-sm btn-edit deletebtn" data-toggle="modal" data-target="#eliminarModal">
                      <i class="glyphicon glyphicon-trash text-danger"></i>
                    </button>
                  </td>
                <?php
              }
                ?>

                </tr>
            </tbody>
          </table>
          <div class="pull-right">
            <button type="button" data-toggle="modal" data-target="#newModal" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Nuevo </button>

          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="javascript" src="./ajax.js"></script>

  <!--Script para modal de editar -->
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {
        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        console.log(data);

        $('#editId').val(data[0]);
        $('#editVuelo').val(data[1]);
        $('#editOrigenVuelo').val(data[2]);
        $('#editDestinoVuelo').val(data[3]);
        $('#editHorarioVuelo').val(data[4]);
        $('#editCompaniaVuelo').val(data[5]);


      });
      //metodo que tiene de trigger el click en el boton "Aceptar cambios" del modal.
      $('#update-data').on('click', function() {

        datos = {
          editId: $('#editId').val(),
          editVuelo: $('#editVuelo').val(),
          editOrigenVuelo: $('#editOrigenVuelo').val(),
          editDestinoVuelo: $('#editDestinoVuelo').val(),
          editHorarioVuelo: $('#editHorarioVuelo').val(),
          editCompaniaVuelo: $('#editCompaniaVuelo').val()
        }
        // metodo ajax donde proceso los datos editados
        $.ajax({
          data: datos,
          url: 'procesarEditar.php',
          type: 'POST',
          beforeSend: function() {},
          success: (response) => {
            id = datos.editId;
            countVuelos = $('.id-vuelos').length;
            for (i = 1; i < countVuelos; i++) {
              console.log(id);
              if (i == id) { //Si coincide la id con el count del for, se reemplaza
                // Uso el metodo replaceWith() varias veces porque con una vez todo junto tenía que poner los botones también y al hacer eso los eventos que tenía (abrir modal) desaparecía y no se podía editar de nuevo una vez guardados los cambios
                $(`#id-${i}`).replaceWith(`
                  <td id="id-${id}">${datos.editId}</td>`);
                $(`#vuelo-${i}`).replaceWith(`<td id="vuelo-${i}">${datos.editVuelo}</td>`);
                $(`#origen-${i}`).replaceWith(`<td id="origen-${i}">${datos.editOrigenVuelo}</td>`);
                $(`#destino-${i}`).replaceWith(`<td id="destino-${i}">${datos.editDestinoVuelo}</td>`)
                $(`#horario-${i}`).replaceWith(`<td id="horario-${i}">${datos.editHorarioVuelo}</td>`)
                $(`#compania-${i}`).replaceWith(`<td id="compania-${i}">${datos.editCompaniaVuelo}</td>`)
              }
              console.log("Reemplazado correctamente");
            }
            console.log("Se editó correctamente");
          }
        })
        $('#editModal').modal('hide');
      });
    });
  </script>
  <!--Script para modal de eliminar -->
  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {
        $('#deleteModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();
        console.log(data);

        $('#deleteId').val(data[0]);


      });
    });
  </script>

</body>

</html>