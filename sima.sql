-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 01:20 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sima`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) unsigned NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(15) NOT NULL,
  `id_specification` int(15) NOT NULL,
  `id_departement` int(15) NOT NULL,
  `asset_no` varchar(15) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `warranty` varchar(25) NOT NULL,
  `exp_date_wrr` date NOT NULL,
  `act_condition` enum('Useable','Unuseable','Damage') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_invoice`, `id_category`, `id_brand`, `id_specification`, `id_departement`, `asset_no`, `item_name`, `warranty`, `exp_date_wrr`, `act_condition`) VALUES
(2, 2, 6, 8, 3, 13, 'M0001', 'Mouse', '3 bulan', '2017-12-02', 'Damage');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id_brand` int(11) unsigned NOT NULL,
  `brand_code` varchar(15) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `brand_code`, `brand_name`) VALUES
(1, 'acer', 'Acer'),
(2, 'amp', 'AMP'),
(3, 'apc', 'APC'),
(4, 'beld', 'Belden'),
(5, 'buff', 'Buffalo'),
(6, 'chang', 'Changhong'),
(7, 'cisco', 'Cisco Linksys'),
(8, 'deep', 'Deepcol'),
(9, 'dell', 'Dell'),
(10, 'd-link', 'D-Link');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id_category` int(11) unsigned NOT NULL,
  `category_code` varchar(15) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category_code`, `category_name`) VALUES
(1, 'abs', 'Absensi'),
(2, 'acc', 'Accessoris'),
(3, 'mod', 'Modem'),
(4, 'net', 'Networking'),
(5, 'not', 'Notworking'),
(6, 'pc', 'PC'),
(7, 'pri', 'Printer'),
(8, 'pro', 'Projector'),
(9, 'ser', 'Server'),
(10, 'sof', 'Software'),
(11, 'ups', 'UPS'),
(12, 'war', 'Warranty');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
`id_departement` int(11) unsigned NOT NULL,
  `departement_code` varchar(15) NOT NULL,
  `departement_name` varchar(15) NOT NULL,
  `departement_location` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `departement_code`, `departement_name`, `departement_location`) VALUES
(1, 'bd', 'BD', 'Head Office'),
(2, 'bod', 'BOD', 'Head Office'),
(3, 'fin', 'Finance', 'Head Office'),
(4, 'ga', 'GA', 'Head Office'),
(5, 'ho', 'HO', 'Head Office'),
(6, 'it', 'IT', 'Head Office'),
(7, 'pro', 'Procurement', 'Head Office'),
(8, 'pur', 'Purchase', 'Head Office'),
(9, 'sd', 'SD', 'Head Office'),
(10, 'bango', 'Bango', 'Project'),
(11, 'her', 'Hero', 'Project'),
(12, 'hli', 'HLI', 'Project'),
(13, 'uj', 'UJ', 'Project');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`id_invoice` int(11) unsigned NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `invoice_date` date NOT NULL,
  `date_received` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_pembelian`, `invoice_no`, `invoice_date`, `date_received`, `price`) VALUES
(2, 1, 'INV/M/3003', '2017-02-06', '2017-02-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kepemilikan`
--

CREATE TABLE IF NOT EXISTS `kepemilikan` (
`id_kepemilikan` int(11) unsigned NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `date_received` date NOT NULL,
  `kondisi` int(1) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(3) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Manajer Divisi'),
(3, 'Manajer Project'),
(4, 'Manajer Procurement'),
(5, 'Direktur'),
(6, 'Staff Procurement');

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_web`
--

CREATE TABLE IF NOT EXISTS `manajemen_web` (
`id_manajemen_web` int(11) unsigned NOT NULL,
  `navbar_inverse` varchar(255) NOT NULL,
  `a_focus` varchar(255) NOT NULL,
  `menu_top_active` varchar(255) NOT NULL,
  `page_head_line` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `manajemen_web`
--

INSERT INTO `manajemen_web` (`id_manajemen_web`, `navbar_inverse`, `a_focus`, `menu_top_active`, `page_head_line`, `footer`) VALUES
(1, 'background-color: #119c7e;', 'background-color: #119c7e!important;', 'background-color: #119c7e;', 'border-bottom: 2px solid #119c7e;color: #119c7e;', 'background-color: #119c7e;');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_pembelian` int(11) unsigned NOT NULL,
  `id_purchase_order` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_purchase_order`, `id_supplier`, `price`, `currency`) VALUES
(1, 5, 6, 200000, 'IDR'),
(2, 6, 6, 120000, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`id_purchase` int(11) unsigned NOT NULL,
  `id_user` int(11) NOT NULL,
  `purchase` varchar(50) NOT NULL,
  `no_purchase` varchar(15) NOT NULL,
  `date_purchase` date NOT NULL,
  `status_purchase` enum('Pending','Proses','Setuju','Tidak Setuju') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id_purchase`, `id_user`, `purchase`, `no_purchase`, `date_purchase`, `status_purchase`) VALUES
(2, 2, 'Monitor', 'LCD e 500', '2017-01-16', 'Setuju'),
(3, 3, 'Accer 4339 Series', 'LP100', '2017-12-31', 'Pending'),
(5, 3, 'Hard Disk 1 Terrabyte', 'HD1000GB', '2017-12-26', 'Setuju'),
(6, 3, 'Biawak', 'BW009', '2017-12-31', 'Setuju'),
(7, 2, 'Mouse Gamming', 'M 3001', '2017-01-28', 'Setuju'),
(8, 3, 'Hard Disk 500gb', 'PR/099/100', '2017-02-03', 'Tidak Setuju'),
(9, 2, 'Router', 'PR/099/101', '2017-01-02', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
`id_purchase_order` int(11) unsigned NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `po_no` varchar(15) NOT NULL,
  `po_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id_purchase_order`, `id_purchase`, `po_no`, `po_date`) VALUES
(5, 7, 'PO M 3001', '2017-02-03'),
(6, 6, 'PO/BW/009', '2017-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE IF NOT EXISTS `specification` (
`id_specification` int(11) unsigned NOT NULL,
  `processor` varchar(30) NOT NULL,
  `ram` varchar(25) NOT NULL,
  `hdd` varchar(25) NOT NULL,
  `display` varchar(25) NOT NULL,
  `os` varchar(20) NOT NULL,
  `notes` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`id_specification`, `processor`, `ram`, `hdd`, `display`, `os`, `notes`) VALUES
(3, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'Mouse ');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(11) unsigned NOT NULL,
  `supplier_code` varchar(15) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier_code`, `supplier_name`, `address`, `phone`) VALUES
(1, 'SP001', 'ZTECH INDONESIA', 'Mangga 2 Store', 812334800),
(2, 'SP002', 'UNITED TEKNOLOGI INTEGRASI, PT', 'Mangga Dua, Jakarta', 896778899),
(3, 'SP003', 'SAKURA JAYA SOLUSI, PT', 'Jakarta Selatan', 8814444),
(4, 'SP004', 'PRIMA CIPTA SEPADAN, CV', 'Jakarta', 990),
(5, 'SP005', 'PARANTA ANUGRAH PRIMA, PT', 'Bekasi', 219898),
(6, 'SP006', 'PT. Azag Izig', 'Kebayoran Lama', 98888123);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) unsigned NOT NULL,
  `id_departement` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_departement`, `nik`, `name`, `username`, `password`, `level`, `status`) VALUES
(1, 1, 19091, 'Admin SIMA', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1),
(2, 1, 190190190, 'Budi Suharji', 'divisi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 1),
(3, 1, 1111093, 'Susi Susanti', 'project', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 1),
(4, 1, 121001, 'Sri Mahrez', 'procurement', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 1),
(5, 1, 20022, 'Arul Fauzi', 'direktur', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 1),
(6, 1, 8008, 'Sri Wahyuni', 'staff', '7c4a8d09ca3762af61e59520943dc26494f8941b', 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
 ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
 ADD PRIMARY KEY (`id_kepemilikan`);

--
-- Indexes for table `manajemen_web`
--
ALTER TABLE `manajemen_web`
 ADD PRIMARY KEY (`id_manajemen_web`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`id_purchase`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
 ADD PRIMARY KEY (`id_purchase_order`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
 ADD PRIMARY KEY (`id_specification`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `id_brand` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id_category` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
MODIFY `id_departement` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `id_invoice` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kepemilikan`
--
ALTER TABLE `kepemilikan`
MODIFY `id_kepemilikan` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manajemen_web`
--
ALTER TABLE `manajemen_web`
MODIFY `id_manajemen_web` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id_pembelian` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `id_purchase` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
MODIFY `id_purchase_order` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
MODIFY `id_specification` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
