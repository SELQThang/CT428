function Validation() {
    this.KiemTraRong = function (value) {
        if (value.trim() === "") {
            return true;
        }
        return false;
    }
    this.KiemTraTaiKhoan = function (value) {
        var re = /([A-Za-z])\w+/g;
        if (re.test(value) && value.length >= 6 && value.length <= 15) {
            return true;
        }
        return false;
    }
    this.KiemTraMatKhau = function (value) {
        var re = /(?=.*?[A-Za-z])(?=.*?[0-9])/g;
        if (re.test(value) && value.length >= 6 && value.length < 15) {
            return true;
        }
        return false;
    }
}