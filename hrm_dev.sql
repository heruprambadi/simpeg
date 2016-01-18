-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2014 at 07:25 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_aktif_kuliah`
--

CREATE TABLE IF NOT EXISTS `cms_aktif_kuliah` (
  `id_aktif_kuliah` int(20) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  `semester` set('Genap','Ganjil') DEFAULT NULL,
  `tahun_akademis` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_aktif_kuliah`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_aktif_kuliah`
--

INSERT INTO `cms_aktif_kuliah` (`id_aktif_kuliah`, `nomor_surat`, `nama_mahasiswa`, `npm`, `tempat_lahir`, `tanggal_lahir`, `fk_id_jurusan`, `semester`, `tahun_akademis`) VALUES
(1, 1, 'Heru Prambadi', 910031802108, 'Duri', '1991-05-18', NULL, 'Genap', '2013-2014');

-- --------------------------------------------------------

--
-- Table structure for table `cms_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `cms_ci_sessions` (
  `session_id` varchar(50) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(20) DEFAULT NULL,
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_ci_sessions`
--

INSERT INTO `cms_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2a05c7f06498d58af75dd86f0749d026', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36', 2006615182, 'a:7:{s:8:"cms_lang";s:7:"english";s:13:"cms_user_name";s:5:"admin";s:11:"cms_user_id";s:1:"1";s:18:"cms_user_real_name";s:5:"admin";s:14:"cms_user_email";s:22:"heruprambadi@gmail.com";s:21:"flash:old:cms_old_url";N;s:21:"flash:new:cms_old_url";N;}'),
('71e370a70d4ef52483171d46afd9de30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400242658, 'a:7:{s:8:"cms_lang";s:7:"english";s:13:"cms_user_name";s:5:"admin";s:11:"cms_user_id";s:1:"1";s:18:"cms_user_real_name";s:5:"admin";s:14:"cms_user_email";s:22:"heruprambadi@gmail.com";s:21:"flash:old:cms_old_url";N;s:21:"flash:new:cms_old_url";N;}'),
('98705c5d7f255b938ffd3a2b380d9a38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.137 Safari/537.36', 1400242658, 'a:2:{s:21:"flash:new:cms_old_url";N;s:8:"cms_lang";s:7:"english";}');

-- --------------------------------------------------------

--
-- Table structure for table `cms_folder`
--

CREATE TABLE IF NOT EXISTS `cms_folder` (
  `id_folder` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_folder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_kelakuan_baik`
--

CREATE TABLE IF NOT EXISTS `cms_kelakuan_baik` (
  `id_kelakuan_baik` int(20) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `semester` set('Genap','Ganjil') DEFAULT NULL,
  `tahun_akademis` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_kelakuan_baik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_ket_lulusan`
--

CREATE TABLE IF NOT EXISTS `cms_ket_lulusan` (
  `id_ket_lulusan` int(20) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_ket_lulusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_ket_tdk_terima_beasiswa`
--

CREATE TABLE IF NOT EXISTS `cms_ket_tdk_terima_beasiswa` (
  `id_ket_tdk_terima_beasiswa` int(20) NOT NULL AUTO_INCREMENT,
  `no_surat` int(4) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  `semester` set('Genap','Ganjil') DEFAULT NULL,
  `tahun_akademis` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_ket_tdk_terima_beasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_konfigurasi`
--

CREATE TABLE IF NOT EXISTS `cms_konfigurasi` (
  `id_konfigurasi` int(20) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status_akreditasi` varchar(20) DEFAULT NULL,
  `ketua_jurusan` varchar(50) DEFAULT NULL,
  `pangkat_ketua_jurusan` varchar(50) DEFAULT NULL,
  `nama_puket` varchar(50) DEFAULT NULL,
  `pangkat_puket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_authorization`
--

CREATE TABLE IF NOT EXISTS `cms_main_authorization` (
  `authorization_id` int(20) NOT NULL AUTO_INCREMENT,
  `authorization_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`authorization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_main_authorization`
--

INSERT INTO `cms_main_authorization` (`authorization_id`, `authorization_name`, `description`) VALUES
(1, 'Everyone', 'All visitor of the web are permitted (e.g:view blog content)'),
(2, 'Unauthenticated', 'Only non-member visitor, they who hasn''t log in yet (e.g:view member registration page)'),
(3, 'Authenticated', 'Only member (e.g:change password)'),
(4, 'Authorized', 'Only member with certain privilege (depend on group)');

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_config`
--

CREATE TABLE IF NOT EXISTS `cms_main_config` (
  `config_id` int(20) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) NOT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `cms_main_config`
--

INSERT INTO `cms_main_config` (`config_id`, `config_name`, `value`, `description`) VALUES
(1, 'site_name', 'No-CMS', 'Site title'),
(2, 'site_slogan', 'A Free CodeIgniter Based CMS Framework', 'Site slogan'),
(3, 'site_logo', '{{ base_url }}assets/nocms/images/No-CMS-logo.png', 'Site logo'),
(4, 'site_favicon', '{{ base_url }}assets/nocms/images/No-CMS-favicon.png', 'Site favicon'),
(5, 'site_footer', 'Sistem Management Kepegawaian STMIK AMIK RIAU © Heru Prambadi', 'Site footer'),
(6, 'site_theme', 'minimal', 'Site theme'),
(7, 'site_language', 'english', 'Site language'),
(8, 'max_menu_depth', '5', 'Depth of menu recursive'),
(9, 'cms_email_reply_address', 'no-reply@No-CMS.com', 'Email address'),
(10, 'cms_email_reply_name', 'admin of No-CMS', 'Email name'),
(11, 'cms_email_forgot_subject', 'Re-activate your account at No-CMS', 'Email subject sent when user forgot his/her password'),
(12, 'cms_email_forgot_message', 'Dear, {{ user_real_name }}<br />Click <a href="{{ site_url }}main/forgot/{{ activation_code }}">{{ site_url }}main/forgot/{{ activation_code }}</a> to reactivate your account', 'Email message sent when user forgot his/her password'),
(13, 'cms_email_signup_subject', 'Activate your account at No-CMS', 'Email subject sent to activate user'),
(14, 'cms_email_signup_message', 'Dear, {{ user_real_name }}<br />Click <a href="{{ site_url }}main/activate/{{ activation_code }}">{{ site_url }}main/activate/{{ activation_code }}</a> to activate your account', 'Email message sent to activate user'),
(15, 'cms_signup_activation', 'FALSE', 'Send activation email to new member. Default : false, Alternatives : true, false'),
(16, 'cms_email_useragent', 'Codeigniter', 'Default : CodeIgniter'),
(17, 'cms_email_protocol', 'smtp', 'Default : smtp, Alternatives : mail, sendmail, smtp'),
(18, 'cms_email_mailpath', '/usr/sbin/sendmail', 'Default : /usr/sbin/sendmail'),
(19, 'cms_email_smtp_host', 'ssl://smtp.googlemail.com', 'eg : ssl://smtp.googlemail.com'),
(20, 'cms_email_smtp_user', 'your_gmail_address@gmail.com', 'eg : your_gmail_address@gmail.com'),
(21, 'cms_email_smtp_pass', '', 'your password'),
(22, 'cms_email_smtp_port', '465', 'smtp port, default : 465'),
(23, 'cms_email_smtp_timeout', '30', 'default : 30'),
(24, 'cms_email_wordwrap', 'TRUE', 'Enable word-wrap. Default : true, Alternatives : true, false'),
(25, 'cms_email_wrapchars', '76', 'Character count to wrap at.'),
(26, 'cms_email_mailtype', 'html', 'Type of mail. If you send HTML email you must send it as a complete web page. Make sure you do not have any relative links or relative image paths otherwise they will not work. Default : html, Alternatives : html, text'),
(27, 'cms_email_charset', 'utf-8', 'Character set (utf-8, iso-8859-1, etc.).'),
(28, 'cms_email_validate', 'FALSE', 'Whether to validate the email address. Default: true, Alternatives : true, false'),
(29, 'cms_email_priority', '3', '1, 2, 3, 4, 5  Email Priority. 1 = highest. 5 = lowest. 3 = normal.'),
(30, 'cms_email_bcc_batch_mode', 'FALSE', 'Enable BCC Batch Mode. Default: false, Alternatives: true'),
(31, 'cms_email_bcc_batch_size', '200', 'Number of emails in each BCC batch.'),
(32, 'cms_google_analytic_property_id', '', 'Google analytics property ID (e.g: UA-30285787-1). Leave blank if you don''t want to use it.');

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_group`
--

CREATE TABLE IF NOT EXISTS `cms_main_group` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_main_group`
--

INSERT INTO `cms_main_group` (`group_id`, `group_name`, `description`) VALUES
(1, 'Admin', 'Every member of this group can do everything possible, but only programmer can turn the impossible into real :D'),
(2, 'Yayasan', 'Yayasan');

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_group_navigation`
--

CREATE TABLE IF NOT EXISTS `cms_main_group_navigation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `navigation_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `cms_main_group_navigation`
--

INSERT INTO `cms_main_group_navigation` (`id`, `group_id`, `navigation_id`) VALUES
(2, 1, 35),
(3, 1, 30),
(6, 1, 43),
(7, 1, 44),
(8, 1, 46),
(9, 1, 47),
(10, 1, 48),
(11, 1, 49),
(12, 1, 50),
(13, 1, 52),
(14, 1, 53),
(15, 1, 54),
(16, 1, 55),
(17, 2, 30),
(18, 1, 31),
(19, 2, 31),
(20, 1, 56),
(23, 1, 39),
(24, 2, 57),
(25, 2, 43),
(26, 2, 39),
(27, 2, 38),
(28, 2, 33),
(29, 2, 32),
(30, 2, 56),
(31, 2, 44),
(32, 2, 35),
(33, 1, 71),
(34, 1, 72),
(35, 1, 0),
(36, 1, 76),
(37, 1, 75),
(38, 1, 74),
(39, 1, 73);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_group_privilege`
--

CREATE TABLE IF NOT EXISTS `cms_main_group_privilege` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `privilege_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_group_user`
--

CREATE TABLE IF NOT EXISTS `cms_main_group_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_main_group_user`
--

INSERT INTO `cms_main_group_user` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_group_widget`
--

CREATE TABLE IF NOT EXISTS `cms_main_group_widget` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `widget_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_module`
--

CREATE TABLE IF NOT EXISTS `cms_main_module` (
  `module_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `module_path` varchar(100) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cms_main_module`
--

INSERT INTO `cms_main_module` (`module_id`, `module_name`, `module_path`, `version`, `user_id`) VALUES
(4, 'admin.simpeg_stmik', 'simpeg_stmik', '0.0.0', 1),
(5, 'admin.sim_penyuratan', 'sim_penyuratan', '0.0.0', 1),
(6, 'admin.evencal', 'evencal', '0.0.0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_module_dependency`
--

CREATE TABLE IF NOT EXISTS `cms_main_module_dependency` (
  `module_dependency_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_id` int(5) NOT NULL,
  `parent_id` int(5) NOT NULL,
  PRIMARY KEY (`module_dependency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_navigation`
--

CREATE TABLE IF NOT EXISTS `cms_main_navigation` (
  `navigation_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_name` varchar(50) NOT NULL,
  `parent_id` int(5) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `page_title` varchar(50) DEFAULT NULL,
  `page_keyword` varchar(100) DEFAULT NULL,
  `description` text,
  `url` varchar(100) DEFAULT NULL,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  `active` int(5) NOT NULL DEFAULT '0',
  `index` int(5) NOT NULL DEFAULT '0',
  `is_static` int(5) NOT NULL DEFAULT '0',
  `static_content` text,
  `only_content` int(5) NOT NULL DEFAULT '0',
  `default_theme` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`navigation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `cms_main_navigation`
--

INSERT INTO `cms_main_navigation` (`navigation_id`, `navigation_name`, `parent_id`, `title`, `page_title`, `page_keyword`, `description`, `url`, `authorization_id`, `active`, `index`, `is_static`, `static_content`, `only_content`, `default_theme`) VALUES
(1, 'main_login', NULL, 'Login', 'Login', NULL, 'Visitor need to login for authentication', 'main/login', 2, 1, 1, 0, NULL, 0, NULL),
(2, 'main_forgot', NULL, 'Forgot Password', 'Forgot', NULL, 'Accidentally forgot password', 'main/forgot', 2, 1, 3, 0, NULL, 0, NULL),
(3, 'main_logout', NULL, 'Logout', 'Logout', NULL, 'Logout for deauthentication', 'main/logout', 3, 1, 2, 0, NULL, 0, NULL),
(4, 'main_management', NULL, 'CMS Management', 'CMS Management', NULL, 'The main management of the CMS. Including User, Group, Privilege and Navigation Management', 'main/management', 4, 1, 6, 0, NULL, 0, NULL),
(5, 'main_register', NULL, 'Register', 'Register', NULL, 'New User Registration', 'main/register', 2, 1, 4, 0, NULL, 0, NULL),
(6, 'main_change_profile', NULL, 'Ubah Profile', 'Ubah Profile', NULL, 'Change Current Profile', 'main/change_profile', 3, 1, 5, 0, NULL, 0, NULL),
(7, 'main_group_management', 4, 'Group Management', 'Group Management', NULL, 'Group Management', 'main/group', 4, 1, 0, 0, NULL, 0, NULL),
(8, 'main_navigation_management', 4, 'Navigation Management', 'Navigation Management', NULL, 'Navigation management', 'main/navigation', 4, 1, 3, 0, NULL, 0, NULL),
(9, 'main_privilege_management', 4, 'Privilege Management', 'Privilege Management', NULL, 'Privilege Management', 'main/privilege', 4, 1, 2, 0, NULL, 0, NULL),
(10, 'main_user_management', 4, 'User Management', 'User Management', NULL, 'Manage User', 'main/user', 4, 1, 1, 0, NULL, 0, NULL),
(11, 'main_module_management', 4, 'Module Management', 'Module Management', NULL, 'Install Or Uninstall Thirdparty Module', 'main/module_management', 4, 1, 5, 0, NULL, 0, NULL),
(12, 'main_change_theme', 4, 'Change Theme', 'Change Theme', NULL, 'Change Theme', 'main/change_theme', 4, 1, 6, 0, NULL, 0, NULL),
(13, 'main_widget_management', 4, 'Widget Management', 'Widget Management', NULL, 'Manage Widgets', 'main/widget', 4, 1, 4, 0, NULL, 0, NULL),
(14, 'main_quicklink_management', 4, 'Quick Link Management', 'Quick Link Management', NULL, 'Manage Quick Link', 'main/quicklink', 4, 1, 7, 0, NULL, 0, NULL),
(15, 'main_config_management', 4, 'Configuration Management', 'Configuration Management', NULL, 'Manage Configuration Parameters', 'main/config', 4, 1, 8, 0, NULL, 0, NULL),
(16, 'main_layout', 4, 'Layout Management', 'Layout Management', NULL, 'Manage Layout', 'main/layout', 4, 1, 9, 0, NULL, 0, NULL),
(17, 'main_index', NULL, 'Home', 'Home', NULL, 'There is no place like home :D', 'main/index', 1, 1, 0, 1, '<h1>\r\n	<span style="font-size:24px;">SISTEM MANAJEMEN KEPEGAWAIAN STMIK AMIK RIAU</span></h1>\r\n<h3>\r\n	<span style="font-size: 12px;">Diajukan untuk memenuhi persyaratan guna memperoleh gelar Sarjana Komputer</span></h3>\r\n<h3>\r\n	<strong style="font-size: 12px;">SEK</strong><strong style="font-size: 12px;">OL</strong><strong style="font-size: 12px;">A</strong><strong style="font-size: 12px;">H TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER AMIK&nbsp;</strong><strong style="font-size: 12px;">(STMIK-AMIK) RIAU</strong></h3>\r\n<h3>\r\n	<strong style="font-size: 12px;">JUR</strong><strong style="font-size: 12px;">U</strong><strong style="font-size: 12px;">S</strong><strong style="font-size: 12px;">A</strong><strong style="font-size: 12px;">N TEKNIK INFORMATIKA</strong></h3>\r\n<h3>\r\n	<span style="font-size: 12px;">PEKANBARU,&nbsp;</span><span style="font-size: 12px;">TAHUN 2013</span></h3>\r\n', 0, NULL),
(18, 'main_language', NULL, 'Language', 'Language', NULL, 'Choose the language', 'main/language', 1, 1, 0, 0, NULL, 0, NULL),
(19, 'main_third_party_auth', NULL, 'Third Party Authentication', 'Third Party Authentication', NULL, 'Third Party Authentication', 'main/hauth/index', 1, 1, 0, 0, NULL, 0, NULL),
(30, 'simpeg_stmik_index', NULL, 'Simpeg Stmik', NULL, NULL, NULL, 'simpeg_stmik/simpeg_stmik', 4, 1, 8, 0, NULL, 0, NULL),
(31, 'simpeg_stmik_manage_pegawai', 30, 'Data Pegawai', NULL, NULL, NULL, 'simpeg_stmik/manage_pegawai', 4, 1, 1, 0, NULL, 0, NULL),
(32, 'simpeg_stmik_manage_mas_status_pegawai', 30, 'Master Status Pegawai', NULL, NULL, NULL, 'simpeg_stmik/manage_mas_status_pegawai', 4, 1, 15, 0, NULL, 0, NULL),
(33, 'simpeg_stmik_manage_mas_pangkat', 30, 'Master Pangkat', NULL, NULL, NULL, 'simpeg_stmik/manage_mas_pangkat', 4, 1, 16, 0, NULL, 0, NULL),
(34, 'simpeg_stmik_manage_his_pangkat', 30, 'Riwayat Pangkat', NULL, NULL, NULL, 'simpeg_stmik/manage_his_pangkat', 4, 0, 17, 0, NULL, 0, NULL),
(35, 'simpeg_stmik_pemberitahuan', NULL, 'Pemberitahuan', NULL, NULL, NULL, 'simpeg_stmik/event', 4, 1, 0, 0, NULL, 0, NULL),
(38, 'simpeg_stmik_lap_stt', 41, 'Status', NULL, NULL, NULL, 'simpeg_stmik/laporan/status', 1, 1, 2, 0, NULL, 0, NULL),
(39, 'simpeg_stmik_lap_pangkat', 41, 'Pangkat', NULL, NULL, NULL, 'simpeg_stmik/laporan/pangkat', 4, 1, 3, 0, NULL, 0, NULL),
(40, 'simpeg_stmik_cari', 30, 'Pencarian', NULL, NULL, NULL, 'simpeg_stmik/search', 1, 0, 14, 0, NULL, 0, NULL),
(41, 'laporan_index', NULL, 'Laporan', NULL, NULL, NULL, '#', 4, 1, 0, 0, NULL, 0, NULL),
(43, 'simpeg_stmik_lap_jk', 41, 'Jenis Kelamin', NULL, NULL, NULL, 'simpeg_stmik/laporan/jenis_kelamin', 4, 1, 1, 0, NULL, 0, NULL),
(44, 'simpeg_stmik_mas_pend', 30, 'Master Tingkat Pendidikan', NULL, NULL, NULL, 'simpeg_stmik/mas_pendidikan', 4, 1, 13, 0, NULL, 0, NULL),
(45, 'simpeg_stmik_pend', 30, 'Pendidikan', NULL, NULL, NULL, 'simpeg_stmik/pendidikan/index', 4, 0, 12, 0, NULL, 0, 'noheader'),
(46, 'simpeg_stmik_detail', 30, 'Data Personal Pegawai', NULL, NULL, NULL, 'simpeg_stmik/personal/view_bio', 4, 0, 11, 0, NULL, 0, NULL),
(47, 'simpeg_stmik_view_bio', 30, 'Biodata', NULL, NULL, NULL, 'simpeg_stmik/personal/bio/', 4, 0, 10, 0, NULL, 0, 'noheader'),
(48, 'simpeg_stmik_view_pend', 30, 'Data Pendidikan', NULL, NULL, NULL, 'simpeg_stmik/personal/pend/', 4, 0, 9, 0, NULL, 0, 'noheader'),
(49, 'simpeg_stmik_view_pang', 30, 'Data Pangkat', NULL, NULL, NULL, 'simpeg_stmik/personal/pangkat/', 4, 0, 8, 0, NULL, 0, 'noheader'),
(50, 'simpeg_stmik_view_lamp', 30, 'Data Lampiran', NULL, NULL, NULL, 'simpeg_stmik/personal/lamp/', 4, 0, 7, 0, NULL, 0, 'noheader'),
(51, 'simpeg_stmik_detail_pend', 30, 'Data Pendidikan', NULL, NULL, NULL, 'simpeg_stmik/personal/view_pend', 4, 0, 6, 0, NULL, 0, NULL),
(52, 'simpeg_stmik_detail_pang', 30, 'Data Pangkat', NULL, NULL, NULL, 'simpeg_stmik/personal/view_pang', 4, 0, 5, 0, NULL, 0, NULL),
(53, 'simpeg_stmik_detail_lamp', 30, 'Data Lampiran', NULL, NULL, NULL, 'simpeg_stmik/personal/view_lamp', 4, 0, 4, 0, NULL, 0, NULL),
(54, 'simpeg_stmik_view_foto', 30, 'Foto Pegawai', NULL, NULL, NULL, 'simpeg_stmik/personal/foto/', 4, 0, 3, 0, NULL, 0, 'noheader'),
(55, 'simpeg_stmik_detail_foto', 30, 'Foto Pegawai', NULL, NULL, NULL, 'simpeg_stmik/personal/view_foto', 4, 0, 2, 0, NULL, 0, NULL),
(56, 'simpeg_stmik_mas_gaji', 30, 'Master Gaji', NULL, NULL, NULL, 'simpeg_stmik/mas_gaji/index', 4, 1, 18, 0, NULL, 0, NULL),
(57, 'simpeg_stmik_lap_his_pang', 41, 'Riwayat Pangkat', NULL, NULL, NULL, 'simpeg_stmik/laporan/his_pangkat', 4, 1, 0, 0, NULL, 0, NULL),
(58, 'sim_penyuratan_index', NULL, 'Sim Penyuratan', NULL, NULL, NULL, 'sim_penyuratan/sim_penyuratan', 1, 1, 9, 0, NULL, 0, NULL),
(59, 'sim_penyuratan_manage_folder', 58, 'Manage Folder', NULL, NULL, NULL, 'sim_penyuratan/manage_folder', 4, 1, 0, 0, NULL, 0, NULL),
(60, 'sim_penyuratan_manage_permohonan_cuti', 58, 'Manage Permohonan Cuti', NULL, NULL, NULL, 'sim_penyuratan/manage_permohonan_cuti', 4, 1, 1, 0, NULL, 0, NULL),
(61, 'sim_penyuratan_manage_permohonan_peng_data', 58, 'Manage Surat Permohonan Pengambilan Data', NULL, NULL, NULL, 'sim_penyuratan/manage_permohonan_peng_data', 4, 1, 2, 0, NULL, 0, NULL),
(62, 'sim_penyuratan_manage_permohonan_riset', 58, 'Manage Surat Permohonan Riset', NULL, NULL, NULL, 'sim_penyuratan/manage_permohonan_riset', 4, 1, 3, 0, NULL, 0, NULL),
(63, 'sim_penyuratan_manage_ket_tdk_terima_beasiswa', 58, 'Manage Surat Ket. Tidak Menerima Beasiswa', NULL, NULL, NULL, 'sim_penyuratan/manage_ket_tdk_terima_beasiswa', 4, 1, 4, 0, NULL, 0, NULL),
(64, 'sim_penyuratan_manage_ket_lulusan', 58, 'Manage Keterangan Lulusan', NULL, NULL, NULL, 'sim_penyuratan/manage_ket_lulusan', 4, 1, 5, 0, NULL, 0, NULL),
(65, 'sim_penyuratan_manage_kelakuan_baik', 58, 'Manage Surat Ket. Kelakuan Baik', NULL, NULL, NULL, 'sim_penyuratan/manage_kelakuan_baik', 4, 1, 6, 0, NULL, 0, NULL),
(66, 'sim_penyuratan_manage_mas_jurusan', 58, 'Manage Master Jurusan', NULL, NULL, NULL, 'sim_penyuratan/manage_mas_jurusan', 4, 1, 7, 0, NULL, 0, NULL),
(67, 'sim_penyuratan_manage_aktif_kuliah', 58, 'Manage Surat Ket. Aktif Kuliah', NULL, NULL, NULL, 'sim_penyuratan/manage_aktif_kuliah', 4, 1, 8, 0, NULL, 0, NULL),
(68, 'sim_penyuratan_manage_master_hal', 58, 'Manage Master Hal', NULL, NULL, NULL, 'sim_penyuratan/manage_master_hal', 4, 1, 9, 0, NULL, 0, NULL),
(69, 'sim_penyuratan_manage_pkl', 58, 'Manage PKL/Magang', NULL, NULL, NULL, 'sim_penyuratan/manage_pkl', 4, 1, 10, 0, NULL, 0, NULL),
(70, 'sim_penyuratan_manage_konfigurasi', 58, 'Manage Konfigurasi', NULL, NULL, NULL, 'sim_penyuratan/manage_konfigurasi', 4, 1, 11, 0, NULL, 0, NULL),
(71, 'evencal_index', NULL, 'Calendar', 'Calendar', NULL, NULL, 'evencal/evencal/index', 4, 1, 0, 0, NULL, 0, NULL),
(72, 'evencal_add_event', 71, 'Add Event', 'Add Event', NULL, NULL, 'evencal/evencal/add_event', 4, 0, 0, 0, NULL, 0, NULL),
(73, 'evencal_view', 71, 'View Calendar', 'View Calendar', NULL, NULL, 'calendar/calendar/view', 4, 0, 0, 0, NULL, 0, NULL),
(74, 'evencal_detail', 71, 'Detail Event', 'Detail Event', NULL, NULL, 'evencal/evencal/detail', 4, 0, 0, 0, NULL, 0, NULL),
(75, 'evencal_del', 71, 'Delete Event', 'Delete Event', NULL, NULL, 'evencal/evencal/delete_event', 4, 0, 0, 0, NULL, 0, NULL),
(76, 'evencal_do_add', 71, 'Do Add Event', 'Add Event', NULL, NULL, 'evencal/evencal/do_add', 4, 0, 0, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_privilege`
--

CREATE TABLE IF NOT EXISTS `cms_main_privilege` (
  `privilege_id` int(20) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_main_privilege`
--

INSERT INTO `cms_main_privilege` (`privilege_id`, `privilege_name`, `title`, `description`, `authorization_id`) VALUES
(1, 'cms_install_module', 'Install Module', 'Install Module is a very critical privilege, it allow authorized user to Install a module to the CMS.<br />By Installing module, the database structure can be changed. There might be some additional navigation and privileges added.<br /><br />You''d be better to give this authorization only authenticated and authorized user. (I suggest to make only admin have such a privilege)\r\n&nbsp;', 4),
(2, 'cms_manage_access', 'Manage Access', 'Manage access\r\n&nbsp;', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_quicklink`
--

CREATE TABLE IF NOT EXISTS `cms_main_quicklink` (
  `quicklink_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_id` int(5) NOT NULL,
  `index` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`quicklink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `cms_main_quicklink`
--

INSERT INTO `cms_main_quicklink` (`quicklink_id`, `navigation_id`, `index`) VALUES
(1, 17, 1),
(8, 30, 6),
(9, 41, 7),
(11, 35, 8),
(12, 1, 4),
(13, 6, 5),
(14, 3, 2),
(15, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_user`
--

CREATE TABLE IF NOT EXISTS `cms_main_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  `auth_OpenID` varchar(100) DEFAULT NULL,
  `auth_Facebook` varchar(100) DEFAULT NULL,
  `auth_Twitter` varchar(100) DEFAULT NULL,
  `auth_Yahoo` varchar(100) DEFAULT NULL,
  `auth_LinkedIn` varchar(100) DEFAULT NULL,
  `auth_MySpace` varchar(100) DEFAULT NULL,
  `auth_Foursquare` varchar(100) DEFAULT NULL,
  `auth_AOL` varchar(100) DEFAULT NULL,
  `auth_Live` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_main_user`
--

INSERT INTO `cms_main_user` (`user_id`, `user_name`, `email`, `password`, `activation_code`, `real_name`, `active`, `auth_OpenID`, `auth_Facebook`, `auth_Twitter`, `auth_Yahoo`, `auth_LinkedIn`, `auth_MySpace`, `auth_Foursquare`, `auth_AOL`, `auth_Live`) VALUES
(1, 'admin', 'heruprambadi@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'personalia', 'personalia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Admin Personalia', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_main_widget`
--

CREATE TABLE IF NOT EXISTS `cms_main_widget` (
  `widget_id` int(20) NOT NULL AUTO_INCREMENT,
  `widget_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `url` varchar(100) DEFAULT NULL,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  `active` int(5) NOT NULL DEFAULT '0',
  `index` int(5) NOT NULL DEFAULT '0',
  `is_static` int(5) NOT NULL DEFAULT '0',
  `static_content` text,
  `slug` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`widget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cms_main_widget`
--

INSERT INTO `cms_main_widget` (`widget_id`, `widget_name`, `title`, `description`, `url`, `authorization_id`, `active`, `index`, `is_static`, `static_content`, `slug`) VALUES
(1, 'section_top_fix', 'Top Fix Section', '', '', 1, 1, 1, 1, '{{ widget_name:top_navigation }}', NULL),
(2, 'section_banner', 'Banner Section', '', '', 1, 1, 2, 1, '<div class="span2">\r\n  <img src ="{{ site_logo }}" />\r\n</div>\r\n<div class="span10">\r\n  <h1>{{ site_name }}</h1>\r\n  <p>{{ site_slogan }}</p>\r\n</div>', NULL),
(3, 'section_left', 'Left Section', '', '', 1, 1, 3, 1, '', NULL),
(4, 'section_right', 'Right Section', '', '', 1, 1, 4, 1, '{{ widget_slug:sidebar }}<hr />{{ widget_slug:advertisement }}', NULL),
(5, 'section_bottom', 'Bottom Section', '', '', 1, 1, 5, 1, '{{ site_footer }}', NULL),
(6, 'left_navigation', 'Left Navigation', '', 'main/widget_left_nav', 1, 1, 6, 0, NULL, NULL),
(7, 'top_navigation', 'Top Navigation', '', 'main/widget_top_nav', 1, 1, 7, 0, NULL, NULL),
(8, 'quicklink', 'Quicklinks', '', 'main/widget_quicklink', 1, 1, 8, 0, NULL, NULL),
(9, 'login', 'Login', 'Visitor need to login for authentication', 'main/widget_login', 2, 1, 9, 0, '<form action="{{ site_url }}main/login" method="post" accept-charset="utf-8"><label>Identity</label><br><input type="text" name="identity" value=""><br><label>Password</label><br><input type="password" name="password" value=""><br><input type="submit" name="login" value="Log In"></form>', 'sidebar, user_widget'),
(10, 'logout', 'User Info', 'Logout', 'main/widget_logout', 3, 1, 10, 1, '{{ language:Welcome }} {{ user_name }}<br />\r\n<a href="{{ site_url }}main/logout">{{ language:Logout }}</a><br />', 'sidebar, user_widget'),
(11, 'social_plugin', 'Share This Page !!', 'Addthis', 'main/widget_social_plugin', 1, 1, 11, 1, '<!-- AddThis Button BEGIN -->\r\n<div class="addthis_toolbox addthis_default_style "><a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> <a class="addthis_button_preferred_5"></a> <a class="addthis_button_preferred_6"></a> <a class="addthis_button_preferred_7"></a> <a class="addthis_button_preferred_8"></a> <a class="addthis_button_preferred_9"></a> <a class="addthis_button_preferred_10"></a> <a class="addthis_button_preferred_11"></a> <a class="addthis_button_preferred_12"></a> <a class="addthis_button_preferred_13"></a> <a class="addthis_button_preferred_14"></a> <a class="addthis_button_preferred_15"></a> <a class="addthis_button_preferred_16"></a> <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a></div>\r\n<script src="http://s7.addthis.com/js/250/addthis_widget.js?domready=1" type="text/javascript"></script>\r\n<!-- AddThis Button END -->', 'sidebar'),
(12, 'google_search', 'Search', 'Search from google', '', 1, 0, 12, 1, '<!-- Google Custom Search Element -->\r\n<div id="cse" style="width: 100%;">Loading</div>\r\n<script src="http://www.google.com/jsapi" type="text/javascript"></script>\r\n<script type="text/javascript">// <![CDATA[\r\n    google.load(''search'', ''1'');\r\n    google.setOnLoadCallback(function(){var cse = new google.search.CustomSearchControl();cse.draw(''cse'');}, true);\r\n// ]]></script>', 'sidebar'),
(13, 'google_translate', 'Translate !!', '<p>The famous google translate</p>', '', 1, 0, 13, 1, '<!-- Google Translate Element -->\r\n<div id="google_translate_element" style="display:block"></div>\r\n<script>\r\nfunction googleTranslateElementInit() {\r\n  new google.translate.TranslateElement({pageLanguage: "af"}, "google_translate_element");\r\n};\r\n</script>\r\n<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>\r\n', 'sidebar'),
(14, 'calendar', 'Calendar', 'Indonesian Calendar', '', 1, 0, 14, 1, '<!-------Do not change below this line------->\r\n<div align="center" height="200px">\r\n    <iframe align="center" src="http://www.calendarlabs.com/calendars/web-content/calendar.php?cid=1001&uid=162232623&c=22&l=en&cbg=C3D9FF&cfg=000000&hfg=000000&hfg1=000000&ct=1&cb=1&cbc=2275FF&cf=verdana&cp=bottom&sw=0&hp=t&ib=0&ibc=&i=" width="170" height="155" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency=''true''>\r\n    Loading...\r\n    </iframe>\r\n    <div align="center" style="width:140px;font-size:10px;color:#666;">\r\n        Powered by <a  href="http://www.calendarlabs.com/" target="_blank" style="font-size:10px;text-decoration:none;color:#666;">Calendar</a> Labs\r\n    </div>\r\n</div>\r\n\r\n<!-------Do not change above this line------->', 'sidebar'),
(15, 'google_map', 'Map', 'google map', '', 1, 0, 15, 1, '<!-- Google Maps Element Code -->\r\n<iframe frameborder=0 marginwidth=0 marginheight=0 border=0 style="border:0;margin:0;width:150px;height:250px;" src="http://www.google.com/uds/modules/elements/mapselement/iframe.html?maptype=roadmap&element=true" scrolling="no" allowtransparency="true"></iframe>', 'sidebar'),
(16, 'donate_nocms', 'Donate No-CMS', 'No-CMS Donation', NULL, 1, 1, 16, 1, '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">\r\n<input type="hidden" name="cmd" value="_s-xclick">\r\n<input type="hidden" name="hosted_button_id" value="YDES6RTA9QJQL">\r\n<input type="image" src="{{ base_url }}assets/nocms/images/donation.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" width="165px" height="auto" style="width:165px!important;" />\r\n<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">\r\n</form>', 'advertisement');

-- --------------------------------------------------------

--
-- Table structure for table `cms_master_hal`
--

CREATE TABLE IF NOT EXISTS `cms_master_hal` (
  `id_hal` int(20) NOT NULL AUTO_INCREMENT,
  `hal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_hal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_mas_jurusan`
--

CREATE TABLE IF NOT EXISTS `cms_mas_jurusan` (
  `id_jurusan` int(20) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `kepala_jurusan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_permohonan_cuti`
--

CREATE TABLE IF NOT EXISTS `cms_permohonan_cuti` (
  `id_permohonan_cuti` int(20) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `jurusan` int(2) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` bigint(11) DEFAULT NULL,
  `alasan_cuti` text,
  `tahun_ajaran` varchar(11) DEFAULT NULL,
  `dosen_pa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_permohonan_cuti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_permohonan_peng_data`
--

CREATE TABLE IF NOT EXISTS `cms_permohonan_peng_data` (
  `id_permohonan_peng_data` int(20) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `kepada` varchar(200) DEFAULT NULL,
  `di` varchar(100) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `jurusan` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_permohonan_peng_data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_permohonan_riset`
--

CREATE TABLE IF NOT EXISTS `cms_permohonan_riset` (
  `id_permohonan_riset` int(20) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `kepada` varchar(200) DEFAULT NULL,
  `di` varchar(50) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `jurusan` int(2) DEFAULT NULL,
  `judul_penelitian` text,
  PRIMARY KEY (`id_permohonan_riset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pkl`
--

CREATE TABLE IF NOT EXISTS `cms_pkl` (
  `id_pkl` int(20) NOT NULL AUTO_INCREMENT,
  `nomor` int(4) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `fk_id_hal` int(2) DEFAULT NULL,
  `dari_tanggal` date DEFAULT NULL,
  `sampai_tangal` date DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(15) DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_pkl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_event`
--

CREATE TABLE IF NOT EXISTS `cms_sp_event` (
  `id_event` int(9) NOT NULL AUTO_INCREMENT,
  `fk_id_pegawai` int(9) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `pangkat_baru` int(2) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_sp_event`
--

INSERT INTO `cms_sp_event` (`id_event`, `fk_id_pegawai`, `nama_event`, `tanggal`, `pangkat_baru`) VALUES
(1, 3, 'Naik Pangkat', '2016-12-01', 2),
(2, 3, 'Naik Gaji', '2014-12-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_his_pangkat`
--

CREATE TABLE IF NOT EXISTS `cms_sp_his_pangkat` (
  `id_his_pangkat` int(20) NOT NULL AUTO_INCREMENT,
  `fk_id_pegawai` int(12) DEFAULT NULL,
  `fk_id_mas_pangkat` int(12) DEFAULT NULL,
  `dari_tgl` date DEFAULT NULL,
  `sampai_tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_his_pangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_lampiran`
--

CREATE TABLE IF NOT EXISTS `cms_sp_lampiran` (
  `id_att_biodata` int(2) NOT NULL AUTO_INCREMENT,
  `fk_id_pegawai` int(6) NOT NULL,
  `nama_file` varchar(50) DEFAULT NULL,
  `file_biodata` varchar(100) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_att_biodata`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_sp_lampiran`
--

INSERT INTO `cms_sp_lampiran` (`id_att_biodata`, `fk_id_pegawai`, `nama_file`, `file_biodata`, `ket`) VALUES
(1, 310, 'akta', 'e111c-akta.jpg', 'akta kelahiran'),
(2, 3, 'ss', '6b990-1-(1).docx', 'ss'),
(3, 3, 'rr', '42f8d-pedomanpenulisanskripsi.docx', 'rr');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_gaji`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_gaji` (
  `id_mas_gaji` int(2) NOT NULL AUTO_INCREMENT,
  `fk_id_mas_pangkat` int(2) NOT NULL,
  `lama_kerja` int(2) NOT NULL,
  `gaji` int(14) NOT NULL,
  PRIMARY KEY (`id_mas_gaji`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

--
-- Dumping data for table `cms_sp_mas_gaji`
--

INSERT INTO `cms_sp_mas_gaji` (`id_mas_gaji`, `fk_id_mas_pangkat`, `lama_kerja`, `gaji`) VALUES
(1, 1, 0, 945000),
(2, 1, 2, 973200),
(3, 1, 4, 1002300),
(4, 1, 6, 1032225),
(5, 1, 8, 1063050),
(6, 1, 10, 1094775),
(7, 1, 12, 1127475),
(8, 1, 14, 1161150),
(9, 1, 16, 1195800),
(10, 1, 18, 1231500),
(11, 1, 20, 1268250),
(12, 1, 22, 1306125),
(13, 1, 24, 1345125),
(14, 1, 26, 1385250),
(15, 2, 3, 1029525),
(16, 2, 5, 1060275),
(17, 9, 0, 1548075),
(18, 9, 2, 1594275),
(19, 9, 4, 1641900),
(20, 9, 6, 1690950),
(21, 9, 8, 1741425),
(22, 9, 10, 1793400),
(23, 9, 12, 1846950),
(24, 9, 14, 1902075),
(25, 9, 16, 1958925),
(26, 9, 18, 2017350),
(27, 9, 20, 2077575),
(28, 9, 22, 2139675),
(29, 9, 24, 2203500),
(30, 9, 26, 2269350),
(31, 9, 28, 2337075),
(32, 9, 30, 2406825),
(33, 9, 32, 2478750),
(34, 10, 0, 1613550),
(35, 10, 2, 1661775),
(36, 10, 4, 1711350),
(37, 10, 6, 1762425),
(38, 10, 8, 1815075),
(39, 10, 10, 1869300),
(40, 10, 12, 1925100),
(41, 10, 14, 1982550),
(42, 10, 16, 2041725),
(43, 10, 18, 2102700),
(44, 10, 20, 2165475),
(45, 10, 22, 2230125),
(46, 10, 24, 2296725),
(47, 10, 26, 2365275),
(48, 10, 28, 2435925),
(49, 10, 30, 2508675),
(50, 10, 32, 2583600),
(51, 11, 0, 1681800),
(52, 11, 2, 1732050),
(53, 11, 4, 1783725),
(54, 11, 6, 1836975),
(55, 11, 8, 1891875),
(56, 11, 10, 1948350),
(57, 11, 12, 2006475),
(58, 11, 14, 2066400),
(59, 11, 16, 2155125),
(60, 11, 18, 2191650),
(61, 11, 20, 2257125),
(62, 11, 22, 2324475),
(63, 11, 24, 2393925),
(64, 11, 26, 2465400),
(65, 11, 28, 2538975),
(66, 11, 30, 2614800),
(67, 11, 32, 2692875),
(68, 12, 0, 1752975),
(69, 12, 2, 1805325),
(70, 12, 4, 1859175),
(71, 12, 6, 1914675),
(72, 12, 8, 1971900),
(73, 12, 10, 2030775),
(74, 12, 12, 2091375),
(75, 12, 14, 2153850),
(76, 12, 16, 2218125),
(77, 12, 18, 2284350),
(78, 12, 20, 2352600),
(79, 12, 22, 2422800),
(80, 12, 24, 2495175),
(81, 12, 26, 2569650),
(82, 12, 28, 2646375),
(83, 12, 30, 2725350),
(84, 12, 32, 2806725),
(85, 13, 0, 1827075),
(86, 13, 2, 1881675),
(87, 13, 4, 1937850),
(88, 13, 6, 1995675),
(89, 13, 8, 2055300),
(90, 13, 10, 2116650),
(91, 13, 12, 2179875),
(92, 13, 14, 2244900),
(93, 13, 16, 2311950),
(94, 13, 18, 2381025),
(95, 13, 20, 2452050),
(96, 13, 22, 2525325),
(97, 13, 24, 2600700),
(98, 13, 26, 2678325),
(99, 13, 28, 2758350),
(100, 13, 30, 2840700),
(101, 13, 32, 2925450),
(102, 14, 0, 1904400),
(103, 14, 2, 1961250),
(104, 14, 4, 2019825),
(105, 14, 6, 2080125),
(106, 14, 8, 2142225),
(107, 14, 10, 2206200),
(108, 14, 12, 2272050),
(109, 14, 14, 2339925),
(110, 14, 16, 2409750),
(111, 14, 18, 2481675),
(112, 14, 20, 2285775),
(113, 14, 22, 2632125),
(114, 14, 24, 2710725),
(115, 14, 26, 2791650),
(116, 14, 28, 2874975),
(117, 14, 30, 2960850),
(118, 14, 32, 3049200),
(119, 15, 0, 1984950),
(120, 15, 2, 2044200),
(121, 15, 4, 2105250),
(122, 15, 6, 2168100),
(123, 15, 8, 2232825),
(124, 15, 10, 2299500),
(125, 15, 12, 2368200),
(126, 15, 14, 2438850),
(127, 15, 16, 2511675),
(128, 15, 18, 2586675),
(129, 15, 20, 2663925),
(130, 15, 22, 2743425),
(131, 15, 24, 2825400),
(132, 15, 26, 2909700),
(133, 15, 28, 2996625),
(134, 15, 30, 3086100),
(135, 15, 32, 3178200),
(136, 16, 0, 2068875),
(137, 16, 2, 2130675),
(138, 16, 4, 2194275),
(139, 16, 6, 2259825),
(140, 16, 8, 2327325),
(141, 16, 10, 2396775),
(142, 16, 12, 2468325),
(143, 16, 14, 2542050),
(144, 16, 16, 2617950),
(145, 16, 18, 2696100),
(146, 16, 20, 2776575),
(147, 16, 22, 2859525),
(148, 16, 24, 2944875),
(149, 16, 26, 3032775),
(150, 16, 28, 3123375),
(152, 16, 30, 3216600),
(153, 16, 32, 3312675),
(154, 17, 0, 2156400),
(155, 17, 2, 2220825),
(156, 17, 4, 2287125),
(157, 17, 6, 2355375),
(158, 17, 8, 2425725),
(159, 17, 10, 2498175),
(160, 17, 12, 2572725),
(161, 17, 14, 2649600),
(162, 17, 16, 2728650),
(163, 17, 18, 2810175),
(164, 17, 20, 2894025),
(165, 17, 22, 2980425),
(166, 17, 24, 3069450),
(167, 17, 26, 3161100),
(168, 17, 28, 3255450),
(169, 17, 30, 3352650),
(170, 17, 32, 3452775),
(171, 2, 7, 1455900),
(172, 2, 9, 1499400),
(173, 2, 11, 1544100),
(174, 2, 13, 1590300),
(175, 2, 15, 1637700),
(176, 2, 17, 1686600),
(177, 2, 19, 1737000),
(178, 2, 21, 1788900),
(179, 2, 23, 1842300),
(180, 2, 25, 1897300),
(181, 2, 27, 1953900),
(182, 3, 3, 1430800),
(183, 3, 5, 1473500),
(184, 3, 7, 1517500),
(185, 3, 9, 1562800),
(186, 3, 11, 1609500),
(187, 3, 13, 1657500),
(188, 3, 15, 1707000),
(189, 3, 17, 1758000),
(190, 3, 19, 1810500),
(191, 3, 21, 1864500),
(192, 3, 23, 1920200),
(193, 3, 25, 1977500),
(194, 3, 27, 2036600),
(195, 4, 3, 1491300),
(196, 4, 5, 1535800),
(197, 4, 7, 1581700),
(198, 4, 9, 1628900),
(199, 4, 11, 1677500),
(200, 4, 13, 1727600),
(201, 4, 15, 1779200),
(202, 4, 17, 1832300),
(203, 4, 19, 1887000),
(204, 4, 21, 1943400),
(205, 4, 23, 2001400),
(206, 4, 25, 2061200),
(207, 4, 27, 2122700),
(208, 5, 0, 1218525),
(209, 5, 1, 1236675),
(210, 5, 3, 1273650),
(211, 5, 5, 1311675),
(212, 5, 7, 1350825),
(213, 5, 9, 1391175),
(214, 5, 11, 1432725),
(215, 5, 13, 1475475),
(216, 5, 15, 1519500),
(217, 5, 17, 1564875),
(218, 5, 19, 1611600),
(219, 5, 21, 1659750),
(220, 5, 23, 1709325),
(221, 5, 25, 1760325),
(222, 5, 27, 1812900),
(223, 5, 29, 1867050),
(224, 5, 31, 1922775),
(225, 5, 33, 1980150),
(226, 6, 3, 1327500),
(227, 6, 5, 1367175),
(228, 6, 7, 1407975),
(229, 6, 9, 1449975),
(230, 6, 11, 1493325),
(231, 6, 13, 1537875),
(232, 6, 15, 1583775),
(233, 6, 17, 1631100),
(234, 6, 19, 1679775),
(235, 6, 21, 1729950),
(236, 6, 23, 1781625),
(237, 6, 25, 1834800),
(238, 6, 27, 1889550),
(239, 6, 29, 1946025),
(240, 6, 31, 2004075),
(241, 6, 33, 2063925),
(273, 7, 3, 1383675),
(274, 7, 5, 1425000),
(275, 7, 7, 1467525),
(276, 7, 9, 1511325),
(277, 7, 11, 1556475),
(278, 7, 13, 1602900),
(279, 7, 15, 1650825),
(280, 7, 17, 1700100),
(281, 7, 19, 1750875),
(282, 7, 21, 1803150),
(283, 7, 23, 1856925),
(284, 7, 25, 1912425),
(285, 7, 27, 1969500),
(286, 7, 29, 2028300),
(287, 7, 31, 2088900),
(288, 7, 33, 2151225),
(289, 8, 3, 1442175),
(290, 8, 5, 1485225),
(291, 8, 7, 1529625),
(292, 8, 9, 1575300),
(293, 8, 11, 1622325),
(294, 8, 13, 1670775),
(295, 8, 15, 1720650),
(296, 8, 17, 1772025),
(297, 8, 19, 1824900),
(298, 8, 21, 1879425),
(299, 8, 23, 1935525),
(300, 8, 25, 1993275),
(301, 8, 27, 2052825),
(302, 8, 29, 2114100),
(303, 8, 31, 2177250),
(304, 8, 33, 2242200);

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_jabatan`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_jabatan` (
  `id_mas_jabatan` int(2) NOT NULL AUTO_INCREMENT,
  `nama_mas_jabatan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mas_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cms_sp_mas_jabatan`
--

INSERT INTO `cms_sp_mas_jabatan` (`id_mas_jabatan`, `nama_mas_jabatan`) VALUES
(1, 'Ketua Yayasan'),
(2, 'Sekretaris Yayasan'),
(3, 'Bendahara'),
(4, 'Kepala Jurusan TI');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_jk`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_jk` (
  `id_mas_jk` int(9) NOT NULL AUTO_INCREMENT,
  `nama_mas_jk` varchar(10) NOT NULL,
  PRIMARY KEY (`id_mas_jk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cms_sp_mas_jk`
--

INSERT INTO `cms_sp_mas_jk` (`id_mas_jk`, `nama_mas_jk`) VALUES
(0, 'Wanita'),
(1, 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_pangkat`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_pangkat` (
  `id_mas_pangkat` int(20) NOT NULL AUTO_INCREMENT,
  `nama_mas_pangkat` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_mas_pangkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cms_sp_mas_pangkat`
--

INSERT INTO `cms_sp_mas_pangkat` (`id_mas_pangkat`, `nama_mas_pangkat`) VALUES
(1, 'I A'),
(2, 'I B'),
(3, 'I C'),
(4, 'I D'),
(5, 'II A'),
(6, 'II B'),
(7, 'II C'),
(8, 'II D'),
(9, 'III A'),
(10, 'III B'),
(11, 'III C'),
(12, 'III D'),
(13, 'IV A'),
(14, 'IV B'),
(15, 'IV C'),
(16, 'IV D'),
(17, 'IV E');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_pend`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_pend` (
  `id_mas_tingkat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mas_pend` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mas_tingkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cms_sp_mas_pend`
--

INSERT INTO `cms_sp_mas_pend` (`id_mas_tingkat`, `nama_mas_pend`) VALUES
(1, 'TK'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA'),
(5, 'D1'),
(6, 'D2'),
(7, 'D3'),
(8, 'S1'),
(9, 'S2'),
(10, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_rekomendasi`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_rekomendasi` (
  `id_rekomendasi` int(9) NOT NULL AUTO_INCREMENT,
  `nama_rekomendasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rekomendasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_sp_mas_rekomendasi`
--

INSERT INTO `cms_sp_mas_rekomendasi` (`id_rekomendasi`, `nama_rekomendasi`) VALUES
(1, '3 Semester Uang Kuliah + Sewa Rumah'),
(2, '4 Semester Uang Kuliah + Sewa Rumah'),
(3, 'Disetarakan Beasiswa Pemprov (untuk 2 Tahun) + Sewa Rumah');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_mas_status_pegawai`
--

CREATE TABLE IF NOT EXISTS `cms_sp_mas_status_pegawai` (
  `id_mas_status_pegawai` int(20) NOT NULL AUTO_INCREMENT,
  `nama_mas_status_pegawai` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mas_status_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_sp_mas_status_pegawai`
--

INSERT INTO `cms_sp_mas_status_pegawai` (`id_mas_status_pegawai`, `nama_mas_status_pegawai`) VALUES
(1, 'Tetap'),
(2, 'Tidak Tetap'),
(3, 'Kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_pegawai`
--

CREATE TABLE IF NOT EXISTS `cms_sp_pegawai` (
  `id_pegawai` int(20) NOT NULL AUTO_INCREMENT,
  `nama_kar` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` int(2) DEFAULT NULL,
  `stt_pegawai` int(2) DEFAULT NULL,
  `nik` int(12) DEFAULT NULL,
  `tgl_mulai_kerja` date DEFAULT NULL,
  `tmt_pangkat` date NOT NULL,
  `tgl_sd_pangkat` date NOT NULL,
  `pangkat` int(2) DEFAULT NULL,
  `jabatan` int(2) NOT NULL,
  `sisa_peny_ijazah` int(9) DEFAULT NULL,
  `peny_ijazah` date DEFAULT NULL,
  `gaji_lama` int(14) NOT NULL,
  `gaji_baru` int(14) NOT NULL,
  `id_gaji` int(3) NOT NULL,
  `gaji` int(14) DEFAULT NULL,
  `beasiswa` int(2) NOT NULL,
  `lama_studi` int(2) NOT NULL,
  `rekomendasi` int(2) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_sp_pegawai`
--

INSERT INTO `cms_sp_pegawai` (`id_pegawai`, `nama_kar`, `tempat_lahir`, `tgl_lahir`, `jk`, `stt_pegawai`, `nik`, `tgl_mulai_kerja`, `tmt_pangkat`, `tgl_sd_pangkat`, `pangkat`, `jabatan`, `sisa_peny_ijazah`, `peny_ijazah`, `gaji_lama`, `gaji_baru`, `id_gaji`, `gaji`, `beasiswa`, `lama_studi`, `rekomendasi`, `foto`) VALUES
(1, 'ff', NULL, '2013-12-02', 1, 3, 33, '2013-12-15', '2013-12-01', '0000-00-00', 3, 0, NULL, NULL, 0, 0, 2, NULL, 0, 0, 0, ''),
(2, 'ff', 'ff', '2013-12-02', 1, 3, 33, '2013-12-15', '2013-12-31', '0000-00-00', 3, 0, NULL, NULL, 0, 0, 2, NULL, 1, 0, 0, ''),
(3, 'uuyui', 'iuyuiuyui', '2013-12-01', 1, 3, 333, '1994-12-01', '2013-12-31', '2017-12-31', 1, 0, NULL, NULL, 945000, 945000, 1, 945000, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_sp_pendidikan`
--

CREATE TABLE IF NOT EXISTS `cms_sp_pendidikan` (
  `id_pendidikan` int(7) NOT NULL AUTO_INCREMENT,
  `fk_id_pegawai` int(6) NOT NULL DEFAULT '0',
  `fk_id_mas_pend` int(2) NOT NULL,
  `nama_tempat_belajar` varchar(100) NOT NULL DEFAULT '0',
  `tahun` int(4) NOT NULL,
  `ipk` int(5) NOT NULL,
  `dari_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_sp_pendidikan`
--

INSERT INTO `cms_sp_pendidikan` (`id_pendidikan`, `fk_id_pegawai`, `fk_id_mas_pend`, `nama_tempat_belajar`, `tahun`, `ipk`, `dari_tanggal`, `sampai_tanggal`) VALUES
(1, 310, 5, 'STMIK', 2009, 4, '2013-10-01', '2013-10-31'),
(2, 310, 6, 'as', 2, 32, '2013-10-02', '2013-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_date` date NOT NULL,
  `total_events` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_date`, `total_events`) VALUES
('2013-05-28', 3),
('2014-05-08', 2),
('2014-05-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_detail`
--

CREATE TABLE IF NOT EXISTS `event_detail` (
  `idevent` int(11) NOT NULL AUTO_INCREMENT,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event` varchar(200) NOT NULL,
  PRIMARY KEY (`idevent`),
  KEY `event_date` (`event_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `event_detail`
--

INSERT INTO `event_detail` (`idevent`, `event_date`, `event_time`, `event`) VALUES
(1, '2013-05-28', '20:18:13', 'Japan Class'),
(2, '2013-05-28', '20:18:13', 'Japan Class 2'),
(4, '2014-05-08', '01:01:00', 'ffff'),
(5, '2014-05-09', '02:04:00', 'wwww'),
(6, '2014-05-08', '01:06:00', 'ddd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_detail`
--
ALTER TABLE `event_detail`
  ADD CONSTRAINT `event_detail_ibfk_1` FOREIGN KEY (`event_date`) REFERENCES `events` (`event_date`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat369` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:53:54' ENDS '2017-11-17 23:54:54' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_369
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji369` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:53:54' ENDS '2015-11-17 23:54:54' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_369
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat350` ON SCHEDULE EVERY 4 YEAR STARTS '2017-11-19 14:16:25' ENDS '2017-11-19 14:17:25' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_350
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji365` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:35:56' ENDS '2015-11-17 23:36:56' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_365
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji350` ON SCHEDULE EVERY 2 YEAR STARTS '2015-11-19 14:16:25' ENDS '2015-11-19 14:17:25' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_350
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat365` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:35:56' ENDS '2017-11-17 23:36:56' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_365
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji364` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:30:26' ENDS '2015-11-17 23:31:26' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_364
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji347` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 22:57:01' ENDS '2015-11-17 22:58:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_347
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat348` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:01:10' ENDS '2017-11-17 23:02:10' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_348
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji348` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:01:10' ENDS '2015-11-17 23:02:10' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_348
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat349` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:04:25' ENDS '2017-11-17 23:05:25' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_349
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji349` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:04:25' ENDS '2015-11-17 23:05:25' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_349
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat356` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:18:14' ENDS '2017-11-17 23:19:14' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_356
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji356` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:18:14' ENDS '2015-11-17 23:19:14' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_356
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat364` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:30:26' ENDS '2017-11-17 23:31:26' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_364
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat367` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:45:42' ENDS '2017-11-17 23:46:42' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_367
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji367` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:45:42' ENDS '2015-11-17 23:46:42' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_367
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat346` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 22:44:53' ENDS '2017-11-17 22:45:53' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_346
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji346` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 22:44:53' ENDS '2015-11-17 22:45:53' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_346
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat345` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-07 00:44:22' ENDS '2017-11-07 00:45:22' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_345
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji345` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-07 00:44:22' ENDS '2015-11-07 00:45:22' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_345
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat347` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 22:57:01' ENDS '2017-11-17 22:58:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_347
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat3` ON SCHEDULE EVERY 11 SECOND STARTS '2017-12-17 12:21:37' ENDS '2017-12-17 12:22:37' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_3
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji3` ON SCHEDULE EVERY 11 SECOND STARTS '2015-12-17 12:21:37' ENDS '2015-12-17 12:22:37' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_3
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat340` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-07 00:29:56' ENDS '2017-11-07 00:30:56' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_340
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji340` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-07 00:29:56' ENDS '2015-11-07 00:30:56' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_340
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat341` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-07 00:32:54' ENDS '2017-11-07 00:33:54' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_341
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji341` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-07 00:32:54' ENDS '2015-11-07 00:33:54' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_341
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_pangkat_3` ON SCHEDULE EVERY 4 YEAR STARTS '2017-12-17 12:21:37' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
								INSERT INTO hrm_dev.cms_sp_his_pangkat (fk_id_pegawai, fk_id_mas_pangkat, dari_tgl, sampai_tgl) SELECT cms_sp_pegawai.id_pegawai, cms_sp_pegawai.pangkat, cms_sp_pegawai.tmt_pangkat, cms_sp_pegawai.tgl_sd_pangkat FROM hrm_dev.cms_sp_pegawai WHERE cms_sp_pegawai.id_pegawai = '3' and cms_sp_pegawai.pangkat < '17';
								UPDATE hrm_dev.cms_sp_pegawai SET cms_sp_pegawai.pangkat = cms_sp_pegawai.pangkat + 1, cms_sp_pegawai.tmt_pangkat = cms_sp_pegawai.tmt_pangkat + INTERVAL 4 YEAR, cms_sp_pegawai.tgl_sd_pangkat = cms_sp_pegawai.tgl_sd_pangkat + INTERVAL 4 YEAR WHERE cms_sp_pegawai.id_pegawai = '3' and cms_sp_pegawai.pangkat < '17';
								UPDATE hrm_dev.cms_sp_event SET cms_sp_event.pangkat_baru = cms_sp_event.pangkat_baru + 1, cms_sp_event.tanggal = cms_sp_event.tanggal + INTERVAL 4 YEAR WHERE cms_sp_event.fk_id_pegawai = '3' AND cms_sp_event.nama_event = 'Naik Pangkat' AND cms_sp_event.pangkat_baru < '17';
								END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_gaji_3` ON SCHEDULE EVERY 2 YEAR STARTS '2015-12-17 12:21:37' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
        						UPDATE hrm_dev.cms_sp_pegawai, hrm_dev.cms_sp_event SET cms_sp_event.tanggal = cms_sp_event.tanggal + INTERVAL 2 YEAR WHERE cms_sp_event.fk_id_pegawai = '3' AND cms_sp_pegawai.tgl_lahir <= cms_sp_pegawai.tgl_lahir + INTERVAL 60 YEAR;
        						UPDATE cms_sp_pegawai, cms_sp_mas_gaji SET cms_sp_pegawai.id_gaji = cms_sp_mas_gaji.id_mas_gaji WHERE cms_sp_pegawai.id_pegawai = '3' AND cms_sp_pegawai.pangkat = cms_sp_mas_gaji.fk_id_mas_pangkat AND cms_sp_mas_gaji.lama_kerja > '17' AND cms_sp_mas_gaji.lama_kerja <= '19';
								UPDATE cms_sp_pegawai, cms_sp_mas_gaji SET cms_sp_pegawai.gaji_lama = cms_sp_pegawai.gaji_baru WHERE cms_sp_pegawai.id_pegawai = '3' AND cms_sp_pegawai.id_gaji = cms_sp_mas_gaji.id_mas_gaji;
								UPDATE cms_sp_pegawai, cms_sp_mas_gaji SET cms_sp_pegawai.gaji_baru = cms_sp_mas_gaji.gaji WHERE cms_sp_pegawai.id_pegawai = '3' AND cms_sp_pegawai.pangkat = cms_sp_mas_gaji.fk_id_mas_pangkat AND cms_sp_mas_gaji.lama_kerja > '17' AND cms_sp_mas_gaji.lama_kerja <= '19';
								UPDATE cms_sp_pegawai SET cms_sp_pegawai.gaji = ((cms_sp_pegawai.gaji_baru - cms_sp_pegawai.gaji_lama)+cms_sp_pegawai.gaji_baru) WHERE cms_sp_pegawai.id_pegawai = '3';
								END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat342` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-07 00:35:36' ENDS '2017-11-07 00:36:36' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_342
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji342` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-07 00:35:36' ENDS '2015-11-07 00:36:36' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_342
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat343` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-07 00:38:40' ENDS '2017-11-07 00:39:40' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_343
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji343` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-07 00:38:40' ENDS '2015-11-07 00:39:40' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_343
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat344` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-07 00:41:51' ENDS '2017-11-07 00:42:51' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_344
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji344` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-07 00:41:51' ENDS '2015-11-07 00:42:51' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_344
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat366` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:44:16' ENDS '2017-11-17 23:45:16' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_366
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji366` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:44:16' ENDS '2015-11-17 23:45:16' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_366
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_pangkat368` ON SCHEDULE EVERY 11 SECOND STARTS '2017-11-17 23:49:11' ENDS '2017-11-17 23:50:11' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_pangkat_368
						   			ON SCHEDULE EVERY 4 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 4 YEAR;
						   			END$$

CREATE DEFINER=`root`@`localhost` EVENT `ev_upd_gaji368` ON SCHEDULE EVERY 11 SECOND STARTS '2015-11-17 23:49:11' ENDS '2015-11-17 23:50:11' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
						   			ALTER EVENT ev_gaji_368
						   			ON SCHEDULE EVERY 2 YEAR
						   			STARTS CURRENT_TIMESTAMP + INTERVAL 2 YEAR;
						   			END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
