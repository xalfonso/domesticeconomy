<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Econom&iacute;a Dom&eacute;stica</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<script src="../scrip/util.js" type="text/javascript"></script>
<script src="../scrip/val.js" type="text/javascript"></script>
</head>

<body onLoad="comenzarReloj()">
<div id="sec_contenido">
 <div id="Sup_header"></div>
 <header>
     <div id="sec_img">
        <?php
            require('img_gome.php');
	     ?>
     </div>
     <div id="sec_titu">
       <span class="texto1"> Economía Doméstica</span><br /><span class="texto2">Cuentas Claras ...</span>
     </div>
    
 </header>
  <div id="if_header" class="inf_adicional">
       <div id="reloj">
         
       </div>
  </div>
  
  <div id="contenido_central">
    
      <div id="sec_izquierda">
      <nav>
       <?php
           #Aqu� se est� incluyendo el menu de la p�gina
           //Esta es una forma de utilizar el patron de dise�o 'Composite view'
		   require('menu.php');
	   ?> 
      </nav>
      </div>
      
      <div id="sec_principal">
          <div id="subview">
            <?php
               
           /*
            * Esto es una forma de incluir en un mismo archivo la toma de los datos y el procesamiento
            */
            if(isset($_REQUEST['enviar']))  #Aqu� verifico si la variable del boton existe, para en ese caso procesarlo
            {
            
            	$nombre =  $_REQUEST['inp_nombre'];
            	$descrip = $_REQUEST['text_descripcion'];
                       
            	#valido que las variables no esten vacias, se puede realizar tambi�n una validaci�n m�s completa
            	if(empty($nombre)==False && empty($descrip)==False)
            	{
            	            		
            	/**
            	 *  Aqu� incluyo las operaciones para insertar en la base de datos
            	 */
            	
				    include '../mod_contr/clases.php';
					$nuevoTipoIngreso = new TipoIngreso($nombre,$descrip);
					
					try
					{
						$nuevoTipoIngreso->salvar();
						include 'msg_info.php';
					}
					catch(Exception $e)
					{
					  include 'msg_error.php';	
					}
									
            	}
            	else 
            	{
            		include 'msg_error.php';
            	}
            }        
                    
              
               //Esta es una forma de utilizar el patron de dise�o 'Composite view'
		       require('subview_insertTipoIngreso.php');
		       
	        ?>
          </div>
      </div>
  </div>
  
  <footer>
    <p></p>
    <address>
     
    </address>
  </footer>
</div>
</body>
</html>
