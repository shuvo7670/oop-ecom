<?php 

class Store {
    public function __construct() {
        $this->require_files();
        $data = $this->data();
        // scope resolution operator
        Config::store_product($data['name'], $data['description'], $data['price'], $data['category_id'], $data['image']);
    }

    public function require_files()
    {
        require_once 'config.php';
    }

    public function data()
    {
        $name        = $this->validate_data($_POST['name']);
        $description = $this->validate_data($_POST['description']);
        $price       = $this->validate_data($_POST['price']);
        // $image       = $this->validate_data($_POST['image']);
        $image       = 'test.png';
        // $category    = $this->validate_data($_POST['category']);
        $category    = 123;
        return [
            'name'        => $name,
            'description' => $description,
            'price'       => $price,
            'image'       => $image,
            'category_id' => $category,
        ];
    }

    public function validate_data($value)
    {
        return htmlspecialchars(strip_tags(trim($value)));
    }
}
new Store();