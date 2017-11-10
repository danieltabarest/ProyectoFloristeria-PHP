<?php

include("Conexion/conexion.php");
    $color1="<body style='background-image:url(images/6.jpg)'>"; 
if(isset($_POST['login']))
{
    $nick= $_POST['nick'];
    $pass= md5(md5($_POST['pass']));
    $b_user=mysql_query("SELECT * FROM tblusuarios WHERE nick='$nick'");
    $ses = @mysql_fetch_assoc($b_user) ;
    if(@mysql_num_rows($b_user))
    {
        if($ses['pass'] == $pass)
        {
            $_SESSION['idUsuario']=        $ses["idUsuario"];
         
            $_SESSION['nick']=    $ses["nick"];
            $_SESSION['mail']=    $ses["mail"];
            $_SESSION['ip']=        $ses["ip"];
         
        }
        else
        {
           
            echo '<h5><font size=18 color="red"><br />Nombre de usuario o Contrase&ntilde;a incorrecta.</font></h5>';

            echo   header("Refresh: 3; URL=index.php");
  
      echo  $color1;
         
            
        }
    }
    else
    {
                
 
      echo  $color1;
       echo     ' <h5><font size=18 color="red"><br />Nombre de Usuario o contrase&ntilde;a incorrecta..</font></h5>';
        echo  header("Refresh: 3; URL=index.php");
    }
}

if(isset($_GET['modo']) == 'desconectar')
{
    session_destroy();
    echo '<meta http-equiv="Refresh" content="2;url=index.php"> ';
    exit ('<h5><font size=18 color="red"><br />Te has desconectado del sistema.</font></h5>');
}
if(isset($_SESSION['idUsuario']))
{
  
    echo '<h5><font text-align:center size=15 color="red">Bienvenido</font></h5><div style="font-size:58">'. $_SESSION['nick'].'</div><br /></div>';;
    echo '<h5><font  text-align:center size=15 color="red">Fecha registro:</font></h5><div style="font-size:58">'. date("d-m-Y - H:i") .'</div> <br />';
    echo '<h5><font   text-align:center size=15 color="red">Email</font></h5><div style="font-size:58">'. $_SESSION['mail'] .'</div> <br />';
    echo '<h5><font  text-align:center size=15 color="red">IP:</font></h5><div style="font-size:58">'. $_SESSION['ip'] . '</div><br />';
    echo '</br> <a href="login.php?modo=desconectar"><button  align ="left" type="button" >Salir</button> </a>';

    echo  ' <br></br> <a href="index.php"><button  align ="left" type="button" >Inicio</button> </a>';
        echo   header("Refresh: 25; URL=index.php");
  
      echo  $color1;

}

else
{
?>

   
<?php
}
?>
