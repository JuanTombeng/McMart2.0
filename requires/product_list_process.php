<?php
    // $servername = "";
    // $username = "";
    // $password = "";
    // $dbname = "McMart";

    // $conn = new mysqli($servername, $username, $password, $dbname);
    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    class DatabaseQuery {
        protected $conn;

        public function __construct(){
            global $conn;
            $this->conn =$conn;
        }
        public function query1(){
            require('includes/db.inc.semester.project.php');
            $sql1 = "SELECT * FROM Products";
            $all_result = $GLOBALS['conn']->query($sql1);
            if ($all_result->num_rows > 0) {
                echo '<table class="table table-bordered">    
                        <tr class="table-primary">
                        <th scope="col">Product ID</th>
                        <th scope="col">Added Date</th>
                        <th scope="col">Produc SKU</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Product Picture</th>
                        <th scope="col">Amount of Stock</th>
                        <th scope="col">Description</th>
                        </tr>';
                while ($row = $all_result->fetch_assoc()) {

                echo'<tr>
                        <td>' . $row['ProductId'] . '</td>
                        <td>' . $row['DateAdded']. '</td>
                        <td>' . $row['SKU'] . '</td>
                        <td>' . $row['Name'] . '</td>
                        <td>' . $row['Price'] . '</td>
                        <td>' . $row['Status'] . '</td>
                        <td>' . $row['PictureURI'] . '</td>
                        <td>' . $row['StockAmount'] . '</td>
                        <td>' . $row['ProductDesc'] . '</td>
                        </tr>';}
                echo '</table>';
            }
            else {
                echo "0 results";
            }
            $GLOBALS['conn']->close();
        }
        //end of query1

        //single search not yet finish

        public function query2(){
            require('includes/db.inc.semester.project.php');
            if(isset($_POST["search"])) {
                $Name = $_POST["Name"];
                $sql2 = "SELECT * FROM Product WHERE 'Name' = '$Name' LIMIT 1";
                $single_result = $GLOBALS['conn']->query($sql2);
                if ($single_result->num_rows > 0) {
                    echo '<table class="table table-bordered">    
                            <tr class="table-primary">
                            <th scope="col">Product ID</th>
                            <th scope="col">Added Date</th>
                            <th scope="col">Produc SKU</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Product Picture</th>
                            <th scope="col">Amount of Stock</th>
                            <th scope="col">Description</th>
                            </tr>';
                    while ($row = $single_result->fetch_assoc()) {

                    echo'<tr>
                            <td>' . $row['ProductId'] . '</td>
                            <td>' . $row['DateAdded']. '</td>
                            <td>' . $row['SKU'] . '</td>
                            <td>' . $row['Name'] . '</td>
                            <td>' . $row['Price'] . '</td>
                            <td>' . $row['Status'] . '</td>
                            <td>' . $row['PictureURI'] . '</td>
                            <td>' . $row['StockAmount'] . '</td>
                            <td>' . $row['ProductDesc'] . '</td>
                            </tr>';}
                    echo '</table>';
                }
                else {
                    echo "0 results";
                }
                $GLOBALS['conn']->close();
            }
            
        } 
    }

    //calling method in the html form//

    // require('requires/product_list_process.php');
    // $all_query = new DatabaseQuery();
    // echo $all_query->query1();

?>

