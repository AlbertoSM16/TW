<?php    


function vaciarTablas(){
    require 'conexionBD.php';

    $tablas = array("reservas", "fotos_habitaciones", "habitaciones", "usuarios");

    foreach ($tablas as $tabla) {
        $query = "DELETE FROM $tabla";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

}

function hacerBackup($backup_path) {
    
    require 'credenciales.php';

    $command = "mysqldump --host=$host --user=$username --password=$password $database > $backup_path";

    // Ejecutar el comando
    exec($command, $output, $exitCode);

    // Verificar si la ejecución fue exitosa
    if ($exitCode === 0) {
        echo "Backup realizado correctamente en $rutaBackup";
    } else {
        echo "Error al realizar el backup";
    }
}


function restaurarBackup($rutaBackup) {
    require 'conexionBD.php';

    try {
       
        $sql = file_get_contents($rutaBackup);
        $conn->exec($sql);
        echo "Backup restaurado correctamente desde $rutaBackup";
    } catch (PDOException $e) {
        echo "Error al restaurar el backup: " . $e->getMessage();
    }
}

function mostrarLogs(){

    require 'conexionBD.php';
    try{
        $query = 'SELECT * FROM logs';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo '<ul style="list-style-type: none;">';
        foreach ($logs as $log) {
            echo '<li>';
            foreach ($log as $key => $value) {
                echo htmlspecialchars("$key: $value ", ENT_QUOTES, 'UTF-8');
            }
            echo '</li>';
        }
        echo '</ul>';

    }catch(Exception $e){
        echo "Error mostrar los logs: " . $e->getMessage();

    }
    

}