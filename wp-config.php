<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'nout34' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9brWT4KWRO!B&${*enb^l_F.4gw;~.&V1-z?HhK3C1L=61`&Sw_1>T^%j@JoUzlK' );
define( 'SECURE_AUTH_KEY',  'n8lys:M]?pQZd~Rr3]E5%|v)f)r87;M>Rw-A.B]o^gu4@m^TAL`y%DR%HFJ&r%%#' );
define( 'LOGGED_IN_KEY',    ')Xz[,%Hd+,~`A56*HuFlv-F&d/b#dVAqw^G~ -fwwM3Gl:UIaWx6cZz;~Wa.KeYx' );
define( 'NONCE_KEY',        'A+YD7FLm3+n1zr>Lo3FtRzWSUo;e@Kats.r3Mnm7HDHDYAf%!8qoeqE,I}8  .NJ' );
define( 'AUTH_SALT',        '3fKkQ2~Jx5{MEzsJKQoKu:8gZx.AG$X9Dc.HGSVEM:LRR:kP`M%k-.l}<9QE#2cl' );
define( 'SECURE_AUTH_SALT', '!tUbEi7Hs^~=b@>&JAWv/;JfB1^n+T<=ttkd9GYsy-(9S;>U#bE!S*yxL}U2mahd' );
define( 'LOGGED_IN_SALT',   'ro_/0/CC/Ra3p8LaSuS:sIC.eO%AP_%/W^>R1s[1J>x*Rstlo^@aP{HCyzUqJWOS' );
define( 'NONCE_SALT',       ',9Q8m^`e%C~IT?3Qc!1~+u(DIIe?hs_(bpBrCX,uXp%<U2E+#5RwUPZ*1f7-Sg4;' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
