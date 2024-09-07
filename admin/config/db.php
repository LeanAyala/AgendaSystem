<?php
    
    try{
        $conex = new mysqli("localhost","root","","sistema_agenda");
        if ($conex->connect_error) {
            throw new Exception("Error de conexión".$conex->connect_error);
        }
        else{
            //echo "Conexión establecida correctamente";
        }
    }
    catch(Exception $ex){
        echo "Error de conexión". $ex->getMessage();
    }

?>
    
