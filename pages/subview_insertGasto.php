<form id="formInsertarGasto" method="post" action="insertGasto.php">
<fieldset>
<legend>Insertar Gasto</legend>
   <label for="inp_nombre"> Nombre </label> <br />
   <input type="text" size="40" name="inp_nombre" id="inp_nombre" maxlength="30" alt="input para el nombre" required tabindex="1" title="Debe insertar el nombre del Gasto" placeholder="nombre del gasto" list="sugerencias" accesskey="n"/> <br />
   <datalist id="sugerencias">
      <option value="Safari"> <!-- --> </option>
      <option value="Internet Explorer"></option>
      <option value="Opera"></option>
      <option value="Firefox"></option>
   </datalist><br />
   
  <label for="text_descripcion"> Descripci&oacute;n </label> <br />
  <textarea name="text_descripcion" id="text_descripcion" cols="30" rows="10" tabindex="2" alt="input para la descripcion" title="Debe insertar una descripción del gasto" placeholder="descripción del gasto" accesskey="d" onKeyPress="return valLimitaB(event,this,400)"></textarea><br />
   
    <label for="inp_saldo"> Saldo Total </label> <br />
  <input type="text" size="34" name="inp_saldo" id="inp_saldo" maxlength="10" alt="input para el saldo" tabindex="3" title="Debe insertar el saldo total del gasto" required placeholder="0.00" accesskey="s"/><label> CUP </label> <br />

  <label for="inp_cant"> Cantidad Elem. </label> <br />
  <input type="text" size="24" name="inp_cant" id="inp_cant" maxlength="5" alt="input para la cantidad" tabindex="4" title="Debe insertar el saldo total del gasto" required placeholder="0" accesskey="c"/>&nbsp;<a class="accionMenor" href="#secDiv" onclick="comenzarAgreElemGasto()">Definir elemento</a><br /><br />
  <a name="secDiv"></a>
  <div id="div_elemGasto">
  <table id="tabla_elem"></table>
  </div>
  
  
 <label for="inp_fecha">Fecha</label> <br />
 <input type="date" id="inp_fecha" name="id_datetime_local" tabindex="5" required title="Debe insertar la fecha del gasto" alt="input para la fecha" accesskey="f"/><br />
 
   
  <label for="inp_tipo">Tipo de Gasto</label> <br />
	 <select name="inp_tipo" id="inp_tipo" tabindex="6" title="Seleccione el tipo del ingreso" accesskey="t">
          <option value="1" selected="selected">Alimentaci&oacute;n</option>
		  <option value="2">Diversi&oacute;n</option>
		  <!-- Aquí va el código php para rellenar los tipos de ingresos-->
   </select>  <br /> <br />
  
   <span class="spanBoton"><input type="submit" name="enviar" value="Enviar" class="botonIsquierdo" accesskey="e"/>
   <input type="reset" name="limpiar" value="Limpiar" class="botonDerecho" accesskey="l"/></span>
</fieldset>
  </form>