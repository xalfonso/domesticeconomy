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
            	$saldo = $_REQUEST['inp_saldo'];
            	$fecha = $_REQUEST['id_datetime_local'];
            	$tipo = $_REQUEST['inp_tipo'];
            	$cant = $_REQUEST['inp_cant'];
            	
            	if(isset($_REQUEST['elem_nombre'])) #Si existe el nombre, entonces existen las demas variables
            	{
            	  $nombres_elemt = $_REQUEST['elem_nombre'];
            	  $PU_elem = $_REQUEST['elem_PU'];
            	  $cant_elem = $_REQUEST['elem_cant'];
            	  $PT_elem = $_REQUEST['elem_PT'];  
                  
            	  $cant = count($nombres_elemt);
            	  
            	  /**
            	   * Esto es una muestra de como se pueden tomar los datos que tengo en la tablas, en este caso se utiliza arreglos
            	   */
            	  for($i = 0; $i < $cant; $i++)
            	  {
            	  	echo $nombres_elemt[$i];
            	  	echo $PU_elem[$i];
            	  	echo $cant_elem[$i];
            	  	echo $PT_elem[$i];
            	  	echo "<br/>";
            	  }
            	
            	}
           
            	#valido que las variables no esten vacias, se puede realizar tambi�n una validaci�n m�s completa
            	if(empty($nombre)==False && empty($descrip)==False && empty($saldo)==False && empty($fecha)==False && empty($tipo)==False && empty($cant)==False)
            	{
            		$saldo1 = (float)$saldo;
            		$cant1 = (int)$cant;
            		echo $saldo1;
            		echo $cant1;
            		
            	//if( ( (is_float($saldo1)) || (is_int($saldo1)) )  && ( ((is_float($cant1)) || (is_int($cant1)) ) )  )
            		/*if(is_nan($saldo)==False)
              		{   
                       include 'msg_info.php';
                       
            		}
            		else
            		{
            			include 'msg_error.php';
            			echo "entro";
            		}
            	   */
            		
            		/**
            		 *  Aqu� incluyo las operaciones para insertar en la base de datos
            		 */
            		include 'msg_info.php';
            		
            	}
            	else 
            	{
            		include 'msg_error.php';
            	}
            }        
                    
                       
               #Esta es el area para incluir donde el usuario est� en cada momento
               //Esta es una forma de utilizar el patron de dise�o 'Composite view'
		       require('subview_insertGasto.php');
		       
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
