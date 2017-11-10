
<?php 
require_once("../Conexion/con_imag.php"); ?>
<?php
error_reporting(0); 
$maxRows_catalogo_imag = 10;
$pageNum_catalogo_imag = 0;
if (isset($_GET['pageNum_catalogo_imag'])) {
  $pageNum_catalogo_imag = $_GET['pageNum_catalogo_imag'];
}
$startRow_catalogo_imag = $pageNum_catalogo_imag * $maxRows_catalogo_imag;

mysql_select_db($database_con_imag, $con_imag);
$query_catalogo_imag = "SELECT * FROM catalogo";
$query_limit_catalogo_imag = sprintf("%s LIMIT %d, %d", $query_catalogo_imag, $startRow_catalogo_imag, $maxRows_catalogo_imag);
$catalogo_imag = mysql_query($query_limit_catalogo_imag, $con_imag) or die(mysql_error());
$row_catalogo_imag = mysql_fetch_assoc($catalogo_imag);

if (isset($_GET['totalRows_catalogo_imag'])) {
  $totalRows_catalogo_imag = $_GET['totalRows_catalogo_imag'];
} else {
  $all_catalogo_imag = mysql_query($query_catalogo_imag);
  $totalRows_catalogo_imag = mysql_num_rows($all_catalogo_imag);
}
$totalPages_catalogo_imag = ceil($totalRows_catalogo_imag/$maxRows_catalogo_imag)-1;

 
    $respuesta=$_GET['response'];
    if ($respuesta=="Error"){
      $respuesta="Error en el Proceso, Verifique la informacion";  
      echo '<script>
window.alert("Error en el Proceso, Verifique la informacion")          
</script>';
        
    }else{
      if ($respuesta=="Ok"){
      $respuesta="Transaccion Exitosa";  
        echo '<script>
window.alert("Transaccion Exitosa")          
</script>';
    }  
        
    }
    
    
?>


<link rel="stylesheet" href="../css/style_2.css" />
<link rel="stylesheet" href="../css/Zoom.css" />
<body style="background-image: url(../images/pattern.png), url(../images/6.jpg);">
  <?php include 'includes/cabecera.php';?>
    
      <h1>Daguvoel Floristeria <span>Orgullosamente Colombianos</span></h1>
      <div class="contenedortabla">
          <fieldset>
          <strong> <h3 style="font-weight: bold;font-family: sans-serif;">Editar Productos</h3></strong>
          </fieldset>
	<div id="tablewrapper">
		<div id="tableheader">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<div>Registros <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        		<div><a href="javascript:sorter.reset()">Actualizar</a></div>
        	</span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>
                    <th class="nosort"><h3>ID</h3></th>
                    <th><h3>Nombre</h3></th>
                    <th><h3>Tipo</h3></th>
                    <th><h3>Precio</h3></th>
                    <th><h3>Cantidad</h3></th>
                    <th><h3>Imagen</h3></th>
                    <th><h3>Editar</h3></th>
                 
                </tr>
            </thead>
            <tbody>
              <?php do { ?>
    <tr>
      <td><?php echo $row_catalogo_imag['Referencia']; ?></td>
      <td><?php echo $row_catalogo_imag['Nombre']; ?></td>
     <td><?php echo $row_catalogo_imag['Tipo']; ?></td>
      <td><?php echo $row_catalogo_imag['Precio']; ?></td>
      
      <td><?php echo $row_catalogo_imag['Descripcion']; ?></td>
      <td align="center"><a class="imagen-zoom"><img src="<?php echo $row_catalogo_imag['Imagen']; ?>"  width="40" height="40"/><span><?php echo $row_catalogo_imag['Nombre']; ?><img src="<?php echo $row_catalogo_imag['Imagen']; ?>"  width="120" height="120"/></span></a></td>
      <td align="center"><a href="editar.php?id=<?php echo $row_catalogo_imag['Referencia']; ?>" ><img src="../images/Edit.png" alt="Editar" title="Editar" /></a></td>

    </tr>
    <?php } while ($row_catalogo_imag = mysql_fetch_assoc($catalogo_imag)); ?>
               
         
                
                   
            </tbody>
        </table>
        <div id="tablefooter">
          <div id="tablenav">
            	<div>
                    <img src="../images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="../images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="../images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="../images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter.showall()">Ver todos</a>
                </div>
            </div>
			<div id="tablelocation">
            	<div>
                    <select onchange="sorter.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span> <a href="../index.php"><button  align ="left" type="button" >Inicio</button> </a>   </span>
                  <span> <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button  align ="left" type="button" >Regresar</button> </a></span>
                    <span>Registros por pagina</span>
                </div>
                <div class="page">Pagina <span id="currentpage"></span> de <span id="totalpages"></span></div>
            </div>
        </div>
    </div>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript">
	var sorter = new TINY.table.sorter('sorter','table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:1,
		sortdir:1,
		//sum:[8],
		//avg:[6,7,8,9],
		columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
		init:true
	});
  </script>
      </div>
      <center> <?php include 'includes/pie.php';?> </center>  
</body>
</html>