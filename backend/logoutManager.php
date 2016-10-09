<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);

// Main cookie
unset($_COOKIE['signed_in_id']);
setcookie('signed_in_id', '', time() - 3600, '/');
unset($_COOKIE['email']);
setcookie('email', '', time() - 3600, '/');

// Forum cookie
unset($_COOKIE['Vanilla']);
setcookie('Vanilla', '', time() - 3600, '/');
unset($_COOKIE['Vanilla-Vv']);
setcookie('Vanilla-Vv', '', time() - 3600, '/');
?>
