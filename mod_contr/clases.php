<?php 
abstract class Transac
{
	protected $nombre;
    protected $descr;
	protected $fecha;
	protected $saldoTotal;
	
	public function __construct($p_nombre,$p_descrp,$p_fecha,$p_saldoTotal)
	{
		#inicialización de atributos de la clase
		$this->nombre = $p_nombre;
		$this->descr = $p_descrp;
		$this->fecha = $p_fecha;
		$this->saldoTotal = $p_saldoTotal;
	}
	
	public function obtenerNombre()
	{
	   return $this->nombre;
	}
	
	public function obtenerDesc()
	{
	   return $this->descr;
	}
		
	public function obtenerFecha()
	{
	   return $this->fecha;
	}
	
	public function obtenerSaldoTotal()
	{
	   return $this->saldoTotal;
	}
	
	#método abstracto
	//abstract public function salvar();
	
	#método abstracto
	//abstract public function obtenerTodos();
	
	#método abstracto
	//abstract public function obtenerPorId();
}
#********************************************************************************************************************************************************
class Ingreso extends Transac
{
   private $tipoIngreso;
   
   public function __construct($p_nombre,$p_descrp,$p_fecha,$p_saldoTotal,$p_tipoIngreso)
	{
		#inicialización del padre
		parent::__construct($p_nombre,$p_descrp,$p_fecha,$p_saldoTotal);
		
		#inicialización de atributos de la clase
		$this->tipoIngreso = $p_tipoIngreso;
	}
	
	public function salvar()
	{
	  #Se establece la conecxion a la BD
	 $mysqli = new mysqli("localhost","root","","hogar_db");
	
	 #verifico que ho haya ocurrido un error en la conexion
	 #esto normalmente muestra un error de php si no funciona
	 if($mysqli->connect_errno)
	  {
		throw new Exception("Fallo al conectar a MYSQL: ". $mysqli->connect_error);
		exit();
	  }
	
	 #construyo mi consulta
	 $fechaString = $this->fecha->format('Y-m-d');
	 $consulta = "INSERT INTO transaccion_tb(nombre, fecha, saldo, descr) VALUES('$this->nombre', '$fechaString','$this->saldoTotal', '$this->descr')";
	      		
     #ejecuto consulta
	 $resultado = $mysqli->query($consulta);
	
	 #verifico k no haya algun error en la ejecucion
	 if(!($resultado))
	  {
		 throw new Exception("Fallo al ejecutar la inserción de la transacción");
	  }
	  else
	  {
		$consultaId = "SELECT max(transaccion_tb.idTransaccion) as idMax from transaccion_tb";  
		$resultadoId = $mysqli->query($consultaId);
		 
		 if(!($resultadoId))
		   {
			  throw new Exception("Fallo al ejecutar la selección del id");   
		   }
		   else
		   {
			  $row = $resultadoId->fetch_assoc();  
			  $id = $this->tipoIngreso->obtenerId();
			  $consultaIngreso = "INSERT INTO ingreso_tb(transaccion, tipoIngreso) VALUES('$row[idMax]', '$id')";
			  $resultadoIngreso = $mysqli->query($consultaIngreso);
			  
			  if(!($resultadoIngreso))
		         {
			       throw new Exception("Fallo al ejecutar la inserción del ingreso");   
		         }
		   }
		
	  }
	 #cierro conexion
	 $mysqli->close();	
	}
   
}
#********************************************************************************************************************************************************
class Gasto extends Transac
{
   private $tipoGasto;
   private $cantidadElem; 
   private $listElemGasto;
   
   public function __construct($p_nombre,$p_descrp,$p_fecha,$p_saldoTotal,$p_tipoGasto,$p_cantElem,$p_listaElement)
	{
		#inicialización del padre
		parent::__construct($p_nombre,$p_descrp,$p_fecha,$p_saldoTotal);
		
		#inicialización de atributos de la clase
		$this->tipoGasto = $p_tipoGasto;
		$this->cantidadElem = $p_cantElem;
		$this->listElemGasto = $p_listaElement;
	}
     	
}
#********************************************************************************************************************************************************
class ElemeGasto
{
   private $nombre;
   private $pu;   
   private $cant;  	
   
   public function __construct($p_nombre,$p_pu,$p_cant)
	{
		#inicialización de atributos de la clase
		$this->nombre = $p_nombre;
		$this->pu = $p_pu;
		$this->cant = $p_cant;
	}
	
	
	public function precioTotal()
	{
		return $this->cant * $this->pu;
	}
	
}
#********************************************************************************************************************************************************
class TipoIngreso
{
	private $id;
	private $nombre;
	private $descr;
	
	#uso de parámetros por defecto
	public function __construct($p_nombre,$p_descrip,$p_id = 0)
	{
		#inicialización de atributos de la clase
		$this->nombre = $p_nombre;
		$this->descr = $p_descrip;
		$this->id = $p_id;
		
	}
	public function obtenerId()
	{
		return $this->id;
	}
	
	public function obtenerNombre()
	{
		return $this->nombre;
	}
	
	public function obtenerDesc()
	{
		return $this->descr;
	}
	
	public function salvar()
	{
    
	 #Se establece la conecxion a la BD
	 $mysqli = new mysqli("localhost","root","","hogar_db");
	
	 #verifico que ho haya ocurrido un error en la conexion
	 #esto normalmente muestra un error de php si no funciona
	 if($mysqli->connect_errno)
	  {
		throw new Exception("Fallo al conectar a MYSQL: ". $mysqli->connect_error);
		exit();
	  }
	
	 #construyo mi consulta
	 $consulta = "INSERT INTO tipoingreso_tb( nombreIngreso, descIngreso) VALUES( '$this->nombre', '$this->descr')";
		
     #ejecuto consulta
	 $resultado = $mysqli->query($consulta);
	
	 #verifico k no haya algun error en la ejecucion
	 if(!($resultado))
	  {
		 throw new Exception("Fallo al ejecutar la consulta");
	  }
	 #cierro conexion
	 $mysqli->close();
	}
	
	public static function obtenerTodos()
	{
     $listTiposIngreso = array();
	 #Se establece la conecxion a la BD
	 $mysqli = new mysqli("localhost","root","","hogar_db");
	
	 #verifico que ho haya ocurrido un error en la conexion
	 #esto normalmente muestra un errot de php sino funciona, la directiva
	 if($mysqli->connect_errno)
	  {
		throw new Exception("Fallo al conectar a MYSQL: ". $mysqli->connect_error);
		exit();
	  }
      #construyo mi consulta
	  $consulta = "SELECT  tipoingreso_tb.idTipoIngreso, tipoingreso_tb.nombreIngreso, tipoingreso_tb.descIngreso FROM tipoingreso_tb";
	
	  #ejecuto consulta
	  $resultado = $mysqli->query($consulta);
	
	  #obtengo los datos
      while ($row = $resultado->fetch_assoc())
	   {
		 $tipoIngreso = new TipoIngreso($row['nombreIngreso'], $row['descIngreso'],$row['idTipoIngreso']);
		 $listTiposIngreso[]=$tipoIngreso;
	   }
	  #liberar resultado
	  $resultado->free();
		
	  #cierro conexion
	  $mysqli->close();
	
	  return $listTiposIngreso;
	}
	
}
#********************************************************************************************************************************************************
class TipoGasto
{
	private $nombre;
	private $descr;
	
	public function __construct($p_nombre,$p_descrip)
	{
		#inicialización de atributos de la clase
		$this->nombre = $p_nombre;
		$this->descr = $p_descrip;
		
	}
	public function obtenerNombre()
	{
		return $this->nombre;
	}
	
	public function obtenerDesc()
	{
		return $this->descr;
	}
	
	public function salvar()
	{
    
	#Se establece la conecxion a la BD
	$mysqli = new mysqli("localhost","root","","hogar_db");
	
	#verifico que ho haya ocurrido un error en la conexion
	#esto normalmente muestra un error de php si no funciona
	if($mysqli->connect_errno)
	{
		throw new Exception("Fallo al conectar a MYSQL: ". $mysqli->connect_error);
		exit();
	}
	
	#construyo mi consulta
	$consulta = "INSERT INTO tipogasto_tb( nombreGasto, descGasto) VALUES( '$this->nombre', '$this->descr')";
		
    #ejecuto consulta
	$resultado = $mysqli->query($consulta);
	
	#verifico k no haya algun error en la ejecucion
	if(!($resultado))
	{
		throw new Exception("Fallo al ejecutar la consulta");
	}
	#cierro conexion
	$mysqli->close();
	}
	
	public static function obtenerTodos()
	{
     $listTiposGasto = array();
	 #Se establece la conecxion a la BD
	 $mysqli = new mysqli("localhost","root","","hogar_db");
	
	 #verifico que ho haya ocurrido un error en la conexion
	 #esto normalmente muestra un errot de php sino funciona, la directiva
	 if($mysqli->connect_errno)
	  {
		throw new Exception("Fallo al conectar a MYSQL: ". $mysqli->connect_error);
		exit();
	  }
      #construyo mi consulta
	  $consulta = "SELECT  tipogasto_tb.nombreGasto, tipogasto_tb.descGasto FROM tipogasto";
	
	  #ejecuto consulta
	  $resultado = $mysqli->query($consulta);
	
	  #obtengo los datos
      while ($row = $resultado->fetch_assoc())
	   {
		 $tipoGasto = new TipoGasto($row['nombreGasto'], $row['descGasto']);
		 $listTiposGasto[]=$tipoGasto;
	   }
	  #liberar resultado
	  $resultado->free();
		
	  #cierro conexion
	  $mysqli->close();
	
	  return $listTiposGasto;
	}
}
?>