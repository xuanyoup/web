<!DOCTYPE html>
<?php
include("connMysql.php");
if (!@mysqli_select_db($db_link, "mydb")) die("資料庫選擇失敗！");
if(isset($_POST["action"])&&($_POST["action"]=="update")){
	$sql_query = "UPDATE `customer` SET ";
	$sql_query .= "`name`='".$_POST["name"]."',";
	$sql_query .= "`birthday`='".$_POST["birthday"]."',";
	$sql_query .= "`phone`='".$_POST["phone"]."',";
	$sql_query .= "`address`='".$_POST["address"]."',";
	$sql_query .= "`email`='".$_POST["email"]."' ";
	$sql_query .= "WHERE `mId`=".$_POST["mId"];
	mysqli_query($db_link, $sql_query);
	header("Location: customer.php");
}
$sql_db = "SELECT * FROM `customer` WHERE `mId`=".$_GET["id"];
$result = mysqli_query($db_link, $sql_db);
$row_result=mysqli_fetch_assoc($result);
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
      <a href="order.php" class="button" title="線上訂購"><img class="brimage" src="ordericon.png" alt="ORDER"></a>
      <a href="https://goo.gl/sox9Ed" class="button" title="MAP"><img class="brimage" src="mapicon.png" alt="MAP"></a>
      <a href="https://www.facebook.com/NecalYi/" class="button" title="FACEBOOK"><img class="brimage" src="fbicon.png" alt="FACEBOOK"></a>
      <a href="https://www.instagram.com/bestmilktea/" class="button" title="INSTERGRAM"><img class="brimage" src="igicon.png" alt="INSTERGRAM"></a>
      <p id="phone">TL:07-551-8787</p>
    </div>
		<div id="main-order">
			<div id="main-order2">
        <p><button class="orderbutton" onclick="location.href='customer.php'">回會員頁面</button></p>
        <form action="update.php" method="post" name="formFix" >
          <table class="tablestyle">
            <tr>
              <th>欄位</th><th>資料</th>
            </tr>
            <tr>
              <td>姓名</td><td><input type="text" name="name" value="<?php echo $row_result["name"];?>"></td>
            </tr>
            <tr>
              <td>生日</td><td><input type="text" name="birthday" value="<?php echo $row_result["birthday"];?>"></td>
            </tr>
            <tr>
              <td>電話</td><td><input type="text" name="phone" value="<?php echo $row_result["phone"];?>"></td>
            </tr>
            <tr>
              <td>地址</td><td><input type="text" name="address" value="<?php echo $row_result["address"];?>"></td>
            </tr>
            <tr>
              <td>信箱</td><td><input type="text" name="email" value="<?php echo $row_result["email"];?>"></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
              <input name="mId" type="hidden" value="<?php echo $row_result["mId"];?>">
              <input name="action" type="hidden" value="update">
              <input name="button" type="submit" value="更新資料">
              <input name="button2" type="reset" value="重新填寫">
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
