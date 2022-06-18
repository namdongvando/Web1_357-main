var app = angular.module("myApp", []);
app.controller("loaiTin", async function ($scope, $http) {
  $scope.FullName = "abc";
  await $http.get("/backend/loaitin/getLoaiTin").then(function (res) {
    console.log(res.data);
    $scope.LoaiTinData = res.data;
  });
});
