<?php
// Simple PHP login example (for demo only; replace with a real user store and hashing in production)
session_start();

$validUser = 'admin';
$validPass = 'password123'; // demo password only
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === $validUser && $password === $validPass) {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6fb; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .card { width: 320px; padding: 24px; background: #fff; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .card h1 { margin: 0 0 16px; font-size: 22px; }
        .field { margin-bottom: 12px; }
        .field label { display: block; margin-bottom: 6px; font-size: 14px; color: #333; }
        .field input { width: 100%; padding: 10px 12px; border: 1px solid #ccd3e0; border-radius: 6px; font-size: 14px; }
        .btn { width: 100%; padding: 12px; background: #2d6cdf; color: #fff; border: none; border-radius: 6px; font-size: 15px; cursor: pointer; }
        .btn:hover { background: #2559b8; }
        .error { margin: 10px 0; color: #c0392b; font-size: 14px; }
        .hint { margin-top: 12px; font-size: 13px; color: #777; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Login</h1>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="btn" type="submit">Sign in</button>
        </form>
        <div class="hint">Demo login: admin / password123</div>
    </div>
</body>
</html>
