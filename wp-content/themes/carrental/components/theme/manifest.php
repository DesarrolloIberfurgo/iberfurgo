<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

$manifest = array();

$manifest[ 'name' ]			 = 'carrental';
$manifest[ 'uri' ]			 = esc_url( 'https://themeforest.net/user/xpeedstudio' );
$manifest[ 'description' ]	 = esc_html__( 'CarRental WordPress Theme', 'carrental' );
$manifest[ 'version' ]		 = '1.0';
$manifest[ 'author' ]			 = 'xpeedstudio';
$manifest[ 'author_uri' ]		 = esc_url( 'https://themeforest.net/user/xpeedstudio' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => CARRENTAL_MINWP_VERSION,
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
);


?>
