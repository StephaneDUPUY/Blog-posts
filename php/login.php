<?php

$p = $_POST;

require "inc/functions.php";

if (!empty($p)) {
    if (isset($p['username']) && isset($p['password']) && login($p['username'], $p['password'])) {
        redirect('list');
    } else {
        redirect('login', ['error' => 'nologin']);
    }
}

require "inc/header.tpl";
require "pages/connectform.php";
require "inc/footer.tpl";

?>