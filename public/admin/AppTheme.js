function BrowseServerShowImages(startupPath, functionData, idImages) {
  var finder = new CKFinder();
  finder.BasePath = "/public/";
  finder.startupPath = startupPath;
  finder.selectActionFunction = function (fileUrl, data) {
    //        console.log(log);
    document.getElementById(data["selectActionData"]).value = fileUrl;
    $(idImages).attr("src", fileUrl);
  };
  finder.selectActionData = functionData;
  finder.selectThumbnailActionFunction = ShowThumbnails;
  finder.popup();
}
function BrowseServer(startupPath, functionData) {
  var finder = new CKFinder();
  finder.BasePath = "/public/";
  finder.startupPath = startupPath;
  finder.selectActionFunction = SetFileField;
  finder.selectActionData = functionData;
  // finder.selectThumbnailActionFunction = ShowThumbnails;
  finder.popup();
}
function SetFileField(fileUrl, data) {
  document.getElementById(data["selectActionData"]).value = fileUrl;
  var ID = data["selectActionData"];
  hienthumb(fileUrl, ID);
}
function ShowThumbnails(fileUrl, data) {
  var sFileName = this.getSelectedFile().name;

  document.getElementById("thumbnails").innerHTML +=
    '<div class="thumb">' +
    '<img src="' +
    fileUrl +
    '" />' +
    '<div class="caption">' +
    '<a href="' +
    data["fileUrl"] +
    '" target="_blank">' +
    sFileName +
    "</a> (" +
    data["fileSize"] +
    "KB)" +
    "</div>" +
    "</div>";
  document.getElementById("preview").style.display = "";
  return false;
}
function hienthumb(fileUrl, ID) {
  if (fileUrl != "") {
    $("#HinhQuanCao").attr("src", fileUrl);
    var bien = "<img src='" + fileUrl + "'  height='100'>";
    $("#" + ID)
      .parent()
      .children("label")
      .children(".HinhChon")
      .html(bien);
  }
}

$(function () {});
