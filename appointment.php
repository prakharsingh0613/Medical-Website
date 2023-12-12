<?php
function build_calender($month, $year)
{

    $mysqli = new mysqli("localhost","root","","wellnesswise");
  /*  $stmt=$mysqli->prepare("select * from bookings where MONTH(date)=? AND YEAR(date)=?");
    $stmt->bind_param('ss',$month,$year);
    $bookings=array();
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $bookings[]=$row['date'];
            }
            $stmt->close();
        }
    }*/

    //create an array containing names of all days in a week
    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');


    //will get the first day of the month that is in the argument of this function
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    //now getting the number of days this month contains 
    $numberDays = date('t', $firstDayOfMonth);

    //getting some information about the first day of this month
    $dateComponents = getdate($firstDayOfMonth);

    //getting the name of this month
    $monthName = $dateComponents['month'];
    //getting the index value 0-6 of the first day of this month
    $dayOfWeek = $dateComponents['wday'];

    //getting the current date 
    $dateToday = date('Y-m-d');

    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year </h2>";
    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a>";
    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a>";
    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";
    $calendar .= "<tr>";

    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='book_header'>$day</th>";

    }
    $calendar .= "</tr><tr>";

    //the variable $daysOfWeek will make sure that there must be only columns in table

    if ($daysOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td></td>";
        }
    }
    //initiating the day counter
    $currentDay = 1;
    //getting the month number

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    while ($currentDay <= $numberDays) {

        //if seventh column (sat) reached, start new row
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date("l",strtotime($date)));
        $eventNum = 0;
        $today = $date==date('Y-m-d')?"today":"";
        if ($date<date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
        } 
        
        else {
          $totalbookings = checkSlots($mysqli,$date);
          if($totalbookings==18){
            $calendar .= "<td class='$today'><h4>$currentDay</h4><a href='#'class='btn btn-danger btn-xs'>All Booked</button>";
     
          }else{
            $availableslots=18-$totalbookings;
            $calendar .= "<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."'class='btn btn-success btn-xs'>Book</a><small><i>$availableslots Slots Available</i><small></button>";
          }
        }

        $calendar .= "</td>";

        //incrementing the counters

        $currentDay++;
        $dayOfWeek++;

    }

    //completing the row of the last week in month if necessary

    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calendar .= "<td></td>";
        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";

    echo $calendar;
}

function checkSlots($mysqli,$date){
  $stmt=$mysqli->prepare("select * from bookings where date=? ");
    $stmt->bind_param('s',$date);
    $totalbookings= 0;
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $totalbookings++;
            }
            $stmt->close();
        }
    }
    return $totalbookings;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctors</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

  <!--=============== REMIX ICONS ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    center{
      margin-top:80px;
    }
     table {
            table-layout: fixed;
            
        }

        td {
          
            width: 33%;
        }

        .today {
            background: yellow;
        }
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
      --container-color: #FFF;

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
    .container {
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
      background-color: var(--container-color);
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
        background-color: var(--container-color);
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

    /* Minimalist design, active link */
    /* .active-link::before{
content: '';
position: absolute;
bottom: -.5rem;
width: 4px;
height: 4px;
background-color: var(--first-color);
border-radius: 50%;
} */

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
      .container {
        margin-left: auto;
        margin-right: auto;
      }

    }


  </style>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="#" class="nav__logo"><img src="assets/img/logo.png" width="20px" height="20px"> WellnessWise</a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link">
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
            <a href="medication.php" class="nav__link">
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
      </div>
      <li class="nav__item" style="list-style: none;">
        <a href="login.php" class="nav__link"><span class="nav__name">Login/Signup</span></a>
      </li>  </ul>
     
    
    </nav>
  </header>
  <div class="app_container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                $dateComponents = getdate();
                if(isset($_GET['month'])&& isset($_GET['year'])){
                    $month=$_GET['month'];
                    $year=$_GET['year'];
                }
                else{
                $month = $dateComponents['mon'];
                $year = $dateComponents['year'];
                }
                echo build_calender($month, $year);
                ?>
            </div>
        </div>
    </div>
 
  <!--=============== SCROLL REVEAL ===============-->
  <script src="assets/js/scrollreveal.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js">


  </script>
</body>

</html>