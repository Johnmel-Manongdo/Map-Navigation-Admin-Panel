<?php include "php/readProblem.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHINMA UPang</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNav">
                <ul class="navbar-nav">
                    <div class="btn-group m-1">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary m-1" aria-current="page" href="home.php">View Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary m-1" href="add_event.php">Add Event</a>
                        </li>
                        <li class="nav-item">
                            <div class="btn-group m-1">
                                <button type="button" class="btn btn-success active dropdown-toggle" data-toggle="dropdown">
                                    User
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="userFeedback.php">Feedback</a>
                                    <a class="dropdown-item" href="userProblem.php">Issues</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="change_pass.php">Change Password</a>
                                    <a class="dropdown-item" onclick="logoutChecker()" href="index.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container p-3 my-3 border">
        <h2>Issues</h2>
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="input-group mb-3">
                        <select class="form-control" name="sortType">
                            <option value="" hidden selected>Sort By...</option>
                            <optgroup label="Date">
                                <option value="DESC" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "DESC") {
                                                            echo "selected";
                                                        } ?>>Date (DESC)</option>
                                <option value="ASC" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "ASC") {
                                                        echo "selected";
                                                    } ?>>Date (ASC)</option>
                            </optgroup>
                            <optgroup label="Category">
                                <option value="all">All Category</option>
                                <option value="Bugs" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Bugs") {
                                                            echo "selected";
                                                        } ?>>Bugs</option>
                                <option value="Inaccuracy" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Inaccuracy") {
                                                                echo "selected";
                                                            } ?>>Inaccuracy</option>
                                <option value="Design" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Design") {
                                                            echo "selected";
                                                        } ?>>Design</option>
                                <option value="Others" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Others") {
                                                            echo "selected";
                                                        } ?>>Others</option>
                            </optgroup>
                            <optgroup label="Status">
                                <option value="Done" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Done") {
                                                            echo "selected";
                                                        } ?>>Done</option>
                                <option value="Pending" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Pending") {
                                                        echo "selected";
                                                    } ?>>Pending</option>
                            </optgroup>

                        </select>
                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
                    </div>
                </div>
            </div>
        </form>

        <?php if (isset($_GET['success'])) { ?>
            <script>
                swal({
                    title: "<?php echo $_GET['success']; ?>",
                    icon: "success",
                    button: "Okay",
                });
            </script>
        <?php } ?>

        <div class="table-responsive mt-1">
            <?php if (mysqli_num_rows($result)) { ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= date('M d, Y', strtotime($rows['problemDate'])); ?>, <?= date('h:i A', strtotime($rows['problemTime'])); ?></td>
                                <td style="text-transform: capitalize; word-wrap: break-word; min-width: 150px;max-width: 150px;"><?= $rows['problemTitle']; ?></td>
                                <td><?= $rows['problemType']; ?></td>
                                <td style="word-wrap: break-word; min-width: 200px;max-width: 200px;">
                                    <?= $rows['problemDesc']; ?></td>
                                <td><?= $rows['problemStatus']; ?></td>
                                <td>
                                    <a onclick="checker()" href="php/doneProblem.php?problemID=<?= $rows['problemID'] ?>" id="btn-done" class="btn btn-primary">Mark as Done</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    
    <script>
        function checker() {
            var result = confirm('Are you sure to mark this as done?');
            if (result == false) {
                event.preventDefault();
            } else {
                $('#btn-done').attr('disabled', true);
                $('#btn-done').addClass('disabled');
            }
        }
    </script>
    <script>
        function logoutChecker() {
            var result = confirm('Are you sure you want to logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</body>

</html>