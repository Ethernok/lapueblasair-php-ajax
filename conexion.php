<?php
class db
{
    private $serv = "localhost";
    private $base = "examen";
    private $user = "root";
    private $pass = "";
    private $session = null;
    public $connect = null;

    public function __construct()
    {

        try {
            $this->connect = new PDO(
                'mysql:host=' . $this->serv . ';
                dbname=' . $this->base,
                $this->user,
                $this->pass
            );
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect->query("SET NAMES 'utf8'");
        } catch (Exception $ex) {
            echo "Error de conexion" . $ex->getMessage();
        }
    }

    public function close()
    {
        $this->connect = null;
        $this->session = null;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function getListaVuelos()
    {
        $query = $this->connect->query("SELECT * FROM vuelos ORDER BY id_vuelo;");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function procesarLogin($user, $pass)
    {

        $sql = $this->connect->prepare('SELECT * FROM usuarios WHERE usuario = ? AND clave = ?;');
        $sql->execute([$user, $pass]);
        $result = $sql->fetch(PDO::FETCH_OBJ);
        $this->session = $result->nombre;
        if (!$result) {
            header('Location: login.php');
        } elseif ($sql->rowCount() >= 1) {
            $_SESSION['nombre'] = $this->session;
            header('Location: index.php');
        }
    }

    public function nuevoVuelo($id, $vuelo, $origen, $destino, $horario, $compania)
    {
        try {
            $query = $this->connect->prepare("SELECT id_vuelo FROM vuelos WHERE id_vuelo = ?");
            $query->execute([$id]);
            $vueloResultado = $query->fetchAll(PDO::FETCH_OBJ);
            if (array_count_values($vueloResultado) >= 1) {
                echo "<script language=JavaScript>alert('El ID introducido ya está en uso');</script>";
                header('Location: index.php');
            }
            $query = $this->connect->prepare("INSERT INTO vuelos(id_vuelo, vuelo, origen, destino, horario, compañia) VALUES(?,?,?,?,?,?);");
            $query->execute([$id, $vuelo, $origen, $destino, $horario, $compania]);

            header('Location: index.php');
        } catch (Exception $e) {
            header('Location: index.php');
            throw new Exception("Error, comprueba de nuevo los datos", 1);
        }
    }

    public function editarVuelo($id, $vuelo, $origen, $destino, $horario, $compania)
    {
        try {
            $query = $this->connect->prepare("UPDATE vuelos SET id_vuelo = ?, vuelo = ?, origen = ?, destino = ?, horario = ?, compañia = ? WHERE id_vuelo = ? ;");
            $query->execute([$id, $vuelo, $origen, $destino, $horario, $compania, $id]);
            header('Location: index.php');
        } catch (Exception $e) {
            header('Location: index.php');
            throw new Exception("Error, comprueba de nuevo los datos", 1);
        }
    }

    public function eliminarVuelo($id)
    {
        $query = $this->connect->prepare("DELETE FROM vuelos WHERE id_vuelo = ?;");
        $query->execute([$id]);
        header('Location: index.php');
    }
    /** Funcion que muestra la tabla de los vuelos */
    public function mostrarTabla()
    {
        echo `<thead>
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
            <tbody id="form-list-client-body">
              `;

        $vuelos = $this->getListaVuelos();
        foreach ($vuelos as $vuelo) {

            echo `<tr>
                  <td>$vuelo->id_vuelo</td>
                  <td>$vuelo->vuelo</td>
                  <td>$vuelo->origen</td>
                  <td>$vuelo->destino</td>
                  <td>$vuelo->horario</td>
                  <td>$vuelo->compañia</td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="editModal" class="btn btn-default btn-sm editbtn "><i class="glyphicon glyphicon-edit text-primary"></i></button>
                    <button type="button" title="Eliminar" class="btn btn-default btn-sm btn-edit deletebtn" data-toggle="modal" data-target="#eliminarModal">
                    <i class="glyphicon glyphicon-trash text-danger"></i>
                    </button>
                  </td>
                </tr>
            </tbody>
        `;
        }
    }
}
