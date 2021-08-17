<?php	
	require_once("dbcontroller.php");
	$db_handle = new DBController();

    if (!empty($_POST["submit"])) {
        $query = "INSERT INTO item(name, code, category, price, stock_count) VALUES ('".$_POST["name"]."', 
        '".$_POST["code"]."', '".$_POST["category"]."', '".$_POST["price"]."', '".$_POST["stock_count"]."')";
        $result = $db_handle->executeQuery($query);
        if (!$result) {
            $massage="Not found";
        }else {
            header("Location:index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP CRUD with Search and Pagination</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="" name="frmitem" id="frmitem" onclick="return validate();" method="post">
    <div id="mail-status"></div>
    <div>
        <label style="padding: top 20px;">Name</label>
        <span id="name-info" class="demoInputBox" require>
            <input type="text" name="name" class="demoInputBox" id="name">
    </div>
    <div>
        <label style="padding: top 20px;">code</label>
        <span id="code-info" class="demoInputBox" require>
            <input type="text" name="code" class="demoInputBox" id="code" value="ITEM#">
    </div>
    <div>
        <label style="padding: top 20px;">category</label>
        <span id="category-info" class="demoInputBox" require>
            <input type="text" name="category" class="demoInputBox" id="category">
    </div>
    <div>
        <label style="padding: top 20px;">price</label>
        <span id="price-info" class="demoInputBox" require>
            <input type="number" name="price" class="demoInputBox" id="price">
    </div>
    <div>
        <label style="padding: top 20px;">stock</label>
        <span id="stock_count-info" class="demoInputBox" require>
        <input type="number" name="stock_count" class="demoInputBox" id="stock_count">
    </div>
    <div>
        <input type="submit" name="submit" id="btnAddAction" value="Add" />
        <a href="index.php" id="btnAddAction">Back</a>
    </div>
</form>
</body>
</html>