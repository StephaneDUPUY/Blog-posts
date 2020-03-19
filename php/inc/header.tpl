<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:600|Poppins:300,400i&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="wrapper">
        <header id="menu">
            <h1 id="menu-title">Blog - Les posts </h1>
            <nav id="menu-nav">
                <ul>
                    <li class="menu-nav-item"><a href="list.php">Messages</a></li>
                    <li class="menu-nav-item"><a href="add.php">Nouveau</a></li>
                    <?php if (!isLoggedIn()): ?>
                    <li class="menu-nav-item"><a href="login.php">Connexion</a></li>
                    <?php else: ?>
                    <li class="menu-nav-item"><a href="logout.php">Déconnexion</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <main>