<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database.sqlite');
require_once __DIR__ . '/../app/controllers/TeamController.php';

\$controller = new TeamController(\$db);
\$output = \$controller->handleRequest();

include __DIR__ . '/../app/views/index.php';
?>
