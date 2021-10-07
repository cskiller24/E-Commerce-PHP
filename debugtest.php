<?php
session_start();

var_dump($_SESSION);

function lol($name, $section)
{
  return "MALE";
}

$x = lol("JON", "MIKE");

echo $x;

?>
