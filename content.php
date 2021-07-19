<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Icons
 */

setPostViews( get_the_ID() );
?>

<div class="col-12 col-lg-6" id="post-<?php the_ID(); ?>">
    <div class="article-item">
        <a href="<?php the_permalink(); ?>" class="article__title"><?php the_title(); ?></a>
        <div class="article__header">
            <div class="article__author">Автор: <?php echo get_the_author(); ?></div>
            <div class="article__views"><?php echo getPostViews( get_the_ID() ); ?></div>

            <div class="article__rating"><span>Рейтинг</span>
                <ul class="rating-star">
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li></li>
                </ul>
            </div>

        </div>
        <div class="article__img"><?php the_post_thumbnail('thumbnail'); ?></div>
        <div class="article__preview"><?php the_excerpt(); ?></div>
        <a href="<?php the_permalink(); ?>" class="article__link">ЧИТАТЬ</a>
    </div>
</div>
