<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "25cs088");

$conn = mysqli_connect(
    DB_HOST,
    DB_USER,
    DB_PASS,
    DB_NAME
);

if (!$conn) {
    die("Database connection failed: " .
        mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection | Fieldnote</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f1e9;
            color: #1d2421;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
            padding: 40px;
            background: #ffffff;
            border-top: 5px solid #b74b32;
        }

        .tag {
            color: #73776f;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            margin: 20px 0 10px;
            font-size: 32px;
        }

        p {
            color: #73776f;
            line-height: 1.7;
        }

        .status {
            margin-top: 25px;
            padding: 15px;
            background: #e5efe5;
            color: #28613b;
            font-weight: bold;
        }

        .details {
            margin-top: 20px;
            font-size: 14px;
            line-height: 1.8;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tag">Fieldnote / System Status</div>

        <h1>Database Connection</h1>

        <p>
            The application has established a connection
            with the MySQL database.
        </p>

        <div class="status">
            Connection Successful
        </div>

        <div class="details">
            <strong>Server:</strong> localhost<br>
            <strong>Database:</strong> 25cs088<br>
            <strong>Character Set:</strong> utf8mb4
        </div>
    </div>
</body>
</html>
