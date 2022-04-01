<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">ADMIN PANEL</h5>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>
                        <form action="php/password.php" method="POST">
                            <div>
                                <a href="home.php"><i class="fa fa-home fa-2x mb-3"></i></a>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="op" id="floatingInput" placeholder="Enter username here...">
                                <label for="floatingInput">Old Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="np" id="floatingPassword" placeholder="Enter password here...">
                                <label for="floatingPassword">New Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="cp" id="floatingPassword" placeholder="Enter password here...">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <div class="d-grid">
                                <button onclick="checker()" class="btn btn-success btn-login text-uppercase fw-bold" type="submit">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checker() {
            var result = confirm('Are you sure you want to change your password?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</body>

</html>