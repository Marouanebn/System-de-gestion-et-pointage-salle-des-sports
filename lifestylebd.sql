-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 06 mars 2024 à 21:43
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lifestylebd`
--

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

CREATE TABLE `coach` (
  `coach_id` int NOT NULL,
  `Nom_complet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Cin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`coach_id`, `Nom_complet`, `Cin`, `Tel`) VALUES
(1, 'hamid', 'ndajdnaj', '044444'),
(2, 'samir', 'nbiadadkazkdza', '0606645545'),
(3, 'marouane benmhend', 'nbiadadkazkdza', '0333'),
(4, 'habbat abdilah', 'bk544', '0752215444');

-- --------------------------------------------------------

--
-- Structure de la table `coaching_seance`
--

CREATE TABLE `coaching_seance` (
  `id` int NOT NULL,
  `member_id` int DEFAULT NULL,
  `coach_id` int DEFAULT NULL,
  `num_seance` int DEFAULT NULL,
  `date_coach` date DEFAULT NULL,
  `montant` int DEFAULT NULL,
  `valid_seance` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coaching_seance`
--

INSERT INTO `coaching_seance` (`id`, `member_id`, `coach_id`, `num_seance`, `date_coach`, `montant`, `valid_seance`) VALUES
(21, 2, 1, 5, '2024-02-28', 1000, 5),
(22, 2, 2, 3, '2024-03-01', 300, 3),
(23, 1, 4, 5, '2024-03-01', 1000, 5);

-- --------------------------------------------------------

--
-- Structure de la table `history_log`
--

CREATE TABLE `history_log` (
  `id` int NOT NULL,
  `action_type` varchar(50) DEFAULT NULL,
  `action_detail` varchar(255) DEFAULT NULL,
  `action_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `history_log`
--

INSERT INTO `history_log` (`id`, `action_type`, `action_detail`, `action_time`) VALUES
(1, 'ajouter', 'ajouter marouane benmhend', '2024-03-01 00:19:01'),
(2, 'ajouter', 'ajouter ilyass hilanne', '2024-03-01 00:20:20'),
(3, 'ajouter', 'ajouter latifa ierochen', '2024-03-01 00:21:11'),
(4, 'ajouter', 'ajouter fati montassif', '2024-03-01 00:21:57'),
(5, 'ajouter', 'ajouter yassin benmhend', '2024-03-01 00:22:58'),
(6, 'modifer', 'modifier marouane benmhend', '2024-03-01 00:23:20'),
(7, 'modifer', 'modifier ilyass hilanne', '2024-03-01 00:23:29'),
(8, 'ajouter', 'vous avez ajouter coach habbat abdilah', '2024-03-01 00:23:47'),
(9, 'ajouter', 'vous avez ajouter une seance de marouane benmhend avec coach habbat abdilah', '2024-03-01 00:23:58'),
(10, 'ajouter', 'ajouter hamza assaid', '2024-03-01 00:41:51'),
(11, 'ajouter', 'ajouter badr belara^ù', '2024-03-01 00:42:34'),
(12, 'payment', 'effectuer un payment pour fati montassif', '2024-03-01 13:33:25'),
(13, 'payment', 'effectuer un payment pour latifa ierochen', '2024-03-04 12:08:02'),
(14, 'payment', 'effectuer un payment pour latifa ierochen', '2024-03-04 12:08:11'),
(15, 'payment', 'effectuer un payment pour latifa ierochen', '2024-03-04 12:08:20');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(2, 'marwan', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `Member_id` int NOT NULL,
  `Nom_complet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Cin` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Date_naissance` date DEFAULT NULL,
  `Tel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Genre` enum('homme','femme') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`Member_id`, `Nom_complet`, `Cin`, `Adress`, `Date_naissance`, `Tel`, `Genre`) VALUES
(1, 'marouane benmhend', 'bk41114444', 'marwanbenmhand2@gmail.com', '2000-03-02', '06225125144', 'homme'),
(2, 'ilyass hilanne', 'bk5554444', 'mp@gmail.comx', '2004-03-01', '0755221554', 'homme'),
(3, 'latifa ierochen', 'xa5555', 'mp@gmail.com', '1995-10-18', '0625163255', 'femme'),
(4, 'fati montassif', 'ch5554444', 'mp@gmail.comx', '1995-03-01', '0622512', 'homme'),
(5, 'yassin benmhend', 'bp55555544', 'asasasasasas@gmail.com', '1984-08-10', '062021122', 'homme'),
(6, 'hamza assaid', 'bp55555544', 'asasasasasas@gmail.com', '2002-07-11', '06251555', 'homme'),
(7, 'badr belara^ù', 'bkk5555', 'dakzdadakda@gmail.com', '2000-06-01', '0621221555', 'homme');

-- --------------------------------------------------------

--
-- Structure de la table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int NOT NULL,
  `status` enum('payée','non payée') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'payée',
  `Montant` decimal(10,2) NOT NULL DEFAULT '200.00',
  `Date_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_date` date DEFAULT NULL,
  `Subscribtion_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `payment`
--

INSERT INTO `payment` (`Payment_id`, `status`, `Montant`, `Date_payment`, `expired_date`, `Subscribtion_id`) VALUES
(1, 'payée', 200.00, '2024-02-29 23:00:00', '2024-04-01', 1),
(2, 'payée', 200.00, '2024-02-28 23:00:00', '2024-03-29', 2),
(3, 'payée', 200.00, '2024-03-03 23:00:00', '2024-01-05', 3),
(4, 'payée', 200.00, '2024-02-29 23:00:00', '2023-12-02', 4),
(5, 'payée', 200.00, '2024-02-29 23:00:00', '2024-04-01', 5),
(6, 'payée', 200.00, '2024-02-29 23:00:00', '2024-04-01', 6),
(7, 'payée', 200.00, '2024-02-29 23:00:00', '2024-04-01', 7);

-- --------------------------------------------------------

--
-- Structure de la table `qrcode`
--

CREATE TABLE `qrcode` (
  `id` int NOT NULL,
  `qrcode_info` varchar(200) DEFAULT NULL,
  `qrcode_image` varchar(200) DEFAULT NULL,
  `id_payment` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qrcode`
--

INSERT INTO `qrcode` (`id`, `qrcode_info`, `qrcode_image`, `id_payment`) VALUES
(1, 'samih', '1708456502.png', 73),
(2, 'samih', '1708456552.png', 74),
(3, 'samih', '1708456609.png', 75),
(4, 'samih', '1708456724.png', 76),
(5, 'marouane', '1708456966marouane.png', 77),
(6, 'yassine', '1708457118yassine.png', 78),
(7, 'fati', '1708457167fati.png', 79),
(8, 'hala<br>2023-03-22,2023-03-22', '1709125153hala.png', 80),
(9, 'Nom adheron hala<br> inscriver le 2023-02-22', '1708457450hala.png', 81),
(10, 'mami<br>2023-03-22,2023-03-22', '1709124362mami.png', 82),
(11, 'Nom adheron popo\n inscriver le 2023-02-22', '1708457562popo.png', 83),
(12, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708479890marouane benmhend.png', 84),
(13, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708479979marouane benmhend.png', 85),
(14, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708480103marouane benmhend.png', 86),
(15, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708480187marouane benmhend.png', 87),
(16, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708480378marouane benmhend.png', 88),
(17, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708480430marouane benmhend.png', 89),
(18, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708480787marouane benmhend.png', 90),
(19, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708480788marouane benmhend.png', 91),
(20, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708481108marouane benmhend.png', 92),
(21, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708481555marouane benmhend.png', 93),
(22, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708481736marouane benmhend.png', 94),
(23, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708481851marouane benmhend.png', 95),
(24, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708482058marouane benmhend.png', 96),
(25, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708482089marouane benmhend.png', 97),
(26, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708483411marouane benmhend.png', 98),
(27, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708483663marouane benmhend.png', 99),
(28, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708483770marouane benmhend.png', 100),
(29, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708483819marouane benmhend.png', 101),
(30, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708483974marouane benmhend.png', 102),
(31, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708484101marouane benmhend.png', 103),
(32, '2023-03-22,2023-03-22', '1708684589marouane benmhend.png', 104),
(33, '2023-03-22,2023-03-22', '1708613156marouane benmhend.png', 105),
(34, '2023-03-22,2023-03-22', '1708613178marouane benmhend.png', 106),
(35, 'fati<br>2023-03-22,2023-03-22', '1709124346fati.png', 107),
(36, 'Nom adheron marouane benmhend\ninscriver le 2023-02-22', '1708484874marouane benmhend.png', 108),
(37, '2023-03-22,2023-03-22', '1708611580marouane benmhend.png', 109),
(38, 'Nom adheron ilyass hilanne\ninscriver le 2024-02-21', '1708522082ilyass hilanne.png', 110),
(39, 'Nom adheron saad\ninscriver le 2024-02-23', '1708684566saad.png', 111),
(40, 'saad<br>2024-02-26', '1708947183saad.png', 112),
(41, 'saad<br>2024-02-26', '1708947335saad.png', 113),
(42, 'saad<br>2024-02-28', '1709127526saad.png', 1),
(43, 'marouane benmhend<br>2023-12-30,2023-12-30', '1709127577marouane benmhend.png', 2),
(44, 'Nom Complet : latifa ierochenVotre abonnement expire Le :2024-01-05,2024-01-05', '1709554090latifa ierochen.png', 3),
(45, 'Nom Complet : fati montassifVotre abonnement expire Le :2023-12-02,2023-12-02', '1709300002fati montassif.png', 4),
(46, 'Nom complet : marouane benmhendVotre abonnement expire Le :2024-03-15', '1709155344marouane benmhend.png', 5),
(47, 'Nom Complet : saadVotre abonnement expire Le :2024-02-11,2024-02-11', '1709162918saad.png', 6),
(48, 'Nom complet : saadVotre abonnement expire Le :2024-04-01', '1709251694saad.png', 7),
(49, 'Nom complet : saadVotre abonnement expire Le :2024-04-01', '1709251694saad.png', 8),
(50, 'Nom complet : saadVotre abonnement expire Le :2024-04-01', '1709251830saad.png', 9),
(51, 'Nom Complet : saadVotre abonnement expire Le :2024-02-04,2024-02-04', '1709251877saad.png', 10),
(52, 'Nom complet : marouane benmhendVotre abonnement expire Le :2024-04-01', '1709252336marouane benmhend.png', 1),
(53, 'Nom complet : ilyass hilanneVotre abonnement expire Le :2024-03-29', '1709252415ilyass hilanne.png', 2),
(54, 'Nom Complet : latifa ierochenVotre abonnement expire Le :2024-01-05,2024-01-05', '1709554090latifa ierochen.png', 3),
(55, 'Nom Complet : fati montassifVotre abonnement expire Le :2023-12-02,2023-12-02', '1709300002fati montassif.png', 4),
(56, 'Nom complet : yassin benmhendVotre abonnement expire Le :2024-04-01', '1709252573yassin benmhend.png', 5),
(57, 'Nom complet : hamza assaidVotre abonnement expire Le :2024-04-01', '1709253706hamza assaid.png', 6),
(58, 'Nom complet : badr belara^ùVotre abonnement expire Le :2024-04-01', '1709253748badr belara^ù.png', 7);

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int NOT NULL,
  `Date_inscription` date NOT NULL,
  `Durée_mois` enum('1 mois','3 mois') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Member_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `Date_inscription`, `Durée_mois`, `Member_id`) VALUES
(1, '2024-03-01', '1 mois', 1),
(2, '2024-02-29', '1 mois', 2),
(3, '2023-12-05', '1 mois', 3),
(4, '2023-11-02', '1 mois', 4),
(5, '2024-03-01', '1 mois', 5),
(6, '2024-03-01', '1 mois', 6),
(7, '2024-03-01', '1 mois', 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coach_id`);

--
-- Index pour la table `coaching_seance`
--
ALTER TABLE `coaching_seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coaching_id` (`coach_id`),
  ADD KEY `fk_coachmember_id` (`member_id`);

--
-- Index pour la table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_id`);

--
-- Index pour la table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `fk_subscibtion_id` (`Subscribtion_id`);

--
-- Index pour la table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_id` (`id_payment`);

--
-- Index pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `fk_member_id` (`Member_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coach`
--
ALTER TABLE `coach`
  MODIFY `coach_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `coaching_seance`
--
ALTER TABLE `coaching_seance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `Member_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `coaching_seance`
--
ALTER TABLE `coaching_seance`
  ADD CONSTRAINT `fk_coaching_id` FOREIGN KEY (`coach_id`) REFERENCES `coach` (`coach_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_coachmember_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`Member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_subscibtion_id` FOREIGN KEY (`Subscribtion_id`) REFERENCES `subscription` (`subscription_id`);

--
-- Contraintes pour la table `qrcode`
--
ALTER TABLE `qrcode`
  ADD CONSTRAINT `fk_payment_id` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`Payment_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `momo` FOREIGN KEY (`Member_id`) REFERENCES `member` (`Member_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
