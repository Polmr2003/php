<?php
//_______________funciones______________________________
//------------------------------------------------------


function myHeader(){
    $head = <<<CABECERA
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tirar dado</title>
    </head>
    CABECERA;

    echo $head;
}

function myMenu(){
    
    $menu = <<<MENU
    <div class="menu">
       <ul>
           <li>
           <a href="home.php"> Home </a>
           </li>
           <li>
               <a href="juego1.php">Juego1 </a>
           </li>
           <li>Juego2</li>
           <li>Juego3</li>
       </ul>
    </div>
    MENU;

    echo $menu;
}

/**
 * $someting - es la frase que queremos mostrar
 * return - con el return retornamos la frase con \n para que nos haga un salto de linea
 */
function println($something): string{
    return "$something\n";
};

?>