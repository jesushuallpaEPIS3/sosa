<?php
class Maquinaria {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }
    //CLIENTE
    // Funcionar para listar maquinarias en Catalogo
    public function listar_Maquinarias(){
        $consulta=$this->db->query("select * from tbmaquinaria;");
        while($filas=$consulta->fetch_assoc()){
            $this->maquinaria[]=$filas;
        }
        return $this->maquinaria;
    }

    public function mostrar_Maquinaria($idmaquinaria) {
        echo "EN MODEL: id: ";
        echo $idmaquinaria;
    
        $consulta = $this->db->query("
            SELECT 
                tbmaquinaria.*, 
                tbdetallemaquinaria.* 
            FROM tbmaquinaria 
            LEFT JOIN tbdetallemaquinaria 
            ON tbmaquinaria.idmaquinaria = tbdetallemaquinaria.idmaquinaria 
            WHERE tbmaquinaria.idmaquinaria = $idmaquinaria
        ");
    
        return $consulta->fetch_assoc();
    }
    
    //ADMINISTRADOR
    //listar
    public function listarMaquinarias() {
        $maquinarias = array();
        $consulta = $this->db->query("SELECT * FROM tbmaquinaria");
        while ($fila = $consulta->fetch_assoc()) {
            $maquinarias[] = $fila;
        }
        return $maquinarias;
    }
    //agregar
    public function agregarMaquinaria($numserie, $nombre, $marca, $modelo, $costoh, $imagenprincipal) {
        try {
            $sql = "INSERT INTO tbmaquinaria (numserie, nombre, marca, modelo, costoh, imagenprincipal) VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->db->prepare($sql);
            
            // Bind parameters to the prepared statement
            $stmt->bind_param("ssssds", $numserie, $nombre, $marca, $modelo, $costoh, $imagenprincipal);
            
            // Execute the statement
            $stmt->execute();
            
            // Close the statement and the connection
            $stmt->close();
            $this->db->close();
            return true;
        } catch (Exception $e) {
            echo "Error al agregar la maquinaria: " . $e->getMessage();
            return false;
        }
    }

    // Eliminar maquinaria
    public function eliminarMaquinaria($id) {
        try {
            $sql = "DELETE FROM tbmaquinaria WHERE idmaquinaria = ?";
            $stmt = $this->db->prepare($sql);
            if (!$stmt) {
                throw new Exception("Error en la preparación de la consulta: " . $this->db->error);
            }
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            // Verificar si se eliminó correctamente al menos una fila
            if ($stmt->affected_rows > 0) {
                $stmt->close();
                return true; // Indicar que la maquinaria se eliminó correctamente
            } else {
                $stmt->close();
                return false; // Indicar que no se eliminó ninguna maquinaria (quizás el ID no existe)
            }
        } catch (Exception $e) {
            throw new Exception("Error al eliminar la maquinaria: " . $e->getMessage());
        }
    }
    
    // Editar
    public function editarMaquinaria($id, $numserie, $nombre, $marca, $modelo, $costoh, $imagenprincipal) {
        try {
            $sql = "UPDATE tbmaquinaria SET numserie = ?, nombre = ?, marca = ?, modelo = ?, costoh = ?, imagenprincipal = ? WHERE idmaquinaria = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ssssdsi", $numserie, $nombre, $marca, $modelo, $costoh, $imagenprincipal, $id);
            $stmt->execute();
            $stmt->close();
            return true;
        } catch (Exception $e) {
            echo "Error al editar la maquinaria: " . $e->getMessage();
            return false;
        }
    }
    // Buscar
    public function buscarMaquinaria($termino) {
        $maquinarias = array();
        $termino = "%" . $termino . "%";
        $sql = "SELECT * FROM tbmaquinaria WHERE numserie LIKE ? OR nombre LIKE ? OR marca LIKE ? OR modelo LIKE ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $termino, $termino, $termino, $termino);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($fila = $result->fetch_assoc()) {
            $maquinarias[] = $fila;
        }
        $stmt->close();
        return $maquinarias;
    }
    
    public function buscarMaquinariaPorId($id) {
        $sql = "SELECT * FROM tbmaquinaria WHERE idmaquinaria = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $maquinaria = $result->fetch_assoc();
        $stmt->close();
        return $maquinaria;
    }


}

?>