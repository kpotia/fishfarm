-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 août 2020 à 21:32
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fishfarm`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `firstname`, `surname`, `email`, `contact`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cedric', 'ametepe', 'cedmtp@mail.com', '+23380080808', 'Accra ghana', '2020-08-27 15:40:17', '2020-08-27 15:40:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fish`
--

CREATE TABLE `fish` (
  `id` int(10) NOT NULL,
  `name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fish`
--

INSERT INTO `fish` (`id`, `name`, `description`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Just a fish', 'foigdgc', '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'Just another fish', 'just another fish    description', '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'Salmon', 'salmon descrition', '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `fish_tank`
--

CREATE TABLE `fish_tank` (
  `tk_id` int(11) NOT NULL,
  `fish_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fish_tank`
--

INSERT INTO `fish_tank` (`tk_id`, `fish_id`, `qty`, `birthdate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 14, '2020-07-18', '2020-08-19 00:00:00', '2020-08-19 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 45, '2020-08-18', '2020-08-19 00:00:00', '2020-08-19 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `fd_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`fd_id`, `name`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'grains', 0, '2020-08-19 16:03:47', '2020-08-19 16:03:47', '2020-08-19 11:11:06'),
(2, 'grains', 0, '2020-08-19 16:05:55', '2020-08-19 16:05:55', '2020-08-19 11:11:03'),
(3, 'grains', 644, '2020-08-19 16:07:01', '2020-08-19 16:07:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `food_history`
--

CREATE TABLE `food_history` (
  `fh_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `tank_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(5,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Accra', 400.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'fish 1', 40.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'fish 3', 300.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `setting`
--

CREATE TABLE `setting` (
  `lang` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `role` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `surname`, `role`, `email`, `contact`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'patrick', 'ametepe', 'feeder', 'patrick@mail.com', '+23380080808', 'Accra ghana ', '2020-08-27 15:16:41', '2020-08-27 15:16:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `description` text NOT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `description`, `contact`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ECG Power Supplier', 'contact@ecg.gh', 'electricity supplier', '+23380080808', 'Accra', '2020-08-24 12:56:17', '2020-08-24 12:56:17', '2020-08-24 07:57:56');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'patrick', 'Ametepe', 'patmtp@mail.com', '$2y$10$GgKYao5jncfv4yIuzXdXquRrQviGozFD3Qy/p6apOur5Wt6FEdoKi', '2020-08-11 09:42:58', '2020-08-11 09:42:58'),
(2, 'Admin', 'Super', 'admin@gmail.com', '$2y$10$.spE3gDUFxoplc03YFP7ReU20PFPYliLt8j8sIC7ZY3eiixgqmPjK', '2020-08-27 17:09:54', '2020-08-27 17:09:54');

-- --------------------------------------------------------

--
-- Structure de la table `vaccine`
--

CREATE TABLE `vaccine` (
  `vac_id` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vaccine_history`
--

CREATE TABLE `vaccine_history` (
  `vh_id` int(11) NOT NULL,
  `vacc_id` int(11) NOT NULL,
  `tank_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fishname` (`name`);

--
-- Index pour la table `fish_tank`
--
ALTER TABLE `fish_tank`
  ADD PRIMARY KEY (`tk_id`);

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fd_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vac_id`);

--
-- Index pour la table `vaccine_history`
--
ALTER TABLE `vaccine_history`
  ADD PRIMARY KEY (`vh_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `fish`
--
ALTER TABLE `fish`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fish_tank`
--
ALTER TABLE `fish_tank`
  MODIFY `tk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vaccine_history`
--
ALTER TABLE `vaccine_history`
  MODIFY `vh_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
