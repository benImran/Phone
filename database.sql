-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 03 Octobre 2017 à 21:54
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ecommerce_phone`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `brand`
--

INSERT INTO `brand` (`id`, `name`, `updated_at`) VALUES
(25, 'Apple', NULL),
(26, 'Samsung', NULL),
(27, 'Sony', NULL),
(28, 'LG', NULL),
(29, 'Wiko', NULL),
(30, 'Huawei', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `brand_id`) VALUES
(9, 'IPhone', 25),
(10, 'IPad', 25),
(11, 'IWatch', 25),
(12, 'IPod', 25),
(13, 'Accesoires', 25);

-- --------------------------------------------------------

--
-- Structure de la table `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `payment_instruction_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `attention_required` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `credited_amount` decimal(10,5) NOT NULL,
  `crediting_amount` decimal(10,5) NOT NULL,
  `reversing_amount` decimal(10,5) NOT NULL,
  `state` smallint(6) NOT NULL,
  `target_amount` decimal(10,5) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `financial_transactions`
--

CREATE TABLE `financial_transactions` (
  `id` int(11) NOT NULL,
  `credit_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `extended_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:extended_payment_data)',
  `processed_amount` decimal(10,5) NOT NULL,
  `reason_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requested_amount` decimal(10,5) NOT NULL,
  `response_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tracking_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `footer`
--

INSERT INTO `footer` (`id`, `email`, `phone`, `visible`) VALUES
(1, 'bsaidmedjahed@gmail.com', '0631285558', 1),
(2, 'vvvvjvkh;vj', '26457890', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `genre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `code_postale` int(11) NOT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `date_de_naissance` datetime NOT NULL,
  `complement_adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `genre`, `nom`, `prenom`, `adresse`, `confirmation_email`, `code_postale`, `ville`, `pays`, `date_de_naissance`, `complement_adresse`, `facebook_id`, `google_id`) VALUES
(1, 'benben', 'benben', 'bsaidmedjahed@gmail.com', 'bsaidmedjahed@gmail.com', 1, NULL, '$2y$13$BOoRVaJnAkGBTl2QqfqPNODDE/WJpowBNXN9iEYlfP8d1fwfiic96', '2017-10-01 14:26:08', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 'Monsieur', 'Said-Medjahed', 'Benchaa', '13 rue Olympe de Gouges', 'bsaidmedjahed@gmail.com', 94400, 'Vitry-sur-Seine', 'France', '1901-03-01 00:00:00', NULL, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20170826130426'),
('20170826131442'),
('20170826131548'),
('20170829154357'),
('20170829154634'),
('20170829214640'),
('20170829215209'),
('20170903202410'),
('20170903203950'),
('20170903204304'),
('20170903205528'),
('20170918115702'),
('20170919210911'),
('20170919211140'),
('20170920124545'),
('20170920125339'),
('20170920231957'),
('20170920232336'),
('20170920232341'),
('20170920232347'),
('20170921095742'),
('20170921101741'),
('20170922213255'),
('20170924120021'),
('20170924125332'),
('20170924130934'),
('20170924140129'),
('20170924213944'),
('20170925092321'),
('20170925141714'),
('20170925145521'),
('20170925145535'),
('20170925154301'),
('20170925155608'),
('20170925160307'),
('20170925170059'),
('20170925193124'),
('20170926124735'),
('20170926130527'),
('20170926131406'),
('20170926131637'),
('20170926132306'),
('20170926133558'),
('20170926134518');

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `model`
--

INSERT INTO `model` (`id`, `name`, `category_id`) VALUES
(10, 'IPhone 3GS', 9),
(12, 'IPhone 4', 9),
(13, 'IPhone 4S', 9),
(14, 'IPhone 5', 9),
(15, 'IPhone 5C', 9),
(16, 'IPhone 5S', 9),
(17, 'IPhone SE', 9),
(18, 'IPhone 6', 9),
(19, 'IPhone 6 Plus', 9),
(20, 'IPhone 6S', 9),
(21, 'IPhone 6S Plus', 9),
(22, 'IPhone 7', 9),
(23, 'Iphone 7 Plus', 9),
(24, 'IPhone 8', 9),
(25, 'IPhone 8 Plus', 9),
(26, 'IPhone X', 9);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,5) NOT NULL,
  `payment_instruction_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_instruction_id` int(11) NOT NULL,
  `approved_amount` decimal(10,5) NOT NULL,
  `approving_amount` decimal(10,5) NOT NULL,
  `credited_amount` decimal(10,5) NOT NULL,
  `crediting_amount` decimal(10,5) NOT NULL,
  `deposited_amount` decimal(10,5) NOT NULL,
  `depositing_amount` decimal(10,5) NOT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `reversing_approved_amount` decimal(10,5) NOT NULL,
  `reversing_credited_amount` decimal(10,5) NOT NULL,
  `reversing_deposited_amount` decimal(10,5) NOT NULL,
  `state` smallint(6) NOT NULL,
  `target_amount` decimal(10,5) NOT NULL,
  `attention_required` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payment_instructions`
--

CREATE TABLE `payment_instructions` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,5) NOT NULL,
  `approved_amount` decimal(10,5) NOT NULL,
  `approving_amount` decimal(10,5) NOT NULL,
  `created_at` datetime NOT NULL,
  `credited_amount` decimal(10,5) NOT NULL,
  `crediting_amount` decimal(10,5) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `deposited_amount` decimal(10,5) NOT NULL,
  `depositing_amount` decimal(10,5) NOT NULL,
  `extended_data` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:extended_payment_data)',
  `payment_system_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reversing_approved_amount` decimal(10,5) NOT NULL,
  `reversing_credited_amount` decimal(10,5) NOT NULL,
  `reversing_deposited_amount` decimal(10,5) NOT NULL,
  `state` smallint(6) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `reference` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `rate` double NOT NULL,
  `stock` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `youtube_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `models_id` int(11) DEFAULT NULL,
  `title_video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `title`, `reference`, `image`, `abstract`, `rate`, `stock`, `detail`, `visible`, `updated_at`, `slug`, `created_at`, `youtube_id`, `type_id`, `models_id`, `title_video`, `brand_id`) VALUES
(9, 'Écran complet avec bouton et caméra avant pour LCD d\'IPhone 3GS', 3, 'lcd-iphone-3GS-blanc.jpg', 'Écran complet avec bouton et cam...', 12, '1', '<p>&Eacute;cran complet avec bouton home et cam&eacute;ra avant pour LCD d&#39;IPhone 3GS Blanc.</p>\r\n\r\n<p>Plus besoin d&#39;acheter un bouton home ou une cam&eacute;ra avant tout est compris dans ce mod&egrave;le.</p>', 1, '2017-10-03 15:49:00', 'LOL', '2017-09-28 00:29:33', 'AVWCQGBKMeg', 2, 10, 'RÉPAREZ VOTRE ÉCRAN LCD IPHONE 3GS EN SUIVANT CETTE VIDÉO', 25),
(12, 'Nappe bouton home pour IPhone 3GS Noir', 2, 'nappe-bouton-home-pour-iphone-3gs-flex-.jpg', 'Bouton home pour IPhone 3GS...', 3, '30', '<p>Nappe pour bouton home pour IPhone 3GS Noir complet.</p>', 1, '2017-10-03 15:37:00', 'bouton-home-pour-iphone-3gs-noir', '2017-10-02 21:53:46', 'VZl4UcAQrdg', 2, 10, 'RÉPAREZ VOTRE BOUTON HOME 3GS EN SUIVANT CETTE VIDÉO', 25),
(13, 'Écran complet avec bouton et caméra avant pour LCD d\'IPhone 3GS', 1, 'ecran-original-pour-iphone-3gs-noir-vitre-tactile-ecran-lcd.jpg', 'Écran complet avec bouton et cam...', 10, '20', '<p>&Eacute;cran complet avec bouton home et cam&eacute;ra avant pour LCD d&#39;IPhone 3GS Noir.</p>\r\n\r\n<p>Plus besoin d&#39;acheter un bouton home ou une cam&eacute;ra avant tout est compris dans ce mod&egrave;le.</p>', 1, '2017-10-03 15:45:00', 'ecran-complet-avec-bouton-et-camera-avant-pour-lcd-diphone-3gs', '2017-10-03 15:45:47', 'AVWCQGBKMeg', 2, 10, 'RÉPAREZ VOTRE ÉCRAN LCD IPHONE 3GS EN SUIVANT CETTE VIDÉO', 25),
(14, 'Batterie IPhone 3GS', 4, 'batterie-pour-apple-iphone-3gs.jpg', 'Batterie d\'origine pour...', 6.99, '20', '<p>Batterie pour IPhone 3GS d&#39;origine.</p>', 1, '2017-10-03 17:04:00', 'batterie-iphone-3gs', '2017-10-03 17:04:05', 'hpa0C7HPIzc', 2, 10, 'CHANGER VOTRE BATTERIE POUR IPHONE 3GS EN SUIVANT CETTE VIDÉO', 25);

-- --------------------------------------------------------

--
-- Structure de la table `product_product`
--

CREATE TABLE `product_product` (
  `product_source` int(11) NOT NULL,
  `product_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product_product`
--

INSERT INTO `product_product` (`product_source`, `product_target`) VALUES
(9, 9),
(9, 12),
(9, 13),
(9, 14),
(14, 9),
(14, 12),
(14, 13),
(14, 14);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Montres'),
(2, 'Téléphones'),
(3, 'Tablettes');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `productId` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C144F5D008` (`brand_id`);

--
-- Index pour la table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4117D17E8789B572` (`payment_instruction_id`),
  ADD KEY `IDX_4117D17E4C3A3BB` (`payment_id`);

--
-- Index pour la table `financial_transactions`
--
ALTER TABLE `financial_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1353F2D9CE062FF9` (`credit_id`),
  ADD KEY `IDX_1353F2D94C3A3BB` (`payment_id`);

--
-- Index pour la table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79572D912469DE2` (`category_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEE8789B572` (`payment_instruction_id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_65D29B328789B572` (`payment_instruction_id`);

--
-- Index pour la table `payment_instructions`
--
ALTER TABLE `payment_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D34A04AD989D9B62` (`slug`),
  ADD KEY `IDX_D34A04ADC54C8C93` (`type_id`),
  ADD KEY `IDX_D34A04ADD966BF49` (`models_id`),
  ADD KEY `IDX_D34A04AD44F5D008` (`brand_id`);

--
-- Index pour la table `product_product`
--
ALTER TABLE `product_product`
  ADD PRIMARY KEY (`product_source`,`product_target`),
  ADD KEY `IDX_2931F1D3DF63ED7` (`product_source`),
  ADD KEY `IDX_2931F1D24136E58` (`product_target`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `financial_transactions`
--
ALTER TABLE `financial_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payment_instructions`
--
ALTER TABLE `payment_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C144F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Contraintes pour la table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `FK_4117D17E4C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4117D17E8789B572` FOREIGN KEY (`payment_instruction_id`) REFERENCES `payment_instructions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `financial_transactions`
--
ALTER TABLE `financial_transactions`
  ADD CONSTRAINT `FK_1353F2D94C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1353F2D9CE062FF9` FOREIGN KEY (`credit_id`) REFERENCES `credits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `FK_D79572D912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE8789B572` FOREIGN KEY (`payment_instruction_id`) REFERENCES `payment_instructions` (`id`);

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_65D29B328789B572` FOREIGN KEY (`payment_instruction_id`) REFERENCES `payment_instructions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_D34A04ADC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `FK_D34A04ADD966BF49` FOREIGN KEY (`models_id`) REFERENCES `model` (`id`);

--
-- Contraintes pour la table `product_product`
--
ALTER TABLE `product_product`
  ADD CONSTRAINT `FK_2931F1D24136E58` FOREIGN KEY (`product_target`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2931F1D3DF63ED7` FOREIGN KEY (`product_source`) REFERENCES `product` (`id`) ON DELETE CASCADE;