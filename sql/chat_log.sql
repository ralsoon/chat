CREATE TABLE IF NOT EXISTS `chat`.`chat_log` (
  `chatid` INT NOT NULL,
  `userid` INT NOT NULL,
  `stampid` INT NULL,
  `content` VARCHAR(256) NULL,
  `send_date` DATETIME NULL,
  PRIMARY KEY (`chatid`, `userid`))
ENGINE = InnoDB;
