<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Econom&iacute;a Dom&eacute;stica</title>
<link href="../css/estilo.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<script src="../scrip/util.js" type="text/javascript"></script>
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
       <span class="texto1"> Econom√≠a Dom√©stica</span><br /><span class="texto2">Cuentas Claras ...</span>
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
           #AquÌ se est· incluyendo el menu de la p·gina
           //Esta es una forma de utilizar el patron de diseÒo 'Composite view'
		   require('menu.php');
	   ?> 
      </nav>
      </div>
      
      <div id="sec_principal">
          <div id="subview">
            <?php
               #Esta es el area para incluir donde el usuario estÈ en cada momento
               //Esta es una forma de utilizar el patron de diseÒo 'Composite view'
		       require('inicio.php');
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
