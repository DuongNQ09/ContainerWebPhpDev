<?php
for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 == 0) {
        // Số chẵn: in đậm, màu đỏ
        echo '<span style="font-weight: bold; color: red;">' . $i . '</span> ';
    } else {
        // Số lẻ: in nghiêng, màu xanh
        echo '<span style="font-style: italic; color: blue;">' . $i . '</span> ';
    }
}
?>
