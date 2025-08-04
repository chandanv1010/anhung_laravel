<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>404 - Không tìm thấy trang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #f9fafb;
            color: #333;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            flex-direction: column;
        }

        h1 {
            font-size: 10rem;
            margin: 0;
            color: #1e3a8a;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            color: #6b7280;
        }

        a {
            display: inline-block;
            margin-top: 2rem;
            padding: 12px 24px;
            background-color: #1e3a8a;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        a:hover {
            background-color: #374151;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 6rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <h2>Oops! Không tìm thấy trang.</h2>
    <p>Trang bạn đang tìm có thể đã bị xóa hoặc chưa bao giờ tồn tại.</p>
    <a href="{{ url('/') }}">Quay về trang chủ</a>
</body>
</html>
