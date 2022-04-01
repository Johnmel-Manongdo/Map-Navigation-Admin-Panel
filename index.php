<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    body {
        background: #eae9e9;
        background: linear-gradient(to right, #eae9e9, #eae9e9);
    }

    .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
    }

    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <img src="/admin_panel/assets/img/logo.png" alt="" class="center" width="150px" height="150px">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">PHINMA UPang Navigation Map Admin Panel</h5>
                        <?php if (isset($_GET['success'])) { ?>
                            <script>
                                swal({
                                    title: "<?php echo $_GET['success']; ?>",
                                    icon: "success",
                                    button: "Okay",
                                });
                            </script>
                        <?php } ?>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <form action="php/login.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Enter username here...">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Enter password here...">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-success btn-login text-uppercase fw-bold" type="submit" name="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>