CREATE DATABASE view_shopping;

CREATE TABLE manager(
  id INT(20) NOT NULL AUTO_INCREMENT,
  mid VARCHAR(30) NOT NULL,
  mpw VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE users(
  id INT(20) NOT NULL AUTO_INCREMENT,
  uname VARCHAR(10) NOT NULL,
  uid VARCHAR(30) NOT NULL,
  upw VARCHAR(50) NOT NULL,
  umail VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE tCategory(
  id INT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  PRIMARY KEY(id)
);
INSERT INTO
tCategory(name)
VALUES('top');
INSERT INTO
tCategory(name)
VALUES('bottom');
INSERT INTO
tCategory(name)
VALUES('shoes');

CREATE TABLE category(
  id INT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  tCid INT(20) NOT NULL,
  PRIMARY KEY(id)
);
INSERT INTO
category(name, tCid)
VALUES('sleeveless', 1);
INSERT INTO
category(name, tCid)
VALUES('short-sleeve', 1);
INSERT INTO
category(name, tCid)
VALUES('long-sleeve', 1);
INSERT INTO
category(name, tCid)
VALUES('crop', 1);
INSERT INTO
category(name, tCid)
VALUES('shirts', 1);
INSERT INTO
category(name, tCid)
VALUES('slacks', 2);
INSERT INTO
category(name, tCid)
VALUES('blue-jeans', 2);
INSERT INTO
category(name, tCid)
VALUES('shorts', 2);
INSERT INTO
category(name, tCid)
VALUES('long-pants', 2);
INSERT INTO
category(name, tCid)
VALUES('begi-pants', 2);
INSERT INTO
category(name, tCid)
VALUES('sneakers', 3);
INSERT INTO
category(name, tCid)
VALUES('sandals', 3);
INSERT INTO
category(name, tCid)
VALUES('boots', 3);
INSERT INTO
category(name, tCid)
VALUES('flip-flop', 3);
INSERT INTO
category(name, tCid)
VALUES('slip-on', 3);

SELECT c.id, c.name, t.name AS tname FROM category c LEFT JOIN tCategory t ON c.tCid = t.id WHERE t.name = 'top';
SELECT c.id, c.name, t.name AS tname FROM category c LEFT JOIN tCategory t ON c.tCid = t.id WHERE t.name = 'bottom';


CREATE TABLE goods(
  id INT(20) NOT NULL AUTO_INCREMENT,
  gcode VARCHAR(20) NOT NULL,
  gname VARCHAR(100) NOT NULL,
  gexplain TEXT NOT NULL,
  gprice INT(50) NOT NULL,
  gpicture VARCHAR(100),
  gcid INT(20) NOT NULL,
  PRIMARY KEY(id, gcode)
);
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('XORBAKZ6NV', 'goods-name', 'goods-explain blahblah~', '90000', '상품사진.png', '1');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('7MRIMRKWAT', 'goods-name', 'goods-explain blahblah~', '90000', '상품사진.png', '1');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('PW2SSP3ZEL', 'goods-name', 'goods-explain blahblah~', '90000', '상품사진.png', '1');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('E0KIV55ERM', 'goods-name', 'goods-explain blahblah~', '90000', '상품사진.png', '2');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('EQW5ITLR34', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '2');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('PN2O9K6BWP', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '2');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('WZM7VQC9DT', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '2');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('94Q2CM5Y1J', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '2');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('5ZGK3O90M', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '2');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('4M85QZMYC', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '3');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('W4L60K9C3', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '3');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('OQC42QG7YY', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '3');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('UWUE7D8NOV', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '4');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('D7659O5767', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '4');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('UQCMG0DWFG', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '4');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('DLF2LFPVX4', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '6');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('F2CR3DOGTC', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '6');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('RULEP3CH', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '6');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('2B94H2CVD6', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '6');
INSERT INTO goods(gcode, gname, gexplain, gprice, gpicture, gcid) VALUES('RNH1Z6RC3B', 'goods-name', 'goods-explain blahblah~', '80000', '상품사진.png', '7');

CREATE TABLE carts(
  id INT(20) NOT NULL AUTO_INCREMENT,
  cuid VARCHAR(30) NOT NULL,
  cgcode VARCHAR(100) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE reviews(
  id INT(20) NOT NULL AUTO_INCREMENT,
  rgcode VARCHAR(100) NOT NULL,
  rstars INT(10) NOT NULL,
  ruid VARCHAR(30) NOT NULL,
  rdescript TEXT NOT NULL,
  rpicture VARCHAR(100),
  PRIMARY KEY(id)
);

CREATE TABLE notice(
  id INT(20) NOT NULL AUTO_INCREMENT,
  ntitle VARCHAR(100) NOT NULL,
  ndescript TEXT NOT NULL,
  ndate DATETIME NOT NULL,
  PRIMARY KEY(id)
);


CREATE TABLE qna(
  id INT(20) NOT NULL AUTO_INCREMENT,
  quid VARCHAR(30) NOT NULL,
  qtitle VARCHAR(100) NOT NULL,
  qdescript TEXT NOT NULL,
  qdate DATETIME NOT NULL,
  PRIMARY KEY(id)
);