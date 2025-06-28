<?php 

class Store {
    public function __construct() {
        $this->require_files();
        $data = $this->data();
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
        $image       = $this->upload_image($_FILES['image']);
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

    public function upload_image($image_array) 
    {
        $cover_image_url = $image_array;
        if( !empty( $cover_image_url ) ) {
            // Target directory to save uploaded images
            $targetDir = "uploads/";
            // Get original file name and create full path
            $fileName = basename($cover_image_url["name"]);
            $targetFile = $targetDir . $fileName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if file is an actual image
            $check = getimagesize($cover_image_url["tmp_name"]);
            if ($check === false) {
                die("File is not an image.");
            }

            // Check file size (e.g. 5MB max)
            if ($cover_image_url["size"] > 5 * 1024 * 1024) {
                die("File is too large.");
            }

            // Allow certain file formats
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowedTypes)) {
                die("Only JPG, JPEG, PNG & GIF files are allowed.");
            }
            
            // Move file to target directory
            if (move_uploaded_file($cover_image_url["tmp_name"], $targetFile)) {
                return $targetFile;
            }
            return;
        }
    }

    public function validate_data($value)
    {
        return htmlspecialchars(strip_tags(trim($value)));
    }
}
new Store();