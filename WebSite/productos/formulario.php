
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Productos</title>
  <link href="../css/uni-form.css" media="screen" rel="stylesheet"/>
    <link href="../css/formulario.css" media="screen" rel="stylesheet"/>
     <link href="../css/dark.uni-form.css" title="Default Style" media="screen" rel="stylesheet"/>   
 <!--  -->
  <link href="../css/estiloFormularios.css"  media="screen" rel="stylesheet"/>   
 

</head>

<body  style="background-image: url(../images/pattern.png), url(../images/6.jpg);">
    
    <?php
       
    error_reporting(0); 
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
    
    <?php    
    include 'includes/cabecera.php';?>
    <form action="../Clases/Subir.php"  method="POST" enctype="multipart/form-data" name="form1" id="form1" class="uniForm">
         
      <fieldset>
          <strong> <h3 style="font-weight: bold">Crear Productos</h3></strong>
        
        <div class="ctrlHolder">
          <label for="txtReferencia"><em>*</em> Referencia</label>
          <input name="txtReferencia" id="txtReferencia"  size="35" maxlength="30" type="text" class="textInput required"/>
          <p class="formHint">Dato Necesario</p>
        </div>
        
        <div class="ctrlHolder">
          <label for="fleImagen"><em>*</em> Imagen</label>
          <input name="fleImagen" id="fleImagen"   class="fileUpload" type="file"/>
          <p class="formHint">Imagen del producto</p>
        </div>
      
        <div class="ctrlHolder">
          <label for="lstTipo"><em>*</em> Tipo</label>
          <select name="lstTipo" id="lstTipo">
          <option value="ramos" selected="selected">Ramos</option>
          <option value="accesorios">Accesorios</option>
      </select>
          <p class="formHint"></p>
        </div>
        
        <div class="ctrlHolder">
          <label for="txtPrecio"><em>*</em> Precio</label>
          <input name="txtPrecio" id="txtPrecio"  size="35" maxlength="50" type="text" class="textInput required"/>
          <p class="formHint">El valor del Producto para el cliente</p>
        </div>
          
           <div class="ctrlHolder">
          <label for="txtNombre"><em>*</em> Nombre</label>
          <input name="txtNombre" id="txtNombre"  size="35" maxlength="50" type="text" class="textInput required"/>
          <p class="formHint">..</p>
        </div>
           <div class="ctrlHolder">
               <label for="txtDescripcion"><em>*</em> Descripci&oacute;n</label>
          <textarea name="txtDescripcion" id="txtDescripcion" cols="45" rows="5"></textarea>
          <p class="formHint">..</p>
        </div>
          
       

      

      </fieldset>
      
      <div class="buttonHolder">
          <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button  align ="left" type="button" >Regresar</button> </a>
                  <br></br> <a href="../index.php"><button  align ="left" type="button" >Inicio</button> </a>
        <button type="submit" name="button" id="button" value="Enviar" class="primaryAction">Enviar</button>
          <input type="hidden" name="MM_insert" value="form1" />
      </div>

    
 

  
</form>
    
   <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/uni-form-validation.jquery.js" charset="utf-8"></script>
    
    <script type="text/javascript" src="../js/es.js" charset="utf-8"></script>
    <script>
      $(function(){
        $('form.uniForm').uniform({
          prevent_submit : true
        });
      });
    </script>
    <center> <?php include 'includes/pie.php';?> </center>  
</body>
</html>