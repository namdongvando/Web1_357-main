import LoaiTinController from "./LoaiTin/LoaiTinController.js";
import templatePhanTrang from "./PhanTrangTemplate.js";

var app = angular.module("myApp", []);

app.directive("phanTrang", function () {
  return {
    template: templatePhanTrang,
    scope: {
      totalPage: "=",
      pagesIndex: "=",
      pagesNumber: "=",
      ctrlFn: "&onClick",
    },
    link: function (scope) {
      scope.NumToArray = (num) => {
        var a = new Array();
        for (let i = 1; i <= num; i++) {
          a.push(i);
        }
        return a;
      };
      console.log(scope.NumToArray());
      scope.onClick = function (pagesIndex, pagesNumber) {
        // console.log(pagesIndex);
        // console.log(pagesNumber);
        // console.log("onClick");
        if (typeof scope.ctrlFn == "function") {
          scope.ctrlFn({
            indexPages: pagesIndex,
            pagesNumber: pagesNumber,
          });
        }
      };
    },
  };
});
app.controller("loaiTin", LoaiTinController);
