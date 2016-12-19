CREATE TABLE IF NOT EXISTS `chat`.`stamp_master` (
  `stampid` INT NOT NULL,
  `name` VARCHAR(32) NULL,
  `file_name` VARCHAR(32) NULL,
  PRIMARY KEY (`stampid`))
ENGINE = InnoDB;

stamp_master(stampid, name, file_name)
VALUE(1, 'normal', 'normal.png'),
(2, 'sad', 'sad.png'),
(3, 'smile', 'smile.png');
