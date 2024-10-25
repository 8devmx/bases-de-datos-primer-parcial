<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'lib/head.php'; ?>
  <title>Inicio de sesión</title>
  <link rel="stylesheet" href="css/sign-in.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">
    <form method="POST" action="lib/login.php">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="correo" placeholder="name@example.com" name="correo">
        <label for="correo">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <label for="password">Password</label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
  </main>

</body>

</html>