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
