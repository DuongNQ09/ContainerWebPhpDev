<!DOCTYPE html>
<html>
<head>
    <title>Hiển thị dữ liệu sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Danh sách sinh viên đăng ký môn học</h2>
    <table>
        <tr>
            <th>MSSV</th>
            <th>Họ và tên</th>
            <th>Kỳ</th>
            <th>Đăng ký</th>
            
        </tr>
        <?php
        // Thực hiện kết nối đến CSDL
        $conn = mysqli_connect('localhost', 'root', '', 'pka_s');
        if (!$conn) {
            die("Không thể kết nối đến CSDL: " . mysqli_connect_error());
        }

        // Truy vấn dữ liệu từ bảng sinh_vien
        $query = "SELECT * FROM sinhvien";
        $result = mysqli_query($conn, $query);

        // Hiển thị dữ liệu trong bảng
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['MSSV'] . "</td>";
                echo "<td>" . $row['HoTen'] . "</td>";
                echo "<td>" . $row['DangKy'] . "</td>";
                echo "<td>" . $row['Ky'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
        }

        // Đóng kết nối CSDL
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>