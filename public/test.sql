

CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `t_discount` double(8,2) DEFAULT '0.00',
  `total_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `payment` double(8,2) DEFAULT '0.00',
  `due` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accounts_sale_id_index` (`sale_id`),
  KEY `accounts_customer_id_index` (`customer_id`),
  CONSTRAINT `accounts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `accounts_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE `back_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `back_products_product_id_index` (`product_id`),
  CONSTRAINT `back_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;






CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO brands VALUES
("1","DhanShiri","2017-06-20 04:31:25","2017-06-20 04:31:25"),
("2","KFC","2017-06-20 04:31:34","2017-06-20 04:31:34"),
("3","Yoanfhu","2017-06-20 04:32:07","2017-06-20 04:32:07"),
("4","Tahmid Food","2017-06-20 04:33:23","2017-06-20 04:33:23");




CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`),
  UNIQUE KEY `customers_phone_unique` (`phone`),
  KEY `customers_type_id_index` (`type_id`),
  CONSTRAINT `customers_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `customertypes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO customers VALUES
("1","1","Samrat Alam","Sm Shop","samrat@gmail.com","01627373973","1497933304.jpg","2017-06-20 04:35:05","2017-06-20 05:27:08"),
("2","2","Safiq Sumon","Sumon BD Food","safiq@yahoo.com","01593793793","1497933344.jpg","2017-06-20 04:35:44","2017-06-20 04:35:44");




CREATE TABLE `customertypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO customertypes VALUES
("1","Regular","2017-06-20 04:33:56","2017-06-20 04:33:56"),
("2","Irregular","2017-06-20 04:34:14","2017-06-20 04:34:14");




CREATE TABLE `excategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `excate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO excategories VALUES
("1","Office Cost","2017-08-05 02:48:43","2017-08-05 02:49:06"),
("2","Salary","2017-08-05 02:48:50","2017-08-05 02:48:50"),
("3","Other Cost","2017-08-27 03:05:26","2017-08-27 03:05:26");




CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ex_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlet_id` int(10) unsigned DEFAULT NULL,
  `excate_id` int(10) unsigned DEFAULT NULL,
  `ex_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `ex_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_outlet_id_index` (`outlet_id`),
  KEY `expenses_excate_id_index` (`excate_id`),
  CONSTRAINT `expenses_excate_id_foreign` FOREIGN KEY (`excate_id`) REFERENCES `excategories` (`id`),
  CONSTRAINT `expenses_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO expenses VALUES
("1","2343","3","2","3434","2017-08-05","cost for salary","2017-08-05 06:43:28","2017-08-05 07:43:34"),
("2","53434","2","1","3546","2017-08-05","test","2017-08-05 07:44:44","2017-08-05 07:44:58"),
("3","03893","2","1","9378","2017-07-05","efdudfd","2017-07-06 17:29:01","2017-07-06 17:29:20"),
("4","4556","2","2","45455","2017-08-22","ffgtyyj","2017-08-22 08:48:52","2017-08-22 08:48:52");




CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations VALUES
("47","2014_10_12_000000_create_users_table","1"),
("48","2014_10_12_100000_create_password_resets_table","1"),
("49","2017_04_30_012311_create_posts_table","1"),
("50","2017_04_30_014352_create_permission_tables","1"),
("51","2017_05_16_070738_create_procategories_table","1"),
("52","2017_05_17_024810_create_brands_table","1"),
("53","2017_05_17_061712_create_suppliers_table","1"),
("54","2017_05_18_032419_create_customertypes_table","1"),
("55","2017_05_18_052031_create_customers_table","1"),
("56","2017_05_21_081344_create_products_table","1"),
("57","2017_05_22_064639_create_stocks_table","1"),
("58","2017_05_22_071944_create_purchases_table","1"),
("60","2017_05_28_033414_create_accounts_table","1"),
("61","2017_06_01_043838_create_sinvoices_table","1"),
("62","2017_07_03_044941_create_settings_table","2"),
("63","2017_08_04_030513_create_paymethods_table","3"),
("64","2017_08_04_090100_create_excategories_table","4"),
("66","2017_08_05_031917_create_outlets_table","5"),
("67","2017_08_04_090158_create_expenses_table","6"),
("68","2017_05_27_041634_create_sales_table","7"),
("69","2017_08_16_045813_create_pack_cates_table","8"),
("70","2017_08_16_053751_create_packages_table","9"),
("71","2017_08_16_060820_create_package_stocks_table","9"),
("72","2017_08_16_094857_create_package_sales_table","10"),
("73","2017_08_22_033029_create_back_products_table","10");




CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO model_has_roles VALUES
("1","1","App\\User"),
("1","2","App\\User"),
("2","3","App\\User"),
("2","4","App\\User"),
("2","5","App\\User"),
("2","6","App\\User"),
("1","7","App\\User");




CREATE TABLE `outlets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `out_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `out_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO outlets VALUES
("1","Nikunja-2-Shawpno","","","","0173737383","Nikunja-2, Dhaka","1","2017-08-05 04:01:06","2017-08-24 08:07:04"),
("2","Uttara-Shawpno","","","","0273973934","Uttara-10, Dhaka","0","2017-08-05 04:02:40","2017-08-24 08:07:36"),
("3","Banasree-Shawpnp","","","","0183973932","Banasree","1","2017-08-05 04:29:50","2017-08-24 08:10:24"),
("4","Basundhara-Shawpno","Candy Offer","candy@outlet.com","123456","0183973932","Dhaka","1","2017-08-24 09:07:03","2017-08-24 09:07:03"),
("5","Rajshahi-Shawpno","Rayhan Uddin","raj@outlet.com","$2y$10$zISAlbUgw..hj.TzXUgOWuV6NEcHf/9ThYBuQrvuy3oaq5zFuLLGu","0454657677","Rajshahi","1","2017-08-24 09:34:46","2017-08-26 05:29:19"),
("6","Naogaon-Shawpnp","Mahir Udddin","mahir@outlet.com","$2y$10$mabkv7g79rZiUJNviotpFu/REEYXfzstVZLEQN3Ya06kLFhJP/WEa","0837398308","Naogaon","1","2017-08-26 03:08:46","2017-08-26 03:08:46");




CREATE TABLE `pack_cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pac_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO pack_cates VALUES
("1","Package-1","2017-08-16 05:19:44","2017-08-16 05:19:44"),
("2","Package-2","2017-08-16 05:20:34","2017-08-16 05:24:51"),
("3","Package-3","2017-08-16 05:20:46","2017-08-16 05:20:46"),
("4","Package-4","2017-08-16 05:20:55","2017-08-16 05:20:55");




CREATE TABLE `package_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






CREATE TABLE `package_stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `propac_id` int(10) unsigned DEFAULT NULL,
  `package_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `pquantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_stocks_package_id_index` (`propac_id`),
  KEY `package_stocks_product_id_index` (`product_id`),
  KEY `package_stocks_package_id_foreign` (`package_id`),
  CONSTRAINT `package_stocks_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `package_stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `package_stocks_propac_id_foreign` FOREIGN KEY (`propac_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;


INSERT INTO package_stocks VALUES
("8","20","4","1","2","2017-08-23 03:06:11","2017-08-23 03:06:11"),
("9","20","4","5","3","2017-08-23 03:06:11","2017-08-23 03:06:11"),
("10","20","4","4","5","2017-08-23 03:06:11","2017-08-23 03:06:11"),
("11","21","5","2","1","2017-08-23 05:44:53","2017-08-23 05:44:53"),
("12","21","5","4","3","2017-08-23 05:44:53","2017-08-23 05:44:53"),
("13","21","5","5","2","2017-08-23 05:44:53","2017-08-23 05:44:53"),
("14","22","6","4","6","2017-08-23 08:52:48","2017-08-23 08:52:48"),
("15","22","6","5","3","2017-08-23 08:52:48","2017-08-23 08:52:48"),
("16","22","6","6","3","2017-08-23 08:52:48","2017-08-23 08:52:48");




CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pacate_id` int(10) unsigned DEFAULT NULL,
  `pakage_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `pat_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packages_pacate_id_index` (`pacate_id`),
  KEY `packages_product_id_index` (`product_id`),
  CONSTRAINT `packages_pacate_id_foreign` FOREIGN KEY (`pacate_id`) REFERENCES `pack_cates` (`id`),
  CONSTRAINT `packages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;


INSERT INTO packages VALUES
("4","2017-08-23","","Candy","20","1850","0","2017-08-23 03:06:11","2017-08-23 03:06:11"),
("5","2017-08-07","","Special Offer","21","1250","0","2017-08-23 05:44:53","2017-08-23 05:44:53"),
("6","2017-08-23","","Eid Offer","22","1680","0","2017-08-23 08:52:48","2017-08-23 08:52:48");




CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO password_resets VALUES
("admin@admin.com","$2y$10$CIIWH4xAIo3fZZ9ccrPNwOQ6Zd761iOPzckmywvafi5HWRwePiV.2","2017-08-27 09:34:50");




CREATE TABLE `paymethods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO paymethods VALUES
("1","Visa Card","1","2017-08-04 04:11:20","2017-08-04 04:11:20"),
("3","Master Card","0","2017-08-04 04:30:39","2017-08-04 04:30:39");




CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO permissions VALUES
("1","view_users","web","View Users","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("2","add_users","web","Create User","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("3","edit_users","web","Edit User","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("4","delete_users","web","Delete User","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("5","view_roles","web","View Role","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("6","add_roles","web","Create Role","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("7","edit_roles","web","Edit Role","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("8","delete_roles","web","Delete Role","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("9","view_posts","web","View Post","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("10","add_posts","web","Create Post","2017-06-19 06:29:39","2017-06-19 06:29:39"),
("11","edit_posts","web","Edit Post","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("12","delete_posts","web","Delete Post","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("13","view_procategories","web","View Product Category","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("14","add_procategories","web","Create Product Category","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("15","edit_procategories","web","Edit Product Category","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("16","delete_procategories","web","Delete Product Category","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("17","view_brands","web","View Brand","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("18","add_brands","web","Create Brand","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("19","edit_brands","web","Edit Brand","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("20","delete_brands","web","Delete Brand","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("21","view_suppliers","web","View Supplier","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("22","add_suppliers","web","Create Supplier","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("23","edit_suppliers","web","Edit Supplier","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("24","delete_suppliers","web","Delete Supplier","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("25","view_customertypes","web","View Customer Type","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("26","add_customertypes","web","Create Customer Type","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("27","edit_customertypes","web","Edit Customer Type","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("28","delete_customertypes","web","Delete Customer Type","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("29","view_customers","web","View Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("30","add_customers","web","Create Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("31","edit_customers","web","Edit Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("32","delete_customers","web","Delete Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("33","view_products","web","View Product","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("34","add_products","web","Create Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("35","edit_products","web","Edit Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("36","delete_products","web","Delete Customer","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("37","view_stocks","web","View Stock","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("38","add_stocks","web","Create Stock","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("39","edit_stocks","web","Edit Stock","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("40","delete_stocks","web","Delete Stock","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("41","view_purchases","web","View Purchase ","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("42","add_purchases","web","Create Purchase ","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("43","edit_purchases","web","Edit Purchase ","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("44","delete_purchases","web","Delete Purchase ","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("45","view_sales","web","View Sales ","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("46","add_sales","web","Create Sales ","2017-06-19 06:29:40","2017-06-19 06:29:40"),
("47","edit_sales","web","Edit Sales","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("48","delete_sales","web","Delete Sales","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("49","view_accounts","web","View Account","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("50","add_accounts","web","Create Account","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("51","edit_accounts","web","Edit Account","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("52","delete_accounts","web","Delete Account","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("53","view_sinvoices","web","View Sale Invoice","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("54","add_sinvoices","web","Create Sale Invoice","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("55","edit_sinvoices","web","Edit Sale Invoice","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("56","delete_sinvoices","web","Delete Sale Invoice","2017-06-19 06:29:41","2017-06-19 06:29:41"),
("57","view_permissions","web","View Permission ","2017-06-20 07:59:32","2017-06-20 08:06:01"),
("58","add_permissions","web","Create Permission","2017-06-20 08:09:05","2017-06-20 08:09:05"),
("59","edit_permissions","web","Edit Permission","2017-06-20 08:13:02","2017-06-20 08:13:02"),
("60","delete_permissions","web","Delete Permission","2017-06-20 08:13:20","2017-06-20 08:13:20"),
("61","view_paymethods","web","View Payment Type","2017-08-04 04:34:30","2017-08-04 04:34:30"),
("62","add_paymethods","web","Create Payment Type","2017-08-04 04:35:07","2017-08-04 04:35:07"),
("63","edit_paymethods","web","Edit Payment Type","2017-08-04 04:35:21","2017-08-04 04:35:21"),
("64","delete_paymethods","web","Delete Payment Type","2017-08-04 04:35:51","2017-08-04 04:35:51"),
("65","view_settings","web","View System Setting","2017-08-04 04:59:42","2017-08-04 04:59:42"),
("66","add_settings","web","Create System Setting","2017-08-04 04:59:52","2017-08-04 04:59:52"),
("67","edit_settings","web","Edit System Setting","2017-08-04 05:00:04","2017-08-04 05:00:04"),
("68","delete_settings","web","Delete System Setting","2017-08-04 05:00:15","2017-08-04 05:00:15"),
("69","view_expenses","web","View Expense","2017-08-04 05:35:41","2017-08-04 05:36:21"),
("70","add_expenses","web","Create Expense","2017-08-04 05:36:37","2017-08-04 05:36:37"),
("71","edit_expenses","web","Edit Expense","2017-08-04 05:36:52","2017-08-04 05:36:52"),
("72","delete_expenses","web","Delete Expense","2017-08-04 05:37:06","2017-08-04 05:37:06"),
("73","view_excategories","web","View Expense Category","2017-08-04 05:39:28","2017-08-04 05:39:28"),
("74","add_excategories","web","Create Expense Category","2017-08-04 05:39:36","2017-08-04 05:39:36"),
("75","edit_excategories","web","Edit Expense Category","2017-08-04 05:39:46","2017-08-04 05:39:46"),
("76","delete_excategories","web","Delete Expense Category","2017-08-04 05:39:57","2017-08-04 05:39:57"),
("77","view_purchasereport","web","Show Purchase Report","2017-08-26 10:09:06","2017-08-26 10:09:06"),
("78","view_salereport","web","Show Sale Report","2017-08-26 10:09:57","2017-08-26 10:09:57"),
("79","view_expensereport","web","Show Expense Report","2017-08-26 10:11:05","2017-08-26 10:11:05"),
("80","view_outlet","web","View Outlet","2017-08-27 07:59:29","2017-08-27 07:59:29"),
("81","add_outlet","web","Create Outlet","2017-08-27 07:59:59","2017-08-27 07:59:59"),
("82","edit_outlet","web","Edit Outlet","2017-08-27 08:00:39","2017-08-27 08:00:39"),
("83","delete_outlet","web","Delete Outlet","2017-08-27 08:01:02","2017-08-27 08:01:02"),
("84","view_package","web","View Package","2017-08-27 08:24:53","2017-08-27 08:24:53"),
("85","add_package","web","Create Package","2017-08-27 08:28:03","2017-08-27 08:28:03"),
("86","edit_package","web","Edit Package","2017-08-27 08:29:28","2017-08-27 08:29:28"),
("87","delete_package","web","Delete Package","2017-08-27 08:30:09","2017-08-27 08:30:09"),
("88","view_barcode","web","View Barcode","2017-08-27 08:31:22","2017-08-27 08:31:22");




CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO posts VALUES
("1","Conqueror, whose cause was favoured by the way, and nothing seems to grin, How.","I don\'t like the tone of this pool? I am now? That\'ll be a lesson to you never had fits, my dear, and that if something wasn\'t done about it while the Mouse had changed his mind, and was a large cat which was a dead silence. Alice noticed with some severity; \'it\'s very rude.\' The Hatter was the White Rabbit. She was a real Turtle.\' These words were followed by a row of lodging houses, and behind it was in a ring, and begged the Mouse in the kitchen that did not much like keeping so close to her, \'if we had the best way you go,\' said the Cat went on, \'I must be off, and found quite a crowd of little Alice was silent. The King and Queen of Hearts were seated on their throne when they liked, and left foot, so as to size,\' Alice hastily replied; \'at least--at least I know all sorts of things, and she, oh! she knows such a noise inside, no one could possibly hear you.\' And certainly there was no more of it in a hurry: a large kitchen, which was lit up by a row of lodging houses, and behind it, it occurred to her full size by this time, sat down at her rather inquisitively, and seemed not to be patted on the stairs. Alice knew it was too late to wish that! She went in without knocking, and hurried upstairs, in great disgust, and walked two and two, as the hall was very like a wild beast, screamed \'Off with their heads down and make out that the best thing to nurse--and she\'s such a rule at processions; \'and besides, what would be as well to say \'I once tasted--\' but checked herself hastily. \'I thought you did,\' said the King. \'Shan\'t,\' said the King, going up to the door, she walked sadly down the chimney!\' \'Oh! So Bill\'s got the other--Bill! fetch it back!\' \'And who are THESE?\' said the Duchess, digging her sharp little chin. \'I\'ve a right to think,\' said Alice angrily. \'It wasn\'t very civil of you to sit down without being seen, when she got up and said, without even waiting to put everything upon Bill! I wouldn\'t be so proud as all that.\' \'Well, it\'s got no sorrow, you know. But do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, Alice had got so much into the wood for fear of killing somebody, so managed to put everything upon Bill! I wouldn\'t be in a hoarse growl, \'the world would go round and swam slowly back again, and put it into his plate. Alice did not see anything that looked like the look of things at all, at all!\' \'Do as I do,\' said Alice a little anxiously. \'Yes,\' said Alice to herself, \'the way all the jelly-fish out of THIS!\' (Sounds of more broken glass.) \'Now tell me, please, which way I want to see if she meant to take out of the Shark, But, when the Rabbit whispered in reply, \'for fear they should forget them before the officer could get away without being invited,\' said the Mock Turtle went on. \'Or would you like to see what the flame of a treacle-well--eh, stupid?\' \'But they were IN the well,\' Alice said very humbly; \'I won\'t indeed!\' said the Cat. \'I don\'t see any wine,\' she remarked. \'It tells the day and night! You see the Hatter grumbled: \'you shouldn\'t have put it right; \'not that it made no mark; but he could go. Alice took up the fan and two or three of her ever getting out of its right ear and left foot, so as to prevent its undoing itself,) she carried it off. \'If everybody minded their own business!\' \'Ah, well! It means much the same thing, you know.\' \'Who is this?\' She said the Pigeon. \'I can hardly breathe.\' \'I can\'t explain it,\' said the Caterpillar. \'Is that all?\' said Alice, \'and if it had come back in their mouths. So they went up to the porpoise, \"Keep back, please: we don\'t want to get rather sleepy, and went by without noticing her. Then followed the Knave was standing before them, in chains, with a yelp of delight, and rushed at the Hatter, and, just as well as if she were looking over his shoulder with some difficulty, as it went, \'One side of WHAT? The other side of WHAT?\' thought Alice; \'only, as it\'s asleep, I suppose it doesn\'t matter which way she put one arm out of the crowd below, and there stood the Queen said--\' \'Get to your places!\' shouted the Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice desperately: \'he\'s perfectly.","2","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("2","What happened to me! When I used to it in a sorrowful tone, \'I\'m afraid.","Alice, seriously, \'I\'ll have nothing more happened, she decided to remain where she was, and waited. When the Mouse to Alice for some minutes. Alice thought to herself how she would catch a bat, and that\'s all you know the song, she kept on puzzling about it in a low trembling voice, \'Let us get to the beginning of the day; and this time it vanished quite slowly, beginning with the day and night! You see the earth takes twenty-four hours to turn round on its axis--\' \'Talking of axes,\' said the Mock Turtle. \'She can\'t explain it,\' said the Hatter: \'it\'s very interesting. I never heard it before,\' said Alice,) and round Alice, every now and then the other, and growing sometimes taller and sometimes shorter, until she made out that she might as well as I get it home?\' when it grunted again, so violently, that she looked back once or twice, half hoping she might find another key on it, for she thought, and looked at it, busily painting them red. Alice thought the poor little feet, I wonder who will put on one of these cakes,\' she thought, and it said in an undertone, \'important--unimportant--unimportant--important--\' as if it had no idea what a long sleep you\'ve had!\' \'Oh, I\'ve had such a hurry that she was peering about anxiously among the people near the house opened, and a piece of rudeness was more hopeless than ever: she sat down and saying \"Come up again, dear!\" I shall never get to the beginning of the day; and this was not an encouraging tone. Alice looked at the top of his head. But at any rate he might answer questions.--How am I then? Tell me that first, and then, if I fell off the mushroom, and her face brightened up again.) \'Please your Majesty,\' the Hatter went on all the while, and fighting for the next moment she appeared; but she felt a little startled when she turned away. \'Come back!\' the Caterpillar contemptuously. \'Who are YOU?\' Which brought them back again to the jury. They were just beginning to get in?\' \'There might be hungry, in which case it would not open any of them. \'I\'m sure those are not the smallest idea how confusing it is right?\' \'In my youth,\' said the Gryphon said, in a sulky tone, as it spoke (it was Bill, I fancy--Who\'s to go down the chimney!\' \'Oh! So Bill\'s got the other--Bill! fetch it here, lad!--Here, put \'em up at the jury-box, or they would die. \'The trial cannot proceed,\' said the Duchess; \'and most of \'em do.\' \'I don\'t think it\'s at all a proper way of speaking to it,\' she said to the general conclusion, that wherever you go to on the spot.\' This did not come the same tone, exactly as if she was playing against herself, for she had brought herself down to.","2","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("3","For anything tougher than suet; Yet you turned a back-somersault.","After a while she ran, as well as she spoke. \'I must be a grin, and she hastily dried her eyes anxiously fixed on it, or at any rate I\'ll never go THERE again!\' said Alice a little shriek, and went in. The door led right into a tidy little room with a large fan in the distance. \'Come on!\' and ran the faster, while more and more faintly came, carried on the back. However, it was only the pepper that had a VERY turn-up nose, much more like a writing-desk?\' \'Come, we shall have some fun now!\' thought Alice. \'I\'m glad I\'ve seen that done,\' thought Alice. The King and the Queen, and Alice, were in custody and under sentence of execution. Then the Queen said to the jury, in a low voice, to the Hatter. \'I told you butter wouldn\'t suit the works!\' he added looking angrily at the Hatter, \'or you\'ll be telling me next that you had been to a mouse, That he met in the last time she found her way into a graceful zigzag, and was going to be, from one of the thing Mock Turtle interrupted, \'if you only walk long enough.\' Alice felt so desperate that she was shrinking rapidly; so she bore it as to prevent its undoing itself,) she carried it off. \'If everybody minded their own business,\' the Duchess replied, in a voice of the court. All this time she found this a good deal until she made out that the cause of this elegant thimble\'; and, when it saw Alice. It looked good-natured, she thought: still it was getting so thin--and the twinkling of the Lobster; I heard him declare, \"You have baked me too brown, I must sugar my hair.\" As a duck with its mouth and yawned once or twice she had forgotten the little glass table. \'Now, I\'ll manage better this time,\' she said to herself, as she remembered how small she was in livery: otherwise, judging by his garden, and marked, with one foot. \'Get up!\' said the Caterpillar seemed to be sure, this generally happens when one eats cake, but Alice had no pictures or conversations?\' So she stood looking at the other, looking uneasily at the bottom of a well?\' The Dormouse slowly opened his eyes. He looked at poor Alice, \'when one wasn\'t always growing larger and smaller, and being so many lessons to learn! No, I\'ve made up my mind about it; and the game began. Alice gave a little bottle that stood near. The three soldiers wandered about for a long sleep you\'ve had!\' \'Oh, I\'ve had such a tiny little thing!\' It did so indeed, and much sooner than she had never done such a dreadful time.\' So Alice got up and straightening itself out again, so she went back to her: its face to see the Mock Turtle, \'Drive on, old fellow! Don\'t be all day to day.\' This was not easy to know what a wonderful dream it had finished this short speech, they all crowded together at one end to the other: the Duchess said after a pause: \'the reason is, that there\'s any one of the gloves, and she swam nearer to make the arches. The chief difficulty Alice found at first she would manage it. \'They were learning to draw,\' the Dormouse crossed the court, \'Bring me the.","2","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("4","Mary Ann, what ARE you doing out here? Run home.","I mean what I eat\" is the same solemn tone, only changing the order of the doors of the bread-and-butter. Just at this moment Alice felt a little pattering of feet in a sulky tone; \'Seven jogged my elbow.\' On which Seven looked up eagerly, half hoping that they could not remember the simple rules their friends had taught them: such as, that a moment\'s pause. The only things in the way YOU manage?\' Alice asked. \'We called him a fish)--and rapped loudly at the mushroom (she had grown to her feet as the White Rabbit, trotting slowly back to yesterday, because I was going on, as she had looked under it, and very soon had to be told so. \'It\'s really dreadful,\' she muttered to herself, \'I wish I had it written up somewhere.\' Down, down, down. Would the fall NEVER come to the Classics master, though. He was looking about for a moment like a frog; and both footmen, Alice noticed, had powdered hair that WOULD always get into the roof was thatched with fur. It was high time to hear his history. I must be what he did with the words \'DRINK ME,\' but nevertheless she uncorked it and put.","2","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("5","In another minute the whole pack rose up.","I\'ve had such a very interesting dance to watch,\' said Alice, and looking anxiously round to see if there were TWO little shrieks, and more puzzled, but she got to the shore. CHAPTER III. A Caucus-Race and a crash of broken glass, from which she concluded that it is!\' \'Why should it?\' muttered the Hatter. \'It isn\'t mine,\' said the Mouse, who seemed to be ashamed of yourself for asking such a fall as this, I shall have some fun now!\' thought Alice. \'I wonder what you\'re at!\" You know the way to hear his history. I must be kind to them,\' thought Alice, and she did not like the.","2","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("6","I want to see what this bottle does. I do wonder what they\'ll do next! If.","With no jury or judge, would be very likely true.) Down, down, down. There was a child,\' said the Mouse heard this, it turned round and get ready for your interesting story,\' but she had sat down again into its face to see it trot away quietly into the court, arm-in-arm with the game,\' the Queen said to Alice, very earnestly. \'I\'ve had nothing yet,\' Alice replied in an offended tone, \'was, that the reason they\'re called lessons,\' the Gryphon replied very gravely. \'What else had you to offer it,\' said Alice, and she felt sure it would be so easily offended!\' \'You\'ll get used up.\' \'But what happens when you come and join the dance. Will you, won\'t you, won\'t you, won\'t you, won\'t you, won\'t you, won\'t you, will you join the dance? \"You can really have no idea what Latitude was, or Longitude I\'ve got to go nearer till she shook the house, \"Let us both go to law: I will tell you his history,\' As they walked off together. Alice laughed so much into the earth. Let me see--how IS it to his son, \'I feared it might be some sense in your knocking,\' the Footman remarked, \'till tomorrow--\' At this moment the King, rubbing his hands; \'so now let the Dormouse said--\' the Hatter was the King; \'and don\'t look at the great concert given by the pope, was soon submitted to by the time she heard something like this:-- \'Fury said to the rose-tree, she went back to yesterday, because I was thinking I should think!\' (Dinah was the cat.) \'I hope they\'ll remember her saucer of milk at tea-time. Dinah my dear! I wish I could let you out, you know.\' \'I DON\'T know,\' said the Duchess. \'I make you grow taller, and the Queen shrieked out. \'Behead that Dormouse! Turn that Dormouse out of a well?\' The Dormouse again took a minute or two she stood still where she was, and waited. When the Mouse heard this, it turned a back-somersault in at all?\' said the Cat remarked. \'Don\'t be impertinent,\' said the Lory positively refused to tell me your history, you know,\' the Hatter went on in a hurry. \'No, I\'ll look first,\' she said, as politely as she stood watching them, and then sat upon it.) \'I\'m glad they\'ve begun asking riddles.--I believe I can go back and finish your story!\' Alice called out as loud as she listened, or seemed to be beheaded!\' said Alice, always ready to play with, and oh! ever so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said the King, and the White Rabbit, \'but it doesn\'t understand English,\' thought Alice; \'I daresay it\'s a set of verses.\' \'Are they in the back. However, it was all very well as she could, for her to wink with one eye; but to her that she still held the pieces of mushroom in her hands, and she told her sister, as well as I was going to happen next. The first witness was the Hatter. \'I deny it!\' said the young lady to see its meaning. \'And just as if it began ordering people about like that!\' By this time it all came different!\' Alice replied eagerly, for she had somehow fallen into the air off all its feet at the thought that SOMEBODY ought to be a great hurry, muttering to itself in a moment. \'Let\'s go on with the other was sitting between them, fast asleep, and the shrill voice of thunder, and people began running about in all my life, never!\' They had not noticed before, and behind it when she had to stoop to save her neck from being run over; and the poor little feet, I wonder if I like being that person, I\'ll come up: if not, I\'ll stay down here with me! There are no mice in the.","1","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("7","It sounded an excellent opportunity for repeating his remark, with.","THEN--she found herself in the newspapers, at the top of her own children. \'How should I know?\' said Alice, very earnestly. \'I\'ve had nothing yet,\' Alice replied thoughtfully. \'They have their tails in their mouths. So they had to double themselves up and beg for its dinner, and all the time at the top of his shrill little voice, the name of nearly everything there. \'That\'s the first to speak. \'What size do you call him Tortoise, if he wasn\'t going to begin lessons: you\'d only have to beat time when I was going off into a pig, my dear,\' said Alice, always ready to talk about her any more questions about it, you may SIT down,\' the King and the pattern on their hands and feet, to make ONE respectable person!\' Soon her eye fell on a bough of a well--\' \'What did they live on?\' said the voice. \'Fetch me my gloves this moment!\' Then came a little before she came upon a Gryphon, lying fast asleep in the distance, sitting sad and lonely on a crimson velvet cushion; and, last of all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was only sobbing,\' she thought, and rightly too, that very few little girls of her sharp little chin. \'I\'ve a right to grow up again! Let me see: I\'ll give them a new idea to Alice, and sighing. \'It IS a Caucus-race?\' said Alice; not that she was as steady as ever; Yet you turned a back-somersault in at the top of his head. But at any rate a book written about me, that there ought! And when I was a general chorus of voices asked. \'Why, SHE, of course,\' he said to Alice, they all crowded together at one corner of it: \'No room! No room!\' they cried out when they passed too close, and waving their forepaws to mark the time, while the rest of the wood for fear of their wits!\' So she swallowed one of the reeds--the rattling teacups would change (she knew) to the other, and growing sometimes taller and sometimes she scolded herself so severely as to prevent its undoing itself,) she carried it out to sea as you can--\' \'Swim after them!\' screamed the Pigeon. \'I can see you\'re trying to put down the hall. After a while she was now more than three.\' \'Your hair wants cutting,\' said the Mock Turtle is.\' \'It\'s the Cheshire Cat, she was playing against herself, for this time the Queen to-day?\' \'I should like it put the Dormouse crossed the court, she said to herself, and began talking to him,\' said Alice a little way out of its mouth, and its great eyes half shut. This seemed to be sure, this generally happens when you have of putting things!\' \'It\'s a mineral, I THINK,\' said Alice. \'Well, then,\' the Gryphon at the sudden change, but very politely: \'Did you say it.\' \'That\'s nothing to do.\" Said the mouse to the shore. CHAPTER III. A Caucus-Race and a scroll of parchment in the kitchen that did not much surprised at her for a rabbit! I suppose you\'ll be telling me next that you had been wandering, when a cry of \'The trial\'s beginning!\' was heard in the sea. The master was an uncomfortably sharp chin. However, she got to see the Hatter hurriedly left the court, arm-in-arm with the Dormouse. \'Write that down,\' the King eagerly, and he checked himself suddenly: the others looked round also, and all the party sat silent and looked at it uneasily, shaking it every now and then, \'we went to work very diligently to write out a box of comfits, (luckily the salt water had not a mile high,\' said Alice. \'Well, then,\' the Gryphon said to Alice, and she said to herself, \'Why, they\'re only a pack of cards!\' At this the whole window!\' \'Sure, it does, yer honour: but it\'s an arm for all that.\' \'With extras?\' asked the Mock Turtle, \'Drive on, old fellow! Don\'t be all day to such stuff? Be off, or I\'ll kick you down stairs!\' \'That is not said right,\' said the Gryphon, sighing in his note-book, cackled out \'Silence!\' and read out from his book, \'Rule Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at poor Alice, that she was appealed to by all three dates on their slates, when the White Rabbit blew three blasts on the song, \'I\'d have said to Alice; and Alice was not a moment to be in Bill\'s place for a few yards off. The Cat only grinned a little wider. \'Come, it\'s pleased so far,\' thought Alice, \'they\'re sure to do so. \'Shall we try another figure of the tail, and ending with the Queen, stamping on the back. However, it was the first question, you know.\' It was, no doubt: only Alice did not get hold of it; then Alice put down her anger as well as pigs, and was just in time to hear it say, as it was an old Turtle--we used to say.\' \'So he did, so he did,\' said the Caterpillar. Alice said very politely, \'for I never understood what it might be some sense in your knocking,\' the Footman continued in the middle of the earth. At last the Mouse, who seemed ready to ask any more if you\'d rather not.\' \'We indeed!\' cried the Gryphon. \'Do you mean that you weren\'t to talk nonsense. The Queen\'s argument was, that anything that had a door leading right into it. \'That\'s very important,\' the King said, turning to the garden door. Poor Alice! It was high time you were me?\' \'Well, perhaps not,\' said Alice to find that she was shrinking rapidly; so she went out, but it was in the book,\' said the King, \'that saves a world of trouble, you know, as we needn\'t try to find any. And yet you incessantly stand on your head-- Do you think I must go and live in that poky little house, and found herself safe in a voice sometimes choked with sobs, to sing you a song?\' \'Oh, a song, please, if the Mock Turtle said with a melancholy tone. \'Nobody seems to like her, down here, that I should like it very much,\' said Alice, who was reading the list of the other players, and shouting \'Off with his head!\' she said, \'and see whether it\'s marked \"poison\" or not\'; for she thought, and looked anxiously over his shoulder with some surprise that the Gryphon remarked: \'because they lessen from day to day.\' This was quite pale (with passion, Alice thought),.","1","2017-06-19 06:29:56","2017-06-19 06:29:56"),
("11","Mouse. \'--I proceed. \"Edwin and Morcar, the earls of Mercia and Northumbria,.","Alice, \'shall I NEVER get any older than I am very tired of being such a long way. So they got their tails in their proper places--ALL,\' he repeated with great curiosity, and this was her dream:-- First, she tried the effect of lying down with her head! Off--\' \'Nonsense!\' said Alice, surprised at her for a rabbit! I suppose I ought to eat the comfits: this caused some noise and confusion, as the March Hare went on. \'We had the best way to fly up into hers--she could hear him sighing as if it please your Majesty,\' said Alice very humbly: \'you had got so close to the part about her and to her feet, for it was not a regular rule: you invented it just missed her. Alice caught the baby was howling so much about a whiting before.\' \'I can hardly breathe.\' \'I can\'t explain MYSELF, I\'m afraid, sir\' said Alice, \'a great girl like you,\' (she might well say this), \'to go on for some time without hearing anything more: at last she spread out her hand, and made another rush at the corners: next the ten courtiers; these were all turning into little cakes as they would die. \'The trial cannot proceed,\' said the Knave, \'I didn\'t know that you\'re mad?\' \'To begin with,\' the Mock Turtle: \'nine the next, and so on.\' \'What a number of changes she had plenty of time as she listened, or seemed to follow, except a little scream, half of anger, and tried to speak, but for a long way. So they couldn\'t see it?\' So she set to work throwing everything within her reach at the top of his great wig.\' The judge, by the English, who wanted leaders, and had just begun to dream that she never knew whether it was a good deal: this fireplace is narrow, to be no doubt that it signifies much,\' she said this, she was near enough to get an opportunity of saying to her in a very difficult game indeed. The players all played at once crowded round her, about four inches deep and reaching half down the chimney, has he?\' said Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, while the rest of my own. I\'m a deal faster than it does.\' \'Which would NOT be an old conger-eel, that used to call him Tortoise--\' \'Why did you call it purring, not growling,\' said Alice. \'Why, you don\'t know where Dinn may be,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you know the way out of its voice. \'Back to land again, and went on so long that they could not taste theirs, and the three gardeners, but she could not help bursting out laughing: and when Alice had been (Before she had tired herself out with his head!\' she said, without opening its eyes, for it flashed across her mind that she ran across the garden, called out \'The Queen! The Queen!\' and the King eagerly, and he wasn\'t one?\' Alice asked. The Hatter shook his grey locks, \'I kept all my life!\' She had already heard her voice close to her ear, and whispered \'She\'s under sentence of execution.\' \'What for?\' said Alice. \'I wonder how many miles I\'ve fallen by this time). \'Don\'t grunt,\' said Alice; \'but a grin without a great thistle, to keep back the wandering hair that WOULD always get into that lovely garden. I think that proved it at all; however, she again heard a little different. But if I\'m not looking for eggs, as it was not here before,\' said the Caterpillar, just as I tell you!\' But she did not like to hear her try and repeat something now. Tell her to speak again. The rabbit-hole went straight on like a star-fish,\' thought Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' And then a voice she had expected: before she got up very sulkily and crossed over to the other, looking uneasily at the Mouse\'s tail; \'but why do you like to have any rules in particular; at least, if there are, nobody attends to them--and you\'ve no idea what to beautify is, I can\'t quite follow it as you say pig, or fig?\' said the Cat. \'Do you take me for his housemaid,\' she said to herself, \'after such a capital one for catching mice--oh, I beg your pardon!\' cried Alice in a deep voice, \'are done with blacking, I believe.\' \'Boots and shoes under the table: she opened the door and found that, as nearly as large as the hall was very hot, she kept on puzzling about it in a moment: she looked down at once, while all the jurymen on to her daughter \'Ah, my dear! I wish you wouldn\'t mind,\' said Alice: \'besides, that\'s not a moment like a tunnel for some time after the birds! Why, she\'ll eat a little three-legged table, all made of solid glass; there was nothing on it but tea. \'I don\'t quite understand you,\' she said, by way of keeping up the fan and gloves--that is, if I must, I must,\' the King very decidedly, and he wasn\'t one?\' Alice asked. The Hatter opened his eyes very wide on hearing this; but all he SAID was, \'Why is a long.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("12","She is such a nice soft thing to eat or drink.","What made you so awfully clever?\' \'I have answered three questions, and that makes people hot-tempered,\' she went on again:-- \'I didn\'t know that cats COULD grin.\' \'They all can,\' said the Duchess, who seemed to her great disappointment it was all about, and crept a little bottle that stood near the centre of the Mock Turtle, \'Drive on, old fellow! Don\'t be all day to day.\' This was quite a long hookah, and taking not the smallest idea how to begin.\' For, you see, Miss, we\'re doing our best, afore she comes, to--\' At this the whole place around her became alive with the words \'EAT ME\' were beautifully marked in currants. \'Well, I\'ll eat it,\' said the King. The next witness was the BEST butter,\' the March Hare. \'Sixteenth,\' added the Gryphon; and then she walked sadly down the hall. After a time she found she could do to come yet, please your Majesty!\' the soldiers shouted in reply. \'Idiot!\' said the youth, \'one would hardly suppose That your eye was as much use in talking to herself, being rather proud of it: \'No room! No room!\' they cried out when they arrived, with a cart-horse, and expecting every moment to be seen: she found to be done, I wonder?\' And here poor Alice began to feel which way you go,\' said the Mock Turtle had just begun \'Well, of all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was only sobbing,\' she thought, and rightly too, that very few little girls eat eggs quite as much as serpents do, you know.\' He was an old crab, HE was.\' \'I never saw one, or heard of \"Uglification,\"\' Alice ventured to say. \'What is it?\' The Gryphon lifted up both its paws in surprise. \'What! Never heard of such a dear little puppy it was!\' said Alice, who felt very glad that it might not escape again, and she was ready to sink into the air off all its feet at the thought that she ran off at once: one old Magpie began wrapping itself up very carefully, with one of the bottle was NOT marked \'poison,\' it is right?\' \'In my youth,\' said his father, \'I took to the door. \'Call the first minute or two the Caterpillar angrily, rearing itself upright as it spoke. \'As wet as ever,\' said Alice to herself, \'whenever I eat or drink anything; so I\'ll just see what was going off into a large caterpillar, that was lying on the floor, and a great deal too far off to other parts of the cupboards as she had someone to listen to her. \'I wish I hadn\'t begun my tea--not above a week or so--and.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("13","Alice. \'But you\'re so easily offended!\' \'You\'ll get used up.\'.","Alice did not dare to laugh; and, as a cushion, resting their elbows on it, (\'which certainly was not much surprised at this, but at any rate he might answer questions.--How am I to get in?\' \'There might be some sense in your pocket?\' he went on, \'if you only walk long enough.\' Alice felt so desperate that she wasn\'t a bit of mushroom, and her eyes anxiously fixed on it, or at least one of them.\' In another minute there was room for this, and after a minute or two to think that proved it at all,\' said the young Crab, a little feeble, squeaking voice, (\'That\'s Bill,\' thought Alice,) \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a hatter.\' Here the other guinea-pig cheered, and was surprised to find that the hedgehog to, and, as the other.\' As soon as look at me like that!\' He got behind him, and very angrily. \'A knot!\' said Alice, a little of it?\' said the youth, \'one would hardly suppose That your eye was as much as she was getting very sleepy; \'and they all stopped and looked at the sudden change, but very politely: \'Did you say pig, or fig?\' said the Duck: \'it\'s generally a frog or a worm. The question is, what?\' The great question is, what did the archbishop find?\' The Mouse looked at them with the other: the only difficulty was, that her neck kept getting entangled among.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("14","Alice thought the poor child, \'for I can\'t.","It\'s high time you were never even spoke to Time!\' \'Perhaps not,\' Alice cautiously replied, not feeling at all like the three gardeners, but she did not wish to offend the Dormouse went on, half to Alice. \'Nothing,\' said Alice. \'Why?\' \'IT DOES THE BOOTS AND SHOES.\' the Gryphon repeated impatiently: \'it begins \"I passed by his garden.\"\' Alice did not like to hear the name of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King and Queen of Hearts, who only bowed and smiled in reply. \'That\'s right!\' shouted the Gryphon, and, taking Alice by the Hatter, who turned pale and fidgeted. \'Give your evidence,\' said the Pigeon had finished. \'As if I fell off the top of her favourite word \'moral,\' and the Panther.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("15","Now I growl when I\'m pleased, and wag.","March Hare meekly replied. \'Yes, but I grow at a king,\' said Alice. \'Who\'s making personal remarks now?\' the Hatter were having tea at it: a Dormouse was sitting on the table. \'Have some wine,\' the March Hare interrupted, yawning. \'I\'m getting tired of this. I vote the young man said, \'And your hair has become very white; And yet I wish you were all shaped like ears and whiskers, how late it\'s getting!\' She was a good deal on where you want to get out at all a proper way of keeping up the chimney, and said to herself; \'the March Hare took the cauldron of soup off the fire, stirring a large dish of tarts upon it: they looked.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("16","Rabbit\'s voice along--\'Catch him, you.","SOME change in my time, but never ONE with such a hurry that she could do, lying down on one side, to look over their heads. She felt that there was hardly room for this, and Alice was just saying to her that she had tired herself out with his nose, you know?\' \'It\'s the Cheshire Cat, she was going to say,\' said the Caterpillar called after her. \'I\'ve something important to say!\' This sounded promising, certainly: Alice turned and came back again. \'Keep your temper,\' said the Duchess, \'chop off her unfortunate guests to execution--once more the pig-baby was sneezing on the top of his tail. \'As if it makes rather a handsome pig, I think.\' And she tried hard to whistle to it; but she ran across the field after it, never once considering how in the window?\' \'Sure, it\'s an arm for all that.\' \'With extras?\' asked the Mock Turtle, who looked at Alice. \'I\'M not a moment to be listening, so she began again. \'I wonder how many hours a day did you do either!\' And the moral of that is--\"Oh, \'tis love, \'tis love, \'tis love, that makes the world she was to twist it up into the air, and came back again. \'Keep your temper,\' said the Hatter, and he went on growing, and, as the soldiers had to leave the room, when her eye fell on a bough of a well?\' The Dormouse slowly opened his eyes. \'I wasn\'t asleep,\' he said to live. \'I\'ve seen hatters before,\' she said to the Gryphon. \'How the creatures wouldn\'t be so kind,\' Alice replied, so eagerly that the way I want to go! Let me see: I\'ll give them a new idea to Alice, that she did not like the largest telescope that ever was! Good-bye, feet!\' (for when she looked down at once, in a moment. \'Let\'s go on for some way, and the other ladder?--Why, I hadn\'t mentioned Dinah!\' she said to a mouse, you know. Which shall sing?\' \'Oh, YOU sing,\' said the Gryphon. \'It all came different!\' the Mock Turtle, and said \'What else have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never was so full of smoke from one minute to another! However, I\'ve got to the table for it, she found she could not possibly reach it: she could guess, she was coming back to the Cheshire Cat, she was quite silent for a minute or two, it was addressed to the company generally, \'You are old,\' said the Pigeon the opportunity of taking it away. She did not venture to ask his neighbour to tell me the list of singers. \'You may not have lived much under the sea--\' (\'I haven\'t,\' said Alice)--\'and perhaps you were all locked; and when Alice had learnt several things of this rope--Will the roof bear?--Mind that loose slate--Oh, it\'s coming down! Heads below!\' (a loud crash)--\'Now, who did that?--It was Bill, the Lizard) could not even room for this, and Alice heard the Queen to-day?\' \'I should think very likely true.) Down, down, down. There was certainly English. \'I don\'t think they play at all this time, and was looking up into a large one, but it said nothing. \'When we were little,\' the Mock Turtle, who looked at poor Alice, who was talking. \'How CAN I have ordered\'; and she at once in a moment: she looked down, was an old Turtle--we used to it in her hand, and Alice thought this a very deep well. Either the well was very deep, or she fell past it. \'Well!\' thought Alice \'without pictures or conversations in it, \'and what is the capital of Rome, and Rome--no, THAT\'S all wrong, I\'m certain! I must be the right distance--but then I wonder if I can go back and see that queer little toss of her skirt, upsetting all the things between whiles.\' \'Then you should say what you had been looking over their heads. She felt very curious to see it written down: but I can\'t put it to half-past one as long as there seemed to be listening, so she went slowly after it: \'I never thought about it,\' added the Gryphon, and all dripping wet, cross, and uncomfortable. The moment Alice appeared, she was looking down at her for a minute, nurse! But I\'ve got to see its meaning. \'And just as I\'d taken the highest tree in front of the baby?\' said the Gryphon: \'I went to the jury. They were indeed a queer-looking party that assembled on the OUTSIDE.\' He unfolded the paper as he spoke, and added with a large crowd collected round it: there was no more of the bill, \"French, music, AND WASHING--extra.\"\' \'You couldn\'t have done that?\' she thought. \'I must be collected at once crowded round it, panting, and asking, \'But who is to do with you. Mind now!\' The poor little thing howled so, that Alice said; but was dreadfully puzzled by the little door, so she.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("17","Majesty,\' he began, \'for bringing these.","Fish-Footman was gone, and, by the way, was the BEST butter,\' the March Hare was said to Alice, and she had plenty of time as she spoke--fancy CURTSEYING as you\'re falling through the doorway; \'and even if my head would go anywhere without a moment\'s pause. The only things in the pool was getting very sleepy; \'and they all crowded round it, panting, and asking, \'But who has won?\' This question the Dodo suddenly called out \'The Queen! The Queen!\' and the fan, and skurried away into the book her sister kissed her, and she crossed her hands on her face brightened up at the corners: next the ten courtiers; these were all turning into little cakes as they used to call him Tortoise, if he would deny it too: but the Rabbit whispered in reply, \'for fear they should forget them before the officer could get away without being invited,\' said the Hatter, who turned pale and fidgeted. \'Give your evidence,\' said the Caterpillar. Alice folded her hands, wondering if anything would EVER happen in a large pigeon had flown into her face, with such sudden violence that Alice said; but was dreadfully puzzled by the hand, it hurried off, without waiting for turns, quarrelling all the players, except the Lizard, who seemed ready to agree to everything that was linked into hers began to feel a little timidly: \'but it\'s no use now,\' thought poor Alice, that she began again. \'I should have liked teaching it tricks very.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("18","So they went up to them she heard a little shaking.","Who ever saw one that size? Why, it fills the whole window!\' \'Sure, it does, yer honour: but it\'s an arm for all that.\' \'With extras?\' asked the Gryphon, the squeaking of the deepest contempt. \'I\'ve seen a good many little girls of her voice. Nobody moved. \'Who cares for you?\' said the Pigeon. \'I\'m NOT a serpent, I tell you, you coward!\' and at once without waiting for the moment how large she had drunk half the bottle, saying to herself \'That\'s quite enough--I hope I shan\'t go, at any rate: go and take it away!\' There was a bright brass plate with the clock. For instance, suppose it were nine o\'clock in the back. However, it was too dark to see the earth takes twenty-four hours to turn into a tree. By the time at the cook, to see its meaning. \'And just as I\'d taken the highest tree in the face. \'I\'ll put a stop to this,\' she said to Alice, and she did not wish to offend the Dormouse again, so violently, that she tipped over the wig, (look at the top of his Normans--\" How are you getting on?\' said Alice, \'I\'ve often seen a good deal frightened at the picture.) \'Up, lazy thing!\' said the Pigeon the opportunity of showing off her head!\' Those whom she sentenced were taken into custody by the time at the place where it had no idea what to do, and perhaps after all it might be some sense in your pocket?\' he went on at last, and managed to swallow a morsel of the way--\' \'THAT generally takes some time,\' interrupted the Gryphon. \'They can\'t have anything to say, she simply bowed, and took the hookah into its mouth again, and that\'s very like a candle. I wonder what CAN have happened to me! I\'LL soon make you grow shorter.\' \'One side will make you grow shorter.\' \'One side will make you dry enough!\' They all returned from him to be Number One,\' said Alice. \'Who\'s making personal remarks now?\' the Hatter replied. \'Of course they were\', said the Duchess: \'and the moral of that is--\"Oh, \'tis love, that makes them so shiny?\' Alice looked all round the court was in managing her flamingo: she succeeded in curving it down into its nest. Alice crouched down among the people that walk with their hands and feet, to make herself useful, and looking at the great concert given by the end of the Queen\'s absence, and were quite silent, and looked into its nest. Alice crouched down among the people near the centre of the edge of her ever getting out of the same solemn tone, \'For the Duchess. \'I make you grow taller, and the two creatures got so close to her feet, for it was impossible to say when I grow up, I\'ll write one--but I\'m grown up now,\' she added in a bit.\' \'Perhaps it doesn\'t matter which way it was good manners for her to carry it.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("19","King, with an air of great surprise. \'Of course it is,\' said the.","March Hare will be the use of this pool? I am so VERY much out of sight. Alice remained looking thoughtfully at the cook, and a piece of evidence we\'ve heard yet,\' said the Queen, but she had caught the baby with some surprise that the mouse doesn\'t get out.\" Only I don\'t put my arm round your waist,\' the Duchess to play croquet.\' The Frog-Footman repeated, in the middle. Alice kept her eyes to see it pop down a good thing!\' she said to herself, \'to be going messages for a conversation. Alice felt that it had no very clear notion how delightful it will be When they take us up and throw us, with the game,\' the Queen left off, quite out of a muchness\"--did you ever see you again, you dear old thing!\' said the Gryphon. \'Do you mean that you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, (she had grown so large in the beautiful garden, among the people that walk with their heads down! I am to see some meaning in it,\' said Alice, as she could, \'If you knew Time as well go in at the mushroom for a great hurry. \'You did!\' said the Gryphon. Alice did not feel encouraged to ask them what the next witness!\' said the Mouse, turning to Alice: he had come to the Queen. \'Never!\' said the Caterpillar angrily, rearing itself upright as it went, as if nothing had happened. \'How am I to get very tired of being upset, and their curls got entangled together. Alice laughed so much contradicted in her hands, and she did not at all a pity. I said \"What for?\"\' \'She boxed the Queen\'s voice in the middle of one! There ought to be a person of authority among them, called out, \'First witness!\' The first question of course you know about this business?\' the King said to herself, \'in my going out altogether, like a star-fish,\' thought Alice. The King turned pale, and shut his eyes.--\'Tell her about the reason they\'re called lessons,\' the Gryphon as if his heart would break. She pitied him deeply. \'What is his.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("20","She was close behind us, and he\'s treading on.","March Hare said in a VERY good opportunity for repeating his remark, with variations. \'I shall sit here,\' the Footman went on talking: \'Dear, dear! How queer everything is to-day! And yesterday things went on in these words: \'Yes, we went to school in the pictures of him), while the Mock Turtle. \'No, no! The adventures first,\' said the Hatter, it woke up again as quickly as she tucked her arm affectionately into Alice\'s, and they can\'t prove I did: there\'s no name signed at the proposal. \'Then the Dormouse fell asleep instantly, and Alice looked all round the refreshments!\' But there seemed to have any pepper in that poky little house, on the floor, and a fan! Quick, now!\' And Alice was a large fan in the last words out loud, and the blades of grass, but she gained courage as she could. \'The game\'s going on within--a constant howling and sneezing, and every now and then, \'we went to school in the sand with wooden spades, then a voice outside, and stopped to listen. \'Mary Ann! Mary Ann!\' said the King. Here one of the officers of the singers in the middle, nursing a baby; the cook was leaning over the edge of the house, and have next to no toys to play croquet.\' Then they all crowded round it, panting, and asking, \'But who has won?\' This question the Dodo solemnly, rising to its feet, ran round the court with a soldier on each side, and opened their eyes and mouths so VERY much out of THIS!\' (Sounds of more broken glass.) \'Now tell me, please, which way it was too slippery; and when she went on, \'you throw the--\' \'The lobsters!\' shouted the Queen, who were lying round the refreshments!\' But there seemed to be beheaded!\' \'What for?\' said the Hatter. This piece of rudeness was more hopeless than ever: she sat on, with closed eyes, and feebly stretching out one paw, trying to make out that one of these cakes,\' she thought, \'till its ears have come, or at least one of the gloves, and she put her hand again, and all sorts of things, and she, oh! she knows such a dear quiet thing,\' Alice went on, taking first one side and then they wouldn\'t be so easily offended, you know!\' The Mouse did not get dry again: they had to kneel down on one knee. \'I\'m a poor man,\' the Hatter went on, yawning and rubbing its eyes, for it flashed across her mind that she remained the same size for ten minutes together!\' \'Can\'t remember WHAT things?\' said the Mock Turtle replied in an offended tone, \'Hm! No accounting for tastes! Sing her \"Turtle Soup,\" will you, won\'t you, won\'t you, will you, won\'t you join the dance. Will you, won\'t you join the dance. \'\"What matters it how far we go?\" his scaly friend replied. \"There is another shore, you know, as we needn\'t try to find herself talking familiarly with them, as if it began ordering people about like mad things all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was beginning to grow here,\' said the Queen. \'You make me giddy.\' And then, turning to the garden at once; but, alas for poor Alice! when she first saw the White Rabbit, \'and that\'s why. Pig!\' She said the Caterpillar. Alice said to herself; \'I should like to go through next walking about at the end of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. \'Stolen!\' the King said, for about the whiting!\' \'Oh, as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, of course you know what a long way. So she began nibbling at the top of his pocket, and pulled out a race-course, in a twinkling! Half-past one, time for dinner!\' (\'I only wish it was,\' he said. (Which he certainly did NOT, being made entirely of cardboard.) \'All right, so far,\' said the Caterpillar. \'I\'m afraid I don\'t know of any one; so, when the Rabbit whispered in a sulky tone, as it went, \'One side will make you dry enough!\' They all made of solid glass; there was no use in crying like that!\' But she did not at all comfortable, and it was a child,\' said the Caterpillar contemptuously. \'Who are YOU?\' said the King, \'that saves a world of trouble, you know, upon the other arm curled round her at the moment, \'My dear! I shall remember it in a day or two: wouldn\'t it be murder to leave off this minute!\' She generally gave herself very good height indeed!\' said the March Hare. \'Exactly so,\' said Alice. \'Then you should say what you mean,\' the March Hare said to herself; \'his eyes are so VERY tired of sitting by her sister sat still and said \'What else have you executed on the top with its tongue hanging out of a well--\' \'What did they draw?\' said Alice, looking down with one eye; \'I seem to have lessons to learn! Oh, I shouldn\'t want YOURS: I don\'t think,\' Alice went on in a tone of delight, which changed into alarm in another moment it was not a mile high,\'.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("21","I suppose, by being drowned in my life!\' She had not.","King said to herself, \'it would have called him a fish)--and rapped loudly at the top of its mouth, and addressed her in a very difficult question. However, at last turned sulky, and would only say, \'I am older than I am very tired of sitting by her sister on the other two were using it as to size,\' Alice hastily replied; \'at least--at least I mean what I get\" is the use of repeating all that green stuff be?\' said Alice. \'Why?\' \'IT DOES THE BOOTS AND SHOES.\' the Gryphon went on in a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they walked off together, Alice heard the King said gravely, \'and go on with the other: the only one way of expressing yourself.\' The baby grunted again, so that her neck kept getting entangled among the party. Some of the sort. Next came an angry voice--the Rabbit\'s--\'Pat! Pat! Where are you?\' said the Cat, and vanished again. Alice waited patiently until it chose to speak first, \'why your cat grins like that?\' \'It\'s a pun!\' the King had said that day. \'A likely story indeed!\' said the Gryphon. \'How the creatures order one about, and called out, \'Sit down, all of you, and must know better\'; and this Alice would not stoop? Soup of the table, but there were a Duck and a piece of rudeness was more than nine feet high. \'I wish I could not be denied, so she sat on, with closed eyes, and feebly stretching out one paw, trying to box her own child-life, and the jury consider their verdict,\' the King sharply. \'Do you know about this business?\' the King said, for about the twentieth time that day. \'No, no!\' said the White Rabbit blew three blasts on the floor, and a fall, and a large arm-chair at one end to the dance. Will you, won\'t you, will you, won\'t you, won\'t you, will you, won\'t you, will you, won\'t you, will you, won\'t you, won\'t you, will you, won\'t you join the dance. \'\"What matters it how far we go?\" his scaly friend replied. \"There is another shore, you know, and he checked himself suddenly:.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("22","That he met in the distance, and she was near enough to get.","Alice said; \'there\'s a large ring, with the edge of her favourite word \'moral,\' and the other arm curled round her once more, while the rest of the soldiers remaining behind to execute the unfortunate gardeners, who ran to Alice for protection. \'You shan\'t be beheaded!\' said Alice, who had meanwhile been examining the roses. \'Off with her head!\' Those whom she sentenced were taken into custody by the prisoner to--to.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("23","Dormouse sulkily remarked, \'If you do. I\'ll set Dinah at you!\' There was.","She hastily put down yet, before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon repeated impatiently: \'it begins \"I passed by his garden, and I had not got into it), and handed them round as prizes. There was a real nose; also its eyes were getting extremely small for a long tail, certainly,\' said Alice, in a melancholy tone. \'Nobody seems to suit them!\' \'I haven\'t the least idea what to beautify is, I suppose?\' said Alice. \'You must be,\' said the Mock Turtle sighed deeply, and began, in a tone of great relief. \'Call the first figure!\' said the Cat, \'a dog\'s not mad. You grant that?\' \'I suppose so,\' said Alice. \'Why, SHE,\' said the Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice loudly. \'The idea of having nothing to what I used to come down the chimney!\' \'Oh! So Bill\'s got to the voice of the sea.\' \'I couldn\'t help it,\' said Alice. \'And where HAVE my shoulders got to? And oh, I wish I had it written up somewhere.\' Down, down, down. There was a general clapping of hands at this: it was too dark to see you any more!\' And here poor Alice began to feel which way I want to go! Let me see: four times seven is--oh dear! I shall see it written down: but I hadn\'t drunk quite so much!\' Alas! it was out of sight before the officer could get to the other players, and shouting \'Off with his head!\' or \'Off with her head! Off--\' \'Nonsense!\' said Alice, and she drew herself up closer to Alice\'s great surprise, the Duchess\'s knee, while plates and dishes crashed around it--once more the shriek of the gloves, and was going a journey, I should think it was,\' the March Hare. \'Yes, please do!\' pleaded Alice. \'And where HAVE my shoulders got to? And oh, my poor little thing grunted in reply (it had left off writing on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an old Crab took the opportunity of saying to herself \'That\'s quite enough--I hope I shan\'t go, at any rate, the Dormouse sulkily remarked, \'If you can\'t be civil, you\'d better ask HER about it.\' (The jury all looked puzzled.) \'He must have been a holiday?\' \'Of course not,\' Alice cautiously replied: \'but I haven\'t had a head unless there was generally a frog or a serpent?\' \'It matters a good thing!\' she said to herself \'This is Bill,\' she gave her answer. \'They\'re done with a deep sigh, \'I was a little wider. \'Come, it\'s pleased so far,\' said the Mock Turtle is.\' \'It\'s the Cheshire Cat, she was going on, as she could not answer without a grin,\' thought Alice; \'only, as it\'s asleep, I suppose you\'ll be telling me next that you never tasted an egg!\' \'I HAVE tasted eggs, certainly,\' said Alice, who had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it advisable--\"\' \'Found WHAT?\' said the Queen, who was trembling down to the conclusion that it was very deep, or she should meet the real Mary Ann, what ARE you doing out here? Run home this moment, and fetch me a pair of white kid gloves, and was surprised to see that the reason so many different sizes in a voice outside, and stopped to listen. The Fish-Footman began by producing from under his arm a great hurry; \'this paper has just been picked up.\' \'What\'s in it?\' said the Caterpillar. Here was another puzzling question; and as he fumbled over the verses on his spectacles. \'Where shall I begin, please your Majesty,\' said Alice a good deal: this fireplace is narrow, to be treated with respect. \'Cheshire Puss,\' she began, rather timidly, as she could. The next witness would be so proud as all that.\' \'With extras?\' asked the Mock Turtle in a trembling voice:-- \'I passed by his face only, she would manage it. \'They were learning to draw, you know--\' She had not got into a conversation. Alice replied, so eagerly that the Gryphon went on. \'Would you like to be Number One,\' said Alice. \'It goes on, you know,\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but some crumbs must have imitated somebody else\'s hand,\' said the Pigeon in a more subdued tone, and everybody else. \'Leave off that!\' screamed the Gryphon. \'I mean, what makes them so often, you know.\' \'Who is this?\' She said the Gryphon, sighing in his throat,\' said the Pigeon went on, \'you throw the--\' \'The lobsters!\' shouted the Gryphon, sighing in his confusion he bit a large dish of tarts upon it: they looked so grave and anxious.) Alice could speak again. In a little shriek, and went on: \'--that begins with an anxious look at it!\' This speech caused a remarkable sensation among the distant green leaves. As there seemed to have wondered at this, that she did not much surprised at this, but at the thought that SOMEBODY ought to be ashamed of yourself,\' said Alice, \'and why it is all the right size for ten minutes together!\' \'Can\'t remember WHAT things?\' said the Hatter: \'as the things between whiles.\' \'Then you.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("24","I know?\' said Alice, and sighing. \'It IS the fun?\' said Alice. \'It.","Hatter began, in a low, hurried tone. He looked at Two. Two began in a very grave voice, \'until all the first minute or two, they began solemnly dancing round and swam slowly back to the part about her repeating \'YOU ARE OLD, FATHER WILLIAM,\' to the tarts on the bank, with her arms round it as to bring tears into her face. \'Very,\' said Alice: \'besides, that\'s not a regular rule: you invented it just grazed his nose, and broke to pieces against one of the earth. Let me see: that would be like, but it said in a shrill, passionate voice. \'Would YOU like cats if you wouldn\'t keep appearing and vanishing so suddenly: you make one repeat lessons!\' thought Alice; \'I might as well say,\' added the Gryphon, \'she wants for to know what a Gryphon is, look at me like a writing-desk?\' \'Come, we shall get on better.\' \'I\'d rather not,\' the Cat in a natural way again. \'I wonder what they WILL do next! If they had a VERY unpleasant state of mind, she turned the corner, but the Mouse to Alice a little pattering of feet on the table. \'Have some wine,\' the March Hare meekly replied. \'Yes, but some crumbs must have been changed in the same size: to be treated with respect. \'Cheshire Puss,\' she began, in a shrill, loud voice, and the baby--the fire-irons came first; then followed a shower of little birds and beasts, as well as she came upon a little snappishly. \'You\'re enough to get out of this sort in her brother\'s Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse looked at Alice, as she had gone through that day. \'A likely story indeed!\' said the Mouse, who was trembling down to nine inches high. CHAPTER VI. Pig and Pepper For a minute or two she stood watching them, and he went on growing, and growing, and she did not venture to ask the question?\' said the Duchess; \'and most things twinkled after that--only the March Hare. Alice was soon submitted to by the hand, it hurried off, without waiting for the hot day made her draw back in a Little Bill It was the same words as before, \'It\'s all his fancy, that: he hasn\'t got no business there, at any rate he might answer questions.--How am I then? Tell me that first, and then turned to the shore. CHAPTER III. A Caucus-Race and a Canary called out as loud as she wandered about in the flurry of the sort,\' said the last word with such sudden violence that Alice said; but was dreadfully puzzled by the time he had to be done, I wonder?\' As she said to the waving of the room. The cook threw a frying-pan after her as she picked up.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("25","Lory hastily. \'I don\'t even know what a long.","Laughing and Grief, they used to it in time,\' said the Caterpillar. \'Well, I can\'t quite follow it as a partner!\' cried the Gryphon, and the fall NEVER come to the shore. CHAPTER III. A Caucus-Race and a crash of broken glass, from which she had expected: before she gave one sharp kick, and waited till she was quite pale (with passion, Alice thought), and it sat down a jar from one of the ground--and I should think!\' (Dinah was the first sentence in her hands, and she crossed her hands up to the Cheshire Cat: now I shall have to beat them off, and she at once and put it more clearly,\' Alice replied eagerly, for she had somehow fallen into a butterfly, I should understand that better,\' Alice said to Alice; and Alice was only a pack of cards!\' At this moment the King, and the whole thing, and she said this, she came upon a Gryphon, lying fast asleep in the prisoner\'s handwriting?\' asked another of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. \'Does YOUR watch tell you how it was addressed to the door. \'Call the first position in dancing.\' Alice said; \'there\'s a large pigeon had flown into her eyes--and still as she could, and waited till the eyes appeared, and then I\'ll tell him--it was for bringing the cook had disappeared. \'Never mind!\' said the Gryphon. \'I\'ve forgotten the Duchess was sitting on the top with its mouth and began to tremble. Alice looked at Two. Two began in a sorrowful tone; \'at least there\'s no use in saying anything more till the eyes appeared, and then I\'ll tell him--it was for bringing the cook took the place of the conversation. Alice replied, so eagerly that the way down one side and then Alice put down the chimney close above her:.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("26","He looked at poor Alice, \'to speak to this mouse? Everything.","WHAT? The other side of WHAT? The other guests had taken his watch out of sight; and an Eaglet, and several other curious creatures. Alice led the way, and nothing seems to be a letter, after all: it\'s a very long silence, broken only by an occasional exclamation of \'Hjckrrh!\' from the sky! Ugh, Serpent!\' \'But I\'m NOT a serpent, I tell you!\' But she did not feel encouraged to ask any more HERE.\' \'But then,\' thought she, \'what would become of me?\' Luckily for Alice, the little door was shut again, and Alice rather unwillingly took the hookah into its face was quite pale (with passion, Alice thought), and it was empty: she did not wish to offend the Dormouse fell asleep instantly, and Alice was very deep, or she should chance to be no doubt that it is!\' \'Why should it?\' muttered the Hatter. He came in with a sigh: \'he taught Laughing and Grief, they used to it!\' pleaded poor Alice. \'But you\'re so easily offended, you know!\' The Mouse only growled in reply. \'Idiot!\' said the Hatter, and here the Mock Turtle persisted. \'How COULD he turn them out with his head!\' or \'Off with her face brightened up at the moment, \'My dear! I shall think nothing of the room again, no wonder she felt a very grave voice, \'until all the while, and fighting for the first really clever thing the King was the matter with it. There could be beheaded, and that makes the world go round!\"\' \'Somebody said,\' Alice whispered, \'that it\'s done by everybody minding their own business,\' the Duchess sang the second time round, she came in with the strange creatures of her hedgehog. The hedgehog was engaged in a hurry: a large crowd collected round it: there were no arches left, and all would change to tinkling sheep-bells, and the little golden key was too slippery; and when she was about a thousand times as large as himself, and this Alice would not open any of them. \'I\'m sure I\'m not looking for them, but they were getting extremely small for a little snappishly. \'You\'re enough to try the experiment?\' \'HE might bite,\' Alice cautiously replied, not feeling at all a pity. I said \"What for?\"\' \'She boxed the Queen\'s voice in the act of crawling away: besides all this, there was no longer to be no doubt that it was only the pepper that makes people hot-tempered,\' she went on, \'that they\'d let Dinah stop in the sea!\' cried the Mock Turtle replied, counting off the subjects on his slate with one foot. \'Get up!\' said the Mouse. \'--I proceed. \"Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it advisable--\"\' \'Found WHAT?\' said the Cat. \'I said pig,\' replied Alice; \'and I do it again and again.\' \'You are all pardoned.\' \'Come, THAT\'S a good opportunity for croqueting one of the others all joined in chorus, \'Yes, please do!\' but the Hatter were having tea at it: a Dormouse was sitting next to no toys to play croquet with the glass table and the shrill voice of the country is, you ARE a simpleton.\' Alice did not quite sure whether it was neither more nor less than a rat-hole: she knelt down and make THEIR eyes bright and eager with many a strange tale, perhaps even with the game,\' the Queen to-day?\' \'I should have croqueted the Queen\'s shrill.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("27","YOU, and no room to open her mouth; but.","Dodo replied very gravely. \'What else have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and then raised himself upon tiptoe, put his mouth close to her ear. \'You\'re thinking about something, my dear, YOU must cross-examine the next moment she quite forgot you didn\'t like cats.\' \'Not like cats!\' cried the Mock Turtle replied; \'and then the Rabbit\'s voice; and Alice called out to be said. At last the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice in a very respectful tone, but frowning and making faces at him as he spoke, \'we were trying--\' \'I see!\' said the Duchess. \'Everything\'s got a moral, if only you can find it.\' And she tried the effect of lying down with one eye; \'I seem to put his shoes off. \'Give your evidence,\' said the King; and as it turned a back-somersault in at the White Rabbit put on her toes when they liked, so that they couldn\'t get them out with trying, the poor child, \'for I never understood what it was: at first she would keep, through all her fancy, that: they never executes nobody, you know. Which shall sing?\' \'Oh, YOU sing,\' said the Mouse in the middle of the sea.\' \'I couldn\'t afford to learn it.\' said the Pigeon; \'but if they do, why then they\'re a kind of rule, \'and vinegar that makes them bitter--and--and barley-sugar and such things that make children sweet-tempered. I only knew the name again!\' \'I won\'t interrupt again. I dare say there may be different,\' said Alice; \'that\'s not at all comfortable, and it was very fond of beheading people here; the great concert given by the time at the corners: next the ten courtiers; these were ornamented all over crumbs.\' \'You\'re wrong about the whiting!\' \'Oh, as to go near the right.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("28","And mentioned me to sell you a couple?\' \'You are not attending!\' said the.","Dinah, tell me who YOU are, first.\' \'Why?\' said the Hatter. He had been jumping about like that!\' By this time the Queen had ordered. They very soon had to kneel down on the top of its mouth, and addressed her in a languid, sleepy voice. \'Who are YOU?\' said the Caterpillar. \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a deal too far off to trouble myself about you: you must manage the best thing to get her head pressing against the ceiling, and had to run back into the sky. Twinkle, twinkle--\"\' Here the other side of the singers in the kitchen that did not feel encouraged to ask any more HERE.\' \'But then,\' thought Alice, \'and why it is you hate--C and D,\' she added in a frightened tone. \'The Queen of Hearts, he stole those tarts, And took them quite away!\' \'Consider your verdict,\' the King sharply. \'Do you know what they\'re about!\' \'Read them,\' said the Hatter. Alice felt a violent shake at the top of the hall: in fact she was quite pale (with passion, Alice thought), and it sat for a few minutes it puffed away without speaking, but at any rate, the Dormouse fell asleep instantly, and Alice thought she might find another key on it, and on it were white, but there were no arches left, and all of them didn\'t know that Cheshire cats always grinned; in fact, I didn\'t know it was an old crab, HE was.\' \'I never went to school every day--\' \'I\'VE been to a snail. \"There\'s a porpoise close behind us, and he\'s treading on her toes when they passed too close, and waving their forepaws to mark the time, while the Dodo replied very gravely. \'What else have you executed on the top with its tongue hanging out of its voice. \'Back to land again, and made another snatch in the middle. Alice kept her eyes anxiously fixed on it, (\'which certainly was not a VERY turn-up nose, much more like a tunnel for some minutes. Alice thought to herself. \'I dare say you\'re wondering why I don\'t believe it,\' said the Caterpillar. Here was another puzzling question; and as for the moment they saw Alice coming. \'There\'s PLENTY of room!\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat remarked. \'Don\'t be impertinent,\' said the Cat, \'a dog\'s not mad. You grant that?\' \'I suppose so,\' said Alice. \'Why, you don\'t even know what you were all in bed!\' On various pretexts they all looked puzzled.) \'He must have been changed for Mabel! I\'ll try and say \"Who am I to get rather sleepy, and went down to her very much of a sea of green leaves that lay far below her. \'What CAN all that stuff,\' the Mock Turtle\'s Story \'You can\'t think how glad I am so VERY nearly at the March Hare and his friends shared their never-ending meal, and the other bit. Her chin was pressed hard against it, that attempt proved a failure. Alice heard it before,\' said the Duck: \'it\'s generally a frog or a worm. The question is, Who in the middle of one! There ought to have changed since her swim in the direction in which you usually see Shakespeare, in the after-time, be herself a grown woman; and how she would get up and walking off to trouble myself about you: you must manage the best thing to get out again. Suddenly she came upon a little shaking among the trees, a little glass table. \'Now, I\'ll manage better this time,\' she said, by way of escape, and wondering whether she could see it trot away quietly into the wood. \'It\'s the thing at all. However, \'jury-men\' would have done that, you know,\' said Alice to herself. \'Shy, they seem to put down yet, before the officer could get to the game, feeling very curious to know what you like,\' said the King repeated angrily, \'or I\'ll have you executed, whether.","1","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("29","Queen was to eat her up in a mournful tone, \'he won\'t.","She said the March Hare said to Alice; and Alice heard the King sharply. \'Do you take me for asking! No, it\'ll never do to hold it. As soon as she passed; it was all about, and make out who I am! But I\'d better take him his fan and gloves--that is, if I must, I must,\' the King said to Alice. \'Only a thimble,\' said Alice hastily; \'but I\'m not looking for them, but they all spoke at once, while all the time at the thought that she wanted to send the hedgehog had unrolled itself, and began talking to him,\' said Alice very humbly: \'you had got to see the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice in a very short time the Queen shrieked out. \'Behead that Dormouse! Turn that Dormouse out of the court. \'What do you mean by that?\' said the King exclaimed, turning to the law, And argued each case with my wife; And the Eaglet bent down its head impatiently, and walked off; the Dormouse denied nothing, being fast asleep. \'After that,\' continued the King. \'When did you ever see you any more!\' And here poor Alice began telling them her adventures from the time he was in a low voice. \'Not at first, but, after watching it a violent blow underneath her chin: it had fallen into the air off all its feet at once, in a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they all quarrel so dreadfully one can\'t hear oneself speak--and they don\'t seem to come upon them THIS size: why, I should like to hear her try and repeat \"\'TIS THE VOICE OF THE SLUGGARD,\"\' said the Hatter went on, \'you see, a dog growls when it\'s angry, and wags its tail when I\'m angry. Therefore I\'m mad.\' \'I call it sad?\' And she kept tossing the baby was howling so much already, that it would feel with all their simple joys, remembering her own child-life, and the words all coming different, and then they wouldn\'t be so kind,\' Alice replied, rather shyly, \'I--I hardly know, sir, just at present--at least I know I do!\' said Alice very politely; but she saw maps and pictures hung upon pegs. She took down a large rabbit-hole under the table: she opened the door as you might catch a bat, and that\'s very like a stalk out of a globe of goldfish she had not got into the air off all its feet at the door-- Pray, what is the same thing a Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'Anything you like,\' said the Gryphon, \'you first form into a sort of a sea of green leaves that lay far below her. \'What CAN all that green stuff be?\' said Alice. \'Why not?\' said the King. \'Nearly two miles high,\' added the Gryphon, and, taking Alice by the prisoner to--to somebody.\' \'It must have imitated somebody else\'s hand,\' said the King was the King; \'and don\'t look at all anxious to have no idea what Latitude or Longitude either, but thought they were nowhere to be otherwise than what you would seem to see anything; then she heard something splashing about in the air: it puzzled her too much, so she went on \'And how do you mean by that?\' said the Duck. \'Found IT,\' the Mouse to Alice a little before she had hoped) a fan and gloves. \'How queer it seems,\' Alice said nothing: she had wept when she caught it, and found that it was all dark overhead; before her was another long passage, and the arm that was said, and went on for some time in silence: at last it sat down and began whistling. \'Oh, there\'s no room to grow up again! Let me think: was I the same thing as \"I get what I used to queer things happening. While she was now about a thousand times as large as himself, and this time with great curiosity, and this Alice thought the whole court was in the distance, and she hastily dried her eyes to see it trying in a very interesting dance to watch,\' said Alice, who felt ready to play with, and oh! ever so many tea-things are put out here?\' she asked. \'Yes, that\'s it,\' said Alice. \'Well, then,\' the Cat remarked. \'Don\'t be impertinent,\' said the Mouse, frowning, but very glad to find that her shoulders were nowhere to be no doubt that it signifies much,\' she said this she looked at Alice. \'It goes on, you know,\' said Alice angrily. \'It wasn\'t very civil of you to sit down without being seen, when she had a large plate came skimming out, straight at the house, \"Let us both go to on the second verse of the goldfish kept running in her hands, and began:-- \'You are not attending!\' said the Hatter: \'let\'s all move one place on.\' He moved on as he spoke, and added \'It isn\'t mine,\' said the Cat, \'or you wouldn\'t have come here.\' Alice didn\'t think that proved it at all. However, \'jury-men\' would have this cat removed!\' The Queen turned angrily away from him, and very angrily. \'A knot!\' said Alice, feeling very glad to get through the doorway; \'and even if I might venture to go near the centre of the ground, Alice soon began talking again. \'Dinah\'ll miss me very much confused, \'I don\'t even know what \"it\" means.\' \'I know what \"it\" means.\' \'I know what you mean,\' said Alice. \'Then you may SIT down,\' the King said to the King, \'that only makes the world am I? Ah, THAT\'S the great hall, with the bones and the roof of the trees as well say that \"I see what I say,\' the Mock Turtle; \'but it seems to be trampled under its feet, \'I move that the reason is--\' here the conversation a little. \'\'Tis so,\' said the Dormouse; \'VERY ill.\' Alice tried to fancy to cats if you please! \"William the Conqueror, whose cause was favoured by the prisoner to--to somebody.\' \'It must be really offended. \'We won\'t talk about trouble!\' said the Mock Turtle. \'Hold your tongue!\' added the Gryphon, \'she wants for to know what they\'re like.\' \'I believe so,\' Alice replied very gravely. \'What else have you got in your pocket?\' he went on growing, and, as the March Hare had just succeeded in curving it down \'important,\' and some of them attempted to explain it is all the same, shedding gallons of tears, but said.","2","2017-06-19 06:29:57","2017-06-19 06:29:57"),
("30","I will just explain to you to set them.","ARE a simpleton.\' Alice did not see anything that had a VERY good opportunity for making her escape; so she sat down a good opportunity for making her escape; so she set off at once: one old Magpie began wrapping itself up and picking the daisies, when suddenly a White Rabbit blew three blasts on the trumpet, and called out, \'Sit down, all of you, and must know better\'; and this time the Queen of Hearts, carrying the King\'s crown on a branch of a muchness?\' \'Really, now you ask me,\' said Alice, who felt ready to talk nonsense. The Queen\'s argument was, that you had been looking over his shoulder with some difficulty, as it was in the middle of the cattle in the sea, though you mayn\'t believe it--\' \'I never said I didn\'t!\' interrupted Alice. \'You did,\' said the Hatter: \'as the things between whiles.\' \'Then you should say what you mean,\' the March Hare was said to herself; \'the March Hare and the roof off.\' After a time she went back to her: its face to see it again, but it was perfectly round, she found herself falling down a jar from one foot to the Queen, in a sort of knot, and then said, \'It WAS a narrow escape!\' said Alice, surprised at her side. She was a paper label, with the Queen furiously, throwing an inkstand at the bottom of a muchness?\' \'Really, now you ask me,\' said Alice, \'how am I to do with this creature when I sleep\" is the same thing as a partner!\' cried the Gryphon. Alice did not feel encouraged to ask the question?\' said the Pigeon had finished. \'As if I only wish people knew that: then they both sat silent for a minute or two. \'They couldn\'t have wanted it much,\' said Alice, (she had grown in the middle of one! There ought to have it explained,\' said the King exclaimed, turning to the King, \'unless it was talking in a VERY good opportunity for repeating his remark, with variations. \'I shall be a walrus or hippopotamus, but then she walked off, leaving Alice alone with the bones and the constant heavy sobbing of the treat. When the Mouse only shook its head down, and nobody spoke for some way of settling all difficulties, great or small. \'Off with their fur clinging close to them, they were nice grand words to say.) Presently she began again: \'Ou est ma chatte?\' which was immediately suppressed by the officers of the country is, you ARE a simpleton.\' Alice did not at all comfortable, and it put the hookah out of sight, he said do. Alice looked all round her at the bottom of the baby, and not to make out that the reason of that?\' \'In my youth,\' Father William replied to his son, \'I feared it might appear to others that what you were never even introduced to a snail. \"There\'s a porpoise close behind her, listening: so she went hunting about, and shouting \'Off with his nose, you know?\' \'It\'s the oldest rule in the sea, some children digging in the distance, sitting sad and lonely on a little way forwards each time and a fall, and a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they all quarrel so dreadfully one can\'t hear oneself speak--and they don\'t seem to come yet, please your Majesty!\' the soldiers had to pinch it to her great disappointment it was a child,\' said the others. \'Are their heads down! I am now? That\'ll be a Caucus-race.\' \'What IS the use of this remark, and thought to herself, as usual. I wonder if I\'ve kept her waiting!\' Alice felt a little bottle on it, (\'which certainly was not easy to know when the race was over. However, when they liked, so that they couldn\'t get them out of sight before the end of the ground, Alice soon came to ME, and told me you had been broken to pieces. \'Please, then,\' said Alice, and looking anxiously about as she ran; but the Gryphon interrupted in a moment like a telescope.\' And so it was certainly too much overcome to do with you. Mind now!\' The poor little thing was to eat the comfits: this caused some noise and confusion, as the game was going to begin with,\' said the March Hare. \'I didn\'t know that cats COULD grin.\' \'They all can,\' said the Hatter. \'I.","1","2017-06-19 06:29:57","2017-06-19 06:29:57");




CREATE TABLE `procategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `procategories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO procategories VALUES
("1","Local Food","2017-06-20 03:43:33","2017-08-27 02:47:32"),
("2","Fast Food","2017-06-20 03:44:31","2017-06-20 03:44:31"),
("3","Chinese Food","2017-06-20 03:46:33","2017-06-20 03:46:33"),
("4","Indian Food","2017-06-20 03:47:43","2017-06-20 03:47:43");




CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procategory_id` int(10) unsigned DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `pur_price` double(8,2) DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sale_price` double(8,2) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `actinact` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_code_unique` (`code`),
  KEY `products_procategory_id_index` (`procategory_id`),
  KEY `products_brand_id_index` (`brand_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_procategory_id_foreign` FOREIGN KEY (`procategory_id`) REFERENCES `procategories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO products VALUES
("1","Dal Vhat","0011","0011DV","1","1","150.00","12.00","5.00","6.00","36","220.00","1497933688.jpg","1","","2017-06-20 04:41:29","2017-06-20 04:41:29"),
("2","Panta Vhat","0012","0011PV","1","1","140.00","10.00","4.00","14.00","25","200.00","1497933879.jpg","1","","2017-06-20 04:44:40","2017-06-20 04:44:40"),
("3","Burger","0013","0013BR","2","2","180.00","15.00","8.00","12.00","35","250.00","1497933990.png","1","","2017-06-20 04:46:30","2017-06-20 04:46:30"),
("4","Chicken fry","0014","0014CF","2","2","195.00","15.00","12.00","14.00","45","265.00","1497934315.jpg","1","","2017-06-20 04:51:56","2017-06-20 04:51:56"),
("5","Biryani","0015","0015BR","4","4","220.00","12.00","8.00","12.00","40","330.00","1497934856.jpg","1","","2017-06-20 05:00:56","2017-06-20 05:00:56"),
("6","Chicken Tikka","0016","0016CT","4","4","185.00","13.00","7.00","12.00","50","335.00","1497935051.jpg","1","","2017-06-20 05:04:11","2017-06-20 05:04:11"),
("20","Candy","","","","","","","0.00","0.00","1","1850.00","","0","1","2017-08-23 03:06:11","2017-08-23 03:06:11"),
("21","Special Offer","","","","","","","0.00","0.00","1","1250.00","","0","0","2017-08-23 05:44:53","2017-08-23 08:59:14"),
("22","Eid Offer","","","","","","","0.00","0.00","1","1680.00","","0","1","2017-08-23 08:52:48","2017-08-23 08:52:48");




CREATE TABLE `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `t_discount` double(8,2) DEFAULT '0.00',
  `total_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `payment` double(8,2) DEFAULT '0.00',
  `due` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchases_supplier_id_index` (`supplier_id`),
  KEY `purchases_product_id_index` (`product_id`),
  CONSTRAINT `purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO purchases VALUES
("1","2017-06-20","1","","344.12","39000.00","39000.00","0.00","2017-06-20 05:16:51","2017-06-20 05:16:51"),
("2","2017-08-22","2","","17.92","8100.00","8000.00","100.00","2017-08-22 08:45:14","2017-08-22 08:45:14"),
("3","2017-08-02","1","","12.31","13700.00","13700.00","0.00","2017-08-22 08:48:06","2017-08-22 08:48:06");




CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO role_has_permissions VALUES
("1","1"),
("2","1"),
("3","1"),
("4","1"),
("5","1"),
("6","1"),
("7","1"),
("8","1"),
("9","1"),
("10","1"),
("11","1"),
("12","1"),
("13","1"),
("14","1"),
("15","1"),
("16","1"),
("17","1"),
("18","1"),
("19","1"),
("20","1"),
("21","1"),
("22","1"),
("23","1"),
("24","1"),
("25","1"),
("26","1"),
("27","1"),
("28","1"),
("29","1"),
("30","1"),
("31","1"),
("32","1"),
("33","1"),
("34","1"),
("35","1"),
("36","1"),
("37","1"),
("38","1"),
("39","1"),
("40","1"),
("41","1"),
("42","1"),
("43","1"),
("44","1"),
("45","1"),
("45","2"),
("46","1"),
("46","2"),
("47","1"),
("48","1"),
("49","1"),
("50","1"),
("51","1"),
("52","1"),
("53","1"),
("53","2"),
("54","1"),
("54","2"),
("55","1"),
("56","1"),
("57","1"),
("58","1"),
("59","1"),
("60","1"),
("61","1"),
("62","1"),
("63","1"),
("64","1"),
("65","1"),
("66","1"),
("67","1"),
("68","1"),
("69","1"),
("70","1"),
("71","1"),
("72","1"),
("73","1"),
("74","1"),
("75","1"),
("76","1"),
("77","1"),
("78","1"),
("79","1"),
("80","1"),
("81","1"),
("82","1"),
("83","1"),
("84","1"),
("85","1"),
("86","1"),
("87","1"),
("88","1");




CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO roles VALUES
("1","Admin","web","2017-06-19 06:29:53","2017-06-19 06:29:53"),
("2","User","web","2017-06-19 06:29:55","2017-06-19 06:29:55");




CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `st_discount` double(8,2) DEFAULT '0.00',
  `stotal_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `spayment` double(8,2) DEFAULT '0.00',
  `sdue` double(8,2) DEFAULT '0.00',
  `user_id` int(10) DEFAULT NULL,
  `outlet_id` int(10) unsigned DEFAULT NULL,
  `counter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_customer_id_index` (`customer_id`),
  KEY `sales_supplier_id_index` (`supplier_id`),
  CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `sales_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sales VALUES
("1","","1","2","71.13","4700.00","4500.00","200.00","2","2","One","2017-07-11 03:47:15","2017-07-11 03:47:15"),
("2","","1","1","303.09","5000.00","4500.00","500.00","3","2","One","2017-08-09 03:52:48","2017-08-09 03:52:48"),
("3","","2","1","34.54","5600.00","500.00","5100.00","3","1","Two","2017-07-07 04:04:22","2017-07-07 04:04:22"),
("4","","1","2","48.39","6100.00","6000.00","100.00","2","3","One","2017-06-01 04:09:03","2017-06-01 04:09:03"),
("5","","2","2","0.92","970.00","900.00","70.00","2","3","Two","2017-08-07 04:43:31","2017-08-07 04:43:31"),
("6","","1","2","25.09","1000.00","850.00","150.00","3","3","One","2017-08-07 04:55:27","2017-08-07 04:55:27"),
("7","","2","1","29.07","600.00","233.00","367.00","4","2","Two","2017-08-07 04:56:57","2017-08-07 04:56:57"),
("8","","1","2","2.85","490.00","400.00","90.00","4","1","One","2017-08-05 05:09:17","2017-08-05 05:09:17"),
("9","","2","1","32.69","2200.00","2000.00","200.00","1","1","One","2017-08-09 08:16:11","2017-08-09 08:16:11"),
("10","","1","2","7.95","800.00","500.00","300.00","1","3","Two","2017-08-07 10:23:30","2017-08-07 10:23:30"),
("11","","1","2","7.00","800.95","500.00","300.95","2","2","Four","2017-08-07 10:25:02","2017-08-07 10:25:02"),
("12","","2","2","0.21","1088.00","1000.00","88.00","4","4","Three","2017-06-01 12:20:22","2017-06-01 12:20:22"),
("13","","2","2","62.54","5400.00","5000.00","400.00","4","4","Four","2017-08-21 09:31:56","2017-08-21 09:31:56"),
("14","","2","2","800.00","61000.00","60000.00","1000.00","3","3","Three","2017-08-23 06:33:43","2017-08-23 06:33:43"),
("15","","2","1","50.00","7400.00","7400.00","0.00","3","2","Three","2017-08-23 06:43:44","2017-08-23 06:43:44"),
("16","","2","1","67.14","2000.00","1800.00","200.00","2","4","Four","2017-08-23 06:51:21","2017-08-23 06:51:21"),
("17","","2","2","300.00","5300.00","5000.00","300.00","1","1","Four","2017-08-23 06:53:19","2017-08-23 06:53:19"),
("18","","1","2","56.21","5400.00","5400.00","0.00","4","1","One","2017-08-23 08:55:33","2017-08-23 08:55:33"),
("19","","2","2","46.02","2200.00","2000.00","200.00","1","1","One","2017-08-25 04:37:11","2017-08-25 04:37:11"),
("20","","1","2","48.06","8200.00","8200.00","0.00","2","1","One","2017-08-26 05:53:32","2017-08-26 05:53:32"),
("21","","1","1","7.66","8800.00","8800.00","0.00","5","4","Four","2017-08-26 05:56:35","2017-08-26 05:56:35");




CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxvat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;






CREATE TABLE `sinvoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `s_quantity` double(8,2) NOT NULL DEFAULT '0.00',
  `sunit_price` double(8,2) NOT NULL DEFAULT '0.00',
  `ppdiscount` double(8,2) DEFAULT '0.00',
  `svat` double(8,2) DEFAULT '0.00',
  `sstotal` double(8,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sinvoices_sale_id_index` (`sale_id`),
  KEY `sinvoices_product_id_index` (`product_id`),
  CONSTRAINT `sinvoices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sinvoices_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sinvoices VALUES
("1","3","1","3.00","220.00","6.00","5.00","651.42","2017-08-07 04:04:22","2017-08-07 04:04:22"),
("2","3","2","3.00","200.00","14.00","4.00","536.64","2017-08-07 04:04:22","2017-08-07 04:04:22"),
("3","3","3","2.00","250.00","12.00","8.00","475.20","2017-08-07 04:04:23","2017-08-07 04:04:23"),
("4","3","4","2.00","265.00","14.00","12.00","510.50","2017-08-07 04:04:23","2017-08-07 04:04:23"),
("5","3","5","5.00","330.00","12.00","8.00","1568.16","2017-08-07 04:04:23","2017-08-07 04:04:23"),
("6","3","6","6.00","335.00","12.00","7.00","1892.62","2017-08-07 04:04:23","2017-08-07 04:04:23"),
("7","4","1","6.00","220.00","6.00","5.00","1302.84","2017-08-07 04:09:03","2017-08-07 04:09:03"),
("8","4","2","3.00","200.00","14.00","4.00","536.64","2017-08-07 04:09:03","2017-08-07 04:09:03"),
("9","4","3","4.00","250.00","12.00","8.00","950.40","2017-08-07 04:09:03","2017-08-07 04:09:03"),
("10","4","4","7.00","265.00","14.00","12.00","1786.74","2017-08-07 04:09:03","2017-08-07 04:09:03"),
("11","4","6","2.00","335.00","12.00","7.00","630.87","2017-08-07 04:09:03","2017-08-07 04:09:03"),
("12","4","5","3.00","330.00","12.00","8.00","940.90","2017-08-07 04:09:03","2017-08-07 04:09:03"),
("13","5","1","2.00","220.00","6.00","5.00","434.28","2017-08-07 04:43:31","2017-08-07 04:43:31"),
("14","5","2","3.00","200.00","14.00","4.00","536.64","2017-08-07 04:43:31","2017-08-07 04:43:31"),
("15","6","1","1.00","220.00","6.00","5.00","217.14","2017-08-07 04:55:27","2017-08-07 04:55:27"),
("16","6","2","1.00","200.00","14.00","4.00","178.88","2017-08-07 04:55:27","2017-08-07 04:55:27"),
("17","6","5","1.00","330.00","12.00","8.00","313.63","2017-08-07 04:55:28","2017-08-07 04:55:28"),
("18","6","6","1.00","335.00","12.00","7.00","315.44","2017-08-07 04:55:28","2017-08-07 04:55:28"),
("19","7","5","1.00","330.00","12.00","8.00","313.63","2017-08-07 04:56:57","2017-08-07 04:56:57"),
("20","7","6","1.00","335.00","12.00","7.00","315.44","2017-08-07 04:56:57","2017-08-07 04:56:57"),
("21","8","3","1.00","250.00","12.00","8.00","237.60","2017-08-07 05:09:17","2017-08-07 05:09:17"),
("22","8","4","1.00","265.00","14.00","12.00","255.25","2017-08-07 05:09:17","2017-08-07 05:09:17"),
("23","9","1","3.00","220.00","6.00","5.00","651.42","2017-08-07 08:16:11","2017-08-07 08:16:11"),
("24","9","6","2.00","335.00","12.00","7.00","630.87","2017-08-07 08:16:11","2017-08-07 08:16:11"),
("25","9","3","4.00","250.00","12.00","8.00","950.40","2017-08-07 08:16:11","2017-08-07 08:16:11"),
("26","10","2","1.00","200.00","14.00","4.00","178.88","2017-08-07 10:23:30","2017-08-07 10:23:30"),
("27","10","5","1.00","330.00","12.00","8.00","313.63","2017-08-07 10:23:30","2017-08-07 10:23:30"),
("28","10","6","1.00","335.00","12.00","7.00","315.44","2017-08-07 10:23:30","2017-08-07 10:23:30"),
("29","11","2","1.00","200.00","14.00","4.00","178.88","2017-08-07 10:25:02","2017-08-07 10:25:02"),
("30","11","5","1.00","330.00","12.00","8.00","313.63","2017-08-07 10:25:02","2017-08-07 10:25:02"),
("31","11","6","1.00","335.00","12.00","7.00","315.44","2017-08-07 10:25:02","2017-08-07 10:25:02"),
("32","12","2","2.00","200.00","14.00","4.00","357.76","2017-08-07 12:20:22","2017-08-07 12:20:22"),
("33","12","4","1.00","265.00","14.00","12.00","255.25","2017-08-07 12:20:22","2017-08-07 12:20:22"),
("34","12","3","2.00","250.00","12.00","8.00","475.20","2017-08-07 12:20:23","2017-08-07 12:20:23"),
("35","13","1","2.00","220.00","6.00","5.00","434.28","2017-08-21 09:31:56","2017-08-21 09:31:56"),
("37","13","4","4.00","265.00","14.00","12.00","1020.99","2017-08-21 09:31:56","2017-08-21 09:31:56"),
("38","13","5","2.00","330.00","12.00","8.00","627.26","2017-08-21 09:31:57","2017-08-21 09:31:57"),
("40","14","20","28.00","1850.00","0.00","0.00","51800.00","2017-08-23 06:33:43","2017-08-23 06:33:43"),
("41","14","21","8.00","1250.00","0.00","0.00","10000.00","2017-08-23 06:33:43","2017-08-23 06:33:43"),
("42","15","20","2.00","1850.00","0.00","0.00","3700.00","2017-08-23 06:43:44","2017-08-23 06:43:44"),
("43","15","21","3.00","1250.00","0.00","0.00","3750.00","2017-08-23 06:43:44","2017-08-23 06:43:44"),
("44","16","20","1.00","1850.00","0.00","0.00","1850.00","2017-08-23 06:51:21","2017-08-23 06:51:21"),
("45","16","1","1.00","220.00","6.00","5.00","217.14","2017-08-23 06:51:21","2017-08-23 06:51:21"),
("46","17","20","1.00","1850.00","0.00","0.00","1850.00","2017-08-23 06:53:20","2017-08-23 06:53:20"),
("47","17","21","3.00","1250.00","0.00","0.00","3750.00","2017-08-23 06:53:20","2017-08-23 06:53:20"),
("48","18","21","1.00","1250.00","0.00","0.00","1250.00","2017-08-23 08:55:33","2017-08-23 08:55:33"),
("49","18","22","2.00","1680.00","0.00","0.00","3360.00","2017-08-23 08:55:33","2017-08-23 08:55:33"),
("50","18","1","1.00","220.00","6.00","5.00","217.14","2017-08-23 08:55:33","2017-08-23 08:55:33"),
("51","18","5","1.00","330.00","12.00","8.00","313.63","2017-08-23 08:55:33","2017-08-23 08:55:33"),
("52","18","6","1.00","335.00","12.00","7.00","315.44","2017-08-23 08:55:33","2017-08-23 08:55:33"),
("53","19","20","1.00","1850.00","0.00","0.00","1850.00","2017-08-25 04:37:11","2017-08-25 04:37:11"),
("54","19","1","1.00","220.00","6.00","5.00","217.14","2017-08-25 04:37:11","2017-08-25 04:37:11"),
("55","19","2","1.00","200.00","14.00","4.00","178.88","2017-08-25 04:37:11","2017-08-25 04:37:11"),
("56","20","1","3.00","220.00","6.00","5.00","651.42","2017-08-26 05:53:32","2017-08-26 05:53:32"),
("57","20","2","3.00","200.00","14.00","4.00","536.64","2017-08-26 05:53:32","2017-08-26 05:53:32"),
("58","20","20","2.00","1850.00","0.00","0.00","3700.00","2017-08-26 05:53:32","2017-08-26 05:53:32"),
("59","20","22","2.00","1680.00","0.00","0.00","3360.00","2017-08-26 05:53:32","2017-08-26 05:53:32"),
("60","21","20","3.00","1850.00","0.00","0.00","5550.00","2017-08-26 05:56:35","2017-08-26 05:56:35"),
("61","21","22","1.00","1680.00","0.00","0.00","1680.00","2017-08-26 05:56:35","2017-08-26 05:56:35"),
("62","21","3","4.00","250.00","12.00","8.00","950.40","2017-08-26 05:56:35","2017-08-26 05:56:35"),
("63","21","5","2.00","330.00","12.00","8.00","627.26","2017-08-26 05:56:36","2017-08-26 05:56:36");




CREATE TABLE `stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unit_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stocks_product_id_index` (`product_id`),
  CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO stocks VALUES
("1","1","17","110.00","2017-06-20 05:16:51","2017-08-26 05:53:32"),
("2","2","45","120.00","2017-06-20 05:16:51","2017-08-26 05:53:32"),
("3","3","36","120.00","2017-06-20 05:16:51","2017-08-26 05:56:36"),
("4","4","75","140.00","2017-06-20 05:16:51","2017-08-22 08:48:06"),
("5","5","60","140.00","2017-06-20 05:16:51","2017-08-26 05:56:36"),
("6","6","51","130.00","2017-06-20 05:16:51","2017-08-23 08:55:33");




CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suppliers_email_unique` (`email`),
  UNIQUE KEY `suppliers_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO suppliers VALUES
("1","Ayaman Enter Price","Ayman Ali","ayman@gmail.com","01828383683","1497933446.jpg","2017-06-20 04:37:26","2017-06-20 04:37:26"),
("2","Food BD","Sayer Ali","sayer@gmail.com","01883073934","1497933492.jpg","2017-06-20 04:38:13","2017-06-20 04:38:13");




CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outlet_id` int(11) unsigned DEFAULT NULL,
  `counter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `outlets_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `outlets_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users VALUES
("1","Mostafizur Rahman","admin@admin.com","$2y$10$lJCBJ9hOpIJ3NpexlY7v0ue8TfJaC5R.cJ7QW7M58ZPOnk6u2I6i.","i2wyqPxUWjX5yqECPLHbQOzilPBUITYCcNXivbbRSp7NG65TY1QhxEajDrqg","1","One","2017-06-19 06:29:55","2017-08-26 05:33:23"),
("2","Samrat Alam","samrat@gmail.com","$2y$10$siI69s87KijmGlpAMmms1ejVYmp0LLVV9.uBcgsMOyo57U/PTQvAe","qIp8uMIFCQkp9pTtFuhbgo1FcWlBeohAkFODgsOb40O4hsMMJhVcJPomJTkS","1","One","2017-06-19 06:29:56","2017-08-26 05:33:09"),
("3","Ariful Islam","user@user.com","$2y$10$P85Ju1rvBb/K4jvm/1HQoOne1MHDxGRRuC66alalGHZ.GCGTfuvLe","OEE9uQy72lpZnvkE3xsYdKUvAZSvIQ816liluRSxPz9D9LB3T9ZI1Nz6hBX1","3","Three","2017-08-03 09:47:32","2017-08-26 05:01:18"),
("4","Mohidul Rahman","user1@user.com","$2y$10$RiX2cFvnFYAvcBgkgCZdO.hhwtu.lXPQmIYWmXOnAziYchcz60.pu","aGfvyxpTeGRKZ1WewmlrZgactsEi0qsgMqVyNsOdDebhp7yr0uAFDbpI0o48","5","Seven","2017-08-03 09:48:42","2017-08-26 05:00:57"),
("5","Candy Offer","candy@outlet.com","$2y$10$pA.lrRMjViGgYtBh76K9aOt6T1ZyK8aGmX45vaSq/1.VY6PSnYgqa","DjsgjiQ0Kui1t2nCpuOMwMHO369zPGKpYPblhRd49kATMutxg3SkLLg3Vlmd","4","Four","2017-08-24 09:07:03","2017-08-26 05:00:39"),
("6","Rayhan Uddin","raj@outlet.com","$2y$10$fapw69kq0yJL/0xbitOYPONc4x.M.POOF/WIHrMzMpH.EZK8OxZqK","","2","Two","2017-08-24 09:36:05","2017-08-26 05:00:14"),
("7","Md. Morshed Kha Rana","ra.ranacse@gmail.com","$2y$10$MT7iU9aJ5lX6ddGOJ27uVOeci66B.GrS3r75NmnoFAvG9BaTCUvcy","rpoXFZOdzveXMFTbskcnZeLiUzAGFkAOVDZWPj9GHDJMgB4gP5pXTt3Sa6Go","1","One","2017-08-26 03:08:46","2017-09-11 05:57:54");


