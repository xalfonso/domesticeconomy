// JavaScript Document

/**
Función que se utiliza para limitar el numero de caracteres que se puede escribir en el textArea
Esta función solo es válida para un textArea con un id = text_descripcion
**/
function valLimita(maximoCaracteres)
{
  var textArea = document.getElementById("text_descripcion"); 
 if(textArea.value.length >= maximoCaracteres ) 
   {
      return false;
   }
  else
   {
      return true;
  }
	
}

function mostrarCaracter(elEvento)
{
	 var evento = elEvento || window.event;
     var codigoCaracter = evento.charCode || evento.keyCode;
     alert(codigoCaracter);
  return true;
}

/**
Función que se utiliza para limitar el numero de caracteres que se puede escribir en el textArea
Esta función solo es válida para un textArea con un id = text_descripcion
Esta función permite utilizar las teclas de flecha, BackSpace sin que cuente como un caracter
**/
function valLimitaA(elEvento,maximoCaracteres)
{
 
 var evento = elEvento || window.event;
 var codigoCaracter = evento.charCode || evento.keyCode;

 // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda,38 = flecha arriba, 39 = flecha derecha, 40 = flecha abajo 
 if(codigoCaracter == 8 || codigoCaracter == 37 || codigoCaracter == 39 || codigoCaracter == 46)
      return true;
                            
  var textArea = document.getElementById("text_descripcion");
 if(textArea.value.length >= maximoCaracteres ) 
   {
      return false;
   }
  else
   {
      return true;
  }
	
}

/**
Función que se utiliza para limitar el numero de caracteres que se puede escribir en el textArea
Esta función es más genérica porque se adapta a cualguier textArea, cuando se utiliza en la página se le pasa el elemento a validar y la cantidad de caracteres 
Esta función permite utilizar las teclas de flecha, BackSpace sin que cuente como un caracter
Esta función es la más genérica
**/
function valLimitaB(elEvento,elementoTextArea,maximoCaracteres)
{
 var evento = elEvento || window.event;   //(para window || para firefox, Chrome....)
 var codigoCaracter = evento.charCode || evento.keyCode;
 
 // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
 if(codigoCaracter == 8 || codigoCaracter == 37 || codigoCaracter == 39 || codigoCaracter == 46)
      return true;

  //De esta forma sirve para varios textArea, que tengas numero diferentes maximos de caracteres
  var textArea = elementoTextArea;                           
  
 if(textArea.value.length >= maximoCaracteres) 
   {
      return false;
   }
  else
   {
      return true;
   }
	
}


function validarSoloNumero()
{
	
	var text = "2";
	if(isNaN(text)) 
	 {
		  alert("No es un número");
          
     }
	 else
	 {
		 alert("Es un número");
	 }
	
}


function validarEMail()
{
	var email_prueba = "eddie.alfonso@gmail.com";
	var espresionRegular = new RegExp(/\w{1,}[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/);
	
	if(espresionRegular.test(email_prueba)) 
	{
       alert("Está correcto el e-mail");
    }
	else
	{
	  alert("No está correcto el e-mail");
	}
	
}

function agregarClaseError()
{
	var inpu = window.document.getElementById("text_descripcion");
	inpu.className = "claseError";
	
	
}