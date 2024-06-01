<?php
$code = '';

try {
    if (isset($_FILES['codeFile']) && $_FILES['codeFile']['error'] === UPLOAD_ERR_OK) {
        $code = file_get_contents($_FILES['codeFile']['tmp_name']);
    } elseif (isset($_POST['code'])) {
        $code = $_POST['code'];
    } else {
        throw new Exception('No se ha proporcionado ningún código para analizar.');
    }

    $lines = explode("\n", $code);
    $cosmic_data = include 'cosmic_script.php';
    $tokens = [];
    $errors = [];
    $syntax_errors = [];
    $lineNumber = 0;

    // Extraer subarreglos específicos del archivo cosmic_script.php
    $keywords = $cosmic_data['keywords'];
    $arithmetic_operators = $cosmic_data['operadores_aritmeticos'];
    $comparison_operators = $cosmic_data['operadores_comparacion'];
    $logical_operators = $cosmic_data['operadores_logicos'];
    $other_symbols = $cosmic_data['otros_simbolos'];
    $exceptions = $cosmic_data['excepciones'];
    $patt = $cosmic_data['patrones'];

    // Análisis léxico
    foreach ($lines as $line) {
        $lineNumber++;
        // Divide la línea en palabras
        $words = preg_split('/\s+/', $line);
        if ($words === false) {
            throw new Exception('Error al dividir la línea en palabras.');
        }

        foreach ($words as $word) {
            $word = trim($word); 
            if ($word === '') {
                $tokens[] = ["token" => "BLANK", "type" => "espacio en blanco", "line" => $lineNumber];
            } elseif (in_array($word, $keywords)) {
                $tokens[] = ["token" => $word, "type" => "palabra clave", "line" => $lineNumber];
            } elseif (in_array($word, $keywords['impresion'])) {
                $tokens[] = ["token" => $word, "type" => "impresion", "line" => $lineNumber];
            } elseif (in_array($word, $arithmetic_operators['suma'])) {
                $tokens[] = ["token" => $word, "type" => "suma", "line" => $lineNumber];
            } elseif (in_array($word, $arithmetic_operators['resta'])) {
                $tokens[] = ["token" => $word, "type" => "resta", "line" => $lineNumber];
            } elseif (in_array($word, $arithmetic_operators['multiplicacion'])) {
                $tokens[] = ["token" => $word, "type" => "multiplicación", "line" => $lineNumber];
            } elseif (in_array($word, $arithmetic_operators['division'])) {
                $tokens[] = ["token" => $word, "type" => "división", "line" => $lineNumber];
            } elseif (in_array($word, $arithmetic_operators['modulo'])) {
                $tokens[] = ["token" => $word, "type" => "módulo", "line" => $lineNumber];
            } elseif (in_array($word, $comparison_operators['igualdad'])) {
                $tokens[] = ["token" => $word, "type" => "igualdad", "line" => $lineNumber];
            } elseif (in_array($word, $comparison_operators['menor_que'])) {
                $tokens[] = ["token" => $word, "type" => "menor que", "line" => $lineNumber];
            } elseif (in_array($word, $comparison_operators['mayor_que'])) {
                $tokens[] = ["token" => $word, "type" => "mayor que", "line" => $lineNumber];
            } elseif (in_array($word, $comparison_operators['mayor_o_igual_que'])) {
                $tokens[] = ["token" => $word, "type" => "mayor o igual que", "line" => $lineNumber];
            } elseif (in_array($word, $comparison_operators['menor_o_igual_que'])) {
                $tokens[] = ["token" => $word, "type" => "menor o igual que", "line" => $lineNumber];
            } elseif (in_array($word, $comparison_operators['diferente'])) {
                $tokens[] = ["token" => $word, "type" => "diferente", "line" => $lineNumber];
            } elseif (in_array($word, $logical_operators['and'])) {
                $tokens[] = ["token" => $word, "type" => "AND lógico", "line" => $lineNumber];
            } elseif (in_array($word, $logical_operators['or'])) {
                $tokens[] = ["token" => $word, "type" => "OR lógico", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['delimitador_texto_java'])) {
                $tokens[] = ["token" => $word, "type" => "delimitador de texto", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['agrupacion_expresiones'])) {
                $tokens[] = ["token" => $word, "type" => "agrupación", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['cierre_expresiones'])) {
                $tokens[] = ["token" => $word, "type" => "cierre de expresiones", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['delimitador_bloques_java'])) {
                $tokens[] = ["token" => $word, "type" => "delimitador de bloques", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['cierre_bloques'])) {
                $tokens[] = ["token" => $word, "type" => "cierre de bloques", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['aumento_unidad'])) {
                $tokens[] = ["token" => $word, "type" => "aumento de unidad", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['decremento_unidad'])) {
                $tokens[] = ["token" => $word, "type" => "decremento de unidad", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['delimitador_caracteres_java'])) {
                $tokens[] = ["token" => $word, "type" => "delimitador de caracteres", "line" => $lineNumber];
            } elseif (in_array($word, $other_symbols['declaracion_array'])) {
                $tokens[] = ["token" => $word, "type" => "declaración de un array", "line" => $lineNumber];
            } elseif (in_array($word, $exceptions)) {
                $tokens[] = ["token" => $word, "type" => "excepción", "line" => $lineNumber];
            } else {
                if (!preg_match('/^[_a-zA-Z][_a-zA-Z0-9]*$/', $word)) {
                    $errors[] = ["error" => "Token inválido", "token" => $word, "line" => $lineNumber];
                } else {
                    $tokens[] = ["token" => $word, "type" => "identificador", "line" => $lineNumber];
                }
            }
        }
    }

    // Análisis sintáctico
    $syntax_pattern = $patt;
    $pattern_index = 0;
    $expecting_any_word = false;

    foreach ($lines as $line) {
        $lineNumber++;
        $words = preg_split('/\s+/', trim($line));

        foreach ($words as $word) {
            if ($pattern_index < count($syntax_pattern) - 2) { // Last two are special cases
                if ($word === $syntax_pattern[$pattern_index]) {
                    $pattern_index++;
                } else {
                    $syntax_errors[] = [
                        "error" => "Error sintáctico",
                        "line" => $lineNumber,
                        "expected" => $syntax_pattern[$pattern_index],
                        "found" => $word
                    ];
                    break 2; // Exit both loops
                }
            } elseif ($pattern_index == count($syntax_pattern) - 2) { // Handling the "cualquier_palabra" part
                if ($word !== "┤") {
                    $expecting_any_word = true;
                } else {
                    $expecting_any_word = false;
                    $pattern_index++;
                }
            } elseif ($pattern_index == count($syntax_pattern) - 1) { // Handling the last character
                if ($word !== "┤") {
                    $syntax_errors[] = [
                        "error" => "Error sintáctico",
                        "line" => $lineNumber,
                        "expected" => "┤",
                        "found" => $word
                    ];
                    break 2; // Exit both loops
                }
            }
        }
    }

    if ($pattern_index < count($syntax_pattern) - 1) {
        $syntax_errors[] = [
            "error" => "Error sintáctico",
            "line" => $lineNumber,
            "expected" => $syntax_pattern[$pattern_index],
            "found" => "fin de línea"
        ];
    }
} catch (Exception $e) {
    $errors[] = ["error" => $e->getMessage()];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Análisis</title>
    <style>
        h2{
            color: blue;
        }
    </style>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Codigo analizado</h1>

    <form class="formulario" method="post" enctype="multipart/form-data">
        <textarea name="code" rows="15"><?php echo htmlspecialchars($code); ?></textarea>
        <input type="file" name="codeFile">
        <button type="submit">Analizar</button>
    </form>
    <h1>Resultado del Análisis</h1>
    
    <div class="tabla-container"> 
        <div class="tabla">
            <h2>Tabla de Tokens</h2>
            <div class="tabla1">
                <table border="1">
                    <tr>
                        <th>Token</th>
                        <th>Tipo</th>
                        <th>Línea</th>
                    </tr>
                    <?php foreach ($tokens as $token) : ?>
                        <tr>
                            <td style="width: 420px"><?php echo htmlspecialchars($token['token']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($token['type']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($token['line']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="tabla">
            <h2>Errores Léxicos</h2>
            <div class="tabla2">    
                <table border="1">
                    <tr>
                        <th>Error</th>
                        <th>Token</th>
                        <th>Línea</th>
                    </tr>
                    <?php foreach ($errors as $error) : ?>  
                        <tr>
                            <td style="width: 420px"><?php echo htmlspecialchars($error['error']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($error['token']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($error['line']); ?></td>
                        </tr>  
                    <?php endforeach; ?>
                </table>
            </div>    
        </div>
        <div class="tabla">
            <h2>Errores Sintácticos</h2>
            <div class="tablaz">    
                <table border="1">
                    <tr>
                        <th>Error</th>
                        <th>Línea</th>
                        <th>Esperado</th>
                        <th>Encontrado</th>
                    </tr>
                    <?php foreach ($syntax_errors as $syntax_error) : ?>  
                        <tr>
                            <td style="width: 420px"><?php echo htmlspecialchars($syntax_error['error']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($syntax_error['line']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($syntax_error['expected']); ?></td>
                            <td style="width: 420px"><?php echo htmlspecialchars($syntax_error['found']); ?></td>
                        </tr>  
                    <?php endforeach; ?>
                </table>
            </div>    
        </div>
    </div>
</body>
</html>
