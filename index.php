<?php 

class Main {
    public function __construct() {
        $this->require_file();
        Helper::header();
        $this->view();
        Helper::footer();
    }

    public function view()
    {
        $this->table_header();
        $this->table_body();
    }

    public function table_body() 
    {
        ?>
            <table class="table table-hover table-bordered bg-white shadow-sm">
                <thead class="table-light">
                    <tr><th>Title</th><th>Author</th><th>ISBN</th><th>Category</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <tr>
                    <td>The Alchemist</td><td>Paulo Coelho</td><td>9780061122415</td><td>Fiction</td>
                    <td>
                        <a href="view.html?id=1" class="btn btn-sm btn-info">View</a>
                        <a href="edit.html?id=1" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete.html?id=1" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    </tr>
                </tbody>
            </table>
        <?php 
    }

    public function table_header()
    {
        ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Product List</h1>
                <a href="create.php" class="btn btn-primary">+ Add New Product</a>
            </div>
        <?php 
    }

    public function require_file()
    {
        require_once './helper.php';
        require_once './config.php';
    }
}

new Main();