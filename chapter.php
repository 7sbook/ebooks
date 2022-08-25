<?php 

get_header(); 

$chapter_id = get_query_var('chapter');

$chapter = ebooks_get_chapter($chapter_id);

$chapters = ebooks_get_chapters($chapter->post_id);

?>
    <main class="container-fluid container-lg">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">章节目录</h5><button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul style="list-style: none; padding: 0;">
                <?php
                    foreach ($chapters as $c) {
                        echo "<li class=\"nav-item ". ($chapter_id == $c->chapter_id ? "bg-beige" : '') ."\"><a class=\"nav-link\" href=\"/chapter/{$c->chapter_id}/\">{$c->chapter_title}</a></li>";
                    }
                ?>
                </ul>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-1 d-none d-md-block" style="padding: 0;">
                <div class="sticky-top left-bar">
                    <dl class="bg-burlywood">
                        <dd data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"><i class="bi bi-card-list"></i><span>目录</span></dd>
                        <dd onclick="printDOM()"><i class="bi bi-printer"></i><span>打印</span></dd><a href="/ebook/384/22775.html" id="next-chapter">
                            <dd><i class="bi bi-caret-right-fill"></i><span>下一章</span></dd>
                        </a>
                    </dl>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9 col-xl-8" style="padding: 0;">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">首页</a></li>
                        <li class="breadcrumb-item"><?php the_category( '<li class="breadcrumb-item"><li>' ); ?></li>
                        <li class="breadcrumb-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    </ol>
                </nav>
                <div class="p-3 bg-burlywood rounded shadow-sm">
                    <print-contents>
                        <h1 class="h3 my-3"><?php echo $chapter->chapter_title;?></h1>
                        <div class="d-flex flex-wrap"><span class="me-2"><i class="bi bi-book"></i><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><span class="me-2"><i class="bi bi-file-earmark-word"></i> 283 字 </span><span class="me-2"><i class="bi bi-clock"></i>2022-05-06</span></div>
                        <hr>
                        <div class="ebook-chapter-content">
                            <?php echo wpautop($chapter->chapter_content);?>
                        </div>
                    </print-contents>
                    <div class="d-grid gap-2 d-flex justify-content-end"><button class="btn btn-primary me-md-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">目录</button><a class="btn btn-primary" href="/ebook/384/22775.html">下一章</a></div>
                </div>
            </div>
            <div class="col-1 d-none d-lg-block" style="padding: 0;"></div>
        </div>
    </main>
    

<?php get_footer(); ?>