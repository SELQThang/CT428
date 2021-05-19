
var validate = new Validation();

function DomID(id) {
  var element = document.getElementById(id);
  return element;
}

function DangKy() {
  var tenDangNhap = DomID("tenDangNhap").value;
  var matKhau = DomID("matKhau").value;
  var nhapLaiMatKhau = DomID("nhapLaiMatKhau").value;
  var errorUsername = DomID("errorUsername");
  var errorPassword = DomID("errorPassword");
  var errorConfirm = DomID("errorConfirmPassword");
  var fileImage = DomID("Image").value;
  var errorImage = DomID("errorImage");
  var loi = 0;
  if (KiemTraDauVaoRong("tenDangNhap", tenDangNhap) == true) {
    loi++;
  }
  if (validate.KiemTraTaiKhoan(tenDangNhap) == false) {
    loi++;
    DomID("tenDangNhap").style.borderColor = "red";
    errorUsername.style.display = "block";
    errorUsername.innerHTML = "Bắt đầu bằng chữ cái<br> Độ dài từ 6 -> 15 ký tự";
  }
  else {
    DomID("tenDangNhap").style.borderColor = "green";
    errorUsername.style.display = "none";
  }
  if (KiemTraDauVaoRong("matKhau", matKhau) == true) {
    loi++;
  }
  if (validate.KiemTraMatKhau(matKhau) == false) {
    loi++;
    DomID("matKhau").style.borderColor = "red";
    errorPassword.style.display = "block";
    errorPassword.innerHTML = "Phải có chữ và số <br> Độ dài từ 6 -> 15 ký tự";
  }
  else {
    DomID("matKhau").style.borderColor = "green";
    errorPassword.style.display = "none";
  }
  if (KiemTraDauVaoRong("nhapLaiMatKhau", nhapLaiMatKhau) == true) {
    loi++;
  }
  if (matKhau == nhapLaiMatKhau) {
    errorConfirm.style.display = "none";
  }
  else {
    errorConfirm.style.display = "block";
    errorConfirm.innerHTML = "không trùng khớp";
    DomID("nhapLaiMatKhau").style.borderColor = "red";
    loi++;
  }
  if (KiemTraDauVaoRong("Image", fileImage) == true) {
    errorImage.style.display = "block";
    errorImage.innerHTML = "nhập hình ảnh";
    DomID("Image").style.borderColor = "red";
    loi++;
  }
  else {
    errorImage.style.display = "none";
    DomID("Image").style.borderColor = "green";
  }
  if (loi != 0) {
    return false;
  }
  return true;
}

function DangNhap() {
  var tenDangNhap = DomID("tenDangNhap").value;
  var matKhau = DomID("matKhau").value;
  var loi = 0;
  if (KiemTraDauVaoRong("tenDangNhap", tenDangNhap) == true) {
    loi++;
  }
  // if (validate.KiemTraTaiKhoan(tenDangNhap) == false) {
  //   loi++;
  //   DomID("tenDangNhap").style.borderColor = "red";
  //   errorUsername.style.display = "block";
  //   errorUsername.innerHTML = "Sai định dạng tài khoản";
  // }
  // else {
  //   DomID("tenDangNhap").style.borderColor = "green";
  //   errorUsername.style.display = "none";
  // }
  if (KiemTraDauVaoRong("matKhau", matKhau) == true) {
    loi++;
  }
  // if (validate.KiemTraMatKhau(matKhau) == false) {
  //   loi++;
  //   DomID("matKhau").style.borderColor = "red";
  //   errorPassword.style.display = "block";
  //   errorPassword.innerHTML = "sai định dạng mật khẩu";
  // }
  // else {
  //   DomID("matKhau").style.borderColor = "green";
  //   errorPassword.style.display = "none";
  // }
  if (loi != 0) {
    return false;
  }
  return true;
}

function KiemTraDauVaoRong(ID, value) {
  if (validate.KiemTraRong(value) == true) {
    DomID(ID).style.borderColor = "red";
    DomID(ID).placeholder = "Nhập thông tin vào đây!";
    return true;
  } else {
    DomID(ID).style.borderColor = "green";
    return false;
  }
}
