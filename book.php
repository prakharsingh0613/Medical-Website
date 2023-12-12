<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mysqli = new mysqli("localhost", "root", "", "wellnesswise");
if (isset($_GET['date'])) {
  $date = $_GET['date'];
  $stmt = $mysqli->prepare("select * from bookings where date=?");
  $stmt->bind_param('s', $date);
  $bookings = array();
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $bookings[] = $row['timeslot'];
      }
      $stmt->close();
    }
  }
}
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $spec = $_POST['specialization'];
  $timeslot = $_POST['timeslot'];
  $stmt = $mysqli->prepare("select * from bookings where date=? AND timeslot=?");
  $stmt->bind_param('ss', $date, $timeslot);

  if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $msg = "<div class='alert alert-danger'>Already Booked</div>";
    } else {
      $stmt = $mysqli->prepare("INSERT INTO bookings (name,email,specialization,date,timeslot)VALUES(?,?,?,?,?)");
      $stmt->bind_param('sssss', $name, $email, $spec, $date, $timeslot);
      $stmt->execute();
      $msg = "<div class='alert alert-success'>Booking Successfull</div>";
      $bookings[] = $timeslot;


      if ($stmt->execute()) {
        echo "<div style='display: none;'>";
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
          $mail->isSMTP(); //Send using SMTP
          $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
          $mail->SMTPAuth = true; //Enable SMTP authentication
          $mail->Username = 'wellnesswise8@gmail.com'; //SMTP username
          $mail->Password = 'evrqecznsziykirv'; //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
          $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('wellnesswise8@gmail.com');
          $mail->addAddress($email);

          //Content
          $mail->isHTML(true); //Set email format to HTML
          $mail->Subject = 'WellnessWise Booking Confirmation';
          $mail->Body = 'Dear ' . $name . ',<br><br>' .
            'I am writing to confirm that your booking with WellnessWise has been successfully processed. You have booked for ' . $date . ' at ' . $timeslot . '. Please make sure to arrive at the clinic 10 minutes before your scheduled time.<br><br>' .
            'If for any reason you need to reschedule or cancel your appointment, please contact us at least 24 hours in advance.<br><br>' .
            'Thank you for choosing WellnessWise for your healthcare needs. We look forward to seeing you soon.<br><br>' .
            'Best regards,<br>[WellnessWise]';

          $mail->send();
          echo 'Message has been sent';
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "</div>";
        $msg = "<div class='alert alert-info'>Your appointment has been successfully booked and we have send you the confirmation mail</div>";
      } else {
        $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
      }
    }
  }
  $stmt->close();
  $mysqli->close();
}


$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "18:00";
function timeslots($duration, $cleanup, $start, $end)
{
  $start = new DateTime($start);
  $end = new Datetime($end);
  $interval = new DateInterval("PT" . $duration . "M");
  $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
  $slots = array();

  for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
    $endPeriod = clone $intStart;
    $endPeriod->add($interval);
    if ($endPeriod > $end) {
      break;
    }
    $slots[] = $intStart->format("H:iA") . "-" . $endPeriod->format("H:iA");
  }
  return $slots;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
  <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <!--=============== REMIX ICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <!--=============== CSS ===============-->
  <!--=============== CSS ===============-->


  <title>WellnessWise</title>

  <style>
    /*=============== GOOGLE FONTS ===============*/
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

    /*=============== VARIABLES CSS ===============*/
    :root {
      --header-height: 3rem;

      /*========== Colors ==========*/
      --hue: 174;
      --sat: 63%;
      --first-color: hsl(var(--hue), var(--sat), 40%);
      --first-color-alt: hsl(var(--hue), var(--sat), 36%);
      --title-color: hsl(var(--hue), 12%, 15%);
      --text-color: hsl(var(--hue), 8%, 35%);
      --body-color: hsl(var(--hue), 100%, 99%);
      --navcontainer-color: #FFF;

      /*========== Font and typography ==========*/
      --body-font: 'Open Sans', sans-serif;
      --h1-font-size: 1.5rem;
      --normal-font-size: .938rem;
      --tiny-font-size: .625rem;

      /*========== z index ==========*/
      --z-tooltip: 10;
      --z-fixed: 100;
    }

    @media screen and (min-width: 968px) {
      :root {
        --h1-font-size: 2.25rem;
        --normal-font-size: 1rem;
      }
    }

    /*=============== BASE ===============*/
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: var(--header-height) 0 0 0;
      font-family: var(--body-font);
      font-size: var(--normal-font-size);
      background-color: var(--body-color);
      color: var(--text-color);
    }

    ul {
      list-style: none;
    }

    a {
      text-decoration: none;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    /*=============== REUSABLE CSS CLASSES ===============*/
    .section {
      padding: 4.5rem 0 2rem;
    }

    .section__title {
      font-size: var(--h1-font-size);
      color: var(--title-color);
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .section__height {
      height: 100vh;
    }

    /*=============== LAYOUT ===============*/
    .navcontainer {
      max-width: 968px;
      margin-left: 1rem;
      margin-right: 1rem;
    }

    /*=============== HEADER ===============*/
    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: var(--navcontainer-color);
      z-index: var(--z-fixed);
      transition: .4s;
    }

    body,
    button,
    input,
    textarea {
      font-family: var(--body-font);
      font-size: var(--normal-font-size);
    }

    body {
      margin: var(--header-height) 0 0 0;
      background-color: var(--body-color);
      color: var(--text-color);

    }

    button {
      cursor: pointer;
      border: none;
      outline: none;
    }

    h1,
    h2,
    h3 {
      color: var(--title-color);
      font-weight: var(--font-semi-bold);
    }

    ul {
      list-style: none;
    }

    a {
      text-decoration: none;
    }

    img {
      max-width: 100%;
      height: auto;
    }


    /*=============== REUSABLE CSS CLASSES ===============*/


    .section__title,
    .section__title-center {
      font-size: var(--h2-font-size);
      margin-bottom: var(--mb-2);
      line-height: 140%;
    }

    .section__title-center {
      text-align: center;
    }


    .grid {
      display: grid;
    }

    .main {
      overflow: hidden;
      /*For animation*/
    }

    /* Show menu */
    .show-menu {
      right: 0;
    }

    /* Change background header */
    .scroll-header {
      box-shadow: 0 1px 4px hsla(var(--hue), 4%, 15%, .1);
    }

    /* Active link */
    .active-link {
      position: relative;
      color: var(--first-color);
    }

    .active-link::after {
      content: '';
      position: absolute;
      bottom: -.5rem;
      left: 0;
      width: 50%;
      height: 2px;
      background-color: var(--first-color);
    }


    .nav {
      height: 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;

    }


    .nav__logo {
      color: var(--title-color);
      font-weight: 600;
    }

    @media screen and (max-width: 767px) {

      .nav__menu {
        position: fixed;
        bottom: 0;
        left: 0;
        background-color: var(--navcontainer-color);
        box-shadow: 0 -1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
        width: 100%;
        height: 4rem;
        padding: 0 1rem;
        display: grid;
        align-content: center;
        border-radius: 1.25rem 1.25rem 0 0;
        transition: .4s;

      }
    }

    .nav__list,
    .nav__link {
      display: flex;
    }

    .nav__link {
      flex-direction: column;
      align-items: center;
      row-gap: 4px;
      color: var(--title-color);
      font-weight: 600;

    }

    .nav__list {
      justify-content: space-around;
    }

    .nav__name {
      font-size: var(--tiny-font-size);
      /* display: none;*/
      /* Minimalist design, hidden labels */
    }

    .nav__icon {
      font-size: 1.5rem;
    }

    /*Active link*/
    .active-link {
      position: relative;
      color: var(--first-color);
      transition: .3s;
    }

    /* Change background header */
    .scroll-header {
      box-shadow: 0 1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
    }

    /*=============== MEDIA QUERIES ===============*/
    /* For small devices */
    /* Remove if you choose, the minimalist design */
    @media screen and (max-width: 320px) {
      .nav__name {
        display: none;
      }
    }

    /* For medium devices */
    @media screen and (min-width: 576px) {
      .nav__list {
        justify-content: center;
        column-gap: 3rem;
      }
    }

    @media screen and (min-width: 767px) {
      body {
        margin: 0;
      }

      .section {
        padding: 7rem 0 2rem;
      }

      .nav {
        height: calc(var(--header-height) + 1.5rem);
        /* 4.5rem */
      }

      .nav__icon {
        display: none;
      }

      .nav__name {
        font-size: 12px;

        /* display: block; */
        /* Minimalist design, visible labels */
      }

      .nav__link:hover {
        color: var(--first-color);

      }

      /* First design, remove if you choose the minimalist design */
      .active-link::before {
        content: '';
        position: absolute;
        bottom: -.75rem;
        width: 4px;
        height: 4px;
        background-color: var(--first-color);
        border-radius: 50%;
      }

      /* Minimalist design */
      /* .active-link::before{
bottom: -.75rem;
} */
    }

    /* For large devices */
    @media screen and (min-width: 1024px) {
      .navcontainer {
        margin-left: auto;
        margin-right: auto;
      }

    }



    .container {
      margin-top: 60px;
    }
  </style>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav navcontainer">
      <a href="#" class="nav__logo"><img src="assets/img/logo.png" width="20px" height="20px"> WellnessWise</a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link ">
              <i class='bx bx-home-alt nav__icon'></i>
              <span class="nav__name">Home</span>
            </a>
          </li>

          <li class="nav__item">
            <a href="hospitals.php" class="nav__link">
              <i class='bx bx-user nav__icon'></i>
              <span class="nav__name">Hospitals</span>
            </a>
          </li>

          <li class="nav__item">
            <a href="doctors.php" class="nav__link active-link">
              <i class='bx bx-book-alt nav__icon'></i>
              <span class="nav__name">Doctors</span>
            </a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link">
              <i class='bx bx-briefcase-alt nav__icon'></i>
              <span class="nav__name">Medication</span>
            </a>
          </li>

          <li class="nav__item">
            <a href="medicine.php" class="nav__link">
              <i class='bx bx-message-square-detail nav__icon'></i>
              <span class="nav__name">Medicine</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="./bloodbank/main.php" class="nav__link">
              <i class='bx bx-message-square-detail nav__icon'></i>
              <span class="nav__name">Blood Bank</span>
            </a>
          </li>

      <li class="nav__item" style="list-style: none;">
        <a href="login.php" class="nav__link"><span class="nav__name">Login/Signup</span></a>
      </li>
      </ul>
      </div>

    </nav>
  </header>
  <div class="container">
    <h1 class="text-center">Book For Date:
      <?php echo date('m/d/Y', strtotime($date)); ?>
    </h1>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <?php echo isset($msg) ? $msg : ""; ?>
        <div>
          <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
          foreach ($timeslots as $ts) {

            ?>
            <div class="col-md-2">
              <div class="form-group">
                <?php if (in_array($ts, $bookings)) {

                  ?>
                  <button class="btn btn-danger">
                    <?php echo $ts; ?>

                  </button>
                <?php } else { ?>
                  <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>">
                    <?php echo $ts; ?>

                  </button>
                <?php } ?>

              </div>

            </div>
          <?php } ?>
        </div>
      </div>

      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking <span id="slot"></span></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post">
                    <div class="form-group">
                      <label for="">Timeslot</label>
                      <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="">Specialization</label>
                      <select name="specialization" class="form-control" required>
                        <option>Neurology</option>
                        <option>Cardiology</option>
                        <option>Orthopaedics</option>

                        <select>
                    </div>
                    <div class="form-group">
                      <label for="">Payment</label>
                      <input type="text" required readonly value="500" name="payment" id="payment" class="form-control"
                        required>
                    </div>
                    <div class="form-group pull-right">
                      <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                    <div type="submit" id="paypal-payment-button">

                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
                



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
  <script>
    $(".book").click(function () {
      var timeslot = $(this).attr('data-timeslot');
      $("#slot").html(timeslot);
      $("#timeslot").val(timeslot);
      $("#myModal").modal("show");
    })
  </script>
  <script
    src="https://www.paypal.com/sdk/js?client-id=AatqYRcZVL-BugXSupRPpd7zzV9LJ62cE95VwDkmwnvzrqnQ_xdugwgOBndTyRO3QZei43DG8iL1ocPE&currency=USD"></script>
  <script src="index.js"></script>
  </body>
  </html>