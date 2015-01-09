<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link http://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von
 * wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'wordpress_smoje');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'app_smoje');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', '2014Smoje$');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         '=S`>b% -Nt`6$s>Y+Sw(dB-D-6@n_,G& dtDctEauQ{T|r(9R#1?zi;S4evF.|3a');
define('SECURE_AUTH_KEY',  'dI0eAXr2T5Zl7+FR+bBUI)CR2aTAWfo|Bb`J]PXkxd_TI 6 Y%Ugq.~pQF#X2i2^');
define('LOGGED_IN_KEY',    'u1x1.pA![m0z+g=x[-{_wO>gCr8d+6gkoQ?%M8az$xw)5W{(yMc8-M|UZ2:IJj,R');
define('NONCE_KEY',        '|0Uvjl-R[?.01Wn Wfsq-|:-r*Nt^W-xwn!PFoOZ_W07eth=w/d3uF$y[Vt6A]E]');
define('AUTH_SALT',        'r$!^mAu&e@%>m,12||0xRi?Od~]+EGKl7%4gjl0M>u619hgAZ`ouvY8=mH;+Yc94');
define('SECURE_AUTH_SALT', '6TVO`|2,o^IXdM?8?i#`B)k~m7V*g#ce.6-l8RmxwpB{X))>.#,H|P<1s>i~&x>+');
define('LOGGED_IN_SALT',   's)A+Fw4|%d!lNk0z)[wB_~Od]Xcmkc)UKfcr_I~y%pW=:iZ;|,A3%ibF>@q+Wrc<');
define('NONCE_SALT',       ')-A+Z-&dv!L%q]UL~XW9t^^ozeQ@{z-1})t0=q4O j3T<U=uN6!/s|T2@HI6ZwQ`');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

