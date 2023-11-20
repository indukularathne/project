-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 04:36 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `add`
--

-- --------------------------------------------------------

--
-- Table structure for table `energy_programme`
--
/*energy_programme Query */
CREATE TABLE IF NOT EXISTS `energy_programme` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
   `schme` varchar(100) NOT NULL,
    `date` DATE NOT NULL,
  `description` varchar(100) NOT NULL,
  `project_cost` varchar(100) NOT NULL,
  `annual_savings` varchar(100) NOT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


/*Other Project Query */
CREATE TABLE IF NOT EXISTS `other_project` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
   `schme` varchar(100) NOT NULL,
    `date` DATE NOT NULL,
  `description` varchar(100) NOT NULL,
  `project_cost` varchar(100) NOT NULL,
  
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


/*user_registration Query */
CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `datetime`  TIMESTAMP,
   `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*user_login details */
CREATE TABLE IF NOT EXISTS `login_details` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `datetime`  TIMESTAMP,
   `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;