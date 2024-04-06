 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View\styles.css">
    <title>Lenguaje GTA</title>
</head>
<body>
    <!-- contenedor para todos los elementos -->
    <div class="contenedor">
        <!-- contenedor para el encabezado -->
        <header class="header">
            <div id="Texto"> <h1 id="head">Lenguaje GTA de Gamers Para Gamers</h1>
            </div>
            <div id="Boton">
            <button>Quienes somos</button>
            <button onclick="location.href='https://github.com/Luisaguilarv/Compiladores/wiki'">Documentacion</button>
            <button>Validaciones</button>
            
            </div>
            
        </header>
        <!-- contenedor de consola -->
        <div class="main">
            <!-- contenedor para ordenar  los botones en consola--> 
            <div  class="BarraDeTareas">
            <h1>Consola</h1> 
            <button id="guardar">Guardar codigo</button><br/>
            <button>importar archivo</button>
            </div>
            <textarea name="" id="Consola" cols="30" rows="10"></textarea>
        </div>
        <!-- contenedor de barra de errores -->
        <div class="barra">
            <h1>Barra de errores</h1>
            <textarea name="" id="Errores" cols="30" rows="10"></textarea>
        </div>
        <!-- contenedor de barra de proceso de analisis -->
        <div class="terminal">
            <h2>Proceso de analisis</h2>
            <textarea name="" id="Proceso" cols="30" rows="10"></textarea>
        </div>
        
    </div>
    <!-- contenedor para el pie de pagina -->
    <footer class="footer">All rights reserved Luis Aguilar®</footer>
    
</body>
</html>