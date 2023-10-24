<?php
// importamos las classes con las funciones
require_once 'Funtions.php';

//variables
$_POST['nombre'] = "";
$_POST['apellidos'] = "";
$_POST['telefono'] = "";
$_POST['direccion'] = "";

$nombre;
$apellidos;
$telefono;
$direccion;

//funciones
myHeader();
myMenu();;

/* ------------------------------------------- Comprovaciones de las variables---------------------------------------------------------------- */
if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['direccion'])) {
    // Miramos que no tenga contenido html en los campos de el usuario
    $nombre = htmlspecialchars($_POST['nombre']); // htmlspecialchars evita que el usuario ponga codigo html, convierte la cadena que ponga el usuario en html
    $apellidos = htmlspecialchars($_POST['apellidos']); // htmlspecialchars evita que el usuario ponga codigo html, convierte la cadena que ponga el usuario en html
    $telefono = htmlspecialchars($_POST['telefono']); // htmlspecialchars evita que el usuario ponga codigo html, convierte la cadena que ponga el usuario en html
    $direccion = htmlspecialchars($_POST['direccion']); // htmlspecialchars evita que el usuario ponga codigo html, convierte la cadena que ponga el usuario en html

    //------------------- Sanitizamos los datos -------------------
    //sanitizamos nombre
    if (filter_has_var(INPUT_POST, 'nombre')) { // filter_has_var para comprovar que esa variable viene del metodo post
        //si viene del metodo post
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING); // filter_var  para sanitizar la variable, filter_var( variable, metodo para filtrar )
    }

    //sanitizamos apellidos
    if (filter_has_var(INPUT_POST, 'apellidos')) { // filter_has_var para comprovar que esa variable viene del metodo post
        //si viene del metodo post
        $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING); // filter_var  para sanitizar la variable, filter_var( variable, metodo para filtrar )
    }

    //sanitizamos telefono
    if (filter_has_var(INPUT_POST, 'telefono')) { // filter_has_var para comprovar que esa variable viene del metodo post
        //si viene del metodo post
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT); // filter_var  para sanitizar la variable, filter_var( variable, metodo para filtrar )
    }

    //sanitizamos direccion
    if (filter_has_var(INPUT_POST, 'direccion')) { // filter_has_var para comprovar que esa variable viene del metodo post
        //si viene del metodo post
        $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_NUMBER_INT); // filter_var  para sanitizar la variable, filter_var( variable, metodo para filtrar )
    }
}

?>

<!--------------------------------------------------- HTML ------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>

<body>
    <!-- Formulario -->
    <form action="" method="post">
        <!-- Datos usuario -->
        <h1>Datos usuario</h1>

        <!-- Nombre de el usuario -->
        <label for="nombre" class="info_usu">Nombre:</label>
        <input type="text" class="input_usu" id="nombre" required>
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="Error_nom_usu" id="validacion_nombre"></span><br>

        <!-- Apellidos de el usuario -->
        <label for="apellidos" class="info_usu">Apellidos:</label>
        <input type="text" class="input_usu" id="Apellidos" required>
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="validacion_Apellidos"></span><br>

        <!-- Telefono de el usuario -->
        <label for="Apellidos" class="info_usu">Telefono:</label>
        <input type="text" class="input_usu" id="Telefono" required>
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="validacion_Telefono"></span><br>

        <!-- Direccion de el usuario -->
        <label for="Apellidos" class="info_usu">Direccion:</label>
        <input type="text" class="input_usu" id="Direccion" required>
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="validacion_Direccion"></span><br>




        <!-- Menu de las pizzas -->
        <h1>Menú pizzas</h1>
        <br>

        <!-- Contenedor flex para poner la informacion de las pizzas una al lado de otra -->
        <div style="display: flex; flex-wrap: wrap;">

            <!-- Creamos un contenedor para guardar la informacion de la pizza margarita -->
            <div style="margin: 10px; text-align: center;">

                <!-- Titulo de la pizza -->
                <h4>Pizza margarita</h4>

                <!-- Formulario -->
                <h5>precio 15€</h5>

                <label for="num_pizzas" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas">
                <br>
                <!-- Select con los tamaños -->
                <select name="tamaño_pizza" id="tamaño_pizza" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Inrgedientes de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes:</h6>
                </u>
                <p class="ingredientes">
                    <input type="checkbox" name="" value="añadir">+ jamon<br>
                    <input type="checkbox" name="" value="añadir">+ bacon<br>
                    <input type="checkbox" name="" value="añadir">+ albaha<br>
                    <input type="checkbox" name="" value="añadir">+ peperoni<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa" value="masa_especial">Con gluten
                <input type="radio" name="masa" value="masa_especial">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza margarita -->
            </div>

            <!-- Creamos un contenedor para guardar la informacion de la pizza carbonara -->
            <div style="margin: 10px; text-align: center;">

                <!-- Titulo de la pizza -->
                <h4>Pizza Carbonara</h4>

                <!-- Descripcion -->



                <!-- Formulario -->
                <h5>precio 17€</h5>

                <label for="num_pizzas" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas">
                <br>

                <!-- Select con los tamaños -->
                <select name="tamaño_pizza" id="tamaño_pizza" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Inrgedientes de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes:</h6>
                </u>

                <p class="ingredientes">
                    <input type="checkbox" name="" value="añadir">+ Atun<br>
                    <input type="checkbox" name="" value="añadir">+ Bacon<br>
                    <input type="checkbox" name="" value="añadir">+ Aceitunas<br>
                    <input type="checkbox" name="" value="añadir">+ Pimiento<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa" value="masa_especial">Con gluten
                <input type="radio" name="masa" value="masa_especial">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza carbonara -->
            </div>

            <!-- Creamos un contenedor para guardar la informacion de la pizza barbacoa -->
            <div class="div_informacion">

                <!-- Titulo de la pizza -->
                <h4>Pizza barbacoa</h4>

                <!-- Formulario -->
                <h5>precio 13€</h5>

                <label for="num_pizzas" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas">
                <br>
                <!-- Select con los tamaños -->
                <select name="tamaño_pizza" id="tamaño_pizza" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Inrgedientes de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes:</h6>
                </u>

                <p class="ingredientes">
                    <input type="checkbox" name="" value="añadir">+ Queso<br>
                    <input type="checkbox" name="" value="añadir">+ Carne<br>
                    <input type="checkbox" name="" value="añadir">+ Salsa<br>
                    <input type="checkbox" name="" value="añadir">+ pimiento verde<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa" value="masa_especial">Con gluten
                <input type="radio" name="masa" value="masa_especial">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza barbacoa -->
            </div>

            <!-- Creamos un contenedor para guardar la informacion de la pizza 4 quesos -->
            <div style="margin: 10px; text-align: center;">

                <!-- Titulo de la pizza -->
                <h4>Pizza 4 quesos</h4>

                <!-- Formulario -->
                <h5>precio 20€</h5>

                <label for="num_pizzas" class="form-label"></label>
                <input type="number" class="form-control" id="num_pizzas">
                <br>
                <!-- Select con los tamaños -->
                <select name="tamaño_pizza" id="tamaño_pizza" class="form-select" aria-label="Default select example" required>
                    <option selected>Tamaño</option>
                    <option>mediana</option>
                    <option>familiar</option>
                    <option>individual</option>
                </select>
                <!-- Inrgedientes de la pizza -->
                <u>
                    <h6 class="tit_info"> Ingredientes:</h6>
                </u>

                <p class="ingredientes">
                    <input type="checkbox" name="" value="añadir">+ Jamon<br>
                    <input type="checkbox" name="" value="añadir">+ Bacon<br>
                    <input type="checkbox" name="" value="añadir">+ caebolla caramelizada<br>
                    <input type="checkbox" name="" value="añadir">+ miel<br>
                </p>

                <!-- Tipo masa -->
                <u>
                    <h6 class="tit_info">Masa especial:</h6>
                </u>
                <input type="radio" name="masa" value="masa_especial">Con gluten
                <input type="radio" name="masa" value="masa_especial">Sin gluten<br>

                <!-- Cerramos el contenedor con la informacion de la pizza 4 quesos -->
            </div>

            <!-- Cerramos el display flex -->
        </div>

        <!-- Ofertas -->
        <h1>Ofertas</h1>

        <!-- Bebida + pizza familiar -->
        <label for="Bebida_+_pizza" class="form-label">Pizza carbonara (familiar) + bebida a elegir:</label>
        <input type="checkbox" class="form-control" id="Bebida_+_pizza">
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="Bebida_+_pizza"></span><br>


        <!-- pizza + pizza  -->
        <label for="pizza_+_pizza" class="form-label">Pizza margarita (individual) + Pizza barbacoa (individual):</label>
        <input type="checkbox" class="form-control" id="pizza+_pizza">
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="pizza+_pizza"></span><br>


        <!-- media + normal -->
        <label for="media_+_normal" class="form-label">Pizza 4 quesos (mediana) + Pizza carbonara (individual)</label>
        <input type="checkbox" class="form-control" id="media_+ _normal">
        <!-- Mostrar si las creedenciales son válidas de nombre-->
        <span style="color:red" class="form-text" id="media_+ _normal"></span><br><br>

        <!-- Boton -->
        <button class="my_Btn">
            <p class="txt_my_Btn">Comprar</p>
        </button>
    </form>

</body>

</html>