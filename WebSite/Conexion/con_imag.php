<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_imag = "localhost";
$database_con_imag = "dbFloristeria";
$username_con_imag = "root";
$password_con_imag = "";
$con_imag = mysql_pconnect($hostname_con_imag, $username_con_imag, $password_con_imag) or trigger_error(mysql_error(),E_USER_ERROR); 
?>