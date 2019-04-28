<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {

			// bd_product
			$productByCode = $db_handle->runQuery("SELECT * FROM wines WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array(
			'wineName'=>$productByCode[0]["wineName"], 
			'code'=>$productByCode[0]["code"], 
			'quantity'=>$_POST["quantity"], 
			'price'=>$productByCode[0]["price"], 
			'picture'=>$productByCode[0]["picture"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<html style="background-image: url(images/background/5.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;">


<head>
    <title>Our selection of red wines</title>
    <link rel="stylesheet" type="text/css" href="css/mainmenu.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"  />

</head>

<body>
<div class="sticky">
     <p id="mainmenubutton"> <a href="index.html">back to <br> main menu </a></p>
</div>

<div class="sticky">
     <p id="basketbutton"> <a href="basket.php">go to <br> your cart </a></p>
</div>

<!-- PRODUCTS block -->
<p style="font-size: 2.4em; font-style: oblique; text-align: center; color:black;     style="position: absolute;"> 
	<b>Our selection of red wines</b> </p>
    
	<p style="text-align: right; box-shadow: 0 2px black;">            
    		<script type="text/javascript" >
            		var today = new Date();
            		document.write( "Today is " );
            		document.write( today.toDateString() );
    		</script>
	</p>


<!-- PRODUCTS GALLERY WITH PICS -->
<div class="container">

	
	<?php
	$product_array = $db_handle->runQuery("SELECT code, typeID, wineName, typeID, originID, price, picture, available FROM wines WHERE typeID = 'red'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="reds.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["picture"]; ?>"></div>
		<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["wineName"]; ?></div>
			<div class="product-description"><?php echo $product_array[$key]["typeID"]." wine from ".$product_array[$key]["originID"]; ?></div>
			<div class="product-description"><?php echo $product_array[$key]["available"]." bottles in stock"; ?></div>
			<div class="product-price"><?php echo "£".$product_array[$key]["price"]; ?></div>
			<div class="cart-action">
			<input type="text" class="product-quantity" name="quantity" value="1" size="2" />
			<input type="submit" value="Add to Basket" class="btnAddAction" />
			</div>
		</div>
			</form>
		</div>

	<?php
		}
	}
	?>
</div>


<!-- CART block -->
<div id="shopping-cart">
<p style="font-size: 2.4em; font-style: oblique; text-align: center; color:black;     margin: 2% auto;"> 
	<b>Shopping Cart</b> </p>

<a id="btnEmpty" href="reds.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="4" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;" width="53%">Name</th>
<!--	<th style="text-align:left;">Code</th> -->
<th style="text-align:right;" width="2%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="13%">Subtotal</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img style="transform: rotate(90deg);" src="<?php echo $item["picture"]; ?>" class="cart-item-image" /><?php echo $item["wineName"]; ?></td>
			<!--	<td><?php echo $item["code"]; ?></td> -->
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="reds.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img style="max-height: 26px; max-width: 26px" src="images/delete_icon.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>



<tr>
<td colspan="2" align="right">Total to Pay:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

</body>
</html>
