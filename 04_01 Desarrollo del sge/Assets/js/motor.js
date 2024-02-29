function confirmacion()
{
    var respuesta = confirm("¿Desea realmente borrar el registro?");
    if (respuesta == true)
    {
        return true;
    } else {
        return false;
    }
}
if(contenedor1)
  {
    // Referencia de los elementos
    boton1 = document.getElementById("botonConsulta1");
    controlador1 = "Controllers/Consulta1Controller.php";
    div1 = document.getElementById("contenedor2");
    // Evento y llamada a la función
    formConsulta1.addEventListener("submit", function(event){
      event.preventDefault();
      seleccionarDatos1(formConsulta1,boton1,controlador1,div1);
    });
  }