PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE user(id int, name varchar(30), password varchar(255));
INSERT INTO "user" VALUES(1,'joe','$2y$10$.ju/GUCCvDQCsi8HhuRdheNqW.JTstVo8tb24dFjwkd4XG9gzj3v6');
COMMIT;
