<!DOCTYPE html>
<html>
<head>

<meta charset = "UTF-8"/>
<title>高木さんのブログ</title>
<link rel="stylesheet" type="text/css" href="../css/blog.css">


</head>
<body>
<?php
//php初期情報の確認。はじめにincludeして現在の記事を更新する
include "../env/env.inc";
include "../env/dbh.inc";
include "../env/func.inc";
//ブログの記事を読み込み、配列に格納する
$q = "";
$q = "select * from kiji order by kiji_num";
queryarray($q);
?>
<!----------------------------------------------------------
ブログの下書きとか
このページでは
トップ画面
記事の一覧
プロフなどのリンク

なんかを追加していきます。
このページを保持しつつ、ブログの記事内容などに関しては
このページの中を表示していくスタイルにしましょう
------------------------------------------------------------>
<!--ヘッダー-->
<div >
	<h1>高木さんのブログ</h1>
	<div>
		<p><img src = "../img/test.jpg" alt = "なんかすごい"></p>
	</div>
	<ul>
		<li><a href = "blog.html">ホーム</a></li>
		<li><a href = "prof.html">プロフィール</a></li>
	</ul>
<!---ヘッダー終了------>
<!--紹介文-->
	<div>
		<h2>高木さんのブログです</h2>
		<p>不定期に部伍具が更新されます</p>
		<p>思ったこととかを書き加えていきます</p>
<!--紹介文終了-->

<!--最新情報-->



<!--最新情報終了-->

<!-----------------------------カレンダーー---------------------->
<div>
<p>テスト　カレンダー</p>
<table border ='1'>
<tr>
 <th>日</th>
 <th>月</th>
 <th>火</th>
 <th>水</th>
 <th>木</th>
 <th>金</th>
 <th>土</th>
</tr>
<tr>
<?php
//ここからphpを使ってのカレンダー取得
$y = 2014;
$m = 7;
$d = 1;

$wd1 = date("w", mktime(0, 0, 0, $m, 1, $y));
for($i=1; $i<=$wd1; $i++){
	echo "<td>　</td>";
}


while(checkdate($m , $d , $y)){
	echo "<td>$d</td>";
	if(date("w", mktime(0, 0, 0, $m, $d, $y)) == 6){
		echo "</tr>";
		if(checkdate($m , $d+1 , $y)){
			echo "<tr>";
		}
	}
	$d++;

}

$wx = date("w", mktime(0, 0, 0, $m+1, 0, $y));

for($i = 1; $i < 7 - $wx; $i++){
	echo "<td>　</td>";
}

if(!$wx == 7){
	echo "</tr>";
}
?>




</table>

</div>


<!-----------------------------カレンダー終了------------------>

<!-----------------------------カテゴリー---------------------->
<div>
<p>テスト　カテゴリーー</p>

</div>


<!-----------------------------カテゴリー終了------------------>

<!------------------------------------------------------------
----------------メイン部分------------------------------------
この間にメインの文章を追加する
-->
<?php
//ここから始まる記事内容


//記事の要素数を数える
$kiji_count = count($kiji_num);

for($i = 0 ; $i < $kiji_count ; $i++){
	echo "<h2>$kiji_title[$i]</h2>";
	echo "<p>$kiji_date[$i]</p>";
	echo "<p>$kiji[$i]" . "</p>";
}


?>




<!--メイン終了-->
<!--フッター-->
		<div>
				<p> &copy; y-naaminotane-mp All right reserve</p>
		</div>
<!--フッター終了-->
	</div>
</div>

</body>

</html>
