CREATE TABLE `pegawai` (
  `id_pegawai` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kar` varchar(255),
  `tempat_lahir` varchar(100),
  `tgl_lahir` date,
  `jk` int(2),
  `stt_pegawai` int(255),
  `nik` int(11),
  `tgl_mulai_kerja` date,
  `pangkat` int(12),
  `tmt_pangkat` date,
  `sisa_peny_ijazah` int(9),
  `peny_ijazah` date,
  `gaji` int(9),
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*split*/

CREATE TABLE `mas_status_pegawai` (
  `id_mas_status_pegawai` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mas_status_pegawai` varchar(50),
  PRIMARY KEY (`id_mas_status_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*split*/

CREATE TABLE `mas_pangkat` (
  `id_mas_pangkat` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mas_pangkat` varchar(5),
  PRIMARY KEY (`id_mas_pangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*split*/

CREATE TABLE `his_pangkat` (
  `id_his_pangkat` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_pegawai` int(12),
  `fk_id_mas_pangkat` int(12),
  `dari_tgl` date,
  `sampai_tgl` date,
  PRIMARY KEY (`id_his_pangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;