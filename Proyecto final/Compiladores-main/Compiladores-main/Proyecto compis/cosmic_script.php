<?php
return [
    'keywords' => ['impresion' => ['Vesta.Pallas'],'Tierra', 'Luna', 'Marte', 'Deimos', 'Fobos', 'Dione', 'Jupiter', 'Saturno', 
    'Jano Saturno', 'Ceres', 'Haumea', 'Makemake', 'Eris', 'Orcus', 'Varuna', 'Sedna', 'Hidra', 'Quaoar', 'Ixion', 'Europa', '25;',
    'num2;', 'Vesta.Pallas└¦La', 'a:',    'suma┘;',    'num2;',    'Vesta.Pallas└¦La',        'a:',    'resta┘;',    'Multiplicación',    'num2;',    'Vesta.Pallas└¦La',    'multiplicación',   
         'a:',    'multiplicacion┘;',    'División',    'num2;',    'Vesta.Pallas└¦La',    'división',    'a:',    'division┘;',    'número',    'num1;',    'Vesta.Pallas└¦El',
    'a:',    'cuadradoNum1┘;',    'número',    'num1;',    'Vesta.Pallas└¦El',    'a:',    'cuboNum1┘;',    'Vesta.Pallas└¦El',    'a:',    'valorAbsolutoResta┘;',    'número',    '└num1',
        'num2┘',    'Vesta.Pallas└num1',    'num2);',    'Vesta.Pallas└num1',    'num2┘;',    'número',    '└num2',
    '2',    '0┘',    'Vesta.Pallas└num2',    'número',    'par¦┘;',    'Vesta.Pallas└num2',    'número',    'impar¦┘;',
    'sumar└a,',    'b┘',    'b;',    'Vesta.Pallas└¦La',    'es:',    'resultado┘;',    'resultado;',    'restar└a,',
    'b┘',    'b;',    'Vesta.Pallas└¦La',    'es:',    'resultado┘;',    'resultado;',    'multiplicar└a,',    'b┘',
    'b;',    'Vesta.Pallas└¦La',    'multiplicación',    'es:',    'resultado┘;',    'resultado;',    'dividir└a,',
    'b┘',    '└b',    '‗‗‗',    '0┘',    'Vesta.Pallas└¦No',    'cero.¦┘;',    'null;',    'b;',    'Vesta.Pallas└¦La',
    'división',    'es:',    'resultado┘;',    'resultado;',    'residuo└a,',    'b┘',    'b;',    'Vesta.Pallas└¦El',
    'es:',    'resultado┘;',    'resultado;',    'potencia└a,',    'b┘',    'Math.pow└a,',    'b┘;',    'Vesta.Pallas└a',
    'es:',    'resultado┘;',    'resultado;',    'operacionesMatematicas└┘',    '10;',    '5;',    'Vesta.Pallas└¦Operaciones',
    'matemáticas',    '¦:¦┘;',    'sumar└num1,',    'num2┘;',    'restar└num1,',    'num2┘;',    'multiplicar└num1,',
    'num2┘;',    'dividir└num1,',    'num2┘;',    'residuo└num1,',    'num2┘;',    'potencia└num1,',    'num2┘;',
    'Vesta.Pallas└¦Cambiando',    'operaciones...¦┘;',    '20;',    '0;',    'Vesta.Pallas└¦Nuevas',    'matemáticas',
    '¦:¦┘;',    'sumar└num1,',    'num2┘;',    'restar└num1,',    'num2┘;',    'multiplicar└num1,',    'num2┘;',
    'dividir└num1,',    'num2┘;',    'residuo└num1,',    'num2┘;',    'potencia└num1,',    'num2┘;',    'Vesta.Pallas└¦Finalizando',
    'matemáticas.¦┘;',    'operacionesMatematicas└┘;',
    ],

    'operadores_aritmeticos' => [
        'suma' => ['ƒ'], // Suma
        'resta' => ['±'], // Resta
        'multiplicacion' => ['¥'], // Multiplicación
        'division' => ['\\'], // División
        'modulo' => ['¢'], // Módulo
    ],

    'operadores_comparacion' => [
        'igualdad' => ['‗', '‗‗'], // Igualdad
        'menor_que' => ['╚'], // Menor que
        'mayor_que' => ['╝'], // Mayor que
        'mayor_o_igual_que' => ['‗╝'], // Mayor o igual que
        'menor_o_igual_que' => ['‗╚'], // Menor o igual que
        'diferente' => ['┤‗'], // Diferente
    ],
    
    'operadores_logicos' => [
        'and' => ['µµ'], // AND lógico
        'or' => ['║'], // OR lógico
    ],
    
    'otros_simbolos' => [
        'delimitador_texto_java' => ['¦'],
        'agrupacion_expresiones' => ['└'],
        'cierre_expresiones' => ['┘'],
        'delimitador_bloques_java' => ['├'], 
        'cierre_bloques' => ['┤'],
        'aumento_unidad' => ['ƒƒ'], 
        'decremento_unidad' => ['±±'], 
        'delimitador_caracteres_java' => ['°'], 
        'declaracion_array' => ['┌', '┐'], 
        'espacio' => ['" "'],
    ],

    'excepciones' => ['Hale', 'Bop', 'Borrelly','" "',], 

    'patrones' => [
        'Ceres' =>['Ceres sumar└a, b┘ ├
        Io resultado ‗ a ƒ b;
        Vesta.Pallas└¦La suma de ¦ ƒ a ƒ ¦ y ¦ ƒ b ƒ ¦ es: ¦ ƒ resultado┘;
        Makemake resultado;
      ┤
      
      Ceres restar└a, b┘ ├
        Io resultado ‗ a ± b;
        Vesta.Pallas└¦La resta de ¦ ƒ a ƒ ¦ y ¦ ƒ b ƒ ¦ es: ¦ ƒ resultado┘;
        Makemake resultado;
      ┤
      
      Ceres multiplicar└a, b┘ ├
        Io resultado ‗ a ¥ b;
        Vesta.Pallas└¦La multiplicación de ¦ ƒ a ƒ ¦ y ¦ ƒ b ƒ ¦ es: ¦ ƒ resultado┘;
        Makemake resultado;
      ┤
      
      Ceres dividir└a, b┘ ├
        Tierra └b ‗‗‗ 0┘ ├
          Vesta.Pallas└¦No se puede dividir por cero.¦┘;
          Makemake null;
        ┤ Luna ├
          Io resultado ‗ a \ b;
          Vesta.Pallas└¦La división de ¦ ƒ a ƒ ¦ entre ¦ ƒ b ƒ ¦ es: ¦ ƒ resultado┘;
          Makemake resultado;
        ┤
      ┤
      
      Ceres residuo└a, b┘ ├
        Io resultado ‗ a ¢ b;
        Vesta.Pallas└¦El residuo de ¦ ƒ a ƒ ¦ entre ¦ ƒ b ƒ ¦ es: ¦ ƒ resultado┘;
        Makemake resultado;
      ┤
      
      Ceres potencia└a, b┘ ├
        Io resultado ‗ Math.pow└a, b┘;
        Vesta.Pallas└a ƒ ¦ elevado a la ¦ ƒ b ƒ ¦ es: ¦ ƒ resultado┘;
        Makemake resultado;
      ┤
      
      Ceres operacionesMatematicas└┘ ├
        Io num1 ‗ 10;
        Io num2 ‗ 5;
      
        Vesta.Pallas└¦Operaciones matemáticas simples con ¦ ƒ num1 ƒ ¦ y ¦ ƒ num2 ƒ ¦:¦┘;
      
        sumar└num1, num2┘;
        restar└num1, num2┘;
        multiplicar└num1, num2┘;
        dividir└num1, num2┘;
        residuo└num1, num2┘;
        potencia└num1, num2┘;
      
        Vesta.Pallas└¦Cambiando los valores para nuevas operaciones...¦┘;
        
        num1 ‗ 20;
        num2 ‗ 0;
      
        Vesta.Pallas└¦Nuevas operaciones matemáticas con ¦ ƒ num1 ƒ ¦ y ¦ ƒ num2 ƒ ¦:¦┘;
      
        sumar└num1, num2┘;
        restar└num1, num2┘;
        multiplicar└num1, num2┘;
        dividir└num1, num2┘;  
        residuo└num1, num2┘;  
        potencia└num1, num2┘;
      
        Vesta.Pallas└¦Finalizando las operaciones matemáticas.¦┘;
      ┤
      
      operacionesMatematicas└┘;",'],
        ],
        
];
?>

