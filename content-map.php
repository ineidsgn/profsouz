<figure class="home-map">
	<div class="row">
		<div class="col-md-12 center-block">
			<section class="map-title">Карта профсоюзов:</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<select id="city_list" class="form-control" data-admin-url="<?php echo admin_url( 'admin-ajax.php'); ?>">
        <option>Выберите город</option>
				<?php

					$taxonomy = 'cities';
					$terms = get_terms($taxonomy); // Get all terms of a taxonomy

					if ( $terms && !is_wp_error( $terms ) ) : ?>
						<ul>
							<?php foreach ( $terms as $term ) { ?>
								<option data-coords="<?php echo $term->description; ?>"><?php echo $term->name; ?></option>
							<?php } ?>
            </ul>
				<?php endif;?>

      </select>
			<section class="map-container">
			  <?php foreach ( $terms as $term ) {
			    $coords = explode(",",$term->description);
			    $mapwidth = 1000;
			    $mapheight = 457;
			    $coordx = $coords[0]/$mapwidth*100;
			    $coordy = $coords[1]/$mapheight*100;
		    ?>
				  <div title="<?php echo $term->name; ?>" class="city-dot" data-category="<?php echo $term->name; ?>" data-coords="<?php echo $term->description; ?>" style="left: <?php echo $coordx;?>%; top: <?php echo $coordy;?>%;">&nbsp;</div>
			  <?php } ?>
        <div id="map_sign" class="map-sign" style="display: none"></div>

				<div id="c_popup" class="popup" style="display: none">
					<p id="c_address" class="address"></p>
					<p id="c_phone" class="phone"></p>
					<p id="c_url" class="url"><a href=""></a></p>
				</div>
			</section>
		</div>
	</div>

	<div id="profs_list" class="profs-wrapper ajax_posts"></div>

</figure>