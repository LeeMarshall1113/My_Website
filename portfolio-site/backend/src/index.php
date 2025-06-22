<?php
require __DIR__.'/db.php';
header('Content-Type: application/json');
print json_encode($pdo->query('SELECT * FROM repos ORDER BY updated_at DESC')->fetchAll(PDO::FETCH_ASSOC));
