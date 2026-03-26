<?php
// ====================== CORS HEADERS ======================
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Access-Control-Allow-Credentials: true');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit(0);
}
// =========================================================

use CodeIgniter\Boot;
use Config\Paths;

// Path to the front controller (this file's directory)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is the front controller's directory
if (getcwd() !== FCPATH) {
    chdir(FCPATH);
}

// Check PHP version
$minPhpVersion = '8.1';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    exit(sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter 4. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    ));
}

// Load Composer's autoloader (CRITICAL: this must come before anything else)
require FCPATH . '../vendor/autoload.php';

// Load our paths config
require FCPATH . '../app/Config/Paths.php';

$paths = new Paths();

// Load the framework Boot file and launch the application
require $paths->systemDirectory . '/Boot.php';

exit(Boot::bootWeb($paths));