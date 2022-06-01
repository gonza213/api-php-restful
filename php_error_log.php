[01-Jun-2022 05:42:59 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'viv' in 'where clause' in C:\xampp\htdocs\api-rest-php\models\get.model.php:219
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(219): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(53): ModelGet::getDataSearch('barrios', '*', 'barrio', 'viv', NULL, NULL, NULL, NULL)
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(40): ControllerGet::getDataSearch('barrios', '*', 'barrio', 'viv', NULL, NULL, NULL, NULL)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 219
