<!--====== BANNER PART START ======-->

<div class="banner-active" id="home">
    <?php foreach ($slider as $item) { ?>
        <div class="single-banner bg_cover" style="background-image: url(image/slider/<?= $item['gambar']; ?>);">
            <div class="banner-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="banner-content">
                                <span data-animation="fadeInLeft" data-delay="0.5s"><?= $item['prodi']; ?></span>
                                <h1 data-animation="fadeInLeft" data-delay="0.9s" class="title"><?= $item['judul']; ?></h1>
                                <p data-animation="fadeInLeft" data-delay="1.3s"><?= $item['isi']; ?> </p>
                                <a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="<?= $item['link']; ?>">lihat Selengkapnya <i class="fal fa-long-arrow-right"></i></a>
                            </div> <!-- banner content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div>
        </div>
    <?php } ?>
</div>


<!--====== BANNER PART ENDS ======-->