<?php
    obj_clean();
    ob_start();
    include('cita.reporte.php');
    $contenido = ob_get_clean();
    $Epic->pdf('P', 'A4', $contenido, 'cita.pdf');
?>