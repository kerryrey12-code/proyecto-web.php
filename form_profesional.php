<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles2.css">
    <title>FORMULARIO DE PROFESIONAL</title>
</head>
<body>
    
<div class="container">
        <center>
            <h1 class="titulo">Formulario de Registro de Profesionales</h1>
        </center>
        <form method="post" action="form_profesional.php">
            <div class="ingresos">
                <label for="id" class="form-label">IdIndividuo </label><br>
                <input type="text" class="textBox" name="id" id="id" >
            </div>
            <div class="ingresos">
                <label for="nombres" class="form-label">Nombres </label><br>
                <input type="text" class="textBox" name="nombres" id="nombres" >
            </div>
            <div class="ingresos">
                <label for="apellidos" class="form-label">Apellidos </label><br>
                <input type="text" class="textBox" name="apellidos" id="apellidos" >
            </div>
            <div class="ingresos">
                <label for="edad" class="form-label">Edad </label><br>
                <input type="text" class="textBox" name="edad" id="edad" >
            </div>
            <div class="ingresos">
                <label>Sexo </label><br>
                <input type="radio" class="radio" name="sexo" id="Masculino" value="Masculino" >
                <label for="Masculino">Masculino</label>
                <input type="radio" class="radio" name="sexo" id="Femenino" value="Femenino" >
                <label for="Femenino">Femenino</label>
            </div>
            <div class="ingresos">
                <label for="prof" class="form-label">Profesion </label><br>
                <input type="text" class="textBox" name="prof" id="prof" >
            </div>
            <div class="ingresos">
                <label for="gAcad" class="form-label">Grado Academico </label><br>
                <input type="text" class="textBox" name="gAcad" id="gAcad" >
            </div>

            <div class="ingresos">
                <label for="sueldo" class="form-label">Sueldo </label><br>
                <input type="number" step="any"  class="textBox" name="sueldo" id="sueldo" >
            </div>

            <div class="ingresos">
                <label for="activo" class="form-label">Estado (A/I) </label><br>
                <input type="text"  class="textBox" name="activo" id="activo"  maxlength="1" pattern="[AI]" required>
            </div>


            <br><br>
            <input type="submit" class="btn" name="guardar" value="Guardar">
            <button type="submit" class="btn" name="listar">Listar registros</button>
            <input type="submit" class="btn" name="buscar" value="Buscar">
            <input type="submit" class="btn" name="modificar" value="Modificar">
            <input type="submit" class="btn" name="eliminar" value="Eliminar">
        </form>
    </div><br>

  <video autoplay muted loop id="Mivideo"> 
        <source src="videos/UzuiVsGyutaro.mp4" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>


<?php
    include 'Individuo.php';
    include 'Profesional.php';
    require_once 'config/insertarDatos.php';



include 'Individuo.php';
include 'Profesional.php';
require_once 'config/insertarDatos.php';

$data = new Data();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $individuo =new Individuo();
    $profesional =new Profesional();

    if (isset($_POST['guardar'])) {
        $profesional = "guardar";
    } elseif (isset($_POST['listar'])) {
        $profesional = "listar";
    } elseif (isset($_POST['buscar'])) {
        $profesional = "buscar";
    } elseif (isset($_POST['modificar'])) {
        $profesional = "modificar";
    } elseif (isset($_POST['eliminar'])) {
        $profesional = "eliminar";
    }

    switch ($profesional) {

        case "guardar":
            $existe = $data->buscarProfesional($_POST['id']);
            if ($existe->rowCount() > 0) {
                echo "<div class='datos'>No se puede guardar. El ID ya existe.</div>";
            } else {

                $profesional->setId($_POST['id']);
                $profesional->setNombres($_POST['nombres']);
                $profesional->setApellidos($_POST['apellidos']);
                $profesional->setEdad($_POST['edad']);
                $profesional->setSexo($_POST['sexo']);
                $profesional->setProfesion($_POST['prof']);
                $profesional->setGradoAcademico($_POST['gAcad']);

                $data->insertProfesional(
                    $profesional->getId(),
                    $profesional->getNombres(),
                    $profesional->getApellidos(),
                    $profesional->getEdad(),
                    $profesional->getSexo(),
                    $profesional->getProfesion(),
                    $profesional->getGradoAcademico()
                );
                echo "<div class='datos'>Profesional guardado correctamente.</div>";
            }
            break;


            case "listar":
            $stmt = $data->listarProfesional();
            echo "<table border='1'>";
            echo "<tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Profesión</th>
                    <th>Grado Académico</th>
                  </tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>";
                echo "<td>".$row['idProfesional']."</td>";
                echo "<td>".$row['nombreProfesional']."</td>";
                echo "<td>".$row['apellidoProfesional']."</td>";
                echo "<td>".$row['edadProfesional']."</td>";
                echo "<td>".$row['sexo']."</td>";
                echo "<td>".$row['profesion']."</td>";
                echo "<td>".$row['gradoAcademico']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            break;


        case "buscar":
            $stmt = $data->buscarProfesional($_POST['id']);
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<script>
                    document.getElementById('id').value='".$row['idProfesional']."';
                    document.getElementById('nombres').value='".$row['nombreProfesional']."';
                    document.getElementById('apellidos').value='".$row['apellidoProfesional']."';
                    document.getElementById('edad').value='".$row['edadProfesional']."';
                    document.getElementById('prof').value='".$row['profesion']."';
                    document.getElementById('gAcad').value='".$row['gradoAcademico']."';
                </script>";

                if ($row['sexo'] == "Masculino") {
                    echo "<script>
                    document.getElementById('Masculino').checked=true;
                    </script>";

                } else {
                    echo "<script>
                    document.getElementById('Femenino').checked=true;
                    </script>";
                }
            } else {
                echo "<div class='datos'>Registro no encontrado.</div>";
            }
            break;

        case "modificar":
            $existe = $data->buscarProfesional($_POST['id']);
            if ($existe->rowCount() == 0) {
                echo "<div class='datos'>No existe el ID para modificar.</div>";
            } else {

                $data->updateProfesional(
                    $_POST['id'],
                    $_POST['nombres'],
                    $_POST['apellidos'],
                    $_POST['edad'],
                    $_POST['sexo'],
                    $_POST['prof'],
                    $_POST['gAcad']
                );

                echo "<div class='datos'>Registro modificado correctamente.</div>";
            }
            break;

        case "eliminar":
            $existe = $data->buscarProfesional($_POST['id']);
            if ($existe->rowCount() == 0) {
                echo "<div class='datos'>No existe el ID para eliminar.</div>";
            } else {
                $data->deleteProfesional($_POST['id']);
                echo "<div class='datos'>Registro eliminado correctamente.</div>";
            }

            break;

        default:
            echo "<div class='datos'>Seleccione una opción válida.</div>";
            break;
    }

}
?>


</body>
</html>