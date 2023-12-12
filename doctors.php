<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: login.php");
        die();
    }

    include 'config.php';
    

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['name'] . " <a href='logout.php'>Logout</a>";
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

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #fffefe;
    }

    .cell {
      height: 600px;
      background-image: url('https://cdn.dribbble.com/users/1041961/screenshots/2515045/alchemy-dribbble-medicalicons.gif') ;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .honeycomb {
      display: -webkit-box;
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      -webkit-box-pack: center;
      justify-content: center;
      -webkit-box-align: center;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0;
      transform: translateY(80px);

    }

    .honeycomb-cell {
      -webkit-box-flex: 0;
      flex: 0 1 250px;
      max-width: 190px;
      height: 100.5px;
      margin: 65.4px 12.5px 25px;
      position: relative;
      padding: 0.5em;
      text-align: center;
      z-index: 1;
      box-shadow: 0px 0px 15px 0 rgba(0, 0, 0, 0.1);
    }

    .honeycomb-cell_img {
      top: -30%;
      left: 0;
      width: 100%;
      display: block;
      position: absolute;
      -webkit-clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
      clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
      z-index: -1;
      height: 170px;
      object-fit: cover;
      object-position: center;
      filter: grayscale(100%);
    }

    .honeycomb-cell_title {
      height: 100%;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      flex-direction: column;
      -webkit-box-pack: center;
      justify-content: center;
      -webkit-hyphens: auto;
      hyphens: auto;
      word-break: break-word;
      text-transform: uppercase;
      color: #1a1919;
      font-weight: 700;
      font-size: 1em;
      transition: opacity 350ms;
    }

    .honeycomb-cell_title>small {
      font-weight: 300;
      margin-top: 0.25em;
    }

    .honeycomb-cell::before,
    .honeycomb-cell::after {
      content: '';
    }

    .honeycomb-cell::before,
    .honeycomb-cell::after {
      top: -50%;
      left: 0;
      width: 100%;
      height: 200%;
      display: block;
      position: absolute;
      -webkit-clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
      clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
      z-index: -1;
    }

    .honeycomb-cell::before {
      background: #1a1919;
      transform: scale(1.055);
    }

    .honeycomb-cell::after {
      background: #d9c5e2;
      opacity: 0.7;
      transition: opacity 350ms;
      -webkit-transition: opacity 350ms;
    }

    .honeycomb-cell:hover .honeycomb-cell_title {
      opacity: 0;
    }

    .honeycomb-cell:hover .honeycomb-cell_img {
      filter: grayscale(0%);
    }

    .honeycomb-cell:hover::before {
      background: #c5a2d3;
    }

    .honeycomb-cell:hover::after {
      opacity: 0;
    }

    .honeycomb_Hidden {
      display: none;
      opacity: 0;
      width: 250px;
      margin: 0 12.5px;
    }

    /****** Responsive *******/

    @media (max-width: 550px) {

      .honeycomb-cell {
        margin: 81.25px 25px;
      }
     
    }


    @media (min-width: 550px) and (max-width: 825px) {
      .honeycomb-cell:nth-child(3n) {
        margin-right: calc(50% - 125px);
        margin-left: calc(50% - 125px);
      }

      .honeycomb_Hidden:nth-child(3n + 5) {
        display: block;
      }
     
    }


    @media (min-width: 825px) and (max-width: 1100px) {

      .honeycomb-cell:nth-child(5n + 4) {
        margin-left: calc(50% - 275px);
      }

      .honeycomb-cell:nth-child(5n + 5) {
        margin-right: calc(50% - 275px);
      }

      .honeycomb_Hidden:nth-child(5n),
      .honeycomb_Hidden:nth-child(5n + 3) {
        display: block;
      }
    }

    @media (min-width: 1100px) {
      .honeycomb-cell:nth-child(7n + 5) {
        margin-left: calc(50% - 400px);
      }

      .honeycomb-cell:nth-child(7n + 7),
      .honeycomb-cell:nth-child(7n + 5):nth-last-child(2) {
        margin-right: calc(50% - 400px);
      }

      .honeycomb_Hidden:nth-child(7n + 7),
      .honeycomb_Hidden:nth-child(7n + 9),
      .honeycomb_Hidden:nth-child(7n + 11) {
        display: block;
      }
    }


    :root {
      --clr-primary: #651fff;
      --clr-gray: #37474f;
      --clr-gray-light: #b0bec5;
    }

    * {
      box-sizing: border-box;
      font-family: "Open Sans", sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      color: var(--clr-gray);
      margin: 2rem;
    }

    .wrapper-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, 20rem);
      justify-content: center;
    }

    .wrapper-grid .container {
      overflow: hidden;
      box-shadow: 0px 2px 8px 0px var(--clr-gray-light);
      background-image: linear-gradient(95.2deg, rgba(173, 252, 234, 1) 26.8%, rgba(192, 229, 246, 1) 64%);
      text-align: center;
      border-radius: 1rem;
      position: relative;
      margin: 0.5rem;
    }

    .wrapper-grid .container:hover {
      background-image: linear-gradient(109.6deg, rgba(156, 252, 248, 1) 11.2%, rgba(110, 123, 251, 1) 91.1%);
    }

    .banner-img {
      position: absolute;
      height: 10rem;
      width: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .profile-img {
      width: 8rem;
      clip-path: circle(45px at center);
      margin-top: 2rem;
    }

    .name {
      font-weight: bold;
      font-size: 1.5rem;
    }

    .description {
      margin: 1rem 2rem;
      font-size: 0.9rem;
    }

    .btn {
      width: 100%;
      border: none;
      font-size: 1rem;
      font-weight: bold;
      color: white;
      padding: 1rem;
      background-color: var(--clr-primary);
    }

    .appoint {
      background-image: linear-gradient(-20deg, #00cdac 0%, #8ddad5 100%);
      height: 100px;
    }
    .appoint .book{
      text-align: right;
      padding: 50px 30px;  
    }
   

/* CSS */
.button-85 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: black;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 300%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
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
      </li>
      <li class="nav__item" style="list-style: none;">
        <a href="login.php" class="nav__link"><span class="nav__name"><?php
   
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['name'] . " <a href='logout.php'>Logout</a>";
    }
?></span></a>
      </li>
      </ul>
      
    </nav>
  </header>

  <div class="appoint">
    <div class="book">
    <h4>Book Your Appointment Now:   
    <!-- HTML !-->
<a href="appointment.php"><button class="button-85" role="button">Book Appointment</button></a>  </h4>
    </div>
  </div>
  <div class="cell">
    <ul class="honeycomb">
      <li class="honeycomb-cell">
        <a href="#neurology"><img class="honeycomb-cell_img" src="assets/img/neu.png">
          <div class="honeycomb-cell_title">Neurology</div>
      </li></a>
      <li class="honeycomb-cell">
        <a href="#cardiology"> <img class="honeycomb-cell_img" src="assets/img/cardio.png">
          <div class="honeycomb-cell_title">Cardiology</div>
      </li></a>
      <li class="honeycomb-cell">
        <a href="#orthopedics"> <img class="honeycomb-cell_img" src="assets/img/ortho.png">
          <div class="honeycomb-cell_title">Orthopedics</div>
      </li></a>
      <li class="honeycomb-cell">
        <a href="#pulmonology"> <img class="honeycomb-cell_img" src="assets/img/pul.png">
          <div class="honeycomb-cell_title">Pulmonology</div>
      </li></a>
      <li class="honeycomb-cell">
        <a href="#gastroenterology"> <img class="honeycomb-cell_img " src="assets/img/gast.png">
          <div class="honeycomb-cell_title">Gastroenterology</div>
      </li></a>
      <li class="honeycomb-cell">
        <a href="#diabetes"> <img class="honeycomb-cell_img" src="assets/img/dia.png">
          <div class="honeycomb-cell_title">Diabetes</div>
      </li></a>
      <li class="honeycomb-cell">
        <a href="#gyneology"> <img class="honeycomb-cell_img" src="assets/img/gyn.png">
          <div class="honeycomb-cell_title">Gynecology</div>
      </li></a>
      <li class="honeycomb-cell honeycomb_Hidden">
      </li>
    </ul>

  </div>

  <h1 style="text-align: center;">Neurology</h1>

  <div class="wrapper-grid" id="neurology">

    <div class="container">
      <div class='banner-img'></div>


      <img
        src='assets/img/doctor8.webp'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Praveen Gupta</h1>
      <p class="description">Neurologist</p>
      <p class="description"><b><i>Director , MBBS, MD, DM,16 years of experience, Gurugram</i></b></p>
      <p class="description">Dr. Praveen Gupta is now affiliated with Fortis Memorial Research Institute in Gurgaon as Director and Unit Head of Neurology. He is a well-known Neurologist in India. Aside from that, he established the first stroke center in Gurgaon</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor9.png'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Mukul Varma</h1>
      <p class="description">Neurologist</p>
      <p class="description"><b><i>Senior Consultant , MD, DM, MBBS,28 years of experience, New Delhi</i></b></p>
      <p class="description">Brief About Dr. Mukul Varma Dr. Mukul Varma has over 28 years of expertise as a Neurologist. He is also interested in mobility problems, multiple sclerosis, and headache treatment. Moreover, in 2004, Dr. Mukul Varma obtained specialized training</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor10.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Dinesh Nayak</h1>
      <p class="description">Neurologist</p>
      <p class="description"><b><i>M.B.B.S, M.D (General Medicine) D.M (Neurology) Director, Neurology Senior Consultant Neurologist and Epileptologists.,25 years of Experience, Chennai</i></b></p>
      <p class="description">Dr. S Dinesh Nayak has a total of 25 years of experience and is currently employed at Gleneagles Global Health City as the Director Of Neurology, Program Director, Advanced Centre For Epilepsy.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor11.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Anand Kumar Saxena</h1>
      <p class="description">Neurologist</p>
      <p class="description"><b><i>Head of Department , DM,26 years of experience, New Delhi</i></b></p>
      <p class="description">Dr. Anand Kumar Saxena is currently the Head of Neurology at Max Super Specialty Saket City Hospital in New Delhi. As a Neurology Consultant, he worked at a number of hospitals, including the BLK Super-Speciality Hospital, Max Hospitals</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor12.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Dinesh Sareen</h1>
      <p class="description">Neurologist</p>
      <p class="description"><b><i>Senior Consultant , DM, MD, MBBS,21 years of experience, New Delhi</i></b></p>
      <p class="description">Dr. Dinesh Sareen is a well-known Neurologist who has been in practise for more than 21years. He was instrumental in the establishment of Neuro-Electrophysiology Labs in various Diagnostic Centers and Hospitals in North West Delhi.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor13.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Rajiv Anand</h1>
      <p class="description">Neurologist</p>
      <p class="description"><b><i>Director , MBBS, MD, DM,36 years of experience, New Delhi</i></b></p>
      <p class="description">Brief About Dr. Rajiv Anand Dr. Rajiv Anand is a well-known neurologist in New Delhi. Furthermore, he has 36 years of experience and has studied at some of India’s most prestigious institutions of higher learning.</p>

    </div>
  </div>

  <h1 style="text-align: center;">Cardiology</h1>
  <div class="wrapper-grid" id="cardiology">
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor14.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Ajay Kaul</h1>
      <p class="description">Cardiologist</p>
      <p class="description"><b><i>Chairman , MBBS, MS, MCh, Fellowship, 38 years of experience, Noida</i></b></p>
      <p class="description">Brief About Dr. Ajay Kaul Dr. Ajay Kaul is one of India’s most skilled and experienced cardiac bypass surgeons and is considered among the top 10 cardiologists in India</p>
    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor15.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Vivek Jawali</h1>
      <p class="description">Cardiologist</p>
      <p class="description"><b><i>Chairman , DNB, MCh, MS, MBBS,40 years of experience, Noida</i></b></p>
      <p class="description">Dr. Vivek Jawali is a well-known Cardiologist, who has an experience of more than 40 years of. Dr. Vivek Jawali specializes in laparoscopic surgery, cardiac ablation, cardiac catheterization, carotid angioplasty & stenting</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctors16.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Y K Mishra</h1>
      <p class="description">Cardiologist</p>
      <p class="description"><b><i>Director , MBBS, MD, Fellowship, Fellowship, 34 years of experience, New Delhi</i></b></p>
      <p class="description">Brief About Dr. Y K Mishra Dr. Y K Mishra is one of India’s most well-known and skilled cardiac surgeons and considered among the top 10 cardiologists in India.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor17.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Naresh Trehan</h1>
      <p class="description">Cardiologist</p>
      <p class="description"><b><i>Chairman,42 years of experience, Gurugram</i></b></p>
      <p class="description">Dr. Naresh Trehan is a renowned Cardiovascular and Cardiothoracic Surgeon with over 42 years of experience. He is also the Chairman and Managing Director of Medanta</p>

    </div>

  </div>
  <h1 style="text-align: center;">Orthopedics</h1>
  <div class="wrapper-grid" id="orthopedics">
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor18.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Narender Kumar Magu</h1>
      <p class="description">Orthopedic</p>
      <p class="description"><b><i>MS - Orthopaedics, MBBS Orthopedist, Joint Replacement Surgeon, 35 years of experience, Saket</i></b></p>
      <p class="description">Dr. Narender Kumar Magu is Pioneer in “Hip Preservation/Reconstruction/Proximal Femoral Osteotomies” in the management of various hip disorders and “Pelvi-Acetabular Fractures”.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor19.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Jayant Arora</h1>
      <p class="description">Orthopedic</p>
      <p class="description"><b><i>Senior Consultant,8 years of experience, Gurgaon</i></b></p>
      <p class="description">Dr. Jayant Arora is currently a Senior Consultant at Fortis Hospital in Gurgaon’s Orthopaedics Department. He previously worked for almost 8 years in the United Kingdom at some of the region’s most prestigious Orthopedic centres</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor20.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Yatinder Kharbanda</h1>
      <p class="description">Orthopedic</p>
      <p class="description"><b><i>Senior Consultant , MBBS, D.Ortho, MS, DNB, MCh, 33 years of experience, New Delhi</i></b></p>
      <p class="description">Dr. Yatinder Kharbanda is a well-regarded Orthopaedist and Joint Replacement Surgeon with over 33 years of expertise. Dr. Yatinder Kharbanda works at the Indraprastha Apollo Hospitals in Delhi’s Sarita Vihar.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor21.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Ram Chidambaram</h1>
      <p class="description">Orthopedic</p>
      <p class="description"><b><i>Director , MBBS, D.Ortho, MS, 29 years of experience, Chennai</i></b></p>
      <p class="description">Brief About Dr. Ram Chidambaram Dr. Ram Chidambaram is a well-known Orthopedist. Dr. Ram has more than 29+ years of experience in the field of Orthopedics.</p>

    </div>

  </div>
  <h1 style="text-align: center;">Orthopedics</h1>
  <div class="wrapper-grid" id="orthopedics">
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor22.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Raj B Singh</h1>
      <p class="description">Pulmonologist</p>
      <p class="description"><b><i>Consultant, 37 years of experience, Chennai</i></b></p>
      <p class="description">Dr. Raj B Singh is a pulmonologist with 37+ years of experience. He is a life member of Association of Physicians of India, Indian Medical Association, Cosmopolitan Club, British Thoracic Society, Indian Chest Society, Indian Association of Bronchology and Tower Club.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor23.webp'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Narasimhan R</h1>
      <p class="description">Pulmonologist</p>
      <p class="description"><b><i>Senior Consultant, 36 years of experience, Chennai</i></b></p>
      <p class="description">Dr. Narasimhan R is a Pulmonologist with 36+ years of experience. He has done more than 11000 diagnostic bronchoscopes in South India.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor24.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Ilangho R P</h1>
      <p class="description">Pulmonologist</p>
      <p class="description"><b><i>Senior Consultant, 31 years of experience, Chennai</i></b></p>
      <p class="description">Dr. Ilangho R P is a pulmonologist with 31+ years of experience. He is a member of Disease Management Association of India (DMAI), Indian Association of Bronchology and life member of Indian Critical Care Society</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor25.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Prasanna Kumar Thomas</h1>
      <p class="description">Pulmonologist</p>
      <p class="description"><b><i>Senior Consultant, 40 years of experience, Chennai</i></b></p>
      <p class="description">Dr. Prasanna Kumar Thomas is a pulmonologist with 40+ years of experience. He is a member of the Indian Medical Association, European Respiratory Society, American Thoracic Society and Tamil Nadu Association of Pulmonologists.</p>

    </div>

  </div>
  <h1 style="text-align: center;">Gastroenterology</h1>
  <div class="wrapper-grid" id="gastroenterology">
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor29.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Mohan A T</h1>
      <p class="description">Gastroenterologist</p>
      <p class="description"><b><i>MBBS, MD - General Medicine, DM, 38 Years Experience, Chennai</i></b></p>
      <p class="description">Dr. Mohan A T is a Gastroenterologist in Greams Road, Chennai and has an experience of 38 years in this field</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor27.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. VK Gupta</h1>
      <p class="description">Gastroenterologist</p>
      <p class="description"><b><i>MBBS, MD - General Medicine, DM,39 Years Experience, Chennai</i></b></p>
      <p class="description">Dr. (Col) VK Gupta has got the special distinction of having his name in Guinness Book of World Records for being a part of a hospital on wheels for the longest</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor28.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Ravichand Siddachari</h1>
      <p class="description">Gastroenterologist</p>
      <p class="description"><b><i>MS - General Surgery, DNB - General Surgery, MRCS (UK), FRCS - General Surgery (Upper GI), MCh - Surgical Oncology, Banglore</i></b></p>
      <p class="description">Dr. Ravichand Siddachari is currently associated with Manipal Hospital, Bangalore. He has over 10 years of experience as a Surgical Gastroenterologist</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor26.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Vivek Raj</h1>
      <p class="description">Gastroenterologist</p>
      <p class="description"><b><i>29 Years Experience Overall,29 Years Experience, Chennai</i></b></p>
      <p class="description">Dr. Vivek Raj is a Gastroenterologist,Endoscopist (Gastro) and General Physician in Sushant Lok I, Gurgaon and has an experience of 29 years in these field</p>

    </div>

  </div>
  <h1 style="text-align: center;">Diabetes</h1>
  <div class="wrapper-grid" id="diabetes">
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor33.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Arun Bal</h1>
      <p class="description">Diabetics</p>
      <p class="description"><b><i>MBBS, MS - General Surgery,45 Years Experience, Chennai</i></b></p>
      <p class="description">Dr Arun Bal has been practising as a general surgeon soecializing in the Diabetic Foot since 1984.</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor32.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Sanjeev Bakshi</h1>
      <p class="description">Diabetics</p>
      <p class="description"><b><i>MBBS, MD - General Medicine, MRCP,44 Years Experience, Chennai</i></b></p>
      <p class="description">Dr. Sanjeev Bhaskar Baksh is a Endocrinologist in Senapati Bapat Marg, Pune and has an experience of 44 years in this field</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor31.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Suryanarayana K M</h1>
      <p class="description">Diabetics</p>
      <p class="description"><b><i>MBBS, DM ,28 Years Experience, Chennai</i></b></p>
      <p class="description">Dr. Suryanarayana K M is a Endocrinologist and has an experience of 28 years in this field</p>

    </div>
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor30.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. P S Lamba</h1>
      <p class="description">Diabetics</p>
      <p class="description"><b><i>MBBS, DM - Endocrinology, MD,46 Years Experience, Chennai</i></b></p>
      <p class="description">Dr. P.S.Lamba is associated with Fortis Hospital as a consultant Endrocrinologist. Prior to Fortis he was in Armed Force (Indian Navy) for almost 28 years</p>

    </div>

  </div>
  <h1 style="text-align: center;">Gynecology</h1>
  <div class="wrapper-grid" id="gyneology">
    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor37.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Aradhana Singh</h1>
      <p class="description">Gynaecologist</p>
      <p class="description"><b><i>Senior Consultant , MBBS, MS, FICMCH, 21 years of experience Noida , India</i></b></p>
      <p class="description">Dr. Aradhana Singh is a well-known Obstetrician and Gynaecologist with experience of more than 21 years. She has competence over the surgery of High-risk pregnancy, Infertility, Laparoscopy, Hysteroscopy, Colposcopy, Adolescent Gynecology, and Management of menopause</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor36.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Neera Bhan</h1>
      <p class="description">Gynaecologist</p>
      <p class="description"><b><i>Senior Consultant , MBBS, MD, MRCOG, 28 years of experience Noida , India</i></b></p>
      <p class="description">Presently associated as Senior Consultant with Department of Obstetrics and Gynaecology at Fortis Hospital, Noida Qualified by reputed international surgeons like Dr Roger Fay, pioneer of laparoscopic gynae surgery in Australia Specializes</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor35.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Monika Wadhwan</h1>
      <p class="description">Gynecologist</p>
      <p class="description"><b><i>Senior Consultant , MBBS, MD, 19 years of experience Noida , India</i></b></p>
      <p class="description">Dr. Monika Wadhwan is a well known Obstetrician & Gynaecologist with experience of more than 19 years. She has competence over the treatment of Pediatric and Adolescent Gynecology, Sexually transmitted diseases, Urinary tract infections, Uterine, vaginal and vulvar disorders</p>

    </div>

    <div class="container">
      <div class='banner-img'></div>
      <img
        src='assets/img/doctor34.jpg'
        alt='profile image' class="profile-img">
      <h1 class="name">Dr. Padmapriya Vivek</h1>
      <p class="description">Gynecologist</p>
      <p class="description"><b><i>Head of Department,21 years of experience, Chennai</i></b></p>
      <p class="description">Dr. Padmapriya Vivek is a well-known Gynecologist and Obstetrician who has been in practice for over 21 years. She is an expert in managing high-risk pregnancies, as well as diabetic and hypertensive pregnancies.</p>

    </div>
  </div>
  <footer class="footer section">
    <div class="footer__container container grid">
      <div class="footer__content">
        <a href="#" class="footer__logo">
          <i class="footer__logo-icon"><img src="assets/img/logo.png" width="40px" height="50px"></i>
          WellnessWise
        </a>

        <h3 class="footer__title">
          Subscribe to our newsletter <br> to stay update
        </h3>

        <div class="footer__subscribe">
          <input type="email" placeholder="Enter your email" class="footer__input">

          <button class="button button--flex footer__button">
            Subscribe
            <i class="ri-arrow-right-up-line button__icon"></i>
          </button>
        </div>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Our Address</h3>

        <ul class="footer__data">
          <li class="footer__information">1234 - Peru</li>
          <li class="footer__information">La Libertad - 43210</li>
          <li class="footer__information">123-456-789</li>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">Contact Us</h3>

        <ul class="footer__data">
          <li class="footer__information">+999 888 777</li>

          <div class="footer__social">
            <a href="https://www.facebook.com/" class="footer__social-link">
              <i class="ri-facebook-fill"></i>
            </a>
            <a href="https://www.instagram.com/" class="footer__social-link">
              <i class="ri-instagram-line"></i>
            </a>
            <a href="https://twitter.com/" class="footer__social-link">
              <i class="ri-twitter-fill"></i>
            </a>
          </div>
        </ul>
      </div>

      <div class="footer__content">
        <h3 class="footer__title">
          We accept all credit cards
        </h3>

        <div class="footer__cards">
          <img src="assets/img/card1.png" alt="" class="footer__card">
          <img src="assets/img/card2.png" alt="" class="footer__card">
          <img src="assets/img/card3.png" alt="" class="footer__card">
          <img src="assets/img/card4.png" alt="" class="footer__card">
        </div>
      </div>
    </div>

    <p class="footer__copy">&#169; WellnessWise. All rigths reserved</p>
  </footer>

  <!--=============== SCROLL REVEAL ===============-->
  <script src="assets/js/scrollreveal.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js">


  </script>
</body>

</html>