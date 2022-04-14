<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <!-- chon ngay thang nam      -->
    <?php
    echo $namHienTai = date("Y", time());
    ?>
    <form action="" method="get">
        <select class="form-control" name="namSinh" id="namSinh">
            <?php
            $namHienTai = date("Y", time());
            for ($i = 0; $i < 100; $i++) {
                $nam = $namHienTai - $i;
                echo <<<OPTION
            <option value="{$nam}">{$nam}</option> 
OPTION;
            }
            ?>
        </select>

        <select name="Thang" id="Thang" class="form-control">
            <?php
            for ($index = 1; $index <= 12; $index++) {
                //  # code...
            ?>
                <option value="<?php echo $index; ?>">
                    Tháng <?php echo $index; ?>
                </option>
            <?php
            }
            ?>
        </select>
        <select name="Ngay" id="Ngay" class="form-control">
            <!-- them danh sách ngày theo API -->
        </select> 
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
    <script src="/public/js/AppSuDungVongLapFor.js?v=<?php echo time(); ?>" ></script>


</body>

</html>