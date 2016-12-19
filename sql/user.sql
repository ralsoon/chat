CREATE TABLE IF NOT EXISTS `chat`.`user` (
  `userid` INT NOT NULL,
  `loginid` VARCHAR(32) NULL,
  `password` VARCHAR(16) NULL,
  `dispname` VARCHAR(32) NULL,
  `del_frag` TINYINT(1) GENERATED ALWAYS AS () VIRTUAL,
  `lastlogin_date` DATETIME NULL,
  PRIMARY KEY (`userid`),
  UNIQUE INDEX `loginid_UNIQUE` (`loginid` ASC))
ENGINE = InnoDB;

INSERT INTO user(userid, loginid, password, dispname, del_frag, lastlogin_date)
VALUE(1, 'tom', 'nosushinolife', 'GOD', false, '2016-12-19 10:00:00'),
(2, 'mike', 'apple2016', 'Taro', false, '2016-12-19 10:05:00'),
(3, 'mary', 'c@ndyclash', 'Yoko', false, '2016-12-19 10:10:00');
