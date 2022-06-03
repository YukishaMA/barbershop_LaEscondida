<?php
require_once('barberia.class.php');
  
class Servicios extends Barberia{
    public function read(){
        $todo = $this->db->prepare("SELECT * from tblservices");
        $todo->execute();
        $servicios = $todo->fetchAll(PDO::FETCH_ASSOC);
        return $servicios;
    }
    
    public function readOne($id){
        $linea = $this->db->prepare("SELECT * from tblservices where ID=:ID");
        $linea->bindParam(':ID', $id, PDO::PARAM_INT);
        $linea->execute();
        $servicios = $linea->fetchAll(PDO::FETCH_ASSOC);
        return $servicios;
    }
    
    public function delete($id){
        $borrar = $this->db->prepare("delete from tblservices where ID=:ID");
        $borrar->bindParam(':ID', $id, PDO::PARAM_INT);
        $borrar->execute();
        $cuenta = $borrar->rowCount();
        return $cuenta;
    }

    public function create($data){
        $cuenta = null;
            $sql="insert into tblservices (ServiceName, Cost) values (:ServiceName, :Cost)";
            $insertar=$this->db->prepare($sql);
            $insertar->bindParam(':ServiceName', $data['ServiceName'], PDO::PARAM_STR);
            $insertar->bindParam(':Cost', $data['Cost'], PDO::PARAM_INT);
            $insertar->execute();
            $cuenta = $insertar->rowCount();
        return $cuenta;
    }
    
    public function update($id,$data){
        $sql = "update tblservices set ServiceName=:ServiceName, Cost=:Cost where ID=:ID";
        $actualizar = $this->db->prepare($sql);
        $actualizar->bindParam(':ServiceName', $data['ServiceName'], PDO::PARAM_STR);
        $actualizar->bindParam(':Cost', $data['Cost'], PDO::PARAM_INT);
        $actualizar->bindParam(':ID', $id, PDO::PARAM_INT);
        $actualizar->execute(); 
        $cuenta = $actualizar->rowCount();
        return $cuenta;
    }

}

$Servicios = new Servicios;
$Servicios->conexion();
?>