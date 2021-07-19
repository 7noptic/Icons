<?php
/**
 * The home page template file
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
?>

    <section class="banner">
        <div class="container">
            <div class="row">

				<?php if ( have_rows( 'slajder_na_glavnoj_-_banner' ) ) : ?>
                    <div class="col-12 col-lg-6">
                        <div class="banner-border">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bb.svg" alt="">
                        </div>
                        <div class="swiper-banner">
                            <div class="swiper-wrapper">
								<?php while ( have_rows( 'slajder_na_glavnoj_-_banner' ) ) : the_row(); ?>
									<?php $izobrazhenie = get_sub_field( 'izobrazhenie' ); ?>
									<?php if ( $izobrazhenie ) : ?>

                                        <div class="swiper-slide banner__slide"
                                             style="background-image: url('<?php echo esc_url( $izobrazhenie['url'] ); ?>')">
											<?php the_sub_field( 'tekst' ); ?>
                                        </div>

									<?php endif; ?>
								<?php endwhile; ?>
                            </div>
                            <nav class="banner__pagination">
                                <div class="swiper-pagination swiper-pagination-banner"></div>
                            </nav>
                        </div>
                        <div class="banner-border">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/bb.svg" alt="">
                        </div>
                    </div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>






				<?php if ( have_rows( 'slajder_na_glavnoj_-_kategorii' ) ) : ?>

                    <div class="col-12 col-lg-6">
                        <div class="row">
							<?php while ( have_rows( 'slajder_na_glavnoj_-_kategorii' ) ) : the_row(); ?>

                                <div class="col-12 col-sm-6">
                                    <a href="<?php the_sub_field( 'ssylka' ); ?>" class="banner__item">
                                        <h2 class="banner__title">
											<?php the_sub_field( 'tekst' ); ?></h2>
                                        <div class="banner__img">
											<?php $izobrazhenie = get_sub_field( 'izobrazhenie' ); ?>
											<?php if ( $izobrazhenie ) : ?>
                                                <img src="<?php echo esc_url( $izobrazhenie['url'] ); ?>"
                                                     alt="<?php echo esc_attr( $izobrazhenie['alt'] ); ?>"/>
											<?php endif; ?>
                                        </div>
                                    </a>
                                </div>
							<?php endwhile; ?>
                        </div>
                    </div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>

            </div>
        </div>
    </section>


    <section class="info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title">
                        Православный интернет-магазин
                    </h1>
                </div>
                <div class="col-12 col-lg-6">
					<?php the_field( 'informacziya_na_glavnoj_-_opisanie' ); ?>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="info__logo">
						<?php $informacziya_na_glavnoj_izobrazhenie = get_field( 'informacziya_na_glavnoj_-_izobrazhenie' ); ?>
						<?php if ( $informacziya_na_glavnoj_izobrazhenie ) : ?>
                            <img src="<?php echo esc_url( $informacziya_na_glavnoj_izobrazhenie['url'] ); ?>"
                                 alt="<?php echo esc_attr( $informacziya_na_glavnoj_izobrazhenie['alt'] ); ?>"/>
						<?php endif; ?>
                    </div>
                </div>

				<?php if ( have_rows( 'informacziya_na_glavnoj_-_preimushhestva' ) ) : ?>
                    <div class="col-12">
                        <div class="info__board">
							<?php while ( have_rows( 'informacziya_na_glavnoj_-_preimushhestva' ) ) : the_row(); ?>
                                <div class="info-item">
                                    <div class="info-item__img">
										<?php $ikonka = get_sub_field( 'ikonka' ); ?>
										<?php if ( $ikonka ) : ?>
                                            <img src="<?php echo esc_url( $ikonka['url'] ); ?>"
                                                 alt="<?php echo esc_attr( $ikonka['alt'] ); ?>"/>
										<?php endif; ?>
                                    </div>
                                    <h3 class="info-item__name">
										<?php the_sub_field( 'opisanie' ); ?>
                                    </h3>
                                </div>
							<?php endwhile; ?>
                        </div>
                    </div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>

            </div>
        </div>
    </section>


<?php if ( have_rows( 'glavnaya_tovary_kompanii' ) ) : ?>
    <section class="store">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="tab-nav">
						<?php while ( have_rows( 'glavnaya_tovary_kompanii' ) ) : the_row(); ?>
                            <a href="#" class="tab-nav__link js-store-link">
								<?php the_sub_field( 'nazvanie_taba' ); ?>
                            </a>
						<?php endwhile; ?>
                    </nav>
                </div>

				<?php while ( have_rows( 'glavnaya_tovary_kompanii' ) ) : the_row(); ?>
                    <div class="tab js-store-tab">
                        <div class="col-12">
							<?php if ( have_rows( 'pod_taby' ) ) : ?>
                                <nav class="tab-subnav">
									<?php while ( have_rows( 'pod_taby' ) ) : the_row(); ?>
                                        <a href="#" class="tab-subnav__link js-store-sublink">
											<?php the_sub_field( 'nazvanie' ); ?>
                                        </a>
									<?php endwhile; ?>
                                </nav>
							<?php endif; ?>
                        </div>


						<?php if ( have_rows( 'pod_taby' ) ) : ?>
							<?php while ( have_rows( 'pod_taby' ) ) : the_row(); ?>
								<?php $produkt = get_sub_field( 'produkt' ); ?>

                                <div class="tab js-store-subtab">

									<?php if ( $produkt ) : ?>
										<?php foreach ( $produkt as $post ) : ?>
											<?php setup_postdata( $post );
											$wc_product = wc_get_product($post->ID);
											$rating_count = $wc_product->get_rating_count();
											$review_count = $wc_product->get_review_count();
											$average = $wc_product->get_average_rating();

											?>
                                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                                <div class="card">
                                                    <div class="card__img">
	                                                    <?php echo $wc_product->get_image('full'); ?>

	                                                    <?php if ( get_field( 'hit_prodazh' ) == 1 ) : ?>
                                                            <div class="card__tag">ХИТ ПРОДАЖ</div>
	                                                    <?php else : ?>
		                                                    <?php // echo 'false'; ?>
	                                                    <?php endif; ?>

	                                                    <?php if (in_array($post->ID, favorite_id_array())) { ?>
                                                            <div class="fv_<?php echo $post->ID ?>" >
                                                                <div class="in-favorite" title="В избранном" data-post_id="<?php echo $post->ID; ?>">
                                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/heart-active.svg">
                                                                </div>
                                                            </div>
	                                                    <?php } else { ?>
                                                            <div class="fv_<?php echo $post->ID; ?>">
                                                                <div class="add-favorite" title="Добавить в избранное" data-post_id="<?php echo $post->ID; ?>">
                                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/heart.svg">
                                                                </div>
                                                            </div>
	                                                    <?php } ?>
                                                    </div>
                                                    <div class="card__info">
                                                        <div class="card__feedback">
                                                            <ul class="rating-star">
				                                                <?php
				                                                $stars = 0;
				                                                while ( $stars < round( $average ) ) {

					                                                echo '<li class="active"></li>';
					                                                $stars ++;
				                                                }

				                                                /* empty stars */
				                                                $count = 5 - $stars;
				                                                for ( $i = 0; $i < $count; $i ++ ) {
					                                                echo '<li></li>';
				                                                }
				                                                ?>
                                                            </ul>

                                                            <a href="<?php the_permalink(); ?>" class="card__reviews">Отзывов <?php echo $review_count; ?></a>

			                                                <?php if ( $wc_product->get_stock_status() ) { ?>
                                                                <span class="card__availability">В наличии</span>
			                                                <?php } ?>

                                                        </div>

                                                        <a href="<?php the_permalink(); ?>" class="card__name"><?php the_title(); ?></a>

                                                        <div class="card-price">
			                                                <?php
			                                                $price = get_post_meta( get_the_ID(), '_regular_price', true);
			                                                $sale = get_post_meta( get_the_ID(), '_price', true);

			                                                if ( $wc_product->get_sale_price() ) { ?>
                                                                <div class="card-price__new js-card-price"><?php echo $sale; ?> ₽</div>
                                                                <div class="card-price__old"><?php echo $price; ?> ₽</div>
                                                                <div class="card-price__discount">-<?php $percentage = round( ( $price - $sale ) / $price * 100 ) . '%';
					                                                echo $percentage; ?></div>
			                                                <?php } else { ?>
                                                                <div class="card-price__new js-card-price"><?php echo $wc_product->get_regular_price(); ?></div>
			                                                <?php } ?>
                                                        </div>

                                                        <div class="card-btn">
                                                            <!--            <a href="#" class="btn card__btn">В КОРЗИНУ</a>-->

                                                            <a href="<?php echo $wc_product->add_to_cart_url() ?>"
                                                               class="ajax_add_to_cart add_to_cart_button btn card__btn"
                                                               data-product_id="<?php echo get_the_ID(); ?>"
                                                               aria-label="в корзину">
                                                                В КОРЗИНУ
                                                            </a>

                                                            <a class="btn btn-brownborder card__btn card__btn-border js-one-click">Купить в 1 клик</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<?php endforeach; ?>
										<?php wp_reset_postdata(); ?>
									<?php endif; ?>

                                </div>

							<?php endwhile; ?>
						<?php endif; ?>

                    </div>
				<?php endwhile; ?>
            </div>
        </div>
    </section>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


<?php get_template_part( 'template-parts/sections/selection' ); ?>


<?php if ( have_rows( 'glavnaya_-_podbor_po_imeni' ) ): ?>
    <section class="selection-result">
        <div class="container">
            <div class="row">
				<?php while ( have_rows( 'glavnaya_-_podbor_po_imeni' ) ) : the_row(); ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="selection-result__item">
                            <div class="selection-result__img">
								<?php $izobrazhenie = get_sub_field( 'izobrazhenie' ); ?>
								<?php if ( $izobrazhenie ) : ?>
                                    <img src="<?php echo esc_url( $izobrazhenie['url'] ); ?>"
                                         alt="<?php echo esc_attr( $izobrazhenie['alt'] ); ?>"/>
								<?php endif; ?>
                            </div>
                            <a href="<?php the_sub_field( 'ssylka' ); ?>" class="selection-result__name">
								<?php the_sub_field( 'opisanie' ); ?>
                            </a>
                        </div>
                    </div>
				<?php endwhile; ?>
            </div>
            <div class="selection-result__more">
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel1.svg" alt="">
                </div>
                <a href="#" class="btn btn-blueborder selection-result__btn">ПОКАЗАТЬ ЕЩЕ ИКОНЫ</a>
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel1.svg" alt="">
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


    <section class="popular">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="popular__title">
                        Популярные разделы
                    </h2>
                </div>

				<?php if ( have_rows( 'glavnaya_-_populyarnye_razdely' ) ) : ?>

                    <div class="col-12">
                        <aside class="tags">
                            <div class="swiper-container-tags">
                                <div class="swiper-wrapper">

									<?php while ( have_rows( 'glavnaya_-_populyarnye_razdely' ) ) : the_row(); ?>
                                        <div class="swiper-slide tags-slide">
                                            <a href="<?php the_sub_field( 'ssylka_razdela' ); ?>"
                                               class="btn btn-transparent tags__btn">
												<?php the_sub_field( 'nazvanie_razdela' ); ?>
                                            </a>
                                        </div>
									<?php endwhile; ?>

                                </div>
                            </div>

                            <div class="tags__prev">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg"
                                     alt="">
                            </div>
                            <div class="tags__next">
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg"
                                     alt="">
                            </div>
                        </aside>
                    </div>

				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>



				<?php if ( have_rows( 'blizhajshie_pravoslavnye_prazdniki' ) ) : ?>
                    <div class="col-12 col-lg-6">
                        <div class="popular__wrapper">
                            <h3 class="title popular__subtitle">
                                Ближайшие православные
                                праздники
                            </h3>
							<?php $i = 0;
							while ( have_rows( 'blizhajshie_pravoslavnye_prazdniki' ) ) : the_row();
								$i ++; ?>

                                <div class="popular__item">
                                    <div class="popular__head <?php if ( $i === 1 ) {
										echo 'active';
									} ?>">
                                        <div class="popular__date"><?php the_sub_field( 'data_prazdnika' ); ?></div>
                                        <h4 class="popular__name"><?php the_sub_field( 'nazvanie_prazdnika' ); ?></h4>
                                    </div>
                                    <div class="popular__content tab <?php if ( $i === 1 ) {
										echo 'active';
									} ?>"><?php the_sub_field( 'opisanie_prazdnika' ); ?></div>
                                </div>

							<?php endwhile; ?>
                        </div>
                    </div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>



				<?php if ( have_rows( 'glavnaya_-_podarki_po_povodu' ) ) : ?>
                    <div class="col-12 col-lg-6">
                        <h3 class="title popular__subtitle">
                            Подарки по поводу
                        </h3>
						<?php while ( have_rows( 'glavnaya_-_podarki_po_povodu' ) ) : the_row(); ?>
                            <a href="<?php the_sub_field( 'ssylka' ); ?>"
                               class="popular__link"><?php the_sub_field( 'nazvanie' ); ?></a>
						<?php endwhile; ?>
                    </div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>

            </div>
        </div>
    </section>


<?php if ( have_rows( 'novinki_-_na_glavnoj' ) ) : ?>
    <section class="selection-result news">
        <div class="container">

            <div class="selection-result__more selection-result__title">
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel1.svg" alt="">
                </div>
                <h2 class="title title-center">Новинки</h2>
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel1.svg" alt="">
                </div>
            </div>
            <div class="row">

				<?php while ( have_rows( 'novinki_-_na_glavnoj' ) ) : the_row(); ?>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="selection-result__item">
                            <div class="selection-result__img">

								<?php $izobrazhenie = get_sub_field( 'izobrazhenie' ); ?>
								<?php if ( $izobrazhenie ) : ?>

                                    <img src="<?php echo esc_url( $izobrazhenie['url'] ); ?>"
                                         alt="<?php echo esc_attr( $izobrazhenie['alt'] ); ?>"/>

								<?php endif; ?>

                            </div>

							<?php $ssylka = get_sub_field( 'ssylka' ); ?>
							<?php if ( $ssylka ) : ?>

                                <a href="<?php echo esc_url( $ssylka ); ?>" class="selection-result__name">
									<?php the_sub_field( 'nazvanie' ); ?>
                                </a>

							<?php endif; ?>

                        </div>
                    </div>

				<?php endwhile; ?>

            </div>
        </div>
    </section>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


    <section class="reviews-block">
        <div class="container">
            <div class="selection-result__more selection-result__title">
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg" alt="">
                </div>
                <h2 class="title title-center">Отзывы наших клиентов</h2>
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg" alt="">
                </div>
            </div>

			<?php if ( $rewiews = get_comments(
				array(
					'status'       => 'approve',
					'hierarchical' => 'threaded',
					'number'       => '3',
//				'type'         => 'comment',
//                        'post_id' => 366,
				) ) ) : ?>

                <div class="row">

					<?php foreach ( $rewiews as $key => $review ) : ?>

                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="reviews-item">
                                <div class="reviews-item__name">
									<?php echo get_avatar( $review, 60 ); ?>
                                    <span><?php echo $review->comment_author; ?></span>
                                </div>
                                <div class="reviews-item__feedback">
									<?php if ( $rating = get_comment_meta( $review->comment_ID, 'rating', true ) ) : ?>

                                        <ul class="rating-star">

											<?php
											$stars = 0;
											while ( $stars < $rating ) {

												echo '<li class="active"></li>';
												$stars ++;
											}

											/* empty stars */
											$count = 5 - $stars;
											for ( $i = 0; $i < $count; $i ++ ) {
												echo '<li></li>';
											}

											?>

                                        </ul>

									<?php endif; ?>
                                    <div class="reviews-item__rating">
                                        5,0 / 21 Оценка
                                    </div>
                                </div>
                                <div class="reviews-item__content"><?php echo get_comment_text( $review->comment_ID ); ?></div>
                            </div>
                        </div>

						<?php
						wp_reset_postdata();
					endforeach; ?>

                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                        <a href="#" class="btn btn-blueborder reviews__btn js-reviews">НАПИСАТЬ ОТЗЫВ</a>
                        <a href="#" class="reviews__link">ВСЕ ОТЗЫВЫ</a>
                    </div>
                </div>

			<?php endif; ?>
        </div>
    </section>


<?php if ( have_rows( 'stati_i_novosti' ) ): ?>
    <section class="news-block">
        <div class="container">
            <div class="selection-result__more selection-result__title">
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg" alt="">
                </div>
                <h2 class="title title-center">Статьи и новости</h2>
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav class="tab-nav news-nav">
						<?php while ( have_rows( 'stati_i_novosti' ) ): the_row();

							$nazvanie_taba = get_sub_field( 'nazvanie_taba' ); ?>

                            <a href="#" class="tab-nav__link js-news-link"><?php echo $nazvanie_taba; ?></a>

						<?php endwhile; ?>
                    </nav>
                </div>

                <div class="col-12 col-lg-6">
					<?php $key = 0;
					while ( have_rows( 'stati_i_novosti' ) ): the_row();
						$key ++; ?>

                        <div class="tab js-news-tab" id="<?php echo $key; ?>">

                            <div class="swiper-news">
                                <div class="swiper-wrapper">

									<?php

									$post_objects = get_sub_field( 'soderzhimoe_taba' );

									if ( $post_objects ): ?>

										<?php foreach ( $post_objects as $post ): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
											<?php setup_postdata( $post ); ?>

                                            <div class="swiper-slide">
                                                <div class="article-item">
                                                    <a href="<?php the_permalink(); ?>" class="article__title"><?php the_title(); ?></a>
                                                    <div class="article__header">
                                                        <div class="article__author">
                                                            Автор: <?php echo get_the_author(); ?>
                                                        </div>
                                                        <div class="article__views"><?php echo getPostViews( get_the_ID() ); ?></div>
                                                        <div class="article__rating">
                                                            <span>Рейтинг</span>
                                                            <ul class="rating-star">
                                                                <li class="active"></li>
                                                                <li class="active"></li>
                                                                <li class="active"></li>
                                                                <li class="active"></li>
                                                                <li></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="article__img">
                                                        <img src="<?php the_post_thumbnail_url( 'full' ); ?>"
                                                             alt="<?php the_title(); ?>">
                                                    </div>
                                                    <div class="article__preview">
														<?php $text = strip_tags( get_the_content() );
														echo mb_substr( $text, 0, 334 ) . '...'; ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="article__link">ЧИТАТЬ</a>
                                                </div>
                                            </div>

										<?php endforeach; ?>

										<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
									<?php endif;

									?>

                                </div>
                                <nav class="news__pagination">
                                    <div class="swiper-pagination swiper-pagination-news"></div>
                                </nav>
                            </div>

                        </div>

					<?php endwhile; ?>
                </div>


                <!-- form -->
                <div class="col-12 col-lg-6">
                    <div class="news-form">
                        <form action="POST">
                            <div class="news-form__wrapper">
                                <h3 class="news-form__title">
                                    ПОДПИШИСЬ НА СВЕЖИЕ <br>
                                    СТАТЬИ И НОВОСТИ
                                </h3>
                                <span>
                    <input type="text" placeholder="Имя" class="form-control form__input">
                  </span>
                                <span>
                    <input type="email" placeholder="Email" class="form-control form__input">
                  </span>
                                <p class="news-form__agreement">
                                    Отправляя данную форму, я соглашаюсь с <br> политикой обработки персональных данных
                                </p>
                                <span>
                    <button type="submit" class="form-control btn btn-blueborder news-form__btn">ПОДПИСАТЬСЯ</button>
                  </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


    <section class="text-block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
					<?php the_field( 'seo_blok_-_tekst_levaya_chast' ); ?>
                </div>

                <div class="col-12 col-lg-6">
					<?php the_field( 'seo_blok_-_tekst_pravaya_chast' ); ?>
                </div>
            </div>
        </div>
    </section>


    <section class="map">
		<?php the_field( 'siteMap', 'option' ); ?>
    </section>


<?php
get_footer();