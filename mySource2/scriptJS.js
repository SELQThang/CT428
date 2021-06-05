function DomID(id) {
  return document.getElementById(id);
}

function ThemNuocHoa() {
  var tenNuocHoa = DomID("tenNuocHoa").value;
  if(doDai(tenNuocHoa)==true){
      return true;
  }
  return false;
}
function doDai(value){
    if (value.length <= 50 && value.length >= 1) {
      return true;
    }
    return false;
}