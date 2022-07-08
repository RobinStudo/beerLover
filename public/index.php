<?php
require_once "../vendor/autoload.php";

use App\Core\Kernel;

// Point d'entrée de notre application
$kernel = new Kernel();
$kernel->handle();

