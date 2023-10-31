<?php

$password = "admin";

$hash = password_hash($password, PASSWORD_DEFAULT);

$passwordHash=password_verify($password, $hash);
var_dump($hash);

//<input class="border border-gray-300 rounded-md p-1" type="text" name="password" placeholder="password"