<!DOCTYPE html>
<?php
	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$seldb = @mysqli_select_db($db_link, "mydb");
	if (!$seldb) die("資料庫選擇失敗！");
	$pageRow_records = 5;
	$num_pages = 1;
	if (isset($_GET['page'])) {
	  $num_pages = $_GET['page'];
	}
	$startRow_records = ($num_pages -1) * $pageRow_records;
	$sql_query = "SELECT * FROM `customer`";
	$sql_query_limit = $sql_query." LIMIT ".$startRow_records.", ".$pageRow_records;
	$result = mysqli_query($db_link, $sql_query_limit);
	$all_result = mysqli_query($db_link, $sql_query);
	$total_records = mysqli_num_rows($all_result);
	$total_pages = ceil($total_records/$pageRow_records);
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
				<hr color= white size="2" width="20%">
				<p class="order1">目前會員人數：<?php echo $total_records;?> 人</p>
				<hr color= white size="2" width="20%">
				<p ><button class="orderbutton" onclick="location.href='add_customer.php'">新增會員資料</button></p>
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
					</table><br>
					<table border="0" align="center" >
					  <tr>
					    <?php if ($num_pages > 1) {?>
					    <td><a href="customer.php?page=1">第一頁</a></td>
					    <td><a href="customer.php?page=<?php echo $num_pages-1;?>">上一頁</a></td>
					    <?php } ?>
					    <?php if ($num_pages < $total_pages) {?>
					    <td><a href="customer.php?page=<?php echo $num_pages+1;?>">下一頁</a></td>
					    <td><a href="customer.php?page=<?php echo $total_pages;?>">最後頁</a></td>
					    <?php } ?>
					  </tr>
					</table>
					<table border="0" align="center" style="color: white;">
					  <tr>
					  	<td>
					  	  頁數：
					  	  <?php
					  	  for($i=1;$i<=$total_pages;$i++){
					  	  	  if($i==$num_pages){
					  	  	  	  echo $i." ";
					  	  	  }else{
					  	  	      echo "<a href=\"customer.php?page=$i\">$i</a> ";
					  	  	  }
					  	  }
					  	  ?>
					  	</td>
					  </tr>
					</table><br>
					<form class="researchform" action="research_customer.php" method="GET">輸入會員電話
					 <input type="Text" name="phone">
					 <input type="Submit" value="查詢">
					</form>
			</div>
		</div>
    <div id="footer">
      <p class="word">@justforhomework2019</p>
    </div>
  </body>
</html>
