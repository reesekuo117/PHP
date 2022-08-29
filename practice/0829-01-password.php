<?php
$p = '123456';

echo json_encode([
    'hash1' => password_hash($p, PASSWORD_DEFAULT),
    'hash2' => password_hash($p, PASSWORD_DEFAULT),
    'mb5_1' => md5($p),
    'mb5_2' => md5($p),
    'sha1_1' => sha1($p),
    'sha1_2' => sha1($p),
]);
// password_hash() 創建的雜湊 可以避免資料被攻擊
// password_verify 用來驗證密碼和雜湊是否匹配

/* 
{
    "hash1": "$2y$10$dEXEOH70eIzkQobUg/2mjOGNhdGPfJJO5f.FELCBDLvX40v./Fn8i",
    "hash2": "$2y$10$2.X7GZQns2Mx4/yv0fullucJQ9PEavcrYVPk8Pow6AERHSnlMz9xS",
    "mb5_1": "e10adc3949ba59abbe56e057f20f883e",
    "mb5_2": "e10adc3949ba59abbe56e057f20f883e",
    "sha1_1": "7c4a8d09ca3762af61e59520943dc26494f8941b",
    "sha1_2": "7c4a8d09ca3762af61e59520943dc26494f8941b"
}
*/
?>