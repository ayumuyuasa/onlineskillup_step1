<?php
$dsn = 'pgsql:dbname=TEST;host=pgsql;port=5432';
$user = 'postgres';
$pass = 'example';

try{
	// DBに接続する
	$dbh = new PDO($dsn, $user, $pass);

	// ここでクエリを実行する
	$sth_select = $dbh->prepare('SELECT * FROM test_comments WHERE name= ?');

	// DBを切断する
	$dbh = null;
} catch (PDOExeption $e){
	// 接続にエラーが発生したら
	print "DB ERROR:" . $e->getMessage() . '<br/>';
	die();
}
?>

<?php
	$name = 'takashi';
	$sth_select->execute(array($name));
	$prepare_result = $sth_select->fetchAll();
	foreach($prepare_result as $row){
		print $row['name'] . ':' . $row['text'] . "<br/>";
	}
?>