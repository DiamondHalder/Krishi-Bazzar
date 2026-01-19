<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
ob_clean(); // Prevents HTML warnings from breaking JSON
header('Content-Type: application/json');
require_once('../db/database.php');
