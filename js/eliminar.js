function confirmarEliminacion() {
  var resp=confirm("Seguro que quiere eliminar al usuario?");
  if (resp==true) {
    return true;
  } else {
    return false;
  }
}
