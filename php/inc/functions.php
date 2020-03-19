<?php

// start the session
session_start();

function login($name, $pass) { // datas provided by user
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
        // if nothing  correspon
        return false;
    }

    return false;
}

// function to logout
function logout() {
    // to logout user delete coockie with given expiration date in past

    unset($_SESSION['user']);

    // to destroy completely session data ($_SESSION)
    // session_destroy();
}

// function to know if user logged
function isLoggedIn() {
    if (isset($_SESSION['user'])){
        return true;
    }

    return false;
}

// retrieve user regarding his ID
function getUser($id) {
    require("data/users.php");

    foreach($users as $user){
        if ($user['name'] === $id){
            return $user;
        }
    }

    return null;
}

// retrieve author from message
function getMe() {
    return getUser($_SESSION['user']['name']);
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

// return list of messages
function getMessages() {
    
    // read file content and return it in string format
    // here,this string content jso data
    $fileContent = file_get_contents("data/messages.mock.json");
    // convert json in array
    $messagesArray = json_decode($fileContent, true);
    return $messagesArray;
}

function getMessage($messageId) {
    
}

function addMessage($message, $date, $user) {

    // generate uniq key
    // uniqid return a uniq string
    $randomKey = "mock" . uniqid();

    // set datas in array
    $newMessage = [
        "body" => strip_tags($message),
        "date" => $date,
        "user" => $user,
        "comments" => []
    ];

    // retrieve old messages
    $previousMessages = getMessages();
    $previousMessages[$randomKey] = $newMessage;

    // convert our array in JSON
    $previousMessagesJson = json_encode($previousMessages, JSON_PRETTY_PRINT);

    // write json messages file
    file_put_contents("data/messages.json", $previousMessagesJson);
}

function addCommentToMessage($messageId, $comment, $date, $user) {
    
}


// HR = Human Readable
function displayHRDate($timestamp) {
    setlocale(LC_TIME, 'fr_FR.utf8');
    return strftime('le %e %B %Y à %H:%M', $timestamp);
}