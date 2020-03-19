<?php

require "inc/functions.php";

logout();

redirect('login', ['info' => 'loggedout']);

?>