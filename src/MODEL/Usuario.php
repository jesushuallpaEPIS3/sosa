<?php
namespace App\Model;

use DB\Conectar; // Importa la clase Conectar desde el namespace DB

class Usuario {
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function login($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM tbadmin WHERE usuario = ? AND password = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->db->error);
        }
        
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        
        if ($stmt->error) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }
        
        $result = $stmt->get_result();
        
        // Debugging: Verificar cuántas filas devuelve la consulta
        var_dump($result->num_rows); 
        
        if ($result->num_rows === 0) {
            return null; // No se encontraron resultados
        }
        
        return $result->fetch_assoc();
    }
    
    
    
    
    
    
}
?>
