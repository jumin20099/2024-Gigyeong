<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap/dist/css/bootstrap.css">
    <title>Skills Camping</title>
</head>
<body>
    <header>
        <div id="headerContainer">
            <div class="logoDiv">
                <a href="./index.html">
                    <img src="logo.JPG" alt="">
                </a>
            </div>
            <div class="section1">
                <a href="./camping.html">캠핑장 소개</a>
                <a href="./reservation.html">예약하기</a>
                <a href="./myPage.html">마이 페이지</a>
            </div>
            <div class="section2">
                <a href="#">로그인</a>
                <a href="#">운영관리</a>
            </div>
        </div>
    </header>

    <div id="content">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./짬통/slide1.jpg" placeholder width="600" height="700" class="bd-placeholder-img-lg d-block w-100" color="#555" background="#777" text="First slide">
              </div>
              <div class="carousel-item">
                <img src="./짬통/slide2.jpg" placeholder width="600" height="700" class="bd-placeholder-img-lg d-block w-100" color="#444" background="#666" text="Second slide">
              </div>
              <div class="carousel-item">
                <img src="./짬통/slide3.jpg" placeholder width="600" height="700" class="bd-placeholder-img-lg d-block w-100" color="#333" background="#555" text="Third slide">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div id="btnCtrl">
              <button onclick="pauseCarousel()" type="button" id="stopBtn" class="btn btn-primary btn-sm">일시 정지</button>
              <button onclick="playCarousel()" type="button" id="playBtn" class="btn btn-primary btn-sm">재개</button>
          </div>
        <div id="contentBoxSection1">
            <div class="contentBox1">
                <img class="contentImg" src="./짬통/content image1.jpg" alt="">
                <h1>#캠핑장 구성</h1>
                <p>- 텐트데크(3m X 5m) : 10개소<br>- 오토캠핑(5m X 8m) : 7개소</p>
            </div>
            <div class="contentBox2">
                <img class="contentImg" src="./짬통/content image3.jpg" alt="">
                <h1>#부대시설</h1>
                <p>- 부대시설 : 관리소, 취사장, 세면장, 화장실,<br>포토존, 전망대, 잔디밭, 어린이놀이터</p>
            </div>
        </div>
        <div id="contentBoxSection2">
            <div class="contentBox3">
                <div>
                    <img class="contentImg" src="./짬통/content image3.jpg" alt="">
                </div>
                <h1>#예약 안내</h1>
                <p>* 캠핑장 예약은 당일부터 13일 후까지 가능합니다.<br>* 캠핑장 입영은 예약한 날의 14시부터 가능합니다.<br>* 당일 예약의 경우 17시부터 입영할 수 있습니다.<br>* 예약문의<br>- 전화번호 041-987-1234<br>- 운영시간 : 평일 09:00 ~ 주말 10:00 ~ 15:00, 점심시간 12:30~13:30</p>
            </div>
        </div>
        
        <div id=map>
            <h1>오시는 길</h1>
            <img src="location.jpg" alt="">
        </div>
    </div>

    <footer>
        <p>
            Copyright(C) Skills Camping All Rights Reserved.<br>충청남도 청양군 대치면 까치내로 123<br>고객센터 전화번호 : 041-987-1234<br>
            고객센터 운영시간 : 평일 09:00 ~ 18:00, 주말 10:00 ~ 15:00, 점심시간 12:30 ~ 13:30<br>
            개인정보처리방침, 홈페이지 이용약관
        </p>
    </footer>
    <script src="./jquery/jquery-3.6.0.js"></script>
    <script src="./bootstrap/dist/js/bootstrap.js"></script>
    <script src="./js/script.js"></script>
    <script>
        carouselSlide();
    </script>
</body>
</html>