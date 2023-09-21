-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "product_prices" -------------------------------
CREATE TABLE `product_prices`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`price_purchase` Int( 255 ) NOT NULL DEFAULT 0,
	`price_selling` Int( 255 ) NOT NULL DEFAULT 0,
	`price_discount` Int( 255 ) NOT NULL DEFAULT 0,
	`product_id` Int( 255 ) NOT NULL,
	`region_id` Int( 255 ) NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 8;
-- -------------------------------------------------------------


-- CREATE TABLE "products" -------------------------------------
CREATE TABLE `products`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- CREATE TABLE "regions" --------------------------------------
CREATE TABLE `regions`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`region` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "user" -----------------------------------------
CREATE TABLE `user`( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`username` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`role` Int( 255 ) NOT NULL DEFAULT 0,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- Dump data of "product_prices" ---------------------------
BEGIN;

INSERT INTO `product_prices`(`id`,`price_purchase`,`price_selling`,`price_discount`,`product_id`,`region_id`) VALUES 
( '1', '10001', '10001', '11001', '1', '1' ),
( '2', '10002', '10002', '11002', '1', '2' ),
( '3', '20001', '20001', '21001', '2', '1' ),
( '4', '20002', '20002', '21002', '2', '2' ),
( '5', '20001', '20001', '21001', '3', '1' ),
( '6', '20002', '20002', '21002', '3', '2' ),
( '7', '1', '1', '3', '1', '3' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "products" ---------------------------------
BEGIN;

INSERT INTO `products`(`id`,`name`) VALUES 
( '1', 'Стул' ),
( '2', 'Стол' ),
( '3', 'Кровать' ),
( '4', 'Тумба' ),
( '5', 'Шкаф' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "regions" ----------------------------------
BEGIN;

INSERT INTO `regions`(`id`,`region`) VALUES 
( '1', 'Свердловская обл.' ),
( '2', 'Московская обл.' ),
( '3', 'Саратовская обл.' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "user" -------------------------------------
BEGIN;

INSERT INTO `user`(`id`,`username`,`password`,`role`) VALUES 
( '1', 'Иван', '123', '0' );
COMMIT;
-- ---------------------------------------------------------


-- CREATE INDEX "lnk_products_product_prices" ------------------
CREATE INDEX `lnk_products_product_prices` USING BTREE ON `product_prices`( `product_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_regions_product_prices" -------------------
CREATE INDEX `lnk_regions_product_prices` USING BTREE ON `product_prices`( `region_id` );
-- -------------------------------------------------------------


-- CREATE LINK "lnk_products_product_prices" -------------------
ALTER TABLE `product_prices`
	ADD CONSTRAINT `lnk_products_product_prices` FOREIGN KEY ( `product_id` )
	REFERENCES `products`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_regions_product_prices" --------------------
ALTER TABLE `product_prices`
	ADD CONSTRAINT `lnk_regions_product_prices` FOREIGN KEY ( `region_id` )
	REFERENCES `regions`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


