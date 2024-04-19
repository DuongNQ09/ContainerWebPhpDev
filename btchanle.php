<html>
<head>
    <title>Dãy số từ 1 đến 200</title>
</head>
<body>
        <?php
        for ($i = 1; $i <= 200; $i++) {
            if ($i % 2 == 0) {
                // Các số chẵn
                echo "<li><strong style='color: red;'>$i</strong></li>";
            } else {
                // Các số lẻ
                echo "<li><em style='color: blue;'>$i</em></li>";
            }
        }
        ?>
</body>
</html>
