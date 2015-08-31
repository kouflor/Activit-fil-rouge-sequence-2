<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'sequence2');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'piFk;p~RYDH$7FG%lj CR.[Vs 61i82cr*P 2KE4T+v`Hi*CZx3J{NLv0B:2j(+x');
define('SECURE_AUTH_KEY',  'amLF@4%UJ6vDS5NJ^/C87rZ?#l6{}]5RAHg+b))J*~PB>DCvXAMQ;Q7F1cM1<Z@i');
define('LOGGED_IN_KEY',    'l5Nq4L2%v9s3&5AIFt0/i&=d<of<)rlmQ;0->&f0jzR-AbC;cHQ2H=SnD+;It6Mu');
define('NONCE_KEY',        '&G z .pZTA9(+}DlcD85*]_Ek_Jf.@L=O|i8(z,F@vR~+`npg~fF *)/ R52gTh*');
define('AUTH_SALT',        '{bc|.Us+hH$wAp0Q9*WJ3k:2c$MO72xEItHSm%JQ ?%!cnI/pd4Yo pv)(eSyqNI');
define('SECURE_AUTH_SALT', 'Pp{=7->-s*T4iGyr_|y|q}?ee:V`$;bP7ifVyJaqKc$YM1d(2{=s7a5V6I#o7cD]');
define('LOGGED_IN_SALT',   'FBOJd;]b>,0eZv*Bl)~`$ wBWl]&3%ZMCMJ>Bu+exp1}$11ZoQ{&`x:0aA*[GU_!');
define('NONCE_SALT',       '@47&IXOj/8(lJ5~HV7g[ZN;j/tH8EEZqZUUG$d,=3[Ip{9eHY?O>Khkyt.%h] I(');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');