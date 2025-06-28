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
        if( $connection->query($sql) === true ) {
            header('Location: index.php');
        }else {
            print_r( $connection->error );
            die();
        }
    }

    static public function store_category($category_name)
    {
        $connection = self::connect();
        $sql = "INSERT INTO `categories`(`category_name`) VALUES ('{$category_name}')";
        if( $connection->query($sql) === true ) {
            header('Location: category.php');
        }else {
            print_r( $connection->error );
            die();
        }
    }

    static public function get_categories()
    {
        $connection = self::connect();
        $sql = "SELECT * FROM `categories`";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    static public function get_single_category($id)
    {
        $connection = self::connect();
        $sql = "SELECT * FROM `categories` WHERE `id` = '{$id}'";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }

    static public function update_category($id, $category_name)
    {
        $connection = self::connect();
        $sql = "UPDATE `categories` SET `category_name` = '{$category_name}' WHERE `id` = '{$id}'";
        if( $connection->query($sql) === true ) {
            header('Location: category.php');
        }else {
            print_r( $connection->error );
            die();
        }
    }

    static public function delete_category($id)
    {
        $connection = self::connect();
        $sql = "DELETE FROM `categories` WHERE `id` = '{$id}'";
        if( $connection->query($sql) === true ) {
            header('Location: category.php');
        }else {
            print_r( $connection->error );
            die();
        }
    }

}