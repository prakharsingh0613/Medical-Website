<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
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
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Aclonica&display=swap');

html{
    height: 100%;
}
body{
    margin: 0;
    margin-top: 60px;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
    height: 100%;
}
.medicine_container{
    display: grid;
	margin-top: 80px;
    grid-template-columns: 250px 1fr 300px;
    min-height: 100vh;
    min-height: -webkit-fill-available;
	overflow: hidden;

}
#menu{
    background: linear-gradient(-23deg, rgba(211,158,217,1) 51%, rgba(253,255,255,1) 100%, rgba(121,9,102,1) 100%);
    margin-top: 0px;
}
.title{
    padding: 0 30px;
    margin-top: 100px;
}
#menu img{
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-top: 2px;
}
.title p{
    font-size: 40px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: indianred;
    margin: 0;
}
.border{
    width: 80px;
    height: 4px;
    margin: 3px 0;
    margin-left: 10px;
    margin-bottom: 30px;
    border-radius: 2px;
    background: rgb(138, 38, 148);
}

.menu-item a{
    display: block;
    text-decoration: none;
    font-size: 20px;
    padding: 8px 30px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin: 12px 0;
    color: rgb(128, 129, 129);
    font-weight: 300;
    
}
.menu-item a:hover{
    background: rgb(250, 212, 218);
}
#med-items{
    background: linear-gradient(364deg, rgba(211,158,217,1) 51%, rgba(253,255,255,1) 100%, rgba(121,9,102,1) 100%);
    overflow: auto;
    height: calc(135vh - 86px);
    margin-top: 0px;
}
::-webkit-scrollbar{
    display: none;
}
#map{
    font-size: 25px;
    color: rgb(55, 0, 255);
}

.med-items{
    display: none;
}

#cardiologists,#neurologists,#dentist,#gynecologists,#oncologists,#psychiatrists,#endocrinologist,#orthopedic,#audiologist,#radiologist{
    margin-top: 40px;   
}
#neurologists #item-card,#oncologists #item-card,#orthopedic #item-card{
    background: linear-gradient(364deg, rgb(217 158 198) 51%, rgba(253,255,255,1) 100%, rgb(40 9 121) 100%);
}
#dentist #item-card,#psychiatrists #item-card,#audiologist #item-card{
    background: linear-gradient(364deg, rgb(249 158 180) 51%, rgba(253,255,255,1) 100%, rgb(40 9 121) 100%);
}
#category-name,.item-menu{
    margin: 10px;
    margin-top: 20px;
    font-size: 35px;   
    color: rgb(138 38 148);
    font-family: 'Aclonica', sans-serif;
}
#item-card{
    width: 289px;
    height: 380px;
    padding: 10px;
    margin: 10px;
    display: inline-grid;
    border-radius: 5px;
    background:linear-gradient(364deg, rgb(173 158 217) 51%, rgba(253,255,255,1) 100%, rgb(40 9 121) 100%);
    cursor: pointer;
    transition: 0.5s all step-end;
}
#item-card:hover img{
    transform: scale(1.2);
}
#card-top{
    display: flex;
    margin: 5px 0;
    justify-content:center;
}
#item-card img{
    width: 100px;
    height: 60px;
    border-radius: 50%;
    margin: auto;
    display: block;
    margin-bottom: 5px;
    transition: 0.5s all ease-in-out;
}
#item-name{
    margin: 3px 0;
    font-weight: 600;
    color: darkslategray;
    font-size: 18px;
}
#item-uses, #item-effects, #item-precautions{
    margin: 2px 0;
    font-weight: 300;
    color: darkslategray;
    font-size: 12px;
}

.med-items{
    display: none;
}

#cart{
    background: linear-gradient(-21deg, rgba(211,158,217,1) 51%, rgba(253,255,255,1) 100%, rgba(121,9,102,1) 100%);
    padding-right: 0px;
    overflow-y: scroll;
}

.item-menu{
    margin: 0;
    margin-left: 10px;
    font-size: 30px;
    margin-top: 95px;
    color: rgb(138, 38, 148);;
    
}
.list-card{
    display: flex;
    align-items: center;
    margin-top: 15px;
    margin-left: 10px;
    border-radius: 25px;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
}
.list-card:hover{
    background: rgb(204 111 195);
}
.list-card:hover img{
    transition: 0.5s all ease-in-out;
    transform: scale(1.2);
}
.list-card img{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.list-name{
    font-size: 20px;
    margin: 0 10px;
    text-decoration: none;
    text-transform: capitalize;
    color: rgb(94, 43, 43);
}
#mobile-view{
    display: none;
}
#cardiologists{
    margin-top: 20px;
}

@media screen and (max-width : 800px) and (-webkit-min-device-pixel-ratio: 2){
    .medicine_container{
        display: none;
    }
    #mobile-view{
        display: grid;
        grid-template-rows: 120px 1fr 50px;
        height: 100%;
        overflow: hidden;
        
        width: 100vw;
    }
    .mobile-top{
        padding: 5px 15px;
        background: white;
        z-index: 1;
    }
    .item-container{
        overflow-y: scroll;
    }
    .logo-box,.top-menu{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #logo{
        width: 90px;
        height: 70px;
    }
    .logo-box {
        font-size: 18px;
        width: 150px;
        color: crimson;
        text-transform: capitalize;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .top-menu{

        color: indianred;
    }
    .top-menu i{
        font-size: 20px;
        cursor: pointer;
        padding: 12px 5px ;
        border-radius: 50%;
    }
    
    .category-header{
        display: flex;
        width: 100vw;
        overflow-y: scroll;
        position: sticky;
        top: 0;
        background: white;
        z-index: 1;
        border-bottom: 1px solid rgb(219, 219, 219);
        margin: 0;
        transform: translateZ(0);
        -webkit-transform: translateZ(0);
    }
    .toggle-category{
        display: none;
        position: relative;
    }
    .list-card{
        margin: 0 10px;
        text-align: center;
    }
    .list-card img{
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }
    .list-card:hover{
        background: none;
    }
    .list-card:hover img{
        transform: none;
        transition: none;
    }
    .list-name{
        margin: 5px 0;
        color: coral;
        width: max-content;
        font-size: 16px;
    }
    #med-items{        
        padding: 5px 10px;
    }

    .mobile-footer{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 15px;
        background: white;
        border-top: 1px solid rgb(219, 219, 219);
    }
    .mobile-footer{
        color: indianred;
        text-transform: uppercase;
        font-size: 16px;
        position: static;
    }
    #category-name{
        font-size: 25px;
        font-family: 'Aclonica', sans-serif;
    }
    #item-card{
        width: 150px;
        height: 200px;
    }
    #item-card img{
        width: 100px;
        height: 100px;
    }
    #item-name,#item-price{
        font-size: 16px;
    }
    .list-card{
        flex-direction: column;
    }
    
}

@media screen and (max-width : 400px) and (-webkit-min-device-pixel-ratio: 2){
    #mobile-view{
        min-height: -webkit-fill-available;
    }
    #item-card{
        height: 200px;
        width: 140px;
    }
    #med-items{
        padding: 0;
    }
}
    </style>
</head>

<body>
    <!--==================== HEADER ====================-->
    <div>
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo"><img src="assets/img/logo.png" width="20px" height="20px">
                    WellnessWise</a>

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
                            <a href="medicine.php" class="nav__link active-link">
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
                
                </ul>


            </nav>
        </header>
    </div>

    <!--desktop view-->
    <div class="medicine_container" id="medicine_container">
        <div id="menu">
            <div class="title">
                <img src="./assets/images/medicine1.jpeg" alt="">
            </div>
            <div class="menu-item">
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Contact Us</a>
            </div>
        </div>

        <div id="med-container">
            <div id="med-items" class="d-med-items">
                <div id="cardiologists" class="d-cardiologists">
                    <p id="category-name">Cardiologists</p>
                </div>

                <div id="neurologists" class="d-neurologists">
                    <p id="category-name">Neurologists</p>
                </div>

                <div id="dentist" class="d-dentist">
                    <p id="category-name">Dentist</p>
                </div>

                <div id="gynecologists" class="d-gynecologists">
                    <p id="category-name">Gynecologists</p>
                </div>

                <div id="oncologists" class="d-oncologists">
                    <p id="category-name">Oncologists</p>
                </div>

                <div id="psychiatrists" class="d-psychiatrists">
                    <p id="category-name">Psychiatrists</p>
                </div>

                <div id="endocrinologist" class="d-endocrinologist">
                    <p id="category-name">Endocrinologist</p>
                </div>

                <div id="orthopedic" class="d-orthopedic">
                    <p id="category-name">Orthopedic</p>
                </div>

                <div id="audiologist" class="d-audiologist">
                    <p id="category-name">Audiologist</p>
                </div>

                <div id="radiologist" class="d-radiologist">
                    <p id="category-name">Radiologist</p>
                </div>
            </div>
        </div>

        <div id="cart">
            <div id="category-list">
                <p class="item-menu">Go For Hunt</p>
                <div class="border"></div>
            </div>
        </div>
    </div>


    <!-- mobile view -->
    <div id="mobile-view" class="mobile-view">
        <div class="mobile-top">
            <div class="logo-box">
                <img src="./assets/images/medicine1.jpeg" alt="" id="logo">
            </div>
        </div>
        <div class="item-container">
            <div class="category-header" id="category-header">
            </div>

            <div id="med-items" class="med-items">
                <div id="cardiologists" class="m-cardiologists">
                    <p id="category-name">Cardiologists</p>
                </div>

                <div id="neurologists" class="m-neurologists">
                    <p id="category-name">Neurologists</p>
                </div>

                <div id="dentist" class="m-dentist">
                    <p id="category-name">Dentist</p>
                </div>

                <div id="gynecologists" class="m-gynecologists">
                    <p id="category-name">Gynecologists</p>
                </div>

                <div id="oncologists" class="m-oncologists">
                    <p id="category-name">Oncologists</p>
                </div>

                <div id="psychiatrists" class="m-psychiatrists">
                    <p id="category-name">Psychiatrists</p>
                </div>

                <div id="endocrinologist" class="m-endocrinologist">
                    <p id="category-name">Endocrinologist</p>
                </div>

                <div id="orthopedic" class="m-orthopedic">
                    <p id="category-name">Orthopedic</p>
                </div>

                <div id="audiologist" class="m-audiologist">
                    <p id="category-name">Audiologist</p>
                </div>

                <div id="radiologist" class="m-radiologist">
                    <p id="category-name">Radiologist</p>
                </div>
            </div>
        </div>
        <div class="mobile-footer">


        </div>
    </div>

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


    <script src="assets/js/medicine.js"></script>
</body>
 
</html>