-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_app_web_php
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_app_web_php
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_app_web_php` DEFAULT CHARACTER SET utf8 ;
USE `db_app_web_php` ;

-- -----------------------------------------------------
-- Table `db_app_web_php`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Roles` (
  `rol_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `last_modification` DATETIME NOT NULL DEFAULT current_timestamp,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`rol_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Users` (
  `doc_id` INT NOT NULL AUTO_INCREMENT,
  `rol_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `profile_image` VARCHAR(255) NULL,
  `adress` VARCHAR(45) NULL,
  `phone_number` INT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `last_modification` DATETIME NOT NULL DEFAULT current_timestamp,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`doc_id`),
  INDEX `fk_User_Rol_idx` (`rol_id` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `phone_number_UNIQUE` (`phone_number` ASC),
  CONSTRAINT `fk_User_Rol`
    FOREIGN KEY (`rol_id`)
    REFERENCES `db_app_web_php`.`Roles` (`rol_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Inventories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Inventories` (
  `inventory_id` INT NOT NULL,
  `storage_warehouse` VARCHAR(45) NOT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `last_modification` DATETIME NOT NULL DEFAULT current_timestamp,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`inventory_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Products` (
  `product_id` INT NOT NULL,
  `inventory_id` INT NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `mark` VARCHAR(45) NOT NULL,
  `colection` VARCHAR(45) NOT NULL,
  `gender` VARCHAR(45) NOT NULL,
  `size` INT NOT NULL,
  `stock` INT UNSIGNED NOT NULL,
  `purchase_value` FLOAT NOT NULL,
  `sale_value` FLOAT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `last_modification` DATETIME NOT NULL DEFAULT current_timestamp,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`product_id`),
  INDEX `fk_Producto_Inventario1_idx` (`inventory_id` ASC),
  CONSTRAINT `fk_Producto_Inventario1`
    FOREIGN KEY (`inventory_id`)
    REFERENCES `db_app_web_php`.`Inventories` (`inventory_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Payment_methods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Payment_methods` (
  `payment_method_id` INT NOT NULL AUTO_INCREMENT,
  `payment_type` VARCHAR(45) NOT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `last_modification` DATETIME NOT NULL DEFAULT current_timestamp,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`payment_method_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Orders` (
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `payment_method_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `subtotal_amount` FLOAT NOT NULL,
  `created_date` DATETIME NOT NULL,
  `last_modification` DATETIME NOT NULL,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`order_id`),
  INDEX `fk_Pedido_Metodo_pago1_idx` (`payment_method_id` ASC),
  CONSTRAINT `fk_Pedido_Metodo_pago1`
    FOREIGN KEY (`payment_method_id`)
    REFERENCES `db_app_web_php`.`Payment_methods` (`payment_method_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Customers_select_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Customers_select_product` (
  `selection_id` INT NOT NULL AUTO_INCREMENT,
  `doc_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `buy_state` SET("Selected", "Invoiced", "Canceled") NOT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `last_modification` DATETIME NOT NULL,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`selection_id`),
  INDEX `fk_Persona_selecciona_producto_Persona1_idx` (`doc_id` ASC),
  INDEX `fk_Persona_selecciona_producto_Producto1_idx` (`product_id` ASC),
  INDEX `fk_Customers_select_product_Orders1_idx` (`order_id` ASC),
  CONSTRAINT `fk_Persona_selecciona_producto_Persona1`
    FOREIGN KEY (`doc_id`)
    REFERENCES `db_app_web_php`.`Users` (`doc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_selecciona_producto_Producto1`
    FOREIGN KEY (`product_id`)
    REFERENCES `db_app_web_php`.`Products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Customers_select_product_Orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `db_app_web_php`.`Orders` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_app_web_php`.`Invoices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_app_web_php`.`Invoices` (
  `invoice_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  `total_amount` FLOAT NOT NULL,
  `invoice_state` SET("Invoiced", "Canceled") NOT NULL,
  `created_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `deleted_date` DATETIME NULL,
  PRIMARY KEY (`invoice_id`),
  INDEX `fk_Factura_Pedido1_idx` (`order_id` ASC),
  CONSTRAINT `fk_Factura_Pedido1`
    FOREIGN KEY (`order_id`)
    REFERENCES `db_app_web_php`.`Orders` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
