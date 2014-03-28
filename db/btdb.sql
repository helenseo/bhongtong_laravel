-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2014 at 03:32 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `btdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` int(11) NOT NULL,
  `setting_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `admins_level_id_index` (`level_id`),
  KEY `admins_setting_id_index` (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_levels`
--

CREATE TABLE IF NOT EXISTS `admin_levels` (
  `level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auction_have_tags`
--

CREATE TABLE IF NOT EXISTS `auction_have_tags` (
  `auction_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `autions_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`auction_tags_id`),
  KEY `auction_have_tags_autions_id_index` (`autions_id`),
  KEY `auction_have_tags_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `autions`
--

CREATE TABLE IF NOT EXISTS `autions` (
  `autions_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `starting_price` int(11) DEFAULT NULL,
  `final_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`autions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `autions_have_bidders`
--

CREATE TABLE IF NOT EXISTS `autions_have_bidders` (
  `auctions_bidders_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `autions_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidder_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`auctions_bidders_id`),
  KEY `autions_have_bidders_autions_id_index` (`autions_id`),
  KEY `autions_have_bidders_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `browsers`
--

CREATE TABLE IF NOT EXISTS `browsers` (
  `browser_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `browser_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`browser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `browsing_histories`
--

CREATE TABLE IF NOT EXISTS `browsing_histories` (
  `bs_history_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `browsing_date` datetime DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `os_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `browser_id` int(11) NOT NULL,
  PRIMARY KEY (`bs_history_id`),
  KEY `browsing_histories_os_id_index` (`os_id`),
  KEY `browsing_histories_ref_id_index` (`ref_id`),
  KEY `browsing_histories_browser_id_index` (`browser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `added_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `carts_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `carts_have_products`
--

CREATE TABLE IF NOT EXISTS `carts_have_products` (
  `cart_have_products_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`cart_have_products_id`),
  KEY `carts_have_products_cart_id_index` (`cart_id`),
  KEY `carts_have_products_product_id_index` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `charge_periods`
--

CREATE TABLE IF NOT EXISTS `charge_periods` (
  `charge_period_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `charge_periodcol_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`charge_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classified_lists`
--

CREATE TABLE IF NOT EXISTS `classified_lists` (
  `cf_list_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cf_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `added_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `removed_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cf_list_id`),
  KEY `classified_lists_shop_id_index` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `content_title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_description` longtext COLLATE utf8_unicode_ci,
  `added_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `views` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `removed_date` datetime DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`content_id`),
  KEY `contents_shop_id_index` (`shop_id`),
  KEY `contents_lang_id_index` (`lang_id`),
  KEY `contents_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents_have_content_categories`
--

CREATE TABLE IF NOT EXISTS `contents_have_content_categories` (
  `c_content_cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `content_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`c_content_cat_id`),
  KEY `contents_have_content_categories_content_id_index` (`content_id`),
  KEY `contents_have_content_categories_content_cat_id_index` (`content_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents_have_tags`
--

CREATE TABLE IF NOT EXISTS `contents_have_tags` (
  `contents_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`contents_tags_id`),
  KEY `contents_have_tags_content_id_index` (`content_id`),
  KEY `contents_have_tags_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

CREATE TABLE IF NOT EXISTS `content_categories` (
  `content_cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_description` text COLLATE utf8_unicode_ci,
  `cat_parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`content_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `coupon_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `started_date` datetime DEFAULT NULL,
  `ended_date` datetime DEFAULT NULL,
  `coupon_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`coupon_id`),
  KEY `coupons_shop_id_index` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_have_tags`
--

CREATE TABLE IF NOT EXISTS `coupons_have_tags` (
  `coupons_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  PRIMARY KEY (`coupons_tags_id`),
  KEY `coupons_have_tags_tag_id_index` (`tag_id`),
  KEY `coupons_have_tags_coupon_id_index` (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_histories`
--

CREATE TABLE IF NOT EXISTS `coupon_histories` (
  `coupon_history_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `buying_date` datetime DEFAULT NULL,
  `used_date` datetime DEFAULT NULL,
  `coupon_id` int(11) NOT NULL,
  PRIMARY KEY (`coupon_history_id`),
  KEY `coupon_histories_coupon_id_index` (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_histories`
--

CREATE TABLE IF NOT EXISTS `credit_histories` (
  `credit_histories_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `credit_method_id` int(11) NOT NULL,
  `credit_histories_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_pay_id` int(11) DEFAULT NULL,
  `user_pay_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_histories_id` int(11) NOT NULL,
  `datetime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`credit_histories_id`),
  KEY `credit_histories_credit_method_id_index` (`credit_method_id`),
  KEY `credit_histories_shop_id_index` (`shop_id`),
  KEY `credit_histories_user_id_index` (`user_id`),
  KEY `credit_histories_payment_histories_id_index` (`payment_histories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_methods`
--

CREATE TABLE IF NOT EXISTS `credit_methods` (
  `credit_method_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`credit_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `delivers`
--

CREATE TABLE IF NOT EXISTS `delivers` (
  `deliver_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deliver_detail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`deliver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enterprises`
--

CREATE TABLE IF NOT EXISTS `enterprises` (
  `ent_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ent_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `enterprise_type_id` int(11) NOT NULL,
  `registed_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `setting_id` int(11) NOT NULL,
  PRIMARY KEY (`ent_id`),
  KEY `enterprises_user_id_index` (`user_id`),
  KEY `enterprises_enterprise_type_id_index` (`enterprise_type_id`),
  KEY `enterprises_setting_id_index` (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enterprise_have_tags`
--

CREATE TABLE IF NOT EXISTS `enterprise_have_tags` (
  `enterprise_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `enterprises_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`enterprise_tags_id`),
  KEY `enterprise_have_tags_enterprises_id_index` (`enterprises_id`),
  KEY `enterprise_have_tags_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enterprise_types`
--

CREATE TABLE IF NOT EXISTS `enterprise_types` (
  `ent_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ent_type_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ent_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoices_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `addes_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`invoices_id`),
  KEY `invoices_order_id_index` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `lang_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_code` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `added_date` int(11) DEFAULT NULL,
  `edited_date` int(11) DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `shop_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `parent_message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `messages_user_id_index` (`user_id`),
  KEY `messages_shop_id_index` (`shop_id`),
  KEY `messages_sale_id_index` (`sale_id`),
  KEY `messages_admin_id_index` (`admin_id`),
  KEY `messages_order_id_index` (`order_id`),
  KEY `messages_ticket_id_index` (`ticket_id`),
  KEY `messages_product_id_index` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages_have_images`
--

CREATE TABLE IF NOT EXISTS `messages_have_images` (
  `message_image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`message_image_id`),
  KEY `messages_have_images_message_id_index` (`message_id`),
  KEY `messages_have_images_image_id_index` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_03_27_123252_create_admin_levels_table', 1),
('2014_03_27_123252_create_admins_table', 1),
('2014_03_27_123252_create_auction_have_tags_table', 1),
('2014_03_27_123252_create_autions_have_bidders_table', 1),
('2014_03_27_123252_create_autions_table', 1),
('2014_03_27_123252_create_browsers_table', 1),
('2014_03_27_123252_create_browsing_histories_table', 1),
('2014_03_27_123252_create_carts_have_products_table', 1),
('2014_03_27_123252_create_carts_table', 1),
('2014_03_27_123252_create_charge_periods_table', 1),
('2014_03_27_123252_create_classified_lists_table', 1),
('2014_03_27_123252_create_content_categories_table', 1),
('2014_03_27_123252_create_contents_have_content_categories_table', 1),
('2014_03_27_123252_create_contents_have_tags_table', 1),
('2014_03_27_123252_create_contents_table', 1),
('2014_03_27_123252_create_coupon_histories_table', 1),
('2014_03_27_123252_create_coupons_have_tags_table', 1),
('2014_03_27_123252_create_coupons_table', 1),
('2014_03_27_123252_create_credit_histories_table', 1),
('2014_03_27_123252_create_credit_methods_table', 1),
('2014_03_27_123252_create_delivers_table', 1),
('2014_03_27_123252_create_enterprise_have_tags_table', 1),
('2014_03_27_123252_create_enterprise_types_table', 1),
('2014_03_27_123252_create_enterprises_table', 1),
('2014_03_27_123252_create_images_table', 1),
('2014_03_27_123252_create_invoices_table', 1),
('2014_03_27_123252_create_languages_table', 1),
('2014_03_27_123252_create_messages_have_images_table', 1),
('2014_03_27_123252_create_messages_table', 1),
('2014_03_27_123252_create_orders_have_products_table', 1),
('2014_03_27_123252_create_orders_table', 1),
('2014_03_27_123252_create_os_table', 1),
('2014_03_27_123252_create_package_histories_table', 1),
('2014_03_27_123252_create_packages_table', 1),
('2014_03_27_123252_create_payment_histories_table', 1),
('2014_03_27_123252_create_payment_methods_table', 1),
('2014_03_27_123252_create_product_categories_table', 1),
('2014_03_27_123252_create_products_have_categories_table', 1),
('2014_03_27_123252_create_products_have_images_table', 1),
('2014_03_27_123252_create_products_have_tags_table', 1),
('2014_03_27_123252_create_products_table', 1),
('2014_03_27_123252_create_promotions_have_tags_table', 1),
('2014_03_27_123252_create_promotions_table', 1),
('2014_03_27_123252_create_provinces_table', 1),
('2014_03_27_123252_create_references_table', 1),
('2014_03_27_123252_create_reviews_table', 1),
('2014_03_27_123252_create_sale_types_table', 1),
('2014_03_27_123252_create_sales_table', 1),
('2014_03_27_123252_create_settings_table', 1),
('2014_03_27_123252_create_shipping_methods_table', 1),
('2014_03_27_123252_create_shop_socials_table', 1),
('2014_03_27_123252_create_shop_types_table', 1),
('2014_03_27_123252_create_shops_have_images_table', 1),
('2014_03_27_123252_create_shops_have_payment_methods_table', 1),
('2014_03_27_123252_create_shops_have_ship_methods_table', 1),
('2014_03_27_123252_create_shops_have_tags_table', 1),
('2014_03_27_123252_create_shops_table', 1),
('2014_03_27_123252_create_socials_list_table', 1),
('2014_03_27_123252_create_tags_table', 1),
('2014_03_27_123252_create_taxes_table', 1),
('2014_03_27_123252_create_ticket_statuses_table', 1),
('2014_03_27_123252_create_ticket_types_table', 1),
('2014_03_27_123252_create_tickets_table', 1),
('2014_03_27_123252_create_transaction_details_table', 1),
('2014_03_27_123252_create_transactions_table', 1),
('2014_03_27_123252_create_user_socials_table', 1),
('2014_03_27_123252_create_user_types_table', 1),
('2014_03_27_123252_create_users_have_payments_table', 1),
('2014_03_27_123252_create_users_have_shops_table', 1),
('2014_03_27_123252_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_added_date` datetime DEFAULT NULL,
  `order_update_date` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `shop_ship_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_index` (`user_id`),
  KEY `orders_product_id_index` (`product_id`),
  KEY `orders_shop_ship_id_index` (`shop_ship_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_have_products`
--

CREATE TABLE IF NOT EXISTS `orders_have_products` (
  `order_product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`order_product_id`),
  KEY `orders_have_products_product_id_index` (`product_id`),
  KEY `orders_have_products_order_id_index` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `os_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `os_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_detail` text COLLATE utf8_unicode_ci,
  `rate` decimal(10,2) DEFAULT NULL,
  `charge_period_id` int(11) NOT NULL,
  PRIMARY KEY (`package_id`),
  KEY `packages_charge_period_id_index` (`charge_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_histories`
--

CREATE TABLE IF NOT EXISTS `package_histories` (
  `package_history_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `started_date` datetime DEFAULT NULL,
  `ended_date` datetime DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  PRIMARY KEY (`package_history_id`),
  KEY `package_histories_shop_id_index` (`shop_id`),
  KEY `package_histories_package_id_index` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_histories`
--

CREATE TABLE IF NOT EXISTS `payment_histories` (
  `payment_histories_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_pay_id` int(11) NOT NULL,
  `user_pay_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`payment_histories_id`),
  KEY `payment_histories_user_id_index` (`user_id`),
  KEY `payment_histories_shop_pay_id_index` (`shop_pay_id`),
  KEY `payment_histories_user_pay_id_index` (`user_pay_id`),
  KEY `payment_histories_order_id_index` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `pay_method_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `method_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pay_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `product_detail` text COLLATE utf8_unicode_ci,
  `removed_date` datetime DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `product_total` int(11) DEFAULT NULL,
  `tax_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_shop_id_index` (`shop_id`),
  KEY `products_tax_id_index` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_have_categories`
--

CREATE TABLE IF NOT EXISTS `products_have_categories` (
  `product_cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`product_cat_id`),
  KEY `products_have_categories_product_id_index` (`product_id`),
  KEY `products_have_categories_cat_id_index` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_have_images`
--

CREATE TABLE IF NOT EXISTS `products_have_images` (
  `product_img_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`product_img_id`),
  KEY `products_have_images_product_id_index` (`product_id`),
  KEY `products_have_images_image_id_index` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_have_tags`
--

CREATE TABLE IF NOT EXISTS `products_have_tags` (
  `products_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`products_tags_id`),
  KEY `products_have_tags_tag_id_index` (`tag_id`),
  KEY `products_have_tags_product_id_index` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `product_categories_image_id_index` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `promotion_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `promotion_detail` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `started_date` datetime DEFAULT NULL,
  `ended_date` datetime DEFAULT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promotions_have_tags`
--

CREATE TABLE IF NOT EXISTS `promotions_have_tags` (
  `promotions_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`promotions_tags_id`),
  KEY `promotions_have_tags_promotion_id_index` (`promotion_id`),
  KEY `promotions_have_tags_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `province_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `province_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE IF NOT EXISTS `references` (
  `ref_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_description` longtext COLLATE utf8_unicode_ci,
  `review_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `cf_list_id` int(11) DEFAULT NULL,
  `rating` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `removed_date` datetime DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `reviews_user_id_index` (`user_id`),
  KEY `reviews_shop_id_index` (`shop_id`),
  KEY `reviews_product_id_index` (`product_id`),
  KEY `reviews_cf_list_id_index` (`cf_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_type_id` int(11) NOT NULL,
  `setting_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `sales_sale_type_id_index` (`sale_type_id`),
  KEY `sales_setting_id_index` (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_types`
--

CREATE TABLE IF NOT EXISTS `sale_types` (
  `sale_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_type_detail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sale_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting_value` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting_updated` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE IF NOT EXISTS `shipping_methods` (
  `ship_method_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ship_method_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`ship_method_id`),
  KEY `shipping_methods_shop_id_index` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_type_id` int(11) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shop_detail` text COLLATE utf8_unicode_ci,
  `shop_address` text COLLATE utf8_unicode_ci,
  `province_id` int(11) NOT NULL,
  `ent_id` int(11) DEFAULT NULL,
  `started_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_classified` tinyint(1) DEFAULT NULL,
  `deliver_id` int(11) NOT NULL,
  `removed_date` datetime DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `promotion_id` int(11) NOT NULL,
  `shop_social_id` int(11) NOT NULL,
  `setting_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`),
  KEY `shops_shop_type_id_index` (`shop_type_id`),
  KEY `shops_province_id_index` (`province_id`),
  KEY `shops_deliver_id_index` (`deliver_id`),
  KEY `shops_promotion_id_index` (`promotion_id`),
  KEY `shops_shop_social_id_index` (`shop_social_id`),
  KEY `shops_setting_id_index` (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops_have_images`
--

CREATE TABLE IF NOT EXISTS `shops_have_images` (
  `shop_img_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_img_id`),
  KEY `shops_have_images_shop_id_index` (`shop_id`),
  KEY `shops_have_images_image_id_index` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops_have_payment_methods`
--

CREATE TABLE IF NOT EXISTS `shops_have_payment_methods` (
  `shop_pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` longtext COLLATE utf8_unicode_ci,
  `shop_id` int(11) NOT NULL,
  `pay_method_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_pay_id`),
  KEY `shops_have_payment_methods_shop_id_index` (`shop_id`),
  KEY `shops_have_payment_methods_pay_method_id_index` (`pay_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops_have_ship_methods`
--

CREATE TABLE IF NOT EXISTS `shops_have_ship_methods` (
  `shop_ship_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `ship_method_id` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`shop_ship_id`),
  KEY `shops_have_ship_methods_shop_id_index` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops_have_tags`
--

CREATE TABLE IF NOT EXISTS `shops_have_tags` (
  `shops_tags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`shops_tags_id`),
  KEY `shops_have_tags_shop_id_index` (`shop_id`),
  KEY `shops_have_tags_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_socials`
--

CREATE TABLE IF NOT EXISTS `shop_socials` (
  `shop_social_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `social_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_social_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_types`
--

CREATE TABLE IF NOT EXISTS `shop_types` (
  `shop_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_type_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`shop_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `socials_list`
--

CREATE TABLE IF NOT EXISTS `socials_list` (
  `social_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `social_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_detail` int(11) DEFAULT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE IF NOT EXISTS `taxes` (
  `tax_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_rate` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `remoced_date` datetime DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `ticket_status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci,
  `started_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `cf_list_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `tickets_sale_id_index` (`sale_id`),
  KEY `tickets_ticket_status_id_index` (`ticket_status_id`),
  KEY `tickets_user_id_index` (`user_id`),
  KEY `tickets_shop_id_index` (`shop_id`),
  KEY `tickets_cf_list_id_index` (`cf_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE IF NOT EXISTS `ticket_statuses` (
  `ticket_status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_status_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ticket_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_types`
--

CREATE TABLE IF NOT EXISTS `ticket_types` (
  `ticket_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_type_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ticket_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `trans_date` datetime DEFAULT NULL,
  `trans_type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `trans_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trans_detail` longtext COLLATE utf8_unicode_ci,
  `trans_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_detail_id`),
  KEY `transaction_details_trans_id_index` (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `province_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `points` decimal(10,2) DEFAULT NULL,
  `removed_date` datetime DEFAULT NULL,
  `is_banned` tinyint(1) DEFAULT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  `registed_date` datetime DEFAULT NULL,
  `setting_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `users_province_id_index` (`province_id`),
  KEY `users_user_type_id_index` (`user_type_id`),
  KEY `users_setting_id_index` (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_have_payments`
--

CREATE TABLE IF NOT EXISTS `users_have_payments` (
  `user_pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pay_method_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`user_pay_id`),
  KEY `users_have_payments_user_id_index` (`user_id`),
  KEY `users_have_payments_pay_method_id_index` (`pay_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_have_shops`
--

CREATE TABLE IF NOT EXISTS `users_have_shops` (
  `user_shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`user_shop_id`),
  KEY `users_have_shops_user_id_index` (`user_id`),
  KEY `users_have_shops_shop_id_index` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_socials`
--

CREATE TABLE IF NOT EXISTS `user_socials` (
  `user_social_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `social_list_id` int(11) NOT NULL,
  PRIMARY KEY (`user_social_id`),
  KEY `user_socials_user_id_index` (`user_id`),
  KEY `user_socials_social_list_id_index` (`social_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `user_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `charge_period_id` int(11) NOT NULL,
  PRIMARY KEY (`user_type_id`),
  KEY `user_types_charge_period_id_index` (`charge_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
