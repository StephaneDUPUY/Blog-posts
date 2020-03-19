<?php

// start the session
session_start();

function login($name, $pass) {
    //load users database 
    require("data/users.php");

    foreach($users as $user){
        if ($user['name'] === $name){
            if ($user['password'] === $pass){
                // to connect user using cookie in browser
                // setcookie('blog_login', $name, strtotime("+ 1 week"), "/");

                $_SESSION['user'] = $user;

                return true;
            }
        }
    }

    return false;
}

function logout() {
    // to logout user delete coockie with given expiration date in past

    unset($_SESSION['user']);

    // to destroy completely session data ($_SESSION)
    // session_destroy();
}

function isLoggedIn() {
    if (isset($_SESSION['user'])){
        return true;
    }

    return false;
}

function getUser($id) {
    
}

function getMe() {
    require("data/users.php");

    foreach($users as $user){
        if ($user['name'] === $_SESSION['user']['name']){
            return $user;
        }
    }

    return null;
}


function redirect($page, $queryString = []) {
    if (file_exists(__DIR__."/../$page.php")) {
        $url = "$page.php";
        if (!empty($queryString)) {
            $url .= "?".http_build_query($queryString);
        }
        header("Location: $url");
        exit;
    } else {
        header("Location: 404.php");
    }
}


function displayFlash($messages) {
    $messages = array_intersect_key(
        $messages,
        ["info" => 0, "warning" => 0, "error" => 0]
    );

    foreach ($messages as $class => $label):
        $fullText = [
            'nologin' => 'Identifiants incorrects',
            'unauthorized' => 'Accès interdit',
            'loggedout' => 'Déconnexion réussie'
        ][$label];
        ?>
        <p class="<?=$class?>"><?=$fullText?></p>
        <?php
    endforeach;
}

function getMessages() {
    
    return [];
}

function getMessage($messageId) {
    
}

function addMessage($message, $date, $user) {

    
}

function addCommentToMessage($messageId, $comment, $date, $user) {
    
}


// HR = Human Readable
function displayHRDate($timestamp) {
    setlocale(LC_TIME, 'fr_FR.utf8');
    return strftime('le %e %B %Y à %H:%M', $timestamp);
} 