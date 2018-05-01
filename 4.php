<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
</head>
<body>
    PHP에서 1+1은 <?php echo 1+1; ?> 입니다. <br>
    <table>
        <tr>
            <th colspan=3>GET POST 차이점</th>
            <th>GET</th>
            <th>POST</th>
        </tr>
        <tr>
            <td colspan=3>전송 방법</td>
            <td>정보가 name과 value쌍으로 url을 통해 전송된다.</td>
            <td>정보가 name과 value쌍으로 http request의 message body를 통해 전송된다.</td>
        </tr>
        <tr>
            <td colspan=3>사용처</td>
            <td>서버에서 정보를 받아올때(get)만 사용 권장</td>
            <td>서버에 정보를 보내거나(post), 수정할 때 사용 권장</td>
        </tr>
        <tr>
            <th colspan=3>PHP에서 $_SERVER 변수에 담긴 정보/설명</th>
            <th colspan=2>*중요하다 생각하는 것 정리</th>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
</body>
</html>