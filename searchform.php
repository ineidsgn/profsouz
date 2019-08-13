<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="Поиск по сайту" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </button>
</form>
