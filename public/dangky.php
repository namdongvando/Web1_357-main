<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: sans-serif;
    }

    h1 {
      color: #000;
      font-size: 1.2em;
      background-color: goldenrod;
    }

    input {
      width: 100%;
      border: 1px solid #0000;
      border-bottom: 1px solid goldenrod;
    }

    input[type="submit"] {
      width: auto;
    }

    table tr td {
      text-align: right;
    }

    table {
      border: 3px solid goldenrod;
      margin: auto;
    }

    .alert {
      color: red;
    }
  </style>
</head>

<body>
  <h1>Đăng Ký</h1>
  <div class="alert">
    <?php
    if (isset($_GET["e"])) {
      echo $_GET["e"];
    }
    ?>
  </div>


  <form action="/XuLyDangKy.php" method="post">
    <table style="color: red">
      <tr>
        <td>Họ Tên</td>
        <td>
          <input required name="user[Name]" type="text" placeholder="Nhập họ & tên" />
        </td>
      </tr>
      <tr>
        <td>Ngày Sinh</td>
        <td>
          <input name="user[BOD]" type="date" max="2002-01-01" />
        </td>
      </tr>
      <tr>
        <td>Tài khoản</td>
        <td>
          <input required name="user[Username]" type="text" placeholder="tài khoản" />
        </td>
      </tr>
      <tr>
        <td>Mật Khẩu</td>
        <td>
          <input required name="user[Password]" type="password" placeholder="mật khẩu" />
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <input required name="user[Email]" type="email" placeholder="nhập Email" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="DangKy" value="Đăng Ký" />
        </td>
      </tr>
    </table>
    <p>Bạn đã có tài khoản? hãy <a href="dangnhap.html">Đăng nhập</a></p>
  </form>
</body>

</html>