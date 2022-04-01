<?php include 'php/update.php'; ?>
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
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
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
        <h2>Update Event</h2>
        <form action="php/update.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <p class="error"><strong><?php echo $_GET['error']; ?></strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php } ?>
            <div class="row mt-5">
                <div class="col-md-offset-right-6 col-md-6 col-sm-12 form-group">
                    <label for="eventName"><b>Event Title</b></label>
                    <input class="form-control" id="inputEventName" value="<?= $row['eventName'] ?>" name="eventName"
                        type="text" placeholder="Enter event here..." />
                </div>

                <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
                    <label for="eventStartDate"><b>Start Date</b></label>
                    <input class="form-control" value="<?= $row['eventStartDate'] ?>" id="exampleInputEmail1"
                        type="date" name="eventStartDate" required />
                </div>

                <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
                    <label for="eventEndDate"><b>End Date</b></label>
                    <input class="form-control" value="<?= $row['eventEndDate'] ?>" id="exampleInputEmail1" type="date"
                        name="eventEndDate" required />
                </div>

                <div class="col-md-offset-right-6 col-md-6 col-sm-12 form-group">
                    <label for="eventPlace"><b>Event Venue</b></label>
                    <select class="form-control" id="exampleSelect1" name="eventPlace" required>
                        <option selected hidden value="">Select Building</option>
                        <option value="Automative Building"
                            <?= $row['eventPlace'] == 'Automative Building' ? 'selected' : '' ?>>Automative Building
                        </option>
                        <option value="BE Building" <?= $row['eventPlace'] == 'BE Building' ? 'selected' : '' ?>>BE
                            Building</option>
                        <option value="CHS Building" <?= $row['eventPlace'] == 'CHS Building' ? 'selected' : '' ?>>CHS
                            Building</option>
                        <option value="CMA Building" <?= $row['eventPlace'] == 'CMA Building' ? 'selected' : '' ?>>CMA
                            Building</option>
                        <option value="Engineering Building"
                            <?= $row['eventPlace'] == 'Engineering Building' ? 'selected' : '' ?>>Engineering Building
                        </option>
                        <option value="Faculty Center" <?= $row['eventPlace'] == 'Faculty Center' ? 'selected' : '' ?>>
                            Faculty Center</option>
                        <option value="FVR Building" <?= $row['eventPlace'] == 'FVR Building' ? 'selected' : '' ?>>FVR
                            Building</option>
                        <option value="ITC Building" <?= $row['eventPlace'] == 'ITC Building' ? 'selected' : '' ?>>ITC
                            Building</option>
                        <option value="MBA Building" <?= $row['eventPlace'] == 'MBA Building' ? 'selected' : '' ?>>MBA
                            Building</option>
                        <option value="NH Building" <?= $row['eventPlace'] == 'NH Building' ? 'selected' : '' ?>>NH
                            Building</option>
                        <option value="Student Plaza" <?= $row['eventPlace'] == 'Student Plaza' ? 'selected' : '' ?>>
                            Student Plaza</option>
                        <option value="Gymnasium" <?= $row['eventPlace'] == 'Gymnasium' ? 'selected' : '' ?>>Gymnasium
                        </option>

                    </select>
                </div>

                <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
                    <label for="eventStartTime"><b>Start Time</b></label>
                    <input class="form-control" value="<?= $row['eventStartTime'] ?>" id="exampleInputEmail1"
                        type="time" name="eventStartTime" required />
                </div>

                <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
                    <label for="eventEndTime"><b>End Time</b></label>
                    <input class="form-control" value="<?= $row['eventEndTime'] ?>" id="exampleInputEmail1" type="time"
                        name="eventEndTime" required />
                </div>

                <div class="col-md-full-height col-md-6 col-sm-12 form-group">
                    <label for="eventDesc"><b>Description</b></label>
                    <textarea name="eventDesc" class="form-control item-full-height" id="textarea"
                        placeholder="Enter description here..." cols="10"
                        rows="6"><?php echo htmlspecialchars(
                                                                                                                                                      $row['eventDesc'],
                                                                                                                                                      ENT_QUOTES,
                                                                                                                                                      'UTF-8'
                                                                                                                                                    ) ?></textarea>
                </div>
                <div class="col-md-offset-right-6 col-md-6 col-sm-12 form-group">
                    <input class="form-control" id="inputEventName" value="<?= $row['eventID'] ?>" name="eventID"
                        type="text" placeholder="ID" hidden />
                </div>
                <!-- this clearfix is nesesary -->
                <div class="clearfix"></div>
            </div>
            <!--/ items that will participate in magic -->

            <div class="col-md-12 col-sm-12 pull-right-md text-right form-group">
                <button onclick="checker()" class="btn btn-success" type="submit" name="updateEventBtn">UPDATE</button>
            </div>
            <!-- this clearfix is nesesary -->
            <div class="clearfix"></div>
        </form>
    </div>
    <script>
    function checker() {
        var result = confirm('Are you sure you want to update this event?');
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