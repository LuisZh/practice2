<?php
include('./public/session.php');
//destroy the sessions saved before.

session_destroy();

header('Location: ./index.html');

?>