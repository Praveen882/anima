<?php

$dsn = 'mysql:host=localhost;dbname=anima';
$username = 'root';
$password = '';

try {
	$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	exit();
}

$statement = $db->prepare("SELECT * FROM codingContest");
$statement->execute();
$stmt = $statement->fetchAll();
foreach ($stmt as $stmt);

if (isset($_POST['update'])) {

	$sql = "UPDATE codingContest SET 

	BLanguage = :BLANGUAGE,
	ILanguage = :ILANGUAGE,
	ALanguage = :ALANGUAGE,

	BDate = :BDATE,
	IDate = :IDATE,
	ADate = :ADATE,

	BTime = :BTIME,
	ITime = :ITIME,
	ATime = :ATIME,

	BPlace = :BPLACE,
	IPlace = :IPLACE,
	APlace = :APLACE


	WHERE TableID = :id";

	try {
		$updateStatment = $db->prepare($sql);
		$updateStatment->bindValue(':id', 't1');

		$updateStatment->bindValue(':BLANGUAGE', $_POST['blanguage']);
		$updateStatment->bindValue(':ILANGUAGE', $_POST['ilanguage']);
		$updateStatment->bindValue(':ALANGUAGE', $_POST['alanguage']);

		$updateStatment->bindValue(':BDATE', $_POST['bdate']);
		$updateStatment->bindValue(':IDATE', $_POST['idate']);
		$updateStatment->bindValue(':ADATE', $_POST['adate']);

		$updateStatment->bindValue(':BTIME', $_POST['btime']);
		$updateStatment->bindValue(':ITIME', $_POST['itime']);
		$updateStatment->bindValue(':ATIME', $_POST['atime']);

		$updateStatment->bindValue(':BPLACE', $_POST['bplace']);
		$updateStatment->bindValue(':IPLACE', $_POST['iplace']);
		$updateStatment->bindValue(':APLACE', $_POST['aplace']);


		if ($updateStatment->execute()) {
			echo '<script>alert("Updated")</script>';
			header("refresh: 1");
		} else {
			echo '<script>alert("Not Update")</script>';
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Coding Contest</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">

</head>

<body>
	<div>
		<form action="" method="post">
			<div class="limiter">
				<div class="container-table100">
					<div class="wrap-table100">
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="cell100 column1">LEVEL</th>
											<th class="cell100 column2">BIGINNER</th>
											<th class="cell100 column3">INTERMEDIATE</th>
											<th class="cell100 column4">ADVANCED</th>

										</tr>
									</thead>
								</table>
							</div>

							<div class="table100-body js-pscroll">
								<table>
									<tbody>
										<!-------------enter programming language here------------>
										<tr class="row100 body">
											<td class="cell100 column1">PROGRAMMING<br>LANGUAGE</td>
											<td class="cell100 column2"><input type="text" name="blanguage" value="<?php echo $stmt['BLanguage'] ?>" /></td>
											<td class="cell100 column3"><input type="text" name="ilanguage" value="<?php echo $stmt['ILanguage'] ?>" /></td>
											<td class="cell100 column4"><input type="text" name="alanguage" value="<?php echo $stmt['ALanguage'] ?>" /></td>

										</tr>
										<!----------------language ends here------------>

										<!-------------insert date here----------------->
										<tr class="row100 body">
											<td class="cell100 column1">DATE</td>
											<td class="cell100 column2"><input type="text" name="bdate" value="<?php echo $stmt['BDate'] ?>" /></td>
											<td class="cell100 column3"><input type="text" name="idate" value="<?php echo $stmt['IDate'] ?>" /></td>
											<td class="cell100 column4"><input type="text" name="adate" value="<?php echo $stmt['ADate'] ?>" /></td>

										</tr>
										<!-----------------date ends here-------------->

										<!----------------insert time here------------->
										<tr class="row100 body">
											<td class="cell100 column1">TIME</td>
											<td class="cell100 column2"><input type="text" name="btime" value="<?php echo $stmt['BTime'] ?>" /></td>
											<td class="cell100 column3"><input type="text" name="itime" value="<?php echo $stmt['ITime'] ?>" /></td>
											<td class="cell100 column4"><input type="text" name="atime" value="<?php echo $stmt['ATime'] ?>" /></td>

										</tr>
										<!----------------time ends here-------------->

										<!----------------inser place start here------>
										<tr class="row100 body">
											<td class="cell100 column1">PLACE</td>
											<td class="cell100 column2"><input type="text" name="bplace" value="<?php echo $stmt['BPlace'] ?>" /></td>
											<td class="cell100 column3"><input type="text" name="iplace" value="<?php echo $stmt['IPlace'] ?>" /></td>
											<td class="cell100 column4"><input type="text" name="aplace" value="<?php echo $stmt['APlace'] ?>" /></td>

										</tr>
										<!-------------- place ends here------------->

										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<input type="submit" name="update" class="custom-btn10 btn-10" value="UPDATE" />
		</form>
	</div>
	<!--regiter button-->
</body>

</html>