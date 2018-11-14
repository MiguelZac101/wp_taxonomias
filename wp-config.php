<?php

@ini_set( 'upload_max_filesize' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'memory_limit', '256M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );

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
define('DB_NAME', 'wp_taxonomias2018');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

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
define('AUTH_KEY', '@p|>(&9>KEjqBQ<]3ZpB@18B}]_f*z$[Kln)0:Ro9DKD0pYl;))FIzM.K~1aG8xr');
define('SECURE_AUTH_KEY', 'x}3uRs&W;1AzizloPL+j?tqE:m^XAI+Yh;j:=83AtJZwo{X82_ObzO{iy2;^cRE5');
define('LOGGED_IN_KEY', '(o=wd}$}M[sw`KEpx0]z136@FM$#x/WMuQ-0qZLjgO4bIMZhbp&r6OK0hhDAo9!a');
define('NONCE_KEY', 'Xu{CRPA%az8E(0bg>(]d]5#}%e/)L/<[z&rw04kUyNinl0QJ8h,{j4r^0_N*kGae');
define('AUTH_SALT', 's$E^4=l#FtC h37j`:79A.$R:R2:0Fd]i6|&3ZG5X^76]6zD{4/K~pWh:G3 AK|1');
define('SECURE_AUTH_SALT', 'B]DPYQ) :tOn+V?}h<PM,R6Ki0WJ0G*@U4wTE)]vLJpx)<@M+,sm5J}EeeJ*qK.?');
define('LOGGED_IN_SALT', 'Qld4E+|Ky0#4LD>1|uU(1h0skc{o8I-q7F,BO77]q-~23E5dFMCytbHVf>;&Pg-d');
define('NONCE_SALT', 'Qh*3k@/&@ES/1r6JYWT>#B^<Lz*{/WVKSLuDYQ$.~u#ah7W]T>l-yDol9OyF?CT(');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */

define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

