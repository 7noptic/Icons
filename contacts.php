<?php
/**
 * Template Name: Контакты
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FishCrab
 */

get_header();
?>


<?php if ( function_exists( 'kama_breadcrumbs' ) ) {
	kama_breadcrumbs( '' );
} ?>

    <section class="contacts">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1 class="title"><?php the_title(); ?></h1>

					<?php if ( get_field( 'osnovnoj_telefon_tekst', 'option' ) ) { ?>
                        <p class="contacts__text">Телефон</p>
                        <div class="contacts__text-b">
                            <a href="tel:<?php the_field( 'osnovnoj_telefon_ssylka', 'option' ); ?>">
								<?php the_field( 'osnovnoj_telefon_tekst', 'option' ); ?></a>
                            <a href="tel:<?php the_field( 'dop_telefon_ssylka', 'option' ); ?>">
								<?php the_field( 'dop_telefon_tekst', 'option' ); ?></a>
                        </div>
					<?php } ?>

                    <p class="contacts__text">Email</p>
                    <a href="mailto:<?php the_field( 'e-mail', 'option' ); ?>"
                       class="contacts__text-b"><?php the_field( 'e-mail', 'option' ); ?></a>

                    <p class="contacts__text">Время работы</p>
                    <p class="contacts__text-b"><?php the_field( 'vremya_raboty_kontakty', 'option' ); ?></p>

                    <p class="contacts__text">Адрес</p>
                    <p class="contacts__text-b"><?php the_field( 'adres_na_kontakty', 'option' ); ?></p>
                </div>

				<?php if ( have_rows( 'rekvizity', 'option' ) ) : ?>

                    <div class="col-12 col-md-6">
                        <h2 class="title">Банковские реквизиты</h2>

						<?php while ( have_rows( 'rekvizity', 'option' ) ) : the_row(); ?>

                            <p class="contacts__text"><?php the_sub_field( 'nazvanie_rekvizita' ); ?></p>
                            <p class="contacts__text-bp"><?php the_sub_field( 'znachenie_rekvizita' ); ?></p>

						<?php endwhile; ?>

                    </div>

				<?php endif; ?>

            </div>
        </div>
    </section>


    <section class="map"><?php the_field( 'siteMap', 'option' ); ?></section>


<?php get_template_part( 'template-parts/sections/selection' ); ?>


<?php
get_footer();
