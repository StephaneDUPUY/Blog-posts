<?php

$p = $_POST;

require "inc/functions.php";


if (!isLoggedIn()) {
    redirect('login', ['warning' => 'unauthorized']);
}

if (isset($p['message'])) {
    addMessage($p['message'], time(), getMe());
    redirect('list');
}

require "inc/header.tpl";
require "pages/messageadd.php";
require "inc/footer.tpl";

?>