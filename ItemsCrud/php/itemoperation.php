<?php


require_once("itemcomponent.php");
require_once("../includes/db.inc.php");

//echo "<script>console.log('post'",print_r($_POST);"));</script>";

// create button click
//echo 'operation';
//if ('POST' === $_SERVER['REQUEST_METHOD']) {
//    $message = "checking";
//    echo "<script type='text/javascript'>alert('$message');</script>";

    if (isset($_POST['create'])) {
        $message = "created";
        echo "<script type='text/javascript'>alert('$message');</script>";
        createData();
    }
//echo "<script type='text/javascript'>alert('$_POST[0]');</script>";
    if (isset($_POST['update']) ) {
//    echo '<script>';
//    echo 'console.log("update")';
//    echo '</script>';
        $message = "updated";
        echo "<script type='text/javascript'>alert('$message');</script>";


        UpdateData();
//    } else {
//        $message = "not updated";
//        echo "<script type='text/javascript'>alert('$message');</script>";
//
    }

    if (isset($_POST['delete'])) {
        deleteRecord();
    }

    if (isset($_POST['deleteall'])) {
        deleteAll();

    }
//}
function createData()
{

//    $itemid = textboxValue("item_id");
    $itemname = textboxValue("item_name");
    $itemdescription = textboxValue("item_description");
    $itemprice = textboxValue("item_price");
    $itemamount = textboxValue("item_amount");
    $itemSku = textboxValue('item_sku');
    $pictureURL = textboxValue("pictureUrl");
    $datenow = time();
    $status =  textboxValue("item_status");

    if ($itemname && $itemdescription && $itemprice && $itemamount && $itemSku && $pictureURL && $status) {

        $sql = "INSERT INTO products (Name, ProductDesc, Price, StockAmount,Status,PictureURI,SKU,DateAdded) 
                        VALUES ('$itemname','$itemdescription','$itemprice','$itemamount','$status','$pictureURL','$itemSku','$datenow' )";

        if (mysqli_query($GLOBALS['conn'], $sql)) {
            TextNode("success", "Record Successfully Inserted...!");
        } else {
            echo "Error From Create Data";
        }

    } else {
        TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value)
{

    $textbox = mysqli_real_escape_string($GLOBALS['conn'], trim($_POST[$value]));
    if (empty($textbox)) {
        echo '<script>';
        echo 'console.log("False")';
        echo '</script>';
        return false;
    } else {
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData()
{

    $sql = "SELECT * FROM products";

    $result = mysqli_query($GLOBALS['conn'], $sql);

    if (!$result || mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update dat
function UpdateData()
{
    $itemid = textboxValue("item_id");

    $itemname = textboxValue("item_name");
    $itemdescription = textboxValue("item_description");
    $itemprice = textboxValue("item_price");
    $itemamount = textboxValue("item_amount");
    $itemSku = textboxValue('item_sku');

    $pictureURL = textboxValue("pictureUrl");
//    $datenow = time();
    $status =  textboxValue("item_status");

    if ($itemname && $itemdescription && $itemprice && $itemamount && $pictureURL && $itemSku) {
        $sql = "
                    UPDATE products SET Name='$itemname',Status='$status', ProductDesc = '$itemdescription',Price= '$itemprice',SKU='$itemSku',StockAmount='$itemamount',PictureURI = '$pictureURL' WHERE ProductId='$itemid';                    
        ";

        if (mysqli_query($GLOBALS['conn'], $sql)) {
            TextNode("success", "Data Successfully Updated");
        } else {
            TextNode("error", "Enable to Update Data");
        }

    } else {
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord()
{
    $itemid = (int)textboxValue("item_id");

    $sql = "DELETE FROM products WHERE ProductId='$itemid'";

    if (mysqli_query($GLOBALS['conn'], $sql)) {
        TextNode("success", "Record Deleted Successfully...!");
    } else {
        TextNode("error", "Enable to Delete Record...!");
    }

}


function deleteBtn()
{
    $result = getData();
    $i = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            if ($i > 3) {
                buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll()
{
    $sql = "DELETE * FROM products";

    if (mysqli_query($GLOBALS['conn'], $sql)) {
        TextNode("success", "All Record deleted Successfully...!");
//        Createdb();
    } else {
        TextNode("error", "Something Went Wrong Record cannot deleted...!");
    }
}


// set id to textbox
function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid) {
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['ProductId'];
        }
    }
    return ($id + 1);
}








