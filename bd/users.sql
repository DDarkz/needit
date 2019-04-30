
-- -----------------------------------------------------
-- Schema bdusers
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bdusers` ;

-- -----------------------------------------------------
-- Schema bdusers
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdusers` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `bdusers` ;

-- -----------------------------------------------------
-- Table `bdusers`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdusers`.`users` ;

CREATE TABLE IF NOT EXISTS `bdusers`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin1234'),
(2, 'mjoly', 'mjoly1234');