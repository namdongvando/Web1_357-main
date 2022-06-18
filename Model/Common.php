<?php

namespace Model;


class Common
{
    const MoneyVND = "vnd";
    const MoneyDola = "dola";
    public static $TypeMoney = "vnd";
    public static function InputText($text)
    {
        $text = trim($text);
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }
    public static function ViewMoney($number)
    {
        if (self::$TypeMoney == self::MoneyVND)
            return number_format($number, 0, ".", ",") . " vnđ";
        if (self::$TypeMoney == self::MoneyDola)
            return "$" . number_format($number, 0, ".", ',');
        // không định nghĩa thì dùng tiền VND
        return number_format($number, ".", ',') . " vnđ";
    }
    public static  function ToUrl($path)
    {
        header("Location: {$path}");
        exit();
    }
    public static  function UploadFile($file, $path)
    {
        $fromPath = $file["tmp_name"]["UrlImages"];
        $toPath = $path . $file["name"]["UrlImages"];
        if (is_dir($path) == false) {
            mkdir($path, 0777);
        }
        move_uploaded_file($fromPath, $toPath);
        return "/" . $toPath;
    }

    public static function vn_to_str($str)
    {
        if (!$str)
            return false;

        $str = str_replace(array(',', '<', '>', '&', '{', '}', "[", "]", '*', '?', '/', '+', '@', '%', '"'), array(' '), $str);
        $str = str_replace(array("'"), array(' '), $str);
        while (strpos($str, "  ") > 0) {
            $str = str_replace("  ", " ", $str);
        }
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $str = preg_replace("/($codau)/i", $khongdau, $str);
        }
        $str = strtolower($str);
        $str = trim($str);
        $str = preg_replace('/[^a-zA-Z0-9\ ]/', '', $str);
        $str = str_replace(" ", "-", $str);
        return $str;
    }

    public static function PhanTrang($soTrang, $trangHienTai, $link = "[i]")
    {
        ob_start();
        $truoc = $trangHienTai - 1;
        $truoc = max(1, $truoc);
        $sau = $trangHienTai + 1;
        $sau = min($sau, $soTrang);
        $linkTruoc = str_replace("[i]", $truoc, $link);
        $linkSau = str_replace("[i]", $sau, $link);

?>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
                <li class="page-item disabled">
                    <a class="page-link" href="<?php echo $linkTruoc; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $soTrang; $i++) {
                    $linkPages = str_replace("[i]", $i, $link);
                    $active = $i == $trangHienTai ? "active" : "";
                ?>
                    <li class="page-item 
                    <?php echo $active ?>">
                        <a class="page-link" href="<?php echo $linkPages; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $linkSau; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
<?php
        $str = ob_get_clean();
        return $str;
    }
}


?>