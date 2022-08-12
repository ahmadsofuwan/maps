<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-27 00:55:39 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp_php7.3\htdocs\stock\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2022-07-27 01:17:39 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp_php7.3\htdocs\stock\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2022-07-27 01:18:22 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 221
ERROR - 2022-07-27 01:18:44 --> Query error: Unknown column 'timedate' in 'field list' - Invalid query: INSERT INTO `itemOut` (`pkey`, `createon`, `time`, `note`, `teamkey`, `timedate`) VALUES ('', '1', 1658859524, 'ascasc', '22', 1658854800)
ERROR - 2022-07-27 01:19:30 --> Query error: Unknown column 'count' in 'field list' - Invalid query: INSERT INTO `detail_itemout` (`pkey`, `refkey`, `itemkey`, `count`, `timedate`) VALUES ('', 22, '10', '1', 1658854800)
ERROR - 2022-07-27 01:26:35 --> Severity: Warning --> A non-numeric value encountered C:\xampp_php7.3\htdocs\stock\application\controllers\Admin.php 1183
ERROR - 2022-07-27 01:26:35 --> Query error: Unknown column 'countreturn' in 'field list' - Invalid query: UPDATE `detail_itemout` SET `countreturn` = '', `use` = 1, `note` = ''
WHERE `pkey` = '3'
ERROR - 2022-07-27 01:26:43 --> Severity: Warning --> A non-numeric value encountered C:\xampp_php7.3\htdocs\stock\application\controllers\Admin.php 1183
ERROR - 2022-07-27 01:26:43 --> Query error: Unknown column 'countreturn' in 'field list' - Invalid query: UPDATE `detail_itemout` SET `countreturn` = '', `use` = 1, `note` = ''
WHERE `pkey` = '3'
ERROR - 2022-07-27 01:27:36 --> Query error: Unknown column 'note' in 'field list' - Invalid query: UPDATE `detail_itemout` SET `countreturn` = '0', `use` = 1, `note` = ''
WHERE `pkey` = '3'
ERROR - 2022-07-27 01:28:06 --> Query error: Unknown column 'returntime' in 'field list' - Invalid query: UPDATE `itemout` SET `return` = 1, `returntime` = 1658860086, `returncreaton` = '1'
WHERE `pkey` = '24'
ERROR - 2022-07-27 01:32:06 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp_php7.3\htdocs\stock\system\database\DB_query_builder.php 2754
ERROR - 2022-07-27 01:33:02 --> Severity: Error --> Maximum execution time of 30 seconds exceeded C:\xampp_php7.3\htdocs\stock\system\core\Model.php 73
ERROR - 2022-07-27 01:36:23 --> Query error: Unknown column 'timedate' in 'where clause' - Invalid query: SELECT `itemin`.*, sum(count) as count, `item`.`name` as `item`, `itemtype`.`name` as `type`
FROM `itemin`
LEFT JOIN `item` ON `item`.`pkey`=`itemin`.`itemkey`
LEFT JOIN `itemtype` ON `itemtype`.`pkey`=`item`.`typekey`
WHERE `timedate` >= 1658854800
AND `timedate` <= 1658946983
GROUP BY `itemkey`
ORDER BY `item`.`name` asc
ERROR - 2022-07-27 01:39:57 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:39:57 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:39:57 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:43:19 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:43:19 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:43:19 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:43:31 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:43:31 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:43:31 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:44:51 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:44:51 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:44:51 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:45:04 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:45:04 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:45:04 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:03 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:03 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:03 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:03 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:13 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:13 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:13 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:46:13 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:50:00 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:50:00 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:50:00 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 01:50:00 --> Severity: Notice --> Undefined index: LastStock C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:11:59 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:11:59 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:12:21 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:12:21 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:27:15 --> Severity: Notice --> Undefined index: tgl_27 C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:27:15 --> Severity: Notice --> Undefined index: use C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:32:00 --> Query error: Unknown column 'itemin.* item.name' in 'field list' - Invalid query: SELECT `itemin`.`* item`.name as `item`, `itemtype`.`name` as `type`
FROM `itemin`
LEFT JOIN `item` ON `item`.`pkey`=`itemin`.`itemkey`
LEFT JOIN `itemtype` ON `itemtype`.`pkey`=`item`.`typekey`
WHERE `timedate` >= '1658854800'
AND `timedate` <= '1658854800'
ERROR - 2022-07-27 02:40:39 --> Severity: Notice --> Undefined index: sumpiler C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:40:39 --> Severity: Notice --> Undefined index: sumpiler C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: item C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Notice --> Undefined index: sumpiler C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:44:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 356
ERROR - 2022-07-27 02:44:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 357
ERROR - 2022-07-27 02:44:40 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 358
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: item C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:03 --> Severity: Notice --> Undefined index: sumpiler C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 356
ERROR - 2022-07-27 02:45:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 357
ERROR - 2022-07-27 02:45:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 358
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: item C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: hour C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:33 --> Severity: Notice --> Undefined index: sumpiler C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 02:45:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 356
ERROR - 2022-07-27 02:45:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 357
ERROR - 2022-07-27 02:45:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 358
ERROR - 2022-07-27 03:00:22 --> Query error: Column 'time' in where clause is ambiguous - Invalid query: SELECT `close`.*, CONCAT(item.name, '_', itemtype.name) as item
FROM `close`
LEFT JOIN `item` ON `item`.`pkey`=`close`.`itemkey`
LEFT JOIN `itemtype` ON `itemtype`.`pkey`=`item`.`typekey`
WHERE `time` >= '1656608400'
AND `time` <= '1659027600'
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: count C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 349
ERROR - 2022-07-27 03:00:52 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:00:52 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 356
ERROR - 2022-07-27 03:00:52 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 357
ERROR - 2022-07-27 03:00:52 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 358
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Notice --> Undefined index: timedate C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 346
ERROR - 2022-07-27 03:01:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 356
ERROR - 2022-07-27 03:01:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 357
ERROR - 2022-07-27 03:01:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\xampp_php7.3\htdocs\stock\system\core\Exceptions.php:271) C:\xampp_php7.3\htdocs\stock\application\core\MY_Controller.php 358
