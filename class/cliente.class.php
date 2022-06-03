<?php 
    $query=mysqli_query($con, "delete from tblappointment where ID = $row[ID]");
    if ($query) {
        echo "<script>alert('Cliente ha sido eliminado satisfactoriamente.');</script>";   
    }else{
        $msg="Algo salió mal. Inténtalo de nuevo";
    }
?>