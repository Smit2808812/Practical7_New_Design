<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fieldnote | Contact Desk</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

    :root {
        --ink: #1d2421;
        --paper: #f4f1e9;
        --line: #d6d2c8;
        --muted: #73776f;
        --accent: #b74b32
    }

    * {
        box-sizing: border-box
    }

    body {
        margin: 0;
        background: var(--paper);
        color: var(--ink);
        font-family: 'DM Sans', Arial, sans-serif
    }

    .page {
        min-height: 100vh;
        display: grid;
        grid-template-columns: minmax(250px, .8fr) minmax(320px, 1.2fr);
        max-width: 1180px;
        margin: auto
    }

    .intro {
        background: var(--ink);
        color: #f4f1e9;
        padding: clamp(28px, 5vw, 64px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh
    }

    .brand {
        font: 500 12px 'DM Mono', monospace;
        letter-spacing: 2px;
        text-transform: uppercase
    }

    .kicker {
        font: 12px 'DM Mono', monospace;
        color: #d9a092;
        letter-spacing: 1.5px;
        text-transform: uppercase
    }

    h1 {
        font: 700 clamp(42px, 6vw, 72px)/1.02 'Playfair Display', Georgia, serif;
        letter-spacing: -2px;
        margin: 18px 0
    }

    .intro p {
        max-width: 340px;
        color: #c9cec8;
        line-height: 1.8;
        font-size: 15px
    }

    .index {
        border-top: 1px solid #4b514b;
        margin-top: 45px;
        padding-top: 18px;
        font: 11px 'DM Mono', monospace;
        color: #aeb4ad;
        letter-spacing: 1px
    }

    .content {
        padding: clamp(24px, 5vw, 66px);
        display: flex;
        align-items: center
    }

    .form-wrap {
        width: 100%;
        max-width: 570px;
        margin: auto
    }

    .topline {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        align-items: center;
        border-bottom: 1px solid var(--line);
        padding-bottom: 18px;
        margin-bottom: 30px
    }

    .topline span {
        font: 11px 'DM Mono', monospace;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--muted)
    }

    h2 {
        font: 700 32px 'Playfair Display', Georgia, serif;
        margin: 0 0 9px
    }

    .lead {
        color: var(--muted);
        line-height: 1.65;
        margin: 0 0 30px;
        font-size: 14px
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px 18px
    }

    .field {
        display: flex;
        flex-direction: column;
        gap: 9px
    }

    .field.full {
        grid-column: 1/-1
    }

    label {
        font: 11px 'DM Mono', monospace;
        text-transform: uppercase;
        letter-spacing: 1px
    }

    input,
    textarea {
        width: 100%;
        border: 0;
        border-bottom: 1px solid #aaa99f;
        background: transparent;
        border-radius: 0;
        padding: 12px 2px;
        font: 15px 'DM Sans', sans-serif;
        color: var(--ink);
        outline: none
    }

    input:focus,
    textarea:focus {
        border-bottom: 2px solid var(--accent)
    }

    textarea {
        min-height: 120px;
        resize: vertical
    }

    button {
        grid-column: 1/-1;
        background: var(--accent);
        border: 0;
        color: white;
        padding: 16px 20px;
        text-align: left;
        font: 600 13px 'DM Mono', monospace;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    button:hover {
        background: #913a27
    }

    .foot {
        margin-top: 25px;
        display: flex;
        justify-content: space-between;
        gap: 14px;
        align-items: center;
        font-size: 12px;
        color: var(--muted)
    }

    a {
        color: var(--ink);
        text-decoration-thickness: 1px;
        text-underline-offset: 4px
    }

    @media(max-width:760px) {
        .page {
            grid-template-columns: 1fr
        }

        .intro {
            min-height: auto;
            padding: 28px
        }

        .intro h1 {
            font-size: 48px
        }

        .intro p {
            margin-bottom: 0
        }

        .index {
            margin-top: 24px
        }

        .content {
            padding: 32px 22px
        }

        form {
            grid-template-columns: 1fr
        }

        .field.full,
        button {
            grid-column: auto
        }
    }
    </style>
</head>

<body>
    <div class="page">
        <aside class="intro">
            <div class="brand">FIELDNOTE / CONTACT DESK</div>
            <div>
                <div class="kicker">A better conversation starts here</div>
                <h1>Tell us<br>what's on<br>your mind.</h1>
                <p>Use this space to register your details or send a message. Your submission is checked before it is
                    saved.</p>
            </div>
            <div class="index">FORM 01 &nbsp; / &nbsp; STUDENT SERVICES<br>PHP • SERVER-SIDE VALIDATION</div>
        </aside>
        <main class="content">
            <section class="form-wrap">
                <div class="topline"><span>Submission portal</span><span>01 — 04</span></div>
                <h2>Contact details</h2>
                <p class="lead">Complete each field below. Please use a working email address and a phone number we can
                    reach.</p>
                <form action="process.php" method="POST">
                    <div class="field full">
                        <label for="name">Full name</label>
                        <input id="name" name="name" type="text" maxlength="100" autocomplete="name"
                            placeholder="e.g. Smit Prajapati" required>
                    </div>
                    <div class="field">
                        <label for="email">Email address</label>
                        <input id="email" name="email" type="email" maxlength="150" autocomplete="email"
                            placeholder="name@example.com" required>
                    </div>
                    <div class="field">
                        <label for="phone">Phone number</label>
                        <input id="phone" name="phone" type="tel" maxlength="20" autocomplete="tel"
                            placeholder="+91 98765 43210" required>
                    </div>
                    <div class="field full">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" maxlength="500" placeholder="Write your message here..."
                            required></textarea>
                    </div>
                    <button type="submit"><span>Send submission</span><span>↗</span></button>
                </form>
                <div class="foot"><span>Fields marked above are required.</span><a href="record.php">Open saved records
                        →</a></div>
            </section>
        </main>
    </div>
</body>

</html>