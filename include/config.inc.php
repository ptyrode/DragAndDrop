<?php

// Se connecte à la base
$lien = mysql_connect("localhost:8888", "root", "root");
mysql_set_charset('UTF8');
mysql_select_db("dragdrop", $lien);
?>