/* Primer adelanto  Inscripciones */
CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_cycle` (
  `cyid` INT(11) NOT NULL AUTO_INCREMENT,
  `format` VARCHAR(10) NOT NULL DEFAULT '00/00',
  `status` ENUM('ACTIVO', 'INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `date_creation` DATETIME NOT NULL,
  `uid` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cyid`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_student` (
  `stid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `second_name` VARCHAR(50) NOT NULL,
  `age` INT(11) NULL DEFAULT NULL,
  `sex` CHAR(1) NOT NULL,
  `date_birth` DATETIME NOT NULL,
  `email` VARCHAR(75) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `status` ENUM('PREINSCRIPCION', 'INSCRIPCION', 'EGRESADO', 'BAJA TEMPORAL', 'BAJA DEFINITIVA', 'INTERNET') NOT NULL DEFAULT 'PREINSCRIPCION',
  `crid` INT(11) NOT NULL,
  `cyid` INT(11) NOT NULL,
  `date_certificate` DATETIME NOT NULL,
  `scid` INT(11) NOT NULL,
  `uid` INT(11) NOT NULL,
  `photo` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`stid`),
  INDEX `fk_cd_student_cd_carrers1_idx` (`crid` ASC),
  INDEX `fk_cd_student_cd_cycle1_idx` (`cyid` ASC),
  INDEX `fk_cd_student_cd_school1_idx` (`scid` ASC),
  CONSTRAINT `fk_cd_student_cd_carrers1`
    FOREIGN KEY (`crid`)
    REFERENCES `cd_umaeeS`.`cd_careers` (`crid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_student_cd_cycle1`
    FOREIGN KEY (`cyid`)
    REFERENCES `cd_umaeeS`.`cd_cycle` (`cyid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_student_cd_school1`
    FOREIGN KEY (`scid`)
    REFERENCES `cd_umaeeS`.`cd_school` (`scid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_document` (
  `doid` INT(11) NOT NULL AUTO_INCREMENT,
  `acta` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `curp` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `fotos` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `comprobante` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `identificacion` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `ine` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `certificado` ENUM('COPIA', 'ORIGINAL', 'AMBAS', 'NINGUNA') NOT NULL DEFAULT 'NINGUNA',
  `observations` TEXT NULL DEFAULT NULL,
  `date_creation` DATETIME NOT NULL,
  `status` ENUM('ACTIVO', 'INACTIVO') NOT NULL DEFAULT 'INACTIVO',
  `uid` INT(11) NULL DEFAULT NULL,
  `stid` INT(11) NOT NULL,
  PRIMARY KEY (`doid`),
  INDEX `fk_cd_document_cd_student1_idx` (`stid` ASC),
  CONSTRAINT `fk_cd_document_cd_student1`
    FOREIGN KEY (`stid`)
    REFERENCES `cd_umaeeS`.`cd_student` (`stid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_payments` (
  `payid` INT(11) NOT NULL AUTO_INCREMENT,
  `amount` VARCHAR(25) NOT NULL DEFAULT 0,
  `voucher` VARCHAR(60) NULL DEFAULT NULL,
  `id_transaction` VARCHAR(60) NULL DEFAULT NULL,
  `status` ENUM('ACTIVO', 'CANCELADO') NOT NULL DEFAULT 'ACTIVO',
  `method` ENUM('PAYPAL', 'OXXO', 'TRANSFERENCIA', 'EFECTIVO', 'DEPOSITO', 'OTRO') NOT NULL DEFAULT 'OTRO',
  `description` TEXT NULL DEFAULT NULL,
  `date_creation` DATETIME NOT NULL,
  `uid` VARCHAR(45) NULL DEFAULT NULL,
  `stid` INT(11) NOT NULL,
  PRIMARY KEY (`payid`),
  INDEX `fk_cd_payments_cd_student1_idx` (`stid` ASC),
  CONSTRAINT `fk_cd_payments_cd_student1`
    FOREIGN KEY (`stid`)
    REFERENCES `cd_umaeeS`.`cd_student` (`stid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_estados` (
  `eid` INT(11) NOT NULL AUTO_INCREMENT,
  `clave` CHAR(2) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `abrev` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`eid`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_municipios` (
  `mpid` INT(11) NOT NULL AUTO_INCREMENT,
  `eid` INT(11) NOT NULL,
  `clave` CHAR(3) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `sigla` CHAR(4) NOT NULL,
  PRIMARY KEY (`mpid`),
  INDEX `fk_cd_municipios_cd_estados1_idx` (`eid` ASC),
  CONSTRAINT `fk_cd_municipios_cd_estados1`
    FOREIGN KEY (`eid`)
    REFERENCES `cd_umaeeS`.`cd_estados` (`eid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_references` (
  `refid` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `second_name` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(15) NULL DEFAULT NULL,
  `tel` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(75) NULL DEFAULT NULL,
  `type` ENUM('TUTOR', 'REFERENCIA') NOT NULL DEFAULT 'REFERENCIA',
  `status` ENUM('ACTIVO', 'INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `date_creation` DATETIME NOT NULL,
  `uid` INT(11) NOT NULL,
  `stid` INT(11) NOT NULL,
  PRIMARY KEY (`refid`),
  INDEX `fk_cd_references_cd_student1_idx` (`stid` ASC),
  CONSTRAINT `fk_cd_references_cd_student1`
    FOREIGN KEY (`stid`)
    REFERENCES `cd_umaeeS`.`cd_student` (`stid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cd_umaeeS`.`cd_direction_student` (
  `did` INT(11) NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(200) NOT NULL,
  `colony` VARCHAR(50) NOT NULL,
  `town` VARCHAR(100) NOT NULL,
  `mpid` INT(11) NOT NULL,
  `cp` VARCHAR(15) NOT NULL,
  `references` VARCHAR(500) NULL DEFAULT NULL,
  `date_creation` DATETIME NOT NULL,
  `uid` INT(11) NULL DEFAULT NULL,
  `stid` INT(11) NULL DEFAULT NULL,
  `type` ENUM('ALUMNO', 'REFERENCIA', 'TUTOR') NOT NULL,
  `refid` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`did`),
  INDEX `fk_cd_direction_student_cd_municipios1_idx` (`mpid` ASC),
  INDEX `fk_cd_direction_student_cd_student1_idx` (`stid` ASC),
  INDEX `fk_cd_direction_student_cd_references1_idx` (`refid` ASC),
  CONSTRAINT `fk_cd_direction_student_cd_municipios1`
    FOREIGN KEY (`mpid`)
    REFERENCES `cd_umaeeS`.`cd_municipios` (`mpid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_direction_student_cd_student1`
    FOREIGN KEY (`stid`)
    REFERENCES `cd_umaeeS`.`cd_student` (`stid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cd_direction_student_cd_references1`
    FOREIGN KEY (`refid`)
    REFERENCES `cd_umaeeS`.`cd_references` (`refid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


ALTER TABLE `cd_umaeeS`.`cd_school`
ADD COLUMN `permalink` VARCHAR(150) NOT NULL DEFAULT 'sin-permalink' AFTER `name`,
ADD COLUMN `code` VARCHAR(50) NOT NULL DEFAULT 'sin-codigo' AFTER `permalink`;

ALTER TABLE `cd_umaeeS`.`cd_user`
ADD COLUMN `cargo` VARCHAR(75) NULL DEFAULT NULL AFTER `date_last_sesion`;
/* Primer adelanto  Inscripciones */
