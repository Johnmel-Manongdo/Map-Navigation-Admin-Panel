<?php include "php/readFeedback.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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

        <h2 id="feedbackTitle">Feedback</h2>
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="input-group mb-3">
                        <select class="form-control" name="sortType">
                            <option value="all" hidden selected>Sort By...</option>
                            <optgroup label="Date">
                                <option value="DESC" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "DESC") {
                                                            echo "selected";
                                                        } ?>>Date (DESC)</option>
                                <option value="ASC" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "ASC") {
                                                        echo "selected";
                                                    } ?>>Date (ASC)</option>
                            </optgroup>
                            <optgroup label="Rating">
                                <option value="Rating Descending" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Rating Descending") {
                                                                        echo "selected";
                                                                    } ?>>Rating (DESC)</option>
                                <option value="Rating Ascending" <?php if (isset($_GET['sortType']) && $_GET['sortType'] == "Rating Ascending") {
                                                                        echo "selected";
                                                                    } ?>>Rating (ASC)</option>
                            </optgroup>
                        </select>
                        <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- <a href="#" class="btn btn-primary" data-toggle="collapse" data-target=".navbar-collapse.in" id="legend-btn">View Statistics</a> -->

        <?php if (isset($_GET['success'])) { ?>
            <script>
                swal({
                    title: "<?php echo $_GET['success']; ?>",
                    icon: "success",
                    button: "Okay",
                });
            </script>
        <?php } ?>


        <?php if (mysqli_num_rows($result)) { ?>
            <div class="row">
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-sm-6">
                        <div class="card text-dark border-dark bg-white mb-3 mt-3">
                            <div class="card-header">
                                <p class="card-text" id="rating"><b>Rating:</b> <?= $rows['feedbackRating']; ?></p>
                                <img src="<?= "assets/img/" . $rows['feedbackEmoji']; ?>" alt="" id="emoji" height="40px" width="40px">
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= $rows['feedbackText']; ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text"><small><?= date('M d, Y', strtotime($rows['feedbackDate'])); ?>, <?= date('h:i A', strtotime($rows['feedbackTime'])); ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

    <!-- <div class="modal fade" id="legendModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>

                </div>
                <div class="modal-body">

                    <img src="assets/img/sad.png" alt="" width="60px" height="60px">
                    <img src="assets/img/thinking.png" alt="" width="60px" height="60px">
                    <img src="assets/img/smile.png" alt="" width="60px" height="60px">
                    <img src="assets/img/wow.png" alt="" width="60px" height="60px">
                    <img src="assets/img/emoji.png" alt="" width="60px" height="60px">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#legend-btn").click(function() {
            $("#legendModal").modal("show");
            $(".navbar-collapse.in").collapse("hide");
            return false;
        });
    </script> -->

    <script>
        function checker() {
            var result = confirm('Are you sure to delete this?');
            if (result == false) {
                event.preventDefault();
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