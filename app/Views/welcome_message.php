

<body class="category-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">WBLnews</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html">Home</a></li>
          <!-- <li><a href="about.html">About</a></li>
          <li><a href="single-post.html">Single Post</a></li>
          <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="category.html" class="active">Category 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="category.html" class="active">Category 2</a></li>
              <li><a href="category.html" class="active">Category 3</a></li>
              <li><a href="category.html" class="active">Category 4</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li>
        </ul> -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Berita Terbaru</h1>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Posts Section -->
          <section id="blog-posts" class="blog-posts section">

            <div class="container">
              <div class="row gy-4">
              <?php foreach($berita->articles as $news){ ?>
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

                      <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

                    </div>

                  </article>                  
                </div>
                <?php } ?>
                <!-- End post list item -->
              </div>
            </div>
          </section><!-- /Blog Posts Section -->
        </div>

        <div class="col-lg-4 sidebar">
          <div class="widgets-container">
            <!-- Search Widget -->
            <div class="search-widget widget-item">
              <h3 class="widget-title">Search</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <!--/Search Widget -->
            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">
                <h3 class="widget-title">Berita Populer</h3>
                <?php foreach ($populer->articles as $pop) { ?>
                <div class="post-item">
                        <img src="<?= $pop->urlToImage ?>" alt="" class="flex-shrink-0">
                        <div>
                        <h4><a href="blog-details.html"><?= $pop->title ?></a></h4>
                        <time datetime="2020-01-01"><?= $pop->publishedAt ?></time>
                        </div>
                </div>
                <?php } ?>
              <!-- End recent post item-->
            </div>
            <!--/Recent Posts Widget -->
            <!-- Tags Widget -->
            <div class="tags-widget widget-item">
              <h3 class="widget-title">Kategori Berita</h3>
              <ul>
                <li><a href="#">business</a></li>
                <li><a href="#">entertainment</a></li>
                <li><a href="#">general</a></li>
                <li><a href="#">health</a></li>
                <li><a href="#">science</a></li>
                <li><a href="#">sports</a></li>
                <li><a href="#">technology</a></li>
              </ul>
            </div>
            <!--/Tags Widget -->
          </div>
        </div>
      </div>
    </div>
  </main>

