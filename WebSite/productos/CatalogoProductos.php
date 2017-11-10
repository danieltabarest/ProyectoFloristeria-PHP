<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Galeria</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
         <link rel="shortcut icon" href="../images/icono.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="../css/style_1.css" type="text/css" media="screen"/>
		<script src="../js/cufon-yui.js" type="text/javascript"></script>
		<script src="../js/Quicksand_Book_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1,h2');
		</script>
                
        <style type="text/css">
			h1.title{
				position:absolute;
				right:20px;
				top:10px;
				font-weight:normal;
				text-transform:uppercase;
				font-size:56px;
				color:#fff;
				background:transparent url(bg.png) repeat top left;
				padding:0px 15px 10px 15px;
			}
			h1.title span{
				font-size:14px;
				display:block;
}
			span.reference{
				font-family:Arial;
				position:fixed;
				right:10px;
				bottom:10px;
				font-size:10px;
			}
			span.reference a{
				color:#333;
				text-transform:uppercase;
				text-decoration:none;
				margin-left:20px;
			}
                        
 .browse{ margin: 0; position: fixed; top: 128px; 
          right: 28px; width: 84px;
          padding: 28px 28px 14px 28px; font-size: 12px;
          background: #97a2b0;
          border-radius:        12px;
         -webkit-border-radius: 12px;
         -moz-border-radius:    12px;
         -o-border-radius:      12px;
         -khtml-border-radius:  12px;
       }
  .browse h2{ font-size: 12px; margin: 0 0 14px 0; }
  .browse ul{ margin: 0; padding: 0; }
    .browse li{ margin: 0 0 14px 0; padding: 0; list-style: none; }
    
    .header{
	font-family:'Arial Narrow', Arial, sans-serif;
	line-height: 24px;
	font-size: 11px;
	background: #000;
	opacity: 0.9;
	text-transform: uppercase;
	z-index: 9999;
	position: absolute;
        width: 100%;
	-moz-box-shadow: 1px 0px 2px #000;
	-webkit-box-shadow: 1px 0px 2px #000;
	box-shadow: 1px 0px 2px #000;
}
.header a{
	padding: 0px 10px;
	letter-spacing: 1px;
	color: #ddd;
	display: block;
	float: left;
}
.header a:hover{
	color: #fff;
}
.header span.right{
	float: right;
}
.header span.right a{
	float: none;
	display: inline;
}
		</style>
    </head>
<?php
   
require_once("../Conexion/con_imag.php");  
?>
<?php
error_reporting(0); 
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
$i=0;
do { 
   $referncias[$i]=$row_catalogo_imag['Referencia']; 
   $imagen[$i]=$row_catalogo_imag['Imagen'];
   //$imagen1[$i]=$row_catalogo_imag['Imagen'];
   $Tipo[$i]=$row_catalogo_imag['Tipo']; 
   $precio[$i]=$row_catalogo_imag['Precio']; 
   $nombre[$i]=$row_catalogo_imag['Nombre'];
   $descripcion[$i]=$row_catalogo_imag['Descripcion']; 
   $imagen1[$i]=$imagen[$i];
    $i++;
  } while ($row_catalogo_imag = mysql_fetch_assoc($catalogo_imag));

?>
    
    <body>
       
        <br/>
		<h1 class="title">Catalogo <span>De productos</span></h1>


		<div class="pg_content">
			<div id="pg_title" class="pg_title">
                            <h1 style="display:block;top:25px;">Tradicional</h1>
                              <?php foreach ($nombre as $value) {
            echo '<h1>'.$value.'</h1>';
            //echo number_format($value, 2, ',', '.').'</td></tr>';
           
}  ?>
       
				
				
			</div>
			<div id="pg_preview">
                            <img class="pg_thumb" style="display: block;" src="../images/large/4.jpg" alt="images/large/4.jpg" width="360px" height="300px" />
                            <?php foreach ($imagen as $value) {
            echo '<img class="pg_thumb"  src="'.$value.'" alt="'.$value.'" width="360px" height="300px" />';
            //<?php echo $row_catalogo_imag['Imagen']; " 
         
}  ?>
                              
  
			</div>
			<div id="pg_desc1" class="pg_description">
				<div style="display:block;left:250px;">
					<h2>Descripcion</h2>
					<p>El Ramo tradicional de Rosas Rojas</p>
				</div>
				
                            <?php foreach ($descripcion as $value) {
            echo '<div><h2>Descripcion</h2><p>'.$value.'</p></div>';
            //echo number_format($value, 2, ',', '.').'</td></tr>';
           
}  ?>
				
				
				


			</div>
			<div id="pg_desc2" class="pg_description">
				<div style="display:block;left:250px;">
					<h2>Valor Normal:</h2>
					<p>70.000$ .</p>
				</div>
				  <?php foreach ($precio as $value) {
            echo '<div><h2>Valor Normal:</h2><p>'.$value.'</p></div>';
            //echo number_format($value, 2, ',', '.').'</td></tr>';
           
}  ?>
				
			</div>
		</div>


		<div id="thumbContainter">
			<div id="thumbScroller">
				<div class="container">
					<div class="content">
						<div><a href="#"><img src="../images/large/4.jpg" alt="" class="thumb" width="130" height="130"/></a></div>
					</div>
                                   
                                    
					<?php   foreach ($imagen1 as $value1) {
                                             ?><div class="content"><div><a href="#">
                                                 <?php echo '<img src="'.$value1.'"  class="thumb"   alt="" width="130" height="130" />';?>
                                                     </a></div>
                                             </div>
             <?php } ?>
                                    

					


				</div>
			</div>
		</div>
		<div id="overlay"></div>
                <div class="browse">
    <h3><b><font color=""> Configuraci&oacute;n</font></b></h3>
    <br/>
      <ul>
        <li><a href="grid_productos.php" >Editar</a> </li>
        <li><a href="formulario.php">Agregar</a></li>
        <li><a href="../index.php">Regresar</a> </li>
      </ul>
    </div>
        
   <?php 
  error_reporting(0);
     
  if(isset($_SESSION['id']))
{
      echo "<div class='browse'>
    <h3>Configuraci&oacute;n</h3>
    <br/>
      <ul>
        <li><a href='grid_productos.php' >Editar</a> </li>
        <li><a href='formulario.php'>Agregar</a></li>
        <li><a href='index.php'>Regresar</a> </li>
      </ul>
    </div>";
} 

?>
        <!-- The JavaScript -->
        
		<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			$(function() {
				//index of current item
				var current				= 0;
				//speeds / ease type for animations
				var fadeSpeed			= 400;
				var animSpeed			= 600;
				var easeType			= 'easeOutCirc';
				//caching
				var $thumbScroller		= $('#thumbScroller');
				var $scrollerContainer	= $thumbScroller.find('.container');
				var $scrollerContent	= $thumbScroller.find('.content');
				var $pg_title 			= $('#pg_title');
				var $pg_preview 		= $('#pg_preview');
				var $pg_desc1 			= $('#pg_desc1');
				var $pg_desc2 			= $('#pg_desc2');
				var $overlay			= $('#overlay');
				//number of items
				var scrollerContentCnt  = $scrollerContent.length;
				var sliderHeight		= $(window).height();
				//we will store the total height
				//of the scroller container in this variable
				var totalContent		= 0;
				//one items height
				var itemHeight			= 0;

				//First let's create the scrollable container,
				//after all its images are loaded
				var cnt		= 0;
				$thumbScroller.find('img').each(function(){
					var $img 	= $(this);
					$('<img/>').load(function(){
						++cnt;
						if(cnt == scrollerContentCnt){
							//one items height
							itemHeight = $thumbScroller.find('.content:first').height();
							buildScrollableItems();
							//show the scrollable container
							$thumbScroller.stop().animate({'left':'0px'},animSpeed);
						}
					}).attr('src',$img.attr('src'));
				});

				//when we click an item from the scrollable container
				//we want to display the items content
				//we use the index of the item in the scrollable container
				//to know which title / image / descriptions we will show
				$scrollerContent.bind('click',function(e){
					var $this 				= $(this);

					var idx 				= $this.index();
					//if we click on the one shown then return
					if(current==idx) return;

					//if the current image is enlarged,
					//then we will remove it but before
					//we animate it just like we would do with the thumb
					var $pg_large			= $('#pg_large');
					if($pg_large.length > 0){
						$pg_large.animate({'left':'450px','opacity':'0'},animSpeed,function(){
							$pg_large.remove();
						});
					}

					//get the current and clicked items elements
					var $currentTitle 		= $pg_title.find('h1:nth-child('+(current+1)+')');
					var $nextTitle 			= $pg_title.find('h1:nth-child('+(idx+1)+')');
					var $currentThumb		= $pg_preview.find('img.pg_thumb:eq('+current+')');
					var $nextThumb			= $pg_preview.find('img.pg_thumb:eq('+idx+')');
					var $currentDesc1 		= $pg_desc1.find('div:nth-child('+(current+1)+')');
					var $nextDesc1 			= $pg_desc1.find('div:nth-child('+(idx+1)+')');
					var $currentDesc2 		= $pg_desc2.find('div:nth-child('+(current+1)+')');
					var $nextDesc2 			= $pg_desc2.find('div:nth-child('+(idx+1)+')');

					//the new current is now the index of the clicked scrollable item
					current		 			= idx;

					//animate the current title up,
					//hide it, and animate the next one down
					$currentTitle.stop().animate({'top':'-50px'},animSpeed,function(){
						$(this).hide();
						$nextTitle.show().stop().animate({'top':'25px'},animSpeed);
					});

					//show the next image,
					//animate the current to the left and fade it out
					//so that the next gets visible
					$nextThumb.show();
					$currentThumb.stop().animate({'left': '350px','opacity':'0'},animSpeed,function(){
						$(this).hide().css({
							'left'		: '250px',
							'opacity'	: 1,
							'z-index'	: 1
						});
						$nextThumb.css({'z-index':9999});
					});

					//animate both current descriptions left / right and fade them out
					//fade in and animate the next ones right / left
					$currentDesc1.stop().animate({'left':'205px','opacity':'0'},animSpeed,function(){
						$(this).hide();
						$nextDesc1.show().stop().animate({'left':'250px','opacity':'1'},animSpeed);
					});
					$currentDesc2.stop().animate({'left':'295px','opacity':'0'},animSpeed,function(){
						$(this).hide();
						$nextDesc2.show().stop().animate({'left':'250px','opacity':'1'},animSpeed);
					});
					e.preventDefault();
				});

				//when we click a thumb, the thumb gets enlarged,
				//to the sizes of the large image (fixed values).
				//then we load the large image, and insert it after
				//the thumb. After that we hide the thumb so that
				//the large one gets displayed
				$pg_preview.find('.pg_thumb').bind('click',showLargeImage);

				//enlarges the thumb
				function showLargeImage(){
					//if theres a large one remove
					$('#pg_large').remove();
					var $thumb 		= $(this);
					$thumb.unbind('click');
					var large_src 	= $thumb.attr('alt');

					$overlay.fadeIn(200);
					//animate width to 600px,height to 500px
					$thumb.stop().animate({
						'width'	: '600px',
						'height': '500px'
					},500,function(){
						$('<img id="pg_large"/>').load(function(){
							var $largeImg = $(this);
							$largeImg.insertAfter($thumb).show();
							$thumb.hide().css({
								'left'		: '250px',
								'opacity'	: 1,
								'z-index'	: 1,
								'width'		: '360px',
								'height'	: '300px'
							});
							//when we click the large image
							//we revert the animation
							$largeImg.bind('click',function(){
								$thumb.show();
								$overlay.fadeOut(200);
								$(this).stop().animate({
									'width'	: '600px',
									'height': '500px'
								},500,function(){
									$(this).remove();
									$thumb.css({'z-index'	: 9999});
									//bind again the click event
									$thumb.bind('click',showLargeImage);
								});

							});
						}).attr('src',large_src);
					});
				}

				//resize window event:
				//the scroller container needs to update
				//its height based on the new windows height
				$(window).resize(function() {
					var w_h			= $(window).height();
					$thumbScroller.css('height',w_h);
					sliderHeight	= w_h;
				});

				//create the scrollable container
				//taken from Manos :
				//http://manos.malihu.gr/jquery-thumbnail-scroller
				function buildScrollableItems(){
					totalContent = (scrollerContentCnt-1)*itemHeight;
					$thumbScroller.css('height',sliderHeight)
					.mousemove(function(e){
						if($scrollerContainer.height()>sliderHeight){
							var mouseCoords		= (e.pageY - this.offsetTop);
							var mousePercentY	= mouseCoords/sliderHeight;
							var destY			= -(((totalContent-(sliderHeight-itemHeight))-sliderHeight)*(mousePercentY));
							var thePosA			= mouseCoords-destY;
							var thePosB			= destY-mouseCoords;
							if(mouseCoords==destY)
								$scrollerContainer.stop();
							else if(mouseCoords>destY)
								$scrollerContainer.stop()
							.animate({
								top: -thePosA
							},
							animSpeed,
							easeType);
							else if(mouseCoords<destY)
								$scrollerContainer.stop()
							.animate({
								top: thePosB
							},
							animSpeed,
							easeType);
						}
					}).find('.thumb')
					.fadeTo(fadeSpeed, 0.6)
					.hover(
					function(){ //mouse over
						$(this).fadeTo(fadeSpeed, 1);
					},
					function(){ //mouse out
						$(this).fadeTo(fadeSpeed, 0.6);
					}
				);
				}
			});
		</script>
                
    </body>
</html>

