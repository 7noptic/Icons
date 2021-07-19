<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Icons
 */

get_header();
$post_page_title = get_the_title( get_option( 'page_for_posts', true ) );
?>


<?php if ( function_exists( 'kama_breadcrumbs' ) ) {
	kama_breadcrumbs( '' );
} ?>

<?php
$categories = get_categories( [
	'taxonomy'     => 'category',
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => '',
	'orderby'      => 'ID',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'pad_counts'   => false,
	// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
] ); ?>


    <section class="articles">
        <div class="container">
            <div class="selection-result__more selection-result__title">
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg" alt=""></div>
                <h1 class="title title-center"><?php echo $post_page_title; ?></h1>
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg" alt=""></div>
            </div>
            <div class="row">

                <div class="col-12">
                    <nav class="tab-nav articles__nav">
                        <a href="#" class="tab-nav__link js-article-link">Все публикации</a>

						<?php foreach ( $categories as $cat ) { ?>
                            <a href="/<?php echo $cat->slug; ?>/"
                               class="tab-nav__link js-article-link"><?php echo $cat->name; ?></a>
						<?php } ?>
                    </nav>
                </div>

                <div class="col-12">
                    <div class="tab js-article-tab">
                        <div class="row">

	                        <?php if ( have_posts() ) : ?>
		                        <?php $key = 0;
		                        /* Start the Loop */
		                        while ( have_posts() ) :
			                        $key ++;
			                        the_post();

			                        if ( 0 < $key && $key < 2 ) {
				                        get_template_part( 'template-parts/content', get_post_type() );
			                        }

		                        endwhile; ?>
	                        <?php endif; ?>


                            <div class="col-12 col-lg-6">
                                <div class="news-form">
                                    <form action="POST">
                                        <div class="news-form__wrapper">
                                            <h3 class="news-form__title">ПОДПИШИСЬ НА СВЕЖИЕ<br>СТАТЬИ И НОВОСТИ</h3>
                                            <span><input type="text" placeholder="Имя" class="form-control form__input"> </span><span><input
                                                        type="email" placeholder="Email"
                                                        class="form-control form__input"></span>
                                            <p class="news-form__agreement">Отправляя данную форму, я соглашаюсь с<br>политикой
                                                обработки персональных данных</p><span><button type="submit"
                                                                                               class="form-control btn btn-blueborder news-form__btn">ПОДПИСАТЬСЯ</button></span>
                                        </div>
                                    </form>
                                </div>
                            </div>

							<?php if ( have_posts() ) : ?>
								<?php $key = 0;
								/* Start the Loop */
								while ( have_posts() ) :
									$key ++;
									the_post();

									if ( $key >= 2 ) {
										get_template_part( 'template-parts/content', get_post_type() );
									}

								endwhile; ?>

                                <div class="col-12">
									<?php

									the_posts_pagination( array(
										'end_size'  => 2,
										'prev_text' => __( '' ),
										'next_text' => __( '' ),
									) );

									?>
                                </div>
								<?php
								wp_reset_postdata();
							endif; ?>

                        </div>
                    </div>

					<?php foreach ( $categories as $cat ) { ?>
                        <div class="tab js-article-tab">
                            <div class="row">

								<?php
								global $post;
								$postslist = get_posts( array(
									'posts_per_page' => - 1,
									'category'       => $cat->term_id
								) );
								foreach ( $postslist as $key => $post ) {
									setup_postdata( $post );

									if ( $key >= 0 && $key < 1 ) {
										get_template_part( 'template-parts/content', get_post_type() );
									}

								}
								?>

                                <div class="col-12 col-lg-6">
                                    <div class="news-form">
                                        <form action="POST">
                                            <div class="news-form__wrapper">
                                                <h3 class="news-form__title">ПОДПИШИСЬ НА СВЕЖИЕ<br>СТАТЬИ И НОВОСТИ
                                                </h3>
                                                <span>
                                                    <input type="text" placeholder="Имя"
                                                           class="form-control form__input">
                                                </span>
                                                <span><input type="email" placeholder="Email"
                                                             class="form-control form__input"></span>
                                                <p class="news-form__agreement">Отправляя данную форму, я соглашаюсь
                                                    с<br>политикой
                                                    обработки персональных данных</p>
                                                <span>
                                                    <button type="submit"
                                                            class="form-control btn btn-blueborder news-form__btn">ПОДПИСАТЬСЯ</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>

								<?php
								global $post;
								$postslist = get_posts( array(
									'posts_per_page' => - 1,
									'category'       => $cat->term_id
								) );
								foreach ( $postslist as $key => $post ) {
									setup_postdata( $post );

									if ( $key >= 1 ) {
										get_template_part( 'template-parts/content', get_post_type() );
									}

								}
								?>

                            </div>
                        </div>
					<?php } ?>

                </div>
            </div>
        </div>
    </section>


<?php get_template_part( 'template-parts/sections/selection' ); ?>


<?php
get_footer();
