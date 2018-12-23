-- MySQL Script generated by MySQL Workbench
-- Sun Dec 23 09:57:45 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mobile_drs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mobile_drs
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mobile_drs` DEFAULT CHARACTER SET utf8 ;
USE `mobile_drs` ;

-- -----------------------------------------------------
-- Table `mobile_drs`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`roles` (
  `roles_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `roles_name` VARCHAR(45) NULL,
  PRIMARY KEY (`roles_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_firstname` VARCHAR(45) NULL,
  `user_lastname` VARCHAR(45) NULL,
  `user_email` VARCHAR(45) NULL,
  `user_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `user_password` VARCHAR(255) NULL,
  `user_roleID` INT UNSIGNED NULL,
  `user_dateOfBirth` DATE NULL,
  `user_phone` VARCHAR(20) NULL,
  `user_address` VARCHAR(255) NULL,
  `user_gender` VARCHAR(10) NULL,
  `user_photo` VARCHAR(15) NULL,
  PRIMARY KEY (`user_id`),
  INDEX `user_roleID_idx` (`user_roleID` ASC),
  CONSTRAINT `user_roleID`
    FOREIGN KEY (`user_roleID`)
    REFERENCES `mobile_drs`.`roles` (`roles_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`permissions` (
  `permissions_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permissions_name` VARCHAR(255) NULL,
  `permissions_module` VARCHAR(45) NULL,
  PRIMARY KEY (`permissions_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`roles_permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`roles_permission` (
  `rp_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rp_rolesID` INT UNSIGNED NULL,
  `rp_permissionsID` INT UNSIGNED NULL,
  PRIMARY KEY (`rp_id`),
  INDEX `rp_rolesID_idx` (`rp_rolesID` ASC),
  INDEX `rp_permissionsID_idx` (`rp_permissionsID` ASC),
  CONSTRAINT `rp_rolesID`
    FOREIGN KEY (`rp_rolesID`)
    REFERENCES `mobile_drs`.`roles` (`roles_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `rp_permissionsID`
    FOREIGN KEY (`rp_permissionsID`)
    REFERENCES `mobile_drs`.`permissions` (`permissions_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = cp850;


-- -----------------------------------------------------
-- Table `mobile_drs`.`provider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`provider` (
  `provider_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider_firstname` VARCHAR(45) NULL,
  `provider_lastname` VARCHAR(45) NULL,
  `provider_contactNum` VARCHAR(45) NULL,
  `provider_email` VARCHAR(45) NULL,
  `provider_address` VARCHAR(255) NULL,
  `provider_dateOfBirth` DATE NULL,
  `provider_languages` VARCHAR(255) NULL,
  `provider_areas` VARCHAR(255) NULL,
  `provider_npi` VARCHAR(45) NULL,
  `provider_dea` VARCHAR(45) NULL,
  `provider_license` VARCHAR(45) NULL,
  `provider_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `provider_rate_initialVisit` VARCHAR(10) NULL,
  `provider_rate_followUpVisit` VARCHAR(10) NULL,
  `provider_rate_aw` VARCHAR(10) NULL,
  `provider_rate_acp` VARCHAR(10) NULL,
  `provider_rate_noShowPT` VARCHAR(10) NULL,
  `provider_rate_mileage` VARCHAR(10) NULL,
  `provider_gender` VARCHAR(10) NULL,
  PRIMARY KEY (`provider_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`home_health_care`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`home_health_care` (
  `hhc_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hhc_name` VARCHAR(45) NULL,
  `hhc_contact_name` VARCHAR(45) NULL,
  `hhc_phoneNumber` VARCHAR(45) NULL,
  `hhc_faxNumber` VARCHAR(45) NULL,
  `hhc_email` VARCHAR(45) NULL,
  `hhc_address` VARCHAR(255) NULL,
  `hhc_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hhc_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`patient` (
  `patient_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_firstname` VARCHAR(45) NULL,
  `patient_lastname` VARCHAR(45) NULL,
  `patient_gender` VARCHAR(10) NULL,
  `patient_referralDate` DATE NULL,
  `patient_medicareNum` VARCHAR(45) NULL,
  `patient_dateOfBirth` DATE NULL,
  `patient_phoneNum` VARCHAR(45) NULL,
  `patient_address` VARCHAR(255) NULL,
  `patient_hhcID` INT UNSIGNED NULL,
  `patient_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `patient_caregiver_family` VARCHAR(45) NULL,
  PRIMARY KEY (`patient_id`),
  INDEX `patient_hhcID_idx` (`patient_hhcID` ASC),
  CONSTRAINT `patient_hhcID`
    FOREIGN KEY (`patient_hhcID`)
    REFERENCES `mobile_drs`.`home_health_care` (`hhc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`type_of_visits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`type_of_visits` (
  `tov_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tov_name` VARCHAR(45) NULL,
  PRIMARY KEY (`tov_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`patient_transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`patient_transactions` (
  `pt_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pt_tovID` INT UNSIGNED NULL,
  `pt_patientID` INT UNSIGNED NULL,
  `pt_providerID` INT UNSIGNED NULL,
  `pt_dateOfService` DATE NULL,
  `pt_deductible` VARCHAR(10) NULL,
  `pt_serviceStatus` VARCHAR(10) NULL,
  `pt_aw_ippe_date` DATE NULL,
  `pt_aw_ippe_code` VARCHAR(10) NULL,
  `pt_performed` TINYINT(1) NULL,
  `pt_acp` TINYINT(1) NULL,
  `pt_diabetes` TINYINT(1) NULL,
  `pt_tobacco` TINYINT(1) NULL,
  `pt_tcm` TINYINT(1) NULL,
  `pt_others` VARCHAR(45) NULL,
  `pt_icd10_codes` VARCHAR(255) NULL,
  `pt_dateBilled` DATE NULL,
  `pt_visitBilled` DATE NULL,
  `pt_dateRefEmailed` DATE NULL,
  `pt_notes` VARCHAR(255) NULL,
  `pt_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `pt_mileage` VARCHAR(45) NULL,
  PRIMARY KEY (`pt_id`),
  INDEX `pt_patientID_idx` (`pt_patientID` ASC),
  INDEX `pt_providerID_idx` (`pt_providerID` ASC),
  INDEX `pt_tovID_idx` (`pt_tovID` ASC),
  CONSTRAINT `pt_patientID`
    FOREIGN KEY (`pt_patientID`)
    REFERENCES `mobile_drs`.`patient` (`patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pt_providerID`
    FOREIGN KEY (`pt_providerID`)
    REFERENCES `mobile_drs`.`provider` (`provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pt_tovID`
    FOREIGN KEY (`pt_tovID`)
    REFERENCES `mobile_drs`.`type_of_visits` (`tov_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`patient_CPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`patient_CPO` (
  `ptcpo_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ptcpo_patientID` INT UNSIGNED NULL,
  `ptcpo_period` VARCHAR(45) NULL,
  `ptcpo_dateSigned` DATE NULL,
  `ptcpo_firstMonthCPO` VARCHAR(45) NULL,
  `ptcpo_secondMonthCPO` VARCHAR(45) NULL,
  `ptcpo_thirdMonthCPO` VARCHAR(45) NULL,
  `ptcpo_dischargeDate` DATE NULL,
  `ptcpo_dateBilled` DATE NULL,
  `ptcpo_status` VARCHAR(30) NULL,
  `ptcpo_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ptcpo_id`),
  INDEX `ptcpo_patientID_idx` (`ptcpo_patientID` ASC),
  CONSTRAINT `ptcpo_patientID`
    FOREIGN KEY (`ptcpo_patientID`)
    REFERENCES `mobile_drs`.`patient` (`patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`patient_communication_notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`patient_communication_notes` (
  `ptcn_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ptcn_patientID` INT UNSIGNED NULL,
  `ptcn_message` VARCHAR(255) NULL,
  `ptcn_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ptcn_id`),
  INDEX `ptcn_patientID_idx` (`ptcn_patientID` ASC),
  CONSTRAINT `ptcn_patientID`
    FOREIGN KEY (`ptcn_patientID`)
    REFERENCES `mobile_drs`.`patient` (`patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`provider_route_sheet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`provider_route_sheet` (
  `prs_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `prs_providerID` INT UNSIGNED NULL,
  `prs_dateOfService` DATE NULL,
  `prs_dateCreated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prs_id`),
  INDEX `prs_providerID_idx` (`prs_providerID` ASC),
  CONSTRAINT `prs_providerID`
    FOREIGN KEY (`prs_providerID`)
    REFERENCES `mobile_drs`.`provider` (`provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mobile_drs`.`provider_route_sheet_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mobile_drs`.`provider_route_sheet_list` (
  `prsl_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `prsl_prsID` INT UNSIGNED NULL,
  `prsl_time` VARCHAR(30) NULL,
  `prsl_patientID` INT UNSIGNED NULL,
  `prsl_tovID` INT UNSIGNED NULL,
  `prsl_hhcID` INT UNSIGNED NULL,
  `prsl_notes` VARCHAR(255) NULL,
  PRIMARY KEY (`prsl_id`),
  INDEX `prsl_patientID_idx` (`prsl_patientID` ASC),
  INDEX `prsl_prsID_idx` (`prsl_prsID` ASC),
  INDEX `prsl_tovID_idx` (`prsl_tovID` ASC),
  INDEX `prsl_hhcID_idx` (`prsl_hhcID` ASC),
  CONSTRAINT `prsl_patientID`
    FOREIGN KEY (`prsl_patientID`)
    REFERENCES `mobile_drs`.`patient` (`patient_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `prsl_prsID`
    FOREIGN KEY (`prsl_prsID`)
    REFERENCES `mobile_drs`.`provider_route_sheet` (`prs_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `prsl_tovID`
    FOREIGN KEY (`prsl_tovID`)
    REFERENCES `mobile_drs`.`type_of_visits` (`tov_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `prsl_hhcID`
    FOREIGN KEY (`prsl_hhcID`)
    REFERENCES `mobile_drs`.`home_health_care` (`hhc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mobile_drs`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `mobile_drs`;
INSERT INTO `mobile_drs`.`roles` (`roles_id`, `roles_name`) VALUES (1, 'Super Administrator');
INSERT INTO `mobile_drs`.`roles` (`roles_id`, `roles_name`) VALUES (2, 'Administrator');
INSERT INTO `mobile_drs`.`roles` (`roles_id`, `roles_name`) VALUES (3, 'Normal');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mobile_drs`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `mobile_drs`;
INSERT INTO `mobile_drs`.`user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_dateCreated`, `user_password`, `user_roleID`, `user_dateOfBirth`, `user_phone`, `user_address`, `user_gender`, `user_photo`) VALUES (1, 'Nikkolai', 'Fernandez', 'nikkolaifernandez14@gmaiml.com', '2018/11/25', '$2y$10$NRfEbjlqjRpXiSZaw.DzW.d5.Zw2I5q8HOODaKPvsfAM3HFmgrOrW', 1, '1992/11/14', NULL, NULL, NULL, NULL);
INSERT INTO `mobile_drs`.`user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_dateCreated`, `user_password`, `user_roleID`, `user_dateOfBirth`, `user_phone`, `user_address`, `user_gender`, `user_photo`) VALUES (2, 'Jayson', 'Arcayna', 'jayson.arcayna@gmail.com', '2018/11/25', '$2y$10$CVTPVGMFB4QcC4OXyQcYMOsDdxjRQ57E0/nGNrn3P3QVdLS3b0zZq', 1, '1992/11/14', NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mobile_drs`.`permissions`
-- -----------------------------------------------------
START TRANSACTION;
USE `mobile_drs`;
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (1, 'add_user', 'UM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (2, 'edit_user', 'UM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (3, 'view_user', 'UM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (4, 'search_user', 'UM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (5, 'list_user', 'UM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (6, 'add_provider', 'PPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (7, 'edit_provider', 'PPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (8, 'view_provider', 'PPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (9, 'search_provider', 'PPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (10, 'list_provider', 'PPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (11, 'add_hhc', 'HHCPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (12, 'edit_hhc', 'HHCPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (13, 'view_hhc', 'HHCPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (14, 'search_hhc', 'HHCPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (15, 'list_hhc', 'HHCPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (16, 'add_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (17, 'edit_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (18, 'view_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (19, 'search_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (20, 'list_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (21, 'add_tr', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (22, 'edit_tr', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (23, 'view_tr', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (24, 'list_tr', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (25, 'add_cn', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (26, 'edit_cn', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (27, 'list_cn', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (28, 'view_cn', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (29, 'add_cpo', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (30, 'edit_cpo', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (31, 'view_cpo', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (32, 'add_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (33, 'edit_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (34, 'view_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (35, 'list_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (36, 'search_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (37, 'download_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (38, 'print_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (39, 'generate_pr', 'PRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (40, 'save_pr', 'PRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (41, 'print_pr', 'PRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (42, 'send_pr', 'PRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (43, 'paid_batch_pr', 'PRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (44, 'generate_sbawr', 'SBAWRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (45, 'save_sbawr', 'SBAWRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (46, 'print_sbawr', 'SBAWRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (47, 'generate_sbhvr', 'SBHVRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (48, 'save_sbhvr', 'SBHVRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (49, 'print_sbhvr', 'SBHVRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (50, 'generate_sbfvr', 'SBFVRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (51, 'save_sbfvr', 'SBFVRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (52, 'print_sbfvr', 'SBFVRG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (53, 'generate_sbcpor', 'SBCPORG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (54, 'save__sbcpor', 'SBCPORG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (55, 'print__sbcpor', 'SBCPORG');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (56, 'delete_user', 'UM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (57, 'email_prs', 'PRSM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (58, 'print_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (59, 'downoad_pt', 'PTPM');
INSERT INTO `mobile_drs`.`permissions` (`permissions_id`, `permissions_name`, `permissions_module`) VALUES (60, 'delete_cn', 'PTPM');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mobile_drs`.`roles_permission`
-- -----------------------------------------------------
START TRANSACTION;
USE `mobile_drs`;
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (1, 1, 1);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (2, 1, 2);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (3, 1, 3);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (4, 1, 4);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (5, 1, 5);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (6, 1, 6);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (7, 1, 7);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (8, 1, 8);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (9, 1, 9);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (10, 1, 10);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (11, 1, 11);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (12, 1, 12);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (13, 1, 13);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (14, 1, 14);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (15, 1, 15);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (16, 1, 16);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (17, 1, 17);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (18, 1, 18);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (19, 1, 19);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (20, 1, 20);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (21, 1, 21);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (22, 1, 22);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (23, 1, 23);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (24, 1, 24);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (25, 1, 25);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (26, 1, 26);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (27, 1, 27);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (28, 1, 28);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (29, 1, 29);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (30, 1, 30);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (31, 1, 31);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (32, 1, 32);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (33, 1, 33);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (34, 1, 34);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (35, 1, 35);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (36, 1, 36);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (37, 1, 37);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (38, 1, 38);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (39, 1, 39);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (40, 1, 40);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (41, 1, 41);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (42, 1, 42);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (43, 1, 43);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (44, 1, 44);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (45, 1, 45);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (46, 1, 46);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (47, 1, 47);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (48, 1, 48);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (49, 1, 49);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (50, 1, 50);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (51, 1, 51);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (52, 1, 52);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (53, 1, 53);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (54, 1, 54);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (55, 1, 55);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (56, 2, 1);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (57, 2, 2);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (58, 2, 3);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (59, 2, 4);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (60, 2, 5);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (61, 2, 6);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (62, 2, 7);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (63, 2, 8);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (64, 2, 9);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (65, 2, 10);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (66, 2, 11);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (67, 2, 12);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (68, 2, 13);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (69, 2, 14);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (70, 2, 15);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (71, 2, 16);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (72, 2, 17);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (73, 2, 18);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (74, 2, 19);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (75, 2, 20);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (76, 2, 21);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (77, 2, 22);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (78, 2, 23);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (79, 2, 24);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (80, 2, 25);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (81, 2, 26);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (82, 2, 27);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (83, 2, 28);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (84, 2, 29);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (85, 2, 30);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (86, 2, 31);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (87, 2, 32);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (88, 2, 33);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (89, 2, 34);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (90, 2, 35);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (91, 2, 36);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (92, 2, 37);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (93, 2, 38);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (94, 2, 39);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (95, 2, 40);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (96, 2, 41);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (97, 2, 42);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (98, 2, 43);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (99, 2, 44);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (100, 2, 45);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (101, 2, 46);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (102, 2, 47);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (103, 2, 48);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (104, 2, 49);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (105, 2, 50);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (106, 2, 51);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (107, 2, 52);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (108, 2, 53);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (109, 2, 54);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (110, 2, 55);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (111, 3, 16);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (112, 3, 17);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (113, 3, 18);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (114, 3, 19);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (115, 3, 20);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (116, 3, 21);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (117, 3, 22);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (118, 3, 23);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (119, 3, 24);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (120, 3, 25);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (121, 3, 26);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (122, 3, 27);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (123, 3, 28);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (124, 3, 29);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (125, 3, 30);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (126, 3, 31);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (127, 1, 55);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (128, 2, 55);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (128, 1, 56);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (129, 2, 56);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (130, 1, 57);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (131, 2, 57);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (132, 1, 58);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (133, 1, 59);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (134, 2, 58);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (135, 2, 59);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (136, 3, 58);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (137, 3, 59);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (138, 1, 60);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (139, 2, 60);
INSERT INTO `mobile_drs`.`roles_permission` (`rp_id`, `rp_rolesID`, `rp_permissionsID`) VALUES (140, 3, 60);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mobile_drs`.`type_of_visits`
-- -----------------------------------------------------
START TRANSACTION;
USE `mobile_drs`;
INSERT INTO `mobile_drs`.`type_of_visits` (`tov_id`, `tov_name`) VALUES (1, 'Initial Visit (Home)');
INSERT INTO `mobile_drs`.`type_of_visits` (`tov_id`, `tov_name`) VALUES (2, 'Initial Visit (Facility)');
INSERT INTO `mobile_drs`.`type_of_visits` (`tov_id`, `tov_name`) VALUES (3, 'Follow-up Visit (Home)');
INSERT INTO `mobile_drs`.`type_of_visits` (`tov_id`, `tov_name`) VALUES (4, 'Follow-up Visit (Facility)');
INSERT INTO `mobile_drs`.`type_of_visits` (`tov_id`, `tov_name`) VALUES (5, 'No Show');
INSERT INTO `mobile_drs`.`type_of_visits` (`tov_id`, `tov_name`) VALUES (6, 'Cancelled');

COMMIT;

