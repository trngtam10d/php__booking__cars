-- Administartor
CREATE TABLE `la_admins` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
 `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `phone` int(11) DEFAULT NULL,
 `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

INSERT INTO `la_admins` (`id`, `name`, `email`, `password`, `photo`, `phone`, `gender`, `address`, `status`, `created_at`, `updated_at`)
VALUES (NULL, 'Tam', 'admin@gmail.com', '$2y$10$IPa861HuWf3P/eRSuMCwA.kq9MkWKteZ.dkRmKtOO.XtpnHl3KZ9y', NULL, NULL, NULL, NULL, 'active', NULL, NULL)

-- Ads for mobile devices
CREATE TABLE `la_ads` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
 `upload` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `type` enum('pc','mobile') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pc',
 `status` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci

