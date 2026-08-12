<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles2.css">

    <title>REGISTRO DE INDIVIDUOS</title>

</head>
<body>
   <div class="container">
        <center>
            <h1 class="titulo">Formulario de Registro de Individuos</h1>
        </center>
        <form method="post" action="form_individuo.php">
            <div class="form-labelExterno">
                <label for="id" class="form-label">Id </label><br>
                <input type="text" class="textBox" name="id" id="id" >
            </div>
            <div class="ingresos">
                <label for="nombres" class="form-label"> Nombres </label><br>
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
            <input type="submit" class="btn form-labelExterno" value="Guardar" name="guardar">
            <button type="submit" class="btn" name="listar"><span>📨</span> Listar </button>
            <input type="submit" class="btn" name="buscar" value="Buscar">
            <input type="submit" class="btn" name="modificar" value="Modificar">
            <input type="submit" class="btn" name="eliminar" value="Eliminar">
        </form>
    </div><br>
  
    <?php
      include 'individuo.php';
      require_once 'config/insertarDatos.php';
         if($_SERVER['REQUEST_METHOD'] =='POST' ) //verifica que el acceso del submit hacia el archivo php sea de tipo post
        { 
        $individuo =new Individuo();
        switch($accion)
{
    case "guardar":

        if (!empty($_POST['id']) &&
            !empty($_POST['nombres']) &&
            !empty($_POST['apellidos']) &&
            !empty($_POST['edad']) &&
            !empty($_POST['sexo']))
        {
            $individuo->setId($_POST['id']);
            $individuo->setNombres($_POST['nombres']);
            $individuo->setApellidos($_POST['apellidos']);
            $individuo->setEdad($_POST['edad']);
            $individuo->setSexo($_POST['sexo']);

            $existe = $data->buscarIndividuo($_POST['id']);

            if ($existe->rowCount() > 0)
            {
                echo "<div class='datos'>No se puede crear: el ID ya existe</div>";
            }
            else
            {
                $data->insertIndividuo(
                    $individuo->getId(),
                    $individuo->getNombres(),
                    $individuo->getApellidos(),
                    $individuo->getEdad(),
                    $individuo->getSexo()
                );

                echo "<div class='datos'>Registro insertado con éxito</div>";
            }
        }

        break;

    case "listar":

        $stmt = $data->listarIndividuo();

        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Sexo</th>
              </tr>";

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>".$row['idIndividuo']."</td>";
            echo "<td>".$row['nombreIndividuo']."</td>";
            echo "<td>".$row['apellidoIndividuo']."</td>";
            echo "<td>".$row['edadIndividuo']."</td>";
            echo "<td>".$row['sexoIndividuo']."</td>";
            echo "</tr>";
        }

        echo "</table>";

        break;

    case "buscar":

        $stmt = $data->buscarIndividuo($_POST['id']);

        if($stmt->rowCount() > 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            echo "<script>
                document.getElementById('id').value='".$row['idIndividuo']."';
                document.getElementById('nombres').value='".$row['nombreIndividuo']."';
                document.getElementById('apellidos').value='".$row['apellidoIndividuo']."';
                document.getElementById('edad').value='".$row['edadIndividuo']."';
            </script>";

            if($row['sexoIndividuo']=="Masculino")
            {
                echo "<script>document.getElementById('Masculino').checked=true;</script>";
            }
            else
            {
                echo "<script>document.getElementById('Femenino').checked=true;</script>";
            }
        }

        break;

    case "modificar":

        $existe = $data->buscarIndividuo($_POST['id']);

        if($existe->rowCount()==0)
        {
            echo "<div class='datos'>No existe el ID</div>";
        }
        else
        {
            $data->updateIndividuo(
                $_POST['id'],
                $_POST['nombres'],
                $_POST['apellidos'],
                $_POST['edad'],
                $_POST['sexo']
            );

            echo "<div class='datos'>Registro modificado con éxito</div>";
        }

        break;

    case "eliminar":

        $existe = $data->buscarIndividuo($_POST['id']);

        if($existe->rowCount()==0)
        {
            echo "<div class='datos'>No existe el ID</div>";
        }
        else
        {
            $data->deleteIndividuo($_POST['id']);

            echo "<div class='datos'>Registro eliminado con éxito</div>";
        }

        break;
}

}
?>
</body>
</html>
