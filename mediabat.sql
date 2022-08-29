-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 août 2022 à 11:14
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediabat`
--

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

CREATE TABLE `publications` (
  `id_publication` int(11) NOT NULL,
  `content_publication` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fname_user` varchar(100) NOT NULL,
  `lname_user` varchar(100) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `birthdate_user` date NOT NULL,
  `registration_date_user` datetime NOT NULL DEFAULT current_timestamp(),
  `reset_code` int(11) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  `city_user` varchar(255) NOT NULL,
  `zipcode_user` int(11) NOT NULL,
  `job_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `fname_user`, `lname_user`, `email_user`, `password_user`, `birthdate_user`, `registration_date_user`, `reset_code`, `profile_img`, `status_user`, `city_user`, `zipcode_user`, `job_user`) VALUES
(15, 'Luigi', 'Gandemer', 'luigigandemer6@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$elRXQldsZUNPeC56N3RBZA$M+TaanDindHqO55k3BOME5aFT4hECgG2ugz7kwVc2yM', '2002-08-20', '2022-08-08 19:11:27', 0, '', 'admin', 'Montpellier', 34070, 'admin'),
(16, 'standardUser', 'standardUser', 'standardUser@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Zzc1eW9Zbko2bmsvSER5Ug$AR4iFp1RnPsh83tRf02E2Szj5p9j9gReYSGylMV7jek', '1996-02-12', '2022-08-08 19:12:53', 0, '', 'standard', 'Brumath', 67170, 'null'),
(17, 'proBTP', 'proBTP', 'proBTP@proBTP.btp', '$argon2i$v=19$m=65536,t=4,p=1$NGMyNy9qTlFDMGFuWHBRMg$f4dFQ8IeGvEoryUa/uE/u5hnbaNfBfO0TJbna4cjNzg', '1985-11-25', '2022-08-08 19:13:45', 0, '', 'proBTP', 'Marseille', 13013, 'architecte'),
(18, 'admin', 'admin', 'admin@admin.fr', '$argon2i$v=19$m=65536,t=4,p=1$Mk1jWlFJRVM4eVB3UmdCWQ$sqWaKIq7FPSZVfm5jGrGdkpirdaTcnUWsUjsiWc2Yho', '0000-00-00', '2022-08-29 11:14:34', 0, '', '34000', 'standard', 1111, 'null');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `publications`
--
ALTER TABLE `publications`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
