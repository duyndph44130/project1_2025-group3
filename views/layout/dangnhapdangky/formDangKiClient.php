<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://png.pngtree.com/thumb_back/fw800/background/20230616/pngtree-adorable-teddy-bears-and-fluffy-squishmallow-clouds-in-a-3d-rendered-image_3620966.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: rgb(55, 155, 153);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
            margin-left: 30px;

        }

        input,
        select,
        button {
            width: 85%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            margin-left: 30px;
        }

        button {
            background-color: rgb(55, 155, 153);
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
        }

        .error-message {
            color: #e63946;
            /* Màu đỏ nổi bật */
            font-size: 14px;
            /* Giảm kích thước chữ */
            font-weight: bold;
            /* Chữ đậm hơn */
            display: block;
            /* Hiển thị trên một dòng mới */
            margin-top: 5px;
            /* Khoảng cách trên */
            margin-left: 30px;
            /* Canh lề giống với input */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <form action="<?= BASE_URL . '?act=check-dang-ki-client' ?>" method="post">
<!-- Họ -->
        <label for="ho">Họ: </label>
        <input type="text" id="ho" name="ho">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['ho']) ? $_SESSION ['errors']['ho'] : '' ?>
        </span>
<!-- Tên -->
        <label for="ten">Tên: </label>
        <input type="text" id="ten" name="ten">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?>
        </span>
<!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
        </span>
<!-- Mật khẩu -->
        <label for="mat_khau">Mật khẩu:</label>
        <input type="password" id="mat_khau" name="mat_khau">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>
        </span>
<!-- Điện thoại -->
        <label for="dien_thoai">Điện thoại:</label>
        <input type="text" id="dien_thoai" name="dien_thoai">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['emadien_thoaiil']) ? $_SESSION['errors']['dien_thoai'] : '' ?>
        </span>
<!-- Địa chỉ -->
        <label for="dia_chi">Địa chỉ:</label>
        <input type="text" id="dia_chi" name="dia_chi">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?>
        </span>
<!-- Thành phố -->
        <label for="thanhpho">Thành phố:</label>
        <input type="text" id="thanhpho" name="thanhpho">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['thanhpho']) ? $_SESSION['errors']['thanhpho'] : '' ?>
        </span>
<!-- Ngày cập nhật  -->
        <label for="ngay_capnhat">Ngày tạo:</label>
        <input type="datetime-local" id="ngay_capnhat" name="ngay_capnhat">
        <span class="error-message">
            <?= !empty($_SESSION['errors']['ngay_capnhat']) ? $_SESSION['errors']['ngay_capnhat'] : '' ?>
        </span>

        <button type="submit" name="dangky">Đăng ký</button>
        <div class="footer">
            <p>
                Đã có tài khoản?
                <a href="<?= BASE_URL . '?act=form-dang-nhap-client' ?>" class="text-blue-500 hover:text-blue-600 font-semibold">
                    Đăng nhập
                </a>
            </p>
        </div>
        </form>
    </div>
</body>
</html>