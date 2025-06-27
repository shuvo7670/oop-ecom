<?php 

class Config {
    static public function connect()
    {
        // mysql connection
        $servername = 'localhost';
        $username   = "root";
        $password   = "";
        $dbname     = 'oop-ecom';
        $connection = mysqli_connect($servername, $username, $password, $dbname);
        return $connection;
    }

    static function store_product($product_name, $product_description, $product_price, $category_id, $product_image)
    {
        $connection = self::connect();
        $sql = "INSERT INTO `products`(`name`, `description`, `category_id`, `price`, `image`) VALUES ('{$product_name}','{$product_description}','{$category_id}','{$product_price}','{$product_image}')";        
        $result = mysqli_query($connection, $sql);
        if( $connection->query($sql) === true ) {
            header('Location: index.php');
        }else {
            print_r( $connection->error );
            die();
        }
    }
}