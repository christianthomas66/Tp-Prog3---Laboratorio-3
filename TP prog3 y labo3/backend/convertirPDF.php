<?php
require_once("fabrica.php");
require_once("../vendor/autoload.php");

session_start();

$fabrica = new Fabrica("",7);

$archivoPDF = "../archivos/empleados.txt";

$fabrica->TraerDeArchivo($archivoPDF);


$mpdf = new \Mpdf\Mpdf([ 'orientation' => 'p',
'pagenumprefix' => 'Pagina Nro.',
'nbpgPrefix' => ' de ',
'nbpgSuffix' => 'pagina/s']);

$mpdf->WriteHTML("<h2>Listado de Empleados</h2>");
$mpdf->WriteHTML('<table align=center>
        <thead>
            <tr>
            <th> Dni </th>
            <th> Nombre </th>
            <th> Apellido </th>
            <th> Sexo </th>
            <th> Legajo </th>
            <th> Sueldo </th>
            <th> Turno </th>
            <th> Path Foto </th>
            <th> Foto </th>
            </tr>
        </thead>');

$mpdf->SetProtection(array(), $_SESSION["DNIEmpleado"], "password");

$mpdf->SetHeader("Christian Thomás Suárez Grecco - {PAGENO}{nbpg}");
$mpdf->SetFooter("https://trabajopracticofinal.000webhostapp.com");
foreach($fabrica->GetEmpleados() as $item)
{
    $mpdf->WriteHTML("<tr>
                        <td>{$item->GetDni()}</td>
                        <td>{$item->GetNombre() }</td>
                        <td>{$item->GetApellido() }</td>
                        <td>{$item->GetSexo() }</td>
                        <td>{$item->GetLegajo() }</td>
                        <td>{$item->GetSueldo() }</td>
                        <td>{$item->GetTurno() }</td>
                        <td>{$item->GetPathFoto() }</td>
                        <td><img src={$item->GetPathFoto()} width=90px height=90px;/></td>
                       </tr>");
}
$mpdf->WriteHTML("</table>");
$mpdf->Output("listadoEmpleados.pdf", "I");

?>

