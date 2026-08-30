EASY BookHub

Database: sushant

1. Import database.sql in phpMyAdmin.
2. Put project inside htdocs.
3. If using SMTP/OTP, run: composer install
4. Open mail_config.php and set SMTP_EMAIL and SMTP_PASSWORD.
5. Open: http://localhost/Library_Management_System_Easy/index.php

Demo accounts:
Super Admin: superadmin@gmail.com / superadmin123
Admin: admin@gmail.com / admin123
User: rahul@gmail.com / 123456

The database.sql contains the same users and books data from the original project.
OTP is stored in users.reset_otp, expires after 5 minutes, and is cleared after successful password reset.
