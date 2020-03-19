<?php

require "inc/functions.php";

if (!isLoggedIn()) {
    redirect('login', ['warning' => 'unauthorized']);
}

$messages = getMessages();

require "inc/header.tpl";
require "pages/messagelist.php";
require "inc/footer.tpl";