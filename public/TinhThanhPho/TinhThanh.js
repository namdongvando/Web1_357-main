$(function () {
  $(".Ajax_TinhThanh").change(function () {
    var id = $(this).attr("id");
    var value = $(this).val();
    var data = $(this).data();
    var targetid = `#${data.target}`;
    console.log(id);
    console.log(targetid);
    console.log(value);
    console.log(data);
    $.ajax({
      type: "get",
      url: `/api/getquanhuyen/${value}`,
      success: function (response) {
        console.log(response);
        $(targetid).html(response);
      },
    });
  });
});
