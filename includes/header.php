
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Snippets</title>
</head>
<body>
    <main id='app'>
    <nav class="blue" >
        <div class="nav-wrapper" v-if="menu == true" >
            <ul id="nav-mobile" class="right hide-on-med-and-down" >
                <li><a href="index.php"><i class="material-icons" >home</i></a></li>
                <li><a href="alta.php"><i class="material-icons" >add</i></a></li>  
                <li><a href="index.php?cat=php">PHP</a></li>
                <li><a href="index.php?cat=css">CSS</a></li>
                <li><a href="index.php?cat=html5">HTML5</a></li>
                <li><a href="index.php?cat=vue">VUE</a></li>
                <li><a href="index.php?cat=mysql">MYSQL</a></li>
                <li><a href="../login/salir.php">SALIR</a></li>
            </ul>
        </div>
    </nav>
    
    
    
