<?php
    $errors = array();

    // check for a product id Number
    $ProductId = trim($_POST['ProductId']);
    if(empty($ProductId)) {
        $errors[] = "The Product ID field is empty";
    }

    //check for SKU
    $SKU = trim($_POST['SKU']);
    if(empty($SKU)) {
        $errors[] = "The Stock Keeping Unit (SKU) field is empty";
    }

    // check for the added date
    $DateAdded = trim($_POST['DateAdded']);
    if(empty($DateAdded)) {
        $errors[] = "The Added Date field is empty";
    }

    // check for a name of the product
    $Name= trim($_POST['Name']);
    if(empty($Name)) {
        $errors[] = "The product name field is empty";
    }

    // check for a Price of the product
    $Price= trim($_POST['Price']);
    if(empty($Price)) {
        $errors[] = "The Model field is empty";
    }

    //check for the status of the product
    $Status = trim($_POST['Status']);
    if(empty($Status)) {
        $errors[] = "The Acquired Date field is empty";
    }

    //check for the picture URI
    $PictureURI = trim($_POST['PictureURI']);
    if(empty($PictureURI)) {
        $errors[] = "The Purchase Price field is empty";
    }

    //check for the product stock amount
    $StockAmount = trim($_POST['StockAmount']);
    if(empty($StockAmount)) {
        $errors[] = "The Current Value field is empty";
    }

    //check for Description
    $ProductDesc = trim($_POST['ProductDesc']);
    if(empty($ProductDesc)) {
        $errors[] = "The Description field is empty";
    }


    $status = "Available";


    if(empty($errors)) {

        try {
            require('includes/db.inc.semester.project.php');
            $query = "INSERT INTO McMart.Products (ProductId, DateAdded, SKU, Name, Price, Status, PictureURI, StockAmount, ProductDesc)      ";
            $query .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $q = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($q, $query);
            mysqli_stmt_bind_param($q, "sssssssss", $ProductId, $DateAdded, $SKU, $Name, $Price, $Status, $PictureURI, $StockAmount, $ProductDesc);
            //execute the query
            mysqli_stmt_execute($q);
            if (mysqli_stmt_affected_rows($q) == 1) {
                echo '<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">A New Product Added to the System!</h4>
                        <p>If you want to make an update to the added product, please click the button below.</p>
                        <hr>
                        <p class="mb-0">Extra Text provided here.</p>
                        </div>' ;
                exit();
            } else {
                $errorstring = "<p class ='text-center col-sm-8' style='color:red'>";
                $errorstring .= "System Error<br/>you could not be registered due ";
                $errorstring .= "to a system error. we apologize for any inconvenience.</p>";
                echo " <p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
                echo '<p>'. mysqli_error($conn) . '<br><br>Query:' . $query . '</p>';
                mysqli_close($conn);
                exit();
            }
        }

        catch (Exception $e) {
            echo "The System is quite busy right now";
        }
        catch (Error $e) {
            echo "error";
        }

    } else {
        $errorstring = "Error! <br> /> The following error(s) occurred:<br>";
        foreach ($errors as $msg) {
            $errorstring .= " - $msg<br>\n";
        }
        $errorstring .= "Please try again.<br>";
        echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
    }// End of if (empty($errors)) IF.
?>