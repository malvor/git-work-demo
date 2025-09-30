<?php

/**
 * Configuration file for Git operations demonstration
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'git_demo');
define('DB_USER', 'demo_user');
define('DB_PASS', 'demo_password');

// Application settings
define('APP_NAME', 'Git Operations Demo');
define('APP_VERSION', '1.0.0');
define('DEBUG_MODE', true);

// User settings
define('MIN_USERNAME_LENGTH', 3);
define('MAX_USERNAME_LENGTH', 50);
define('PASSWORD_MIN_LENGTH', 8);

// Email settings
define('SMTP_HOST', 'smtp.example.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'noreply@example.com');
define('SMTP_PASSWORD', 'smtp_password');

// Session settings
define('SESSION_TIMEOUT', 3600); // 1 hour
define('REMEMBER_ME_DURATION', 2592000); // 30 days

// Security settings (HOTFIX: Added security enhancements)
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutes
define('CSRF_TOKEN_EXPIRY', 1800); // 30 minutes
define('SECURE_COOKIES', true);
define('HTTPONLY_COOKIES', true);
