<?php
$file = __DIR__ . "/data/registrations.csv";
$rows = [];
if (is_readable($file) && ($handle = fopen($file, "r")) !== false) {
    while (($row = fgetcsv($handle)) !== false) {
        $rows[] = $row;
    }
    fclose($handle);
}
function safe($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submission archive | Fieldnote</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap');

    :root {
        --ink: #1d2421;
        --paper: #f4f1e9;
        --line: #d6d2c8;
        --accent: #b74b32;
        --muted: #73776f
    }

    * {
        box-sizing: border-box
    }

    body {
        margin: 0;
        background: var(--paper);
        color: var(--ink);
        font-family: 'DM Sans', Arial, sans-serif;
        padding: clamp(18px, 5vw, 60px)
    }

    main {
        max-width: 1200px;
        margin: auto
    }

    .eyebrow {
        font: 11px 'DM Mono', monospace;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--muted)
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 20px;
        border-bottom: 1px solid var(--line);
        padding-bottom: 25px
    }

    h1 {
        font: 700 clamp(36px, 6vw, 62px) 'Playfair Display', Georgia, serif;
        margin: 12px 0 0
    }

    .count {
        font: 12px 'DM Mono', monospace;
        color: var(--accent)
    }

    .table-wrap {
        overflow-x: auto;
        margin-top: 30px
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px
    }

    th {
        text-align: left;
        font: 11px 'DM Mono', monospace;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--muted);
        padding: 14px 12px;
        border-bottom: 2px solid var(--ink)
    }

    td {
        padding: 16px 12px;
        border-bottom: 1px solid var(--line);
        vertical-align: top;
        font-size: 14px;
        line-height: 1.5
    }

    tbody tr:hover {
        background: #eae5da
    }

    .empty {
        padding: 28px 0;
        color: var(--muted)
    }

    a {
        display: inline-block;
        margin-top: 28px;
        color: var(--ink);
        text-underline-offset: 4px
    }
    </style>
</head>

<body>
    <main>
        <header>
            <div>
                <div class="eyebrow">Fieldnote / Data archive</div>
                <h1>Saved submissions</h1>
            </div>
            <div class="count"><?= max(0, count($rows) - 1) ?> RECORD(S)</div>
        </header>
        <?php if (count($rows) <= 1): ?>
        <p class="empty">No submissions have been saved yet. Once a form is completed, its record will appear here.</p>
        <?php else: ?>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><?php foreach ($rows[0] as $heading): ?><th><?= safe($heading) ?></th><?php endforeach; ?></tr>
                </thead>
                <tbody><?php foreach (array_slice($rows, 1) as $row): ?><tr><?php foreach ($row as $cell): ?><td>
                            <?= nl2br(safe($cell)) ?></td><?php endforeach; ?></tr><?php endforeach; ?></tbody>
            </table>
        </div>
        <?php endif; ?>
        <a href="index.php">← Back to contact form</a>
    </main>
</body>

</html>