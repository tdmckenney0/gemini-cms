PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE `pages` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `slug` VARCHAR(128), 
    `created_at` DATETIME NOT NULL default current_timestamp, 
    `updated_at` DATETIME NOT NULL default current_timestamp, 
    `body` TEXT NOT NULL
);
INSERT INTO pages VALUES(1,'welcome','2021-08-27 04:40:00','2021-08-27 04:40:00','Hello World!');
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('pages',1);
COMMIT;