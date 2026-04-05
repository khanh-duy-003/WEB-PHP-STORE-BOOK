<?php

use App\Models\Category;
use App\Models\Product;

$argc_category = [
    ['status', '=', 1],
    ['parent_id', '=', '0']
];
$list_category = Category::where($argc_category)
    ->orderBy('sort_order', 'ASC')
    ->get();
?>
<section class="maincontent my-4">
    <div class="container">
        <?php foreach ($list_category as $row_cat) : ?>
            <?php
            $orderConditon = "";
            $orderField = isset($_GET['field']) ? $_GET['field'] : "";
            $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
            $minPrice = isset($_POST['minPrice']) ? $_POST['minPrice'] : null;
            $maxPrice = isset($_POST['maxPrice']) ? $_POST['maxPrice'] : null;

            if (!empty($orderField) && !empty($orderSort)) {
                $orderCondition = "ORDER BY `2121110226_product`.`" . $orderField . "` " . $orderSort;
                print_r($orderCondition);
                exit;
            }

            if (isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
                if (!empty($keyword)) {
                    // Lọc sản phẩm theo giá nếu giá trị tối thiểu và tối đa đã được cung cấp
                    if ($minPrice !== null && $maxPrice !== null) {
                        $results = Product::where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('detail', 'LIKE', '%' . $keyword . '%')
                            ->whereBetween('price', [$minPrice, $maxPrice])
                            ->orderByRaw($orderConditon . ', `price` ' . $orderSort)
                            ->get();
                    } else {
                        // Nếu không có giá trị tối thiểu hoặc tối đa, thực hiện tìm kiếm không lọc theo giá
                        $results = Product::where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('detail', 'LIKE', '%' . $keyword . '%')
                            ->orderByRaw($orderConditon . ', `price` ' . $orderSort)
                            ->get();
                    }
                }
            }
            ?>

            <?php

            $list_category_id = array();
            array_push($list_category_id, $row_cat->id);
            $argc_category = [
                ['status', '=', 1],
                ['parent_id', '=', $row_cat->id]
            ];
            $list_category1 = Category::where($argc_category)
                ->get();
            if (count($list_category1) > 0) {
                foreach ($list_category1 as $row_cat1) {
                    array_push($list_category_id, $row_cat1->id);
                    $argc_category = [
                        ['status', '=', 1],
                        ['parent_id', '=', $row_cat1->id]
                    ];
                    $list_category2 = Category::where($argc_category)
                        ->get();
                    if (count($list_category2) > 0) {
                        foreach ($list_category2 as $row_cat2) {
                            array_push($list_category_id, $row_cat2->id);
                            $argc_category = [
                                ['status', '=', 1],
                                ['parent_id', '=', $row_cat2->id]
                            ];
                            $list_category3 = Category::where($argc_category)
                                ->get();
                            if (count($list_category3) > 0) {
                                foreach ($list_category3 as $row_cat3->id) {
                                    array_push($list_category_id, $row_cat3->id);
                                }
                            }
                        }
                    }
                }
            }
            // var_dump($list_category_id);
            
            ?>
            
            <!--end product-category-->
        <?php endforeach; ?>
    </div>
</section>