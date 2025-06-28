<?php 

class CategoryUpdate
{
    public function __construct()
    {
        $this->require_files();
        $data = $this->data();
        Config::update_category($data['id'], $data['name']);
    }

    public function require_files()
    {
        require_once 'config.php';
    }

    public function data()
    {
        $name        = $this->validate_data($_POST['category_name']);
        $id        = $this->validate_data($_POST['id']);
        return [
            'name' => $name,
            'id'   => $id,
        ];
    }

    public function validate_data($value)
    {
        return htmlspecialchars(strip_tags(trim($value)));
    }
}

new CategoryUpdate();