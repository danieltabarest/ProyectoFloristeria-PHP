

        <script type="text/javascript" src="includes/jquery.fixedMenu.js"></script>
        <link rel="stylesheet" type="text/css" href="includes/fixedMenu_style2.css" />
        <script>
        $('document').ready(function(){
            $('.menu').fixedMenu();
        });
        </script>
   <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="login.php">
                <fieldset class="textbox">
                    <legend>
                        Autenticaci&oacute;n
                    </legend>
                    <br/>
            	<label class="username">
                <span>Nick</span>
                <input id="username" name="nick" value="" type="text" autocomplete="on" placeholder="Username">
                </label>
                <label class="password">
                <span>Password</span>
                <input id="password" name="pass" value="" type="password" placeholder="Password">
                </label>
                    <input type="submit" name="login" value="Ingresar" />
               
                </fieldset>
          </form>
</div>
 

 <div id="Registro-box" class="login-popup">
        <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="registro.php">
                <fieldset class="textbox">
                    <legend>
                        Registro
                    </legend>
                    <br/>
            	<label class="username">
                <span>Nick</span>
                <input id="username" name="nick" value="" type="text"  >
                </label>
                <label class="password">
                <span>E-Mail</span>
                <input id="mail" name="mail" value="" type="text" >
                </label>  
                    
                <label class="password">
                    <span>Contrase&ntilde;a</span>
                <input id="password" name="pass" value="" type="password" >
                </label>
                    
                     <label class="password">
                <span>Confirmar Contrase&ntilde;a</span>
                <input id="password1" name="conf_pass" value="" type="password" >
                </label>
                    <input type="submit" name="registro" value="Registrar" />
                    <tr><td>      
 </td></tr>
                </fieldset>
          </form>
</div>

    <div class="menu">
        <ul>
            <li>
                <a href="index.php">Inicio<span class="arrow"></span></a>
                
                
            </li>
            <li>
                <a href="nosotros.php">Nosotros<span class="arrow"></span></a>
                
                
            </li>
            <li>
                <a href="servicios.php">Servicios<span class="arrow"></span></a>
               
            </li>
          
            <li>
                <a href="contacto.php">Contacto<span class="arrow"></span></a>
             
            </li>
            <li>
                <a href="#login-box" class="login-window">Ingresar<span class="arrow"></span></a>
               
            </li>
             <li>
                <a href="#Registro-box" class="login-window">Registro<span class="arrow"></span></a>
               
            </li>
        </ul>
    </div>
  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
	$('a.login-window').click(function() {
		
                //Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border see css style
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(600);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(600 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
        </script>
        
        