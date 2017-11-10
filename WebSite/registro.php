
  <?php    
    //error_reporting(0);
    $color1="<body style='background-image:url(images/6.jpg)'>"; 
   
require_once("Conexion/conexion.php");

if(isset($_POST['registro']))//Vallidamos que el formulario fue enviado
{    /*Validamos que todos los campos esten llenos correctamente*/
    if(($_POST['nick'] != '') && ($_POST['mail'] != '') && ($_POST['pass'] != '') && ($_POST['conf_pass'] != ''))
    {
        if($_POST['pass'] != $_POST['conf_pass'])
        {
           

                      echo '<h5><font size=18 color="red"><br />Las contrase&ntilde;as no coinciden</font></h5>';
        header("Refresh: 3; URL=index.php");
      echo  $color1;
                
          


header("Refresh: 5; URL=index.php");
        }
        
        
        else
        {
            $date= "Manrique" ;
           $nick= limpiar($_POST['nick']);
            $mail= limpiar($_POST['mail']);
            $pass= md5(md5(limpiar($_POST['pass'])));
            $ipuser= $_SERVER['REMOTE_ADDR'];  
            $telef="2111212";
            $genero="Men";

            $b_user= mysql_query("SELECT nick FROM usuarios WHERE nick='$nick'");
            if($user=@mysql_fetch_array($b_user))
            {
                echo '<h5><font size=18 color="red"><br />El nombre de usuario o el email ya esta registrado.</font></h5>';
        header("Refresh: 3; URL=index.php");
      echo  $color1;
               
                mysql_free_result($b_user); //liberamos la memoria del query a la db
            }
            else
            {
                if(validar_email($_POST['mail']))
                {
                    mysql_query("call SPIngresarUser('$nick','$pass','$mail','$telef','$date','$genero','$ipuser');");
                 echo '<h5><font size=18 color="red"><br />Te has registrado Correctamente, ahora podras iniciar sesi&oacute;n como usuario registrado..</font></h5>';
        header("Refresh: 3; URL=index.php");
      echo  $color1;
        
                }
                else 
                {
                    
                    echo '<h5><font size=18 color="red"><br />El email no es valido.</font></h5>';
        header("Refresh: 3; URL=index.php");
      echo  $color1;
                }
            }
        }
    }
    else
    {
        echo '<h5><font size=18 color="red"><br />Deberas llenar todos los campos.</font></h5>';
        header("Refresh: 3; URL=index.php");
      echo  $color1;
    }


	
}

?>