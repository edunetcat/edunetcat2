<?php

session_start();

unset($_SESSION['isLogged']);
unset($_SESSION['authKey']);

header("Location: /");
die();