<?php
/*
Plugin Name: Precio Coche
Plugin URI: http://isaacdomingo.com/
Description: Pluigin para añadir el postype Coche.
Version: 0.1
Author: Isaac Domingo Ramírez
Author URI: http://isaacdomingo.com
License: GPLv2 o posterior
*/
// Función para crear una taxonomía
// Register Custom Taxonomy
// Register Custom Taxonomy
// Register Custom Taxonomy
class Car_Price_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'car_price',
			__( 'Car Price', 'text_domain' ),
			array( $this, 'render_metabox' ),
			'car',
			'advanced',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'car_nonce_action', 'car_nonce' );

		// Retrieve an existing value from the database.
		$car_price = get_post_meta( $post->ID, 'car_price', true );
		$car_currency = get_post_meta( $post->ID, 'car_currency', true );

		// Set default values.
		if( empty( $car_price ) ) $car_price = '';
		if( empty( $car_currency ) ) $car_currency = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="car_price" class="car_price_label">' . __( 'Price', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="number" id="car_price" name="car_price" class="car_price_field" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr__( $car_price ) . '">';
		echo '			<p class="description">' . __( 'Price', 'text_domain' ) . '</p>';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="car_currency" class="car_currency_label">' . __( 'Currency', 'text_domain' ) . '</label></th>';
		echo '		<td>';
		echo '			<select id="car_currency" name="car_currency" class="car_currency_field">';
		echo '			<option value="car_USD" ' . selected( $car_currency, 'car_USD', false ) . '> ' . __( 'USD', 'text_domain' );
		echo '			<option value="car_EUR" ' . selected( $car_currency, 'car_EUR', false ) . '> ' . __( 'Euro', 'text_domain' );
		echo '			<option value="car_GBP" ' . selected( $car_currency, 'car_GBP', false ) . '> ' . __( 'GB Pound', 'text_domain' );
		echo '			<option value="car_JPY" ' . selected( $car_currency, 'car_JPY', false ) . '> ' . __( 'Japanese Yen', 'text_domain' );
		echo '			<option value="car_CNY" ' . selected( $car_currency, 'car_CNY', false ) . '> ' . __( 'Chinese Yuan', 'text_domain' );
		echo '			</select>';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = $_POST['car_nonce'];
		$nonce_action = 'car_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$car_new_price = isset( $_POST[ 'car_price' ] ) ? sanitize_text_field( $_POST[ 'car_price' ] ) : '';
		$car_new_currency = isset( $_POST[ 'car_currency' ] ) ? $_POST[ 'car_currency' ] : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'car_price', $car_new_price );
		update_post_meta( $post_id, 'car_currency', $car_new_currency );

	}

}

new Car_Price_Meta_Box;?>
