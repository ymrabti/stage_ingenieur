
CREATE TABLE `admecoles` (
  `id` int(11) NOT NULL,
  `idecole` int(11) DEFAULT NULL,
  `idadmis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admecoles` (`id`, `idecole`, `idadmis`) VALUES
(5002, 1076, 2),
(5003, 1076, 3),
(5006, 1078, 5),
(5007, 1079, 5),
(5009, 1080, 2),
(5010, 1080, 3),
(5011, 1081, 2),
(5012, 1081, 3),
(5013, 1082, 2),
(5014, 1082, 5),
(5015, 1083, 2),
(5016, 1083, 3),
(5017, 1084, 5),
(5018, 1085, 5),
(5019, 1086, 3),
(5020, 1086, 2),
(5021, 1087, 2),
(5022, 1088, 3),
(5023, 1088, 2),
(5024, 1088, 5);

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `nom`) VALUES
(2, 'Classes préparatoires'),
(3, 'Bac+2 (autres que Classes Prépa)'),
(4, 'Bac+3 (Licence)'),
(5, 'Bac');

-- --------------------------------------------------------

--
-- Table structure for table `dformations`
--

CREATE TABLE `dformations` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dformations`
--

INSERT INTO `dformations` (`id`, `nom`) VALUES
(2, 'Génie Civil'),
(3, 'Informatique, Télécom'),
(4, 'Génie Electrique, Energie'),
(5, 'Génie Industriel, Mécanique, Logistique'),
(6, 'Agriculture, Agroalimentaire'),
(7, 'Architecture'),
(8, 'Actuariat, Ingénierie financière'),
(9, 'Pédagogie'),
(10, 'Aménagement, Environnement, Génie rural'),
(11, 'Electronique, Automatique'),
(12, 'Ingénierie médicale');

-- --------------------------------------------------------

--
-- Table structure for table `dformecoless`
--

CREATE TABLE `dformecoless` (
  `id` int(11) NOT NULL,
  `idecole1` int(11) DEFAULT NULL,
  `idforma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dformecoless`
--

INSERT INTO `dformecoless` (`id`, `idecole1`, `idforma`) VALUES
(7002, 1076, 2),
(7003, 1076, 3),
(7004, 1076, 4),
(7005, 1076, 11),
(7006, 1078, 3),
(7007, 1078, 6),
(7008, 1078, 12),
(7009, 1079, 11),
(7010, 1079, 7),
(7011, 1080, 3),
(7012, 1080, 4),
(7013, 1080, 5),
(7014, 1081, 3),
(7015, 1081, 4),
(7016, 1081, 5),
(7017, 1081, 2),
(7018, 1082, 3),
(7019, 1082, 4),
(7020, 1082, 5),
(7021, 1082, 2),
(7022, 1083, 2),
(7023, 1083, 3),
(7024, 1083, 4),
(7025, 1083, 11),
(7026, 1084, 12),
(7027, 1084, 6),
(7028, 1084, 3),
(7029, 1085, 11),
(7030, 1085, 7),
(7031, 1086, 5),
(7032, 1086, 4),
(7033, 1086, 3),
(7034, 1087, 3),
(7035, 1087, 4),
(7036, 1087, 5),
(7037, 1088, 2),
(7038, 1088, 3),
(7039, 1088, 4),
(7040, 1088, 5),
(7041, 1088, 2);

-- --------------------------------------------------------

--
-- Table structure for table `diplomationecoles`
--

CREATE TABLE `diplomationecoles` (
  `id` int(11) NOT NULL,
  `ecole` int(11) DEFAULT NULL,
  `typediplome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diplomationecoles`
--

INSERT INTO `diplomationecoles` (`id`, `ecole`, `typediplome`) VALUES
(4002, 1076, 2),
(4003, 1078, 2),
(4004, 1079, 3),
(4005, 1080, 2),
(4006, 1081, 2),
(4007, 1082, 3),
(4008, 1087, 2),
(4009, 1083, 2),
(4010, 1084, 3),
(4011, 1085, 2),
(4012, 1086, 2),
(4013, 1088, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `ville` int(11) DEFAULT NULL,
  `typeEtablissement` int(11) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `siteweb` varchar(50) DEFAULT NULL,
  `infos` varchar(1000) DEFAULT NULL,
  `lambda` double DEFAULT NULL,
  `phi` double DEFAULT NULL,
  `img` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ecoles`
--

INSERT INTO `ecoles` (`id`, `nom`, `ville`, `typeEtablissement`, `adresse`, `tel`, `fax`, `siteweb`, `infos`, `lambda`, `phi`, `img`) VALUES
(1076, 'Ecole Hassania Des Travaux Publics\r\n', 6, 2, 'Km 7 Route d\'El JadidaCasablanca BP 8108 Maroc', '+212 520 42 05 12', NULL, 'www.ehtp.ac.ma', 'L’École Hassania des travaux publics est l\'une des grandes écoles d\'ingénieurs marocaines. L\'École Hassania des travaux publics est membre de la conférence des grandes écoles.', 33.549108, -7.64995, 37),
(1078, 'E2IM – Ecole d’Ingénierie et d’Innovation de Marrakech', 17, 3, 'Université Privée de Marrakech Tensift El Haouz Km13,42312 route d’Amezmiz', '+212 (0) 5 24 48 70 ', NULL, 'https://upm.ac.ma/', 'L’école d’ingénierie et d’innovation de l’Université Privée de Marrakech regroupe plus de 10 programmes ingénieur diplômants.\r\n\r\nL’ingénieur est principalement un animateur d’équipe et un manager qui doit collaborer avec d’autres personnes (techniciens, ouvriers) pour assurer le bon fonctionnement du service ou la réalisation du projet dont il a la charge.\r\n\r\nAu-delà des savoirs techniques et scientifiques, l’ingénieur doit garder en permanence ses connaissances et sa formation à jour puisque le marché technologique et industriel au Maroc et à l’étranger est en constante évolution. Il se doit également de développer certaines qualités, parmi lesquelles :\r\n\r\nLe travail en équipe\r\nLa facilité à communiquer\r\nLa flexibilité\r\nLa rigueur\r\nLa créativité\r\nSachez-le, un ingénieur aujourd’hui exerce dans les plus hautes fonctions de l’entreprise, d’où l’importance de développer ces compétences transversales.\r\n\r\nVotre diplôme Ingénieur UPM est AUTOMATIQUEMENT équivalent au DIPLOME D’INGENIEUR D’E', 31.516486, -8.062453, 2),
(1079, 'EIGSI Casablanca', 6, 4, 'Route de l\'Oasis, Maarif', '05222-32615', NULL, 'https://www.eigsica.ma/', 'L’EIGSI est une école d’ingénieurs française installée en France à La Rochelle et au Maroc à Casablanca depuis 2006. Fondée en 1901, l’EIGSI forme des ingénieurs généralistes. Elle accueille 1 200 étudiants sur ses deux campus et compte plus de 8 500 ingénieurs diplômés depuis sa création. En 2017, l’EIGSI est devenue la 1ère école d’ingénieurs française à obtenir l’accréditation des instances françaises (CTI) à délivrer son diplôme d’ingénieur français à l’étranger.', 33.558357, -7.630799, 3),
(1080, 'École nationale supérieure d\'électricité et mécanique', 6, 2, 'Route d’El Jadida, km 7, BP : 8118, Oasis – Casablanca Maroc', '0522230789', '0522231299', 'http://www.ensem.ac.ma/', 'L’École nationale supérieure d\'électricité et de mécanique est l\'une des grandes écoles d’ingénieurs marocaines située à Casablanca créée en 1986 et rattachée à l\'Université Hassan II de Casablanca. L’ENSEM est membre fondateur de la Fédération européenne des écoles d\'ingénieurs de l\'automobile et des transports', 33.542015, -7.656988, 4),
(1081, 'Ecole Mohammadia d\'Ingénieurs', 21, 2, 'Avenue Ibn Sina B.P 765, Agdal Rabat 10090 Maroc', '(+212) 537 68 71 50', '(+212) 537 77 88 53', 'https://www.emi.ac.ma/', 'L\'École Mohammadia d\'Ingénieurs est l\'une des grandes écoles d\'ingénieurs au Maroc, elle est située au quartier de l\'Agdal à Rabat et attachée à l\'Université Mohammed-V de Rabat. L\'EMI a été inaugurée par feu le roi Mohammed V en 1959, trois ans après l\'indépendance du Maroc.', 33.997699, -6.853567, 5),
(1082, 'Ecole Nationale des Arts et Métiers', 18, 2, 'Marjane 2,B.P. 15290 Al-Mansor, Meknès', '+212 5 35 46 71 60 /', '+212 5 35 46 71 64', 'http://www.ensam-umi.ac.ma', 'L’ENSAM-Meknès, en s’appuyant sur le potentiel de ses laboratoires, ambitionne de former des ingénieurs d’état et des cadres qui soient, par leurs connaissances et leurs compétences, des locomoteurs de l’excellence et de l’innovation technologique nécessaires à l’avenir économique et social de la région Fès- Meknès et du Maroc.', 33.857985, -5.572029, 6),
(1083, 'Ecole Hassania Des Travaux Publics\r\n', 6, 2, 'Km 7 Route d\'El JadidaCasablanca BP 8108 Maroc', '+212 520 42 05 12', NULL, 'www.ehtp.ac.ma', 'L’École Hassania des travaux publics est l\'une des grandes écoles d\'ingénieurs marocaines. L\'École Hassania des travaux publics est membre de la conférence des grandes écoles.', 33.549108, -7.64995, 37),
(1084, 'E2IM – Ecole d’Ingénierie et d’Innovation de Marrakech', 17, 3, 'Université Privée de Marrakech Tensift El Haouz Km13,42312 route d’Amezmiz', '+212 (0) 5 24 48 70 ', NULL, 'https://upm.ac.ma/', 'L’école d’ingénierie et d’innovation de l’Université Privée de Marrakech regroupe plus de 10 programmes ingénieur diplômants.\r\n\r\nL’ingénieur est principalement un animateur d’équipe et un manager qui doit collaborer avec d’autres personnes (techniciens, ouvriers) pour assurer le bon fonctionnement du service ou la réalisation du projet dont il a la charge.\r\n\r\nAu-delà des savoirs techniques et scientifiques, l’ingénieur doit garder en permanence ses connaissances et sa formation à jour puisque le marché technologique et industriel au Maroc et à l’étranger est en constante évolution. Il se doit également de développer certaines qualités, parmi lesquelles :\r\n\r\nLe travail en équipe\r\nLa facilité à communiquer\r\nLa flexibilité\r\nLa rigueur\r\nLa créativité\r\nSachez-le, un ingénieur aujourd’hui exerce dans les plus hautes fonctions de l’entreprise, d’où l’importance de développer ces compétences transversales.\r\n\r\nVotre diplôme Ingénieur UPM est AUTOMATIQUEMENT équivalent au DIPLOME D’INGENIEUR D’E', 31.516486, -8.062453, 2),
(1085, 'EIGSI Casablanca', 6, 4, 'Route de l\'Oasis, Maarif', '05222-32615', NULL, 'https://www.eigsica.ma/', 'L’EIGSI est une école d’ingénieurs française installée en France à La Rochelle et au Maroc à Casablanca depuis 2006. Fondée en 1901, l’EIGSI forme des ingénieurs généralistes. Elle accueille 1 200 étudiants sur ses deux campus et compte plus de 8 500 ingénieurs diplômés depuis sa création. En 2017, l’EIGSI est devenue la 1ère école d’ingénieurs française à obtenir l’accréditation des instances françaises (CTI) à délivrer son diplôme d’ingénieur français à l’étranger.', 33.558357, -7.630799, 3),
(1086, 'École nationale supérieure d\'électricité et mécanique', 6, 2, 'Route d’El Jadida, km 7, BP : 8118, Oasis – Casablanca Maroc', '0522230789', '0522231299', 'http://www.ensem.ac.ma/', 'L’École nationale supérieure d\'électricité et de mécanique est l\'une des grandes écoles d’ingénieurs marocaines située à Casablanca créée en 1986 et rattachée à l\'Université Hassan II de Casablanca. L’ENSEM est membre fondateur de la Fédération européenne des écoles d\'ingénieurs de l\'automobile et des transports', 33.542015, -7.656988, 4),
(1087, 'Ecole Mohammadia d\'Ingénieurs', 21, 2, 'Avenue Ibn Sina B.P 765, Agdal Rabat 10090 Maroc', '(+212) 537 68 71 50', '(+212) 537 77 88 53', 'https://www.emi.ac.ma/', 'L\'École Mohammadia d\'Ingénieurs est l\'une des grandes écoles d\'ingénieurs au Maroc, elle est située au quartier de l\'Agdal à Rabat et attachée à l\'Université Mohammed-V de Rabat. L\'EMI a été inaugurée par feu le roi Mohammed V en 1959, trois ans après l\'indépendance du Maroc.', 33.997699, -6.853567, 5),
(1088, 'Ecole Nationale des Arts et Métiers', 18, 2, 'Marjane 2,B.P. 15290 Al-Mansor, Meknès', '+212 5 35 46 71 60 /', '+212 5 35 46 71 64', 'http://www.ensam-umi.ac.ma', 'L’ENSAM-Meknès, en s’appuyant sur le potentiel de ses laboratoires, ambitionne de former des ingénieurs d’état et des cadres qui soient, par leurs connaissances et leurs compétences, des locomoteurs de l’excellence et de l’innovation technologique nécessaires à l’avenir économique et social de la région Fès- Meknès et du Maroc.', 33.857985, -5.572029, 6);

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `intitule` varchar(100) DEFAULT NULL,
  `typeformation` int(11) DEFAULT NULL,
  `typediplome` int(11) DEFAULT NULL,
  `ecoleoffert` int(11) DEFAULT NULL,
  `domaineformation` int(11) DEFAULT NULL,
  `admisformation` int(11) DEFAULT NULL,
  `img` int(11) DEFAULT '1',
  `lien` varchar(200) DEFAULT NULL,
  `infos` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`id`, `intitule`, `typeformation`, `typediplome`, `ecoleoffert`, `domaineformation`, `admisformation`, `img`, `lien`, `infos`) VALUES
(2503, 'formation d\'ingénieurs', 2, 2, 1076, 2, 3, 1, 'http://www.ehtp.ac.ma/', 'formation d\'ingénieurs'),
(2504, 'MANAGEMENT DE LA QUALITÉ, SÉCURITÉ ET ENVIRONNEMENT', 2, 4, 1078, 10, 4, 1, 'https://upm.ac.ma/etudier-a-lupm/ingenierie/master-en-management-de-la-qualite-securite-et-environnement/', 'Le Master en Management de la qualité, sécurité et environnement de l’école d’ingénierie et d’innovation de l’UPM vise l’exploitation des connaissances acquises par les étudiants durant les trois premières années d’études universitaires pour les former dans un domaine en plein expansion et qui est a'),
(2505, 'formation d\'inénieur', 4, 3, 1079, 5, 5, 1, 'https://www.eigsica.ma/', 'L’EIGSI Casablanca offre aux étudiants une formation d’ingénieur généraliste en 5 ans.  La formation des 3 premières années dispensées au sein du campus de Casablanca est rigoureusement identique à celle proposée sur le campus de La Rochelle, tant sur les contenus d’enseignements que sur les modalit'),
(2506, 'formation d\'ingénieurs', 2, 2, 1076, 2, 3, 1, 'http://www.ensem.ac.ma/', 'formation d\'ingénieurs');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `chemin` varchar(50) DEFAULT 'images/no-data.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `chemin`) VALUES
(1, 'images/no-data.png'),
(2, 'images/ecoles/upm.jpg'),
(3, 'images/ecoles/eigsica.jpg'),
(4, 'images/ecoles/ensem.jpeg'),
(5, 'images/ecoles/emi.gif'),
(6, 'images/ecoles/ensam.jpg'),
(37, 'images/ecoles/ehtp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `nom`) VALUES
(2, 'Public'),
(3, 'Reconnu par l’Etat'),
(4, 'Privé');

-- --------------------------------------------------------

--
-- Table structure for table `typesdiplomes`
--

CREATE TABLE `typesdiplomes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typesdiplomes`
--

INSERT INTO `typesdiplomes` (`id`, `nom`) VALUES
(2, 'Ingénieur d’Etat'),
(3, 'Ingénieur'),
(4, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `nom`) VALUES
(2, 'AGADIR'),
(3, 'AL HOCEIMA'),
(4, 'BENI MELLAL'),
(5, 'BERRECHID'),
(6, 'CASABLANCA'),
(7, 'EL JADIDA'),
(8, 'ERRACHIDIA'),
(9, 'ESSAOUIRA'),
(10, 'FES'),
(11, 'GUELMIM'),
(12, 'IFRANE'),
(13, 'KENITRA'),
(14, 'KHOURIBGA'),
(15, 'LAAYOUNE'),
(16, 'MOHAMMEDIA'),
(17, 'MARRAKECH'),
(18, 'MEKNES'),
(19, 'NADOR'),
(20, 'OUJDA'),
(21, 'RABAT'),
(22, 'SALE'),
(23, 'SAFI'),
(24, 'SETTAT'),
(25, 'TANGER'),
(26, 'TETOUAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admecoles`
--
ALTER TABLE `admecoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dformations`
--
ALTER TABLE `dformations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dformecoless`
--
ALTER TABLE `dformecoless`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diplomationecoles`
--
ALTER TABLE `diplomationecoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typesdiplomes`
--
ALTER TABLE `typesdiplomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admecoles`
--
ALTER TABLE `admecoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5025;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dformations`
--
ALTER TABLE `dformations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dformecoless`
--
ALTER TABLE `dformecoless`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7042;

--
-- AUTO_INCREMENT for table `diplomationecoles`
--
ALTER TABLE `diplomationecoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4014;

--
-- AUTO_INCREMENT for table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2507;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typesdiplomes`
--
ALTER TABLE `typesdiplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

