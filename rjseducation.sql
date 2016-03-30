SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema rjseducation
-- -----------------------------------------------------

USE `rjseducation` ;

-- -----------------------------------------------------
-- Table `rjseducation`.`class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rjseducation`.`class` ;

CREATE TABLE IF NOT EXISTS `rjseducation`.`class` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `classcode` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rjseducation`.`member`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rjseducation`.`member` ;

CREATE TABLE IF NOT EXISTS `rjseducation`.`member` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `usertype` VARCHAR(45) NOT NULL,
  `class_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_member_class_idx` (`class_id` ASC),
  CONSTRAINT `fk_member_class`
    FOREIGN KEY (`class_id`)
    REFERENCES `rjseducation`.`class` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rjseducation`.`subject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rjseducation`.`subject` ;

CREATE TABLE IF NOT EXISTS `rjseducation`.`subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rjseducation`.`assignment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rjseducation`.`assignment` ;

CREATE TABLE IF NOT EXISTS `rjseducation`.`assignment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `exam` TINYINT(1) NOT NULL,
  `subject_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_assignment_subject1_idx` (`subject_id` ASC),
  CONSTRAINT `fk_assignment_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `rjseducation`.`subject` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rjseducation`.`result`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rjseducation`.`result` ;

CREATE TABLE IF NOT EXISTS `rjseducation`.`result` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `grade` INT NULL,
  `assignment_id` INT NOT NULL,
  `member_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_result_assignment1_idx` (`assignment_id` ASC),
  INDEX `fk_result_member1_idx` (`member_id` ASC),
  CONSTRAINT `fk_result_assignment1`
    FOREIGN KEY (`assignment_id`)
    REFERENCES `rjseducation`.`assignment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_result_member1`
    FOREIGN KEY (`member_id`)
    REFERENCES `rjseducation`.`member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `rjseducation`.`member`
-- -----------------------------------------------------
START TRANSACTION;
USE `rjseducation`;
INSERT INTO `rjseducation`.`member` (`id`, `username`, `password`, `usertype`, `class_id`) VALUES (1, 'jmorit', '0e0706cfbb759f8347ae615fedb66a4f', 'ADMIN', NULL);

COMMIT;

