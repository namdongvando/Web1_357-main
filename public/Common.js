function handleError(img) {
  img.src = "/public/no-image.jpg";
}

const httpClient = {
  Get: function (link, callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      callback(this.responseText);
    };
    xhttp.open("GET", link, true);
    xhttp.send();
  },
};
const SetTinhThanh2Html = (items) => {
  // chuyển danh sách tỉnh thành từ JSON -> string Options
  var tinhThanh = items.map(function (tt) {
    if (tt.IDP == "0") {
      return `<option value="${tt.Id}" >${tt.Name}</option>`;
    }
  });
  // console.log(tinhThanh);
  // chuyển mảng string option -> string Option html
  var htmlTinhThanh = tinhThanh.join("");
  // chuyển optionhtml -> thẻ select
  document.getElementById("TinhThanh").innerHTML = htmlTinhThanh;
};
const SetQuanHuyen2Html = (IDP) => {
  // gọi api lấy danh sách tỉnh thành quận huyện
  httpClient.Get("/api/gettinhthanh", function (res) {
    var items = JSON.parse(res);
    // chuyển danh sách tỉnh thành từ JSON -> string Options
    var tinhThanh = items.map(function (tt) {
      if (tt.IDP == IDP) {
        return `<option value="${tt.Id}" >${tt.Name}</option>`;
      }
    });
    // chuyển mảng string option -> string Option html
    var htmlTinhThanh = tinhThanh.join("");
    // chuyển optionhtml -> thẻ select
    document.getElementById("QuanHuyen").innerHTML = htmlTinhThanh;
  });
};
// /api/gettinhthanh
httpClient.Get("/api/gettinhthanh", function (res) {
  // console.log(JSON.parse(res));
  SetTinhThanh2Html(JSON.parse(res));
  SetQuanHuyen2Html("1");
});
