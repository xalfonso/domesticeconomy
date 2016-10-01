    <table id="listado_TiposIngresos" summary="Tipos de Ingresos">
      <caption>Tipos de Ingresos</caption>
       <tr>
        <th scope="col">
           Nombre
        </th>
        <th scope="col">
           Descripci&oacute;n
        </th>
       </tr>
     <?php
      require ('../mod_contr/clases.php');
	  $listTiposIngreso = TipoIngreso::obtenerTodos();
	  $cantidad = count($listTiposIngreso);
	  for($i = 0; $i < $cantidad; $i++)
	  {
        $nombre = "".$listTiposIngreso[$i]->obtenerNombre();
		$desc = "".$listTiposIngreso[$i]->obtenerDesc();
		echo "<tr>";
		echo "<td>$nombre</td>"; 
		echo "<td>$desc</td>";
		echo "</tr>";
	  }
     ?>  
 </table>
   
