<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $phone_num = $_POST["phone_num"];

    $sql = "SELECT * FROM users WHERE username = :username AND phone_num = :phone_num";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":phone_num", $phone_num);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        $_SESSION["user_idx"] = $user["user_idx"];
        $_SESSION["is_admin"] = ($user["phone_num"] == "000-0000-0000") ? true : false;
        
        if($_SESSION["is_admin"]){
            header("Location: /admin");
        } else{
            header("Location: /myPage");
        }
    }
    else {
        echo "<script>alert('예약 정보가 없습니다')</script>";
    }
}

?>
<div id="loginContainer">
    <h1>로그인</h1>
    <form action="" method="post">
        <input placeholder="이름" type="text" name="username" id="username"> <br>
        <input placeholder="전화번호" type="text" name="phone_num" id="phone_num" maxlength="13" oninput="regexPhoneNumber(this);"> <br>
        <button type="submit">로그인</button>
    </form>
</div>