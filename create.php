<?php 

class Create {
    public function __construct() {
        $this->require_file();
        Helper::header();
        $this->view();
        Helper::footer();
    }

    public function require_file()
    {
        require_once './helper.php';
        require_once './config.php';
    }

    public function view()
    {
        ?>
            <h2 class="mb-4">Add New Product</h2>
            <form method="post" action="store.php" class="bg-white p-4 rounded shadow-sm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label><input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Category</label><input type="text" name="category" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Price</label><input type="number" name="price" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Image</label><input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Store Product</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        <?php 
    }
}

new Create();