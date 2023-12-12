<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!--=============== CSS ===============-->
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>WellnessWise</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo"><img src="assets/img/logo.png" width="20px" height="20px"> WellnessWise</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link active-link">
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
                        <a href="doctors.php" class="nav__link">
                            <i class='bx bx-book-alt nav__icon'></i>
                            <span class="nav__name">Doctors</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="medication.html" class="nav__link">
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
                <a href="./login/login.php" class="nav__link"><span class="nav__name">Login/Signup</span></a>
            </li>
            </ul>
        </nav>
    </header>



    <main class="main">
        <section class="home">
            <div class="circle"></div>
            <div class="home-content">
                <div class="home__data">
                    <h1 class="home__title">
                        Intelligent automation <br> for Healthcare
                    </h1>
                    <p class="home__description">
                        A One-stop solution to all your healthcare needs.<br> At WellnessWise, we take the guessswork
                        out of finding <br>the right doctors, hospitals, and care for you and your<br> family.
                    </p>
                    <a href="#about" style="margin-left:30px;" class="button button--flex">
                        Explore <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>

                <div class="imgBox">
                    <img src="assets/img/main1.png" style="margin-right:130px; " class="saveLife">
                </div>

            </div>
            <ul class="scrollimgs">
                <li><img src="assets/img/m1.png"
                        onclick="imgSlider('assets/img/main1.png'); changeCircleColor('#574bc8')"></li>
                <li><img src="assets/img/m3.png" style="height:50px;"
                        onclick="imgSlider('assets/img/main3.png'); changeCircleColor('#acacd4')"></li>
                <li><img src="assets/img/m2.png"
                        onclick="imgSlider('assets/img/main2.png'); changeCircleColor('#47428b')"></li>

            </ul>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section container" id="about">
            <div class="about__container grid">
                <img src="assets/img/about.png" alt="" class="about__img">

                <div class="about__data">
                    <h2 class="section__title about__title">
                        Why choose us ?
                    </h2><br>

                    <p class="about__description">
                        Our medical website is mindfully curated and is meticulously aligned with qualified specialists
                        that
                        include Gynaecologists, Orthopedics, Heart Specialists, Mental health experts, Nutritionists
                        amongst
                        others to help you achieve your healthcare goals.
                    </p><br>

                    <div class="about__details">
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            24 × 7 Healthcare Chatbot support.
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Helps you locate hospitals nearby.
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Book appointment anytime, anywhere.
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Blood donation management system for hospitals.
                        </p>

                    </div><br>

                    <a href=".steps" class="button--link button--flex">
                        Explore Ahead ! <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>
            </div>
        </section>


        <section class="service">
            <div class="service-title">
                <h2>Our Services</h2>
            </div>
            <div class="service-container">
                <div class="box">
                    <div class="icon"><i class="fas fa-burn"></i></div>
                    <div class="content">
                        <h3>Blood Donation</h3>
                        <p>Simplify the process of blood donation and managing, helping
                            people had never been such easy! Donate Blood , save lives.
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-heartbeat"></i></div>
                    <div class="content">
                        <h3>Hospitals Nearby</h3>
                        <p>
                            Quickly locate hospitals and medical centers close to their homes or workplaces. Great
                            resource to have at your fingertips when you need it most.
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-user-md"></i></div>
                    <div class="content">
                        <h3>Service Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus sit vitae voluptate
                            est
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas	fa-book-medical"></i></div>
                    <div class="content">
                        <h3>Appointment Booking</h3>
                        <p>Eliminate booking hassle with WellnessWise's online appointment scheduling software that
                            includes 24x7 bookings, reminders, payments & more!
                        </p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fas	fa-diagnoses"></i></div>
                    <div class="content">
                        <h3>Medication Recommendation</h3>
                        <p>24×7 Chatbot support. AI built Diagnosis and medication recommendation system at your tips.
                        </p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><i class="fas	fa-capsules"></i></div>
                    <div class="content">
                        <h3>Medicine</h3>
                        <p>Explore a range of medicines, with their usage and side-effects as per your
                            convenience.
                        </p>
                    </div>
                </div>
        </section>


        <!--==================== PRODUCTS ====================-->
        <section class="product section container" id="products">
            <h2 class="section__title-center" style="letter-spacing: 2px">
                Our team of Health Experts
            </h2>

            <p class="product__description">

            </p>

            <div class="product__container grid">
                <article class="product__card">
                    <div class="product__circle"></div>

                    <img src="assets/img/doctor1.png" alt="" class="product__img">

                    <h3 class="product__title">Dr. Ankita Sabharwal</h3>
                    <span class="product__price">Biologist</span>

                    <button class="button--flex product__button">
                        <i class="fa fa-user-md"></i>
                    </button>
                </article>

                <article class="product__card">
                    <div class="product__circle"></div>
                    <img src="assets/img/DrPvDhanapal.png" alt="" class="product__img">
                    <h3 class="product__title">Dr. Naresh Tehran</h3>
                    <span class="product__price">Cardiologist</span>

                    <button class="button--flex product__button">
                        <i class="fa fa-user-md"></i>
                    </button>
                </article>

                <article class="product__card">
                    <div class="product__circle"></div>

                    <img src="assets/img/doctor3.png" alt="" class="product__img">

                    <h3 class="product__title">Dr. Ashish Sabharwal</h3>
                    <span class="product__price">Urologist</span>

                    <button class="button--flex product__button">
                        <i class="fa fa-user-md"></i>
                    </button>
                </article>

                <article class="product__card">
                    <div class="product__circle"></div>

                    <img src="assets/img/doctor4.png" alt="" class="product__img">

                    <h3 class="product__title">Dr. Aditya Gupta</h3>
                    <span class="product__price">Neurosurgeon</span>

                    <button class="button--flex product__button">
                        <i class="fa fa-user-md"></i>
                    </button>
                </article>

                <article class="product__card">
                    <div class="product__circle"></div>

                    <img src="assets/img/doctor5.png" alt="" class="product__img">

                    <h3 class="product__title">Dr. T.S Kler</h3>
                    <span class="product__price">Cardiac Surgeon</span>

                    <button class="button--flex product__button">
                        <i class="fa fa-user-md"></i>
                    </button>
                </article>

                <article class="product__card">
                    <div class="product__circle"></div>

                    <img src="assets/img/doctor6.png" style="width:250px;" alt="" class="product__img">

                    <h3 class="product__title">Dr. Surbhi Anand</h3>
                    <span class="product__price">Endodontist</span>

                    <button class="button--flex product__button">
                        <i class="fa fa-user-md"></i>
                    </button>
                </article>
            </div>
        </section>

        <!--==================== QUESTIONS ====================-->
        <section class="questions section" id="faqs">
            <h2 class="section__title-center questions__title container">
                Frequently Asked Questions <br>[ FAQs ]
            </h2>

            <div class="questions__container container grid">
                <div class="questions__group">
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                How do I use ChatBot ?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Enter the symptoms you're suffering with. Chatbot will diagnose the disease based on
                                your input and recommend you medication that applies.
                            </p>
                        </div>
                    </div>
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                How to book an appointment with the doctor?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                Easily schedule your hospital appointment online at any time. You can select a doctor, a
                                date and time for your appointment, and more using our convenient online booking system.
                            </p>
                        </div>
                    </div>
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                How will I get to know my appointment is confirmed?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                You'll get a confirmation mail on your provided E-mail Id, once the payment is made.
                            </p>
                        </div>
                    </div>
                </div>



                <div class="questions__group">
                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                What is the procedure for getting blood donation ?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                This feature is for the hospitals' admin. One can easily login on the blood donation
                                dashboard, make entry of blood donors, requests and approve the requests accordingly to
                                the volume available.
                                Users can easily book their reservation for volunteering at blood donation camps nearby.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                My online booking platform is broken / doesn't work. What is happening?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                First make sure that you have registered on the online booking platform, if you
                                already
                                registered and online booking doesn't work, it may be because appointments are fully
                                booked. In this case, please call personally to the hospital concerned or reach out
                                to
                                us through our official E-mail address.
                            </p>
                        </div>
                    </div>

                    <div class="questions__item">
                        <header class="questions__header">
                            <i class="ri-add-line questions__icon"></i>
                            <h3 class="questions__item-title">
                                How can I search for healthcare providers?
                            </h3>
                        </header>

                        <div class="questions__content">
                            <p class="questions__description">
                                You can search for healthcare providers by navigating to the <b>Doctors</b>' page in the
                                navigation bar. You may select doctors of any specialization as needed.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!--==================== CONTACT ====================-->
        <h2 class="section__title" style="letter-spacing: 2px; font-weight:600;">Contact Us</h2>
        <section id="section">

            <div class="contact">
                <div class="contactInfo">
                    <div>
                        <h2>Contact Info</h2>
                        <ul class="info">
                            <li>
                                <span><img src="assets/img/location.png"></span>
                                <span>234 delhi. </span>
                            </li>
                            <li>
                                <span><img src="assets/img/mail.png"></span>
                                <span>lorem@ipsum.com</span>
                            </li>
                            <li>
                                <span><img src="assets/img/phone.png"></span>
                                <span>1235678943</span>
                            </li>
                        </ul>
                    </div>
                    <ul class="sci">
                        <li><a href="#"><img src="assets/img/facebook1.png" width="30px" height="20px"></a></li>
                        <li><a href="#"><img src="assets/img/twitter.png" width="30px" height="20px"></a></li>
                        <li><a href="#"><img src="assets/img/instagram.png" width="30px" height="20px"></a></li>
                        <li><a href="#"><img src="assets/img/linkedin.png" width="55px" height="20px"></a></li>

                    </ul>

                </div>
                <div class="contactForm">
                    <h2>Send a Message</h2>
                    <div class="formBox">
                        <div class="inputBox w50">
                            <input type="text" required>
                            <span>First Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" required>
                            <span>Last Name</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="email" required>
                            <span>Email Address</span>
                        </div>
                        <div class="inputBox w50">
                            <input type="text" required>
                            <span>Mobile Number</span>
                        </div>
                        <div class="inputBox w100">
                            <textarea required></textarea>
                            <span>Write your message here...</span>
                        </div>
                        <div class="inputBox w100">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
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

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>