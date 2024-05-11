<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis Léxico y Sintáctico</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Análisis Léxico y Sintáctico</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="archivo">Seleccionar archivo:</label>
            <input type="file" name="archivo" id="archivo" accept=".txt">
            <button type="submit" name="submit">Cargar y Analizar</button>
            <button ><a href="https://github.com/Luisaguilarv/Compiladores/wiki">Documentacion</a></button>
        </form>

        <?php
        // Función para verificar si una palabra está en el listado dado
        function verificarPalabra($palabra, $listado) {
            return in_array($palabra, $listado);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK) {
                $ruta_archivo = $_FILES["archivo"]["tmp_name"];
                
                // Leer el contenido del archivo
                $lineas = file($ruta_archivo);

                // Palabras a verificar
                $palabras = array(
                    "Tierra","Luna","Marte","Deimos","Fobos","Dione",
                    "Jupiter","Saturno","Jano Saturno","Ceres","Haumea",
                    "Makemake","Eris","Orcus","Vesta.Pallas","Varuna",
                    "Sedna","Hidra","Quaoar","Ixion","Ixion","Europa"
                );

                // Array para almacenar errores léxicos
                $errores = array();

                // Verificar cada línea del archivo
                foreach ($lineas as $numeroLinea => $linea) {
                    // Dividir la línea en palabras
                    $palabrasLinea = preg_split("/[\s,.;:]+/", $linea, -1, PREG_SPLIT_NO_EMPTY);
                    foreach ($palabrasLinea as $palabra) {
                        // Verificar si la palabra está en el listado
                        if (!verificarPalabra($palabra, $palabras)) {
                            $errores[] = array("numeroLinea" => $numeroLinea + 1, "palabra" => $palabra);
                        }
                    }
                }

                // Mostrar contenido del archivo
                echo "<div class='text-area'>";
                echo "<h2>Contenido del archivo</h2>";
                echo "<textarea id='contenidoArchivo' rows='25' cols='50' readonly>";
                foreach ($lineas as $linea) {
                    echo $linea;
                }
                echo "</textarea>";
                echo "</div>";

                // Mostrar errores léxicos
                if (!empty($errores)) {
                    echo "<div class='lexico'>";
                    echo "<h2>Análisis Léxico</h2>";
                    echo "<table id='tablaLexico' border='1'>";
                    echo "<tr><th>Número de línea</th><th>Error</th></tr>";
                    foreach ($errores as $error) {
                        echo "<tr><td>{$error['numeroLinea']}</td><td>{$error['palabra']}</td></tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p>No se encontraron errores léxicos.</p>";
                }
            } else {
                echo "<p>Ocurrió un error al cargar el archivo.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
