<?php
use App\Models\Post;

$slug=$_REQUEST['cat'];
$page=Post::where([
    ['status','=',1],
    ['type','=','page'],
    ['slug','=',$slug]
])->first();

$list_page_other=Post::where([
    ['status','=',1],
    ['type','=','page'],
    ['slug','!=',$slug]
])
->orderBy('created_at','desc')
->take(10)
->get();

$title=$page['title'] ?? 'Giới thiệu';
?>

<?php require_once('views/sites/header.php'); ?>

<!-- CUSTOM CSS FOR ABOUT PAGE -->
<style>
    :root {
        --accent-color: #c5a059; /* Luxury Gold */
        --dark-bg: #1a1a1a;
        --text-color: #333;
    }

    .about-page {
        overflow-x: hidden;
    }

    .about-hero {
        position: relative;
        height: 500px;
        background: url('public/images/post/about-hero.png') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 80px;
        color: #fff;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        animation: fadeInUp 1s ease;
    }

    .hero-content h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 5px;
    }

    .hero-content p {
        font-size: 1.2rem;
        letter-spacing: 2px;
        opacity: 0.9;
    }

    .intro-section {
        padding: 50px 0;
        margin-bottom: 80px;
    }

    .intro-image-container {
        position: relative;
        padding: 20px;
    }

    .intro-image-container img {
        width: 100%;
        border-radius: 5px;
        box-shadow: 25px 25px 0px var(--accent-color);
        transition: transform 0.5s ease;
    }

    .intro-image-container:hover img {
        transform: scale(1.02);
    }

    .intro-text {
        padding-left: 50px;
    }

    .section-subtitle {
        color: var(--accent-color);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 2px;
        display: block;
        margin-bottom: 10px;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .stats-grid {
        background: var(--dark-bg);
        color: #fff;
        padding: 80px 0;
        border-radius: 5px;
        margin-bottom: 80px;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--accent-color);
        display: block;
    }

    .stat-label {
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
        opacity: 0.7;
    }

    .values-section {
        margin-bottom: 100px;
    }

    .value-card {
        padding: 40px;
        background: #fdfdfd;
        border: 1px solid #eee;
        transition: all 0.3s ease;
        height: 100%;
    }

    .value-card:hover {
        background: #fff;
        border-color: var(--accent-color);
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    }

    .value-card i {
        font-size: 2.5rem;
        color: var(--accent-color);
        margin-bottom: 25px;
        display: block;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 991px) {
        .intro-text { padding-left: 15px; margin-top: 50px; }
        .hero-content h1 { font-size: 3rem; }
    }
</style>

<section class="about-page">
    <!-- HERO SECTION -->
    <div class="about-hero">
        <div class="hero-content">
            <span class="section-subtitle" style="color: #fff;">Chào mừng bạn đến với</span>
            <h1><?= $page->title ?? 'VỀ CHÚNG TÔI' ?></h1>
            <p>Kiến tạo phong cách - Khẳng định bản sắc</p>
        </div>
    </div>

    <!-- INTRODUCTION SECTION -->
    <div class="container intro-section">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="intro-image-container">
                    <img src="public/images/post/about-hero.png" alt="Intro Fashion">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="intro-text">
                    <span class="section-subtitle">Câu chuyện thương hiệu</span>
                    <h2 class="section-title">Nơi Thời Trang Gặp Gỡ Cảm Xúc</h2>
                    <p class="lead" style="color: #666; line-height: 1.8;">
                        Tại <strong>NHOM2 Fashion</strong>, chúng tôi không chỉ bán quần áo. Chúng tôi cung cấp sự tự tin và phong cách cá nhân độc bản. Với hơn 5 năm tận tâm nghiên cứu xu hướng và chất liệu, mỗi bộ trang phục từ chúng tôi là một tác phẩm nghệ thuật.
                    </p>
                    <p style="color: #777;">
                        Triết lý của chúng tôi rất đơn giản: Chất lượng là cốt lõi, khách hàng là trọng tâm. Chúng tôi tin rằng thời trang phải đi đôi với sự thoải mái và tính ứng dụng cao trong cuộc sống hàng ngày.
                    </p>
                    <div class="mt-4">
                        <a href="index.php?opt=product" class="btn btn-dark px-4 py-2" style="border-radius: 0; letter-spacing: 1px;">XEM BỘ SƯU TẬP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS SECTION -->
    <div class="container stats-grid">
        <div class="row">
            <div class="col-md-3 stat-item">
                <span class="stat-number">10K+</span>
                <span class="stat-label">Khách hàng tin dùng</span>
            </div>
            <div class="col-md-3 stat-item">
                <span class="stat-number">05</span>
                <span class="stat-label">Năm kinh nghiệm</span>
            </div>
            <div class="col-md-3 stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Cotton Organic</span>
            </div>
            <div class="col-md-3 stat-item">
                <span class="stat-number">24h</span>
                <span class="stat-label">Giao hàng cực nhanh</span>
            </div>
        </div>
    </div>

    <!-- VALUES SECTION -->
    <div class="container values-section">
        <div class="row text-center mb-5">
            <div class="col-12">
                <span class="section-subtitle">Giá trị cốt lõi</span>
                <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="value-card">
                    <i class="fa fa-gem"></i>
                    <h4>Chất lượng Thượng hạng</h4>
                    <p>Mọi sản phẩm đều trải qua quy trình kiểm soát chất lượng khắt khe trước khi đến tay bạn.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card">
                    <i class="fa fa-magic"></i>
                    <h4>Thiết kế Độc bản</h4>
                    <p>Đội ngũ designer tâm huyết luôn cập nhật những xu hướng thời trang mới nhất từ Paris và Milan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="value-card">
                    <i class="fa fa-heart"></i>
                    <h4>Tận tâm Phục vụ</h4>
                    <p>Chúng tôi luôn lắng nghe và hỗ trợ khách hàng 24/7 với thái độ nhiệt thành nhất.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('views/sites/footer.php'); ?>