
<?php require_once('../Conexion/con_imag.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$insertGoTo="";

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$tipo_prod = $_POST["lstTipo"];

//Guardar imagen
	if(is_uploaded_file($_FILES['fleImagen']['tmp_name'])) { // verifica haya sido cargado el archivo
		$ruta= "../images/$tipo_prod/".$_FILES['fleImagen']['name'];
		move_uploaded_file($_FILES['fleImagen']['tmp_name'], $ruta);
                $ruta1= "../images/$tipo_prod/".$_FILES['fleImagen']['name'];
	}
	
  $insertSQL = sprintf("update  catalogo set Referencia=%s, Imagen=%s, Tipo=%s, Precio=%s, Nombre=%s, Descripcion=%s where referencia=%s",
                       GetSQLValueString($_POST['txtReferencia'], "int"),
                       GetSQLValueString($ruta1, "text"),
                       GetSQLValueString($_POST['lstTipo'], "text"),
                       GetSQLValueString($_POST['txtPrecio'], "double"),
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtDescripcion'], "text"),
                       GetSQLValueString($_POST['txtReferencia'], "int"));

  mysql_select_db($database_con_imag, $con_imag);
  
if(mysql_query($insertSQL, $con_imag)){
   $insertGoTo = "Ok"; 
    
} else{
     $insertGoTo = "Error"; 
}

  
  /*if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }*/
  header("Location: ../productos/grid_productos.php?response=".$insertGoTo."");
  
}
?>
