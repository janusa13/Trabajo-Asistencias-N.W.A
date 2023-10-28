<?php
include("../Conexion/conexion.php");
require_once("../Alumno/Alumno.php");

if (isset($_POST["btnRegistrar"])) {
    $viejo_DNI = $_POST["viejo_DNI"];
    $alumn_DNI = $_POST["alumn_DNI"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha_nac = $_POST["fecha_nac"];

try {
    $BD = Conexion::connect();
    $viejo_DNI = $_POST["viejo_DNI"];
    $alumn_DNI = $_POST["alumn_DNI"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fecha_nac = $_POST["fecha_nac"];

    // Realiza la actualización en ambas tablas usando un INNER JOIN
    $edit_query = "UPDATE Alumno AS A
                  INNER JOIN Asistencia AS ASI ON A.alumn_DNI = ASI.alumno_FK
                  SET A.alumn_DNI = ?, A.nombre = ?, A.apellido = ?, A.fecha_nac = ?,
                      ASI.alumno_FK = ?
                  WHERE A.alumn_DNI = ?";
    
    $edit_stmt = $BD->prepare($edit_query);
    $edit_stmt->bind_param("ssssii", $alumn_DNI, $nombre, $apellido, $fecha_nac, $alumn_DNI, $viejo_DNI);
    $edit_stmt->execute();
    
    $edit_stmt->close();

    header("location: insertAlumno.php");
} catch (mysqli_sql_exception $e) {
    echo "Error al actualizar los datos: " . $e->getMessage();
}
}

$alumn_DNI = $_GET["alumn_DNI"];
try {
<<<<<<< HEAD
  $BD = Conexion::connect();
  $query = "SELECT * FROM alumno WHERE alumn_DNI=?";
  $stmt = $BD->prepare($query);
  $stmt->bind_param('i', $alumn_DNI);
  $stmt->execute();
  $result = $stmt->get_result();
  $alumnos = $result->fetch_all(MYSQLI_ASSOC);
=======
    $BD = Conexion::connect();
    $query = 'SELECT alumn_DNI, nombre, apellido, asistencias, DATE_FORMAT(fecha_nac, "%Y-%m-%d") AS fecha_nac FROM alumno WHERE alumn_DNI = ?';
    $stmt = $BD->prepare($query);
    $stmt->bind_param('i', $alumn_DNI);
    $stmt->execute();
    $result = $stmt->get_result();
    $alumnos = $result->fetch_all(MYSQLI_ASSOC);
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
} catch (mysqli_sql_exception $e) {
  die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" />
  <title>Document</title>
=======
  <title>Editar Alumno</title>
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css" />
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
</head>

<body>
  <h3 class=" text-center p-3"><a href="insertAlumno.php">N.W.A</a></h3>
  <form method="POST" class="col-4 p-3 m-auto">
    <h3 class="text-center text-secondary">Editar Alumno</h3>
<<<<<<< HEAD
    <input type="hidden" name="viejo_DNI" value="<?php echo $_GET['alumn_DNI']; ?>" />
=======
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
    <?php
    foreach ($alumnos as $alumno_data) {
      $alumno = new Alumno($alumno_data['alumn_DNI'], $alumno_data['nombre'], $alumno_data['apellido'], $alumno_data['fecha_nac'], $alumno_data['asistencias']);
    ?>
<<<<<<< HEAD
      <div class="mb-3">
        <label for="alumn_dni" class="form-label">DNI</label>
        <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno" value="<?php echo $alumno->alumn_DNI; ?>">
        <div class="mb-3">
          <label for="nombre_alumno" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre_alumno" name="nombre" value="<?php echo $alumno->nombre; ?>">
        </div>
        <div class="mb-3">
          <label for="apellido_alumno" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido_alumno" name="apellido" value="<?php echo $alumno->apellido; ?>">
        </div>
=======
      <input type="hidden" name="viejo_DNI" value="<?php echo $alumno->alumn_DNI; ?>" />
      <div class="mb-3">
        <label for="alumn_dni" class="form-label">DNI</label>
        <input type="text" class="form-control" name="alumn_DNI" id="alumn_dni" aria-describedby="dni_alumno" value="<?php echo $alumno->alumn_DNI; ?>">
      </div>
      <div class="mb-3">
        <label for="nombre_alumno" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_alumno" name="nombre" value="<?php echo $alumno->nombre; ?>">
      </div>
      <div class="mb-3">
        <label for="apellido_alumno" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido_alumno" name="apellido" value="<?php echo $alumno->apellido; ?>">
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
      </div>
      <div class="mb-3">
        <label for="fecha_alumn" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $alumno->fecha_nac; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Editar Alumno</button>
<<<<<<< HEAD
      <?php
      if (!empty($_POST["btnRegistrar"])) {
        if (!empty($_POST["alumn_DNI"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["fecha_nac"])) {
          $viejo_DNI = $_POST["viejo_DNI"];
          $alumn_DNI = $_POST["alumn_DNI"];
          $nombre = $_POST["nombre"];
          $apellido = $_POST["apellido"];
          $fecha_nac = $_POST["fecha_nac"];
          try {
            $BD = Conexion::connect();
            $edit_query = "UPDATE alumno SET alumn_DNI = ?, nombre = ?, apellido = ?, fecha_nac = ? WHERE alumn_DNI = ?";
            $edit_stmt = $BD->prepare($edit_query);
            $edit_stmt->bind_param("ssssi", $alumn_DNI, $nombre, $apellido, $fecha_nac, $viejo_DNI);
            $edit_stmt->execute();
            if ($edit_stmt->execute()) {
              header("location:insertAlumno.php");
            }
          } catch (mysqli_sql_exception $e) {
            echo "<div class='alert alert-warning'>Datos del DNI invalidos</div>";
          }
        } else {
          echo "<div class='alert alert-warning'>Campos vacios</div>";
        }
      }
      ?>
    <?php }
    ?>
  </form>
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
=======
    <?php } ?>
  </form>
  <script src="../Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
>>>>>>> 0378d5d58660e5f5128670c2eacb002d74331ae4
