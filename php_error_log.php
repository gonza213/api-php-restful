[06-Jun-2022 01:40:52 Europe/Berlin] PHP Notice:  file_get_contents(): Read of 8192 bytes failed with errno=9 Bad file descriptor in C:\xampp\htdocs\api-rest-php\routes\services\put.php on line 15
[06-Jun-2022 01:41:35 Europe/Berlin] PHP Warning:  file_get_contents(): Invalid php:// URL specified in C:\xampp\htdocs\api-rest-php\routes\services\put.php on line 15
[06-Jun-2022 01:41:35 Europe/Berlin] PHP Warning:  file_get_contents(php://fd): Failed to open stream: operation failed in C:\xampp\htdocs\api-rest-php\routes\services\put.php on line 15
[06-Jun-2022 01:41:51 Europe/Berlin] PHP Warning:  file_get_contents(php://fd/3): Failed to open stream: operation failed in C:\xampp\htdocs\api-rest-php\routes\services\put.php on line 15
[06-Jun-2022 01:43:05 Europe/Berlin] PHP Warning:  file_get_contents(php://fd/3): Failed to open stream: operation failed in C:\xampp\htdocs\api-rest-php\routes\services\put.php on line 15
[06-Jun-2022 01:55:35 Europe/Berlin] PHP Fatal error:  Uncaught ArgumentCountError: fopen() expects at least 2 arguments, 1 given in C:\xampp\htdocs\api-rest-php\routes\services\put.php:15
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\routes\services\put.php(15): fopen('php://input')
#1 C:\xampp\htdocs\api-rest-php\routes\routes.php(47): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#4 {main}
  thrown in C:\xampp\htdocs\api-rest-php\routes\services\put.php on line 15
[06-Jun-2022 03:34:56 Europe/Berlin] PHP Warning:  Undefined array key 0 in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 53
[06-Jun-2022 03:34:56 Europe/Berlin] PHP Warning:  Attempt to read property "password" on null in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 53
[06-Jun-2022 04:34:33 Europe/Berlin] PHP Fatal error:  Uncaught ArgumentCountError: Too few arguments to function Firebase\JWT\JWT::encode(), 2 passed in C:\xampp\htdocs\api-rest-php\models\conexion.php on line 83 and at least 3 expected in C:\xampp\htdocs\api-rest-php\vendor\firebase\php-jwt\src\JWT.php:183
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\conexion.php(83): Firebase\JWT\JWT::encode(Array, 'iIoV^@ibmTDI')
#1 C:\xampp\htdocs\api-rest-php\controllers\post.controller.php(61): Conexion::jwt('2345', 'correo1@gmail.c...')
#2 C:\xampp\htdocs\api-rest-php\routes\services\post.php(42): ControllerPost::postLogin('clientes', Array, 'cliente')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(41): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\vendor\firebase\php-jwt\src\JWT.php on line 183
[06-Jun-2022 05:42:14 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 87
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Warning:  Undefined array key 0 in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 56
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Warning:  Attempt to read property "id_cliente" on null in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 56
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Warning:  Undefined array key 0 in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 56
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Warning:  Attempt to read property "email" on null in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 56
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Warning:  Undefined array key 0 in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 65
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Warning:  Attempt to read property "id_cliente" on null in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 65
[06-Jun-2022 05:42:43 Europe/Berlin] PHP Fatal error:  Uncaught Error: Attempt to assign property "token" on null in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php:70
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\routes\services\post.php(39): ControllerPost::postRegister('clientes', Array, 'cliente')
#1 C:\xampp\htdocs\api-rest-php\routes\routes.php(41): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#4 {main}
  thrown in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 70
[06-Jun-2022 05:52:36 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 05:52:40 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 05:53:58 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:44:30 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:44:41 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:44:44 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:44:45 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:51:50 Europe/Berlin] PHP Warning:  Undefined variable $token in C:\xampp\htdocs\api-rest-php\routes\services\post.php on line 51
[06-Jun-2022 06:54:36 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:55:38 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 06:56:34 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 93
[06-Jun-2022 06:57:09 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 89
[06-Jun-2022 06:59:27 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 07:07:18 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 07:08:29 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 07:17:24 Europe/Berlin] PHP Warning:  Undefined variable $crypt in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 101
[06-Jun-2022 07:21:11 Europe/Berlin] PHP Warning:  Undefined array key "password" in C:\xampp\htdocs\api-rest-php\controllers\post.controller.php on line 96
[06-Jun-2022 07:47:05 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'mensaje' in 'field list' in C:\xampp\htdocs\api-rest-php\models\post.model.php:31
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\post.model.php(31): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\post.controller.php(17): ModelPost::postData('clientes', Array)
#2 C:\xampp\htdocs\api-rest-php\routes\services\post.php(57): ControllerPost::postData('clientes', Array)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(41): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\post.model.php on line 31
[06-Jun-2022 07:48:28 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'mensaje' in 'field list' in C:\xampp\htdocs\api-rest-php\models\post.model.php:31
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\post.model.php(31): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\post.controller.php(17): ModelPost::postData('clientes', Array)
#2 C:\xampp\htdocs\api-rest-php\routes\services\post.php(57): ControllerPost::postData('clientes', Array)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(41): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\post.model.php on line 31
[06-Jun-2022 07:50:55 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'mensaje' in 'field list' in C:\xampp\htdocs\api-rest-php\models\post.model.php:31
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\post.model.php(31): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\post.controller.php(17): ModelPost::postData('clientes', Array)
#2 C:\xampp\htdocs\api-rest-php\routes\services\post.php(56): ControllerPost::postData('clientes', Array)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(41): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\post.model.php on line 31
[06-Jun-2022 07:52:35 Europe/Berlin] PHP Warning:  Undefined array key "token" in C:\xampp\htdocs\api-rest-php\routes\services\post.php on line 45
