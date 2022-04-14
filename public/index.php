<?php
//phpinfo();
echo "<h1>Xin chào</h1>";
?>
<h1><?php echo "xin chào" ?></h1>
<?php
$a = 4;
if ($a % 2 == 0) {
    echo "Số chẵn";
} else {
    echo "Số Lẻ";
}
for ($i = 0; $i < 100; $i++) {
    echo "<h2>{$i}</h2>";
}
for ($i = 0; $i < 100; $i++) {
  ?>
<div>San Pham <?php echo $i; ?></div>
<?php
}
?>