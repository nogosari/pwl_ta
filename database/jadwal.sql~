DROP DATABASE IF EXISTS jadwal;
CREATE DATABASE jadwal;
USE jadwal;

CREATE TABLE admin(
	id_admin INT AUTO_INCREMENT,
  	nama VARCHAR(30),
	email VARCHAR(50),
  	password VARCHAR(15),
  	PRIMARY KEY (id_admin),
  	UNIQUE  KEY (nama)
);

CREATE TABLE kegiatan(
  	nomer INT AUTO_INCREMENT,
	id_admin INT,
  	tanggal DATE,
	jam VARCHAR(6),
  	keterangan VARCHAR(254),
  	PRIMARY KEY (nomer),
	foreign KEY (id_admin) references admin(id_admin)
);
