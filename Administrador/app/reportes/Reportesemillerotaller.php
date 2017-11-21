<?php 

	require_once('../lib/pdf/mpdf.php');
  require_once('../lib/db.conn.php');
  require_once('../lib/libAgregartaller.php');

  $idtaller   =   activicomuni::TalleresAll(base64_decode($_REQUEST["ui"]));
	
	$html = '<header class="clearfix">
      <div id="logo">
        <img src="img_pdf/fundacion_logo.png">
      </div>
      <h1>Reporte Taller</h1>
      <div id="company" class="clearfix">
        <div>Fundacion Conconcreto</div>
        <div>Calle 56 N° 46-16 Medellín - Colombia<br/></div>
        <div>Telefono 2512626</div>
        <div>contacto@fundacionconconcreto.org</div>
      </div>';

        foreach ($idtaller as $row){
          $html.='<div id="project">
        <div><span>Semillero: </span>'.$row['nombreSemillero'].'</div>
        <div><span>Nombre de Taller: </span>'.$row['nombreTaller'].'</div>
        <div><span>Fecha de Inicio: </span>'.$row['fechaTaller'].'</div>
        <div><span>Valor: </span>'.$row['valorNuclear'].'</div>
        <div><span>Duracion: </span>'.$row['tiempo'].'</div>
        <div><span>Estado: </span>'.$row['estadoTaller'].'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Actividad Inicial</th>
            <th class="desc">Actividad Central</th>
            <th class="desc">Actividad Final</th>
            <th class="desc">Objetivo</th>
            <th class="desc">Logros</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">'.$row['actividadInicial'].'</td>
            <td class="desc">'.$row['actividadCentral'].'</td>
            <td class="desc">'.$row['actividadfinal'].'</td>
            <td class="desc">'.$row['objetivo'].'</td>
            <td class="desc">'.$row['logros'].'</td>
          </tr>
        </tbody>
      </table>
    </main>';
  }
	$mpdf = new mPDF('c', '');
	$css  = file_get_contents('css_pdf/style.css');
	$mpdf->writeHTML($css, 1);
	$mpdf->writeHTML($html);
	$mpdf->Output('reporte.pdf', 'I');

?>