drop database if exists examen;
create database examen CHARACTER SET utf8mb4;
use examen;
CREATE TABLE Usuarios
(
id int auto_increment PRIMARY KEY ,
usuario varchar(10) NOT NULL,
clave varchar(10) NOT NULL,
nombre varchar(30) NOT NULL
);
INSERT INTO Usuarios VALUES 
(1,'admin','admin','Administrador'),
(2,'alberto','12345','Alberto Dominguez'),
(3,'paco','12345','Paco Garcia');

CREATE TABLE `compañias` (
  `id_comp` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `compañias` (`id_comp`, `nombre`, `foto`) VALUES
(1, 'IBERIA', '01.png'),
(2, 'TUI', '02.png'),
(3, 'EASYJET AIRLINE CO. LTD.', '03.png'),
(4, 'TRANSAVIA HOLLAND B.V', '04.png'),
(5, 'PRIMERA AIR SCANDINAVIA', '05.png'),
(6, 'VUELING AIRLINES', '06.png'),
(7, 'QATAR AIRWAYS', '07.png'),
(8, 'BRITISH AIRWAYS', '08.png'),
(9, 'GERMANIA FLUGGESELLSCHAFT', '09.png'),
(10, 'RYANAIR', '10.png'),
(11, 'JET2.COM LIMITED', '11.png');

CREATE TABLE `vuelos` (
  `id_vuelo` int(11) NOT NULL,
  `vuelo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `origen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `destino` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horario` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `compañia` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `vuelos` (`id_vuelo`, `vuelo`, `origen`, `destino`, `horario`, `compañia`) VALUES
(1, 'IBE8930', 'ALMERIA (LEI)', 'SEVILLA (SVQ)', '07:10', 'IBERIA'),
(2, 'JAF2816', 'ALMERIA (LEI)', 'BRUSELAS (BRU)', '09:40', 'TUI'),
(3, 'EZY8164', 'ALMERIA (LEI)', 'LONDRES /GATWICK (LGW)', '10:05', 'EASYJET AIRLINE CO. LTD.'),
(4, 'IBE8589', 'ALMERIA (LEI)', 'MADRID-BARAJAS ADOLFO SUÁREZ (MAD)', '10:10', 'IBERIA'),
(5, 'IBE8595', 'ALMERIA (LEI)', 'MADRID-BARAJAS ADOLFO SUÁREZ (MAD)', '10:35', 'IBERIA'),
(6, 'TRA5644', 'ALMERIA (LEI)', 'ROTTERDAM (RTM)', '10:40', 'TRANSAVIA HOLLAND B.V'),
(7, 'PRI466', 'ALMERIA (LEI)', 'BILLUND (BLL)', '10:55', 'PRIMERA AIR SCANDINAVIA'),
(8, 'PRI556', 'ALMERIA (LEI)', 'COPENHAGUE (CPH)', '11:05', 'PRIMERA AIR SCANDINAVIA'),
(9, 'VLG1252', 'ALMERIA (LEI)', 'BARCELONA-EL PRAT (BCN)', '12:25', 'VUELING AIRLINES'),
(10, 'QTR3643', 'ALMERIA (LEI)', 'BARCELONA-EL PRAT (BCN)', '12:25', 'QATAR AIRWAYS'),
(11, 'IBE5032', 'ALMERIA (LEI)', 'BARCELONA-EL PRAT (BCN)', '12:25', 'IBERIA'),
(12, 'IBE8577', 'ALMERIA (LEI)', 'MADRID-BARAJAS ADOLFO SUÁREZ (MAD)', '13:55', 'IBERIA'),
(13, 'BAW421', 'ALMERIA (LEI)', 'LONDRES / HEATHROW (LHR)', '17:50', 'BRITISH AIRWAYS'),
(14, 'IBE8601', 'ALMERIA (LEI)', 'MADRID-BARAJAS ADOLFO SUÁREZ (MAD)', '18:00', 'IBERIA'),
(15, 'GMI6059', 'ALMERIA (LEI)', 'MUNICH (MUC)', '18:15', 'GERMANIA FLUGGESELLSCHAFT'),
(16, 'GMI6299', 'ALMERIA (LEI)', 'DUSSELDORF (DUS)', '19:40', 'GERMANIA FLUGGESELLSCHAFT'),
(17, 'IBE8932', 'ALMERIA (LEI)', 'SEVILLA (SVQ)', '19:45', 'IBERIA'),
(18, 'RYR7319', 'ALMERIA (LEI)', 'DUBLIN (DUB)', '20:55', 'RYANAIR'),
(19, 'EXS902', 'ALMERIA (LEI)', 'MANCHESTER (MAN)', '21:10', 'JET2.COM LIMITED');

ALTER TABLE `compañias`
  ADD PRIMARY KEY (`id_comp`);
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id_vuelo`);
ALTER TABLE `compañias`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
ALTER TABLE `vuelos`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;