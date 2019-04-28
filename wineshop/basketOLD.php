<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
            	if(!empty($_POST["quantity"])) {

                // bd_product
                $productBywineID = $db_handle->runQuery("SELECT * FROM wines WHERE wineID='" . $_GET["wineID"] . "'");
                $itemArray = array($productBywineID[0]["wineID"] => array(
                    'wineName' => $productBywineID[0]["wineName"],
                    'wineID' => $productBywineID[0]["wineID"],
                    'quantity' => $_POST["quantity"],
                    'price' => $productBywineID[0]["price"],
                    'picture' => $productBywineID[0]["picture"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productBywineID[0]["wineID"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productBywineID[0]["wineID"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["wineID"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
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
	background-attachment: fixed;">">
<head>
<title>Your Basket @ Vintage Wine Shop</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--will enable Responsive Web Design later-->
<meta name="description" content="A student project for an online wine shop">
<meta name="keywords" content="wine shop, wine store, order wine online, vintage wine, fine wine">
 <!--FAVICON BELOW-->
<link rel="shortcut icon" href="favicon.ico"> 
    
<link rel="stylesheet" href="css/mainmenu.css" type="text/css" media="all">
<link rel="stylesheet" href="css/forms.css" type="text/css" media="all">

    
 <link rel="stylesheet" href="css/slicknav.css">
        <script src="js/login_validation.js"></script>
    	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    	<script src="js/jquery.slicknav.min.js"></script>
		<script type="text/javascript">
    	$(document).ready(function(){
			$('#nav_menu').slicknav({prependTo:"#mobilemenu"});
    	});
    	</script>
</head>


<body>
<p style="font-size: 2.4em; font-style: oblique; text-align: center; color:black;     margin: 2% auto;"> 
	<b>Shopping Cart</b> </p>
    
	<p style="text-align: right; box-shadow: 0 2px black;">            
    		<script type="text/javascript" >
            		var today = new Date();
            		document.write( "Today is " );
            		document.write( today.toDateString() );
    		</script>
	</p>


<!--BASKET STARTS HERE-->
<div id="shopping-cart"  style="padding: 0 80px;">


    <a id="btnEmpty" href="basket.php?action=empty">Delete Items</a>
	
    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Catalogue Number</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                ?>
                <tr>
                    <td><img style="max-height: 110px;   border: 2px solid black; margin-right: 13px;" src="<?php echo $item["picture"]; ?>" class="cart-item-picture"/><?php echo $item["wineName"]; ?>
                    </td>
                    <td><?php echo $item["wineID"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;"><?php echo "£ " . $item["price"]; ?></td>
                    <td style="text-align:right;"><?php echo "£ " . number_format($item_price, 2); ?></td>
                    <td style="text-align:center;">
                        <a href="basket.php?action=remove&wineID=<?php echo $item["wineID"]; ?>" class="btnRemoveAction"><img
                                    src="images/icon-delete.png" alt="Remove Item"/></a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>


                <!-- pound -->
                <td align="right" colspan="2"><strong><?php echo "£ " . number_format($total_price, 2); ?></strong></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="no-records">Your Basket is Empty</div>
        <?php
    }
    ?>
</div>
<main>
<a id="payment" href="payment.html">Pay Now</a>

</main>

</body>
</html>
