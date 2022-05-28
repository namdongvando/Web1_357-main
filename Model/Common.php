<?php

namespace Model;

class Common
{
    const MoneyVND = "vnd";
    const MoneyDola = "dola";
    public static $TypeMoney = "vnd";

    public static function ViewMoney($number)
    {
        if (self::$TypeMoney == self::MoneyVND)
            return number_format($number, 0, ".", ",") . "vnđ";
        if (self::$TypeMoney == self::MoneyDola)
            return "$" . number_format($number, 0, ".", ',');
        // không định nghĩa thì dùng tiền VND
        return number_format($number, ".", ',') . "vnđ";
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