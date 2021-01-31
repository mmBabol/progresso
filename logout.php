<?php
#!/usr/bin/php
require "./header.phtml";

session_start();
session_destroy();
header('Location: index.phtml');
exit;
?>
