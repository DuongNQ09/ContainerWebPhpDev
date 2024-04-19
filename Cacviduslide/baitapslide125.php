<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem người dùng đã nhấn nút Đăng nhập hay chưa
    if (isset($_POST['login'])) {
        // Lấy giá trị tên đăng nhập và mật khẩu từ biểu mẫu
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Hiển thị tên đăng nhập và mật khẩu vừa nhập
        echo "Tên đăng nhập: " . $username . "<br>";
        echo "Mật khẩu: " . $password . "<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="POST" action="">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" name="login" value="Đăng nhập">
    </form>
</body>
</html>
