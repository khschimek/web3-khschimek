CREATE TABLE `new_math`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `level` INT NULL,
  PRIMARY KEY (`id`));

INSERT INTO new_math.user (name, level) VALUES ('diane', 3);
SELECT id, name, level FROM new_math.user WHERE (name = 'alice');
DELETE FROM new_math.user WHERE (id = 5);
UPDATE days.new_table SET walked = 1 WHERE day = 'thursday';

SELECT * FROM new_math.user;

INSERT INTO `new_math`.`user` (`name`, `level`) VALUES ('alice', '1');