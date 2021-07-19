<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

global $wishlists;
global $product;
global $post;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

$attributes = $product->get_attributes();

$rewiews = get_comments(
	array(
		'status'  => 'approve',
		'type'    => 'review',
		'post_id' => $product->get_id(),
	)
);


if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.

	return;
}

if ( function_exists( 'kama_breadcrumbs' ) ) {
	kama_breadcrumbs( '' );
}

?>


<!--<div id="product---><?php //the_ID(); ?><!--" --><?php //wc_product_class( '', $product ); ?>
<?php
///**
// * Hook: woocommerce_before_single_product_summary.
// *
// * @hooked woocommerce_show_product_sale_flash - 10
// * @hooked woocommerce_show_product_images - 20
// */
//do_action( 'woocommerce_before_single_product_summary' );
//?>
<!---->
<!--<div class="summary entry-summary">-->
<!--	--><?php
//	/**
//	 * Hook: woocommerce_single_product_summary.
//	 *
//	 * @hooked woocommerce_template_single_title - 5
//	 * @hooked woocommerce_template_single_rating - 10
//	 * @hooked woocommerce_template_single_price - 10
//	 * @hooked woocommerce_template_single_excerpt - 20
//	 * @hooked woocommerce_template_single_add_to_cart - 30
//	 * @hooked woocommerce_template_single_meta - 40
//	 * @hooked woocommerce_template_single_sharing - 50
//	 * @hooked WC_Structured_Data::generate_product_data() - 60
//	 */
//	do_action( 'woocommerce_single_product_summary' );
//	?>
<!--</div>-->
<!---->
<?php
///**
// * Hook: woocommerce_after_single_product_summary.
// *
// * @hooked woocommerce_output_product_data_tabs - 10
// * @hooked woocommerce_upsell_display - 15
// * @hooked woocommerce_output_related_products - 20
// */
//do_action( 'woocommerce_after_single_product_summary' );
//?>
<!--</div>-->


<div id="product-<?php the_ID(); ?>" class="product-inner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4">
                <div class="row">
                    <div class="col-12">
                        <div class="product__wrapper">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">

									<?php $post_thumbnail_id = $product->get_image_id();
									if ( has_post_thumbnail() ) { ?>

                                        <div class="swiper-slide">
                                            <div class="product__img">
                                                <img src="<?php the_post_thumbnail_url(); ?>"
                                                     alt="<?php the_title(); ?>">
                                            </div>
                                        </div>

									<?php } ?>


									<?php if ( $attachment_ids = $product->get_gallery_image_ids() ) {
										foreach ( $attachment_ids as $attachment_id ) {

											$image_url = wp_get_attachment_image_url( $attachment_id, 'full' );

											?>

                                            <div class="swiper-slide">
                                                <div class="product__img">
                                                    <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>">
                                                </div>
                                            </div>

										<?php }
									} ?>

                                </div>
                            </div>

                            <div class="card__tag">ХИТ ПРОДАЖ</div>
                            <a href="#" class="card__heart">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path class="js-card-heart"
                                          d="M10 18.6667C11.3117 17.976 20 13.1504 20 6.61556C20 3.80174 17.5804 1.33337 14.8214 1.33337C12.9524 1.33654 11.2294 2.29866 10.3111 3.85216C10.2424 3.95233 10.1254 4.01257 10 4.01257C9.87462 4.01257 9.7576 3.95233 9.6889 3.85216C8.77058 2.29866 7.04764 1.33654 5.17857 1.33337C2.41961 1.33337 0 3.80174 0 6.61556C0 13.1504 8.68827 17.976 10 18.6667Z"
                                          fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">

								<?php $post_thumbnail_id = $product->get_image_id();
								if ( has_post_thumbnail() ) { ?>

                                    <div class="swiper-slide">
                                        <div class="product__img">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
                                    </div>

								<?php } ?>


								<?php
								if ( $attachment_ids = $product->get_gallery_image_ids() ) {
									foreach ( $attachment_ids as $attachment_id ) {
										$image_url = wp_get_attachment_image_url( $attachment_id, 'full' );
										?>

                                        <div class="swiper-slide">
                                            <div class="product__img">
                                                <img src="<?php echo $image_url; ?>" alt=""></div>
                                        </div>

									<?php }
								}
								?>

                            </div>
                        </div>
                        <div class="product__prev">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrl.svg"
                                 alt=""></div>
                        <div class="product__next">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrl.svg"
                                 alt=""></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7 col-xl-8">
                <div class="product__info">
                    <h1 class="product__title"><?php the_title(); ?></h1>
                    <div class="product__feedback">
                        <ul class="rating-star">
							<?php

							//                        var_dump($average);
							//                        var_dump($rating_count);

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
                        <span>Отзывов <?php echo $review_count; ?></span>
                    </div>
                    <div class="product__avaibility">
						<?php if ( $product->get_sku() ) { ?>
                            <span>Код товара: <?php echo $product->get_sku(); ?></span>
						<?php } ?>

                        <p>В наличии</p>
                    </div>


					<?php

					// $product->is_type( $type ) checks the product type, string/array $type ( 'simple', 'grouped', 'variable', 'external' ), returns boolean

					if ( ! $product->is_type( 'variable' ) ) { ?>
                        <div class="product-price">
							<?php

							$price = get_post_meta( get_the_ID(), '_regular_price', true );
							$sale  = get_post_meta( get_the_ID(), '_price', true );

							if ( $product->get_sale_price() ) { ?>
                                <div class="product-price__new"><?php echo $sale; ?> ₽</div>
                                <div class="product-price__old"><?php echo $price; ?> ₽</div>
                                <div class="product-price__discount">
                                    -<?php $percentage = round( ( $price - $sale ) / $price * 100 ) . '%';
									echo $percentage; ?></div>
							<?php } else { ?>
                                <div class="product-price__new"><?php echo $product->get_regular_price(); ?> ₽</div>
							<?php } ?>
                        </div>
					<?php } ?>


					<?php woocommerce_template_single_add_to_cart(); ?>

                    <div class="product-delivery">
                        <div class="product-delivery__img"><img
                                    src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/time.svg"
                                    alt=""></div>
                        <div class="product-delivery__text"><span>Доставка в Москве </span>СДЭК - <b>от 390 ₽</b>
                            Курьерская доставка грузов и документов для организаций и частных лиц по России Срок
                            доставки <b>3-4 дня</b></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="product-info">
                    <nav class="tab-nav product-tab">
                        <a href="#" class="tab-nav__link js-product-link">Описание</a>

                        <a href="#" class="tab-nav__link js-product-link">Характеристики</a>

                        <a href="#" class="tab-nav__link js-product-link">Отзывы</a>
                    </nav>


                    <div class="tab product-info__tab js-product-tab"><?php the_content(); ?></div>


					<?php if ( $attributes ) { ?>
                        <div class="tab product-info__tab js-product-tab">
                            <div class="row">

								<?php foreach ( $attributes as $attribute ) {

									// Get the taxonomy.
									$terms    = wp_get_post_terms( $product->ID, $attribute['name'], 'all' );
									$taxonomy = $terms[0]->taxonomy;

									// Get the taxonomy object.
									$taxonomy_object = get_taxonomy( $taxonomy );

									// Get the attribute label.
									$attribute_label = $taxonomy_object->labels->name; ?>

                                    <div class="col-12 col-sm-6">
                                        <p class="product-info__text"><span><?php echo wc_attribute_label( $attribute['name'] ); ?>
                                            :</span></p>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <p class="product-info__text-b">
											<?php echo get_the_term_list( $post->ID, $attribute['name'] ) ?>
											<?php echo $attribute_label; ?></p>
                                    </div>
								<?php } ?>
                            </div>
                        </div>
					<?php } ?>

                    <div class="tab js-product-tab">
                        <div class="row">

							<?php if ( $rewiews ) { ?>
								<?php foreach ( $rewiews as $key => $review ) :
									if ( $key < 3 ) {
										?>

                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="reviews-item">
                                                <div class="reviews-item__name">

													<?php
													global $post;
													$url = get_avatar_url( $review->comment_author_email );
													$img = '<img alt="" src="' . $url . '">';
													echo $img;
													?>

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

                                                    <!--                                                <div class="reviews-item__rating">5,0 / 21 Оценка</div>-->
                                                </div>
                                                <div class="reviews-item__content"><?php echo get_comment_text( $review->comment_ID ); ?></div>
                                            </div>
                                        </div>

									<?php }
								endforeach; ?>
							<?php } else { ?>
                                <p class="reviews__text-no-comments">
                                    Пока никто не оставлял отзывы. Будьте первыми!
                                </p>
							<?php } ?>

                            <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                                <a href="#" class="btn btn-blueborder reviews__btn js-reviews">НАПИСАТЬ ОТЗЫВ</a>
                                <a href="/otzyvy/" class="reviews__link">ВСЕ ОТЗЫВЫ</a>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php

$related_products = array(); // array(5, 10, 35)

$upsells = $product->get_upsell_ids();

if ( $upsells ) { ?>
    <section class="selection-result news">
        <div class="container">
            <div class="selection-result__more selection-result__title">
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg"
                         alt=""></div>
                <h2 class="title title-center">Похожие товары</h2>
                <div class="selection-result__border">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/sel2.svg"
                         alt=""></div>
            </div>

            <div class="row">

				<?php $related_products = $upsells; ?>

				<?php foreach ( $related_products

				as $key => $related_product ) : ?>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">

					<?php
					$post_object = get_post( $related_product );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					if ( $key <= 12 ) {
						wc_get_template_part( 'content', 'product' );
					}

					?>

					<?php endforeach; ?>

                </div>
            </div>
    </section>
<?php }
?>



<?php if ( have_rows( 'tovar_-_smotrite_takzhe' ) ) : ?>
    <div class="container">
        <h2 class="title tags__title">Смотрите также</h2>
        <aside class="tags">
            <div class="swiper-container-tags">
                <div class="swiper-wrapper">
					<?php while ( have_rows( 'tovar_-_smotrite_takzhe' ) ) : the_row(); ?>
                        <div class="swiper-slide tags-slide">
                            <a href="<?php the_sub_field( 'ssylka' ); ?>"
                               class="btn btn-transparent tags__btn js-product-link">
								<?php the_sub_field( 'tekst' ); ?></a>
                        </div>
					<?php endwhile; ?>
                </div>
            </div>
            <div class="tags__prev">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg" alt="">
            </div>
            <div class="tags__next">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg" alt="">
            </div>
        </aside>
    </div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


<?php if ( have_rows( 'tovar_-_populyarnye_zaprosy' ) ) : ?>
    <div class="container">
        <h2 class="title tags__title">Популярные запросы</h2>
        <aside class="tags">
            <div class="swiper-container-tags-2">
                <div class="swiper-wrapper">
					<?php while ( have_rows( 'tovar_-_populyarnye_zaprosy' ) ) : the_row(); ?>
                        <div class="swiper-slide tags-slide">
                            <a href="<?php the_sub_field( 'ssylka' ); ?>"
                               class="btn btn-transparent tags__btn js-product-link">
								<?php the_sub_field( 'tekst' ); ?></a>
                        </div>
					<?php endwhile; ?>
                </div>
            </div>
            <div class="tags__prev-2">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg" alt="">
            </div>
            <div class="tags__next-2">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg" alt="">
            </div>
        </aside>
    </div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


<?php if ( have_rows( 'tovar_-_u_nas_pokupayut' ) ) : ?>
    <div class="container pb-2 pb-lg-5 mb-2 mb-lg-5">
        <h2 class="title tags__title">У нас покупают</h2>
        <aside class="tags">
            <div class="swiper-container-tags-3">
                <div class="swiper-wrapper">
					<?php while ( have_rows( 'tovar_-_u_nas_pokupayut' ) ) : the_row(); ?>
                        <div class="swiper-slide tags-slide">
                            <a href="<?php the_sub_field( 'ssylka' ); ?>"
                               class="btn btn-transparent tags__btn js-product-link"><?php the_sub_field( 'tekst' ); ?></a>
                        </div>
					<?php endwhile; ?>
                </div>
            </div>
            <div class="tags__prev-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg" alt="">
            </div>
            <div class="tags__next-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arrleft.svg" alt="">
            </div>
        </aside>
    </div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


<?php get_template_part( 'template-parts/sections/selection' ); ?>
<?php do_action( 'woocommerce_after_single_product' ); ?>


<aside class="js-sidebars">
    <section class="modal modal-reviews">
        <div class="modal__wrapper modal-reviews__wrapper">
            <a href="#" class="modal__exit">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/mex.svg" alt=""
                     class="modal-reviews__exit">
            </a>
            <h3 class="modal__title">
                Оставить отзыв
            </h3>
            <div class="modal-form">

                <form class="toggleRevForm" action="<?php echo site_url( 'wp-comments-post.php' ) ?>"
                      method="post"
                      enctype="multipart/form-data">


                    <div class="modal-form__wrapper">
                                        <span>
                                            <textarea name="comment"
                                                      class="form-control form__input form__textarea-long"
                                                      id="comment"
                                                      cols="30" rows="10" placeholder="Ваш отзыв"></textarea>
                                        </span>


                        <span>
                                            <input type="text" class="form-control form__input" name="author"
                                                   id="author"
                                                   placeholder="Имя"></span>

                        <span>
                                            <input type="tel" class="form-control form__input"
                                                   placeholder="Телефон">
                                        </span>

                        <span>
                                            <input type="email" name="email" class="form-control form__input"
                                                   placeholder="Email">
                                        </span>


                        <!--                                        <span>-->
                        <!--                                            <label for="your-ava" class="btn btn-border-dashed modal-form__btn">Картинка</label>-->
                        <!--                                            <input type="file" name="attachment" class="form-control d-none" id="attachment">-->
                        <!--                                        </span>-->

                        <span>
                                        <label for="attachment" class="form__upload">Загрузить фото</label>
                                        <input type="file" name="attachment" id="attachment"
                                               class="form-control d-none">
                                      </span>


                        <div class="modal-form__star">
                            Ваша оценка
                            <ul class="rating-star js-rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <input type="hidden" class="form-control" value="0" name="rating"
                                   id="js-rating">
                        </div>

						<?php
						global $product;
						comment_id_fields();
						if ( $product ) {
							do_action( 'comment_form', $product->get_id() );
						}
						?>

                        <span><button type="submit"
                                      class="btn modal-form__btn">ОТПРАВИТЬ</button></span>
                    </div>

                    <div class="modal-form__agreement">
                        Я согласен с <a href="/privacy-policy/">условиями
                            предоставления услуг и
                            обработкой моих персональных данных</a> при нажатии “Отправить”
                    </div>
                </form>

            </div>
        </div>
    </section>
</aside>