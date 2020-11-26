<?php

require_once("php/itemcomponent.php");

require_once('php/itemoperation.php');

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    require('../requires/new_product_process.php');
//}


?>


<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Books</title>-->
<!---->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"-->
<!--          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
<!--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
<!---->
<!--     Custom stylesheet -->
    <link rel="stylesheet" href="../itemsCrud/style.css">
<!---->
<!--</head>-->
<!--<body>-->
<!---->
<!--<main>-->
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Items Manager</h1>

        <div class="d-flex justify-content-center">
            <form  method="POST" class="w-50" action="">
                <div class="pt-2" >
                    <?php inputElement("<i class='fas fa-id-badge '></i>", "Item id", "item_id", setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-box-open'></i>", "Item Name", "item_name", ""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-barcode'></i>", "Item SKU", "item_sku", ""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-link'></i>", "Picture URL", "pictureUrl", ""); ?>
                </div>

                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-info'></i>", "Description", "item_description", ""); ?>
                </div>
                <div class="row pt-3">

                    <div class="col">
                        <?php inputElement("<i class='fas fa-info'></i>", "Item Status", "item_status", ""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>", "Price", "item_price", ""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-boxes'></i>", "Amount", "item_amount", ""); ?>
                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='create'"); ?>
<!--                    <button id="create" type="create" value="create" name="create" class="btn btn-primary">Create</button>-->
                    <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='read'"); ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='update'"); ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='delete'"); ?>
<!--                    --><?php //deleteBtn(); ?>
                </div>
            </form>
        </div>

        <!-- Bootstrap table  -->
        <div class="d-flex table-data justify-content-center ">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Date Added</th>

                    <th>Item Description</th>
                    <th>Item SKU</th>
                    <th>Item Price</th>
                    <th>Item Amount</th>
                    <th>Item Picture URL</th>
                    <th>Item Status</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php


//                if (isset($_POST['read'])) {
                    $result = getData();

                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) { ?>

                            <tr>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['ProductId']; ?></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['Name']; ?></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['DateAdded']; ?></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['ProductDesc']; ?></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['SKU']; ?></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo '฿' . $row['Price']; ?></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['StockAmount']; ?></td>
                                <td  data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['PictureURI']; ?>></td>
                                <td data-id="<?php echo $row['ProductId']; ?>"><?php echo $row['Status']; ?></td>
                                <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['ProductId']; ?>"></i></td>
                            </tr>

                            <?php
                        }

//                    }
                }


                ?>
                </tbody>
            </table>
        </div>


    </div>
<!--</main>-->
<!---->
<!---->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"-->
<!--        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"-->
<!--        crossorigin="anonymous"></script>-->
<!---->
<script src="../itemsCrud/php/itemmain.js"></script>
<!--</body>-->
<!--</html>-->