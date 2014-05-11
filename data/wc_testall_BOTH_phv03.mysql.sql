CREATE DATABASE IF NOT EXISTS `acht04c_phbernwidgetcreator`;

CREATE  TABLE IF NOT EXISTS `acht04c_phbernwidgetcreator`.`tbl_user` (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    username VARCHAR(128) NOT NULL ,
    password VARCHAR(128) NOT NULL ,
    email VARCHAR(128) NOT NULL ,
    name VARCHAR(128) NULL  ,
    firstname VARCHAR(128) NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
  
CREATE TABLE IF NOT EXISTS `acht04c_phbernwidgetcreator`.`tbl_projects` (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(128) NOT NULL ,
    groupcount INT UNSIGNED NOT NULL ,
    poscount INT UNSIGNED NOT NULL ,
    user_id INT UNSIGNED NOT NULL ,
    CONSTRAINT FK_projects_user FOREIGN KEY (user_id) 
       REFERENCES tbl_user(id)
       ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `acht04c_phbernwidgetcreator`.`tbl_groups` (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    project_id INT UNSIGNED NOT NULL ,
    group_nr INT UNSIGNED NOT NULL ,
    group_name VARCHAR(128) ,
    CONSTRAINT FK_groups_projects FOREIGN KEY (project_id)
       REFERENCES tbl_projects(id)
       ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
    
CREATE TABLE IF NOT EXISTS `acht04c_phbernwidgetcreator`.`tbl_milestone` (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    group_id INT UNSIGNED NOT NULL ,
    percent SMALLINT UNSIGNED ,
    type SMALLINT UNSIGNED ,
    CONSTRAINT FK_milestone_groups FOREIGN KEY (group_id)
       REFERENCES tbl_groups(id)
       ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `acht04c_phbernwidgetcreator`.`tbl_rating` (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    group_id INT UNSIGNED NOT NULL ,
    rating SMALLINT UNSIGNED,
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    type SMALLINT UNSIGNED ,
    CONSTRAINT FK_rating_groups FOREIGN KEY (group_id)
       REFERENCES tbl_groups(id)
       ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/* CREATE TABLE IF NOT EXISTS `acht04c_phbernwidgetcreator`.`tbl_type` (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    type_nr SMALLINT UNSIGNED ,
    type_name VARCHAR(120) ,
 ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; */



/* There is a login needed, to manage the database */

 INSERT INTO `acht04c_phbernwidgetcreator`.`tbl_user` 
    (username, password,email,name,firstname)
 VALUES
(‚admin1‘, md5(‚password‘),’example@1.com’,’name’,’firstname’),
(‚admin2‘, md5(‚password‘),’example@1.com’,’name’,’firstname’),
(‚admin3‘, md5(‚password‘),’example@1.com’,’name’,’firstname’),
(‚admin4‘, md5(‚password‘),’example@1.com’,’name’,’firstname’);


/* There are different projects */
/* groupcount = Nr. of groups in a projects */
/* poscount is the Nr. of widgets each group should have */
/* user_id gives information about the adminstrator */

INSERT INTO `acht04c_phbernwidgetcreator`.`tbl_projects` 
    (groupcount,poscount,user_id,name)
VALUES
(7,2,1,'12HS - Audio'),
(8,4,1,'12HS - Bild'),
(4,2,1,'12HS - Multimedia'),
(6,2,1,'12HS - Print'),
(8,4,1,'12HS - Video');

/* */

INSERT INTO `acht04c_phbernwidgetcreator`.`tbl_groups`
    (project_id,group_nr,group_name)
VALUES
(1,1,'A-1-1_12'),
(1,2,'A-1-2_12'),
(1,3,'A-1-3_12'),
(1,4,'A-2-1_12'),
(1,5,'A-2-2_12'),
(1,6,'A-3-1_12'),
(1,7,'A-3-2_12'),
(2,1,'B-1-1_12'),
(2,2,'B-1-2_12'),
(2,3,'B-1-3_12'),
(2,4,'B-2-1_12'),
(2,5,'B-2-2_12'),
(2,6,'B-2-3_12'),
(2,7,'B-3-1_12'),
(2,8,'B-3-2_12'),
(3,1,'M-1-1_12'),
(3,2,'M-1-2_12'),
(3,3,'M-2-1_12'),
(3,4,'M-2-2_12'),
(4,1,'P-1-1_12'),
(4,2,'P-1-2_12'),
(4,3,'P-1-3_12'),
(4,4,'P-1-4_12'),
(4,5,'P-1-5_12'),
(4,6,'P-1-6_12'),
(5,1,'V-1-1_12'),
(5,2,'V-1-2_12'),
(5,3,'V-1-3_12'),
(5,4,'V-2-1_12'),
(5,5,'V-2-2_12'),
(5,6,'V-2-3_12'),
(5,7,'V-3-1_12'),
(5,8,'V-3-2_12');


INSERT INTO `acht04c_phbernwidgetcreator`.`tbl_milestone`
    (group_id,percent,type)
VALUES
(1,0,0),
(1,0,1),
(2,0,0),
(2,0,1),
(3,0,0),
(3,0,1),
(4,0,0),
(4,0,1),
(5,0,0),
(5,0,1),
(6,0,0),
(6,0,1),
(7,0,0),
(7,0,1),
(8,0,0),
(8,0,1),
(9,0,0),
(9,0,1),
(10,0,0),
(10,0,1),
(11,0,0),
(11,0,1),
(12,0,0),
(12,0,1),
(13,0,0),
(13,0,1),
(14,0,0),
(14,0,1),
(15,0,0),
(15,0,1),
(16,0,0),
(16,0,1),
(17,0,0),
(17,0,1),
(18,0,0),
(18,0,1),
(19,0,0),
(19,0,1),
(20,0,0),
(20,0,1),
(21,0,0),
(21,0,1),
(22,0,0),
(22,0,1),
(23,0,0),
(23,0,1),
(24,0,0),
(24,0,1),
(25,0,0),
(25,0,1),
(26,0,0),
(26,0,1),
(27,0,0),
(27,0,1),
(28,0,0),
(28,0,1),
(29,0,0),
(29,0,1),
(30,0,0),
(30,0,1),
(31,0,0),
(31,0,1),
(32,0,0),
(32,0,1),
(33,0,0),
(33,0,1);

INSERT INTO `acht04c_phbernwidgetcreator`.`tbl_rating`
    (group_id,rating,type)
VALUES
(1,0,0),
(1,0,1),
(2,0,0),
(2,0,1),
(3,0,0),
(3,0,1),
(4,0,0),
(4,0,1),
(5,0,0),
(5,0,1),
(6,0,0),
(6,0,1),
(7,0,0),
(7,0,1),
(8,0,0),
(8,0,1),
(9,0,0),
(9,0,1),
(10,0,0),
(10,0,1),
(11,0,0),
(11,0,1),
(12,0,0),
(12,0,1),
(13,0,0),
(13,0,1),
(14,0,0),
(14,0,1),
(15,0,0),
(15,0,1),
(16,0,0),
(16,0,1),
(17,0,0),
(17,0,1),
(18,0,0),
(18,0,1),
(19,0,0),
(19,0,1),
(20,0,0),
(20,0,1),
(21,0,0),
(21,0,1),
(22,0,0),
(22,0,1),
(23,0,0),
(23,0,1),
(24,0,0),
(24,0,1),
(25,0,0),
(25,0,1),
(26,0,0),
(26,0,1),
(27,0,0),
(27,0,1),
(28,0,0),
(28,0,1),
(29,0,0),
(29,0,1),
(30,0,0),
(30,0,1),
(31,0,0),
(31,0,1),
(32,0,0),
(32,0,1),
(33,0,0),
(33,0,1);

