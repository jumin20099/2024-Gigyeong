<header>
    <div id="headerContainer">
        <div class="logoDiv">
            <a href="/">
                <img src="logo.JPG" alt="">
            </a>
        </div>
        <div class="section1">
            <a href="./camping">캠핑장 소개</a>
            <a href="./reservation">예약하기</a>
            <a href="./myPage">마이 페이지</a>
        </div>
        <div class="section2">
            <?php
            if(isset($_SESSION["is_admin"])){
                echo "<a href='./logout'>로그아웃</a>";
            } else{
                echo '<a href="./login">로그인</a>';
            }
            ?>
            <a href="#">운영관리</a>
        </div>
    </div>
</header>