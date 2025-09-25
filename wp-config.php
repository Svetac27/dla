<?php
# Database Configuration
define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '|?0ibQJWG/t4:<J~#pS7~XojZlLV=>Y@H|a{FB!y2NEB;7JR@9++SNc(:2-{U_vG');
define('SECURE_AUTH_KEY',  'M{jV0iK.Q-y^_y5Cr;.L[:[=O)KnG+x2jP5{T36%D~+c9:nZQ~+{6:>|R]3rk @]');
define('LOGGED_IN_KEY',    'oL0Z>ny|EEwpwe=Zmc&}% (b5;JqOp12M5MncRtn}NV##AK=/{}52y:!m8v4FAMU');
define('NONCE_KEY',        'y*Th5][a*I=,|_y:Gvx-7||Ab %&KY*~z3.o5[E61NXn[llSwT15c9W aGY^CKd|');
define('AUTH_SALT',        'C=V4KL> Fx0Vu,;e2g=[o;<+9i$=?:FCsZ>7}rf~Z61j-yYn,|E!.5FX.v<Z+xGG');
define('SECURE_AUTH_SALT', 'dx-r^&RF=<x2O.#df6qsfa(dG4WV6W<- 9TS>Iq@$+E2:;eXFPym;8Oum]-0W>C;');
define('LOGGED_IN_SALT',   'qfOykb2YM~-uJ<xYPv5YyK:Hv)!b||N1&%3O| w.(!T]uN`)I}Zg:lCM,&/+to_c');
define('NONCE_SALT',       'xDeh?ZrtMGE8 *a7AmqIfMi|~#YgR+G_oBbe,*dDOa7Jm|?SK3%?&nt*n73/j&pL');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'quickfactsapp' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '8c47c76b37473a9010df641fc800a0576a2a9803' );

define( 'WPE_CLUSTER_ID', '211450' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '35.189.236.155' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

define('WP_DEBUG', true);

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'quickfactsapp.wpengine.com', 1 => 'quickfactsapp.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => '127.0.0.1', );

$wpe_special_ips=array ( 0 => '35.195.230.19', 1 => 'pod-211450-utility.pod-211450.svc.cluster.local', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
