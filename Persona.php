<?php
include_once ('conexionBase.php');
class Persona {
    private $Nombres;
    private $PrimerApellido;
    private $SegundoApellido;
    private $FechaNac;
    private $conexion;

function __construct(){
        $this->Nombres          ="";
        $this->PrimerApellido   ="";
        $this->SegundoApellido  ="";
        $this->FechaNac         ="";
        $this->conexion         = new conexionBase();
    }

public function RegistrarPersona(){
    $aux =$this->VerificarExistente();
    if($aux==1){
        echo json_encode(array('Success'=>0,'Error'=>1,'Mensaje'=>'La persona ya se encuentra registrada'));
    }else{
        $sql="insert into persona (Nombres,PrimerApellido,SegundoApellido,FechaNac) values ('$this->Nombre','$this->PrimerApellido','$this->SegundoApellido','$this->FechaNac')";
        $this->con->CreateConnection();
        $this->con->ExecuteQuery($sql);
        $this->con->CloseConnection();
        echo $sql;
        echo json_encode(array('Success'=>1,'Error'=>0,'Mensaje'=>'La persona ya se ha registrado correctamente!!!'));
    }
   }
   private function verificarExistente(){
    $sql="select * from persona where Nombres='$this->Nombres' and PrimerApellido='$this->PrimerApellido' and SegundoApellido='$this->SegundoApellido'";
    $this->conexion->CreateConnection();
    $result=$this->conexion->ExecuteQuery($sql);
    $rowCount=$this->conexion->GetCountAffectedRows();
    if($rowCount > 0){
        $this->conexion->CloseConnection();
        return 1;
    }else{
        return 0;
    }
}
    public function Listar(){
        $sql = "select * from persona";
        $persona->CreateConnection();
        $result=$persona->ExecuteQuery($sql);
        if($result){
                echo json_encode($result);
        }
    }

    $prueba = new Persona();
    $prueba->Listar();
}
?>