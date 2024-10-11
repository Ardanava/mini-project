<main class="main">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Bagian Detail Artikel -->
          <section id="blog-details" class="blog-details section">
            <div class="container">
            <?php foreach($detail->articles as $news){ ?>
              <article class="article">
                <div class="post-img">
                  <img src="<?= $news->urlToImage ?>" alt="" class="img-fluid">
                </div>  
                <h2 class="title"><?= $news->title ?></h2>
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?= $news->author ?></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?= $news->publishedAt ?></time></a></li>
                  </ul>
                </div>
                <div class="content">
                  <p>
                    <?= $news->description ?>
                  </p>
                  <p>
                    <?= $news->content ?>
                  </p>
                </div>
              </article>
              <?php } ?>
            </div>
          </section>
          <!-- Akhir Bagian Detail Artikel -->
        </div>
      </div>
    </div>
  </main>