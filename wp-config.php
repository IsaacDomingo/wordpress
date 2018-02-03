<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'elulogiowordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'eulogio');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Eu9z1ciTizJP1Hg6');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '3;UGbxhjRUBOj=l(Ll~gAlwy/MV4.l`9WcvO1l|28<M1$3?9;tiw&X XmCL:tiyx');
define('SECURE_AUTH_KEY', 'Pw%}W!w1Xhkrr&kuP:!R=PJMX[l3eq;l5Ga`].v>3hgK`.^05EvvC^LbYebky*Ux');
define('LOGGED_IN_KEY', 'qp>PwY8sj:E;}y-`}2nU*Dvi=A4kAIZu7OTvRVr^7r9f;f~`)1Ef9X{L.T)B?]3H');
define('NONCE_KEY', 'c2Z9biCou%/y3_gl+AisuF=wiJL>??9(oBmy9j3OYf#j>h%7GtKx14<sn5}}B[5`');
define('AUTH_SALT', 'Q`T5$c~!djNc[1sxAMi6$rI|FazE8/,r6_6krYS^[BPIW29D(V.ABe]Dg5oq2?F ');
define('SECURE_AUTH_SALT', 'G}&fKVt4bD-]yv`kF.3*{c.r95Ag9^/R{UBb6MazX(tf7rO&;W~Hfm/`t !++E]3');
define('LOGGED_IN_SALT', 'G{Pv-Kt&m(HUs[,.33k4 2U(Z2yxykqAZE]54/eP?mx~)BJMyqEk&LL}yw[lp6k_');
define('NONCE_SALT', '9MhyRI?=UWS~IJj@9$bgf}<Er;NY!8cD$/!g<d?4?7g/:Ex,:{iuI1hDgecjs^?_');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'onorio_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


