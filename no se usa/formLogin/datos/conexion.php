<?php

class conexion{
	function conectar(){
		return mysqli_connect("localhost","eytoo","eytoo");
	}
}

?>