<!DOCTYPE html>
<?php
	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$seldb = @mysqli_select_db($db_link, "mydb");
	if (!$seldb) die("資料庫選擇失敗！");
	$sql_query = "SELECT * FROM `customer` where `phone` =".$_GET["phone"];
	$result = mysqli_query($db_link, "$sql_query");
?>

<html lang="zh-TW" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>茶藝復興</title>
    <link rel="shortcut icon" href="ico.ico">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
    <div id="head">
      <img id="icon" src="icon.png" alt="茶藝復興">
      <p id="slogan"><b>THE RENAISSANCE SOME PLACE FOR YOU TO DRINK&REST</b></p>
    </div>
    <div id="border">
			<a href="index.html" class="button" title="HOME"><img class="brimage" src="homeicon.png" alt="HOME"></a>
      <a href="introduce.html" class="button" title="食記"><img class="brimage" src="introicon.png" alt="INTRODUCTION"></a>
      <a href="customer.php" class="button" title="加入會員"><img class="brimage" src="customericon.ico" alt="MEMBER"></a>
      <a href="menu.php" class="button" title="MENU"><img class="brimage" src="menuicon.png" alt="MENU"></a>
      <a href="https://goo.gl/sox9Ed" class="button" title="MAP"><img class="brimage" src="mapicon.png" alt="MAP"></a>
      <a href="https://www.facebook.com/NecalYi/" class="button" title="FACEBOOK"><img class="brimage" src="fbicon.png" alt="FACEBOOK"></a>
      <a href="https://www.instagram.com/bestmilktea/" class="button" title="INSTERGRAM"><img class="brimage" src="igicon.png" alt="INSTERGRAM"></a>
      <p id="phone">TL:07-551-8787</p>
    </div>
		<div id="main-order">
			<div id="main-order2">
        <p><button class="orderbutton" onclick="location.href='customer.php'">回會員頁面</button></p>
        <table class="tablestyle">
          <tr>
						<th>編號</th>
				    <th>姓名</th>
				    <th>生日</th>
				    <th>電話</th>
				    <th>地址</th>
				    <th>信箱</th>
				    <th>功能</th>
          </tr>
          <?php
          	while($row_result=mysqli_fetch_assoc($result)){
          		echo "<tr>";
          		echo "<td>".$row_result["mId"]."</td>";
          		echo "<td>".$row_result["name"]."</td>";
          		echo "<td>".$row_result["birthday"]."</td>";
          		echo "<td>".$row_result["phone"]."</td>";
          		echo "<td>".$row_result["address"]."</td>";
          		echo "<td>".$row_result["email"]."</td>";
          		echo "<td><a href='delete_customer.php?id=".$row_result["mId"]."'>刪除</a></td>";
          		echo "</tr>";
          	}
          ?>
        </table>
			</div>
		</div>
    <div id="footer">
      <p class="word">@justforhomework2019</p>
    </div>
  </body>
</html>
