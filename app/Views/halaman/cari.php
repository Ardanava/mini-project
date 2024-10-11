<main class="main">

    <!-- Judul Halaman -->
    <div class="page-title position-relative">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Hasil Pencarian</h1>
        <nav class="breadcrumbs">
          <ol>
            <li class="current"><?= $cari ?></li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Akhir Judul Halaman -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- Bagian Hasil Pencarian -->
          <section id="blog-posts" class="blog-posts section">
            <div class="container">
              <div class="row gy-4">
              <?php foreach($hasil as $news){ ?>
                <div class="col-lg-6">                
                  <article class="position-relative h-100">
                    <div class="post-img position-relative overflow-hidden">
                      <img src="<?= $news->urlToImage ?>" class="img-fluid" alt="">
                      <span class="post-date"><?= $news->publishedAt ?></span>
                    </div>
                    <div class="post-content d-flex flex-column">
                      <h3 class="post-title"><?= $news->title ?></h3>
                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-person"></i> <span class="ps-2"><?= $news->author ?></span>
                        </div>
                        <span class="px-3 text-black-50">/</span>
                      </div>
                      <p>
                        <?= $news->description ?>
                      </p>
                      <hr>
                      <a href="<?= base_url('lengkap/' . $news->source->id) ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>
                  </article>                  
                </div>
                <?php } ?>
              </div>
            </div>
          </section>
          <!-- Akhir Hasil Pencarian -->
        </div>

        <div class="col-lg-4 sidebar">
          <div class="widgets-container">
            <!-- Bagian Fitur Pencarian -->
            <div class="search-widget widget-item">
              <h3 class="widget-title">Cari Berita</h3>
              <form action="<?= base_url('cari') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="text" name="cari">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <!-- Akhir Bagian Fitur Pencarian -->

            <!-- Bagian Artikel Populer -->
            <div class="recent-posts-widget widget-item">
              <h3 class="widget-title">Recent Posts</h3>
              <?php foreach ($populer as $pop) { ?>
                <div class="post-item">
                    <img src="<?= $pop->urlToImage ?>" alt="" class="flex-shrink-0">
                    <div>
                        <h4><a href="<?= base_url('lengkap/' . $pop->source->id) ?>"><?= $pop->title ?></a></h4>
                        <time datetime="2020-01-01"><?= $pop->publishedAt ?></time>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- Akhir Bagian Artikel Populer -->

            <!-- Bagian Kategori -->
            <div class="tags-widget widget-item">
              <h3 class="widget-title">Kategori Berita</h3>
              <ul>
                <?php foreach ($kategori as $kat) {?>
                    <li><a href="<?= base_url('kategori/'.$kat) ?>"><?= $kat ?></a></li>
                <?php } ?>
              </ul>
            </div>
            <!-- Akhir Bagian Kategori -->

          </div>
        </div>
      </div>
    </div>
  </main>