<?php

$p = $_POST;

require "inc/functions.php";

if (!isLoggedIn()) {
    redirect('login', ['warning' => 'unauthorized']);
}

$message = getMessage($_GET['messageid']);

if (isset($p['message'])) {
    addCommentToMessage($_GET['messageid'], $p['message'], time(), getMe());
    redirect('list');
}

$noLink = true;

require "inc/header.tpl";
require "pages/commentadd.php";
require "inc/footer.tpl";

?>