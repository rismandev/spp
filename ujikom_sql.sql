-- MATERI UJIKOM RPL 2018
cd c:\xampp\mysql\bin

mysql -u root

CREATE DATABASE Akademik;

USE Akademik;

-- table mahasiswa
CREATE TABLE mahasiswa (    -- 2.)
	nim VARCHAR(5),
	nama VARCHAR(50),
	alamat TEXT,
	kode_prodi VARCHAR(5),
	PRIMARY KEY (nim),
	FOREIGN KEY (kode_prodi) REFERENCES prodi (kode_prodi)
);

CREATE TABLE prodi ( 		-- 1.)
	kode_prodi VARCHAR(5),
	nama_prodi VARCHAR(50),
	jurusan VARCHAR(30),
	PRIMARY KEY (kode_prodi)
);

CREATE TABLE log_mhs (
	kejadian VARCHAR (25) DEFAULT NULL,
	waktu DATETIME DEFAULT NULL
);

-- DEFAULT NULL : Bawaan dari datanya kosong

INSERT INTO prodi VALUES 
('P01','Pemrogramman Web','Teknik Informatika'),
('P02','Pemrogramman Bergerak','Teknik Informatika');

INSERT INTO mahasiswa VALUES
('00543','Abid Jabar Kelana','Desa Palabuan','P01'),
('00544','Agung Maulana','Desa Girimukti','P01'),
('00545','Alan Agus Nawan','Jl. Sukarame','P02');

CREATE VIEW viewMahasiswa1 AS 
SELECT * FROM mahasiswa WHERE nama LIKE '%a';

SELECT * FROM viewMahasiswa1;

-- Untuk melihat semua table di Database
SHOW TABLES;

-- Untuk melihat semua table dan deskripsinya di Database
SHOW FULL TABLES;

CREATE VIEW viewMahasiswa2 AS 
SELECT * FROM mahasiswa ORDER BY nim DESC;

SELECT * FROM viewMahasiswa2;

-- DESC diurutkan mulai dari terbesar sampai terkecil
-- ASC diurutkan mulai dari terkecil sampai terbesar

CREATE VIEW viewMahasiswa3 AS 
SELECT nama FROM mahasiswa ORDER BY nama ASC;

SELECT * FROM viewMahasiswa3;

-- DROP VIEW (namaTable); : Untuk menghapus Table View

-- TRIGGER (Pemacu)
-- DELIMITER $$ : Awalan/Pembuka
-- DELIMITER ;  : Akhiran/Penutup

-- 1.) Masukkan Data / INSERT 
DELIMITER $$

CREATE TRIGGER ins_mhs AFTER INSERT ON mahasiswa
FOR EACH ROW
BEGIN
	INSERT INTO log_mhs VALUES ('Tambah data', now());
END$$

DELIMITER ;
	
-- 2.) Ubah Data / UPDATE
DELIMITER $$

CREATE TRIGGER updt_mhs AFTER UPDATE ON mahasiswa
FOR EACH ROW
BEGIN
	INSERT INTO log_mhs VALUES ('Update data', now());
END$$

DELIMITER ;

-- 3.) Hapus Data / DELETE
DELIMITER $$

CREATE TRIGGER del_mhs AFTER DELETE ON mahasiswa
FOR EACH ROW
BEGIN
	INSERT INTO log_mhs VALUES ('Hapus data', now());
END$$

DELIMITER ;

-- Stored Procedure : Function/Fungsi yang bisa di panggil
-- STORED PROCEDURE : Routines dalam phpmyadmin (Hampir sama dengan Table View, bedanya adalah Store Procedure bisa melempar parameter)

-- 1.) Tampil / CALL
DELIMITER $$
CREATE PROCEDURE tampilMahasiswa (IN kd_prodi VARCHAR(5))
BEGIN	
	SELECT nim, nama, alamat FROM mahasiswa WHERE mahasiswa.kode_prodi = kd_prodi;
END$$
DELIMITER ;

-- DROP PROCEDURE (namaProcedure); : Untuk menghapus Store Procedure
DROP PROCEDURE tampilMahasiswa; 

-- CALL (SELECT) : Fungsi pemanggilan data dalam Store Procedure
CALL tampilMahasiswa("P01"); 

-- 2.) Tambah / INSERT
DELIMITER $$
CREATE PROCEDURE tambahMahasiswa (IN nim VARCHAR(5), nama VARCHAR(50), alamat TEXT, kode_prodi VARCHAR(5))
BEGIN	
	INSERT INTO mahasiswa VALUES (nim, nama, alamat, kode_prodi);
END$$
DELIMITER ;

-- Cara Menambahkan data dengan Stored Procedure
CALL tambahMahasiswa('92131','Sigit Ginanjar','Desa Sukaraja','P02');
CALL tambahMahasiswa('92132','Fizar Rama Waluyo','Desa Rajagaluh','P01');

SELECT * FROM mahasiswa;

-- 2.) Hapus / DELETE
-- Bedakan antara parameter (nimMhs) dengan nama kolom di tabel (nim) terkait
DELIMITER $$
CREATE PROCEDURE hapusMahasiswa (IN nimMhs VARCHAR(5))
BEGIN	
	DELETE FROM mahasiswa WHERE nim = nimMhs;
END$$
DELIMITER ;

-- Menghapus mahasiswa sesuai nim
CALL hapusMahasiswa("92131");

SELECT * FROM mahasiswa;

-- Relasi (Hubungan) : Menampilkan banyak data diantara beberapa table
-- Jika terdapat error ambiguous itu berarti data perlu dipastikan dimana letaknya, kode_prodi terdapat di table mahasiswa dan prodi, silahkan pilih kode_prodi yang terdapat di table terkait.
-- mahasiswa.kode_prodi / prodi.kode_prodi

-- 1.) Menggunakan Relasi Biasa
SELECT nim, nama, alamat, mahasiswa.kode_prodi, nama_prodi, jurusan FROM mahasiswa, prodi WHERE mahasiswa.kode_prodi = prodi.kode_prodi;

-- 2.) Menggunakan JOIN
SELECT nim, nama, alamat, mahasiswa.kode_prodi, nama_prodi, jurusan FROM mahasiswa JOIN prodi USING(kode_prodi);

SELECT nim, nama, alamat, nama_prodi FROM mahasiswa, prodi WHERE mahasiswa.kode_prodi = prodi.kode_prodi;