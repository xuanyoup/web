<!DOCTYPE html>
<?php
if(isset($_POST["action"])&&($_POST["action"]=="add")){
	include("connMysql.php");
	if (!@mysqli_select_db($db_link, "data")) die("資料庫選擇失敗！");
	$sql_query = "INSERT INTO `orderlist` (`cName` ,`cInout` ,`cDrink` ,`cSugar` , `cAdd`, `cAddress` ,`cPhone`) VALUES (";
	$sql_query .= "'".$_POST["cName"]."',";
	$sql_query .= "'".$_POST["cInout"]."',";
	$sql_query .= "'".$_POST["cDrink"]."',";
	$sql_query .= "'".$_POST["cSugar"]."',";
  $sql_query .= "'".$_POST["cAdd"]."',";
	$sql_query .= "'".$_POST["cAddress"]."',";
	$sql_query .= "'".$_POST["cPhone"]."')";
	mysqli_query($db_link, $sql_query);
	header("Location: order.php");
}
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
      <a href="order.php" class="button" title="訂單"><img class="brimage" src="ordericon.png" alt="ORDER"></a>
      <a href="https://goo.gl/sox9Ed" class="button" title="MAP"><img class="brimage" src="mapicon.png" alt="MAP"></a>
      <a href="https://www.facebook.com/NecalYi/" class="button" title="FACEBOOK"><img class="brimage" src="fbicon.png" alt="FACEBOOK"></a>
      <a href="https://www.instagram.com/bestmilktea/" class="button" title="INSTERGRAM"><img class="brimage" src="igicon.png" alt="INSTERGRAM"></a>
      <p id="phone">TL:07-551-8787</p>
    </div>
		<div id="main-order">
			<div id="main-order2">
        <p><button class="orderbutton" onclick="location.href='order.php'">回訂單頁面</button></p>
        <form action="" method="post" name="formAdd" id="formAdd">
          <table class="tablestyle">
            <tr>
              <th>欄位</th><th>資料</th>
            </tr>
            <tr>
              <td>姓名</td><td><input type="text" name="cName" id="cName"></td>
            </tr>
            <tr>
              <td>自取/外送</td><td>
              <input type="radio" name="cInout" id="radio" value="I" checked>自取
              <input type="radio" name="cInout" id="radio" value="O">外送
              </td>
            </tr>
            <tr>
              <td>飲料</td><td><input type="text" name="cDrink" id="cDrink"></td>
            </tr>
            <tr>
              <td>糖度</td><td><input type="text" name="cSugar" id="cSugar"></td>
            </tr>
            <tr>
              <td>加料</td><td><input type="text" name="cAdd" id="cAdd"></td>
            </tr>
            <tr>
              <td>地址</td><td><input type="text" name="cAddress" id="cAddress"></td>
            </tr>
            <tr>
              <td>電話</td><td><input type="text" name="cPhone" id="cPhone"></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
              <input name="action" type="hidden" value="add">
              <input type="submit" name="button" id="button1" value="新增資料">
              <input type="reset" name="button2" id="button1" value="重新填寫">
              </td>
            </tr>
          </table>
        </form>
			</div>
		</div>
    <div id="footer">
      <p class="word">@justforhomework2019</p>
    </div>
  </body>
</html>
