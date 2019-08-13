<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<?php $cat_id = get_query_var('cat'); ?>

<div class="row">
    <div class="col-md-12">

        <section id="primary" class="content-area archive-feed map-feed">

            <?php get_template_part('content', 'map'); ?>

        </section><!-- .content-area -->
    </div>

</div>

<?php get_footer(); ?>
