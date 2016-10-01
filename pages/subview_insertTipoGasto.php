<form id="formInsertarTipoIngreso" method="post" action="">
<fieldset>
<legend>Insertar Tipo de Gasto</legend>
   <label for="inp_nombre"> Nombre </label> <br />
   <input type="text" size="40" name="inp_nombre" id="inp_nombre" maxlength="30" alt="input para el nombre" required tabindex="1" title="Debe insertar el nombre del tipo Gasto" placeholder="nombre" list="sugerencias" accesskey="t"/> <br />
   <datalist id="sugerencias">
   <?php
      require ('../mod_contr/clases.php');
	  $listTiposGasto = TipoGasto::obtenerTodos();
	  $cantidad = count($listTiposGasto);
	  for($i = 0; $i < $cantidad; $i++)
	  {
        $valor = "".$listTiposGasto[$i]->obtenerNombre();
		echo "<option value=$valor>$valor</option>";  
		 
	  }
   ?>
   </datalist><br />
   
     <label for="text_descripcion"> Descripci&oacute;n </label> <br />
  <textarea name="text_descripcion" id="text_descripcion" cols="30" rows="10" tabindex="2" alt="input para la descripcion" title="Debe insertar una descripción del tipo Gasto" placeholder="descripción" accesskey="d" onKeyPress="return valLimitaB(event,this,200)"></textarea><br />
   
  
   <span class="spanBoton"><input type="submit" name="enviar" value="Enviar" class="botonIsquierdo" accesskey="e"/>
   <input type="reset" name="limpiar" value="Limpiar" class="botonDerecho" accesskey="l"/></span>
</fieldset>
  </form>