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



<html style="background-image: url(images/background/6.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;">


<head>
    <title> Your Basket/Cart</title>
    <link rel="stylesheet" type="text/css" href="css/mainmenu.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"  />

</head>

<body>
			<!-- <div class="sticky"> -->
 		<p id="mainmenubutton"> <a href="index.html">back to <br> main menu </a></p>
			<!-- </div> -->

		<p id="basketbutton"> <a href="basket.php?action=empty">empty<br> cart </a></p>

<!--BASKET STARTS HERE-->
<div id="shopping-cart">
<p style="font-size: 2.4em; font-style: oblique; text-align: center; color:black;     margin: 2% auto;"> 
	<b>Shopping Cart</b> </p>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="4" cellspacing="1">
<tbody>
<tr>

<th class="basket-column-titles" style="text-align:left;" width="70%">Name</th>
<!--	<th style="text-align:left;">Code</th> -->
<th class="basket-column-titles" style="text-align:right;" width="2%">Quantity</th>
<th class="basket-column-titles" style="text-align:right;" width="10%">Unit Price</th>
<th class="basket-column-titles" style="text-align:right;" width="13%">Subtotal</th>
<th class="basket-column-titles" style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td class="basket-column-items"><img style="transform: rotate(90deg); 	border-bottom: none;" src="<?php echo $item["picture"]; ?>" class="cart-item-image" /><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $item["wineName"]; ?></td>
			<!--	<td><?php echo $item["code"]; ?></td> -->
				<td class="basket-column-items" style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  class="basket-column-items" style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  class="basket-column-items" style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td class="basket-column-items" style="text-align:center;"><a href="basket.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img style="max-height: 26px; max-width: 26px" src="images/delete_icon.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>



<tr>
<td class="basket-column-items" colspan="2" align="right">Total to Pay:</td>
<td class="basket-column-items" align="right"><?php echo $total_quantity; ?></td>
<td class="basket-column-items" align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
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

<main>
<a id="basketbutton"" href="payment.html">Proceed to<br> Payment </a>

</main>
<!--FOOTER-->
<footer>
    

</footer>
</body>
</html>
