-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'normal user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`Id`, `Username`, `Email`, `Password`, `Address`, `PhoneNumber`, `user_type`) VALUES
(1, 'Gravey', 'gravey.company0@gmail.com', '$2y$10$fZtrWf1VgmV0wnbCYNr6Aea9J1RkvxrdTLUxTregq/ZEZfjXoeKRO', 'Moroccoo,Marrakech', '0708076505', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL DEFAULT 'paiement à la livraison',
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'En attente',
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `placed_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `products` text DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT 'En attente',
  `payment_method` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `panier_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `Id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT 100,
  `price` decimal(10,2) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text NOT NULL,
  `Caracteristiques` text NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_name`, `quantity`, `price`, `image`, `description`, `Caracteristiques`, `category`) VALUES
('AMD RADEON RX 6000 XT', 95, 6200.00, 'GPURX6000XT.jpg', 'CARTE GRAPHIQUE AMD RX 6600 XT - 8GO GDDR6 - HDMI/TRI DISPLAYPORT - PCI EXPRESS (AMD RADEON RX 6600 XT)', 'Désignation : ASRock Radeon RX 6600 XT Phantom Gaming D 8G OC\r\nModèle :  RX6600XT-PGD-8GO\r\nChipset Graphique : AMD\r\nFréquence du Chipset: 1875 MHz\r\nFréquence Boostée: 2310 MHz\r\nOverclockée: Oui\r\nBus: PCI Express 4.0 16x\r\nSorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle\r\n', 'GPU'),
('AMD RADEON RX 6800 XT', 75, 6700.00, 'RX6800XT.jpg', 'CARTE GRAPHIQUE AMD RX 6800 XT -16 GO GDDR6 - HDMI/TRI DISPLAYPORT - PCI EXPRESS (AMD RADEON RX 6800 XT)', 'Désignation : ASRock Radeon RX 6800 XT Phantom Gaming D 16G\r\nModèle :  RX6800XT-PGD-16GO\r\nChipset Graphique : AMD\r\nFréquence du Chipset: 1875 MHz\r\nFréquence Boostée: 2310 MHz\r\nOverclockée: Oui\r\nBus: PCI Express 4.0 16x\r\nSorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle', 'GPU'),
('AMD RADEON RX 7900 XTX', 92, 7900.00, 'gpu3.jpg', 'CARTE GRAPHIQUE AMD RX 7900 XTX - 16 GO GDDR6 - HDMI/TRI DISPLAYPORT - PCI EXPRESS (AMD RADEON RX 7900 XTX)', 'Désignation :ASUS TUF Gaming Radeon RX 7900 XTX OC Edition 16GB GDDR6\r\nModèle :  TUF-RX7900XTX-O24G-GAMING\r\nChipset Graphique : NVIDIA\r\nFréquence du Chipset: 2300MHz\r\nFréquence Boostée: 2615 MHz\r\nOverclockée: Oui\r\nBus: PCI Express 4.0 16x\r\nSorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle', 'GPU'),
('AMD rayzen 5 5600G', 0, 2700.00, 'cpu5.jpg', 'PROCESSEUR AMD 5600G - 6-CORE 12-THREADS SOCKET AM4 CACHE L3 16 MO RADEON VEGA GRAPHICS 7 7 NM TDP 65W AVEC SYSTÈME DE REFROIDISSEMENT', 'Modèle de processeur : AMD Ryzen 5\r\nFréquence CPU : 3.9 Ghz\r\nFréquence en mode Turbo : 4.4 Ghz\r\nNombre de Cœurs : 6\r\nNombre de Threads : 12\r\nTDP : 65 W\r\nContrôleur graphique intégré : Oui\r\nChipset graphique : AMD Radeon Vega 7 Craphics\r\nFréquence(s) Mémoire : DDR4 3200 Mhz', 'CPU'),
('AMD rayzen 7 9000x', 77, 4300.00, 'cpu3.jpg', 'PROCESSEUR 8-CORE 16-THREADS SOCKET AM5 AMD 3D V-CACHE 104 MO 5 NM TDP 120W - VERSION MPK SANS VENTILATEURS', 'Modèle de processeur : AMD Ryzen 7\r\nFréquence CPU : 4.2 GHz\r\nFréquence en mode Turbo : 5 Ghz\r\nNombre de Cœurs : 8\r\nNombre de Threads : 16\r\nTDP : 120 W\r\nContrôleur graphique intégré : Oui\r\nChipset graphique : AMD Radeon Graphics\r\nFréquence(s) Mémoire : DDR5 5200 Mhz', 'CPU'),
('AMD rayzen 9 9000x', 95, 5990.00, 'cpu4.jpg', 'PROCESSEUR AMD 9000X - 16-CORE 32-THREADS SOCKET AM5 GAMECACHE 80 MO 5 NM TDP 180W', 'Modèle de processeur : AMD Ryzen 9Fréquence CPU : 4.2 GhzFréquence en mode Turbo : 5.7 GhzNombre de Cœurs : 16Nombre de Threads : 32TDP : 120 WContrôleur graphique intégré : NonChipset graphique : AucunFréquence(s) Mémoire : DDR5 5200Mhz', 'CPU'),
('AOC 27″ LED – C27G2Z', 99, 2850.00, 'monitor3.png', '2560 X 1440 PIXELS - 1 MS (MPRT) - FORMAT 16/9 - DALLE IPS - 165 HZ - COMPATIBLE G-SYNC', 'Ecran VA de 27 pouces avec résolution Full HD (1920 x 1080 pixels)\r\nGamut couleurs : 126% sRGB, 94% Adobe RGB, 96% NTSC, 93% DCI-P3\r\nAffichage ultra-fluide avec une fréquence d’affichage de 165 Hz\r\nTemps de réponse : 1 ms (MPRT) / 4 ms (gris à gris)\r\nAdaptive Sync\r\nConfort oculaire optimisé avec les technologies Flicker-Free et Low-Blue Light\r\n2 connecteurs HDMI 1.4 + 1 connecteur DisplayPort 1.2 + 1 port VGA\r\nPied ergonomique : hauteur (130 mm)\r\n', 'Monitors'),
('AOC 32 LED – C32G3E', 99, 2900.00, 'monitor4.png', '1920 X 1080 PIXELS - 0.5 MS (MPRT) - FORMAT LARGE 16/9 - DALLE VA INCURVÉE - 165 HZ', 'Ecran VA de 32 pouces avec résolution Full HD (1920 x 1080 pixels)\r\nGamut couleurs : 126% sRGB, 94% Adobe RGB, 96% NTSC, 93% DCI-P3\r\nAffichage ultra-fluide avec une fréquence d’affichage de 165 Hz\r\nTemps de réponse : 1 ms (MPRT) / 4 ms (gris à gris)\r\nAdaptive Sync\r\nConfort oculaire optimisé avec les technologies Flicker-Free et Low-Blue Light\r\n2 connecteurs HDMI 1.4 + 1 connecteur DisplayPort 1.2 + 1 port VGA', 'Monitors'),
('ASUS 27″ LED – VA27EHF', 100, 2100.00, 'monitor2.png', 'ECRAN PC FULL HD 1080P - 1920 X 1080 PIXELS - 1 MS (MPRT) - FORMAT 16/9 - DALLE IPS - 100 HZ', 'Moniteur antireflet de 27″ avec résolution FHD (1920 x 1080 pixels)\r\nDalle IPS : couleurs de haute fidélité et angles de vue larges (178°)\r\nExcellente richesse des couleurs avec un contraste dynamique de 100 000 000:1 (1300:1 typique)\r\nAffichage réactif avec un temps de réponse de 1 ms (MPRT)\r\nBonnes performances de jeu : 100 Hz + Support Adaptive-Sync\r\nConnecteur HDMI\r\nMode GamePlus avec fonction viseur (choix de 4 viseurs) et timer (affichage du temps écoulé)\r\n', 'Monitors'),
('ASUS PRIME Z790-A WIFI', 96, 3800.00, 'asus_motherboard7.jpg', 'CARTE MÈRE PRIME Z790-A WIFI- 4X DDR5 - M.2 PCIE 5.0 - USB 3.2 - PCI-EXPRESS 4.0 16X - LAN 2.5 GBE - WI-FI 6E', 'Désignation: ASUS PRIME Z790-A WIFI\r\nSupport du Processeur: Intel 1200\r\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\r\nFréquence Mémoire: DDR4 4600 MHz\r\nNombre et type de slots: Aucun\r\nNorme Réseau:\r\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\r\nConnecteurs Disques:\r\n1 X M.2 PCI-E 1x + SATA 6Gb/s\r\n3 X M.2 – PCI-E 4.0 4x\r\n6 X Serial ATA 6Gb/s (SATA Revision 3)\r\nFormat: ATX', 'MOTHER_BOARD'),
('ASUS ROG STRIX G Series Modular 80Plus GOLD', 100, 1000.00, 'pow2_ASUS ROG STRIX G Series Semi-Fanless Modular 80Plus Gold.jpg', 'ALIMENTATION PC 850W MODULAIRE 80PLUS GOLD', 'Désignation : ASUS ROG STRIX G Series Modular 80Plus GOLD\r\nNorme 80 PLUS : 80 Plus GOLD\r\nModulaire : Non\r\nModularité : Non Modulaire\r\nConnecteur(s) alimentation :\r\n1 X +12V (Alimentation P8 – 2 x P4)\r\n6 X Alimentation Serial ATA\r\n1 X ATX 24 Broches\r\n3 X Molex (4 broches) Femelle\r\n2 X PCI Express 6 + 2 Broches\r\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('ASUS ROG STRIX HELIOS TEMPERED GLASS', 96, 2300.00, 'case2_ASUS ROG Strix Helios Tempered Glass.jpg', 'BOITIER MOYEN TOUR EN ALUMINIUM ET VERRE TREMPÉ', 'Châssis grand tour en aluminium anodisé\r\nTrois modes d’installation : Dynamique, Dynamique-R (Rotation) et Performance\r\nConception à flux d’air ouvert avec panneaux de verre trempé pliants\r\nPrend en charge les carte mères jusqu’au format EEB / E-ATX\r\nGrand espace pour le montage de watercooling jusqu’à 480 mm\r\nGestion des câbles facilité', 'CASE'),
('ASUS ROG STRIX Z390-E GAMING', 98, 4400.00, 'asus_motherboard6.jpg', 'CARTE MÈRE ASUS ROG STRIX Z390-E GAMING - 4X DDR5 - M.2 PCIE 5.0 - USB 3.2 - PCI-EXPRESS 5.0 16X - LAN 2.5 GBE - WI-FI 6E', 'Désignation: ASUS ROG STRIX Z390-E GAMING\r\nSupport du Processeur: Intel 1200\r\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\r\nFréquence Mémoire: DDR4 4600 MHz\r\nNombre et type de slots: Aucun\r\nNorme Réseau:\r\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\r\nConnecteurs Disques:\r\n1 X M.2 PCI-E 1x + SATA 6Gb/s\r\n3 X M.2 – PCI-E 4.0 4x\r\n6 X Serial ATA 6Gb/s (SATA Revision 3)\r\nFormat: ATX', 'MOTHER_BOARD'),
('ASUS ROG THOR 1200W 80PLUS PLATINUM', 99, 1300.00, 'pow3_ASUS ROG Thor 1200W 80PLUS Platinum.webp', 'ALIMENTATION PC 1200W MODULAIRE 80PLUS PLATINUM', 'Désignation : ASUS ROG THOR 1200W 80PLUS PLATINUM\nNorme 80 PLUS : 80 Plus PLATINUM\nModulaire : Non\nModularité : Non Modulaire\nConnecteur(s) alimentation :\n1 X +12V (Alimentation P8 – 2 x P4)\n6 X Alimentation Serial ATA\n1 X ATX 24 Broches\n3 X Molex (4 broches) Femelle\n2 X PCI Express 6 + 2 Broches\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('ASUS TUF Gaming GT501 White Edition', 100, 2000.00, 'case1_ASUS TUF Gaming GT501 White Edition.jpg', 'BOÎTIER PC GAMER - MOYEN TOUR AVEC PANNEAUX EN VERRE TREMPÉ, 2 VENTILATEURS 120 MM', 'Châssis grand tour en aluminium anodisé\r\nTrois modes d’installation : Dynamique, Dynamique-R (Rotation) et Performance\r\nConception à flux d’air ouvert avec panneaux de verre trempé pliants\r\nPrend en charge les carte mères jusqu’au format EEB / E-ATX\r\nGrand espace pour le montage de watercooling jusqu’à 480 mm\r\nGestion des câbles facilité', 'CASE'),
('COOLER MASTER MASTERBOX MB511 RGB', 97, 1900.00, 'case3_Cooler Master MASTERBOX MB511 RGB.jpg', 'BOITIER COOLER MASTER MASTERBOX MB511 RGB MOYEN TOUR EN ALUMINIUM ET VERRE TREMPÉ', 'Châssis grand tour en aluminium anodisé\r\nTrois modes d’installation : Dynamique, Dynamique-R (Rotation) et Performance\r\nConception à flux d’air ouvert avec panneaux de verre trempé pliants\r\nPrend en charge les carte mères jusqu’au format EEB / E-ATX\r\nGrand espace pour le montage de watercooling jusqu’à 480 mm\r\nGestion des câbles facilité', 'CASE'),
('COOLER MASTER V1200 PLATINUM', 100, 1400.00, 'pow1_Cooler Master V1200 Platinum.jpg', 'ALIMENTATION PC 1200W 80PLUS PLATINUM', 'Désignation : COOLER MASTER V1200 PLATINUM\r\nNorme 80 PLUS : 80 Plus PLATINUM\r\nModulaire : Non\r\nModularité : Non Modulaire\r\nConnecteur(s) alimentation :\r\n1 X +12V (Alimentation P8 – 2 x P4)\r\n6 X Alimentation Serial ATA\r\n1 X ATX 24 Broches\r\n3 X Molex (4 broches) Femelle\r\n2 X PCI Express 6 + 2 Broches\r\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('CORSAIR 275R AIRFLOW TEMPERED GLASS', 98, 1900.00, 'case5_CORSAIR 275R Airflow Tempered Glass.png', 'BOITIER CORSAIR 275R AIRFLOW TEMPERED GLASS MOYEN TOUR EN ALUMINIUM ET VERRE TREMPÉ', 'Châssis grand tour en aluminium anodisé\r\nTrois modes d’installation : Dynamique, Dynamique-R (Rotation) et Performance\r\nConception à flux d’air ouvert avec panneaux de verre trempé pliants\r\nPrend en charge les carte mères jusqu’au format EEB / E-ATX\r\nGrand espace pour le montage de watercooling jusqu’à 480 mm\r\nGestion des câbles facilité', 'CASE'),
('CORSAIR ICUE 5000T RGB PC Case BlACK', 100, 1100.00, 'case4_CORSAIR iCUE 5000T RGB PC Case Black.jpg', 'BOITIER CORSAIR ICUE 5000T RGB PC Case BlACK GRAND TOUR EN ALUMINIUM ET VERRE TREMPÉ', 'Châssis grand tour en aluminium anodisé\r\nTrois modes d’installation : Dynamique, Dynamique-R (Rotation) et Performance\r\nConception à flux d’air ouvert avec panneaux de verre trempé pliants\r\nPrend en charge les carte mères jusqu’au format EEB / E-ATX\r\nGrand espace pour le montage de watercooling jusqu’à 480 mm\r\nGestion des câbles facilité', 'CASE'),
('CORSAIR VENGEANCE RGB DDR5 32GB', 100, 700.00, 'ram1_corsair-vengeance-rgb-ddr5-32go.jpg', 'KIT RAM PC - 2 BARRETTES DE MÉMOIRE DDR5 6000MHZ - RGB', 'Modèle :CORSAIR VENGEANCE RGB DDR5 32GB\r\nType de Mémoire : DDR5\r\nFréquence Mémoire:DDR5 5600 MHz\r\nNorme Mémoire:PC5-48000 – DDR5-6000\r\nCapacité : 32 Go\r\nNombre de Barrettes : 2\r\nLED RGB : Oui\r\nLatences : CL36 (36-36-36-76)\r\nTension : 1.25 V', 'RAM'),
('CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION', 100, 730.00, 'ram3_corsair-vengeance-rgb-ddr5-6000-32gb.jpg', 'Kingston FURY Beast 32GB WHITE EDITION DDR5 5600 MHz CL40', 'Modèle :CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITIONType de Mémoire : DDR5Fréquence Mémoire:DDR5 5600 MHzNorme Mémoire:PC5-48000 – DDR5-6000Capacité : 32 GoNombre de Barrettes : 2LED RGB : OuiLatences : CL36 (36-36-36-76)Tension : 1.25 V', 'RAM'),
('EMTEC x250 POWER PLUS SSD 256GB', 100, 500.00, 'rom3_emtec-x250-power-plus-ssd-256-gb.jpg', 'SSD 256 GB 3D NAND TLC M.2 2280 NVME 1.4 - PCIE 4.0 X4', 'Désignation: EMTEC x250 POWER PLUS SSD 256GB\r\nModèle: MSI SPATIUM M371 SSD SATA\r\nInterface avec l’ordinateur: M.2 – PCI-E 3.0 4x\r\nFormat de disque: M.2\r\nCapacité: 256 GB\r\nNVMe: Oui\r\nVitesse en lecture: 1600 Mo/s\r\nVitesse en écriture: 1500 Mo/s', 'ROM'),
('EVGA 750 BP 80 BRONZE 750W', 100, 700.00, 'pow5_EVGA 750 BP, 80+ BRONZE 750W, 100-BP-0750-K1.jpg', 'ALIMENTATION PC 750W MODULAIRE 80PLUS BRONZE', 'Désignation : EVGA 750 BP 80 BRONZE 750W\r\nNorme 80 PLUS : 80 Plus Bronze\r\nModulaire : Non\r\nModularité : Non Modulaire\r\nConnecteur(s) alimentation :\r\n1 X +12V (Alimentation P8 – 2 x P4)\r\n6 X Alimentation Serial ATA\r\n1 X ATX 24 Broches\r\n3 X Molex (4 broches) Femelle\r\n2 X PCI Express 6 + 2 Broches\r\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('G Skill Trident Z Royal 32 GB (16×2) 3200 Mhz', 98, 950.00, 'ram7.png', 'KIT RAM PC DDR4 - 2 BARRETTES DE MÉMOIRE 3200MHZ - PC4-25600 - F4-3200C16D-32GTRG AVEC LED RGB', 'Modèle :F4-3200C16D-32GTRG\r\nType de Mémoire : DDR4\r\nFréquence Mémoire: DDR4 3200Mhz\r\nNorme Mémoire: PC4-25600\r\nCapacité : 32 Go\r\nNombre de Barrettes : 2\r\nLED RGB : Oui\r\nLatences : CL16(16-18-18-38)\r\nTension : 1.35 V', 'RAM'),
('G.Skill Trident Z Royal 32 Go (16×2) 3600 Mhz', 69, 920.00, 'ram6.png', 'KIT RAM PC DDR4 - 2 BARRETTES DE MÉMOIRE 3200MHZ - PC4-28800 - F4-3600C14D-32GTRSA AVEC LED RGB', 'Modèle :F4-3600C18D-32GTRS\r\nType de Mémoire : DDR4\r\nFréquence Mémoire: DDR4 3600Mhz\r\nNorme Mémoire: PC4-28800\r\nCapacité : 32 Go\r\nNombre de Barrettes : 2\r\nLED RGB : Oui\r\nLatences : CL18(18-22-22-42)\r\nTension : 1.35 V', 'RAM'),
('GAMEMAX 1050W ATX 3.0 PCIE 5.0', 100, 1000.00, 'pow4_GAMEMAX 1050W ATX 3.0 & PCIE 5.0.jpg', 'ALIMENTATION PC 1050W MODULAIRE 80PLUS GOLD', 'Désignation : GAMEMAX 1050W ATX 3.0 PCIE 5.0\r\nNorme 80 PLUS : 80 Plus PLATINUM\r\nModulaire : Non\r\nModularité : Non Modulaire\r\nConnecteur(s) alimentation :\r\n1 X +12V (Alimentation P8 – 2 x P4)\r\n6 X Alimentation Serial ATA\r\n1 X ATX 24 Broches\r\n3 X Molex (4 broches) Femelle\r\n2 X PCI Express 6 + 2 Broches\r\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('Gigabyte AORUS P1200W Platinum Modulaire', 99, 3700.00, 'pow7.png', 'ALIMENTATION PC 1200W PLATINUM 80PLUS GOLD', 'Désignation : Gigabyte AORUS P1200W Platinum Modulaire\r\nNorme 80 PLUS : 80 Plus Platinum\r\nConnecteur(s) alimentation :\r\n2 X +12V (Alimentation P8 – 2 x P4)\r\n16 X Alimentation Serial ATA\r\n1 X ATX 20 + 4 Broches\r\n1 X Disquette Molex 4 Broches Femelle\r\n6 X Molex (4 broches) Femelle\r\n10 X PCI Express 6 + 2 Broches\r\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('GIGABYTE B560M DS3H', 91, 3000.00, 'gigabyte_motherboard4.jpg', 'CARTE MÈRE GIGABYTE B560M DS3H - 4X DDR5 - M.2 PCIE 4.0 - USB 3.2 - PCI-EXPRESS 4.0 24X -\r\n', 'Désignation: GIGABYTE B560M DS3H\r\nSupport du Processeur: Intel 1200\r\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\r\nFréquence Mémoire: DDR4 4600 MHz\r\nNombre et type de slots: Aucun\r\nNorme Réseau:\r\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\r\nConnecteurs Disques:\r\n1 X M.2 PCI-E 1x + SATA 6Gb/s\r\n3 X M.2 – PCI-E 4.0 4x\r\n6 X Serial ATA 6Gb/s (SATA Revision 3)\r\nFormat: ATX', 'MOTHER_BOARD'),
('Gigabyte GP-P750GM Gold Modulaire', 100, 1300.00, 'pow6.png', 'ALIMENTATION PC 750W MODULAIRE 80PLUS GOLD', 'Désignation : Gigabyte GP-P750GM\r\nNorme 80 PLUS : 80 Plus Gold\r\nModulaire : Oui\r\nModularité : 100% Modulaire\r\nConnecteur(s) alimentation :\r\n2 X +12V (Alimentation P8 – 2 x P4)\r\n8 X Alimentation Serial ATA\r\n1 X ATX 20 + 4 Broches\r\n1 X Disquette Molex 4 Broches Femelle\r\n1 X Molex (4 broches) Femelle\r\n4 X PCI Express 6 + 2 Broches\r\nFormat Alimentation : ATX/EPS', 'POWER_SUPPLY'),
('GIGABYTE SSD M.2 256GO 2290 PCIe x2 NVMe', 97, 550.00, 'rom2_Gigabyte SSD M.2 256GO 2290 PCIe x2 NVMe.jpg', 'SSD 256GB M.2 PCIE X2 NVMe', 'Désignation: GIGABYTE SSD M.2 256GO 2290 PCIe x2 NVMe\r\nModèle: MSI SPATIUM M371 NVMe M.2\r\nInterface avec l’ordinateur: M.2 – PCI-E 3.0 4x\r\nFormat de disque: M.2\r\nCapacité: 256 GB\r\nNVMe: Oui\r\nVitesse en lecture: 2100 Mo/s\r\nVitesse en écriture: 1600 Mo/s', 'ROM'),
('GIGABYTE X670 GAMING X AX', 100, 4000.00, 'gigabyte_motherboard5.jpg', 'CARTE MÈRE X670 - ATX SOCKET AM4 AMD X670 - 4 X DDR4 - SATA 6GB/S + M.2 - USB 3.1 - PCI-EXPRESS 4.0 16X - LAN 2.5 GBE', 'Désignation:GIGABYTE X670 GAMING X AX\r\nSupport du Processeur: Intel 1200\r\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\r\nFréquence Mémoire: DDR4 4600 MHz\r\nNombre et type de slots: Aucun\r\nNorme Réseau:\r\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\r\nConnecteurs Disques:\r\n1 X M.2 PCI-E 1x + SATA 6Gb/s\r\n3 X M.2 – PCI-E 4.0 4x\r\n6 X Serial ATA 6Gb/s (SATA Revision 3)\r\nFormat: ATX', 'MOTHER_BOARD'),
('Intel Core i7-10700K (3.8 Ghz / 5.1 Ghz)', 56, 3900.00, 'i7G10th.jpg', 'PROCESSEUR INTEL 10700K - 8-CORE 16-THREADS SOCKET 1200 CACHE L3 16 MO INTEL UHD GRAPHICS 630', 'Modèle de processeur : Intel Core i7Fréquence CPU : 3.8 GhzFréquence en mode Turbo : 5.1 GhzNombre de Cœurs : 8Nombre de Threads : 16TDP : 125 WContrôleur graphique intégré : OuiChipset graphique : Intel UHD Graphics 630Fréquence(s) Mémoire : DDR4 2933 Mhz', 'CPU'),
('Intel i3 12100F', 97, 2600.00, 'cpu6.jpg', 'PROCESSEUR INTEL 12100F - QUAD-CORE (4 PERFORMANCE-CORES) 8-THREADS SOCKET 1700 CACHE L3 12 MO 0.010 MICRON', 'Processeur 4 Cores / 8 Threads\r\n4 Performance-Cores (3.4 GHz – 4.5 GHz)\r\nCache L3 12 Mo + Cache L2 5 Mo\r\nIGP : Aucun\r\nContrôleur mémoire : DDR4 / DDR5\r\nCompatible PCI-E 5.0\r\nTDP : 60W\r\nTDP max. (Turbo Power) : 89W\r\nVentilateur Intel Laminar RM1 inclus', 'CPU'),
('Intel i5 12600K', 96, 3000.00, 'CPU7.jpg', 'PROCESSEUR 10-CORE (6 PERFORMANCE-CORES + 4 EFFICIENT-CORES) 16-THREADS SOCKET 1700 CACHE L3 20 MO INTEL UHD GRAPHICS 770 0.010 MICRON', 'Modèle de processeur : Intel Core i5\r\nFréquence CPU : 3.7 Ghz\r\nFréquence en mode Turbo : 4.9 Ghz\r\nNombre de Cœurs : 10\r\nNombre de Threads : 16\r\nTDP : 125 W\r\nContrôleur graphique intégré : Oui\r\nChipset graphique : Intel UHD Graphics 770\r\nFréquence(s) Mémoire : DDR4 3200 Mhz / DDR5 4800 Mhz', 'CPU'),
('Intel i7 13900k', 67, 4600.00, 'cpu1.jpg', 'PROCESSEUR INTEL 13900K - 16-CORE (8 PERFORMANCE-CORES + 8 EFFICIENT-CORES) 24-THREADS SOCKET 1700 CACHE L3 30 MO 0.010 MICRON', 'Processeur 16 Cores / 24 Threads8 Performance-Cores (3.4 GHz – 5.4 GHz) + 8 Efficient-Cores (2.5 GHz – 4.2 GHz)Cache L3 30 Mo + Cache L2 24 MoUnlocked (coéfficient multiplicateur débloqué pour l’overclocking)IGP : AucunContrôleur mémoire : DDR4 / DDR5Compatible PCI-E 5.0TDP : 125WTDP max. (Turbo Power) : 253W', 'CPU'),
('Intel i9 12900k', 100, 5800.00, 'cpu2.jpg', 'PROCESSEUR INTEL 12900K - 16-CORE (8 PERFORMANCE-CORES + 8 EFFICIENT-CORES) 24-THREADS SOCKET 1700 CACHE L3 30 MO INTEL UHD GRAPHICS 770 0.010 MICRON', 'Modèle de processeur : Intel Core i9Fréquence CPU : 3.2 GhzFréquence en mode Turbo : 5.2 GhzNombre de Cœurs : 16Nombre de Threads : 24TDP : 125 WContrôleur graphique intégré : OuiChipset graphique : Intel UHD Graphics 770Fréquence(s) Mémoire : DDR4 3200 Mhz / DDR5 4800 Mhz', 'CPU'),
('KINGSTON FURY BEAST DDR5 16x2 GB', 100, 650.00, 'ram2_kingston-fury-beast-32gb-2x16gb-ddr5-6000-mhz.jpg', 'Kingston FURY Beast 32GB (16 x 2) DDR5 5600 MHz CL40\r\n', 'Modèle : KINGSTON FURY BEAST DDR5 16x2 GB\r\nType de Mémoire : DDR5\r\nFréquence Mémoire:DDR5 5600 MHz\r\nNorme Mémoire:PC5-48000 – DDR5-6000\r\nCapacité : 32 Go\r\nNombre de Barrettes : 2\r\nLED RGB : Oui\r\nLatences : CL36 (36-36-36-76)\r\nTension : 1.25 V', 'RAM'),
('KINGSTON kvr56u46bs6k2 DDR5 16GB', 98, 400.00, 'ram5_kingston-ddr5-ram-kvr56u46bs6k2-16-5600-mhz.jpg', 'KIT RAM PC - 2 BARRETTES DE MÉMOIRE DDR5 5200MHZ - PC5-44800 - CMK64GX5M2B5600Z40', 'Modèle :KINGSTON kvr56u46bs6k2 DDR5 16GB\r\nType de Mémoire : DDR5\r\nFréquence Mémoire:DDR5 5600 MHz\r\nNorme Mémoire:PC5-48000 – DDR5-6000\r\nCapacité : 16 Go\r\nNombre de Barrettes : 2\r\nLED RGB : Oui\r\nLatences : CL36 (36-36-36-76)\r\nTension : 1.25 V', 'RAM'),
('Lian Li O11 Dynamic Razer Edition', 99, 2600.00, 'case7.png', 'BOÎTIER PC GAMER - MOYEN TOUR EN ALUMINIUM ET VERRE TREMPÉ AVEC USB 3.1 TYPE C', 'Design sobre et élégant en aluminium et verre trempé\r\nCompatible Watercooling\r\nDisques durs : 6 x 2.5″ et 2 x 3.5″\r\n8 slots d’extension\r\n3 bandes lumineuses préinstallées (alimentation via connecteur interne USB 2.0)\r\nCompatible avec les cartes mère au format ATX, micro-ATX et E-ATX\r\nLongueur max. de Cartes Graphiques : 420 mm\r\nLongueur max. de l’alimentation PSU : 255 mm', 'CASE'),
('MARS GAMING MC-X2 ZWART', 100, 2000.00, 'case6_Mars Gaming MC-X2 Zwart.jpg', 'BOITIER MARS GAMING MC-X2 ZWART MOYEN TOUR EN ALUMINIUM ET VERRE TREMPÉ', 'Châssis grand tour en aluminium anodisé\r\nTrois modes d’installation : Dynamique, Dynamique-R (Rotation) et Performance\r\nConception à flux d’air ouvert avec panneaux de verre trempé pliants\r\nPrend en charge les carte mères jusqu’au format EEB / E-ATX\r\nGrand espace pour le montage de watercooling jusqu’à 480 mm\r\nGestion des câbles facilité', 'CASE'),
('MSI B350M GAMING PLUS', 99, 3000.00, 'msi_motherboard2.jpeg', 'CARTE MÈRE MSI B350M GAMING PLUS- 4X DDR4 - SATA 6GB/S + M.2 PCI-E NVME - USB 3.2 - 3X PCI-EXPRESS 16X - WI-FI 6 AX + 10 GBE LAN', 'Désignation: MSI B350M GAMING PLUS\r\nSupport du Processeur: Intel 1200\r\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\r\nFréquence Mémoire: DDR4 4600 MHz\r\nNombre et type de slots: Aucun\r\nNorme Réseau:\r\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\r\nConnecteurs Disques:\r\n1 X M.2 PCI-E 1x + SATA 6Gb/s\r\n3 X M.2 – PCI-E 4.0 4x\r\n6 X Serial ATA 6Gb/s (SATA Revision 3)\r\nFormat: ATX', 'MOTHER_BOARD'),
('MSI B5500 GAMING PLUS', 92, 2400.00, 'msi_motherboard1.jpeg', 'MSI B5500 GAMING PLUS - 4X DDR4 - SATA 6GB/S + M.2 PCI-E NVME - USB 3.2 - 3X PCI-EXPRESS 16X - 2.5 GBE LAN', 'Désignation: MSI B5500 GAMING PLUS\nSupport du Processeur: Intel 1200\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\nFréquence Mémoire: DDR4 4600 MHz\nNombre et type de slots: Aucun\nNorme Réseau:\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\nConnecteurs Disques:\n1 X M.2 PCI-E 1x + SATA 6Gb/s\n3 X M.2 – PCI-E 4.0 4x\n6 X Serial ATA 6Gb/s (SATA Revision 3)\nFormat: ATX', 'MOTHER_BOARD'),
('MSI MPG X570 GAMING EDGE', 98, 3200.00, 'msi_motherboard3.jpeg', 'CARTE MÈRE MSI MPG X570 GAMING EDGE - 4X DDR4 - M.2 PCIE 4.0 - USB 3.2 - PCI-EXPRESS 4.0 16X -', 'Désignation: MSI MPG X570 GAMING EDGE\r\nSupport du Processeur: Intel 1200\r\nFormat de Mémoire: 4 X DIMM 288 pins (DDR4)\r\nFréquence Mémoire: DDR4 4600 MHz\r\nNombre et type de slots: Aucun\r\nNorme Réseau:\r\n2.5 Gbps Gigabit Ethernet (2.5 GbE)\r\nConnecteurs Disques:\r\n1 X M.2 PCI-E 1x + SATA 6Gb/s\r\n3 X M.2 – PCI-E 4.0 4x\r\n6 X Serial ATA 6Gb/s (SATA Revision 3)\r\nFormat: ATX', 'MOTHER_BOARD'),
('MSI Optix G24C4', 100, 1900.00, 'monitor1.png', 'ECRAN GAMER - 1920 X 1080 PIXELS - 1 MS - DALLE VA INCURVÉE 1800R - FORMAT LARGE 16/9 - 144 HZ', 'Désignation: MSI 24″ LED – Optix G24C4\r\nTaille de l’écran: 24 pouces\r\nFormat de l’écran: 16/9\r\nType de dalle: Dalle VA (MVA, PVA)\r\nRésolution Max: 1920*1080\r\nTemps de réponse: 1ms\r\nTaux de rafraichissement: 144 Hz\r\nEntrées Vidéos:\r\n1 X DisplayPort Femelle\r\n1 X DVI Femelle\r\n1 X HDMI Femelle', 'Monitors'),
('MSI SPATIUM M371 NVMe M.2 1TB', 81, 1400.00, 'rom1_MSI SPATIUM M371 NVMe M.2 1TB.jpg', 'SSD 1TB M.2 PCIE NVME 3.0 X4 NAND 3D TLC', 'Désignation: MSI SPATIUM M371 1TB PCIe 3.0 NVMe M.2\r\nModèle: MSI SPATIUM M371 NVMe M.2\r\nInterface avec l’ordinateur: M.2 – PCI-E 3.0 4x\r\nFormat de disque: M.2\r\nCapacité: 1 To\r\nNVMe: Oui\r\nVitesse en lecture: 2000 Mo/s\r\nVitesse en écriture: 1900 Mo/s', 'ROM'),
('NVIDIA GeForce RTX 2080 Ti White Edition', 85, 2900.00, 'RTX2080.jpg', 'CARTE GRAPHIQUE NVIDIA RTX 2080 Ti - 8 GO GDDR5 - DUAL HDMI/TRI DISPLAYPORT - PCI EXPRESS (NVIDIA GEFORCE RTX 2080 Ti)', 'Désignation : Asus ROG STRIX GeForce RTX 2080 Ti O8G Gaming V2 LHR\r\nModèle :  90YV0FR7-M0NA00\r\nChipset Graphique : NVIDIA\r\nFréquence du Chipset: 1500 MHz\r\nFréquence Boostée: 1725 MHz\r\nOverclockée: Oui\r\nBus: PCI Express 4.0 16x\r\nSorties Vidéo: 3 X DisplayPort Femelle + 2 X HDMI Femelle', 'GPU'),
('NVIDIA GeForce RTX 3090 Ti', 95, 8990.00, 'RTX3090TI.jpg', 'CARTE GRAPHIQUE NVIDIA RTX 3090Ti - 16 GO GDDR6X - DUAL HDMI/TRI DISPLAYPORT - PCI EXPRESS (NVIDIA GEFORCE RTX 3090 Ti)', 'Désignation : Gigabyte AORUS GeForce RTX 3090 Ti XTREME WATERFORCE 24G\r\nModèle :  GV-N309TAORUSX W-24GD\r\nChipset Graphique : NVIDIA\r\nFréquence Boostée: 1935 MHz\r\nOverclockée: Oui\r\nBus: PCI Express 4.0 16x\r\nSorties Vidéo: 3 x Display Femelle + 1 x HDMI Femelle', 'GPU'),
('NVIDIA GeForce RTX 4070', 93, 8400.00, 'GPU4070.jpg', 'CARTE GRAPHIQUE NVIDIA RTX 4070 - 12 GO GDDR6X - HDMI/TRI DISPLAYPORT - PCI EXPRESS (NVIDIA GEFORCE RTX 4070)', 'Désignation : MSI GeForce RTX 4070 VENTUS 3X 12G OC\r\nModèle :  MSI GeForce RTX 4070 VENTUS 3X 12G OC\r\nChipset Graphique : NVIDIA\r\nFréquence du Chipset: 1920 MHz\r\nFréquence Boostée: 2520 MHz\r\nOverclockée: Oui\r\nBus: PCI Express 4.0 16x\r\nSorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle', 'GPU'),
('NVIDIA GeForce RTX 4090', 80, 11000.00, 'rtx4090.jpg', 'CARTE GRAPHIQUE NVIDIA RTX 4090 -24 GO GDDR6X - HDMI/TRI DISPLAYPORT - PCI EXPRESS (NVIDIA GEFORCE RTX 4090)', 'Désignation : AORUS GeForce RTX® 4090 MASTER 24GModèle :  GV-N4090AORUS M-24GDChipset Graphique : NVIDIAFréquence du Chipset: 1400 MHzFréquence Boostée: 1700 MHzOverclockée: NonBus: PCI Express 4.0 16xSorties Vidéo: 3 X DisplayPort Femelle + 1 X HDMI Femelle', 'GPU'),
('PNY CS1030 M.2 PCIe NVMe 500GB', 100, 900.00, 'rom4_PNY CS1030 M.2 PCIe NVMe 500GB.jpg', 'SSD 500GB M.2 NVME 1.3C - PCIE 4.0 X4', 'Désignation: PNY CS1030 M.2 PCIe NVMe 500GB\r\nModèle:PNY CS1030 M.2 PCIe NVMe\r\nInterface avec l’ordinateur: M.2 – PCI-E 3.0 4x\r\nFormat de disque: M.2\r\nCapacité: 500 GB\r\nNVMe: Oui\r\nVitesse en lecture: 3000 Mo/s\r\nVitesse en écriture: 2700 Mo/s', 'ROM'),
('Seagate Barracuda HDD 4TB', 98, 750.00, 'rom7.png', 'DISQUE DUR HDD 3.5\" 4 TO 5400 RPM 256 MO SERIAL ATA 6 GB/S (BULK)', 'Désignation: Seagate Barracuda HDD 4 TB\r\nModèle: ST4000DM004\r\nInterface avec l’ordinateur: SATA 6.0Gb/s\r\nFormat de disque: 3″ 1/2\r\nCapacité: 4 To\r\nNVMe: Non\r\nVitesse de rotation: 5400 RPM\r\nTaille du cache: 256 Mo', 'ROM'),
('T-FORCE DELTA RGB DDR5 32GB', 100, 600.00, 'ram4_team t-force delta rgb 32gb ddr5.jpg', 'KIT RAM PC - 2 BARRETTES DE MÉMOIRE DDR5 5600MHZ - PC5-44800', 'Modèle :T-FORCE DELTA RGB DDR5 32GB\r\nType de Mémoire : DDR5\r\nFréquence Mémoire:DDR5 5600 MHz\r\nNorme Mémoire:PC5-48000 – DDR5-6000\r\nCapacité : 32 Go\r\nNombre de Barrettes : 2\r\nLED RGB : Oui\r\nLatences : CL36 (36-36-36-76)\r\nTension : 1.25 V', 'RAM'),
('T-FORCE-DELTA-500GB-RGB', 100, 700.00, 'rom5T-FORCE-DELTA-500GB-RGB.jpg', 'SSD 500GB  1.3C - PCIE 4.0 X4', 'Désignation: T-FORCE-DELTA-500GB-RGB\r\nModèle:T-FORCE-DELTA M.2 PCIe NVMe\r\nInterface avec l’ordinateur: M.2 – PCI-E 3.0 4x\r\nFormat de disque: M.2\r\nCapacité: 500 GB\r\nNVMe: Oui\r\nVitesse en lecture: 2100 Mo/s\r\nVitesse en écriture: 2000 Mo/s', 'ROM'),
('WD Blue HDD 2TB', 82, 500.00, 'rom6.png', 'DISQUE DUR 3.5\" 2 TO 7200 RPM 256 MO SERIAL ATA 6GB/S - WD20EZBX (BULK)', 'Désignation: WD Blue HDD 2 TB\r\nModèle: ST6000NM0115-11\r\nInterface avec l’ordinateur: Serial ATA 6Gb/s\r\nFormat de disque:3″ 1/2\r\nCapacité: 1 To\r\nNVMe: Non\r\nVitesse de rotation: 7200 RPM\r\nTaille du cache: 64 Mo', 'ROM');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'en attente',
  `solution` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`panier_id`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `panier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `clients` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
