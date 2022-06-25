const LoaiTinController = async ($scope, $http) => {
  $scope.keyword = "";
  $scope.PostModel = {
    Name: "abc",
    Description: "abc",
    Parents: "0",
  };
  await $http.get("/backend/loaitin/getLoaiTin").then(function (res) {
    console.log(res.data);
    $scope.LoaiTinData = res.data;
  });
  $scope.GetPagingParams = (indexPages, pagesNumber) => {
    var param = { pagesIndex: indexPages, pagesNumber: pagesNumber };
    param["keyword"] = $scope.keyword;
    $http
      .get("/backend/loaitin/getLoaiTin/", {
        params: param,
      })
      .then(function (res) {
        $scope.LoaiTinData = res.data;
      });
  };

  $scope.GetPaging = () => {
    var param = $scope.LoaiTinData;
    param["keyword"] = $scope.keyword;
    delete param["data"];
    console.log(param);
    $http
      .get("/backend/loaitin/getLoaiTin/", {
        params: param,
      })
      .then(function (res) {
        $scope.LoaiTinData = res.data;
      });
  };

  $scope.LoaiTinPost = () => {
    var data = $scope.PostModel;
    $http.post("/backend/loaitin/postapi", data).then((res) => {
      $scope.GetPaging();
    });
  };
};

export default LoaiTinController;
