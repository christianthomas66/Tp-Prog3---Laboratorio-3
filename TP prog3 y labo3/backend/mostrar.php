<?php
    require_once("fabrica.php");
    include_once("validarSesion.php");
?>

    <?php
        ValidarSesion("../login.html");
        if(file_exists("../archivos/empleados.txt"))
        {
            $path = "../archivos/empleados.txt";
        }

        $archivo = fopen($path,"r");
        $fabrica = new Fabrica(".", 7);
        $fabrica->TraerDeArchivo($path);
        $arrEmpleados = $fabrica->GetEmpleados();
        $empleados = "";

        if(count($arrEmpleados) == 0)
        {
            echo "<tr>
                    <td style=text-align:left;padding-left:15px colspan=2>
                        No hay empleados que listar.
                    </td>
                  </tr>";
        }
        else
        {
                $empleados = '<table class="table">
                                <thead style="background: #7BB371;color:red;">
                                <h2 style="background: #7BB371;color:red;">Listado de Empleados</h2>
                                <br>
                                    <tr>
                                        <th>Dni</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Sexo</th>
                                        <th>Legajo</th>
                                        <th>Sueldo</th>
                                        <th>Turno</th>
                                        <th>Path Foto</th>
                                        <th>Foto</th>
                                        <th colspan=2>Accion</th>
                                    </tr> 
                                </thead>';
            foreach($fabrica->GetEmpleados() as $item)
            {
                $empleados .= "<tr>
                                <td>{$item->GetDni()}</td>
                                <td>{$item->GetNombre()}</td>
                                <td>{$item->GetApellido()}</td>
                                <td>{$item->GetSexo()}</td>
                                <td>{$item->GetLegajo()}</td>
                                <td>{$item->GetSueldo()}</td>
                                <td>{$item->GetTurno()}</td>
                                <td>{$item->GetPathFoto()}</td>
                                <td><img src='archivos/".$item->GetPathFoto()."' width='120px' height='115px'/></td>
                                <td>
                                    <input type=button value=Modificar class=MiBotonUTN id=btnModificar onclick=Main.ModificarEmpleado({$item->GetDni()})>
                                    <br>
                                    <br>
                                    <input type=button value=Eliminar class=MiBotonUTN id=btnEliminar onclick=Main.EliminarEmpleado({$item->GetLegajo()})
                                </td>
                              </tr>";
            }
                $empleados .= "</table>";

                echo $empleados;
        }

    ?>
