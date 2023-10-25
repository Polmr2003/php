<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ticket de Pedido</title>
    <!-- Include any CSS styling you want for the ticket here -->
</head>

<body>
    <h1>Resumen del Pedido</h1>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /* ------------------------------------------- Cojemos las variables de el usuario ---------------------------------------------------------------- */
        $nombre = $_POST['nombre']; /* Para esto es necesario poner un name al input en el php, i poner el mismo nombre aqui (name="nombre") */
        $apellidos = $_POST["apellidos"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];


        /* ------------------------------------------- Calculamos el dinero total del pedido ---------------------------------------------------------------- */
        // variable para guardar el dinero del pedido
        $total = 0;

        /*------------------------ Pizza margarita ------------------------ */
        if (isset($_POST["num_pizzas_mar"]) && isset($_POST["tamaño_pizza_mar"])) {
            //variable con el numero de las pizzas
            $num_pizzas_mar = intval($_POST["num_pizzas_mar"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_mar = $_POST["tamaño_pizza_mar"];

            // variable con el precio de las pizzas
            $precio_pizza_mar = 0;

            if ($num_pizzas_mar === "mediana") {
                $precio_pizza_mar = 15;
            } elseif ($tamaño_pizza_mar === "familiar") {
                $precio_pizza_mar = 17;
            } elseif ($tamaño_pizza_mar === "individual") {
                $precio_pizza_mar = 13;
            }

            $total += $num_pizzas_mar * $precio_pizza_mar;
        }

        /*------------------------ Pizza carbonara ------------------------ */
        if (isset($_POST["num_pizzas_car"]) && isset($_POST["tamaño_pizza_car"])) {
            //variable con el numero de las pizzas
            $num_pizzas_car = intval($_POST["num_pizzas_car"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_car = $_POST["tamaño_pizza_car"];

            // variable con el precio de las pizzas
            $precio_pizza_car = 0; 

            //
            if ($tamaño_pizza_car === "mediana") {
                //
                $precio_pizza_car = 15;
            } elseif ($tamaño_pizza_car === "familiar") {
                //
                $precio_pizza_car = 17;
            } elseif ($tamaño_pizza_car === "individual") {
                //
                $precio_pizza_car = 13;
            }

            $total += $num_pizzas_car * $precio_pizza_car;
        }

        /*------------------------ Pizza barbacoa ------------------------ */
        if (isset($_POST["num_pizzas_bar"]) && isset($_POST["tamaño_pizza_bar"])) {
            //variable con el numero de las pizzas
            $num_pizzas_bar = intval($_POST["num_pizzas_bar"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_bar = $_POST["tamaño_pizza_bar"];

            // variable con el precio de las pizzas
            $precio_pizza_bar = 0; // You should set the actual prices for different pizzas

            //
            if ($tamaño_pizza_bar === "mediana") {
                //
                $precio_pizza_bar = 15;
            } elseif ($tamaño_pizza_bar === "familiar") {
                //
                $precio_pizza_bar = 17;
            } elseif ($tamaño_pizza_bar === "individual") {
                //
                $precio_pizza_bar = 13;
            }


            $total += $num_pizzas_bar * $precio_pizza_bar;
        }

        /*------------------------ Pizza 4 quesos ------------------------ */
        if (isset($_POST["num_pizzas_que"]) && isset($_POST["tamaño_pizza_que"])) {
            //variable con el numero de las pizzas
            $num_pizzas_que = intval($_POST["num_pizzas_que"]);

            //variable con el tamaña de las pizzas
            $tamaño_pizza_que = $_POST["tamaño_pizza_que"];

            // variable con el precio de las pizzas
            $precio_pizza_que = 0;

            //
            if ($tamaño_pizza_que === "mediana") {
                //
                $precio_pizza_que = 15;
            } elseif ($tamaño_pizza_que === "familiar") {
                //
                $precio_pizza_que = 17;
            } elseif ($tamaño_pizza_que === "individual") {
                //
                $precio_pizza_que = 13;
            }

            $total += $num_pizzas_que * $precio_pizza_que;
        }

        /*------------------------ Ofertas ------------------------ */

        // Check for additional product checkboxes and update the total accordingly
        if (isset($_POST["Bebida_+_pizza"])) {
            // Add the price of the pizza and the selected beverage
            $total += 3; // Assuming the beverage costs 3 euros
        }


        if (isset($_POST["pizza+_pizza"])) {
            // Add the prices of two individual pizzas
            $total += 15; // Adjust the price as needed
        }


        if (isset($_POST["media_+_normal"])) {
            // Add the prices of two pizzas
            $total += 18; // Adjust the price as needed
        }


        // Calculate VAT (Assuming a 21% VAT rate)
        $iva = 0.21 * $total;


        // Calculate the final total with VAT
        $total_con_iva = $total + $iva;
    }
    ?>


    <!-- ------------------------------------------- Mostrar Datos usuario ---------------------------------------------------------------- -->

    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Apellidos:</strong> <?php echo $apellidos; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
    <p><strong>Dirección:</strong> <?php echo $direccion; ?></p>

    <!-- ------------------------------------------- Mostrar Productos del pedido ---------------------------------------------------------------- -->

    <!-- Mostramos los productos seleccionados i el precio total -->
    <h2>Productos Seleccionados:</h2>
    <ul>
        <?php

        /*------------------------ Pizzas ------------------------ */

        // Si an pedido una pizza margarita mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_mar"]) && isset($_POST["tamaño_pizza_mar"])) {
            echo "<li> $num_pizzas_mar Pizza margarita $tamaño_pizza_mar</li>";
        }

        // Si an pedido una pizza carbonara mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_car"]) && isset($_POST["tamaño_pizza_car"])) {
            echo "<li> $num_pizzas_car Pizza carbonara $tamaño_pizza_car</li>";
        }

        // Si an pedido una pizza barbacoa mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_bar"]) && isset($_POST["tamaño_pizza_bar"])) {
            echo "<li> $num_pizzas_bar Pizza barbacoa $tamaño_pizza_bar</li>";
        }

        // Si an pedido una pizza 4 quesos mostramos, la cantidad i el tamaño
        if (isset($_POST["num_pizzas_que"]) && isset($_POST["tamaño_pizza_que"])) {
            echo "<li> $num_pizzas_que Pizza 4 quesos $tamaño_pizza_que</li>";
        }

        /*------------------------ Ofertas ------------------------ */

        // Si an pedido una pizza carbonara mostramos, la cantidad i el tamaño
        if (isset($_POST["Bebida_+_pizza"])) {
            echo "<li>Pizza Carbonara (familiar) + Bebida</li>";
        }

        // Si an pedido una pizza barbacoa mostramos, la cantidad i el tamaño
        if (isset($_POST["pizza+_pizza"])) {
            echo "<li>Pizza Margarita (individual) + Pizza Barbacoa (individual)</li>";
        }

        // Si an pedido una pizza 4 quesos mostramos, la cantidad i el tamaño
        if (isset($_POST["media_+_normal"])) {
            echo "<li>Pizza 4 Quesos (mediana) + Pizza Carbonara (individual)</li>";
        }

        ?>
    </ul>

    <!-- ------------------------------------------- Mostrar el precio total ---------------------------------------------------------------- -->
    <p><strong>Importe Total:</strong> <?php echo $total; ?> €</p>
    <p><strong>IVA (21%):</strong> <?php echo $iva; ?> €</p>
    <p><strong>Total con IVA:</strong> <?php echo $total_con_iva; ?> €</p>
</body>

</html>