<?php

use MyPhpmig\Police\Migration;

class AddContactsHours extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $this->_queries = "CREATE TABLE `contacts_hours` (
                          `contacts_hour_id` int(11) NOT NULL AUTO_INCREMENT,
                          `contacts_contact_id` int(11) NOT NULL DEFAULT '0',
                          `day_of_week` tinyint(4) DEFAULT NULL,
                          `opening_time` time,
                          `closing_time` time,
                          `created_by` int(11) unsigned,
                          `created_on` datetime,
                          `modified_by` int(11) unsigned,
                          `modified_on` datetime,
                          `locked_by` int(11) unsigned,
                          `locked_on` datetime,
                          `params` text,
                          PRIMARY KEY (`contacts_hour_id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $this->_queries .= "INSERT INTO `pages` (`pages_page_id`, `pages_menu_id`, `users_group_id`, `title`, `slug`, `link_url`, `link_id`, `type`, `published`, `hidden`, `home`, `extensions_extension_id`, `created_by`, `created_on`, `modified_by`, `modified_on`, `locked_by`, `locked_on`, `access`, `params`)
                            VALUES
                                (98, 2, 0, 'Hours', 'hours', 'option=com_contacts&view=hours', NULL, 'component', 1, 0, 0, 7, 1, '2014-02-13 11:14:14', NULL, NULL, NULL, NULL, 0, '');
                            ";
        $this->_queries .= "INSERT INTO `pages_closures` (`ancestor_id`, `descendant_id`, `level`)
                            VALUES
                                (14, 98, 1),
                                (4, 98, 2),
                                (98, 98, 0);";

        $this->_queries .= "INSERT INTO `pages_orderings` (`pages_page_id`, `title`, `custom`)
                            VALUES
                                (98, 00000000003, 00000000003);";

        parent::up();

        // Migrated opening hours for Leuven
        $this->getZones()->set(array('5388' => 'Leuven'));
        $this->_queries = "INSERT INTO `contacts_hours` (`contacts_hour_id`, `contacts_contact_id`, `day_of_week`, `opening_time`, `closing_time`, `created_by`, `created_on`, `modified_by`, `modified_on`, `locked_by`, `locked_on`, `params`)
                            VALUES
                                (1, 4, 1, '13:30:00', '16:30:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (2, 4, 2, '13:30:00', '16:30:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (3, 4, 3, '13:30:00', '16:30:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (4, 4, 4, '14:00:00', '20:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (5, 4, 5, '13:30:00', '16:30:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (6, 4, 6, '08:30:00', '12:30:00', 1, '2014-02-14 13:46:13', NULL, NULL, NULL, NULL, NULL),
                                (7, 3, 1, '08:30:00', '12:30:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (8, 3, 2, '08:30:00', '12:30:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (9, 3, 3, '08:30:00', '12:30:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (10, 3, 4, '08:30:00', '12:30:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (11, 3, 5, '08:30:00', '12:30:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (12, 3, 6, '08:30:00', '12:30:00', 1, '2014-02-14 13:46:13', NULL, NULL, NULL, NULL, NULL),
                                (13, 3, 3, '13:00:00', '17:00:00', 1, '2014-02-14 13:49:42', NULL, NULL, NULL, NULL, NULL),
                                (14, 3, 4, '17:00:00', '21:00:00', 1, '2014-02-14 13:50:19', NULL, NULL, NULL, NULL, NULL),
                                (15, 2, 1, '09:00:00', '19:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (16, 2, 2, '09:00:00', '19:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (17, 2, 3, '09:00:00', '19:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (18, 2, 4, '09:00:00', '19:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (19, 2, 5, '09:00:00', '19:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (20, 2, 6, '10:00:00', '18:00:00', 1, '2014-02-14 13:46:13', NULL, NULL, NULL, NULL, NULL),
                                (21, 5, 3, '13:00:00', '17:00:00', 1, '2014-02-14 13:53:08', NULL, NULL, NULL, NULL, NULL),
                                (22, 5, 4, '16:00:00', '20:00:00', 1, '2014-02-14 13:53:22', NULL, NULL, NULL, NULL, NULL),
                                (23, 5, 6, '08:30:00', '12:30:00', 1, '2014-02-14 13:53:39', NULL, NULL, NULL, NULL, NULL),
                                (24, 6, 1, '12:00:00', '14:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (25, 6, 2, '12:00:00', '14:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (26, 6, 3, '12:00:00', '14:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (27, 6, 4, '12:00:00', '14:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (28, 6, 5, '12:00:00', '14:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (29, 12, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (30, 12, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (31, 12, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (32, 12, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (33, 12, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (34, 8, 1, '10:00:00', '12:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (35, 8, 2, '10:00:00', '12:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (36, 8, 3, '10:00:00', '12:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (37, 8, 4, '10:00:00', '12:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (38, 8, 1, '13:00:00', '15:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (39, 8, 2, '13:00:00', '15:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (40, 8, 3, '13:00:00', '15:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (41, 8, 4, '13:00:00', '15:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (42, 37, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (43, 37, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (44, 37, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (45, 37, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (46, 37, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (47, 38, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (48, 38, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (49, 38, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (50, 38, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (51, 38, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (52, 35, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (53, 35, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (54, 35, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (55, 35, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (56, 35, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (57, 14, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (58, 14, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (59, 14, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (60, 14, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (61, 14, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (62, 9, 1, '13:00:00', '15:45:00', 1, '2014-02-14 15:37:56', NULL, NULL, NULL, NULL, NULL),
                                (63, 9, 2, '13:00:00', '15:45:00', 1, '2014-02-14 15:38:09', NULL, NULL, NULL, NULL, NULL),
                                (64, 9, 3, '13:00:00', '15:45:00', 1, '2014-02-14 15:38:21', NULL, NULL, NULL, NULL, NULL),
                                (65, 9, 4, '17:00:00', '20:45:00', 1, '2014-02-14 15:38:40', NULL, NULL, NULL, NULL, NULL),
                                (66, 9, 6, '08:00:00', '11:45:00', 1, '2014-02-14 15:38:57', NULL, NULL, NULL, NULL, NULL),
                                (67, 40, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (68, 40, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (69, 40, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (70, 40, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (71, 40, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (72, 41, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (73, 41, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (74, 41, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (75, 41, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (76, 41, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (77, 16, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (78, 16, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (79, 16, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (80, 16, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (81, 16, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (82, 39, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (83, 39, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (84, 39, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (85, 39, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (86, 39, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (87, 7, 1, '08:00:00', '12:00:00', 1, '2014-02-14 15:40:50', NULL, NULL, NULL, NULL, NULL),
                                (88, 7, 1, '13:00:00', '16:00:00', 1, '2014-02-14 15:41:04', NULL, NULL, NULL, NULL, NULL),
                                (89, 7, 2, '08:00:00', '12:00:00', 1, '2014-02-14 15:41:24', NULL, NULL, NULL, NULL, NULL),
                                (90, 7, 2, '13:00:00', '16:00:00', 1, '2014-02-14 15:41:37', NULL, NULL, NULL, NULL, NULL),
                                (91, 7, 3, '08:00:00', '12:00:00', 1, '2014-02-14 15:41:52', NULL, NULL, NULL, NULL, NULL),
                                (92, 7, 3, '13:00:00', '16:00:00', 1, '2014-02-14 15:42:07', NULL, NULL, NULL, NULL, NULL),
                                (93, 7, 4, '08:00:00', '12:00:00', 1, '2014-02-14 15:42:26', NULL, NULL, NULL, NULL, NULL),
                                (94, 7, 4, '13:00:00', '16:00:00', 1, '2014-02-14 15:42:42', NULL, NULL, NULL, NULL, NULL),
                                (95, 7, 5, '08:00:00', '12:00:00', 1, '2014-02-14 15:43:04', NULL, NULL, NULL, NULL, NULL),
                                (96, 7, 5, '13:00:00', '16:00:00', 1, '2014-02-14 15:43:16', NULL, NULL, NULL, NULL, NULL),
                                (97, 17, 1, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (98, 17, 2, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (99, 17, 3, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (100, 17, 4, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (101, 17, 5, '08:00:00', '16:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (102, 18, 1, '08:00:00', '18:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (103, 18, 2, '08:00:00', '18:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (104, 18, 3, '08:00:00', '18:00:00', 1, '2014-02-14 13:45:27', NULL, NULL, NULL, NULL, NULL),
                                (105, 18, 4, '08:00:00', '18:00:00', 1, '2014-02-14 13:45:41', NULL, NULL, NULL, NULL, NULL),
                                (106, 18, 5, '08:00:00', '18:00:00', 1, '2014-02-14 13:45:56', NULL, NULL, NULL, NULL, NULL),
                                (107, 18, 6, '10:00:00', '17:00:00', 1, '2014-02-14 15:44:32', NULL, NULL, NULL, NULL, NULL);
                            ";

        parent::up();
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $this->_queries = "DROP TABLE IF EXISTS `contacts_hours`;";
        $this->_queries .= "DELETE FROM `pages` WHERE `pages_page_id` IN ('98');";

        parent::down();
    }
}
