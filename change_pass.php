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
                        <img src="assets/img/logo.png" alt="logo" class="center" width="150px" height="150px">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">PHINMA UPang Navigation Map Admin Panel
                        </h5>
                        <?php if (isset($_GET['error'])) { ?> <div
                            class="alert alert-danger alert-dismissible fade show">
                            <p class="error"><strong><?php echo $_GET['error']; ?></strong></p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                        <script>
                        swal({
                            title: "<?php echo $_GET['success']; ?>",
                            icon: "success",
                            button: "Okay",
                        });
                        </script>
                        <?php } ?>
                        <form action="php/password.php" method="POST">
                            <div>
                                <a href="home.php"><i class="fa fa-home fa-2x mb-3"></i></a>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="op" id="floatingInput"
                                    placeholder="Enter username here...">
                                <label for="floatingInput">Old Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="np" id="floatingPassword"
                                    placeholder="Enter password here...">
                                <label for="floatingPassword">New Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="cp" id="floatingPassword"
                                    placeholder="Enter password here...">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <div class="d-grid">
                                <button onclick="checker()" class="btn btn-success btn-login text-uppercase fw-bold"
                                    type="submit">Change Password</button>
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