// khi file tải xong
$(function(){   
    // khi năm thay đổi
    $("#namSinh").change(
        function(){
            // alert(
            //     $(this).val()
            //     );
            var nam = $(this).val();
            var thang = 
            $("#Thang").val();    
            console.log(thang);
            console.log(nam);
            // link api
            var linkGetDays = 
            `/apiGetDays.php?thang=${thang}&nam=${nam}`;
            console.log(linkGetDays);
            //debugger;
            // gọi api
            $.ajax({
                type: "get",
                url: linkGetDays,
                dataType: "html",
                success: function (res) {
                    $("#Ngay").html(res);
                }    
            }); 
        }
    );
        // khi thang thay đổi
      $("#Thang").change(
        (e)=>{
            var thang = $("#Thang").val();
            console.log(thang);
            var nam = $("#namSinh").val();
            var linkGetDays =
             `/apiGetDays.php?thang=${thang}&nam=${nam}`;
            $.ajax({
                type: "get",
                url: linkGetDays,
                dataType: "html",
                success: function (res) {
                    $("#Ngay").html(res);
                }
            }); 
        }

      );  


})