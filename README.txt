FIELDNOTE — PHP FORM PROCESSING PRACTICAL

Files:
- index.php: redesigned contact/registration form
- process.php: POST handling, server-side validation, CSV storage, status page
- record.php: displays saved CSV records
- data/: CSV storage folder (created automatically if needed)

Run with XAMPP:
1. Extract the folder into C:\xampp\htdocs\
2. Start Apache in the XAMPP Control Panel.
3. Open http://localhost/Practical7_New_Design/index.php
4. Submit valid details, then choose "View saved records".
5. The CSV file is created at data/registrations.csv after the first valid submission.

The layout has been changed structurally (editorial split-screen form, typography, field arrangement,
archive table and status page), not merely recoloured. The form keeps POST processing and CSV storage.
