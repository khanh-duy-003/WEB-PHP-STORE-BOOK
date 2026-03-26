<?php
// session_start();
// require_once ('vendor/autoload.php');
// require_once ('config/database.php');
// use Src\Route;
// Route::route_site();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "STEP 1: START<br>";

// ================== AUTOLOAD ==================
require __DIR__ . '/vendor/autoload.php';
echo "STEP 2: AUTOLOAD OK<br>";

// ================== DATABASE CONFIG ==================
require __DIR__ . '/config/database.php';
echo "STEP 3: DATABASE CONFIG OK<br>";

// ================== TEST DB CONNECTION ==================
use Illuminate\Database\Capsule\Manager as DB;

try {
    DB::connection()->getPdo();
    echo "STEP 4: DB CONNECT OK<br>";
} catch (Exception $e) {
    echo "STEP 4: DB CONNECT ERROR -> " . $e->getMessage() . "<br>";
    die();
}

// ================== TEST QUERY ==================
try {
    $result = DB::select("SELECT 1 as test");
    echo "STEP 5: QUERY OK<br>";
} catch (Exception $e) {
    echo "STEP 5: QUERY ERROR -> " . $e->getMessage() . "<br>";
    die();
}

// ================== TEST TABLE (nếu có) ==================
// đổi tên bảng của bạn ở đây nếu cần
try {
    $result = DB::select("SHOW TABLES");
    echo "STEP 6: TABLE LIST OK<br>";
} catch (Exception $e) {
    echo "STEP 6: TABLE ERROR -> " . $e->getMessage() . "<br>";
    die();
}

// ================== DONE ==================
echo "STEP 7: ALL OK - APP WORKING 🎉<br>";
