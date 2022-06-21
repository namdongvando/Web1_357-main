import LoaiTinController from "./LoaiTin/LoaiTinController.js";
import templatePhanTrang from "./PhanTrangTemplate.js";

var app = angular.module("myApp", []);

app.directive("phanTrang", function () {
  return {
    template: templatePhanTrang,
    scope: {
      pageTotal: "@",
      pagesIndex: "@",
    },
  };
});
app.controller("loaiTin", LoaiTinController);
