<?php

 class usuarios{
	public $id;
	function get_id(){
		return $this->id;
	}
	function set_id($id){
		$this->id = $id;
	}
	public $usuario;
	function get_usuario(){
		return $this->usuario;
	}
	function set_usuario($usuario){
		$this->usuario = $usuario;
	}
	public $contrasena;
	function get_contrasena(){
		return $this->contrasena;
	}
	function set_contrasena($contrasena){
		$this->contrasena = $contrasena;
	}
	public $privilegio;
	function get_privilegio(){
		return $this->privilegio;
	}
	function set_privilegio($privilegio){
		$this->privilegio = $privilegio;
	}
 }

class conexion{
	function conectar(){
		return mysqli_connect("localhost","c3admin","CtR3sPo");
	}
}

class usuariosDatos extends conexion {

	public function __construct(){
         $usuarios = new usuarios();
    }

	function insertarUsuarios($usuario,$pass){

		$con = $this->conectar();
		
		$usuarios = new usuarios();
		$usuarios->usuario=$usuario;
		$usuarios->contrasena = base64_encode($pass);
		mysqli_select_db($con,"ctres_reservas");
		$sql = "INSERT INTO usuarios (usuario,contrasena) VALUES(
		'".$usuarios->usuario."',
		'".$usuarios->contrasena."'
		)";
		if(mysqli_query($con,$sql)){
			return true;
		}else{
			return false;
		}
		mysqli_close($con);

	}

    function validar($usuario,$pass){
		$con = $this->conectar();
		$usuarios = new usuarios();
		$usuarios->usuario=$usuario;
		$usuarios->contrasena = base64_encode($pass);
        
		mysqli_select_db($con,"ctres_reservas");
        
		$sql = "SELECT * FROM usuarios WHERE usuario='".$usuarios->usuario."' and contrasena='".$usuarios->contrasena."'";
        $consulta = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($consulta);
        if($fila>0){
            if($fila["usuario"] == $usuarios->usuario && $fila["contrasena"]==$usuarios->contrasena){
                return $fila;
            }
        }

    }

 

    public function getDatoU($usuario,$pass){
		$con = $this->conectar();
		$usuarios = new usuarios();
		$usuarios->usuario=$usuario;
		$usuarios->contrasena = base64_encode($pass);
        
		mysqli_select_db($con,"ctres_reservas");
        
		$sql = "SELECT * FROM usuarios WHERE usuario='".$usuarios->usuario."' and contrasena='".$usuarios->contrasena."'";
        $consulta = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($consulta);
        if($fila>0){
            if($fila["usuario"] == $usuarios->usuario && $fila["contrasena"]==$usuarios->contrasena){
                return json_encode($fila);
            }
        }else{
            return "";
        }

    }

}

class usuariosControlador{
      function insertarUsuarios($usuario,$pass){
		    $obj = new usuariosDatos();
		    return $obj->insertarUsuarios($usuario,$pass);
	    }
      function validar($usuario,$pass){
        $obj = new usuariosDatos();
		    return $obj->validar($usuario,$pass);
      }

      function getId($usuario,$pass){
      	$obj = new usuariosDatos();
      	return $obj->getId($usuario,$pass);
      }
}

?>