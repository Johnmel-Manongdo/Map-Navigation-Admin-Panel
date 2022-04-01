<?php include "php/read.php"; ?>
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
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <div class="btn-group m-1">
            <li class="nav-item">
              <a class="nav-link btn btn-success active m-1" aria-current="page" href="home.php">View Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary m-1" href="add_event.php">Add Event</a>
            </li>
            <li class="nav-item dropdown">
              <div class="btn-group m-1">
                <button type="button" class="btn btn-primary dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                  User
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
    <h2>View Events</h2>
    <?php if (isset($_GET['success'])) { ?>
      <script>
        swal({
          title: "<?php echo $_GET['success']; ?>",
          icon: "success",
          button: "Okay",
        });
      </script>
    <?php } ?>

    <div class="table-responsive mt-5">
      <?php if (mysqli_num_rows($result)) { ?>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th></th>
              <th>Event Name</th>
              <th>Venue</th>
              <th>Date</th>
              <th>Time</th>
              <th>Description</th>
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
                <td style="text-transform: capitalize"><?= $rows['eventName']; ?></td>
                <td><?= $rows['eventPlace']; ?></td>
                <td><?= date('M d, Y', strtotime($rows['eventStartDate'])); ?> - <?= date('M d, Y', strtotime($rows['eventEndDate'])); ?></td>
                <td><?= date('h:i A', strtotime($rows['eventStartTime'])); ?> - <?= date('h:i A', strtotime($rows['eventEndTime'])); ?></td>
                <td style="word-wrap: break-word; min-width: 200px;max-width: 200px;"><?= $rows['eventDesc']; ?>
                </td>
                <td><a href="update_event.php?eventID=<?= $rows['eventID'] ?>" class="btn btn-success">Update</a>

                  <a onclick="checker()" href="php/delete.php?eventID=<?= $rows['eventID'] ?>" class="btn btn-danger">Delete</a>
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