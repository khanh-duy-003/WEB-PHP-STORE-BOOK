<?php

use App\Models\Category;

// Fetch categories from the database
$list = Category::where('status', '!=', '0')->get();

// Generate options for parent category dropdown
function generateParentOptions($categories)
{
    $options = '<option value="0">-- Chọn danh mục cha --</option>';
    foreach ($categories as $category) {
        $options .= '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
    }
    return $options;
}

$str_parent_id = generateParentOptions($list);
?>

<?php require_once('../views/admin/header.php'); ?>

<div class="content">
    <section class="content-header my-2">
        <h1 class="d-inline">Thêm trang đơn</h1>
        <div class="text-end">
            <a href="index.php?opt=menu" class="btn btn-sm btn-success">
                <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
        </div>
    </section>
    <section class="content-body my-2">
        <form action="index.php?opt=menu&cat=process" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên menu</label>
                                <input type="name" class="form-control" id="name" name="name" required >
                            </div>

                            <div class="form-group">
                                <label for="link">Link:</label>
                                <textarea class="form-control" id="link" name="link" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="position">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Danh mục cha:</label>
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <?= $str_parent_id; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="id">Sau sản phẩm:</label>
                                <select class="form-control" id="id" name="id">
                                    <option value="">-- Chọn ID --</option>
                                    <?php
                                    foreach ($list as $category) {
                                        echo '<option value="' . $category->sort_order + 1 . '">Sau:' . $category['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="box-body p-2 border-bottom">

                                <select name="status" class="form-select">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button style="border-radius: 0px; width:120px; margin-right:12px; margin-top:-60px " name="THEM" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?php require_once('../views/admin/footer.php'); ?>