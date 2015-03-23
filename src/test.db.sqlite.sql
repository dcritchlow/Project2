PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE user(id int, name varchar(30), password varchar(255));
INSERT INTO "user" VALUES(1,'joe','$2y$10$.ju/GUCCvDQCsi8HhuRdheNqW.JTstVo8tb24dFjwkd4XG9gzj3v6');
INSERT INTO "user" VALUES(2,'tyler','$2y$10$vk5TFFourat00OiplL6QSeZDySw.GYXU97FNtlvtKHd63uNQuS7pm');
INSERT INTO "user" VALUES(3,'brody','$2y$10$t3CYpR34gCyRRqAbPlHSpueCDIGlIwKQN4yI8ton0ZLiE9Jn/heJ.');
COMMIT;
