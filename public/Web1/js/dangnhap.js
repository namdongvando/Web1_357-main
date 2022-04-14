function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        // thành công
        if (this.status == 200) {
            // xuất ra console
            console.log(this.responseText);
            var users = JSON.parse(this.responseText);
            users.map(function(item){
                console.log(item);
                console.log(item.username);
                console.log(item.name);
                console.log(item.address.district);
                
                
            });
        }
    }
    // gửi yêu cầu đến file  users.json
    xhttp.open("GET", "/js/users.json", true);
    xhttp.send();
}
loadDoc();

const OnDangNhap = function () {
    try {
        var FormDangNhap = document.forms["FormDangNhap"];
        console.log(FormDangNhap);
        var username = FormDangNhap["username"].value;
        var password = FormDangNhap["password"].value;
        // alert(username);
        // alert(password);
        // goi API => get Token

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            // thành công
            if (this.status == 200) {
                // xuất ra console
                console.log(this.responseText);
                var users = JSON.parse(this.responseText);
                console.log(users);
                users.map(function(u){
                    if(u.username==username && u.password==password){
                        // đăng nhập thành công
                        alert("đăng nhập thành công");
                    }
                });
                

            }
        }
        // gửi yêu cầu đến file  users.json
        xhttp.open("GET", "/js/users.json", true);
        xhttp.send();
        // if (username != "admin" || password != "123456") {
        //     throw "Tài khoản/ mật khẩu không đúng";
        // }
        return true;
    } catch (error) {
        alert(error);
        return false;
    }
}