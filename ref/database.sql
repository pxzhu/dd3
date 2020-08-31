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

CREATE TABLE category(
  id INT(20) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50),
  PRIMARY KEY(id)
);

INSERT INTO
category(name)
VALUES('sleeveless');
INSERT INTO
category(name)
VALUES('short-sleeve');
INSERT INTO
category(name)
VALUES('long-sleeve');
INSERT INTO
category(name)
VALUES('crop');
INSERT INTO
category(name)
VALUES('slacks');
INSERT INTO
category(name)
VALUES('blue-jeans');
INSERT INTO
category(name)
VALUES('shorts');
INSERT INTO
category(name)
VALUES('long-pants');



CREATE TABLE goods(
  id INT(20) NOT NULL AUTO_INCREMENT,
  gcode VARCHAR(20) NOT NULL,
  gname VARCHAR(100) NOT NULL,
  gexplain TEXT NOT NULL,
  gprice INT(50) NOT NULL,
  gpicture VARCHAR(100),
  PRIMARY KEY(id, gcode)
);

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