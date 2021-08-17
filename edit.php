<?php	
	require_once("dbcontroller.php");
	$db_handle = new DBController();

    if (!empty($_POST["submit"])) {
        $query = "UPDATE item set name = '".$_POST["name"]."', code = '".$_POST["code"]."', category ='".$_POST["category"]."', 
        price = '".$_POST["price"]."', stock_count = '".$_POST["stock_count"]."' WHERE id=".$_GET["id"];
        $result = $db_handle->executeQuery($query);
        if (!$result) {
            $massage="Not found";
        }else {
            header("Location:index.php");
        }
    }
    $result = $db_handle->runQuery("SELECT * FROM item WHERE id='". $_GET["id"]."'");
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
        <span id="name-info" class="demoInputBox" >
            <input type="text" name="name" class="demoInputBox" id="name" value="<?php echo $result[0]["name"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">code</label>
        <span id="code-info" class="demoInputBox" >
            <input type="text" name="code" class="demoInputBox" id="code" value="<?php echo $result[0]["code"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">category</label>
        <span id="category-info" class="demoInputBox" >
            <input type="text" name="category" class="demoInputBox" id="category" value="<?php echo $result[0]["category"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">price</label>
        <span id="price-info" class="demoInputBox" >
            <input type="number" name="price" class="demoInputBox" id="price" value="<?php echo $result[0]["price"]; ?>">
    </div>
    <div>
        <label style="padding: top 20px;">stock</label>
        <span id="stock_count-info" class="demoInputBox" >
        <input type="number" name="stock_count" class="demoInputBox" id="stock_count" value="<?php echo $result[0]["stock_count"]; ?>">
    </div>
    <div>
        <input type="submit" name="submit" id="btnAddAction" value="Save" />
        <a href="index.php" id="btnAddAction">Back</a>
    </div>
</form>
</body>
</html>