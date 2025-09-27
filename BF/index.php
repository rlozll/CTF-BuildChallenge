<?php
// --- index.php ---

// 실제 정답 플래그 (이 값을 맞춰야 합니다)
$SECRET_FLAG = "SWING{2026_1s_jus7_ar0unD_Th3_c0rN3r}";

// URL에 ?flag=... 파라미터가 있는지 확인합니다.
if (isset($_GET['flag'])) {
    // 사용자가 제출한 추측 값을 가져옵니다.
    $user_guess = $_GET['flag'];

    // strpos 함수를 사용해 사용자의 추측이 실제 플래그의 시작 부분과 일치하는지 확인합니다.
    // '===' 0 은 정확히 맨 앞에서부터 일치한다는 의미입니다.
    if (strpos($SECRET_FLAG, $user_guess) === 0) {
        $message = "Correct prefix! Keep trying.";
    } else {
        $message = "Wrong guess.";
    }
    
    // 자동화 스크립트가 파싱하기 쉽도록 순수 텍스트 메시지만 출력하고 실행을 종료합니다.
    // 이렇게 하지 않으면 스크립트는 불필요한 HTML까지 전부 응답으로 받게 됩니다.
    exit($message);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Brute Force Challenge</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        code { background-color: #f4f4f4; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>Brute Force Challenge 🚩</h1>
    <p>플래그를 찾아보세요! 형식은 <code>SWING{...}</code> 입니다.</p>
</body>
</html>