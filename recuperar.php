<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'lib/head.php'; ?>
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/sign-in.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
  <form method="POST" action="lib/correo.php">
    <h1 class="h3 mb-3 fw-normal">Introduce tu email</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="correo" placeholder="name@example.com" name="correo">
      <label for="correo">Email address</label><br>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Solicitar nip de recuperación</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
  </form>
</main>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
