</html>

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

        #search-button {
            margin-top: 100px;
        }

        .hospital-section {
            height: 900px;
            background-image: url('https://www.b2w.tv/hubfs/Healthcare.gif');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hospital-select {
            background-image: linear-gradient(109.6deg, rgba(156, 252, 248, 1) 11.2%, rgba(110, 123, 251, 1) 91.1%);
            height: 160px;
            color: black;

            text-align: center;

        }

        /* Style for hospitals grid */
        #hospitals-grid {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 4fr));
            grid-gap: 20px;
            margin-top: 200px;


        }

        .hospital {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .hospital:hover {
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .hospital-image {

            display: block;
            max-width: 100%;

            border-radius: 10px 10px 0 0;


        }
        .hospital-image img {
  width: 200px;
  height: 150px;
  object-fit: cover;
  border-radius: 5px;
}

        .hospital-details {
            padding: 20px;
            border-radius: 0 0 10px 10px;
            background-color: #f9f9f9;
        }

        .hospital-name {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #2f2f2f;
        }

        .hospital-address {
            margin-bottom: 10px;
            color: #555;
        }

        .hospital-phone {
            color: #555;
        }

        #state-select {
            background-color: #dd7973;
            padding: 10px;
            border-radius: 10px;
            margin-right: 20px;
        }

        #city-select {
            background-color: #dd7973;
            padding: 10px;
            border-radius: 10px;
            margin-right: 100px;
        }

        #search-button {
            background-color: purple;
            padding: 10px 20px;
            border-radius: 10px;

        }

        #search-button:hover {
            background-color: white;
        }

        @media (max-width: 767px) {

            /* For small screens, display hospitals in a single column */
            #hospitals-grid {
                grid-template-columns: repeat(1, 1fr);
            }

            .hospital-section {
                height: 2100px;
            }

            .hospital-select {
                text-align: center;
                padding: 10px;
            }
        }

        /*=============== FOOTER ===============*/
        .footer__container {
            row-gap: 3rem;
        }

        .footer__logo {
            display: inline-flex;
            align-items: center;
            column-gap: .5rem;
            color: var(--title-color);
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: var(--mb-2-5);
            transition: .3s;
        }

        .footer__logo-icon {
            font-size: 1.15rem;
            color: var(--first-color);
        }

        .footer__logo:hover {
            color: var(--first-color);
        }

        .footer__title {
            font-size: var(--h3-font-size);
            margin-bottom: var(--mb-1-5);
        }

        .footer__subscribe {
            background-color: var(--first-color-lighten);
            padding: .75rem;
            display: flex;
            justify-content: space-between;
            border-radius: .5rem;
        }

        .footer__input {
            width: 70%;
            padding: 0 .5rem;
            background: none;
            color: var(--text-color);
            border: none;
            outline: none;
        }

        .footer__button {
            padding: 1rem;
        }

        .footer__data {
            display: grid;
            row-gap: .75rem;
        }

        .footer__information {
            font-size: var(--small-font-size);
        }

        .footer__social {
            display: inline-flex;
            column-gap: .75rem;
        }

        .footer__social-link {
            font-size: 1rem;
            color: var(--text-color);
            transition: .3s;
        }

        .footer__social-link:hover {
            transform: translateY(-.25rem);
        }

        .footer__cards {
            display: inline-flex;
            align-items: center;
            column-gap: .5rem;
        }

        .footer__card {
            width: 35px;
        }

        .footer__copy {
            text-align: center;
            font-size: var(--smaller-font-size);
            color: var(--text-color-light);
            margin: 5rem 0 1rem;
        }

        @media screen and (min-width: 576px) {
            .footer__subscribe {
                width: 400px;
            }
        }

        @media screen and (min-width: 767px) {
            body {
                margin: 0;
            }

            .footer__container {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer__container {
                column-gap: 3rem;
            }

            .footer__subscribe {
                width: initial;
            }
        }

        @media screen and (min-width: 992px) {
            .container {
                margin-left: auto;
                margin-right: auto;
            }

            .footer__logo {
                font-size: var(--h3-font-size);
            }

            .footer__container {
                grid-template-columns: 1fr .5fr .5fr .5fr;
            }

            .footer__copy {
                margin: 7rem 0 2rem;
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
                        <a href="index.php" class="nav__link ">
                            <i class='bx bx-home-alt nav__icon'></i>
                            <span class="nav__name">Home</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="hospital.php" class="nav__link active-link">
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
                <a href="login.html" class="nav__link"><span class="nav__name">Login/Signup</span></a>
            </li>
            </ul>


        </nav>
    </header>
    <div class="hospital-section">
        <div class="hospital-select">
            <!-- State Dropdown -->

            Select State:
            <select id="state-select">
                <option value="">Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                
            </select>

            <!-- City Dropdown -->
            Select City:
            <select id="city-select">
                <option value="">Select City</option>
            </select>

            <!-- Search Button -->
            <button id="search-button">Search</button>

            <!-- Hospitals Grid -->
            <div id="hospitals-grid"></div>
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
    <script>

        // Data for cities and hospitals
        const data = {
            'Andhra Pradesh': ['Vishakhapatnam', 'Tirupati', 'Vijayawada'],
            'Arunachal Pradesh': ['Itanagar', 'Tawang', 'Ziro'],
            'Assam': ['Guwahati', 'Dibrugarh', 'Jorhat'],
            'Bihar': ['Adhaura ', ' Amarpur ',' Araria ',' Areraj',' Arrah ', 'Arwal','Aurangabad '],
            'Chandigarh':['Chandigarh ',' Mani Marja'],
            'Chhattisgarh': ['Ambikapur ',' Antagarh ',' Arang ',' Bacheli ',' Bagbahera ',' Bagicha ',' Baikunthpur ',' Balod ',' Balodabazar '],
            'Delhi': ['Central Delhi ',' East Delhi ',' New Delhi ',' North Delhi ',' North East Delhi '],
            'Goa':['Canacona ',' Candolim ',' Chinchinim ',' Cortalim ',' Goa ',' Jua ',' Madgaon ',' Mahem ',' Mapuca '],
            'Gujarat':['Ahmedabad ',' Ahwa ',' Amod ',' Amreli ',' Anand ',' Anjar ',' Ankaleshwar ',' Babra ',' Balasinor '],
            'Haryana':['Adampur Mandi ',' Ambala ',' Assandh ',' Bahadurgarh ',' Barara ',' Barwala ',' Bawal ',' Bawanikhera ',' Bhiwani ',' Charkhidadri ']
            // Add more states and cities here
        };

        // Function to populate city dropdown based on selected state
        function populateCities(state) {
            const cities = data[state];
            const citySelect = document.getElementById('city-select');
            citySelect.innerHTML = '<option value="">Select City</option>';
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.text = city;
                citySelect.appendChild(option);
            });
        }

        // Event listener for state dropdown change
        document.getElementById('state-select').addEventListener('change', (event) => {
            const state = event.target.value;
            populateCities(state);
        });

        // Event listener for search button click
        document.getElementById('search-button').addEventListener('click', () => {
            const state = document.getElementById('state-select').value;
            const city = document.getElementById('city-select').value;
            const hospitalsGrid = document.getElementById('hospitals-grid');
            hospitalsGrid.innerHTML = '';

            // Logic to fetch hospitals from database or API based on selected state and city
            // Display hospitals in a grid format
            // Example hospital data:
            const hospitals = [
                { name: 'Apollo Hospitals', address: 'Plot No:1,Arilova,Chinagadali, Visakhapatnam-530040. Andhra Pradesh, India.', phone: '91 891 2867777', city: 'Vishakhapatnam', image: 'assets/img/hospital1.jpg' },
                { name: 'Seven Hills Hospitals', address: 'Rockdale Layout, Waltair Main Rd, Ram Nagar, Visakhapatnam, Andhra Pradesh 530002', phone: '0891 667 7777', city: 'Vishakhapatnam', image: 'assets/img/hospital2.webp' },
                { name: 'King George Hospitals', address: 'KGH Down Rd, Opp KGH OP Gate, Maharani Peta, Visakhapatnam, Andhra Pradesh 531011', phone: '0723 689 06543', city: 'Vishakhapatnam', image: 'assets/img/hospital3.jpg' },
                { name: 'Pinnacle Hospitals', address: 'Plot No. 17A, Health City, Chinna Gadhili, Hanumanthavaka, Visakhapatnam, Andhra Pradesh 530040', phone: '073373 33777', city: 'Vishakhapatnam', image: 'assets/img/hospital4.webp'},
                { name: 'Lotus Hospital', address: '301, Door No: 18 Swamy Temple 1, 302, KT Rd, near Varadaraja, Bhavani Nagar, Tirupati, Andhra Pradesh 517501', phone: '0877 228 6077', city: 'Tirupati', image: 'assets/img/hospital5.jpg' },
                { name: 'Sankalpa Super Speciality Hospital', address: 'Karakambadi Bazar St, Tata Nagar, Tirupati, Andhra Pradesh 517501', phone: '088866 96040', city: 'Tirupati', image: 'assets/img/hospital6.jpg' },
                { name: 'Kamineni Hospital', address: '100 Feet New Autonagar Road, Main, Road, Tadigadapa, Vijayawada, Andhra Pradesh 521137', phone: '0866 246 3333', city: 'Vijayawada', image: 'assets/img/hospital7.jpg' },
                { name: 'Sentini Hospital', address: '54-15-5 B&C, Ring Rd, beside Vinayak Theatre, Vijayawada, Andhra Pradesh 520008', phone: '0866 667 7869', city: 'Vijayawada', image: 'assets/img/hospital8.jpg' },
            
            
            
            
            ];

            hospitals.forEach(hospital => {
                if (hospital.city === city) {
                    const hospitalDiv = document.createElement('div');
                    hospitalDiv.className = 'hospital';
                    hospitalDiv.innerHTML = `
        <div class="hospital-image"><img src="${hospital.image}" alt="${hospital.name}"></div>
        <div class="hospital-details">
        
          <div class="hospital-name">${hospital.name}</div>
          <div class="hospital-address">${hospital.address}</div>
          <div class="hospital-phone">${hospital.phone}</div>
          
        </div>
      `;
                    hospitalsGrid.appendChild(hospitalDiv);
                }
            });
        });

    </script>
</body>