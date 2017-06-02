CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`persona` (
  `ci` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NULL COMMENT '',
  `apellido` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `pais` VARCHAR(45) NULL COMMENT '',
  `contrasena` VARCHAR(500) NULL COMMENT '',
  `calle` VARCHAR(45) NULL COMMENT '',
  `numero` INT NULL COMMENT '',
  `tarjeta` INT NULL COMMENT '',
  `calificacion` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`ci`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`telefonopersona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`telefonopersona` (
  `cipersona` INT NOT NULL COMMENT '',
  `telefono` INT NULL COMMENT '',
  PRIMARY KEY (`cipersona`)  COMMENT '',
  CONSTRAINT `ci`
    FOREIGN KEY (`cipersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`usuario` (
  `idusuario` INT NOT NULL COMMENT '',
  `ciusuario` INT NOT NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  `precio` INT NULL COMMENT '',
  PRIMARY KEY (`idusuario`, `ciusuario`)  COMMENT '',
  INDEX `ciusuario_idx` (`ciusuario` ASC)  COMMENT '',
  CONSTRAINT `ciusuario`
    FOREIGN KEY (`ciusuario`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`administrador` (
  `idadministrador` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `ciadministrador` INT NOT NULL COMMENT '',
  `grado` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idadministrador`, `ciadministrador`)  COMMENT '',
  CONSTRAINT `ciadmin`
    FOREIGN KEY (`ciadministrador`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`publicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`publicacion` (
  `id` INT NOT NULL COMMENT '',
  `cipersona` INT NOT NULL COMMENT '',
  `nombrepubli` VARCHAR(60) NULL COMMENT '',
  `precio` INT NULL COMMENT '',
  `descripcion` VARCHAR(500) NULL COMMENT '',
  `categoria` VARCHAR(45) NULL COMMENT '',
  `stock` INT NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  `tipo` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`, `cipersona`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`subasta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`subasta` (
  `cisubpersona` INT NOT NULL COMMENT '',
  `idsubpublicacion` INT NOT NULL COMMENT '',
  `calificacion` VARCHAR(45) NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  `precio` INT NULL COMMENT '',
  `preciototal` INT NULL COMMENT '',
  `cantidad` INT NULL COMMENT '',
  `total` INT NULL COMMENT '',
  PRIMARY KEY (`cisubpersona`, `idsubpublicacion`)  COMMENT '',
  INDEX `idpublicacion_idx` (`idsubpublicacion` ASC)  COMMENT '',
  CONSTRAINT `cisubpersona`
    FOREIGN KEY (`cisubpersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idsubpublicacion`
    FOREIGN KEY (`idsubpublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`vendecompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`vendecompra` (
  `civendepersona` INT NOT NULL COMMENT '',
  `idvendepublicacion` INT NOT NULL COMMENT '',
  `calificacion` VARCHAR(45) NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  `preciototal` INT NULL COMMENT '',
  `cantidad` INT NULL COMMENT '',
  `total` INT NULL COMMENT '',
  PRIMARY KEY (`civendepersona`, `idvendepublicacion`)  COMMENT '',
  INDEX `idpublicacion_idx` (`idvendepublicacion` ASC)  COMMENT '',
  CONSTRAINT `civendepersona`
    FOREIGN KEY (`civendepersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idvendepublicacion`
    FOREIGN KEY (`idvendepublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`permuta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`permuta` (
  `idpublicacion` INT NOT NULL COMMENT '',
  `calificacion` VARCHAR(45) NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idpublicacion`)  COMMENT '',
  CONSTRAINT `idpublicacion`
    FOREIGN KEY (`idpublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`favorito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`favorito` (
  `cifavpersona` INT NOT NULL COMMENT '',
  `idfavpublicacion` INT NOT NULL COMMENT '',
  PRIMARY KEY (`cifavpersona`, `idfavpublicacion`)  COMMENT '',
  INDEX `idpublicacion_idx` (`idfavpublicacion` ASC)  COMMENT '',
  CONSTRAINT `cifavpersona`
    FOREIGN KEY (`cifavpersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idfavpublicacion`
    FOREIGN KEY (`idfavpublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`nombreusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`nombreusuario` (
  `idusuario` INT NOT NULL COMMENT '',
  `nombreusu` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idusuario`)  COMMENT '',
  CONSTRAINT `idusuario`
    FOREIGN KEY (`idusuario`)
    REFERENCES `proyecto_fassani`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`comentariopublicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`comentariopublicacion` (
  `publicacionid` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idcompublicacion` INT NOT NULL COMMENT '',
  `cicompersona` INT NOT NULL COMMENT '',
  `comentariopub` VARCHAR(500) NULL COMMENT '',
  `fechacompubli` DATE NULL COMMENT '',
  PRIMARY KEY (`publicacionid`, `idcompublicacion`, `cicompersona`)  COMMENT '',
  INDEX `cipersona_idx` (`cicompersona` ASC)  COMMENT '',
  CONSTRAINT `idcompublicacion`
    FOREIGN KEY (`idcompublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cicompersona`
    FOREIGN KEY (`cicompersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`comentariosubasta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`comentariosubasta` (
  `subastaid` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idcomsubpublicacion` INT NOT NULL COMMENT '',
  `cicomsubpersona` INT NOT NULL COMMENT '',
  `comentariosub` VARCHAR(500) NULL COMMENT '',
  `fechacomsub` DATE NULL COMMENT '',
  PRIMARY KEY (`subastaid`, `idcomsubpublicacion`, `cicomsubpersona`)  COMMENT '',
  INDEX `cipersona_idx` (`cicomsubpersona` ASC)  COMMENT '',
  CONSTRAINT `idcomsubpublicacion`
    FOREIGN KEY (`idcomsubpublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cicomsubpersona`
    FOREIGN KEY (`cicomsubpersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`comentariovendecompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`comentariovendecompra` (
  `vendecompraid` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idcomvenpublicacion` INT NOT NULL COMMENT '',
  `cicomvenpersona` INT NOT NULL COMMENT '',
  `comentarioven` VARCHAR(500) NULL COMMENT '',
  `fechacomven` DATE NULL COMMENT '',
  PRIMARY KEY (`vendecompraid`, `idcomvenpublicacion`, `cicomvenpersona`)  COMMENT '',
  INDEX `cipersona_idx` (`cicomvenpersona` ASC)  COMMENT '',
  CONSTRAINT `idcomvenpublicacion`
    FOREIGN KEY (`idcomvenpublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cicomvenpersona`
    FOREIGN KEY (`cicomvenpersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`sansiona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`sansiona` (
  `ciadministradorsan` INT NOT NULL COMMENT '',
  `ciusuariosan` INT NOT NULL COMMENT '',
  `estado` VARCHAR(45) NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`ciadministradorsan`, `ciusuariosan`)  COMMENT '',
  INDEX `ciusuario_idx` (`ciusuariosan` ASC)  COMMENT '',
  CONSTRAINT `ciadministradorsan`
    FOREIGN KEY (`ciadministradorsan`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ciusuariosan`
    FOREIGN KEY (`ciusuariosan`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`bajasuspencion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`bajasuspencion` (
  `cibajaadministrador` INT NOT NULL COMMENT '',
  `idbajapublicacion` INT NOT NULL COMMENT '',
  `estado` VARCHAR(100) NULL COMMENT '',
  `fecha` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`cibajaadministrador`, `idbajapublicacion`)  COMMENT '',
  INDEX `idpublicacion_idx` (`idbajapublicacion` ASC)  COMMENT '',
  CONSTRAINT `cibajaadministrador`
    FOREIGN KEY (`cibajaadministrador`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idbajapublicacion`
    FOREIGN KEY (`idbajapublicacion`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`sancionadmin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`sancionadmin` (
  `ciadministradorsanadmin` INT NOT NULL COMMENT '',
  `idadministradorsan1` INT NOT NULL COMMENT '',
  `idadministradorsan2` INT NOT NULL COMMENT '',
  `estado` VARCHAR(100) NULL COMMENT '',
  `fecha` DATE NULL COMMENT '',
  PRIMARY KEY (`ciadministradorsanadmin`, `idadministradorsan1`, `idadministradorsan2`)  COMMENT '',
  INDEX `idadministradorsan1_idx` (`idadministradorsan1` ASC)  COMMENT '',
  INDEX `idadministradorsan2_idx` (`idadministradorsan2` ASC)  COMMENT '',
  CONSTRAINT `ciadministradorsanadmin`
    FOREIGN KEY (`ciadministradorsanadmin`)
    REFERENCES `proyecto_fassani`.`administrador` (`ciadministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idadministradorsan1`
    FOREIGN KEY (`idadministradorsan1`)
    REFERENCES `proyecto_fassani`.`administrador` (`idadministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idadministradorsan2`
    FOREIGN KEY (`idadministradorsan2`)
    REFERENCES `proyecto_fassani`.`administrador` (`idadministrador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `base.sitio`.`comentariopermuta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proyecto_fassani`.`comentariopermuta` (
  `permutaid` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idcompermuta` INT NOT NULL COMMENT '',
  `cicomperpersona` INT NOT NULL COMMENT '',
  `comentarioper` VARCHAR(500) NULL COMMENT '',
  `fechacomper` DATE NULL COMMENT '',
  PRIMARY KEY (`permutaid`, `idcompermuta`, `cicomperpersona`)  COMMENT '',
  INDEX `cicomperpersona_idx` (`cicomperpersona` ASC)  COMMENT '',
  CONSTRAINT `idcompermuta`
    FOREIGN KEY (`idcompermuta`)
    REFERENCES `proyecto_fassani`.`publicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cicomperpersona`
    FOREIGN KEY (`cicomperpersona`)
    REFERENCES `proyecto_fassani`.`persona` (`ci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

