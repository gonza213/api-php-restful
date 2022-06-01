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
[01-Jun-2022 07:41:53 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'nineras.relations' doesn't exist in C:\xampp\htdocs\api-rest-php\models\get.model.php:242
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(242): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(53): ModelGet::getDataSearch('relations', '*', 'nombre,mes', 'rodri_05', NULL, NULL, NULL, NULL)
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(39): ControllerGet::getDataSearch('relations', '*', 'nombre,mes', 'rodri_05', NULL, NULL, NULL, NULL)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 242
[01-Jun-2022 07:42:16 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'nineras.relations' doesn't exist in C:\xampp\htdocs\api-rest-php\models\get.model.php:242
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(242): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(53): ModelGet::getDataSearch('relations', '*', 'nombre,mes', 'gonzalo_05', NULL, NULL, NULL, NULL)
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(39): ControllerGet::getDataSearch('relations', '*', 'nombre,mes', 'gonzalo_05', NULL, NULL, NULL, NULL)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 242
[01-Jun-2022 07:44:18 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'nineras.relations' doesn't exist in C:\xampp\htdocs\api-rest-php\models\get.model.php:242
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(242): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(53): ModelGet::getDataSearch('relations', '*', 'nombre,mes', 'gonzalo_05', NULL, NULL, NULL, NULL)
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(39): ControllerGet::getDataSearch('relations', '*', 'nombre,mes', 'gonzalo_05', NULL, NULL, NULL, NULL)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 242
[01-Jun-2022 07:45:48 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'nombre' in where clause is ambiguous in C:\xampp\htdocs\api-rest-php\models\get.model.php:305
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(305): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(63): ModelGet::getRelDataSearch('reservas,client...', 'id_cliente_r,id...', '*', 'nombre,mes', 'gonzalo_05', NULL, NULL, NULL, NULL)
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(43): ControllerGet::getRelDataSearch('reservas,client...', 'id_cliente_r,id...', '*', 'nombre,mes', 'gonzalo_05', NULL, NULL, NULL, NULL)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 305
[01-Jun-2022 08:49:51 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'nineras.perfil_niner' doesn't exist in C:\xampp\htdocs\api-rest-php\models\get.model.php:212
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(212): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(43): ModelGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(35): ControllerGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 212
[01-Jun-2022 08:51:18 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'nineras.perfil_niner' doesn't exist in C:\xampp\htdocs\api-rest-php\models\get.model.php:211
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(211): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(43): ModelGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(35): ControllerGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 211
[01-Jun-2022 08:51:54 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'nineras.perfil_niner' doesn't exist in C:\xampp\htdocs\api-rest-php\models\get.model.php:211
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(211): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(43): ModelGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(35): ControllerGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 211
[01-Jun-2022 09:08:20 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'plans' in 'field list' in C:\xampp\htdocs\api-rest-php\models\get.model.php:38
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(38): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(11): ModelGet::getData('clientes', 'id,nombre,email...', 'id', 'desc', '0', '4')
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(46): ControllerGet::getData('clientes', 'id,nombre,email...', 'id', 'desc', '0', '4')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 38
[01-Jun-2022 10:35:36 Europe/Berlin] PHP Fatal error:  Uncaught ArgumentCountError: Too few arguments to function Conexion::getColumnsData(), 1 passed in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 170 and exactly 2 expected in C:\xampp\htdocs\api-rest-php\models\conexion.php:38
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(170): Conexion::getColumnsData('clientes')
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(43): ModelGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(35): ControllerGet::getRelDataFilter('clientes,perfil...', 'id_cliente,id_n...', '*', 'plan', 'free', 'id', 'asc', '0', '3')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\conexion.php on line 38
[01-Jun-2022 10:44:50 Europe/Berlin] PHP Fatal error:  Uncaught ArgumentCountError: Too few arguments to function Conexion::getColumnsData(), 1 passed in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 309 and exactly 2 expected in C:\xampp\htdocs\api-rest-php\models\conexion.php:38
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(309): Conexion::getColumnsData('reservas')
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(63): ModelGet::getRelDataSearch('reservas,client...', 'id_cliente_r,id...', 'plan,email', 'horario,mes', '03:_05', NULL, NULL, NULL, NULL)
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(43): ControllerGet::getRelDataSearch('reservas,client...', 'id_cliente_r,id...', 'plan,email', 'horario,mes', '03:_05', NULL, NULL, NULL, NULL)
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\conexion.php on line 38
[01-Jun-2022 10:52:59 Europe/Berlin] PHP Fatal error:  Uncaught PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'p' in 'field list' in C:\xampp\htdocs\api-rest-php\models\get.model.php:148
Stack trace:
#0 C:\xampp\htdocs\api-rest-php\models\get.model.php(148): PDOStatement->execute()
#1 C:\xampp\htdocs\api-rest-php\controllers\get.controller.php(32): ModelGet::getRelData('clientes,perfil...', 'id_cliente,id_n...', 'p', 'id', 'asc', '0', '3')
#2 C:\xampp\htdocs\api-rest-php\routes\services\get.php(30): ControllerGet::getRelData('clientes,perfil...', 'id_cliente,id_n...', 'p', 'id', 'asc', '0', '3')
#3 C:\xampp\htdocs\api-rest-php\routes\routes.php(30): include('C:\\xampp\\htdocs...')
#4 C:\xampp\htdocs\api-rest-php\controllers\routes.controller.php(10): include('C:\\xampp\\htdocs...')
#5 C:\xampp\htdocs\api-rest-php\index.php(13): ControllerRoutes->index()
#6 {main}
  thrown in C:\xampp\htdocs\api-rest-php\models\get.model.php on line 148
