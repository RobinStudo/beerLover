<?php
require_once "../vendor/autoload.php";

use App\Core\Kernel;

$kernel = new Kernel();
$kernel->handle();

