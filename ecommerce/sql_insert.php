 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



$sql1 = "CREATE TABLE product (
product_id INT(30) AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) COLLATE utf8mb4_general_ci NOT NULL,
product_price DOUBLE(10,2) NOT NULL,
product_image VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
insert_date DATETIME NULL,
modified_date DATETIME NULL,
available ENUM('in stock', 'out of stock') COLLATE utf8mb4_general_ci NOT NULL
)";

if ($conn->query($sql1) === TRUE) {
			echo "Table Product created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}

$sql2 = "CREATE TABLE order_product (
order_id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
product_id INT(30),
quantity INT(11) NOT NULL,
product_price DOUBLE(10,2)
FOREIGN KEY(product_id) REFERENCES product(product_id),
FOREIGN KEY(product_price) REFERENCES product(product_price)
)";
if ($conn->query($sql2) === TRUE) {
			echo "Table  Order_Product created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}

$sql3 = "CREATE TABLE order_details (
order_id INT(11)
order_date DATETIME NULL,
order_status ENUM('pending', 'delivered') COLLATE utf8mb4_general_ci NOT NULL,
total_order_amount 	double(10,2) NOT NULL,
FOREIGN KEY(order_id) REFERENCES order_product(order_id)

)";

if ($conn->query($sql3) === TRUE) {
			echo "Table order_details created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}

$sql4 = "CREATE TABLE order_address (
order_id INT(11)
shipping_address VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
billing_address  VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
FOREIGN KEY(order_id) REFERENCES order_product(order_id),
)";

if ($conn->query($sql4) === TRUE) {
			echo "Table order_address created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		}

mysqli_close($conn);
?> 