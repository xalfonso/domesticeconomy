<form id="formInsertarIngreso" method="post" action="insertIngreso.php">
<fieldset>
<legend>Insertar Ingreso</legend>
   <label for="inp_nombre"> Nombre </label> <br />
   <input type="text" size="40" name="inp_nombre" id="inp_nombre" maxlength="30" alt="input para el nombre" required tabindex="1" title="Debe insertar el nombre del Ingreso" placeholder="nombre del ingreso" list="sugerencias" accesskey="n"/> <br />
   <datalist id="sugerencias">
      <option value="Safari"> <!-- --> </option>
      <option value="Internet Explorer"></option>
      <option value="Opera"></option>
      <option value="Firefox"></option>
   </datalist><br />
   
     <label for="text_descripcion"> Descripci&oacute;n </label> <br />
  <textarea name="text_descripcion" id="text_descripcion" cols="30" rows="10" tabindex="2" alt="input para la descripcion" title="Debe insertar una descripción del Ingreso" placeholder="descripción del ingreso" accesskey="d" onKeyPress="return valLimitaB(event,this,400)"></textarea><br />
   
    <label for="inp_saldo"> Saldo Total </label> <br />
  <input type="text" size="34" name="inp_saldo" id="inp_saldo" maxlength="10" alt="input para el saldo" tabindex="3" title="Debe insertar el saldo total del ingreso" required placeholder="0.00" accesskey="s"/><label> CUP </label> <br />

   <label for="inp_fecha">Fecha</label> <br />
 <input type="date" id="inp_fecha" name="id_datetime_local" tabindex="4" required title="Debe insertar la fecha del ingreso" alt="input para la fecha" accesskey="f"/><br />
 
   
  <label for="inp_tipo">Tipo de Ingreso</label> <br />
	 <select name="inp_tipo" id="inp_tipo" tabindex="5" title="Seleccione el tipo del ingreso" accesskey="t">
          <option value="1" selected="selected">Salario UCI</option>
		  <option value="2">Salario EscuelaTIC</option>
		  <!-- Aquí va el código php para rellenar los tipos de ingresos-->
   </select>  <br /> <br />
  
   <span class="spanBoton"><input type="submit" name="enviar" value="Enviar" class="botonIsquierdo" accesskey="e"/>
   <input type="reset" name="limpiar" value="Limpiar" class="botonDerecho" accesskey="l"/></span>
</fieldset>
  </form>