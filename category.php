<?php 

class Category {
    public function __construct() {
        $this->require_file();
        Helper::header();
        $this->view();
        Helper::footer();
        $this->delete_category();
    }

    public function delete_category()
    {
        $id = $_GET['id'] ?? null;
        $action = $_GET['action'] ?? null;

        if( !empty( $id ) && $action == 'delete' ) {
            Config::delete_category( $id );
        }

    }

    public function require_file()
    {
        require_once './helper.php';
        require_once './config.php';
    }

    public function view()
    {
        $this->add_category();
        $this->view_category();
    }

    public function add_category()
    {
        $get_id = $_GET['id'] ?? null;
        if( $get_id ) {
            $category = Config::get_single_category( $get_id );
        }
        ?>
         <?php if( $get_id ) : ?>
            <h2 class="mb-4">Update Category</h2>
        <?php else :  ?>
            <h2 class="mb-4">Add New Category</h2>
        <?php endif ?>
            <form method="post" action="<?php echo !empty( $get_id ) ? 'category_update.php' : 'category_store.php' ?>" class="bg-white p-4 rounded shadow-sm">
                <?php if( $get_id ) : ?>
                    <input type="hidden" name="id" value="<?php echo $get_id ?>">
                <?php endif ?>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Category Name</label><input type="text" name="category_name" value="<?php echo !empty(  $category['category_name'] ) ? $category['category_name'] : '' ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mt-4">
                    <?php if( $get_id ) : ?>
                        <button type="submit" class="btn btn-success">Update Category</button>
                    <?php else :  ?>
                        <button type="submit" class="btn btn-success">Store Category</button>
                    <?php endif ?>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        <?php 
    }

    public function view_category()
    {
       $categories = Config::get_categories();
        ?>
            <table class="table mt-5 table-hover table-bordered bg-white shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $categories as $category ) : ?>
                        <tr>
                            <td><?php echo $category['category_name'] ?></td>
                            <td>
                                <a href="category.php?id=<?php echo $category['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="category.php?id=<?php echo $category['id'] ?>&action=delete" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php 
    }


    
}
new Category();