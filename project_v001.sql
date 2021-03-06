CREATE TABLE `app_checker`.`logs` ( `LOG_ID` INT NOT NULL , `TIMESTAMP` TIMESTAMP NOT NULL , `SENSOR_ID` INT NOT NULL , `APP_ID` INT NOT NULL , `RAW_DATA` TEXT NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `app_checker`.`sensors` ( `SENSOR_ID` INT NOT NULL , `SENSOR_NAME` TEXT NOT NULL , `SENSOR_IP` TEXT NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `app_checker`.`apps` ( `APP_ID` INT NOT NULL , `APP_ADDRESS` TEXT NOT NULL , `APP_NAME` TEXT NOT NULL , `APP_DESCRIPTION` TEXT NOT NULL , `APP_PICTURE` INT NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `apps` ADD PRIMARY KEY(`APP_ID`);
ALTER TABLE `apps` ADD UNIQUE(`APP_ID`);
ALTER TABLE `apps` ADD INDEX(`APP_ID`);

ALTER TABLE `sensors` ADD PRIMARY KEY(`SENSOR_ID`);
ALTER TABLE `sensors` ADD UNIQUE(`SENSOR_ID`);
ALTER TABLE `sensors` ADD INDEX(`SENSOR_ID`);

ALTER TABLE `logs` ADD PRIMARY KEY(`LOG_ID`);
ALTER TABLE `logs` ADD UNIQUE(`LOG_ID`);
ALTER TABLE `logs` ADD INDEX(`LOG_ID`);

ALTER TABLE `logs` ADD CONSTRAINT `fk_001_APP_ID` FOREIGN KEY (`APP_ID`) REFERENCES `apps`(`APP_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `logs` ADD CONSTRAINT `fk_002_SENSOR_ID` FOREIGN KEY (`SENSOR_ID`) REFERENCES `sensors`(`SENSOR_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

INSERT INTO `sensors` (`SENSOR_ID`, `SENSOR_NAME`, `SENSOR_IP`) VALUES ('001', 'test-sensor-noip-001', '10.0.0.10'), ('002', 'test-sensor-noip-002', '10.0.0.20')

INSERT INTO `apps` (`APP_ID`, `APP_ADDRESS`, `APP_NAME`, `APP_DESCRIPTION`, `APP_PICTURE`) VALUES ('001', 'example.com', 'test-app-001', 'test entry for an app', '')
INSERT INTO `apps` (`APP_ID`, `APP_ADDRESS`, `APP_NAME`, `APP_DESCRIPTION`, `APP_PICTURE`) VALUES ('002', 'example.com', 'test-app-002', 'test entry for an app', '')
INSERT INTO `logs` (`LOG_ID`, `TIMESTAMP`, `SENSOR_ID`, `APP_ID`, `RAW_DATA`) VALUES ('001', current_timestamp(), '1', '1', 'test data to test scripts and code')