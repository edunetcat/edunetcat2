<?php

/**
 * Mètode per fer logout
 *
 * @author : Biel <bielbcm@gmail.com>
 *        
 */

session_start();

unset($_SESSION['isLogged']);
unset($_SESSION['authKey']);

header("Location: /");
die(); 
