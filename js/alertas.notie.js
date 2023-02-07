function alertas(mensaje) {

  if (mensaje == 1) {
    notie.alert({
      type: 1,
      text: "Palabra agregadada correctamente",
      time: 2

    });
  } else if(mensaje == 2) {
    notie.alert({
      type: 2,
      text: "La palabra se ha editado correctamente",
      time: 2

    });
  } else if(mensaje == 3) {
    notie.alert({
      type: 3,
      text: "La palabra seleccionada ha sido eliminada",
      time: 2

    });

  } else if(mensaje == 4) {
    notie.alert({
      type: 4,
      text: "El lenguaje que desea agregar ya existe",
      time: 2

    });

  } else if(mensaje == 5) {
    notie.alert({
      type: 4,
      text: "La palabra que desea agregar ya existe",
      time: 2

    });

  } else if(mensaje == 6) {
    notie.alert({
      type: 4,
      text: "El lenguaje se ha agregado correctamente",
      time: 2
    });
  } else if(mensaje == 7) {
    notie.alert({
      type: 4,
      text: "La palabra que desea editar ya existe",
      time: 2
    });
  }

}




function confirmar() {
  //Ingresamos un mensaje
  var mensaje = confirm("¿Deseas eliminar el registro?");
  //Verificamos si el usuario acepto el mensaje
  if (mensaje == true) {
    return true;
  }
  //Verificamos si el usuario denegó el mensaje
  else {
    return false;
  }
}


