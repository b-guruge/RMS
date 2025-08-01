/*
Navicat MySQL Data Transfer

Source Server         : LOCAL_MYSQL
Source Server Version : 100410
Source Host           : localhost:3306
Source Database       : catsys_ats

Target Server Type    : MYSQL
Target Server Version : 100410
File Encoding         : 65001

Date: 2020-09-08 16:27:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for asset_details
-- ----------------------------
DROP TABLE IF EXISTS `asset_details`;
CREATE TABLE `asset_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `asset_type` int(11) DEFAULT NULL,
  `pallet_chit_no` int(11) DEFAULT NULL,
  `tile_model` int(11) DEFAULT NULL,
  `caliper` varchar(255) DEFAULT NULL,
  `shade` int(11) DEFAULT NULL COMMENT 'color',
  `boxes` int(11) DEFAULT NULL,
  `lot_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of asset_details
-- ----------------------------
INSERT INTO `asset_details` VALUES ('1', '1', '1', '123', '1', 'test caliper 1', '1', '6', '222');
INSERT INTO `asset_details` VALUES ('2', '2', '1', '124', '1', 'test caliper 2', '1', '5', '223');
INSERT INTO `asset_details` VALUES ('3', '3', '1', '125', '1', 'test caliper 1', '1', '6', '224');
INSERT INTO `asset_details` VALUES ('4', '4', '1', '126', '2', 'test caliper 3', '2', '6', '225');
INSERT INTO `asset_details` VALUES ('5', '5', '1', '127', '1', 'test caliper 3', '3', '5', '226');
INSERT INTO `asset_details` VALUES ('6', '6', '1', '128', '2', 'test caliper 3', '2', '6', '227');

-- ----------------------------
-- Table structure for asset_details_ey
-- ----------------------------
DROP TABLE IF EXISTS `asset_details_ey`;
CREATE TABLE `asset_details_ey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `asset_class` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `asset_no` varchar(255) DEFAULT NULL,
  `serial_no` varchar(255) DEFAULT NULL,
  `acquisition_date` varchar(40) DEFAULT NULL,
  `acquisition_cost` decimal(10,2) DEFAULT NULL,
  `depriciation_method` int(11) DEFAULT NULL,
  `useful_life` int(11) DEFAULT NULL,
  `salvage_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of asset_details_ey
-- ----------------------------
INSERT INTO `asset_details_ey` VALUES ('1', '13', '1', '3', '20001', 'TBL0001', '2020-10-05', '6500.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('2', '14', '1', '3', '20002', 'TBL0002', '2020-08-10', '7000.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('3', '15', '1', '4', '20003', 'TBL0003', '2020-08-21', '7000.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('4', '16', '1', '5', '20004', 'TBL0004', '2020-08-21', '8000.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('5', '17', '1', '6', '20005', 'TBL0005', '2020-08-22', '7000.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('6', '18', '1', '3', '30001', 'CHR0001', '2020-05-20', '2500.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('7', '19', '1', '4', '30002', 'CHR0002', '2020-05-20', '2500.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('8', '20', '1', '4', '30003', 'CHR0003', '2020-05-21', '3000.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('9', '21', '1', '5', '30004', 'CHR0004', '2020-05-10', '2500.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('10', '22', '1', '6', '30005', 'CHR0005', '2020-06-24', '1550.00', '1', '3', null);
INSERT INTO `asset_details_ey` VALUES ('11', '23', '1', '3', '40001', 'AC0001', '2020-08-10', '54600.00', '1', '5', null);
INSERT INTO `asset_details_ey` VALUES ('12', '24', '1', '4', '40002', 'AC0002', '2020-08-15', '55000.00', '1', '5', null);
INSERT INTO `asset_details_ey` VALUES ('13', '25', '1', '5', '40003', 'AC0003', '2020-08-21', '48500.00', '1', '5', null);
INSERT INTO `asset_details_ey` VALUES ('14', '26', '1', '5', '40004', 'AC0004', '2020-08-22', '49000.00', '1', '5', null);
INSERT INTO `asset_details_ey` VALUES ('15', '27', '1', '6', '40005', 'AC0005', '2020-04-20', '60000.00', '1', '5', null);
INSERT INTO `asset_details_ey` VALUES ('16', '28', '1', '3', '50001', 'MCN0001', '2019-05-10', '1500000.00', '1', '10', null);
INSERT INTO `asset_details_ey` VALUES ('17', '29', '1', '4', '50002', 'MCN0002', '2019-06-10', '1000000.00', '1', '10', null);
INSERT INTO `asset_details_ey` VALUES ('18', '30', '1', '5', '50003', 'MCN0003', '2019-06-10', '1000000.00', '1', '10', null);
INSERT INTO `asset_details_ey` VALUES ('19', '31', '1', '6', '50004', 'MCN0004', '2019-06-12', '1550000.00', '1', '10', null);
INSERT INTO `asset_details_ey` VALUES ('20', '32', '1', '6', '50005', 'MCN0005', '2016-06-10', '1000000.00', '1', '10', null);
INSERT INTO `asset_details_ey` VALUES ('22', '34', '1', '3', '600001', 'MNTR0001', '2020-09-08', '22000.00', '1', '1', null);
INSERT INTO `asset_details_ey` VALUES ('23', '35', '1', '4', '700001', 'AST70001', '2020-09-08', '5000.00', '1', '1', null);

-- ----------------------------
-- Table structure for asset_details_sunshine
-- ----------------------------
DROP TABLE IF EXISTS `asset_details_sunshine`;
CREATE TABLE `asset_details_sunshine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT '',
  `color` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of asset_details_sunshine
-- ----------------------------
INSERT INTO `asset_details_sunshine` VALUES ('1', '11', 'DG001', '4');
INSERT INTO `asset_details_sunshine` VALUES ('2', '12', 'DG002', '4');

-- ----------------------------
-- Table structure for asset_master
-- ----------------------------
DROP TABLE IF EXISTS `asset_master`;
CREATE TABLE `asset_master` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_name` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `tag_id` int(11) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `barcode_id` int(11) DEFAULT NULL,
  `in_date` varchar(20) DEFAULT NULL,
  `in_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of asset_master
-- ----------------------------
INSERT INTO `asset_master` VALUES ('1', 'Demo Pallet 1', 'Testing Purpose', '1', '1', null, null, null);
INSERT INTO `asset_master` VALUES ('2', 'Demo Pallet 2', 'Testing Purpose', '2', '1', null, null, null);
INSERT INTO `asset_master` VALUES ('3', 'Demo Pallet 3', 'Testing Purpose', '3', '1', null, null, null);
INSERT INTO `asset_master` VALUES ('4', 'Demo Pallet 4', 'Testing Purpose', '4', '1', null, null, null);
INSERT INTO `asset_master` VALUES ('5', 'Demo Pallet 5', 'Testing Purpose', '5', '1', null, null, null);
INSERT INTO `asset_master` VALUES ('6', 'Demo Pallet 6', 'Testing Purpose', '6', '1', null, null, null);
INSERT INTO `asset_master` VALUES ('7', 'Demo Pallet 7', 'Testing Purpose', null, '1', null, null, null);
INSERT INTO `asset_master` VALUES ('8', 'Demo Pallet 8', 'Testing Purpose', null, '1', null, null, null);
INSERT INTO `asset_master` VALUES ('9', 'Demo Pallet 9', 'Testing Purpose', null, '1', null, null, null);
INSERT INTO `asset_master` VALUES ('10', 'Demo Pallet 10', 'Testing Purpose', null, '1', null, null, null);
INSERT INTO `asset_master` VALUES ('11', 'Digene Card', 'Test', null, '2', null, null, null);
INSERT INTO `asset_master` VALUES ('12', 'Digene Bottle', 'Test', null, '2', null, null, null);
INSERT INTO `asset_master` VALUES ('13', 'Demo Table 1', 'Testing Table 1', null, '3', '1', null, null);
INSERT INTO `asset_master` VALUES ('14', 'Demo Table 2', 'Testing Table 2', null, '3', '2', null, null);
INSERT INTO `asset_master` VALUES ('15', 'Demo Table 3', 'Testing Table 3', null, '3', '3', null, null);
INSERT INTO `asset_master` VALUES ('16', 'Demo Table 4', 'Testing Table 4', null, '3', '4', null, null);
INSERT INTO `asset_master` VALUES ('17', 'Demo Table 5', 'Testing Table 5', null, '3', '5', null, null);
INSERT INTO `asset_master` VALUES ('18', 'Demo Chair 1', 'Testing Chair 1', null, '3', '7', null, null);
INSERT INTO `asset_master` VALUES ('19', 'Demo Chair 2', 'Testing Chair 2', null, '3', '8', null, null);
INSERT INTO `asset_master` VALUES ('20', 'Demo Chair 3', 'Testing Chair 3', null, '3', '9', null, null);
INSERT INTO `asset_master` VALUES ('21', 'Demo Chair 4', 'Testing Chair 4', null, '3', '10', null, null);
INSERT INTO `asset_master` VALUES ('22', 'Demo Chair 5', 'Testing Chair 5', null, '3', '11', null, null);
INSERT INTO `asset_master` VALUES ('23', 'Demo AC Unit 1', 'Testing AC 1', null, '3', '12', null, null);
INSERT INTO `asset_master` VALUES ('24', 'Demo AC Unit 2', 'Testing AC 2', null, '3', '13', null, null);
INSERT INTO `asset_master` VALUES ('25', 'Demo AC Unit 3', 'Testing AC 3', null, '3', '14', null, null);
INSERT INTO `asset_master` VALUES ('26', 'Demo AC Unit 4', 'Testing AC 4', null, '3', '15', null, null);
INSERT INTO `asset_master` VALUES ('27', 'Demo AC Unit 5', 'Testing AC 5', null, '3', '16', null, null);
INSERT INTO `asset_master` VALUES ('28', 'Demo Machine 1', 'Testing Machine 1', null, '3', '17', null, null);
INSERT INTO `asset_master` VALUES ('29', 'Demo Machine 2', 'Testing Machine 2', null, '3', '18', null, null);
INSERT INTO `asset_master` VALUES ('30', 'Demo Machine 3', 'Testing Machine 3', null, '3', '19', null, null);
INSERT INTO `asset_master` VALUES ('31', 'Demo Machine 4', 'Testing Machine 4', null, '3', '20', null, null);
INSERT INTO `asset_master` VALUES ('32', 'Demo Machine 5', 'Testing Machine 5', null, '3', '21', null, null);
INSERT INTO `asset_master` VALUES ('34', 'Test Monitor', 'Testing asset', null, '3', '29', '2020-09-08', '16:16:33');
INSERT INTO `asset_master` VALUES ('35', 'Test Asset 7', 'testing', null, '3', '30', '2020-09-08', '16:24:36');

-- ----------------------------
-- Table structure for audit_header
-- ----------------------------
DROP TABLE IF EXISTS `audit_header`;
CREATE TABLE `audit_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_name` varchar(255) DEFAULT NULL,
  `initiated_by` varchar(255) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `start_time` varchar(10) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  `completed_flag` int(11) DEFAULT 0,
  `company` int(11) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `end_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of audit_header
-- ----------------------------
INSERT INTO `audit_header` VALUES ('23', 'test audit 9', 'Buddhija', '2020-09-02', '15:04:38', '1', '1', '3', null, null);
INSERT INTO `audit_header` VALUES ('24', 'test 11', 'buddhija', '2020-09-07', '13:25:31', '1', '1', '3', '2020-09-07', '13:31:00');

-- ----------------------------
-- Table structure for audit_locations
-- ----------------------------
DROP TABLE IF EXISTS `audit_locations`;
CREATE TABLE `audit_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  `completed_flag` int(11) DEFAULT 0,
  `ongoing_flag` int(11) DEFAULT 0,
  `started_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of audit_locations
-- ----------------------------
INSERT INTO `audit_locations` VALUES ('13', '23', '3', '1', '1', '0', '5');
INSERT INTO `audit_locations` VALUES ('14', '23', '4', '1', '1', '0', '5');
INSERT INTO `audit_locations` VALUES ('15', '24', '3', '1', '1', '0', null);
INSERT INTO `audit_locations` VALUES ('16', '24', '4', '1', '1', '0', null);

-- ----------------------------
-- Table structure for audit_location_bl
-- ----------------------------
DROP TABLE IF EXISTS `audit_location_bl`;
CREATE TABLE `audit_location_bl` (
  `bl_id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_id` int(11) DEFAULT NULL,
  `barcode_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `scanned_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`bl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of audit_location_bl
-- ----------------------------
INSERT INTO `audit_location_bl` VALUES ('7', '23', '1', '3', '5');

-- ----------------------------
-- Table structure for audit_location_nbl
-- ----------------------------
DROP TABLE IF EXISTS `audit_location_nbl`;
CREATE TABLE `audit_location_nbl` (
  `nbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_id` int(11) DEFAULT NULL,
  `barcode_id` int(11) DEFAULT NULL,
  `found_location_id` int(11) DEFAULT NULL,
  `scanned_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`nbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of audit_location_nbl
-- ----------------------------
INSERT INTO `audit_location_nbl` VALUES ('9', '23', '4', '3', '5');
INSERT INTO `audit_location_nbl` VALUES ('10', '23', '5', '3', '5');
INSERT INTO `audit_location_nbl` VALUES ('11', '23', '8', '3', '5');
INSERT INTO `audit_location_nbl` VALUES ('13', '23', '9', '3', '5');

-- ----------------------------
-- Table structure for audit_location_nti
-- ----------------------------
DROP TABLE IF EXISTS `audit_location_nti`;
CREATE TABLE `audit_location_nti` (
  `nti_id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_id` int(11) DEFAULT NULL,
  `barcode_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`nti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of audit_location_nti
-- ----------------------------

-- ----------------------------
-- Table structure for audit_users
-- ----------------------------
DROP TABLE IF EXISTS `audit_users`;
CREATE TABLE `audit_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of audit_users
-- ----------------------------
INSERT INTO `audit_users` VALUES ('4', '23', '6');
INSERT INTO `audit_users` VALUES ('5', '24', '6');

-- ----------------------------
-- Table structure for barcode_data_ey
-- ----------------------------
DROP TABLE IF EXISTS `barcode_data_ey`;
CREATE TABLE `barcode_data_ey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  `added_date` varchar(20) DEFAULT NULL,
  `addded_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of barcode_data_ey
-- ----------------------------
INSERT INTO `barcode_data_ey` VALUES ('1', 'EY100001', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('2', 'EY100002', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('3', 'EY100003', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('4', 'EY100004', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('5', 'EY100005', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('7', 'EY110001', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('8', 'EY110002', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('9', 'EY110003', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('10', 'EY110004', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('11', 'EY110005', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('12', 'EY120001', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('13', 'EY120002', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('14', 'EY120003', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('15', 'EY120004', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('16', 'EY120005', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('17', 'EY130001', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('18', 'EY130002', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('19', 'EY130003', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('20', 'EY130004', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('21', 'EY130005', null, '1', null, null);
INSERT INTO `barcode_data_ey` VALUES ('29', 'EY600001', null, '1', '2020-09-08', '16:16:33');
INSERT INTO `barcode_data_ey` VALUES ('30', 'EY700001', null, '1', '2020-09-08', '16:24:36');

-- ----------------------------
-- Table structure for barcode_print_sunshine
-- ----------------------------
DROP TABLE IF EXISTS `barcode_print_sunshine`;
CREATE TABLE `barcode_print_sunshine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `grn_id` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `auto_flag` int(11) DEFAULT NULL,
  `batch_no` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `start_sequence` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `print_date` varchar(20) DEFAULT '',
  `print_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of barcode_print_sunshine
-- ----------------------------
INSERT INTO `barcode_print_sunshine` VALUES ('1', '1', '1', '0', '12345', '0', '6698', '150.00', '101', '10', '2020-08-12', '10:27:00');
INSERT INTO `barcode_print_sunshine` VALUES ('2', '2', '1', '0', '22545', '0', '8921', '350.00', '200', '20', '2020-08-12', '10:27:00');
INSERT INTO `barcode_print_sunshine` VALUES ('38', '3', '0', '0', 'admin', '0', '65465', '500.00', '200', '2', '2020-08-13', '13:01:47');
INSERT INTO `barcode_print_sunshine` VALUES ('40', '1', '11', '1', 'DG001', '1', 'batch1', '150.00', '200', '2', '2020-08-14', '13:51:17');
INSERT INTO `barcode_print_sunshine` VALUES ('41', '2', '11', '1', 'DG001', '1', 'batch1', '150.00', '100', '2', '2020-08-14', '13:51:58');
INSERT INTO `barcode_print_sunshine` VALUES ('42', '4', '0', '0', 'test', '0', '3569', '100.00', '200', '2', '2020-08-14', '13:53:52');
INSERT INTO `barcode_print_sunshine` VALUES ('43', '3', '11', '1', 'DG001', '1', 'batch1', '150.00', '300', '2', '2020-08-14', '13:57:09');
INSERT INTO `barcode_print_sunshine` VALUES ('44', '4', '11', '1', 'DG001', '1', 'batch1', '150.00', '452', '200', '2020-08-14', '13:57:58');
INSERT INTO `barcode_print_sunshine` VALUES ('45', '5', '11', '1', 'DG001', '1', 'batch1', '150.00', '1324', '200', '2020-08-14', '13:58:24');
INSERT INTO `barcode_print_sunshine` VALUES ('46', '6', '11', '1', 'DG001', '1', 'batch1', '150.00', '12345', '5', '2020-08-14', '14:00:07');
INSERT INTO `barcode_print_sunshine` VALUES ('47', '7', '11', '1', 'DG001', '1', 'batch1', '150.00', '4568', '200', '2020-08-14', '14:01:09');
INSERT INTO `barcode_print_sunshine` VALUES ('48', '8', '11', '2', 'DG001', '1', 'batch2', '150.00', '5698', '200', '2020-08-14', '14:01:50');

-- ----------------------------
-- Table structure for color_master
-- ----------------------------
DROP TABLE IF EXISTS `color_master`;
CREATE TABLE `color_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of color_master
-- ----------------------------
INSERT INTO `color_master` VALUES ('1', 'red', null, '1', null, null);
INSERT INTO `color_master` VALUES ('2', 'black', null, '1', null, null);
INSERT INTO `color_master` VALUES ('3', 'white', null, '1', null, null);
INSERT INTO `color_master` VALUES ('4', 'pink', null, '1', null, null);
INSERT INTO `color_master` VALUES ('5', 'yellow', null, '1', null, null);

-- ----------------------------
-- Table structure for company_master
-- ----------------------------
DROP TABLE IF EXISTS `company_master`;
CREATE TABLE `company_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of company_master
-- ----------------------------
INSERT INTO `company_master` VALUES ('1', 'MacTiles', null, null, '1');
INSERT INTO `company_master` VALUES ('2', 'Sunshine Healthcare Pvt Ltd.', null, null, '1');
INSERT INTO `company_master` VALUES ('3', 'Earnst & Young', null, null, '1');

-- ----------------------------
-- Table structure for company_wise_procedures
-- ----------------------------
DROP TABLE IF EXISTS `company_wise_procedures`;
CREATE TABLE `company_wise_procedures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `string` varchar(255) DEFAULT NULL,
  `procedure` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of company_wise_procedures
-- ----------------------------
INSERT INTO `company_wise_procedures` VALUES ('1', '2', 'GRN_SAVE', 'save_grn_sunshine', '1');
INSERT INTO `company_wise_procedures` VALUES ('2', '3', 'GRN_SAVE', 'save_grn_ey', '1');

-- ----------------------------
-- Table structure for company_wise_tables
-- ----------------------------
DROP TABLE IF EXISTS `company_wise_tables`;
CREATE TABLE `company_wise_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `string` varchar(255) DEFAULT '',
  `table_name` varchar(255) DEFAULT '',
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of company_wise_tables
-- ----------------------------
INSERT INTO `company_wise_tables` VALUES ('1', '2', 'ASSET_DETAILS', 'asset_details_sunshine', '1');
INSERT INTO `company_wise_tables` VALUES ('2', '2', 'BARCODE_PRINT', 'barcode_print_sunshine', '1');
INSERT INTO `company_wise_tables` VALUES ('3', '2', 'GRN_DETAILS', 'grn_details_sunshine', '1');
INSERT INTO `company_wise_tables` VALUES ('4', '3', 'BARCODE_DETAILS', 'barcode_data_ey', '1');
INSERT INTO `company_wise_tables` VALUES ('5', '3', 'ASSET_DETAILS', 'asset_details_ey', '1');
INSERT INTO `company_wise_tables` VALUES ('6', '2', 'NAVIGATION_MENU', 'left_navigation_menu', '1');
INSERT INTO `company_wise_tables` VALUES ('7', '3', 'NAVIGATION_MENU', 'left_navigation_menu_ey', '1');
INSERT INTO `company_wise_tables` VALUES ('8', '3', 'GRN_DETAILS', 'grn_details_ey', '1');

-- ----------------------------
-- Table structure for constants
-- ----------------------------
DROP TABLE IF EXISTS `constants`;
CREATE TABLE `constants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(11) DEFAULT NULL,
  `constant_name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of constants
-- ----------------------------
INSERT INTO `constants` VALUES ('1', '2', 'grn_products_table_column_headers', 'Product Name,Description,Product Code');
INSERT INTO `constants` VALUES ('2', '3', 'grn_products_table_column_headers', 'Product Name,Description,Asset No,Serial No.');
INSERT INTO `constants` VALUES ('3', '2', 'grn_products_table_columns', 'asset_name,description,product_code');
INSERT INTO `constants` VALUES ('4', '3', 'grn_products_table_columns', 'asset_name,description,asset_no,serial_no');

-- ----------------------------
-- Table structure for const_asset_view_columns
-- ----------------------------
DROP TABLE IF EXISTS `const_asset_view_columns`;
CREATE TABLE `const_asset_view_columns` (
  `column_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of const_asset_view_columns
-- ----------------------------
INSERT INTO `const_asset_view_columns` VALUES ('Asset Name', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Type', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Tile Model', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Pallet Chit No.', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Caliper', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Shade', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Boxes', null, '1');
INSERT INTO `const_asset_view_columns` VALUES ('Lot No.', null, '1');

-- ----------------------------
-- Table structure for country_master
-- ----------------------------
DROP TABLE IF EXISTS `country_master`;
CREATE TABLE `country_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) DEFAULT '',
  `active_flag` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of country_master
-- ----------------------------
INSERT INTO `country_master` VALUES ('1', 'Sri Lanka', '1');

-- ----------------------------
-- Table structure for currency_master
-- ----------------------------
DROP TABLE IF EXISTS `currency_master`;
CREATE TABLE `currency_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of currency_master
-- ----------------------------
INSERT INTO `currency_master` VALUES ('1', 'LKR', '1');
INSERT INTO `currency_master` VALUES ('2', 'USD', '1');

-- ----------------------------
-- Table structure for depreciation_methods
-- ----------------------------
DROP TABLE IF EXISTS `depreciation_methods`;
CREATE TABLE `depreciation_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depreciation_method` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of depreciation_methods
-- ----------------------------
INSERT INTO `depreciation_methods` VALUES ('1', 'SL', null, '3', '1');
INSERT INTO `depreciation_methods` VALUES ('2', '150% DDB', null, '3', '1');
INSERT INTO `depreciation_methods` VALUES ('3', '200% DDB', null, '3', '1');

-- ----------------------------
-- Table structure for downloadable_software
-- ----------------------------
DROP TABLE IF EXISTS `downloadable_software`;
CREATE TABLE `downloadable_software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `software` varchar(255) DEFAULT NULL,
  `download_path` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT '',
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of downloadable_software
-- ----------------------------
INSERT INTO `downloadable_software` VALUES ('1', 'Zebra Browser Print', 'downloads/BP/BrowserPrintSetup.exe', '1.2.1.279', '1');

-- ----------------------------
-- Table structure for grn_details_ey
-- ----------------------------
DROP TABLE IF EXISTS `grn_details_ey`;
CREATE TABLE `grn_details_ey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `po_number` varchar(255) DEFAULT '',
  `uom` varchar(200) DEFAULT '',
  `loose_qty` decimal(10,2) DEFAULT NULL,
  `short_qty` decimal(10,2) DEFAULT NULL,
  `damage_qty` decimal(10,2) DEFAULT NULL,
  `total_qty` decimal(10,2) DEFAULT NULL,
  `location_no` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `in_date` varchar(20) DEFAULT NULL,
  `in_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of grn_details_ey
-- ----------------------------
INSERT INTO `grn_details_ey` VALUES ('1', '19', 'PO8856', 'units', '0.00', '0.00', '0.00', '100.00', '3', '650.00', '1', '2020-08-31', '12:39:35');
INSERT INTO `grn_details_ey` VALUES ('3', '34', 'PO3345', '1', null, null, null, null, '3', '22000.00', '1', '2020-09-08', '16:16:33');
INSERT INTO `grn_details_ey` VALUES ('4', '35', 'PO8745', '1', null, null, null, null, '4', '5000.00', '1', '2020-09-08', '16:24:36');

-- ----------------------------
-- Table structure for grn_details_sunshine
-- ----------------------------
DROP TABLE IF EXISTS `grn_details_sunshine`;
CREATE TABLE `grn_details_sunshine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `batch_no` varchar(255) DEFAULT '',
  `expiry_date` varchar(255) DEFAULT '',
  `uom` varchar(200) DEFAULT '',
  `carton_pack_size` varchar(255) DEFAULT '',
  `carton_qty` decimal(10,2) DEFAULT NULL,
  `loose_qty` decimal(10,2) DEFAULT NULL,
  `short_qty` decimal(10,2) DEFAULT NULL,
  `damage_qty` decimal(10,2) DEFAULT NULL,
  `total_qty` decimal(10,2) DEFAULT NULL,
  `location_no` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `currency` int(11) DEFAULT NULL,
  `in_date` varchar(20) DEFAULT NULL,
  `in_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of grn_details_sunshine
-- ----------------------------
INSERT INTO `grn_details_sunshine` VALUES ('1', '11', 'batch1', '2020-08-21', 'kg', '10', '200.00', '1.00', '2.00', '3.00', '200.00', '1', '150.00', '1', '2020-08-14', '11:56:54');
INSERT INTO `grn_details_sunshine` VALUES ('2', '11', 'batch2', '2020-08-21', 'kg', '10', '200.00', '1.00', '2.00', '3.00', '200.00', '1', '150.00', '1', '2020-08-14', '11:58:21');
INSERT INTO `grn_details_sunshine` VALUES ('3', '12', 'batch3', '2020-08-21', 'kg', '10', '200.00', '1.00', '2.00', '4.00', '250.00', '1', '150.00', '1', '2020-08-14', '11:58:42');
INSERT INTO `grn_details_sunshine` VALUES ('4', '12', 'batch4', '2020-08-14', 'gram', '200', '500.00', '0.00', '0.00', '0.00', '600.00', '1', '650.00', '1', '2020-08-14', '12:13:49');

-- ----------------------------
-- Table structure for left_navigation_menu
-- ----------------------------
DROP TABLE IF EXISTS `left_navigation_menu`;
CREATE TABLE `left_navigation_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_label` varchar(255) DEFAULT '' COMMENT 'Display Value of the page',
  `sub_desc` varchar(255) DEFAULT '' COMMENT 'Sub description for the header of the page',
  `controller` varchar(255) DEFAULT '',
  `action` varchar(255) DEFAULT '',
  `parent_id` int(11) DEFAULT NULL COMMENT 'ID of the main left navigation level-1',
  `sub_level_one_id` int(11) DEFAULT NULL COMMENT 'ID of the left navigation menu level 1',
  `icon` varchar(255) DEFAULT '' COMMENT 'mention fa-icon name',
  `menu_label` varchar(255) DEFAULT '',
  `sub_level_two_id` int(11) DEFAULT NULL,
  `main_view_order` int(11) DEFAULT NULL COMMENT 'Applies to main nav',
  `sub_view_order` int(11) DEFAULT NULL COMMENT 'Applies to sub nav',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of left_navigation_menu
-- ----------------------------
INSERT INTO `left_navigation_menu` VALUES ('1', 'Dashboard', '#', '#', '#', '1', '0', 'fa-dashboard', 'Dashboard', '0', '1', null);
INSERT INTO `left_navigation_menu` VALUES ('2', 'Welcome', 'It all starts here', 'Dashboard', 'views/dashboard1.php', '0', '1', 'fa-circle-o', 'Dashboard 1', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('4', 'Users', '#', '#', '#', '1', '0', 'fa-users', 'Users', '0', '2', null);
INSERT INTO `left_navigation_menu` VALUES ('5', 'My Profile', 'Manage your details', 'User', 'Profile', '0', '4', 'fa-user', 'My Profile', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('6', 'User Creation', 'Create a New User', 'User', 'Creation', '0', '4', 'fa-user-plus', 'User Creation', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('7', 'Monitor', 'View Warehouse Details', 'Dashboard', 'views/demo_view.php', '0', '1', 'fa-circle-o', 'Monitor', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('9', 'Asset Search', 'View Details of an Asset', 'Dashboard', 'views/asset_search.php', '0', '1', 'fa-circle-o', 'Asset Search', '0', null, '3');
INSERT INTO `left_navigation_menu` VALUES ('10', 'Labeling', '#', '#', '#', '1', '0', 'fa-sticky-note', 'Labeling', '0', '3', null);
INSERT INTO `left_navigation_menu` VALUES ('11', 'Barcode Print - Auto', 'Enter neccesary details and print the label required', 'Labeling', 'views/barcode_print.php', '0', '10', 'fa-barcode', 'Barcode Print - Auto', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('12', 'Applications', '#', '#', '#', '1', '0', 'fa-download', 'Applications', '0', '8', null);
INSERT INTO `left_navigation_menu` VALUES ('13', 'Printing Softwares', 'Download Required Softwares', 'Applications', 'views/printing_downloads.php', '0', '12', 'fa-circle-o', 'Printing Softwares', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('14', 'Commission', '#', '#', '#', '1', '0', 'fa-cube', 'Commission', '0', '4', null);
INSERT INTO `left_navigation_menu` VALUES ('15', 'GRN - Existing', 'Enter Existing GRN Details', 'Commission', 'views/grn_ey.php', '0', '14', 'fa-cubes', 'GRN - Existing', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('16', 'Barcode Print - Manual', 'Enter Manual Details and print barcode', 'Labeling', 'views/barcode_print_manual.php', '0', '10', 'fa-barcode', 'Barcode Print - Manual', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('17', 'Reports', '#', '#', '#', '1', '0', 'fa-file-text', 'Reports', '0', '6', null);
INSERT INTO `left_navigation_menu` VALUES ('18', 'Product Details', 'Scan a barcode to view details', 'Reports', 'views/view_barcode_details.php', '0', '17', 'fa-circle-o', 'Product Details', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('19', 'Views', '#', '#', '#', '1', '0', 'fa-tv', 'Views', '0', '7', null);
INSERT INTO `left_navigation_menu` VALUES ('20', 'GRN', 'View Entered GRN Details', 'Views', 'views/grn_view.php', '0', '19', 'fa-circle-o', 'GRN', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('21', 'Barcode Design', 'Design Your Barcode Here', 'Labeling', 'views/barcode_design.php', '0', '10', 'fa-circle-o', 'Barcode Design', '0', null, '3');
INSERT INTO `left_navigation_menu` VALUES ('22', 'Audit', '#', '#', '#', '1', '0', 'fa-search', 'Audit', '0', '5', null);
INSERT INTO `left_navigation_menu` VALUES ('23', 'Audit Creation', 'Create an Audit Project', 'Audit', 'views/create_audit.php', '0', '22', 'fa-circle-o', 'Audit Creation', '0', null, '1');
INSERT INTO `left_navigation_menu` VALUES ('24', 'Perform Audit', 'Scan and Check Assets for Availability', 'Audit', 'views/perform_audit.php', '0', '22', 'fa-circle-o', 'Perform Audit', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('25', 'Audit Status', 'Check Ongoing Audit Status', 'Audit', 'views/audit_status.php', '0', '22', 'fa-circle-o', 'Audit Status', '0', null, '3');
INSERT INTO `left_navigation_menu` VALUES ('26', 'Audit Summary', 'Download Audit Summary Reports', 'Reports', 'views/audit_summary_rpt.php', '0', '17', 'fa-circle-o', 'Audit Summary', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('27', 'GRN - New', 'Enter new item details', 'Commission', 'views/new_grn_ey.php', '0', '14', 'fa-cubes', 'GRN - New', '0', null, '2');
INSERT INTO `left_navigation_menu` VALUES ('28', 'All Assets', 'View Location wise Assets', 'Views', 'views/loc_wise_assets.php', '0', '19', 'fa-circle-o', 'All Assets', '0', null, '1');

-- ----------------------------
-- Table structure for left_navigation_urls
-- ----------------------------
DROP TABLE IF EXISTS `left_navigation_urls`;
CREATE TABLE `left_navigation_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `left_navigation_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of left_navigation_urls
-- ----------------------------
INSERT INTO `left_navigation_urls` VALUES ('1', '1', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('2', '2', 'views/dashboard1.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('3', '4', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('4', '5', 'Profile', '2');
INSERT INTO `left_navigation_urls` VALUES ('5', '6', 'Creation', '2');
INSERT INTO `left_navigation_urls` VALUES ('6', '7', 'views/demo_view.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('7', '9', 'views/asset_search.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('8', '10', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('9', '11', 'views/barcode_print.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('10', '12', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('11', '13', 'views/printing_downloads.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('12', '14', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('13', '15', 'views/grn.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('14', '16', 'views/barcode_print_manual.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('15', '17', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('16', '18', 'views/view_barcode_details.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('17', '19', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('18', '20', 'views/grn_view.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('19', '21', 'views/barcode_design.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('20', '22', '#', '2');
INSERT INTO `left_navigation_urls` VALUES ('21', '23', 'views/create_audit.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('22', '24', 'views/perform_audit.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('23', '25', 'views/audit_status.php', '2');
INSERT INTO `left_navigation_urls` VALUES ('24', '1', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('25', '2', 'views/dashboard1.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('26', '4', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('27', '5', 'Profile', '3');
INSERT INTO `left_navigation_urls` VALUES ('28', '6', 'Creation', '3');
INSERT INTO `left_navigation_urls` VALUES ('29', '7', 'views/demo_view.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('30', '9', 'views/asset_search.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('31', '10', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('32', '11', 'views/barcode_print.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('33', '12', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('34', '13', 'views/printing_downloads.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('35', '14', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('36', '15', 'views/grn_ey.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('37', '16', 'views/barcode_print_manual.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('38', '17', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('39', '18', 'views/view_barcode_details.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('40', '19', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('41', '20', 'views/grn_view_ey.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('42', '21', 'views/barcode_design.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('43', '22', '#', '3');
INSERT INTO `left_navigation_urls` VALUES ('44', '23', 'views/create_audit.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('45', '24', 'views/perform_audit.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('46', '25', 'views/audit_status.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('47', '26', 'views/audit_summary_rpt.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('48', '27', 'views/new_grn_ey.php', '3');
INSERT INTO `left_navigation_urls` VALUES ('49', '28', 'views/loc_wise_assets.php', '3');

-- ----------------------------
-- Table structure for level_master
-- ----------------------------
DROP TABLE IF EXISTS `level_master`;
CREATE TABLE `level_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of level_master
-- ----------------------------
INSERT INTO `level_master` VALUES ('1', 'Level 1', null, '1');
INSERT INTO `level_master` VALUES ('2', 'Level 2', null, '1');
INSERT INTO `level_master` VALUES ('3', 'Level 3', null, '1');
INSERT INTO `level_master` VALUES ('4', 'Level 4', null, '1');

-- ----------------------------
-- Table structure for line_master
-- ----------------------------
DROP TABLE IF EXISTS `line_master`;
CREATE TABLE `line_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of line_master
-- ----------------------------
INSERT INTO `line_master` VALUES ('1', 'Line 1', null, '1');
INSERT INTO `line_master` VALUES ('2', 'Line 2', null, '1');

-- ----------------------------
-- Table structure for location_master
-- ----------------------------
DROP TABLE IF EXISTS `location_master`;
CREATE TABLE `location_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of location_master
-- ----------------------------
INSERT INTO `location_master` VALUES ('1', 'Test Location 1', 'test', '2', '1');
INSERT INTO `location_master` VALUES ('2', 'Test Location 2', 'test', '2', '1');
INSERT INTO `location_master` VALUES ('3', 'Test Location 1', 'test', '3', '1');
INSERT INTO `location_master` VALUES ('4', 'Test Location 2', 'test', '3', '1');
INSERT INTO `location_master` VALUES ('5', 'Test Location 3', 'test', '3', '1');
INSERT INTO `location_master` VALUES ('6', 'Test Location 4', 'test', '3', '1');

-- ----------------------------
-- Table structure for model_master
-- ----------------------------
DROP TABLE IF EXISTS `model_master`;
CREATE TABLE `model_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of model_master
-- ----------------------------
INSERT INTO `model_master` VALUES ('1', 'test designer 1', null, '1', null, null);
INSERT INTO `model_master` VALUES ('2', 'test designer 2', null, '1', null, null);

-- ----------------------------
-- Table structure for store_details
-- ----------------------------
DROP TABLE IF EXISTS `store_details`;
CREATE TABLE `store_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of store_details
-- ----------------------------
INSERT INTO `store_details` VALUES ('14', '1', '1', '2', '2', '1');
INSERT INTO `store_details` VALUES ('15', '2', '1', '2', '1', '1');
INSERT INTO `store_details` VALUES ('16', '3', '1', '2', '1', '1');
INSERT INTO `store_details` VALUES ('17', '4', '2', '1', '1', '1');
INSERT INTO `store_details` VALUES ('18', '5', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for tag_data
-- ----------------------------
DROP TABLE IF EXISTS `tag_data`;
CREATE TABLE `tag_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  `last_seen_date` varchar(255) DEFAULT NULL,
  `last_seen_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tag_data
-- ----------------------------
INSERT INTO `tag_data` VALUES ('1', '300833B2DDD9014000000001', null, '1', null, null);
INSERT INTO `tag_data` VALUES ('2', '300833B2DDD9014000000002', null, '1', null, null);
INSERT INTO `tag_data` VALUES ('3', '300833B2DDD9014000000003', null, '1', null, null);
INSERT INTO `tag_data` VALUES ('4', '300833B2DDD9014000000004', null, '1', null, null);
INSERT INTO `tag_data` VALUES ('5', '300833B2DDD9014000000005', null, '1', null, null);
INSERT INTO `tag_data` VALUES ('6', '300833B2DDD9014000000006', null, '1', null, null);

-- ----------------------------
-- Table structure for type_master
-- ----------------------------
DROP TABLE IF EXISTS `type_master`;
CREATE TABLE `type_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of type_master
-- ----------------------------
INSERT INTO `type_master` VALUES ('1', 'pallet', null);
INSERT INTO `type_master` VALUES ('2', 'card', null);
INSERT INTO `type_master` VALUES ('3', 'bottle', null);

-- ----------------------------
-- Table structure for units_of_measurement_master
-- ----------------------------
DROP TABLE IF EXISTS `units_of_measurement_master`;
CREATE TABLE `units_of_measurement_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uom` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of units_of_measurement_master
-- ----------------------------
INSERT INTO `units_of_measurement_master` VALUES ('1', 'packs', null, '1');
INSERT INTO `units_of_measurement_master` VALUES ('2', 'litres', null, '1');
INSERT INTO `units_of_measurement_master` VALUES ('3', 'grams', null, '1');
INSERT INTO `units_of_measurement_master` VALUES ('4', 'cards', null, '1');

-- ----------------------------
-- Table structure for unit_master
-- ----------------------------
DROP TABLE IF EXISTS `unit_master`;
CREATE TABLE `unit_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uom` varchar(255) DEFAULT NULL,
  `company` int(11) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of unit_master
-- ----------------------------
INSERT INTO `unit_master` VALUES ('1', 'Unit', '3', '1');
INSERT INTO `unit_master` VALUES ('2', 'KG', '3', '1');
INSERT INTO `unit_master` VALUES ('3', 'Litre', '3', '1');

-- ----------------------------
-- Table structure for user_default_privilege
-- ----------------------------
DROP TABLE IF EXISTS `user_default_privilege`;
CREATE TABLE `user_default_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(11) DEFAULT NULL COMMENT 'USER_LOGIN table ID',
  `navigation_id` int(11) DEFAULT NULL COMMENT 'Left navigation menu ID',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime(6) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime(6) DEFAULT NULL,
  `active_flag` int(11) DEFAULT 1 COMMENT '1 = active, 0 = inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_default_privilege
-- ----------------------------

-- ----------------------------
-- Table structure for user_levels
-- ----------------------------
DROP TABLE IF EXISTS `user_levels`;
CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_levels
-- ----------------------------
INSERT INTO `user_levels` VALUES ('1', 'ADMIN');
INSERT INTO `user_levels` VALUES ('2', 'EXECUTIVE');
INSERT INTO `user_levels` VALUES ('3', 'MEMBER');
INSERT INTO `user_levels` VALUES ('4', 'USER');

-- ----------------------------
-- Table structure for user_login
-- ----------------------------
DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT '',
  `known_name` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `company` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) DEFAULT '',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `salutation` int(11) DEFAULT NULL COMMENT 'Salutation table ID',
  `user_level` int(11) DEFAULT NULL COMMENT 'User_levels table ID',
  `approved_flag` int(11) DEFAULT 0 COMMENT '1 = approved, 0 = not approved',
  `email` varchar(255) DEFAULT '',
  `update_approved_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL COMMENT 'country master ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_login
-- ----------------------------
INSERT INTO `user_login` VALUES ('1', 'admin', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', '1', 'Buddhija', 'Guruge', '1', '2018-10-19 16:48:41', '1', '1', '1', 'bguruge91@gmail.com', null, null, null, null, null, '1');
INSERT INTO `user_login` VALUES ('3', 'admin', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', '2', 'Buddhija', 'Guruge', '1', '2018-10-19 16:48:41', '1', '1', '1', 'bguruge91@gmail.com', null, null, null, null, null, '1');
INSERT INTO `user_login` VALUES ('4', 'test', 'Tester', '827ccb0eea8a706c4c34a16891f84e7b', '2', 'Test', 'User', '1', '2018-10-19 16:48:41', '1', '1', '1', 'buddhija.guruge@crosspoint.lk', null, null, null, null, null, '1');
INSERT INTO `user_login` VALUES ('5', 'admin', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', '3', 'Buddhija', 'Guruge', '1', '2020-08-24 09:42:42', '1', '1', '1', '', null, null, null, null, null, '1');
INSERT INTO `user_login` VALUES ('6', 'audit1', 'Auditor 1', '827ccb0eea8a706c4c34a16891f84e7b', '3', 'Company', 'Auditor 1', '1', '2020-08-31 14:44:04', '1', '4', '1', '', null, null, null, null, null, '1');
INSERT INTO `user_login` VALUES ('7', 'audit2', 'Auditor 2', '827ccb0eea8a706c4c34a16891f84e7b', '3', 'Company', 'Auditor 2', '1', '2020-08-31 14:45:12', '1', '4', '1', '', null, null, null, null, null, '1');

-- ----------------------------
-- Table structure for user_privilege
-- ----------------------------
DROP TABLE IF EXISTS `user_privilege`;
CREATE TABLE `user_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'USER_LOGIN table ID',
  `navigation_id` int(11) DEFAULT NULL COMMENT 'Left navigation menu ID',
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `active_flag` int(11) DEFAULT 0 COMMENT '1 = active, 0 = inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_privilege
-- ----------------------------
INSERT INTO `user_privilege` VALUES ('1', '1', '1', '1', '2018-10-25 12:42:06', '1', '2020-06-09 11:35:35', '1');
INSERT INTO `user_privilege` VALUES ('2', '1', '2', '1', '2018-10-25 12:42:06', '1', '2020-06-09 11:35:35', '1');
INSERT INTO `user_privilege` VALUES ('5', '1', '4', '1', '2018-10-29 12:34:53', '1', '2020-06-09 11:35:35', '1');
INSERT INTO `user_privilege` VALUES ('6', '1', '5', '1', '2018-10-29 12:35:05', '1', '2020-06-09 11:35:35', '1');
INSERT INTO `user_privilege` VALUES ('7', '1', '7', '1', '2020-07-07 16:38:15', null, null, '1');
INSERT INTO `user_privilege` VALUES ('8', '1', '9', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('9', '3', '1', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('10', '3', '2', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('11', '3', '4', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('12', '3', '5', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('13', '3', '10', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('14', '3', '11', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('15', '3', '12', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('16', '3', '13', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('17', '3', '14', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('18', '3', '15', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('19', '3', '16', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('20', '3', '17', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('21', '3', '18', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('22', '4', '1', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('23', '4', '2', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('24', '4', '4', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('25', '4', '5', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('26', '4', '10', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('27', '4', '11', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('28', '4', '12', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('29', '4', '13', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('30', '4', '14', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('31', '4', '15', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('32', '4', '16', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('33', '4', '17', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('34', '4', '18', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('35', '4', '19', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('36', '4', '20', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('37', '3', '19', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('38', '3', '20', '1', '2020-07-21 14:22:18', null, null, '1');
INSERT INTO `user_privilege` VALUES ('39', '5', '1', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('40', '5', '2', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('43', '5', '4', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('44', '5', '5', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('45', '5', '14', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('46', '5', '15', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('47', '5', '22', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('48', '5', '23', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('49', '5', '24', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('50', '5', '25', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('51', '5', '19', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('52', '5', '20', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('53', '5', '17', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('54', '5', '26', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('55', '5', '27', '1', null, null, null, '1');
INSERT INTO `user_privilege` VALUES ('56', '5', '28', '1', null, null, null, '1');

-- ----------------------------
-- Table structure for user_salutation
-- ----------------------------
DROP TABLE IF EXISTS `user_salutation`;
CREATE TABLE `user_salutation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_salutation
-- ----------------------------
INSERT INTO `user_salutation` VALUES ('1', 'Mr.');
INSERT INTO `user_salutation` VALUES ('2', 'Mrs.');
INSERT INTO `user_salutation` VALUES ('3', 'Ms.');
INSERT INTO `user_salutation` VALUES ('4', 'Dr.');
INSERT INTO `user_salutation` VALUES ('5', 'Rev.');
INSERT INTO `user_salutation` VALUES ('6', 'Hon.');

-- ----------------------------
-- Table structure for user_update_temp
-- ----------------------------
DROP TABLE IF EXISTS `user_update_temp`;
CREATE TABLE `user_update_temp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'user_login table ID',
  `user_name` varchar(255) DEFAULT '',
  `known_name` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `first_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) DEFAULT '',
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `salutation` int(11) DEFAULT NULL COMMENT 'User Salutation table ID',
  `email` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_update_temp
-- ----------------------------

-- ----------------------------
-- Table structure for warehouse_master
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_master`;
CREATE TABLE `warehouse_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(255) DEFAULT NULL,
  `warehouse_location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of warehouse_master
-- ----------------------------
INSERT INTO `warehouse_master` VALUES ('1', 'Warehouse 1', 'Colombo', '331 1/1, Highlevel road, Nugegoda', null, '1');

-- ----------------------------
-- Table structure for zone_master
-- ----------------------------
DROP TABLE IF EXISTS `zone_master`;
CREATE TABLE `zone_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active_flag` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of zone_master
-- ----------------------------
INSERT INTO `zone_master` VALUES ('1', 'Zone A', null, '1');
INSERT INTO `zone_master` VALUES ('2', 'Zone B', null, '1');
INSERT INTO `zone_master` VALUES ('3', 'Zone C', null, '1');
INSERT INTO `zone_master` VALUES ('4', 'Zone D', null, '1');

-- ----------------------------
-- View structure for all_asset_view_columns
-- ----------------------------
DROP VIEW IF EXISTS `all_asset_view_columns`;
CREATE ALGORITHM=UNDEFINED  VIEW `all_asset_view_columns` AS SELECT * FROM const_asset_view_columns CAVC WHERE CAVC.active_flag = 1 ;

-- ----------------------------
-- View structure for get_all_companies
-- ----------------------------
DROP VIEW IF EXISTS `get_all_companies`;
CREATE ALGORITHM=UNDEFINED VIEW `get_all_companies` AS SELECT CM.id, CM.company_name AS val FROM company_master CM WHERE CM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_all_completed_audits
-- ----------------------------
DROP VIEW IF EXISTS `get_all_completed_audits`;
CREATE ALGORITHM=UNDEFINED VIEW `get_all_completed_audits` AS SELECT
	AH.company,
	AH.id,
	AH.audit_name AS val
FROM
	audit_header AH
WHERE
	AH.active_flag = 1
AND AH.completed_flag = 1 ;

-- ----------------------------
-- View structure for get_all_countries
-- ----------------------------
DROP VIEW IF EXISTS `get_all_countries`;
CREATE ALGORITHM=UNDEFINED VIEW `get_all_countries` AS SELECT CM.id, CM.country AS val FROM country_master CM ;

-- ----------------------------
-- View structure for get_all_currency
-- ----------------------------
DROP VIEW IF EXISTS `get_all_currency`;
CREATE ALGORITHM=UNDEFINED  VIEW `get_all_currency` AS SELECT
	(CM.id) AS id,
	CM.currency AS val
FROM
	`currency_master` CM
WHERE
	CM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_all_downloadable_software
-- ----------------------------
DROP VIEW IF EXISTS `get_all_downloadable_software`;
CREATE ALGORITHM=UNDEFINED  VIEW `get_all_downloadable_software` AS SELECT
	DS.id,
	DS.software,
	DS.download_path,
	DS.version
FROM
	downloadable_software DS
WHERE
	DS.active_flag = 1
	AND DS.download_path IS NOT NULL ;

-- ----------------------------
-- View structure for get_all_lines
-- ----------------------------
DROP VIEW IF EXISTS `get_all_lines`;
CREATE ALGORITHM=UNDEFINED  VIEW `get_all_lines` AS SELECT
LM.id,
LM.line_name,
LM.description,
LM.active_flag
FROM
	line_master LM
WHERE
	LM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_all_locations
-- ----------------------------
DROP VIEW IF EXISTS `get_all_locations`;
CREATE ALGORITHM=UNDEFINED  VIEW `get_all_locations` AS SELECT LM.id, LM.location AS val, LM.company FROM `location_master` LM WHERE LM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_all_units
-- ----------------------------
DROP VIEW IF EXISTS `get_all_units`;
CREATE ALGORITHM=UNDEFINED  VIEW `get_all_units` AS SELECT
	UM.id,
	UM.uom AS val,
	UM.company
FROM
	unit_master UM
WHERE
	UM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_all_users
-- ----------------------------
DROP VIEW IF EXISTS `get_all_users`;
CREATE ALGORITHM=UNDEFINED VIEW `get_all_users` AS SELECT
UL.id AS ID,
(CASE WHEN UL.first_name IS NULL THEN CONCAT(US.salutation, UL.last_name) ELSE CONCAT(US.salutation, UL.first_name, ' ', UL.last_name) END) AS VAL
FROM user_login UL
LEFT OUTER JOIN user_salutation US ON US.id = UL.salutation ;

-- ----------------------------
-- View structure for get_all_zones
-- ----------------------------
DROP VIEW IF EXISTS `get_all_zones`;
CREATE ALGORITHM=UNDEFINED  VIEW `get_all_zones` AS SELECT
	ZM.id,
	ZM.zone_name,
	ZM.description
FROM
	zone_master ZM
WHERE
	ZM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_depreciation_methods
-- ----------------------------
DROP VIEW IF EXISTS `get_depreciation_methods`;
CREATE ALGORITHM=UNDEFINED VIEW `get_depreciation_methods` AS SELECT
	DM.id,
	DM.depreciation_method AS val,
	DM.company
FROM
	depreciation_methods DM
WHERE
	DM.active_flag = 1 ;

-- ----------------------------
-- View structure for get_stored_assets
-- ----------------------------
DROP VIEW IF EXISTS `get_stored_assets`;
CREATE ALGORITHM=UNDEFINED VIEW `get_stored_assets` AS SELECT
	SD.asset_id,
	AM.asset_name,
	ZM.zone_name,
	LM.line_name,
	LVLM.level_name,
	TD.tag_id
FROM
	store_details SD
LEFT OUTER JOIN asset_master AM ON AM.asset_id = SD.asset_id
LEFT OUTER JOIN zone_master ZM ON ZM.id = SD.zone_id
LEFT OUTER JOIN line_master LM ON LM.id = SD.line_id
LEFT OUTER JOIN level_master LVLM ON LVLM.id = SD.level_id
LEFT OUTER JOIN tag_data TD ON TD.id = AM.tag_id
WHERE
	SD.active_flag = 1 ;

-- ----------------------------
-- View structure for get_unapproved_users
-- ----------------------------
DROP VIEW IF EXISTS `get_unapproved_users`;
CREATE ALGORITHM=UNDEFINED VIEW `get_unapproved_users` AS SELECT
UL.id,
UL.user_name,
UL.known_name,
IFNULL(UL.first_name, 'N/A') AS first_name,
UL.last_name,
US.salutation,
UL.created_date AS created_date,
(CASE WHEN UL.created_by = 0 THEN 'Himself' ELSE CUL.known_name END) AS created_by,
LVL.user_level AS user_level,
UL.email,
UL.approved_flag
FROM user_login UL
LEFT OUTER JOIN user_salutation US ON US.id = UL.salutation
LEFT OUTER JOIN user_login CUL ON CUL.id = UL.created_by -- to get the created user
LEFT OUTER JOIN user_levels LVL ON LVL.id = UL.user_level
WHERE UL.approved_flag = 0 ;

-- ----------------------------
-- View structure for get_user_levels
-- ----------------------------
DROP VIEW IF EXISTS `get_user_levels`;
CREATE ALGORITHM=UNDEFINED VIEW `get_user_levels` AS SELECT
	UL.id,
	UL.user_level AS val
FROM
	user_levels UL ;

-- ----------------------------
-- View structure for get_user_salutations
-- ----------------------------
DROP VIEW IF EXISTS `get_user_salutations`;
CREATE ALGORITHM=UNDEFINED VIEW `get_user_salutations` AS SELECT US.id, US.salutation AS val FROM user_salutation US ;

-- ----------------------------
-- Procedure structure for check_table_exists
-- ----------------------------
DROP PROCEDURE IF EXISTS `check_table_exists`;
DELIMITER ;;
CREATE PROCEDURE `check_table_exists`(table_name VARCHAR(100))
BEGIN
    DECLARE CONTINUE HANDLER FOR SQLSTATE '42S02' SET @err = 1;
    SET @err = 0;
    SET @table_name = table_name;
    SET @sql_query = CONCAT('SELECT 1 FROM ',@table_name);
    PREPARE stmt1 FROM @sql_query;
    IF (@err = 1) THEN
        SET @table_exists = 0;
    ELSE
        SET @table_exists = 1;
        DEALLOCATE PREPARE stmt1;
    END IF;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for check_user_access
-- ----------------------------
DROP PROCEDURE IF EXISTS `check_user_access`;
DELIMITER ;;
CREATE PROCEDURE `check_user_access`(IN `UID` int,IN `NAV_PAGE` int, IN `COMPANY` int)
BEGIN
	
	-- DECLARE NAVIGATION_TABLE VARCHAR(255);
	-- SELECT @NAVIGATION_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "NAVIGATION_MENU" AND CT.active_flag = 1;

	IF EXISTS(SELECT LNM.id FROM left_navigation_menu LNM WHERE LNM.id = `NAV_PAGE`)
	THEN
	BEGIN
		SELECT
			UP.active_flag,
			LNU.action,
			LNM.controller,
			LNM.menu_label,
			LNM.main_label,
			LNM.sub_desc
		FROM
			user_privilege UP
			LEFT OUTER JOIN left_navigation_menu LNM ON LNM.id = `NAV_PAGE`
			LEFT OUTER JOIN left_navigation_urls LNU ON LNU.left_navigation_id = LNM.id AND LNU.company_id = `COMPANY`
		WHERE
			UP.user_id = `UID`
		AND UP.navigation_id = `NAV_PAGE`;

	END;
	ELSE
	BEGIN
		
		SELECT -1 AS ACTIVE_FLAG;

	END;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_all_products
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_products`;
DELIMITER ;;
CREATE PROCEDURE `get_all_products`(IN `COMPANY` int)
BEGIN
	
	DECLARE DETAIL_TABLE VARCHAR(255);

	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('SELECT
	AM.asset_id,
	AM.asset_name,
	AM.description,
	LOC.location AS location_name,
	DET_TBL.*
FROM
	asset_master AM
LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
LEFT OUTER JOIN location_master LOC ON LOC.id = DET_TBL.location
WHERE
	AM.company = ',`COMPANY`,';');
	prepare stmt from @qry1;
	execute stmt;

/*
	set @qry1 := concat('SELECT
	AM.asset_id,
	AM.asset_name,
	AM.description,
	DET_TBL.product_code,
	CONCAT(DET_TBL.price,' ',CM.currency) AS price
FROM
	asset_master AM
LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
LEFT OUTER JOIN currency_master CM ON CM.id = DET_TBL.currency
WHERE
	AM.company = ', `COMPANY`,';');
	prepare stmt from @qry1 ;
	execute stmt;
*/
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_all_products_for_location
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_all_products_for_location`;
DELIMITER ;;
CREATE PROCEDURE `get_all_products_for_location`(IN `COMPANY` int,IN `location` int)
BEGIN

	DECLARE DETAIL_TABLE VARCHAR(255);

	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('SELECT
	AM.asset_id,
	AM.asset_name,
	AM.description,
	DET_TBL.*
FROM
	asset_master AM
LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
WHERE
	AM.company = ',`COMPANY`,' AND DET_TBL.location = ',`location`,';');
	prepare stmt from @qry1;
	execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_audit_counts
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_audit_counts`;
DELIMITER ;;
CREATE PROCEDURE `get_audit_counts`(IN `COMPANY` int)
BEGIN
	
	DECLARE DETAIL_TABLE VARCHAR(255);
	DECLARE AUDIT_ID INT;
	DECLARE LOCATION_ID INT;
	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;


	SELECT
	@AUDIT_ID := (SELECT
		AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0) AS aid,
	@LOCATION_ID := (SELECT
		AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1) AS loc_id;

/*
	SELECT
		@AUDIT_ID := AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0;


	SELECT
		@LOCATION_ID := AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1; */


	SET @qry1 := CONCAT('SELECT 
		MAIN.TOT_COUNT,
		MAIN.BL_COUNT,
		MAIN.NBL_COUNT,
		(MAIN.TOT_COUNT - MAIN.BL_COUNT) AS NTI_COUNT
	FROM
	(
		SELECT
		(SELECT COUNT(id) AS total_assets FROM ',@DETAIL_TABLE,' DET_TBL WHERE DET_TBL.location = @LOCATION_ID) AS TOT_COUNT,
		(SELECT COUNT(BL.bl_id) AS BL_COUNT FROM audit_location_bl BL WHERE BL.audit_id = @AUDIT_ID AND BL.location_id = @LOCATION_ID) AS BL_COUNT,
		(SELECT COUNT(NBL.nbl_id) AS NBL_COUNT FROM audit_location_nbl NBL WHERE NBL.audit_id = @AUDIT_ID AND NBL.found_location_id = @LOCATION_ID) AS NBL_COUNT
	) MAIN;');
				
			prepare stmt from @qry1;
			execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_audit_summary_report
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_audit_summary_report`;
DELIMITER ;;
CREATE PROCEDURE `get_audit_summary_report`(IN `COMPANY` int,IN `audit_id` int)
BEGIN
	
	DECLARE DETAIL_TABLE VARCHAR(255);

	SET @qry1 := CONCAT('SELECT 
		CT.table_name INTO @DETAIL_TABLE
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = ',`COMPANY`,' 
		AND CT.string = "ASSET_DETAILS" 
		AND CT.active_flag = 1;');
						
			prepare stmt from @qry1;
			execute stmt;

	-- audit summary
	SET @qry1 := CONCAT('
SELECT
	"Location" AS location,
	"Total Count" AS TOT_CNT,
	"BL COUNT" AS BL_CNT,
	"NBL CNT" AS NBL_CNT,
	"NTI CNT" AS NTI_CNT,
	"AUDIT USER" AS STARTED_USER

UNION ALL

SELECT 
	MAIN.location,
	MAIN.TOT_CNT,
	MAIN.BL_CNT,
	MAIN.NBL_CNT,
	(MAIN.TOT_CNT - MAIN.BL_CNT) AS NTI_CNT,
	MAIN.STARTED_USER
	FROM
	(SELECT
		AL.audit_id,
		AL.location_id,
		LOC.location,
		IFNULL(TOTAL_AST_CNT.asset_count,"0") AS TOT_CNT,
		IFNULL(BL.BL_CNT,"0") AS BL_CNT,
		IFNULL(NBL_CNT.NBL_CNT,"0") AS NBL_CNT,
		CONCAT(UL.first_name," ",UL.last_name) AS STARTED_USER
	FROM
		audit_locations AL
	LEFT OUTER JOIN user_login UL ON UL.id = AL.started_user
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	LEFT OUTER JOIN (SELECT
		BL.location_id,
		BL.scanned_user,
		COUNT(BL.bl_id) AS BL_CNT
	FROM
		audit_location_bl BL
	WHERE
		BL.audit_id = ',`audit_id`,'
	GROUP BY
		BL.location_id) BL ON BL.location_id = AL.location_id 
	LEFT OUTER JOIN (SELECT
			DET_TBL.location,
			COUNT(DET_TBL.id) AS asset_count
		FROM
			asset_master AM
		LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
		WHERE
			AM.company = ',`COMPANY`,'
		GROUP BY DET_TBL.location) AS TOTAL_AST_CNT ON TOTAL_AST_CNT.location = AL.location_id
	LEFT OUTER JOIN (SELECT
		NBL.found_location_id,
		COUNT(NBL.nbl_id) AS NBL_CNT
	FROM
		audit_location_nbl NBL
	WHERE
		NBL.audit_id = ',`audit_id`,'
	GROUP BY
		NBL.found_location_id) AS NBL_CNT ON NBL_CNT.found_location_id = AL.location_id
	WHERE
		AL.audit_id = ',`audit_id`,'
	AND AL.active_flag = 1) MAIN;');
						
			prepare stmt from @qry1;
			execute stmt;

	-- BL Details
	SET @qry1 := CONCAT('SELECT
	"Asset No." AS asset_no,
	"Serial No." AS serial_no,
	"Asset Name" AS asset_name,
	"Location" AS location,
	"Status" AS stat

UNION ALL 

SELECT * FROM
(SELECT
	DET_TBL.asset_no,
	DET_TBL.serial_no,
	AM.asset_name,
	LOC.location,
	"Detected" AS stat
FROM
	audit_location_bl BL
LEFT OUTER JOIN asset_master AM ON AM.barcode_id = BL.barcode_id
LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
LEFT OUTER JOIN location_master LOC ON LOC.id = DET_TBL.location
WHERE
	BL.audit_id = ',`audit_id`,'
ORDER BY
	BL.location_id ASC) MAIN');
						
	prepare stmt from @qry1;
	execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_audit_users
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_audit_users`;
DELIMITER ;;
CREATE PROCEDURE `get_audit_users`(IN `COMPANY` int)
BEGIN
	
	SELECT
		UL.id,
		CONCAT(UL.first_name,' ',UL.last_name) AS val
	FROM
		user_login UL
	WHERE
		UL.approved_flag = 1
	AND UL.company = `COMPANY`
	AND UL.user_level = 4;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_barcode_details
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_barcode_details`;
DELIMITER ;;
CREATE PROCEDURE `get_barcode_details`(IN `COMPANY` int,IN `uni_id` int,IN `auto_letter` varchar(10))
BEGIN
	
	DECLARE BARCODE_PRINT_TABLE VARCHAR(255);
	DECLARE DETAIL_TABLE VARCHAR(255);
	DECLARE AUTO_FLAG INT;

	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;
	SELECT @BARCODE_PRINT_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "BARCODE_PRINT" AND CT.active_flag = 1;
	
	IF(`auto_letter` = 'CM')
	THEN
		SET @AUTO_FLAG := 0;
	ELSE
		SET @AUTO_FLAG := 1;
	END IF;

	SET @qry1 := CONCAT('SELECT
"cols" AS cols,
"Print Method" AS print_method,
"Product Code" AS product_code,
"Asset" AS asset,
"Batch No." AS batch_no,
"Price" AS price,
"Print Date" AS print_date,
"Print Time" AS print_time

UNION ALL

SELECT
	7 AS cols,
	(CASE WHEN BP.auto_flag = 0 THEN "Manual Print" ELSE "Auto Print" END) AS print_method,
	BP.product_code,
	(CASE WHEN BP.asset_id = 0 THEN "N/A" ELSE AM.asset_name END) AS asset,
	BP.batch_no,
	BP.price,
	BP.print_date,
	BP.print_time
FROM
	',@BARCODE_PRINT_TABLE,' BP
LEFT OUTER JOIN ',@DETAIL_TABLE,' AD ON AD.product_code = BP.product_code
LEFT OUTER JOIN asset_master AM ON AM.asset_id = BP.asset_id
WHERE
	BP.unique_id = "',`uni_id`,'" AND BP.auto_flag = "',@AUTO_FLAG,'";');

	prepare stmt from @qry1;
	execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_barcode_print_unique_id
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_barcode_print_unique_id`;
DELIMITER ;;
CREATE PROCEDURE `get_barcode_print_unique_id`(IN `COMPANY` int, IN `AUTO_FLAG` int)
BEGIN
	
DECLARE BARCODE_PRINT_TABLE VARCHAR(255);

SELECT @BARCODE_PRINT_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "BARCODE_PRINT" AND CT.active_flag = 1;

SET @qry1 := CONCAT('SELECT MAIN.unique_id + 1 AS unique_id, 
(CASE WHEN ', `AUTO_FLAG`,'=0 THEN "CM" ELSE "CA" END) AS fixed_letter FROM
(SELECT
	BP.unique_id
FROM
	',@BARCODE_PRINT_TABLE,' BP
WHERE
	BP.auto_flag = ',`AUTO_FLAG`,'
UNION ALL
SELECT 0 AS unique_id) MAIN ORDER BY MAIN.unique_id DESC LIMIT 1',';');
	
prepare stmt from @qry1;
execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_bl__nbl_nti_assets
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_bl__nbl_nti_assets`;
DELIMITER ;;
CREATE PROCEDURE `get_bl__nbl_nti_assets`(IN `COMPANY` int, IN `VALUE` int)
BEGIN
	
	DECLARE DETAIL_TABLE VARCHAR(255);
	DECLARE AUDIT_ID INT;
	DECLARE LOCATION_ID INT;
	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;

	SELECT
	@AUDIT_ID := (SELECT
		AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0) AS aid,
	@LOCATION_ID := (SELECT
		AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1) AS loc_id;

	IF(`VALUE` = 1)
	THEN
	BEGIN
		-- BL
	SET @qry1 := CONCAT('SELECT
		AM.asset_id,
		AM.asset_name,
		AM.description,
		DET_TBL.*
	FROM
		asset_master AM
	LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
	WHERE
		AM.company = ',`COMPANY`,'
	AND DET_TBL.location = ',@LOCATION_ID,'
	AND AM.barcode_id IN (SELECT BL.barcode_id FROM audit_location_bl BL WHERE BL.audit_id = ',@AUDIT_ID,' AND BL.location_id = ',@LOCATION_ID,');');
				
			prepare stmt from @qry1;
			execute stmt;
	END;

	ELSEIF(`VALUE` = 2)
	THEN
	BEGIN
		-- NBL
	SET @qry1 := CONCAT('SELECT
		AM.asset_id,
		AM.asset_name,
		AM.description,
		DET_TBL.*,
		LOC.location AS location_name
	FROM
		asset_master AM
	LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = DET_TBL.location
	WHERE
		AM.company = ',`COMPANY`,'
	AND AM.barcode_id IN (SELECT NBL.barcode_id FROM audit_location_nbl NBL WHERE NBL.audit_id = ',@AUDIT_ID,' AND NBL.found_location_id = ',@LOCATION_ID,');');
				
			prepare stmt from @qry1;
			execute stmt;
	END;

	ELSEIF(`VALUE` = 3)
	THEN
	BEGIN
		-- NTI
	SET @qry1 := CONCAT('SELECT
		AM.asset_id,
		AM.asset_name,
		AM.description,
		DET_TBL.*
	FROM
		asset_master AM
	LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
	WHERE
		AM.company = ',`COMPANY`,'
	AND DET_TBL.location = ',@LOCATION_ID,'
	AND AM.barcode_id NOT IN (SELECT BL.barcode_id FROM audit_location_bl BL WHERE BL.audit_id = ',@AUDIT_ID,' AND BL.location_id = ',@LOCATION_ID,');');
				
			prepare stmt from @qry1;
			execute stmt;
	END;
	END IF;
	

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_details_for_asset_and_grn
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_details_for_asset_and_grn`;
DELIMITER ;;
CREATE PROCEDURE `get_details_for_asset_and_grn`(IN `COMPANY` int,IN `asset_id` int,IN `grn_id` int)
BEGIN
	
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);
	DECLARE DETAIL_TABLE VARCHAR(255);
	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;
	SELECT @GRN_DETAILS_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "GRN_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('SELECT
	GRN.id,
	GRN.asset_id,
	AD.product_code,
	GRN.batch_no,
	GRN.price,
	CM.currency,
	GRN.total_qty
FROM
	',@GRN_DETAILS_TABLE,' GRN
LEFT OUTER JOIN ',@DETAIL_TABLE,' AD ON AD.asset_id = GRN.asset_id
LEFT OUTER JOIN currency_master CM ON CM.id = GRN.currency
WHERE
	GRN.id = ',`grn_id`,';');
			
		prepare stmt from @qry1;
		execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_grn_details_for_asset
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_grn_details_for_asset`;
DELIMITER ;;
CREATE PROCEDURE `get_grn_details_for_asset`(IN `COMPANY` int,IN `asset_id` int)
BEGIN
	
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);
	
	SELECT @GRN_DETAILS_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "GRN_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('SELECT
	GRN.id,
	CONCAT("GRN",LPAD(GRN.id + 1,6,0),"::",GRN.batch_no) AS val
FROM
	',@GRN_DETAILS_TABLE,' GRN
WHERE
	GRN.asset_id = ',`asset_id`,';');
			
		prepare stmt from @qry1;
		execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_grn_unique_id
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_grn_unique_id`;
DELIMITER ;;
CREATE PROCEDURE `get_grn_unique_id`(IN `COMPANY` int)
BEGIN
	
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);

	SELECT @GRN_DETAILS_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "GRN_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('SELECT CONCAT("GRN",LPAD(MAIN.id + 1,6,0)) AS uni_grn FROM
(SELECT
	GR.id
FROM
	',@GRN_DETAILS_TABLE,' GR
UNION ALL

SELECT 0 AS id) MAIN ORDER BY MAIN.id DESC LIMIT 1',';');
		
	prepare stmt from @qry1;
	execute stmt;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_last_audit_location_flag
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_last_audit_location_flag`;
DELIMITER ;;
CREATE PROCEDURE `get_last_audit_location_flag`(IN `COMPANY` int)
BEGIN
	
	DECLARE AUDIT_ID INT;

	SELECT
		@AUDIT_ID := AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0;

	SELECT 
	(CASE WHEN (MAIN.tot_locations - completed_locs) = 1 THEN 1 ELSE 0 END) AS LAST_LOCATION_FLAG
	FROM
	(SELECT
	(SELECT
		COUNT(AL.id) AS tot_locations
	FROM
		audit_locations AL
	WHERE
		AL.audit_id = @AUDIT_ID) AS tot_locations,
	(SELECT
		SUM(AL.completed_flag) AS completed_locs
	FROM
		audit_locations AL
	WHERE
		AL.audit_id = @AUDIT_ID) AS completed_locs) MAIN;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_levelwise_pallets
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_levelwise_pallets`;
DELIMITER ;;
CREATE PROCEDURE `get_levelwise_pallets`(IN `zone_id` int,IN `line_id` int,IN `level_id` int)
BEGIN
	
	SELECT
	(SELECT ZM.zone_name FROM zone_master ZM WHERE ZM.id = `zone_id` AND ZM.active_flag = 1) AS zone_name,
	(SELECT LN.line_name FROM line_master LN WHERE LN.id = `line_id` AND LN.active_flag = 1) AS line_name,
	(SELECT LM.level_name FROM level_master LM WHERE LM.id = `level_id` AND LM.active_flag = 1) AS level_name;

	SELECT
		SD.level_id,
		LM.level_name,
		ZM.zone_name,
		LNM.line_name,
		SD.asset_id,
		AM.asset_name,
		TM.asset_type,
		AD.pallet_chit_no,
		MM.model_name,
		AD.caliper,
		CM.color_name,
		AD.boxes,
		AD.lot_no,
		TD.tag_id
	FROM
		store_details SD
	LEFT OUTER JOIN level_master LM ON LM.id = SD.level_id
	LEFT OUTER JOIN zone_master ZM ON ZM.id = SD.zone_id
	LEFT OUTER JOIN line_master LNM ON LNM.id = SD.line_id
	LEFT OUTER JOIN asset_master AM ON AM.asset_id = SD.asset_id
	LEFT OUTER JOIN asset_details AD ON AD.asset_id = SD.asset_id
	LEFT OUTER JOIN type_master TM ON TM.id = AD.asset_type
	LEFT OUTER JOIN color_master CM ON CM.id = AD.shade
	LEFT OUTER JOIN model_master MM ON MM.id = AD.tile_model
	LEFT OUTER JOIN tag_data TD ON TD.id = AM.tag_id
	WHERE
		SD.zone_id = `zone_id`
		AND SD.line_id = `line_id`
		AND SD.level_id = `level_id`
		AND SD.active_flag = 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_started_audit
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_started_audit`;
DELIMITER ;;
CREATE PROCEDURE `get_started_audit`(IN `COMPANY` int)
BEGIN

	SELECT
		AH.id AS audit_id,
		AH.audit_name,
		AH.start_date
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_started_audit_location
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_started_audit_location`;
DELIMITER ;;
CREATE PROCEDURE `get_started_audit_location`(IN `COMPANY` int)
BEGIN
	
	SELECT
		AL.location_id,
		LOC.location,
		COUNT(AL.id) AS started_flag
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_store_tag_availability
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_store_tag_availability`;
DELIMITER ;;
CREATE PROCEDURE `get_store_tag_availability`(IN `tag_id` varchar(255))
BEGIN
	
	SELECT * FROM
	(SELECT
		(CASE WHEN SD.id is NULL THEN 0 ELSE 1 END) AS RET,
		ZM.zone_name,
		LM.line_name,
		LVL.level_name
	FROM
		store_details SD
	LEFT OUTER JOIN asset_master AM ON AM.asset_id = SD.asset_id
	LEFT OUTER JOIN tag_data TD ON TD.id = AM.tag_id
	LEFT OUTER JOIN zone_master ZM ON ZM.id = SD.zone_id
	LEFT OUTER JOIN line_master LM ON LM.id = SD.line_id
	LEFT OUTER JOIN level_master LVL ON LVL.id = SD.level_id
	WHERE
	TD.tag_id = `tag_id`
	AND SD.active_flag = 1

	UNION ALL

	SELECT 0 AS RET,
	0 AS zone_name,
	0 AS line_name,
	0 AS level_name) MAIN ORDER BY MAIN.RET DESC LIMIT 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_total_asset_count_for_location
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_total_asset_count_for_location`;
DELIMITER ;;
CREATE PROCEDURE `get_total_asset_count_for_location`(IN `COMPANY` int,IN `loc_id` int)
BEGIN
	
	SELECT
		COUNT(DET_TBL.id) AS asset_count
	FROM
		asset_master AM
	LEFT OUTER JOIN asset_details_ey DET_TBL ON DET_TBL.asset_id = AM.asset_id
	WHERE
		AM.company = `COMPANY`
	AND DET_TBL.location = `loc_id`;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_unfinished_audit_locations
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_unfinished_audit_locations`;
DELIMITER ;;
CREATE PROCEDURE `get_unfinished_audit_locations`(IN `COMPANY` int)
BEGIN

	SELECT
		AL.location_id AS id,
		LOC.location AS val
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND AL.completed_flag = 0;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_zonewise_assets
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_zonewise_assets`;
DELIMITER ;;
CREATE PROCEDURE `get_zonewise_assets`(IN `ZONE` int,IN `LINE` int)
BEGIN
	
	SELECT
	LVL_AND_CNT.lvl_id,
	LVL_AND_CNT.level_name,
	LVL_AND_CNT.cnt,
	concat(round(( LVL_AND_CNT.cnt/4 * 100 ),0),'%') AS percentage -- 4 because only 4 levels for a line
	FROM
	(SELECT
		LM.id AS lvl_id,
		LM.level_name,
		IFNULL(LVL_CNT.cnt,0) AS cnt
	FROM
		level_master LM
	LEFT OUTER JOIN (SELECT
		SD.level_id,
		COUNT(SD.level_id) AS cnt
	FROM
		store_details SD
	WHERE
		SD.zone_id = `ZONE`
		AND SD.line_id = `LINE`
		AND SD.active_flag = 1
	GROUP BY
		SD.zone_id, SD.line_id, SD.level_id) LVL_CNT ON LVL_CNT.level_id = LM.id) LVL_AND_CNT
	ORDER BY
		LVL_AND_CNT.lvl_id DESC;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_audit_header
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_audit_header`;
DELIMITER ;;
CREATE PROCEDURE `save_audit_header`(IN `au_name` varchar(200),IN `init_by` varchar(255),IN `st_date` varchar(20),IN `st_time` varchar(10),IN `com` int)
BEGIN
	
	INSERT INTO `audit_header` (
		`audit_name`,
		`initiated_by`,
		`start_date`,
		`start_time`,
		`active_flag`,
		`completed_flag`,
		`company`
	)
	VALUES
		(
			`au_name`,
			`init_by`,
			`st_date`,
			`st_time`,
			1,
			0,
			`com`
		);

		SELECT LAST_INSERT_ID() AS VAL;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_audit_locations
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_audit_locations`;
DELIMITER ;;
CREATE PROCEDURE `save_audit_locations`(IN `au_id` int,IN `loc_id` int)
BEGIN
	
	INSERT INTO `audit_locations` (
		`audit_id`,
		`location_id`,
		`active_flag`,
		`completed_flag`,
		`ongoing_flag`
	)
	VALUES
		(
			`au_id`,
			`loc_id`,
			1,
			0,
			0
		);

	SELECT LAST_INSERT_ID() AS VAL;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_audit_users
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_audit_users`;
DELIMITER ;;
CREATE PROCEDURE `save_audit_users`(IN `au_id` int,IN `uid` int)
BEGIN
	
	INSERT INTO `audit_users` (`audit_id`, `user_id`)
	VALUES
		(`au_id`, `uid`);

	SELECT LAST_INSERT_ID() AS VAL;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_grn_ey
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_grn_ey`;
DELIMITER ;;
CREATE PROCEDURE `save_grn_ey`(IN `COMPANY` int, IN `asset_id` int, IN `pono` varchar(200), IN `uomem` varchar(100), IN `l_qty` varchar(20), IN `s_qty` varchar(20), IN `d_qty` varchar(20), IN `tot_qty` varchar(20), IN `loc` int, IN `price_in` varchar(20), IN `curr` int, IN `date` varchar(20), IN `time` varchar(10))
BEGIN
	
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);

	SELECT @GRN_DETAILS_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "GRN_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('INSERT INTO ',@GRN_DETAILS_TABLE,' (
	`asset_id`,
	`po_number`,
	`uom`,
	`loose_qty`,
	`short_qty`,
	`damage_qty`,
	`total_qty`,
	`location_no`,
	`price`,
	`currency`,
	`in_date`,
	`in_time`
)
VALUES
	(
		"',`asset_id`,'",
		"',`pono`,'",
		"',`uomem`,'",
		"',`l_qty`,'",
		"',`s_qty`,'",
		"',`d_qty`,'",
		"',`tot_qty`,'",
		"',`loc`,'",
		"',`price_in`,'",
		"',`curr`,'",
		"',`date`,'",
		"',`time`,'");');
		
	prepare stmt from @qry1;
	execute stmt;

	SELECT 1 AS RET;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_grn_sunshine
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_grn_sunshine`;
DELIMITER ;;
CREATE PROCEDURE `save_grn_sunshine`(IN `COMPANY` int, IN `asset_id` int, IN `bno` varchar(200), IN `exp_date` varchar(20), IN `uomem` varchar(100), IN `car_p_size` varchar(100), IN `car_qty` varchar(20), IN `l_qty` varchar(20), IN `s_qty` varchar(20), IN `d_qty` varchar(20), IN `tot_qty` varchar(20), IN `loc` int, IN `price_in` varchar(20), IN `curr` int, IN `date` varchar(20), IN `time` varchar(10))
BEGIN
	
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);

	SELECT @GRN_DETAILS_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "GRN_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('INSERT INTO ',@GRN_DETAILS_TABLE,' (
	`asset_id`,
	`batch_no`,
	`expiry_date`,
	`uom`,
	`carton_pack_size`,
	`carton_qty`,
	`loose_qty`,
	`short_qty`,
	`damage_qty`,
	`total_qty`,
	`location_no`,
	`price`,
	`currency`,
	`in_date`,
	`in_time`
)
VALUES
	(
		"',`asset_id`,'",
		"',`bno`,'",
		"',`exp_date`,'",
		"',`uomem`,'",
		"',`car_p_size`,'",
		"',`car_qty`,'",
		"',`l_qty`,'",
		"',`s_qty`,'",
		"',`d_qty`,'",
		"',`tot_qty`,'",
		"',`loc`,'",
		"',`price_in`,'",
		"',`curr`,'",
		"',`date`,'",
		"',`time`,'");');
		
	prepare stmt from @qry1;
	execute stmt;

	SELECT 1 AS RET;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_new_item_grn
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_new_item_grn`;
DELIMITER ;;
CREATE PROCEDURE `save_new_item_grn`(IN `COMPANY` INT,IN `asset_name` VARCHAR(200),IN `asset_desc` VARCHAR(255),IN `asset_no` VARCHAR(100),IN `serial_no` VARCHAR(100),IN `barcode_id` VARCHAR(40),IN `po_number` VARCHAR(100),IN `price` VARCHAR(20),IN `uom` INT,IN `location` INT,IN `curr` INT,IN `ac_date` VARCHAR(20),IN `dep_method` INT,IN `ac_cost` VARCHAR(20),IN `use_life` INT,IN `indate` VARCHAR(20),IN `intime` VARCHAR(10))
BEGIN
	
	DECLARE DETAIL_TABLE VARCHAR(255);
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);
	DECLARE BARCODE_TABLE VARCHAR(255);
	DECLARE BAR_ID INT;
	DECLARE ASSET_ID INT;
	DECLARE NEW_BAR_ID INT;

	SET @qry1 := CONCAT('SELECT
	(SELECT
		CT.table_name
	FROM
		company_wise_tables CT
	WHERE
		CT.company = ',`COMPANY`,' 
	AND CT.string = "GRN_DETAILS"
	AND CT.active_flag = 1) AS grn_det_table,
	(SELECT 
		CT.table_name 
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = ',`COMPANY`,' 
		AND CT.string = "ASSET_DETAILS" 
		AND CT.active_flag = 1) AS detail_table,
	(SELECT 
		CT.table_name 
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = ',`COMPANY`,' 
		AND CT.string = "BARCODE_DETAILS" 
		AND CT.active_flag = 1) AS barcode_table INTO @GRN_DETAILS_TABLE,@DETAIL_TABLE,@BARCODE_TABLE;');
					
		prepare stmt from @qry1;
		execute stmt;

	SET @qry1 := CONCAT('SELECT count(id) INTO @BAR_ID FROM ',@BARCODE_TABLE,' BAR_DATA WHERE BAR_DATA.barcode = "',`barcode_id`,'";');
	prepare stmt from @qry1;
	execute stmt;

	IF(@BAR_ID > 0)
	THEN
	BEGIN

		SELECT '-10' AS RET; -- barcode available

	END;
	ELSE
	BEGIN

			SET @qry1 := CONCAT('INSERT INTO ',@BARCODE_TABLE,' (
				`barcode`,
				`status`,
				`active_flag`,
				`added_date`,
				`addded_time`
			)
			VALUES
				(
					"',`barcode_id`,'",
					NULL,
					1,
					"',`indate`,'",
					"',`intime`,'"
				);');
				prepare stmt from @qry1;
				execute stmt;

				SET @qry1 := CONCAT('SELECT LAST_INSERT_ID() INTO @NEW_BAR_ID;');
				prepare stmt from @qry1;
				execute stmt;

				SET @qry1 := CONCAT('INSERT INTO `asset_master` (
					`asset_name`,
					`description`,
					`tag_id`,
					`company`,
					`barcode_id`,
					`in_date`,
					`in_time`
				)
				VALUES
					(
						"',`asset_name`,'",
						"',`asset_desc`,'",
						NULL,
						',`COMPANY`,',
						',@NEW_BAR_ID,',
						"',`indate`,'",
						"',`intime`,'"
					);');
				prepare stmt from @qry1;
				execute stmt;

			SET @qry1 := CONCAT('SELECT LAST_INSERT_ID() INTO @ASSET_ID;');
			prepare stmt from @qry1;
			execute stmt;

			SET @qry1 := CONCAT('INSERT INTO ',@DETAIL_TABLE,' (
				`asset_id`,
				`asset_class`,
				`location`,
				`asset_no`,
				`serial_no`,
				`acquisition_date`,
				`acquisition_cost`,
				`depriciation_method`,
				`useful_life`,
				`salvage_value`
			)
			VALUES
				(
					',@ASSET_ID,',
					1,
					',`location`,',
					"',`asset_no`,'",
					"',`serial_no`,'",
					"',`ac_date`,'",
					"',`ac_cost`,'",
					',`dep_method`,',
					"',`use_life`,'",
					NULL
				);');
			prepare stmt from @qry1;
			execute stmt;

			SET @qry1 := CONCAT('INSERT INTO ',@GRN_DETAILS_TABLE,' (
				`asset_id`,
				`po_number`,
				`uom`,
				`location_no`,
				`price`,
				`currency`,
				`in_date`,
				`in_time`
			)
			VALUES
				(
					',@ASSET_ID,',
					"',`po_number`,'",
					',`uom`,',
					',`location`,',
					"',`price`,'",
					',`curr`,',
					"',`indate`,'",
					"',`intime`,'"
				);');
			prepare stmt from @qry1;
			execute stmt;

		SELECT "1" AS RET; 

	END;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for save_print_sunshine
-- ----------------------------
DROP PROCEDURE IF EXISTS `save_print_sunshine`;
DELIMITER ;;
CREATE PROCEDURE `save_print_sunshine`(IN `COMPANY` int,IN `uni_id` int,IN `asset_id` int, IN `grn_id` int,IN `pcode` varchar(200),IN `aflag` int,IN `bno` varchar(200),IN `price_val` varchar(50),IN `st_seq` int,IN `qty` int,IN `pdate` varchar(40),IN `ptime`  varchar(10))
BEGIN
	
	DECLARE BARCODE_PRINT_TABLE VARCHAR(255);

	SELECT @BARCODE_PRINT_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "BARCODE_PRINT" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('INSERT INTO ',@BARCODE_PRINT_TABLE,' (
	`unique_id`,
	`asset_id`,
	`grn_id`,
	`product_code`,
	`auto_flag`,
	`batch_no`,
	`price`,
	`start_sequence`,
	`quantity`,
	`print_date`,
	`print_time`
)
VALUES
	(
		',`uni_id`,',"',`asset_id`,'","',`grn_id`,'","',`pcode`,'",',`aflag`,',"',`bno`,'","',`price_val`,'",',`st_seq`,',',`qty`,',"',`pdate`,'","',`ptime`,'");');

	prepare stmt from @qry1;
	execute stmt;


	SELECT 1 AS RET;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for store_asssets
-- ----------------------------
DROP PROCEDURE IF EXISTS `store_asssets`;
DELIMITER ;;
CREATE PROCEDURE `store_asssets`(IN `tag_id` varchar(255),IN `zone` int,IN `line` int,IN `level` int)
BEGIN
	
DECLARE ASSETID INT;
DECLARE SPACE_AVAILABLE INT; -- 1 = available, 0 = not available
DECLARE ID_AVAILABLE INT; -- 1 = available, 0=not available


IF EXISTS(SELECT SD.id FROM store_details SD LEFT OUTER JOIN asset_master AM ON AM.asset_id = SD.asset_id LEFT OUTER JOIN tag_data TD ON TD.id = AM.tag_id WHERE TD.tag_id = `tag_id` AND SD.active_flag = 1)
THEN

SELECT 'ALLOCATED' AS RET;

ELSE

SELECT
		@ASSETID := AM.asset_id
	FROM
		tag_data TD
	LEFT OUTER JOIN asset_master AM ON AM.tag_id = TD.id
	WHERE
		TD.tag_id = `tag_id`;

SELECT
	 @SPACE_AVAILABLE := (CASE WHEN COUNT(SD.id) > 3 THEN 0 ELSE 1 END) AS space_available
	FROM
		`store_details` SD
	WHERE
		SD.zone_id = `zone`
		AND SD.line_id = `line`
		AND SD.level_id = `level`
		AND SD.active_flag = 1;


		IF(@SPACE_AVAILABLE = 1)
		THEN
		BEGIN

			INSERT INTO `store_details` (
			`asset_id`,
			`zone_id`,
			`line_id`,
			`level_id`,
			`active_flag`
		)
		VALUES
			(@ASSETID, `zone`, `line`, `level`, 1);

			SELECT '1' AS RET;

		END;
		ELSE
		BEGIN

			SELECT 'LEVEL' AS RET;

		END;

	END IF;


END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for test_procedure
-- ----------------------------
DROP PROCEDURE IF EXISTS `test_procedure`;
DELIMITER ;;
CREATE PROCEDURE `test_procedure`(IN `COMPANY` int,IN `BARCODE` varchar(255))
BEGIN
	
	DECLARE AUDIT_ID INT;
	DECLARE AUDIT_LOCATION_ID INT;
	DECLARE BAR_ID INT;
	DECLARE ORIGINAL_LOCATION_ID INT;
	DECLARE DETAIL_TABLE VARCHAR(255);
	DECLARE BARCODE_TABLE VARCHAR(255);
	
	SELECT
	@AUDIT_ID := (SELECT
		AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0) AS aid,
	@AUDIT_LOCATION_ID := (SELECT
		AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1) AS loc_id,
	@DETAIL_TABLE := (SELECT 
		CT.table_name 
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = `COMPANY` 
		AND CT.string = "ASSET_DETAILS" 
		AND CT.active_flag = 1) AS detail_table,
	@BARCODE_TABLE := (SELECT 
		CT.table_name 
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = `COMPANY` 
		AND CT.string = "BARCODE_DETAILS" 
		AND CT.active_flag = 1) AS barcode_table;

	IF EXISTS(SELECT BAR_DATA.id FROM barcode_data_ey BAR_DATA WHERE BAR_DATA.barcode = 'EY100002')
	THEN
	BEGIN

		SET @qry1 := CONCAT('SELECT
			@BAR_ID := BAR_DATA.id,
			@ORIGINAL_LOCATION_ID := DET_TBL.location
		FROM
			barcode_data_ey BAR_DATA
		LEFT OUTER JOIN asset_master AM ON AM.barcode_id = BAR_DATA.id
		LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
		WHERE
			BAR_DATA.barcode = ',`BARCODE`,';');
						
			prepare stmt from @qry1;
			execute stmt;

		
		IF(@AUDIT_LOCATION_ID = @ORIGINAL_LOCATION_ID)
		THEN
		BEGIN

			SET @qry1 := CONCAT('INSERT INTO `audit_location_bl` (
				`audit_id`,
				`barcode_id`,
				`location_id`
			)
			VALUES
				(NULL, NULL, NULL);');
						
			prepare stmt from @qry1;
			execute stmt;

		END;
		ELSE
		BEGIN
	
			SET @qry1 := CONCAT('INSERT INTO `audit_location_nbl` (
				`audit_id`,
				`barcode_id`,
				`found_location_id`
			)
			VALUES
				(',@AUDIT_ID,', ',@BAR_ID,', ',@AUDIT_LOCATION_ID,');');
						
			prepare stmt from @qry1;
			execute stmt;
	
		END;
		END IF;

		SELECT 1 AS RET;

	END;
	ELSE
		SELECT -1 AS RET;
		SELECT -1 AS RET; -- no data found for the barcode
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for transfer_assets
-- ----------------------------
DROP PROCEDURE IF EXISTS `transfer_assets`;
DELIMITER ;;
CREATE PROCEDURE `transfer_assets`(IN `tag_id` varchar(255),IN `zone` int,IN `line` int,IN `level` int)
BEGIN
	
	DECLARE STORED_ID INT;
	DECLARE SPACE_AVAILABLE INT; -- 1 = available, 0 = not available

	SELECT
		@STORED_ID := MAIN.id
	FROM
	(SELECT
		SD.id
	FROM
		store_details SD
	LEFT OUTER JOIN asset_master AM ON AM.asset_id = SD.asset_id
	LEFT OUTER JOIN tag_data TD ON TD.id = AM.tag_id
	WHERE
		SD.active_flag = 1
		AND TD.tag_id = `tag_id`

UNION ALL

SELECT 0 AS id) MAIN LIMIT 1;

	IF(@STORED_ID > 0)
	THEN

		SELECT
		 @SPACE_AVAILABLE := (CASE WHEN COUNT(SD.id) > 3 THEN 0 ELSE 1 END) AS space_available
		FROM
			`store_details` SD
		LEFT OUTER JOIN asset_master AM ON AM.asset_id = SD.asset_id
		LEFT OUTER JOIN tag_data TD ON TD.id = AM.tag_id
		WHERE
			SD.active_flag = 1
			AND TD.tag_id = `tag_id`;

		IF(@SPACE_AVAILABLE = 1)
		THEN
		BEGIN

			UPDATE `store_details`
			SET 
			 `zone_id` = `zone`,
			 `line_id` = `line`,
			 `level_id` = `level`
			WHERE
				(`id` = @STORED_ID);

			SELECT '1' AS RET;

		END;
		ELSE

			SELECT 'LEVEL' AS RET;

		END IF;

	ELSE

		SELECT '0' AS RET; -- only for data retrieving ease
		SELECT 'ALLOCATE' AS RET; -- not allocated or active_flag = 0

	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for update_audit_barcode_read
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_audit_barcode_read`;
DELIMITER ;;
CREATE PROCEDURE `update_audit_barcode_read`(IN `COMPANY` int,IN `BARCODE` varchar(255), IN `user_id` int)
BEGIN
	
	DECLARE AUDIT_ID INT;
	DECLARE AUDIT_LOCATION_ID INT;
	DECLARE BAR_ID INT;
	DECLARE ORIGINAL_LOCATION_ID INT;
	DECLARE DETAIL_TABLE VARCHAR(255);
	DECLARE BARCODE_TABLE VARCHAR(255);
	
	SELECT
	@AUDIT_ID := (SELECT
		AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0) AS aid,
	@AUDIT_LOCATION_ID := (SELECT
		AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1) AS loc_id,
	@DETAIL_TABLE := (SELECT 
		CT.table_name 
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = `COMPANY` 
		AND CT.string = "ASSET_DETAILS" 
		AND CT.active_flag = 1) AS detail_table,
	@BARCODE_TABLE := (SELECT 
		CT.table_name 
	FROM 
		company_wise_tables CT 
	WHERE 
		CT.company = `COMPANY` 
		AND CT.string = "BARCODE_DETAILS" 
		AND CT.active_flag = 1) AS barcode_table;

	IF EXISTS(SELECT BAR_DATA.id FROM barcode_data_ey BAR_DATA WHERE BAR_DATA.barcode = `BARCODE`)
	THEN
	BEGIN
	
		SET @qry1 := CONCAT('SELECT
			BAR_DATA.id, DET_TBL.location INTO @BAR_ID, @ORIGINAL_LOCATION_ID   
		FROM
			',@BARCODE_TABLE,' BAR_DATA
		LEFT OUTER JOIN asset_master AM ON AM.barcode_id = BAR_DATA.id
		LEFT OUTER JOIN ',@DETAIL_TABLE,' DET_TBL ON DET_TBL.asset_id = AM.asset_id
		WHERE
			BAR_DATA.barcode = "',`BARCODE`,'";');
						
			prepare stmt from @qry1;
			execute stmt;

		
		IF(@AUDIT_LOCATION_ID = @ORIGINAL_LOCATION_ID)
		THEN
		BEGIN

			IF EXISTS(SELECT BL.bl_id FROM audit_location_bl BL WHERE BL.audit_id = @AUDIT_ID AND BL.barcode_id = @BAR_ID AND BL.location_id = @AUDIT_LOCATION_ID)
			THEN
			BEGIN

				SELECT -2 AS RET; -- record inserted

			END;
			ELSE
			BEGIN

				SET @qry1 := CONCAT('INSERT INTO `audit_location_bl` (
					`audit_id`,
					`barcode_id`,
					`location_id`,
					`scanned_user`
				)
				VALUES
					(',@AUDIT_ID,', ',@BAR_ID,', ',@AUDIT_LOCATION_ID,',',`user_id`,');');
							
				prepare stmt from @qry1;
				execute stmt;

				SELECT 1 AS RET;

			END;
			END IF;

		END;
		ELSE
		BEGIN
	
			IF EXISTS(SELECT NBL.nbl_id FROM audit_location_nbl NBL WHERE NBL.audit_id = @AUDIT_ID AND NBL.barcode_id = @BAR_ID AND NBL.found_location_id = @AUDIT_LOCATION_ID)
			THEN
			BEGIN

				SELECT -2 AS RET; -- record inserted

			END;
			ELSE
			BEGIN

				SET @qry1 := CONCAT('INSERT INTO `audit_location_nbl` (
					`audit_id`,
					`barcode_id`,
					`found_location_id`,
					`scanned_user`
				)
				VALUES
					(',@AUDIT_ID,', ',@BAR_ID,', ',@AUDIT_LOCATION_ID,',',`user_id`,');');
							
				prepare stmt from @qry1;
				execute stmt;

				SELECT 1 AS RET;
			
			END;
			END IF;

		END;
		END IF;

	END;
	ELSE
		SELECT -1 AS RET; -- no data found for the barcode
	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for update_audit_completion
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_audit_completion`;
DELIMITER ;;
CREATE PROCEDURE `update_audit_completion`(IN `COMPANY` int, IN `edate` varchar(20), IN `etime` varchar(10))
BEGIN
	
	DECLARE AUDIT_ID INT;
	DECLARE LOCATION_ID INT;

	SELECT
	@AUDIT_ID := (SELECT
		AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0) AS aid,
	@LOCATION_ID := (SELECT
		AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1) AS loc_id;

	SET @qry1 := CONCAT('UPDATE `audit_locations`
	SET
	 `ongoing_flag` = 0,
	 `completed_flag` = 1
	WHERE
		`audit_id` = ',@AUDIT_ID,'
	AND `location_id` = ',@LOCATION_ID,'
	AND `active_flag` = 1;');
				
			prepare stmt from @qry1;
			execute stmt;

	SET @qry1 := CONCAT('UPDATE `audit_header`
	SET 
	 `completed_flag` = 1,
	 `company` = ',`COMPANY`,',
	 `end_date` = "',`edate`,'",
	 `end_time` = "',`etime`,'"
	WHERE
		(`id` = ',@AUDIT_ID,');');
				
			prepare stmt from @qry1;
			execute stmt;

	SELECT 1 AS RET;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for update_audit_location_end
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_audit_location_end`;
DELIMITER ;;
CREATE PROCEDURE `update_audit_location_end`(IN `COMPANY` int)
BEGIN
	
	DECLARE AUDIT_ID INT;
	DECLARE LOCATION_ID INT;

	SELECT
	@AUDIT_ID := (SELECT
		AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0) AS aid,
	@LOCATION_ID := (SELECT
		AL.location_id
	FROM
		audit_locations AL
	LEFT OUTER JOIN audit_header AH ON AH.id = AL.audit_id
	LEFT OUTER JOIN location_master LOC ON LOC.id = AL.location_id
	WHERE
	AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0
	AND	AL.ongoing_flag = 1) AS loc_id;
	
	SET @qry1 := CONCAT('UPDATE `audit_locations`
	SET
	 `ongoing_flag` = 0,
	 `completed_flag` = 1
	WHERE
		`audit_id` = ',@AUDIT_ID,'
	AND `location_id` = ',@LOCATION_ID,'
	AND `active_flag` = 1;');
				
			prepare stmt from @qry1;
			execute stmt;

	SELECT 1 AS RET;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for update_audit_location_start
-- ----------------------------
DROP PROCEDURE IF EXISTS `update_audit_location_start`;
DELIMITER ;;
CREATE PROCEDURE `update_audit_location_start`(IN `COMPANY` int,IN `location_id` int)
BEGIN
	
	DECLARE AUDIT_ID INT;

	SELECT
		@AUDIT_ID := AH.id
	FROM
		audit_header AH
	WHERE
		AH.company = `COMPANY`
	AND AH.active_flag = 1
	AND AH.completed_flag = 0;
	
	SET @qry1 := CONCAT('UPDATE `audit_locations`
	SET
	 `ongoing_flag` = 1
	WHERE
		`audit_id` = ',@AUDIT_ID,'
	AND `location_id` = ',`location_id`,'
	AND `active_flag` = 1;');
				
			prepare stmt from @qry1;
			execute stmt;

	SELECT 1 AS RET;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for user_signin
-- ----------------------------
DROP PROCEDURE IF EXISTS `user_signin`;
DELIMITER ;;
CREATE PROCEDURE `user_signin`(IN `UNAME` varchar(100),IN `PASSWORD` varchar(255), IN `COMPANY` INT)
BEGIN

	DECLARE USERID INT;


	IF EXISTS (SELECT ul.id FROM user_login ul WHERE ul.user_name = `UNAME` AND ul.`password` = `PASSWORD` AND ul.approved_flag = 1 AND ul.company = `COMPANY`)
	THEN

BEGIN
-- Getting user details for username and password
SELECT 
@USERID := ul.id AS id, 
ul.known_name, 
ul.user_name, 
ul.first_name, 
ul.last_name,
us.salutation,
us.id AS sal_id,
usl.user_level,
ul.email,
ul.company
FROM 
user_login ul 
LEFT OUTER JOIN user_salutation us ON us.id = ul.salutation
LEFT OUTER JOIN user_levels usl ON usl.id = ul.user_level 
WHERE 
ul.user_name = `UNAME` 
AND ul.`password` = `PASSWORD`
AND ul.company = `COMPANY`;

		-- SELECT @USERID := tp.ID FROM TEMP tp;

		-- SELECT * FROM TEMP;

-- GET ONLY PARENT NAVIGATIONS 
		SELECT
lnm.id,
lnm.main_label,
lnm.sub_desc,
lnm.controller,
lnu.action,
lnm.parent_id,
lnm.sub_level_one_id,
lnm.icon,
lnm.menu_label,
lnm.sub_level_two_id,
lnm.main_view_order,
lnm.sub_view_order
FROM
left_navigation_menu lnm
LEFT OUTER JOIN left_navigation_urls lnu ON lnu.left_navigation_id = lnm.id AND lnu.company_id = `COMPANY`
WHERE
lnm.id IN (SELECT 
up.navigation_id 
FROM 
user_privilege up
WHERE
up.user_id = @USERID AND up.active_flag = 1)
AND lnm.parent_id = 1
ORDER BY lnm.main_view_order ASC;

-- GET ONLY SUB NAVIGATIONS
SELECT
lnm.id,
lnm.main_label,
lnm.sub_desc,
lnm.controller,
lnu.action,
lnm.parent_id,
lnm.sub_level_one_id,
lnm.icon,
lnm.menu_label,
lnm.sub_level_two_id,
lnm.main_view_order,
lnm.sub_view_order
FROM
left_navigation_menu lnm
LEFT OUTER JOIN left_navigation_urls lnu ON lnu.left_navigation_id = lnm.id AND lnu.company_id = `COMPANY`
WHERE
lnm.id IN (SELECT 
up.navigation_id 
FROM 
user_privilege up
WHERE
up.user_id = @USERID AND up.active_flag = 1)
AND lnm.sub_level_one_id > 0
ORDER BY lnm.sub_level_one_id ASC, lnm.sub_view_order ASC;

END;

	ELSEIF EXISTS(SELECT ul.id FROM user_login ul WHERE ul.user_name = `UNAME` AND ul.`password` = `PASSWORD` AND ul.approved_flag = 0 AND ul.company = `COMPANY`)
	THEN
	BEGIN
		SELECT 'approve' AS RET;
	END;

	END IF;
	
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for view_grn
-- ----------------------------
DROP PROCEDURE IF EXISTS `view_grn`;
DELIMITER ;;
CREATE PROCEDURE `view_grn`(IN `COMPANY` int)
BEGIN
	
	DECLARE GRN_DETAILS_TABLE VARCHAR(255);
	DECLARE DETAIL_TABLE VARCHAR(255);
	SELECT @DETAIL_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "ASSET_DETAILS" AND CT.active_flag = 1;
	SELECT @GRN_DETAILS_TABLE := CT.table_name FROM company_wise_tables CT WHERE CT.company = `COMPANY` AND CT.string = "GRN_DETAILS" AND CT.active_flag = 1;

	SET @qry1 := CONCAT('SELECT
	AM.asset_name,
	AD.*,
	GRN.*,
	LOC.location,
	CONCAT(GRN.price," ",CM.currency) AS price
FROM
	',@GRN_DETAILS_TABLE,' GRN
LEFT OUTER JOIN asset_master AM ON AM.asset_id = GRN.asset_id
LEFT OUTER JOIN ',@DETAIL_TABLE,' AD ON AD.asset_id = GRN.asset_id
LEFT OUTER JOIN location_master LOC ON LOC.company = ',`COMPANY`,' AND LOC.id = GRN.location_no
LEFT OUTER JOIN currency_master CM ON CM.id = GRN.currency',';');
			
		prepare stmt from @qry1;
		execute stmt;

END
;;
DELIMITER ;
