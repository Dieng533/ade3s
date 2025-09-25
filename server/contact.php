<?php
// Simple contact form handler: saves message to MySQL
header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if ($method !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'error' => 'Méthode non autorisée']);
  exit;
}

// Basic validation
function field($key) {
  return trim($_POST[$key] ?? '');
}
$name = field('name');
$email = field('email');
$phone = field('phone');
$message = field('message');

if ($name === '' || $email === '' || $message === '') {
  http_response_code(422);
  echo json_encode(['ok' => false, 'error' => 'Champs requis manquants']);
  exit;
}

// DB config (update with real credentials)
$dbHost = getenv('ADE3S_DB_HOST') ?: '127.0.0.1';
$dbName = getenv('ADE3S_DB_NAME') ?: 'ade3s';
$dbUser = getenv('ADE3S_DB_USER') ?: 'root';
$dbPass = getenv('ADE3S_DB_PASS') ?: '';

try {
  $dsn = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
  $pdo = new PDO($dsn, $dbUser, $dbPass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);

  $stmt = $pdo->prepare('INSERT INTO messages_contact (name, email, phone, message, created_at) VALUES (?, ?, ?, ?, NOW())');
  $stmt->execute([$name, $email, $phone, $message]);

  // Redirect back with success if form post (non-AJAX)
  if (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') === false) {
    header('Location: /contact.html');
    exit;
  }

  echo json_encode(['ok' => true]);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'error' => 'Erreur serveur']);
}


