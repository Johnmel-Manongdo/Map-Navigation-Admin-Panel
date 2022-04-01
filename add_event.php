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
              <a class="nav-link btn btn-success active m-1" href="add_event.php">Add Event</a>
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
    <h2>Add Event</h2>
    <form action="php/create.php" method="POST">
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $_GET['error']; ?>
        </div>
      <?php } ?>
      <!-- items that will participate in magic -->
      <!-- don't use .row class!  -->
      <div class="row mt-5">
        <div class="col-md-offset-right-6 col-md-6 col-sm-12 form-group">
          <label for="eventName"><b>Event Title</b></label>
          <input class="form-control" value="<?php if (isset($_GET['eventName']))
                                                echo ($_GET['eventName']); ?>" id="inputEventName" type="text" name="eventName" placeholder="Enter event here..." required />
        </div>



        <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
          <label for="eventStartDate"><b>Start Date</b></label>
          <input class="form-control" value="<?php if (isset($_GET['eventStartDate']))
                                                echo ($_GET['eventStartDate']); ?>" id="txtdate" type="date" name="eventStartDate" required />
        </div>

        <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
          <label for="eventEndDate"><b>End Date</b></label>
          <input class="form-control" value="<?php if (isset($_GET['eventEndDate']))
                                                echo ($_GET['eventEndDate']); ?>" id="txtdate" type="date" name="eventEndDate" required />
        </div>

        <div class="col-md-offset-right-6 col-md-6 col-sm-12 form-group">
          <label for="eventPlace"><b>Event Venue</b></label>
          <select class="form-control" value="<?php if (isset($_GET['eventPlace']))
                                                echo ($_GET['eventPlace']); ?>" id="exampleSelect1" name="eventPlace" required>
            <option selected hidden value="">Select Building</option>
            <option value="Automative Building">Automative Building</option>
            <option value="BE Building">BE Building</option>
            <option value="CHS Building">CHS Building</option>
            <option value="CMA Building">CMA Building</option>
            <option value="Engineering Building">Engineering Building</option>
            <option value="Faculty Center">Faculty Center</option>
            <option value="FVR Building">FVR Building</option>
            <option value="ITC Building">ITC Building</option>
            <option value="MBA Building">MBA Building</option>
            <option value="NH Building">NH Building</option>
            <option value="Student Plaza">Student Plaza</option>
            <option value="Gymnasium">Gymnasium</option>
          </select>
        </div>

        <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
          <label for="eventStartTime"><b>Start Time</b></label>
          <input class="form-control" value="<?php if (isset($_GET['eventStartTime']))
                                                echo ($_GET['eventStartTime']); ?>" id="exampleInputEmail1" type="time" name="eventStartTime" required />
        </div>
        <div class="col-md-offset-right-6 col-md-3 col-sm-12 form-group">
          <label for="eventEndTime"><b>End Time</b></label>
          <input class="form-control" value="<?php if (isset($_GET['eventEndTime']))
                                                echo ($_GET['eventEndTime']); ?>" id="exampleInputEmail1" type="time" name="eventEndTime" required />
        </div>
        <div class="col-md-full-height col-md-6 col-sm-12 form-group">
          <label for="eventDesc"><b>Description</b></label>
          <textarea name="eventDesc" class="form-control item-full-height" value="<?php if (isset($_GET['eventDesc']))
                                                                                    echo ($_GET['eventDesc']); ?>" id="textarea" placeholder="Enter description..." cols="10" rows="6" required></textarea>
        </div>
        <!-- this clearfix is nesesary -->
        <div class="clearfix"></div>
      </div>
      <!--/ items that will participate in magic -->

      <div class="col-md-12 col-sm-12 pull-right-md text-right form-group">
        <button onclick="checker()" class="btn btn-success" name="addEventBtn" type="submit">ADD</button>
      </div>
      <!-- this clearfix is nesesary -->
      <div class="clearfix"></div>
    </form>
  </div>
  <script>
    function checker() {
      var result = confirm('Are you sure you want to add this event?');
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