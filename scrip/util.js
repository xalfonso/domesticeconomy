// JavaScript Document
function comenzarReloj() {
	setTimeout("reloj()", 500);
}

function reloj() {
	var tiempo = new Date();
	var hora = tiempo.getHours();
	var minuto = tiempo.getMinutes();
	var segundo = tiempo.getSeconds();
	var numDia = tiempo.getDay();
	var dia = tiempo.getDate();
	var numeroMes = tiempo.getMonth();
	var anno = tiempo.getFullYear();
	var textohora = getNombreMes(numeroMes) + " " + dia + ", " + anno + ". " + getNombreDia(numDia) + ": " + hora + ":" + minuto + ":" + segundo;
	var divRel = window.document.getElementById("reloj");
	divRel.innerHTML = textohora;
	setTimeout("reloj()", 500);
}

function getNombreDia(numeroDia) {
	var dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
	return dias[numeroDia];
}

function getNombreMes(numeroMes) {
	var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	return meses[numeroMes];
}

function eliminarElemento(elementoEliminar) {
	var elementoEvento = elementoEliminar;
	var elemePadreCelda = elementoEvento.parentNode;
	var elemePadreFila = elemePadreCelda.parentNode;
	var elemPadreTabla = elemePadreFila.parentNode;
	elemPadreTabla.removeChild(elemePadreFila);
	
	//función para calcular el total general
	calcularTotal ();

	//Esto me sirve para habilitar el input del saldo total y de la cantidad
	if(elemPadreTabla.childNodes.length == 0) {

		var inputSaldoTotal = window.document.getElementById("inp_saldo");
		var inputCantTotal = window.document.getElementById("inp_cant");
		//aqui vuelvo a habilitar el input del saldo la cantidad y los limpio
		inputSaldoTotal.removeAttribute("readonly");
		inputSaldoTotal.value = "";
		
		inputCantTotal.removeAttribute("readonly");
		inputCantTotal.value = "";
			
	}
}
function calcularTotal () {
  /**
	 * Aqui voy a hacer el cálculo total, cada vez que se ejecute esta funcion se borra el total y se recalcula de nuevo (saldo y total)
	 */
	var tabla = window.document.getElementById("tabla_elem");
	var cant = tabla.childNodes.length;
	
	var total = 0.0;
	var canti = 0;
	for(var i=0; i < cant; i++) {

		var tr = tabla.childNodes[i];
       	//para obtener el precio unitario
		var td_PU = tr.childNodes[1];
		var input_PU_Valor = td_PU.firstChild.value;

		//para obtener la cantidad
		var td_CA = tr.childNodes[2];
		var input_CA_Valor = td_CA.firstChild.value;

		var precioT = parseInt(input_CA_Valor) * parseFloat(input_PU_Valor);
        total += precioT;
        canti += parseInt(input_CA_Valor);
	}
	
	if(isNaN(total))
		window.document.getElementById("inp_saldo").value = "##";
	else
		window.document.getElementById("inp_saldo").value = total;
    
    if(isNaN(canti))
		window.document.getElementById("inp_cant").value = "##";
	else
		window.document.getElementById("inp_cant").value = canti;
    
}


function calcularTotalFila(elementoCantidad) {

	//obtengo el id del input de la cantidad que estoy procesando, el que origino esta funcion
	var idInputCant = new String();
	idInputCant = elementoCantidad.getAttribute("id");
	var posCaract = idInputCant.indexOf("_");
	var numeroId = new String();
	numeroId = idInputCant.substring(posCaract + 1, idInputCant.length);
	/**
	 * LLegado este punto tengo en la variable numero el número del elemento que me va a servir para encontrar los otros input y realizar el calculo
	 * el input de precio unitario es 'pu_#', cantidad "ca_#", precio total pt_#
	 */
	var numero = parseInt(numeroId);

	//Hacer el calculo por fila
	var cant_value = window.document.getElementById("ca_" + numero).value;
	var pu_value = window.document.getElementById("pu_" + numero).value;
	var precioTotal = parseInt(cant_value) * parseFloat(pu_value);
	if(isNaN(precioTotal))
		window.document.getElementById("pt_" + numero).value = "##";
	else
		window.document.getElementById("pt_" + numero).value = precioTotal;

	//función para calcular el total general
	calcularTotal ();

}

//Esta variable me sirve para llevar la cantidad de filas que he agregado, se refiere a los elementos, y sirve para asignar los id
var cantFilaElem = 0;

function comenzarAgreElemGasto() {

    //esto me sirve para desabilitar el input del saldo y de la cantidad
	var inputSaldoTotal = window.document.getElementById("inp_saldo");
	inputSaldoTotal.setAttribute("readonly", "readonly");
	var inputCantTotal = window.document.getElementById("inp_cant");
	inputCantTotal.setAttribute("readonly", "readonly");
	

	var div_contenedorTabla = window.document.getElementById("div_elemGasto");
	var fila = window.document.createElement("tr");

	var celdaNombre = window.document.createElement("td");
	celdaNombre.innerHTML = "<input type='text' size='9' name='elem_nombre[]' maxlength='10' alt='input para nombre elemento'  title='Debe insertar el nombre elemento' required placeholder='nombre'/>";

	var celdaPU = window.document.createElement("td");
	celdaPU.innerHTML = "<input type='text' id='pu_" + cantFilaElem + "'  size='9' name='elem_PU[]' maxlength='10' alt='input para precio unitario'  title='Debe insertar el precio unitario' required placeholder='PU.' onblur='calcularTotalFila(this)'/>";

	var celdaCant = window.document.createElement("td");
	celdaCant.innerHTML = "<input type='text' id='ca_" + cantFilaElem + "' size='4' name='elem_cant[]' maxlength='5' alt='input para la cantidad'  title='Debe insertar la cantidad' required placeholder='cantidad' onblur='calcularTotalFila(this)'/>";

	var celdaPT = window.document.createElement("td");
	celdaPT.innerHTML = "<input type='text' id='pt_" + cantFilaElem + "' size='4' name='elem_PT[]' maxlength='5' alt='input para el precio total'  title='El precio se auto-calcula' placeholder='P.T' readonly='readonly'/>";

	var celdaEliminar = window.document.createElement("td");
	celdaEliminar.innerHTML = "<a class='accionMenor' href='#secDiv' onclick='eliminarElemento(this)'>eliminar</a>";
	cantFilaElem++;

	//agrego todas las celdas a la fila
	fila.appendChild(celdaNombre);
	fila.appendChild(celdaPU);
	fila.appendChild(celdaCant);
	fila.appendChild(celdaPT);
	fila.appendChild(celdaEliminar);

	var tabla = window.document.getElementById("tabla_elem");

	//agrego a la tabla la fila
	tabla.appendChild(fila);
	//agrego al div la tabla
	div_contenedorTabla.appendChild(tabla);

}