<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

function clean_input($value) {
    return trim((string)$value);
}

$name = clean_input($_POST["name"] ?? "");
$email = clean_input($_POST["email"] ?? "");
$phone = clean_input($_POST["phone"] ?? "");
$message = clean_input($_POST["message"] ?? "");
$errors = [];

if (mb_strlen($name) < 2 || mb_strlen($name) > 100) {
    $errors[] = "Name must be between 2 and 100 characters.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
    $errors[] = "Enter a valid email address.";
}
$phoneDigits = preg_replace("/\D/", "", $phone);
if (strlen($phoneDigits) < 10 || strlen($phoneDigits) > 15) {
    $errors[] = "Phone number must contain 10 to 15 digits.";
}
if (mb_strlen($message) < 5 || mb_strlen($message) > 500) {
    $errors[] = "Message must be between 5 and 500 characters.";
}

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submission status | Fieldnote</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;600;700&family=Playfair+Display:wght@700&display=swap');

    * {
        box-sizing: border-box
    }

    body {
        margin: 0;
        background: #f4f1e9;
        color: #1d2421;
        font-family: 'DM Sans', Arial, sans-serif;
        padding: 7vh 20px
    }

    main {
        max-width: 700px;
        margin: auto;
        border-top: 5px solid #b74b32;
        padding: 35px 0
    }

    .tag {
        font: 11px 'DM Mono', monospace;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #73776f
    }

    h1 {
        font: 700 clamp(35px, 7vw, 58px) 'Playfair Display', Georgia, serif;
        margin: 16px 0
    }

    p,
    li {
        line-height: 1.7
    }

    ul {
        padding-left: 22px
    }

    a {
        display: inline-block;
        margin: 18px 18px 0 0;
        color: #1d2421;
        text-underline-offset: 4px
    }
    </style>
</head>

<body>
    <main>
        <div class="tag">Fieldnote / Submission status</div>
        <?php if ($errors): ?>
        <h1>Let's fix a few things.</h1>
        <p>Your details were not saved. Review the following and try again:</p>
        <ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul>
        <a href="index.php">← Return to form</a>
        <?php else:
    $directory = __DIR__ . "/data";
    $file = $directory . "/registrations.csv";
    if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
        http_response_code(500);
        echo "<h1>Storage unavailable</h1><p>The data folder could not be created. Please check folder permissions.</p>";
        exit;
    }
    $handle = fopen($file, "a");
    if (!$handle) {
        http_response_code(500);
        echo "<h1>Storage unavailable</h1><p>Unable to open the CSV file. Check folder permissions.</p>";
        exit;
    }
    if (!flock($handle, LOCK_EX)) {
        fclose($handle);
        http_response_code(500);
        echo "<h1>Storage busy</h1><p>Please try again in a moment.</p>";
        exit;
    }
    if (fstat($handle)["size"] === 0) {
        fputcsv($handle, ["Name", "Email", "Phone", "Message", "Submitted At"]);
    }
    $saved = fputcsv($handle, [$name, $email, $phone, $message, date("Y-m-d H:i:s")]);
    fflush($handle);
    flock($handle, LOCK_UN);
    fclose($handle);
    if (!$saved) {
        http_response_code(500);
        echo "<h1>Save failed</h1><p>Your record could not be saved. Please try again.</p>";
        exit;
    }
?>
        <h1>Message received.</h1>
        <p>Your submission has been validated and saved successfully.</p>
        <a href="index.php">＋ Submit another</a>
        <a href="record.php">View records →</a>
        <?php endif; ?>
    </main>
</body>

</html>