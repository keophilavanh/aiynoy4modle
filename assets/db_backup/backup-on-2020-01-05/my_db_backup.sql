#
# TABLE STRUCTURE FOR: tb_book_accounting
#

DROP TABLE IF EXISTS `tb_book_accounting`;

CREATE TABLE `tb_book_accounting` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (1, 'AV', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (2, 'AP', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (3, 'AR', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (4, 'DP', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (5, 'PP', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (6, 'SA', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (7, 'AJ', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (8, 'BK', 'active');
INSERT INTO `tb_book_accounting` (`book_id`, `Name`, `Status`) VALUES (9, 'CH', 'active');


#
# TABLE STRUCTURE FOR: tb_code_accounting
#

DROP TABLE IF EXISTS `tb_code_accounting`;

CREATE TABLE `tb_code_accounting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(6) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=391 DEFAULT CHARSET=utf8;

INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (4, 'ທຶນ​ຈົດ​ທະບຽນ - ບໍ່​ທັນ​ຮຽກ​ໃຫ້ປະກອບ', '101', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (5, 'ທຶນ​ຈົດ​ທະບຽນ - ຮຽກ​ໃຫ້​ປະກອບ ​ແຕ່​ບໍ່​ທັນ​ຖອ', '102', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (6, 'ທຶນ​ຈົດ​ທະບຽນ - ຮຽກ​ໃຫ້​ປະກອບ ຖອກ​ແລ້ວ', '103', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (7, 'ສ່ວນ​ເພີ້​ມ ທີ່​ຕິດ​ພັນ​ກັບ​ບັນຊີ​ວິ​ສາ​ຫະກິດ', '104', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (8, 'ທຶນ​ເຈົ້າຂອງ​ທຸລະ​ກິດ', '108', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (9, 'ຜຸ້​ຖື​ຮຸ້ນ - ທຶນ​ຈົດ​ທະບຽນ​ທີ່​ບໍ່​ທັນ​ຮຽກ​ໃ', '109', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (10, 'ຄັງ​ສະ​ສົມ ຕາມ​ລະບຽບ​ການ', '111', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (11, 'ຄັງ​ສະສົມ ອື່ນໆ', '116', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (12, 'ຍອດ​ຍົກ​ມາ (​ເຫຼືອມີ)', '117', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (13, 'ຍອດ​ຍົກ​ມາ (​ເຫຼືອໜີ້)', '119', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (14, 'ຜົນ​ໄດ້​ຮັບ​ໃນ​ປີ (ກຳ​ໄລ)', '121', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (15, 'ຜົນ​ໄດ້​ຮັບ​ໃນ​ປີ (ຂາດທຶນ)', '129', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (16, 'ຜິດ​ດ່ຽງ​ຈາກ​ການ​ຕີ​ມູນ​ຄ່້າຊັບ​ສົມບັດ​ຄົງ​ທີ', '131', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (17, 'ຜິດ​ດ່ຽງ​ຈາກ​ການ​ຕີ​ມູນ​ຄ່າວິ​ສາ​ຫະກິດ', '132', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (18, 'ຜິດ​ດ່ຽງ​ຈາກ​ການ​ຕີ​ມູນ​ຄ່າທຽບ​ເທົ່າ', '133', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (19, '​ເງິນ​ແຮ ​ເພື່ອ​ເງິນ​ບຳນານ ​ແລະ ພັນທະ​ຄ້າຍຄື​', '141', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (20, '​ເງິນ​ແຮ ​ເພື່ອ​ການຄ້ຳປະກັນ​ໃຫ້​ແກ່​ລູກ​ຄ້າ', '142', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (21, '​ເງິນ​ແຮ ​ເພື່ອ​ອາກອນ', '143', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (22, '​ເງິນ​ແຮ-ຟື້ນ​ຟູ​ຊັບ​ສົມບັດ​ຄົງ​ທີ່​ຄືນ​ໃໝ່ (', '144', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (23, '​ເງິນ​ແຮ ​ເພື່ອ​ລາຍ​ຈ່າຍ​ອື່ນໆ', '148', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (24, '​ເງິນ​ກູ້​ຢືມ-ພັນທະບັດ​ແລກປ່ຽນ​ໄດ້', '151', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (25, 'ເງິນ​ກູ້​ຢືມ-ພັນທະບັດອື່ນໆ', '152', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (26, 'ເງິນ​ກູ້​ຢືມ ນຳ​ສະ​ຖາ​ບັນ​ສິນ​ເຊື່ອ', '153', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (27, '​ເງິນ​ວາງ ​ແລະ ​ເງິນ​ຄ້ຳປະກັນ ທີ່​ໄດ້​ຮັບ', '154', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (28, 'ໜີ້​ຕ້ອງ​ສົ່ງ ບ້ວງ​ສັນ​ຍາ​ເຊົ່າ​ສິນ​ເຊື່ອ', '155', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (29, 'ດອກ​ເບັ້ຽ ຄິດ​ໄລ່​ຕ້ອງ​ຈ່າຍ', '156', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (30, '​ເງິນ​ກູ້​ຢືມ​ອື່ນໆ ​ແລະ ໜີ້​ຕ້ອງ​ສົ່ງ​ປະ​ເພດ', '158', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (31, 'ສ່ວນ​ເພີ້​ມ​ເງິນ​ທົດ​ແທນ​ພັນທະບັດ', '159', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (32, '​ເງິນ​ຊ່ວຍ​ໜູນ ປະກອບ​ພາຫະນະ', '161', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (33, '​ເງິນ​ຊ່ວຍ​ໜູນ ລົງທຶນ​ອື່ນໆ', '162', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (34, 'ອາກອນ​ເຍື້ອນ​ຊຳລະ-ຊັບ​ສິນ', '163', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (35, 'ອາກອນ​ເຍື້ອນ​ຊຳລະ-ໜີ້​ສິນ', '164', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (36, 'ລາຍ​ຮັບ ​ແລະ ລາຍ​ຈ່າຍ​ອື່ນໆ ​ເຍື້ອນ​ຊຳລະ', '168', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (37, '​ເງິນ​ຊ່ວຍ​ໜູນ ທີ່​ຈົດ​ເຂົ້າບັນຊີ​ຜົນ​ໄດ້​ຮັບ', '169', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (38, 'ໜີ້​ຕ້ອງ​ສົ່ງ-ການ​ຮ່ວມ​ປະກອບ​ທຶນ ​ໃນ​ກຸ່ມ​ບໍລ', '171', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (39, 'ໜີ້​ຕ້ອງ​ສົ່ງ-ການ​ຮ່ວມ​ປະກອບ​ທຶນ ​ນອກກຸ່ມ​ບໍລ', '172', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (40, 'ໜີ້​ຕ້ອງ​ສົ່ງ ທີ່​ຕິດ​ພັນ​ກັບ​ບໍລິສັດ​ຮ່ວມ​ປະ', '173', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (41, 'ດອກເບັ້ຽ ຄິດໄລ່', '176', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (42, 'ໜີ້​ຕ້ອງ​ສົ່ງ​ອື່ນໆ ທີ່​ຕິດ​ພັນ​ກັບ​ການ​ຮ່ວມ​', '178', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (43, 'ບັນຊີ​ພົວພັນ ລະ​ຫ່ວາງ​ກົມ​ກອງ', '181', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (44, 'ສິນຄ້າ ​ແລະ ການ​ບໍລິການ ​ແລກປ່ຽນ​ລະ​ຫ່ວາງ ກົມ', '186', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (45, 'ສິນຄ້າ ​ແລະ ການ​ບໍລິການ ​ແລກປ່ຽນ​ລະ​ຫ່ວາງ ກົມ', '187', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (46, 'ບັນຊີ​ພົວພັນ ລະ​ຫ່ວາງ ບໍລິສັດ​ຮ່ວມ​ປະກອບ​ທຶນ', '188', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (47, 'ສິດນຳໃຊ້ທີ່ດິນ', '201', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (48, 'ຄ່າໃຊ້ຈ່າຍໃນການພັດທະນາທີ່ຈົດເ້ປັນມູນຄ່າຄົງທີ່', '203', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (49, 'ຊຸດຄຳສັ່ງຄອມພິວເຕີ ແລະ ສິດທິປະເພດດຽວກັນ', '204', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (50, 'ສິດທຳສຳປະທານ ແລະ ສິດທິປະເພດດຽວກັນ', '205', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (51, 'ຊັບສົມບັດຮ້ານຄ້າ (ຄ່ານິຍົມ)', '207', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (52, 'ຊັບສົມບັດຄົງທີ່ ບໍ່ມີຕົວຕົນອື່ນໆ', '208', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (53, 'ສິ່ງຈັດວາງ ແລະ ປົວແປງ', '211', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (54, 'ສິ່ງປຸກສ້າງ', '212', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (55, 'ສິ່ງຕິດຕັ້ງເຕັກນິກ-ເຄື່ອງຈັກ ແລະ ອຸປະກອນ', '213', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (56, 'ພາຫະນະຂົນສົ່ງ', '214', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (57, 'ຝູກສັດລາກແກ່ ແລະ ພໍ່ແມ່ພັນ', '215', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (58, 'ຕົ້ນໄມ້ກິນໝາກ ແລະ ສວນປູກຝັງ', '216', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (59, 'ຊັບສົມບັດຄົງທີ່ ປ່ຽນແທນກັນໄດ້', '217', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (60, 'ຊັບສົມບັດຄົງທີ ມີຕົວຕົນອື່ນໆ', '218', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (61, 'ສິດນຳໃຊ້ທີ່ດິນ-ສຳປະທານ', '220', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (62, 'ສິ່ງຈັດວາງ ແລະ ປົວແປງທີ່ດິນ ສຳປະທານ', '221', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (63, 'ສິ່ງປຸກສ້າງ - ສຳປະທານ', '222', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (64, 'ສິ່ງຕິດຕັ້ງເຕັກນິກ ສຳປະທານ', '223', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (65, 'ຊັບສົມບັດຄົງທີ່ ມີຕົວຕົນອື່ນໆ-ສຳປະທານ', '228', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (66, 'ທຶນ​ປະກອບ​ຂອງຜູ້ໃຫ້ສຳປະທານ', '229', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (67, 'ຊັບ​ສົມບັດ​ຄົງ​ທີ່ ບໍ່​ມີ​ຕົວ​ຕົນ', '230', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (68, 'ຊັບ​ສົມບັດ​ຄົງ​ທີ່ ມີ​ຕົວ​ຕົນ', '231', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (69, '​ເງິນ​ລ່ວງ​ໜ້າແລະຈ່າຍສັ່ງ​ຊື້​ຊັບ​ສົມບັດ​ຄົງ​', '237', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (70, 'ເງິນ​ລ່ວງ​ໜ້າແລະຈ່າຍສັ່ງ​ຊື້​ຊັບ​ສົມບັດ​ຄົງ​ທ', '238', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (71, '​ເຊົ່າ​ສິນ​ເຊື່ອ-ສິດນຳ​ໃຊ້​ທີ່​ດິນ', '250', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (72, '​ເຊົ່າ​ສິນ​ເຊື່ອ-ສິ່ງ​ປຸກ​ສ້າງ', '251', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (73, '​ເຊົ່າ​ສິນ​ເຊື່ອ-ສິ່ງ​ຕິດຕັ້ງ​ເຕັກນິກ', '253', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (74, '​ເຊົ່າ​ສິນ​ເຊືອ-ພາຫະນະ​ຂົນ​ສົ່ງ', '254', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (75, 'ໜີ້​ຕ້ອງ​ຮັບ ຈາກ​ການ​ໃຫ້​ເຊົ່າ​ສິນ​ເຊື່ອ', '256', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (76, 'ຫຼັກຊັບລົງທຶນ', '261', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (77, 'ຮູບການຮ່ວມປະກອບທຶນອື່ນໆ', '262', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (78, 'ຫຼັກຊັບລົງທຶນ ຕາມມູນຄ່າທຽບເທົ່າ', '265', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (79, 'ໜີ້ຕ້ອງຮັບ ທີ່ຕິດພັນກັບ ການຮ່ວມປະກອບທຶນໃນ ກຸ່', '266', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (80, 'ດອກເບັ້ຽ ຄິດໄລ່', '267', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (81, 'ໜີ້ຕ້ອງຮັບອື່ນໆ ທີ່ຕິດພັນກັບບໍລິສັດຮຸ້ນສ່ວນ', '268', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (82, 'ເງິນທີ່ຕອງຖອກຕື່ມ ບ້ວງໃບຢັ້ງຢືນຮ່ວມປະກອບທຶນ ທ', '269', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (83, 'ໃບຢັ້ງຢືນຊັບຄົງທີ່ ໆ ບໍ່ແມ່ນບ້ວງກິດຈະການຄັງຫຼ', '271', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (84, 'ໃບຢັ້ງຢືນຊັບ ທີ່ສະແດງເຖິງສິດທິຕໍ່ໜີ້ຕ້ອງຮັບ (', '272', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (85, 'ໃບຢັ້ງຢືນຊັບຄົງທີ່ ບ້ວງກິດຈະການຄັງຫຼັກຊັບ', '273', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (86, 'ເງິນໃຫ້ກູ້ຢືມ', '274', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (87, 'ເງິນວາງ ແລະ ຄ້ຳປະກັນ ທີ່ໄດ້ຈ່າຍ', '275', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (88, 'ໜີ້ຕ້ອງຮັບຄົງທີ່ອື່ນໆ', '276', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (89, 'ດອກເບັ້ຽ ຄິດໄລ່', '277', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (90, 'ຮຸ້ນຕົນເອງ (ຫຼື ພູດສ່ວນຮຸ້ນຕົນເອງ)', '278', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (91, 'ເງິນຍັງຕ້ອງຈ່າຍ ບ້ວງໃບຢັ້ງຢືນຊັບອື່ນໆ ທີ່ບໍ່ທ', '279', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (92, 'ຄ່າຫຼູ້ຍຫ້ຽນ ຊັບສົມບັດຄົງທີ່ ບໍ່ມີຕົວຕົນອື່ນໆ', '280', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (93, 'ຄ່າຫຼຸ້ຍຫ້ຽນ ຊັບສົມບັດຄົງທີ່ ມີຕົວຕົນ', '281', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (94, 'ຄ່າຫຼຸ້ຍຫ້ຽນ ຊັບສົມບັດຄົງທີ່ ສຳປະທານ', '282', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (95, 'ຄ່າຫຼຸ້ຍຫ້ຽນ ຊັບສົມບັດຄົງທີ່ ເຊົ່າສິນເຊື່ອ', '285', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (96, 'ຄ່າຫຼູ້ຍຫຽນ ຊັບສົມບັດຄົງທີ່ ອື່ນໆ', '288', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (97, 'ຄ່າສູນເສັຽມູນຄ່າຊັບສົມບັດຄົງທີ່ ບໍ່ມີຕົວຕົນ', '290', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (98, 'ຄ່າສູນເສັຽມູນຄ່າຊັບສົມບັດຄົງທີ່ ມີ​ຕົວ​ຕົນ', '291', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (99, 'ຄ່າສູນເສັຽມູນຄ່າຊັບສົມບັດຄົງທີ່ ສຳ​ປະທານ', '292', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (100, 'ຄ່າສູນເສັຽມູນຄ່າຊັບສົມບັດຄົງທີ່ ພວມ​ຊື້', '293', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (101, 'ຄ່າສູນເສັຽມູນຄ່າຊັບສົມບັດຄົງທີ່ ​ໃບຢັ້ງຢືນ​ຮ່', '296', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (102, 'ຄ່າສູນເສັຽມູນຄ່າຊັບສົມບັດຄົງທີ່ ການ​ເງິນ​ອື່ນ', '297', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (103, 'ຊື້​ວັດຖຸ​ດິບ', '301.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (104, 'ຊື້​ວັດຖຸ​ດິບປະກອບ ()', '301.21', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (105, 'ຊື້​ວັດຖຸ​ດິບປະກອບ ()', '301.22', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (106, 'ຊື້​ວັດຖຸ​ອື່ນໆ ຮັບ​ໃຊ້​ການ​ຜະລິດ', '302.11', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (107, 'ຊື້​ວັດຖຸ​ອື່ນໆ ຮັບ​ໃຊ້​ການ​ຜະລິດ (ລາຍຈ່າຍທີ່', '302.12', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (108, 'ຊື້​ສິນຄ້າ', '307.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (109, 'ຊື້​ສິນຄ້າ (ພາສີ ແລະ ອາກອນຕ່າງໆ)', '307.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (110, 'ຊື້​ສິນຄ້າ (ລາຍຈ່າຍທີ່ຕິດພັນ)', '307.3', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (111, 'ວັດຖຸ​ດິບ (ປູນຜົງ)', '311.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (112, 'ວັດຖຸ​ດິບ (ແຮ່-ຊາຍ)', '311.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (113, 'ວັດຖຸ​ດິບ (ອື່ນໆ)', '311.3', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (114, 'ວັດຖຸ​ປະກອບ ()', '312', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (115, 'ວັດຖຸ​ປະກອບ ()', '312.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (116, 'ວັດຖຸ​ຊົມ​ໃຊ້', '321.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (117, 'ວັດຖຸ​ຊົມ​ໃຊ້', '321.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (118, 'ວັດຖຸ​ປະກອບ​ຊົມ​ໃຊ້', '322', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (119, 'ເຄື່ອງ​ຫຸ້ມ​ຫໍ່ຖິ້ມ​ເລີຍ', '326', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (120, '​ເຄື່ອງ​ຫຸ້ມ​ຫໍ່​ມັດ​ຈຳ ຈຳແນກບໍ່ໄດ້', '327', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (121, 'ຜະລິດ​ຕະພັນ​ພວມ​ປຸງ​ແຕ່ງ', '331', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (122, 'ວຽກ​ງານ​ພວມ​ກໍ່ສ້າງ​ພວມ​ດຳ​ເນີນງານ', '​333', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (123, 'ການ​ຄົ້ນຄວ້າ​ພວມ​ດຳ​ເນີນ', '342', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (124, 'ການ​ໃຫ້​ບໍລິການ ພວມ​ດຳ​ເນີນ', '343', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (125, 'ຜະລິດ​ຕະພັນ​ລະ​ຫ່ວາງ​ກາງ', '351', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (126, 'ຜະລິດ​ຕະພັນສຳ​ເລັດ​ຮູບ', '355', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (127, 'ຜະລິດ​ຕະພັນ​ເສດ​ເຫຼືອ ຫຼື ຜະລິດ​ຕະພັນ​ເກັບ​ຄື', '358', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (128, 'ສິນຄ້າ​ໃນ​ສາງ', '37.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (129, 'ສິນຄ້າ​ໃນ​ສາງ', '37.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (130, 'ເຄື່ອງ​ໃນ​ສາງ​ຢູ່​ທາງ​ນອກ (ພວມ​ຢູ່​ລະຫວ່າງ​ທາ', '38', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (131, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ວັດຖຸ​ດິບ ​ແລະ ວັດຖຸ​ປະກອ', '391', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (132, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ວັດຖຸ​ຮັບ​​ໃຊ້​​ໃນ​ການ​ຜະ', '392', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (133, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ຜະລິຕະພັນ​ພວມ​ປຸງ​ແຕ່ງ', '393', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (134, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ການ​ບໍລິການ​ພວມ​ດຳ​ເນີນ', '394', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (135, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ຜະລິດຕະພັນ​ໃນ​ສາງ', '395', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (136, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ສິນຄ້າ​ໃນ​ສາງ', '396', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (137, 'ຄ່າສູນເສຍ​ມູນ​ຄ່າ ​ເຄື່ອງ​ໃນ​ສາງ​ທາງ​ນອກ', '398', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (138, 'ຜູ້​ສະໜອງ - ສິນຄ້າ, ວັດຖຸ​ດິບ ​ແລະ ວັດຖຸ​ປະກອ', '401', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (139, 'ຜູ້​ສະໜອງ - ການ​ບໍລິການ', '402', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (140, 'ຜູ້​ສະໜອງ - ​ໃບ​ຢັ້ງຢືນ​ການ​ຄ້າ​ຕ້ອງ​ຈ່າຍ', '403', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (141, 'ຜູ້​ສະ​ໜອງ - ຊັບ​ສົມບັດ​ຄົງ​ທີ່', '404', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (142, 'ຜູ້​ສະໜອງ - ຊັບ​ສົມບັດ​ຄົງ​ທີ່​ໃບ​ຢັ້ງຢືນ​ການ', '405', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (143, 'ຜູ້​ສະໜອງ - ໜີ້​ຕ້ອງ​ຮັບ​ບ້ວງ​ເຄື່ອງ​ຫຸ້ມ​ຫໍ່', '406', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (144, 'ຜູ້​ສະໜອງ - ​ໃບ​ເກັບ​ເງິນ​ບໍ່ທັນ​ມາ​ຮອດ', '408', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (145, 'ຜູ້​ສະ​ໜອງ - ຕິດ​ໜີ້: ​ເງິນ​ລ່ວງ​ໜ້າ ​ແລະ ​ເງ', '409', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (146, 'ລູກ​ຄ້າ - ຄ່າ​ສິນຄ້າ, ຜະລິດ​ຕະພັນ, ບໍລິການ', '411', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (147, 'ລູກ​ຄ້າ - ​ໃບຢັ້ງຢືນ​ການ​ຄ້າ​ຕ້ອງ​ຮັບ', '412', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (148, 'ລູກ​ຄ້າ - ​ໃບ​ຢັ້ງຢືນ​ການ​ຄ້າຂາຍ​ຫຼຸດ ບໍ່​ເຖິ', '413', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (149, 'ລູກ​ຄ້າ - ໜີ້​ຕ້ອງ​ຮັບ​ທວງ​ຍາກ', '414', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (150, 'ໜີ້​ຕ້ອງ​ຮັບ - ບ້ວງ​ວຽກງານ​ກໍ່ສ້າງ ຫຼື ບໍລິກາ', '415', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (151, 'ລູກຄ້າ - ໜີ້​ຕ້ອງ​ສົ່ງ​ບ້ວງ​ເຄື່ອງ​ຫຸ້ມ​ຫໍ່​ທ', '416', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (152, 'ລູກ​ຄ້າ - ຂາຍຜະລິດ​ຕະພັນ​ ສິນຄ້າ ທີ່​ບໍ່​ທັນ​', '417', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (153, 'ລູກ​ຄ້າ - ລາຍ​ຮັບ​ຮັບ​ລ່ວງ​ໜ້າ', '418', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (154, 'ລູກ​ຄ້າ​ເປັນ​ເຈົ້າ​ໜີ້ (​ເງິນລ່ວງ​ໜ້າ ​ແລະ ​ເ', '419', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (155, 'ພະນັກງານ - ຄ່າ​ທົດ​ແທນ​ແຮງ​ງານ​ຕ້ອງ​ສະ​ສາງ', '431', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (156, 'ພະນັກງານ - ​ເງິນ​ບຳ​ເນັດ ​ແລະ ຍ້ອງຍໍ', '432', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (157, 'ພະນັກງານ - ​ເງິນ​ນະ​ໂຍບາຍ​ພັກ​ຜ່ອນ ​ແລະ ນະ​ໂຍ', '433', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (158, 'ພະນັກງານ - ​ເງິນ​ນະ​ໂຍບາຍ​ພັກຜ່ອນທີ່​ໄດ້​ຫັກ​', '434', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (159, 'ພະນັກງານ - ​ເງິນ​ລ່ວງ​ໜ້າ ​ແລະ ຈ່າຍ​ກ່ອນ​ສ່ວນ', '435', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (160, 'ພະນັກງານ - ​ເງິນ​ວາງ​ທີ່​ໄດ້​ຮັບ', '436', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (161, 'ພະນັກງານ - ​ເງິນ​ຕັດ​ໄວ້', '437', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (162, 'ພະນັກງານ - ລາຍ​ຈ່າຍ​ຕ້ອງ​ຈ່າຍ ​ແລະ ລາຍ​ຮັບ​ຕ້', '438', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (163, 'ອົງການ​ປະກັນ​ສັງຄົມ - (ບ້ວງ​ລູກຈ້າງ)', '441', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (164, 'ອົງການ​ປະກັນ​ສັງຄົມ - (ບ້ວງ​ນາຍ​ຈ້າງ)', '442', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (165, 'ອົງການ​ປະກັນ​ສັງຄົມ - ລາຍ​ຈ່າຍ​ຕ້ອງ​ຈ່າຍ', '444', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (166, 'ອົງການ​ປະກັນ​ສັງຄົມ - ລາຍ​ຈ່າຍ ຈ່າຍ​ລ່ວງ​ໜ້າ', '447', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (167, 'ອົງການ​ຈັດຕັ້ງສາກົນ', '448', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (168, 'ລັດ - ​ເງິນ​ຊ່ວຍ​ໜູນ​ຕ້ອງ​ຮັບ', '451', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (169, 'ລັດ - ອາກອນ​ເກັບ​ຈາກ​ພາກສ່ວນ​ອື່ນ', '452', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (170, 'ລາຍການ​ເຄື່ອນ​ໄຫວ​ສະ​ເພາະ​ກັບ​ລັດ ​ແລະ ອົງການ', '453', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (171, 'ລັດ - ອາກອນ​ຜົນ​ໄດ້​ຮັບ (ມອບລ່ວງໜ້າ)', '454.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (172, 'ລັດ - ອາກອນ​ຜົນ​ໄດ້​ຮັບ (ຄິດໄລ່)', '454.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (173, 'ລັດ - ອາກອນ​ຜົນ​ໄດ້​ຮັບ (ຕ້ອງມອບ)', '454.3', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (174, 'ລັດ - ອາກອນ​ຜົນ​ໄດ້​ຮັບ (ຍົກໄປຫັກຕໍ່)', '454.4', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (175, 'ລັດ-ອາກອນ​ອື່ນໆ ​ແລະ ລາຍ​ຈ່າຍ​ປະ​ເພດ​ດຽວ​ກັນ', '455', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (176, 'ລັດ - ລາຍ​ຈ່າຍ​ຕ້ອງ​ຈ່າຍ', '456', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (177, 'ລັດ - ລາຍ​ຮັບ​ຕ້ອງ​ຮັບ', '457', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (178, 'ອມພ ທີ່ສາມາດຫັກໄດ້ສຳລັບຊັບ​ສົມບັດ​ຄົງ​ທີ່', '461', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (179, 'ອມພ ທີ່ສາມາດຫັກໄດ້ສຳລັບສິນຄ້າ ການ​ບໍລິການ', '462', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (180, 'ອມພ ຍົກ​ໄປ​ຫັກ​ຕໍ່ ຫຼື ສິນເຊື່ອ ອມພ', '463', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (181, 'ອມພ ທີ່ໄດ້ເກັບ​', '464', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (182, 'ອມພ ທີ່ຕ້ອງ​ມອບ', '465', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (183, 'ອມພ ບ້ວງ​ໃບ​ເກັບ​ເງິນ​ບໍ່​ທັນ​ມາ​ຮອດ', '466', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (184, 'ອມພ ບ້ວງ​ໃບ​ເກັບ​ເງິນ​ຕ້ອງ​ອອກ', '467', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (185, 'ອມພ ບ້ວງ​ອື່ນໆ ລໍຖ້າ​ສະ​ສາງ', '468', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (186, 'ກາ​ນ​ເຄື່ອນ​ໄຫວ​ບໍລິສັດ​ໃນ​ກຸ່ມ', '471', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (187, 'ຂາ​ຮຸ້ນ - ບັນຊີ​ເງິນ​ຝາກ​ກະ​ແສ​ລາຍ​ວັນ', '472', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (188, 'ຂາ​ຮຸ້ນ - ການ​ເຄື່ອນ​ໄຫວ​ກ່ຽວ​ກັບ​ທຶນ', '473', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (189, 'ຂາ​ຮຸ້ນ - ​ເງິນ​ປັນ​ຜົນ​', '474', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (190, 'ຂາ​ຮຸ້ນ - ການ​ເຄື່ອນ​ໄຫວ​ຮ່ວມ​ກັນ ຫຼື ​ເປັນ​ກ', '475', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (191, 'ຂາຮຸ້ນ - ທຶນທີ່ຕ້ອງທົດແທນຄືນ (ຫຼື ຊຳລະສະສາງ)', '476', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (192, 'ຂາ​ຮຸ້ນ - ລາຍຈ່າຍໆ​ລ່ວງ​ໜ້າ ​ແລະ ລາຍ​ຮັບໆ​ລ່ວ', '478', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (193, 'ໜີ້​ຕ້ອງ​ຮັບ ຈາກ​ການ​ຂາຍ​ຊັບ​ສົມບັດ​ຄົງ​ທີ່', '481', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (194, 'ໜີ້​ຕ້ອງ​ຮັບ ຈາກ​ການ​ຂາຍ​ຫຼັກ​ຊັບໝູນທຶນ', '482', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (195, 'ໜີ້​ຕ້ອງສົ່ງ ບ້ວງ​ການ​ຊື້​ຫຼັກຊັບ​ໝູນທຶນ', '483', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (196, 'ເຈົ້າໜີ້ອື່ນໆ', '484', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (197, 'ລູກໜີ້ອື່ນໆ', '485', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (198, 'ລາຍ​ຈ່າຍ​ ຈ່າຍລ່ວງ​ໜ້າ', '486', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (199, 'ລາຍ​ຮັບ​ ຮັບລ່ວງ​ໜ້າ', '487', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (200, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ​ຂອງ​ບັນຊີ​ລູກ​ໜີ້', '492', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (201, 'ຄ່າ​ສູນ​ເສ​ຍມູນ​ຄ່າ​ຂອງ​ບັນຊີ​ກຸ່ມ​ບໍລິສັດ ​ແ', '495', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (202, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ​ຂອງ​ບັນຊີ​ລູກ​ໜີ້​ອື່ນໆ', '498', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (203, 'ເງິນ​ແຮ ໜີ້​ສິນ​ໝູນວຽນ', '499', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (204, 'ບັນຊີ​ຕັດ​ແບ່ງ​ລາຍ​ຈ່າຍ​ໃນ​ປີ ​ເປັນ​​ໄລຍະ', '501', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (205, 'ບັນຊີ​ຕັດ​ແບ່ງ​ລາຍ​ຮັບ​ໃນ​ປີ ​ເປັນ​ໄລຍະ', '502', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (206, 'ລາຍ​ຈ່າຍ ທີ່​ຕ້ອງ​ແບ່ງ​ສ່ວນ ​ເປັນຫຼາຍປີ', '503', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (207, 'ຜິດ​ດ່ຽງ​ຈາກ​ການ​ແລກປ່ຽນ​ເງິນ - ຊັບ​ສິນ', '504', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (208, 'ຜິດ​ດ່ຽງ​ທີ່ມີການຄ້ຳປະກັນ - ຊັບ​ສິນ', '505', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (209, 'ຜິດ​ດ່ຽງ​ຈາກ​ການ​ແລກປ່ຽນ​ເງິນ - ໜີ້ສິນ', '506', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (210, 'ຜິດ​ດ່ຽງ​ຜິດດ່ຽງ ທີ່ມີການຄ້ຳປະກັນ - ໜີ້ສິນ', '507', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (211, 'ບັນຊີ​ຂ້າມຜ່ານ ຫຼື ລໍຖ້າ', '508', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (212, 'ພູດ​ສ່ວນ​ຮຸ້ນ​ຕົນເອງ​ໃນ​ວິ​ສາ​ຫະກິດ​ທີ່​ກ່ຽວ​', '511', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (213, 'ຮຸ້ນ​ຕົນເອງ', '512', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (214, 'ຮຸ້ນ', '513', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (215, 'ຮຸ້ນ​ຈົດ​ທະບຽນ', '514', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (216, 'ຮຸ້ນ ແລະ ຫຼັກ​ຊັບ​ອື່ນໆ ທີ່​ໃຫ້​ສິດ​ດ້ານ​ກຳມະ', '515', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (217, 'ພັນທະບັດທີ່​ບໍລິສັດ​​ໄດ້​ຈຳໜ່າຍ ​ແລະ ຊື້​ຄືນ', '516', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (218, 'ພັນທະບັດ', '517', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (219, 'ດອກ​ເບັ້ຽຄິດ​ໄລ່', '518', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (220, '​ເງິນ​ຕ້ອງ​ຈ່າຍ​ບ້ວງ​ຫຼັກ​ຊັບໝູນທຶນ​ທີ່​ບໍ່​ທ', '519', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (221, 'ພັນທະບັດ​ຄັງ​ເງິນ', '521', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (222, 'ພັນທະບັດ​ໄລຍະ​ສັ້ນ', '522', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (223, 'ພັນທະບັດ​ຈົດ​ທະບຽນ', '523', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (224, '​ຫຼັກຊັບໄລຍະສັ້ນ ​ອື່ນໆ', '525', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (225, '​ໜີ້​ຕ້ອງ​ຮັບປະ​ເພດ​ດຽວ​ກັນ', '527', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (226, 'ດອກ​ເບັ້ຽຄິດ​ໄລ່', '528', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (227, '​ເງິນ​ຕ້ອງ​ຈ່າຍ​ບ້ວງ​ຫຼັກ​ຊັບໝູນທຶນ​ທີ່​ບໍ່​ທ', '529', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (228, 'ເຄື່ອງມື​ເງິນສົດ​ລວມ', '53', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (229, 'ເງິນສົດ​ຍ່ອຍ​ລ່ວງ​ໜ້າ', '541', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (230, 'ເງິນ​ຝາກ​ຍ່ອຍ', '542', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (231, 'ເງິນ​ຝາກ​ທະນາຄານ - ​ເປັນ​ເງິນ​ກີບ', '551', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (232, 'ເງິນ​ຝາກ​ທະນາຄານ - ​ເປັນ​ເງິນຕາ', '552', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (233, 'ຄັງ​ເງິນ​ແຫ່ງ​ຊາດ ​ແລະ ສະ​ຖາ​ບັນ​ຂອງ​ລັດ', '555', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (234, 'ດອກ​ເບ້ຍ​ຄິດ​ໄລ່ - ​ຕ້ອງ​ຈ່າຍ', '556', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (235, 'ດອກ​ເບ້ຍ​ຄິດ​ໄລ່ - ຕ້ອງ​ຮັບ', '557', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (236, 'ອົງການ​ການ​ເງິນ​ອື່ນໆ', '558', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (237, 'ເງິນ​ຝາກ​ທະນາຄານ (​ເງິນ​ເບີກ​​ເກີນ​ບັນຊີ)', '559', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (238, 'ໃບຢັ້ງຢືນ​ການ​ຄ້າ ຮອດ​ກຳນົດ ​ແລະ ພວມ​ຮຽກ​ເກັບ', '561', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (239, 'ໃບ​ຢັ້ງຢືນ​ການ​ຄ້າ ມອບ​ຂາຍ​ຊຳລະ ຕາມ​ອັດຕາ​ຫຼຸ', '562', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (240, 'ແຊ໊ກ​ໃນ​ຄັງ', '564', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (241, 'ແຊ໊ກພວກ​ຮຽກ​ເກັບ', '565', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (242, 'ບັດສິນເຊື່ອທະນາຄານ ພວມຮຽກເກັບ', '566', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (243, 'ເອກະສານຢັ້ງຢືນມີຄ່າອື່ນໆ ພວມຮຽກເກັບ', '568', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (244, 'ເງິນສົດ - ກີບ ​ໃນ​ຄັງ', '571', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (245, 'ເງິນສົດ​ -​ເງິນຕາ ​ໃນຄັງ', '572', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (246, 'ເງິນສົດ​ກຳລັງ​ນຳ​ຝາກ - ທະນາຄານ​ບໍ່ທັນ​ໄດ້​ຈົດ', '575', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (247, 'ລ່ວງ​ໜ້າ - ພະນັກງານ​ຈັດ​ຊື້', '577', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (248, 'ມອບ​ເງິນ​ສົດ​ເຂົ້າ​ທະນາຄານ ຫຼື ຄັງ​ເງິນ​ແຫ່ງ​', '581', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (249, 'ຖອນ​ເງິນ​ຝາກ​ທະນາຄານ ຫຼື ຄັງ​ເງິນ​ແຫ່ງ​ຊາດ​ເຂ', '582', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (250, 'ໂອນ​ເງິນ​ຝາກ​ທະນາຄານ ຫາ ​ເງິນ​ຝາກ​ທະນາຄານ ຫຼື', '583', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (251, 'ຄ່າສູນ​ເສຍ​ມູນ​ຄ່າ​ໃບ​ຢັ້ງຢືນ​ຊັບ​ຂອງ​ທະນາຄານ', '591', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (252, 'ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ ບ້ວງ​ເງິນສົດ​ຍ່ອຍ, ​ເງິນ​', '594', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (253, 'ສ່ວນປ່ຽນແປງ ວັດຖຸ​ດິບ (ປູນຜົງ)', '601.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (254, 'ສ່ວນປ່ຽນແປງ ວັດຖຸ​ດິບ ', '601.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (255, 'ສ່ວນປ່ຽນແປງ ວັດຖຸ​ດິບ ()', '601.3', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (256, 'ສ່ວນປ່ຽນແປງ ວັດຖຸ​ປະກອບຊົມໃຊ້ ​ອື່ນໆ', '602.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (257, 'ສ່ວນປ່ຽນແປງ ວັດຖຸ​ປະກອບຊົມໃຊ້ ​ອື່ນໆ', '602.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (258, 'ສ່ວນ​ປ່ຽນ​ແປງ​ເຄື່ອງ​ໃນ​ສາງ (ກໍລະນີ​ບັນທຶກ​ເຄ', '603', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (259, 'ການ​ຄົ້ນຄວ້າ​ ​ແລະ ການ​ບໍ​ລິ​ການ', '604', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (260, 'ສ່ວນປ່ຽນແປງ ວັດຖຸ​ປະກອບ, ​ເຄື່ອງ​ກໍ່ສ້າງ', '605', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (261, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (262, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (263, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.3', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (264, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.4', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (265, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.5', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (266, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.6', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (267, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.7', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (268, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.8', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (269, 'ວັດຖຸ ​ແລະ ​ເຄື່ອງ​ໃຊ້​ຫ້ອງການ​ທີ່​ບໍ່​ເອົາ​ເ', '606.9', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (270, 'ສ່ວນປ່ຽນແປງ ສິນຄ້າໃນສາງ', '607', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (271, 'ຄ່າ​ໃຊ້​ຈ່າຍ​ສຳຮອງ (ກໍລະນີ​ບັນທຶກ​ເຄື່ອງ​ໃນ​ສ', '608', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (272, 'ສ່ວນ​ຫຼຸດ​ຕ່າງໆ ທີ່​ໄດ້​ຮັບ​ຈາ​ກກາ​ນຊື້', '609', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (273, 'ຈ້າງ​ທາງ​ນອກ​ຮັບ​ເໝົາ​ໂດຍ​ທົ່ວ​ໄປ', '611', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (274, 'ຄ່າ​ເຊົ່າ', '612', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (275, 'ຄ່າ​ໃຊ້​ຈ່າຍ​ໃນ​ການ​ເຊົ່າ ​ແລະ ການ​ຮ່ວມ​ກຳມະສ', '613', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (276, 'ຄ່າ​ບົວລະບັດ, ບຳລຸງ​ຮັກສາ​ ​ແລະ ສ້ອມ​ແປງ', '614', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (277, 'ຄ່າ​ທຳນຽມ​ປະກັນ​ໄພ', '615', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (278, 'ຄ່າ​ວິ​ໄຈ ​ແລະ ຄົ້ນ​ຄວ້າ', '616', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (279, 'ຄ່າ​ປະກອບ​ເອກະສານ ​ແລະ ອື່ນໆ', '617', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (280, 'ຄ່າບໍລິການອື່ນໆ', '618', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (281, 'ສ່ວນ​ຫຼຸດ​ຕ່າງໆ​ທີ່​ໄດ້​ຮັບ​ຈາກ​ທາງ​ນອກ', '619', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (282, 'ພະນັກງານ​ຈາກ​ທາງ​ນອກ​ວິ​ສາ​ຫະກິດ', '621.1', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (283, 'ພະນັກງານ​ຈາກ​ທາງ​ນອກ​ວິ​ສາ​ຫະກິດ (ອາກອນລາຍໄດ້', '621.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (284, 'ຄ່າ​ບໍລິການ, ຄ່າ​ທຳນຽມ​ວິຊາ​ການ ​ແລະ ຄ່າ​ນາຍ​', '622', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (285, 'ຄ່າ​ໂຄສະນາ, ລົງ​ຂ່າວ, ໜັງສືພິມ - ຈັດ​ພິມ, ປະຊ', '623', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (286, 'ຂົນ​ສົ່ງ', '624', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (287, 'ຄ່າ​ເດີນທາງ, ກອງ​ປະຊຸມ, ຮັບ​ແຂກ', '625', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (288, 'ຄ່າ​ໄປສະນີ ​ແລະ ​ໂທລະ​ຄົມມະນາຄົມ', '626', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (289, 'ຄ່າ​ທຳນຽມ​ທະນາຄານ ​ແລະ ຄ່າ​ໃຊ້​ຈ່າຍ​ປະ​ເພດ​ດຽ', '627', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (290, 'ວຽກ​ງານ​ທາງ​ການ, ທັດສະນະ​ສຶກສາ, ຝຶກ​ອົບ​ຮົມ ​', '628', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (291, 'ສ່ວນ​ຫຼຸດ​ຕ່າງໆທີ່​ໄດ້​ຮັບ​ໃນ​ການ​ບໍ​ລິ​ການ ຈ', '629', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (292, 'ຄ່າ​ທົດ​ແທນ​ແຮງ​ງານ​ໃຫ້​ພະນັກງານ', '631', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (293, 'ເງິນບຳ​ເນັດ ​ແລະ ຍ້ອງຍໍ', '632', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (294, 'ນະ​ໂຍບາຍ​ຕ່າງໆ', '633', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (295, 'ຜົນ​ປະ​ໂຫຍ​ດດ້ານ​ວັດຖຸ', '634', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (296, 'ເງິນ​ບຳລຸງ​ໃຫ້​ອົງການ​ປະກັນ​ສັງຄົມ', '635', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (297, 'ເງິນນະ​ໂຍບາຍ​ພັກຜ່ອນ ​ແລະ ສະຫວັດດີ​ການ', '636', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (298, 'ລາຍ​ຈ່າຍ​ສັງຄົມ​ອື່ນໆ', '637', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (299, 'ລາຍ​ຈ່າຍອື່ນໆ ​ໃຫ້​ພະນັກງານ', '638', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (300, 'ພາສີ​ຂາ​ເຂົ້າ', '641', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (301, 'ພາສີ​ຂາ​ອອກ', '642', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (302, 'ພາສີທີ່ດິນ', '643', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (303, 'ຄ່າ​ທຳນຽມ ​ແລະ ອາກອນ​ສະ​ແຕມ', '645', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (304, 'ອາກອນ​ຕົວ​ເລກ​ທຸລະ​ກິດ ຫຼື ອມພ ຫັກ​ບໍ່​ໄດ້', '646', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (305, 'ຄ່າປັບໃໝພາສີອາກອນ ແລະ ອື່ນໆ', '647', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (306, 'ອາກອນ ​ແລະ ຄ່າ​ທຳນຽມ​ອື່ນໆ', '648', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (307, 'ຄ່າ​ທຳນຽມ​ສຳ​ປະທານ ​ແລະ ລາຍ​ຈ່າຍ​ປະ​ເພດ​ດຽວ​ກ', '651', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (308, 'ມູນ​ຄ່າ​ຍັງເຫຼືອຂອງອົງປະກອບ​ຊັບ​ສົມບັດ​ຄົງ​ທີ', '652', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (309, 'ເບ້ຍ​ປະຊຸມ', '653', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (310, 'ຂາດທຶນ​ບ້ວງ​ໜີ້​ຮຽກ​ເກັບ​ບໍ່​ໄດ້', '654', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (311, 'ພູດ​ສ່ວນ​ຜົນ​ໄດ້​ຮັບ​ຈາກກິດ​ຈະ​ການ​ຮ່ວມ​ກັນ- ', '655', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (312, 'ຄ່າ​ປັບ​​ໃໝ, ​ໂທດ, ​ເງິນ​ຊ່ວຍ​ໜູນ​ທີ່​ໄດ້​ໃຫ້', '656', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (313, 'ລາຍ​ຈ່າຍ​ພິ​ເສດ ​ໃນ​ການ​ຄຸ້ມ​ຄອງ​ປົກກະຕິ', '657', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (314, 'ລາຍ​ຈ່າຍ​ອື່ນ​ໆ ​ໃນ​ການ​ຄຸ້ມ​ຄອງ​ປົກກະຕິ', '658', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (315, 'ລາຍ​ຈ່າຍ​ດອກ​ເບ້ຍ', '661', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (316, 'ສ່ວນ​ຫຼຸ​ດການ​ເງິນ', '662', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (317, 'ຂາດທຶນ​ຈາ​ກອັດຕາ​ແລກປ່ຽນ​ເງິນຕາ', '663', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (318, 'ຂາດທຶນ​ບ້ວງ​ໜີ້​ຕ້ອງ​ຮັບ​ທີ່​ຕິດ​ພັນ​ກັບ​ການ​', '664', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (319, 'ມູນ​ຄ່າ​ສ່ວນ​ຫຼຸດ ​ຈາກຫຼັກ​ຊັບ​ໝູ​ນທຶນ', '665', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (320, 'ມູນ​ຄ່າ​ສ່ວນ​ຫຼຸດ ​ເຄື່ອງມື​ການ​ເງິນ ​ແລະ ​ເຄ', '666', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (321, 'ລາຍ​ຈ່າຍ​ສຸດທິ ຈາກ​ການ​ຂາຍ​ໃບ​ຢັ້ງຢືນ​ຊັບ​ຝາກ', '667', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (322, 'ລາຍ​ຈ່າຍ​ການ​ເງິນ​ອື່ນ​ໆ', '668', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (323, 'ມູນ​ຄ່າ​ສ່ວນ​ເພີ້​ມ​ໃນ​ການ​ທົດ​ແທນ​ຄືນ', '669', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (324, 'ລາຍ​ຈ່າຍ​ພິ​ເສດ', '67', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (325, 'ຫັກ​ຄ່າ​ຫຼຸ້ຍ​ຫ້ຽນ ຊັບ​ສົມບັດ​ຄົງ​ທີ່​ ບໍ່​ມີ', '681', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (326, 'ຫັກ​ຄ່າ​ຫຼຸ້ຍ​ຫ້ຽນ ຊັບ​ສົມບັດ​ຄົງ​ທີ່​ ມີ​ຕົວ', '682', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (327, 'ຫັກ​ຄ່າ​ໃຊ້​ຈ່າຍ ບ້ວງ​ຊັບ​ສົມບັດ​ຄົງ​ທີ່ການ​ເ', '683', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (328, 'ຫັກ​ເງິນ​ແຮ ​ເພື່ອ​ລາຍ​ຈ່າຍ', '684', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (329, 'ຫັກ​ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ - ຊັບ​ສົມບັດ​ຄົງ​ທີ່ ', '685', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (330, 'ຫັກ​ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ - ​ເຄື່ອງ​ໃນ​ສາງ', '686', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (331, 'ຫັກ​ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ - ໜີ້​ຕ້ອງ​ຮັບ​ທວງ​ຍາ', '687', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (332, 'ຫັກ​ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ - ຊັບ​ສິນການ​ເງິນ', '688', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (333, 'ອາກອນ​ກຳ​ໄລ​ ທີ່​ອີງ​ໃສ່ກິດຈະການ​ປົກກະຕິ', '691', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (334, 'ອາກອນ​ຕ່ຳ​ສຸດ', '692', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (335, 'ລາຍ​ຈ່າຍ - ອາກອນ​ເຍື້ອນ​ຊຳລະ', '694', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (336, '​​ອາກອນ​ພູດ​ສ່ວນ​ແບ່ງ​ປັນໃຫ້​ພະນັກງານ', '696', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (337, 'ລາຍ​ຮັບ - ອາກອນ​ເຍື້ອນ​ຊຳ​ລະ', '699', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (338, 'ຂາຍ​ຜະລິດ​ຕະພັນ​ສຳ​ເລັດ​ຮູບ (ຄອນກຣີດ)', '701', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (339, 'ຂາຍ​ຜະລິດ​ຕະພັນ​ສຳ​ເລັດ​ຮູບ ()', '701.2', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (340, 'ຂາຍ​ຜະລິດ​ຕະພັນ​ລະຫວ່າງ​ກາງ', '702', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (341, 'ຂາຍ​ວຽການ​ກໍ່ສ້າງ', '704', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (342, 'ຂາຍ​ຜົນ​ການຄົ້ນຄວ້າ, ການ​ວິ​ໃຈ', '705', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (343, 'ຂາຍ​ກາ​ນບໍລິການ (ລົດສີດປູນ)', '706', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (344, 'ຂາຍ​ສິນຄ້າ', '707', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (345, 'ສ່ວນ​ຫຼຸດ​ຕ່າງໆ​ທີ່​ຫຼຸດ​ໃຫ້​ລູກ​ຄ້າ', '709', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (346, 'ຂາຍ​ເສດ​​ເຫຼືອ​ຜະລິດ​ຕະພັນ', '711', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (347, 'ຮັບ​ຄ່າ​ເຊົ່າ​ຕ່າງໆ', '712', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (348, 'ກຳ​ໄລ​ຈາກ​ເງິນ​ມັດ​ຈຳ​ເຄື່ອງ​ຫຸ້ມຫໍ່', '714', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (349, 'ຮັບ​ຄ່ານາຍໜ້າ', '715', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (350, 'ຄ່າຕ່າງ ​ແລະ ຄ່າ​ໃຊ້​ຈ່າຍ​ສຳຮອງ​ເອົາ​ນຳ​ລູກ​ຄ', '717', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (351, 'ລາຍຮັບຈາກກິດຈະການສຳຮອງອື່ນໆ', '718', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (352, 'ສ່ວນ​ຫຼຸດ​ລາຄາ ​ທີ່ໄດ້ຫຼຸດໃຫ້', '719', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (353, 'ສ່ວນ​ປ່ຽນ​ແປງ ​ເຄື່ອງ​ໃນ​ສາງ​ພວມ​ປຸງ​ແຕ່ງ', '723', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (354, 'ສ່ວນ​ປ່ຽນ​​ແປງ ການ​ບໍລິການ​ພວມ​ດຳ​ເນີນ', '724', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (355, 'ສ່ວນປ່ຽນແປງຜະລິດຕະພັນສຳເລັດຮູບໃນ​ສາງ', '725', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (356, 'ຊັບ​ສິນຄົງ​ທີ່ບໍ່​ມີ​ຕົວ​ຕົນ', '730', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (357, 'ຊັບ​ສິນຊັບ​ທີ່​ມີ​ຕົວ​ຕົນ', '731', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (358, 'ສິນຄ້າ - ການ​ບໍລິການ ', '733', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (359, '​ເງິນ​ຊ່ວຍ​ໜູນ ດຸ່ນດ່ຽງ', '741', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (360, '​ເງິນ​ຊ່ວຍ​ໜູນ ​ໃນ​ການ​ທຸລະ​ກິດ', '748', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (361, 'ຄ່າ​ທຳນຽມ​ສຳປະທານ ​ແລະ ຄ່າ​ທຳນຽມ ປະ​ເພດ​ດຽວ​ກ', '751', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (362, 'ລາຍຮັບ ຈາກ​ການ​ຂາຍ​ຊັບສົມບັດ​ຄົງ​ທີ່ໆ​ບໍ່​ແມ່', '752', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (363, 'ເບ້ຍ​ປະຊຸມ ​ແລະ ຄ່າ​ທົດ​ແທນ​ຜູ້​ບໍລິຫານ, ຜູ້​', '753', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (364, 'ພູດ​ສ່ວນ​ເງິນ​ຊ່ວຍ​ໜູນ​ກໍ່ສ້າງ​ພື້ນຖານ ທີ່​​ໂ', '754', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (365, 'ພູດ​ສ່ວນ​ຜົນ​ໄດ້​ຮັບ ຈາກ​ກິດ​ຈະ​ການ​ຮ່ວມ - ກຳ', '755', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (366, 'ເງິນ​ບໍ​ລິ​ຈາກ​ທີ່​ໄດ້​ຮັບ, ໜີ້​ທີ່​ຕ້ອງ​ໄດ້​', '756', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (367, 'ລາຍ​ຮັບ​ພິເສດ ບ້ວງ​ການ​ຄຸ້ມ​ຄອງ', '757', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (368, 'ລາຍ​ຮັບ​ອື່ນໆ ຈາກ​ການ​ຄຸ້ມ​ຄອງ - ບໍລິຫານ​ປົກກ', '758', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (369, 'ລາຍ​ຮັບ ຈາກການລົງ​ທຶນ', '761', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (370, 'ສ່ວນ​ຫຼຸດ ຮັບ​ຈາກ​ການ​ຊຳລະ​ເງິນ', '762', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (371, 'ກຳ​ໄລ​ຈາກອັດຕາ​ແລກປ່ຽນ​ເງິນ', '763', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (372, 'ລາຍ​ຮັບ​ຈາກຊັບ​ສົມບັດ​ຄົງ​ທີ່​ການ​ເງິນ​ອື່ນໆ', '764', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (373, 'ມູນ​ຄ່າ​ສ່ວນ​ເກີນ ​​ບ້ວງຫຼັກຊັບລົງທຶນ', '765', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (374, 'ມູນ​ຄ່າ​ສ່ວນ​ເກີນ ​ເຄື່ອງມື​ການ​ເງິນ ​ແລະ ​ເຄ', '766', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (375, 'ລາຍ​ຮັບ​ສຸດທິ ຈາ​ກການ​ຂາຍ​ຫຼັກ​ຊັບໝູນທຶນ', '767', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (376, 'ລາຍ​ຮັບ​ການ​ເງິນ​ອື່ນໆ', '768', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (377, 'ລາຍ​ຮັບ​ພິ​ເສດ​ອື່ນໆ', '77', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (378, 'ເກັບ​ຄືນ ຄ່າ​ຫຼຸ້ຍ​ຫ້ຽນ - ຊັບ​ສົມບັດ​ຄົງ​ທີ່​', '781', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (379, 'ເກັບ​ຄືນ ຄ່າ​ຫຼຸ້ຍ​ຫ້ຽນ - ຊັບ​ສົມບັດ​ຄົງ​ທີ່​', '782', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (380, 'ເກັບ​ຄືນ ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ - ​ຊັບ​ສົມບັດ​ຄົ', '783', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (381, 'ເກັບ​ຄືນ​ເງິນ​ແຮ ​ເພື່ອ​ລາຍ​ຈ່າຍ', '784', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (382, '​ເ​ກັບ​ຄືນ ຄ່າສູນ​ເສຍ​ມູນ​ຄ່າ - ເຄື່ອງ​ໃນ​ສາງ', '785', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (383, 'ເກັບ​ຄືນ ຄ່າ​ສູນ​ເສຍ​ມູນ​ຄ່າ - ໜີ້​ຕ້ອງ​ຮັບ​ທ', '786', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (384, 'ເກັບຄືນ ຄ່າສູນເສັຽມູນຄ່າຫຼັກຊັບ', '787', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (385, 'ເກັບຄືນ ຄ່າສູນເສັຍມູນຄ່າ ຊັບສິນການເງິນ', '788', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (386, 'ໂອນລາຍ​ຈ່າຍ ​ໃນ​ການ​ທຸລະ​ກິດ', '791', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (387, 'ໂອນລາຍ​ຈ່າຍ ການ​ເງິນ', '796', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (388, 'ໂອນລາຍ​ຈ່າຍ ພິ​ເສດ', '797', 'active');
INSERT INTO `tb_code_accounting` (`id`, `name`, `code`, `state`) VALUES (390, 'ຄັງເງິນຍ່ອຍ ( ຝ່າຍຄຸ້ມຄອງໂຄງການ )', '541.01', 'active');


#
# TABLE STRUCTURE FOR: tb_deposit_accounts
#

DROP TABLE IF EXISTS `tb_deposit_accounts`;

CREATE TABLE `tb_deposit_accounts` (
  `de_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(75) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`de_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_deposit_accounts` (`de_id`, `Name`, `Status`) VALUES (1, '1102-005-332-53', 'active');
INSERT INTO `tb_deposit_accounts` (`de_id`, `Name`, `Status`) VALUES (2, '166-2356-25-3659-36', 'active');


#
# TABLE STRUCTURE FOR: tb_finance_in
#

DROP TABLE IF EXISTS `tb_finance_in`;

CREATE TABLE `tb_finance_in` (
  `finance_in_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ticket_No` varchar(25) DEFAULT NULL,
  `tital` varchar(100) NOT NULL,
  `header` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Rate` varchar(10) NOT NULL,
  `text_money` varchar(50) NOT NULL,
  `type_money` int(11) NOT NULL,
  `ticket_total` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_Apply` varchar(30) DEFAULT NULL,
  `Date_Apply` datetime DEFAULT NULL,
  PRIMARY KEY (`finance_in_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_finance_in_detell
#

DROP TABLE IF EXISTS `tb_finance_in_detell`;

CREATE TABLE `tb_finance_in_detell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `finance_in_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(15) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_finance_out
#

DROP TABLE IF EXISTS `tb_finance_out`;

CREATE TABLE `tb_finance_out` (
  `finance_out_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ticket_No` varchar(25) NOT NULL,
  `tital` varchar(100) NOT NULL,
  `header` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Rate` varchar(10) NOT NULL,
  `text_money` varchar(50) NOT NULL,
  `type_money` int(11) NOT NULL,
  `ticket_total` int(11) NOT NULL,
  `invoice_vendor_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_Apply` varchar(30) DEFAULT NULL,
  `Date_Apply` datetime DEFAULT NULL,
  PRIMARY KEY (`finance_out_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_finance_out_detell
#

DROP TABLE IF EXISTS `tb_finance_out_detell`;

CREATE TABLE `tb_finance_out_detell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `finance_out_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(15) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_invoice_vendor
#

DROP TABLE IF EXISTS `tb_invoice_vendor`;

CREATE TABLE `tb_invoice_vendor` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_name` varchar(20) NOT NULL,
  `Date` datetime NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `ticket_total` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_invoice_vendor_detell
#

DROP TABLE IF EXISTS `tb_invoice_vendor_detell`;

CREATE TABLE `tb_invoice_vendor_detell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_money_go
#

DROP TABLE IF EXISTS `tb_money_go`;

CREATE TABLE `tb_money_go` (
  `money_go_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`money_go_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `tb_money_go` (`money_go_id`, `Name`, `Status`) VALUES (1, 'ຄັງເງີນສົດ', 'active');
INSERT INTO `tb_money_go` (`money_go_id`, `Name`, `Status`) VALUES (2, 'ຖອນເງີນສົດ', 'active');
INSERT INTO `tb_money_go` (`money_go_id`, `Name`, `Status`) VALUES (3, 'ມອບເຊັກ', 'active');
INSERT INTO `tb_money_go` (`money_go_id`, `Name`, `Status`) VALUES (4, 'ໂອນເງີນ', 'active');


#
# TABLE STRUCTURE FOR: tb_money_type
#

DROP TABLE IF EXISTS `tb_money_type`;

CREATE TABLE `tb_money_type` (
  `money_id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`money_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `tb_money_type` (`money_id`, `Name`, `Status`) VALUES (1, 'ຄັງເງີນສົດ', 'active');
INSERT INTO `tb_money_type` (`money_id`, `Name`, `Status`) VALUES (2, 'ເງີນແຮລ່ວງໜ້າ', 'active');
INSERT INTO `tb_money_type` (`money_id`, `Name`, `Status`) VALUES (3, 'ຄັງເງີນສົດຍ່ອຍ', 'active');
INSERT INTO `tb_money_type` (`money_id`, `Name`, `Status`) VALUES (4, 'ອື່ນໆ', 'active');


#
# TABLE STRUCTURE FOR: tb_payment_type
#

DROP TABLE IF EXISTS `tb_payment_type`;

CREATE TABLE `tb_payment_type` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tb_payment_type` (`pay_id`, `code`, `Name`, `Status`) VALUES (1, 'PT02', 'ຈ່າຍຜ່ານທະນາຄານ', 'active');
INSERT INTO `tb_payment_type` (`pay_id`, `code`, `Name`, `Status`) VALUES (2, 'PT01', 'ຈ່າຍເງີນສົດ', 'active');
INSERT INTO `tb_payment_type` (`pay_id`, `code`, `Name`, `Status`) VALUES (3, 'PT03', 'ຈ່າຍ VISA', 'active');


#
# TABLE STRUCTURE FOR: tb_project
#

DROP TABLE IF EXISTS `tb_project`;

CREATE TABLE `tb_project` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tb_project` (`pro_id`, `code`, `Name`, `Status`) VALUES (1, 'SK02', 'ໂຄງການທີ 2', 'active');
INSERT INTO `tb_project` (`pro_id`, `code`, `Name`, `Status`) VALUES (2, 'SK01', 'ໂຄງການທີ່ 1', 'active');
INSERT INTO `tb_project` (`pro_id`, `code`, `Name`, `Status`) VALUES (3, 'SK03', 'ໂຄງການທີ 3', 'active');


#
# TABLE STRUCTURE FOR: tb_rate
#

DROP TABLE IF EXISTS `tb_rate`;

CREATE TABLE `tb_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Rate_Name` varchar(25) NOT NULL,
  `Rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tb_rate` (`id`, `Rate_Name`, `Rate`) VALUES (1, 'ກີບ', 1);
INSERT INTO `tb_rate` (`id`, `Rate_Name`, `Rate`) VALUES (2, 'ບາດ', 250);
INSERT INTO `tb_rate` (`id`, `Rate_Name`, `Rate`) VALUES (3, 'ໂດລາ', 8000);


#
# TABLE STRUCTURE FOR: tb_sub_code
#

DROP TABLE IF EXISTS `tb_sub_code`;

CREATE TABLE `tb_sub_code` (
  `sub_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`sub_code_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tb_sub_code` (`sub_code_id`, `code`, `Name`, `Status`) VALUES (1, 'CS01', 'CSC-1', 'active');
INSERT INTO `tb_sub_code` (`sub_code_id`, `code`, `Name`, `Status`) VALUES (2, 'CS02', 'CSC-2', 'active');
INSERT INTO `tb_sub_code` (`sub_code_id`, `code`, `Name`, `Status`) VALUES (3, 'CS03', 'CSC-3', 'active');


#
# TABLE STRUCTURE FOR: tb_users
#

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(25) DEFAULT NULL,
  `user_phone` varchar(13) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `Date_login` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_users` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_address`, `username`, `password`, `permission`, `Date_login`) VALUES (1, 'ໂຊກໄຊ', 'ແກ້ວພິລາວັນ', '8552077452952', 'ບ້ານ ດອນກອຍ ເມືອງສີສັດຕະນາກ ນະຄອນຫຼວງວຽງຈັນ', 'Admin', 'QWRtaW4=', 'Admin', '2020-01-05');
INSERT INTO `tb_users` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_address`, `username`, `password`, `permission`, `Date_login`) VALUES (2, 'ແມັກກີ້', 'ວັງວຽງ', '7777777', 'ວັງວຽງ', 'max', 'MTIzNDU=', 'Employee', NULL);


#
# TABLE STRUCTURE FOR: tb_vendor
#

DROP TABLE IF EXISTS `tb_vendor`;

CREATE TABLE `tb_vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_phone` varchar(13) NOT NULL,
  `vendor_address` varchar(100) NOT NULL,
  `vendor_credit` varchar(50) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `tb_vendor` (`vendor_id`, `vendor_name`, `vendor_phone`, `vendor_address`, `vendor_credit`) VALUES (4, 'test', '45122', 'sdfsdfsdfsd', '15');


#
# TABLE STRUCTURE FOR: tb_voucher
#

DROP TABLE IF EXISTS `tb_voucher`;

CREATE TABLE `tb_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_no` varchar(25) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `finance_in_id` int(11) NOT NULL,
  `finance_out_id` int(11) NOT NULL,
  `de_id` int(11) NOT NULL,
  `money_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `template` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`voucher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_voucher_detell
#

DROP TABLE IF EXISTS `tb_voucher_detell`;

CREATE TABLE `tb_voucher_detell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `sub_code_id` int(11) NOT NULL,
  `text` varchar(150) NOT NULL,
  `credit` int(11) NOT NULL,
  `credit_total` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `debit_total` int(11) NOT NULL,
  `old_total` int(11) NOT NULL,
  `Rate` double NOT NULL,
  `Rate_Name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

