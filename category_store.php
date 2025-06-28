<?php 

class CategoryStore
{
    public function __construct()
    {
        $this->require_files();
        $data = $this->data();
        Config::store_category($data['name']);
    }

    public function require_files()
    {
        require_once 'config.php';
    }

    public function data()
    {
        $name        = $this->validate_data($_POST['category_name']);
        return [
            'name'        => $name,
        ];
    }

    public function validate_data($value)
    {
        return htmlspecialchars(strip_tags(trim($value)));
    }
}

new CategoryStore();