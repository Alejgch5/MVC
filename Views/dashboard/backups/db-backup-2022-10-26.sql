

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pedido` (`id_pedido`),
  CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO detalle_pedidos VALUES("1","marketing digital desde cero","165000.00","4");
INSERT INTO detalle_pedidos VALUES("2","Matemáticas para todo","56440.00","5");





CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` varchar(100) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `email` varchar(80) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `proceso` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO pedidos VALUES("1","75Y2654003188010M","300090.00","COMPLETED","2022-09-13 20:55:45","sb-c7hmh21553265@personal.example.com","John","Doe","Free Trade Zone","Bogota","alejgarcia555@gmail.com","1");
INSERT INTO pedidos VALUES("2","5F773557EK6211800","234640.00","COMPLETED","2022-10-13 22:31:18","sb-c7hmh21553265@personal.example.com","John","Doe","Free Trade Zone","Bogota","alejgarcia555@gmail.com","1");
INSERT INTO pedidos VALUES("3","7XT17783EM987434U","155990.00","COMPLETED","2022-10-14 05:08:04","sb-c7hmh21553265@personal.example.com","John","Doe","Free Trade Zone","Bogota","alejgarcia555@gmail.com","1");
INSERT INTO pedidos VALUES("4","3KU53756NY729705X","165000.00","COMPLETED","2022-10-19 17:25:26","sb-c7hmh21553265@personal.example.com","John","Doe","Free Trade Zone","Bogota","juandavidag4@gmail.com","1");
INSERT INTO pedidos VALUES("5","4YL23535N97061548","56440.00","COMPLETED","2022-10-19 21:20:26","sb-c7hmh21553265@personal.example.com","John","Doe","Free Trade Zone","Bogota","jdalzate4654@misena.edu.co","1");





CREATE TABLE `tblcalificacioncurso` (
  `idcalificacion` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  `calificacion` int(1) NOT NULL,
  `comentario` varchar(700) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idcurso` int(8) NOT NULL,
  PRIMARY KEY (`idcalificacion`),
  KEY `FK_tblcalificacioncurso_tblusuario` (`idusuario`),
  KEY `FK_tblcalificacioncurso_tblcurso` (`idcurso`),
  CONSTRAINT `FK_tblcalificacioncurso_tblcurso` FOREIGN KEY (`idcurso`) REFERENCES `tblcurso` (`idcurso`),
  CONSTRAINT `FK_tblcalificacioncurso_tblusuarios` FOREIGN KEY (`idusuario`) REFERENCES `tblusuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tblcalificacioncurso VALUES("1","2022-07-29","8","3","","1");
INSERT INTO tblcalificacioncurso VALUES("2","2022-06-30","9","4","","2");
INSERT INTO tblcalificacioncurso VALUES("3","2022-05-16","13","5","","3");
INSERT INTO tblcalificacioncurso VALUES("4","2022-08-14","14","1","","4");
INSERT INTO tblcalificacioncurso VALUES("5","2022-08-09","5","3","","6");
INSERT INTO tblcalificacioncurso VALUES("6","2022-06-13","14","4","Fue mejor de lo que esperaba!!","3");
INSERT INTO tblcalificacioncurso VALUES("7","2022-06-14","14","1","No superó mis expectativas","3");
INSERT INTO tblcalificacioncurso VALUES("8","2022-06-14","13","5","Excelente curso!!","3");
INSERT INTO tblcalificacioncurso VALUES("9","2022-06-28","7","5","Aprendí mucho con este curso. ¡El profe explica muy bien!","5");





CREATE TABLE `tblcurso` (
  `idcurso` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `duracion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `video` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(8) DEFAULT NULL,
  `descripcioncorta` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(2000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idtematica` int(4) NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `idtutor` int(11) NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `FK_tblcurso_tbltematica` (`idtematica`),
  CONSTRAINT `FK_tblcurso_tbltematica` FOREIGN KEY (`idtematica`) REFERENCES `tbltematica` (`idtematica`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tblcurso VALUES("1","marketing digital desde cero","+4 horas de video","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/V92Jx72x88c\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","165000","","Aprenderás lo necesario para entrar a este bello mundo.","1","assets/img/cursos/20221019054922.jpg","1","3");
INSERT INTO tblcurso VALUES("2","Matemáticas para todo","+2 horas de video","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sgqea7MGu3A\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","56440","","Dominarás las matemáticas y serán una herramienta fundamental en tu vida.","3","assets/img/cursos/20221019061954.jpg","1","3");
INSERT INTO tblcurso VALUES("3","Inglés Británico","+7 horas de video","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5HWj8_JYQdo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","45000","","Aprenderás a entender a los nativos y hablar el idioma de forma fluida y natural.","4","assets/img/cursos/20221019063013.jpg","1","3");
INSERT INTO tblcurso VALUES("4","Javascript desde cero","+10 horas de video","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/z95mZVUcJ-E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","30000","","Todo sobre javascript","5","assets/img/cursos/20221019064038.jpg","1","2");
INSERT INTO tblcurso VALUES("5","PHP avanzado","+7 horas de video","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nCB1gEkRZ1g\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","60000","","Aprende PHP construyendo proyectos","5","assets/img/cursos/20221019064404.jpg","1","3");
INSERT INTO tblcurso VALUES("6","Partituras musicales","","\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4IR4YepajuM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","165000","","Aprenderás lo necesario para entrar a este bello mundo.","7","assets/img/cursos/20221019212318.jpg","1","4");
INSERT INTO tblcurso VALUES("7","Marketing digital","","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2p_GbuMj6oc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","165000","","Aprende a leer partituras de bateria y percusión.","3","assets/img/cursos/20221025175551.jpg","1","3");
INSERT INTO tblcurso VALUES("219","prueba","","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qezQaGr3WvU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","10","","Aprenderás a entender a los nativos y hablar el idioma de forma fluida y natural.","7","assets/img/cursos/20221026190805.jpg","1","21");
INSERT INTO tblcurso VALUES("229","hola","","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qezQaGr3WvU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","78000","","Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.","5","assets/img/cursos/20221026215551.jpg","1","1");
INSERT INTO tblcurso VALUES("230","soy una prueba","","<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qezQaGr3WvU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>","78000","","pdasfag","5","assets/img/cursos/20221026222727.jpg","1","21");





CREATE TABLE `tblexamen` (
  `idexamen` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idtematica` int(4) NOT NULL,
  `idtutor` int(11) NOT NULL,
  `aprobacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `FK_tblexamen_tbltematica` (`idtematica`),
  CONSTRAINT `FK_tblexamen_tbltematica` FOREIGN KEY (`idtematica`) REFERENCES `tbltematica` (`idtematica`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tblexamen VALUES("1","Matematicas","3","2147483647","0");
INSERT INTO tblexamen VALUES("2","Inglés","4","2147483647","0");
INSERT INTO tblexamen VALUES("3","Programación","5","2147483647","1");
INSERT INTO tblexamen VALUES("4","Música","5","2147483647","1");
INSERT INTO tblexamen VALUES("5","Marketing Digital","1","242014089","1");





CREATE TABLE `tblfactura` (
  `numero` int(53) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idcomprador` int(11) NOT NULL,
  `idcurso` int(8) NOT NULL,
  `valor` int(8) DEFAULT NULL,
  `idadmin` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `FK_tblfactura_tblcurso` (`idcurso`),
  KEY `FK_tblfactura_tblusuarios` (`idcomprador`),
  CONSTRAINT `FK_tblfactura_tblcurso` FOREIGN KEY (`idcurso`) REFERENCES `tblcurso` (`idcurso`),
  CONSTRAINT `FK_tblfactura_tblusuarios` FOREIGN KEY (`idcomprador`) REFERENCES `tblusuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10005 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tblfactura VALUES("10001","2022-05-21","5","1","99550","1001724564");
INSERT INTO tblfactura VALUES("10002","2021-05-30","14","4","78650","1001724564");
INSERT INTO tblfactura VALUES("10003","2021-07-07","5","6","250000","1001724564");
INSERT INTO tblfactura VALUES("10004","2022-06-28","7","5","23000","1001724564");





CREATE TABLE `tblgenero` (
  `codigo` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tblgenero VALUES("1","F");
INSERT INTO tblgenero VALUES("2","M");
INSERT INTO tblgenero VALUES("3","O");





CREATE TABLE `tblrol` (
  `idrol` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tblrol VALUES("1","Admin");
INSERT INTO tblrol VALUES("2","Usuario");





CREATE TABLE `tbltematica` (
  `idtematica` int(4) NOT NULL AUTO_INCREMENT,
  `tematica` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idtematica`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO tbltematica VALUES("1","Marketing","assets/img/tematicas/20221019055337.jpg","1");
INSERT INTO tbltematica VALUES("3","Matematicas","assets/img/tematicas/20221019061625.jpg","1");
INSERT INTO tbltematica VALUES("4","Inglés","assets/img/tematicas/20221019062624.jpg","1");
INSERT INTO tbltematica VALUES("5","Programación","assets/img/tematicas/20221019063748.jpg","1");
INSERT INTO tbltematica VALUES("7","Música","assets/img/tematicas/20221019212235.jpg","1");
INSERT INTO tbltematica VALUES("9","Ciencia de Datos","assets/img/tematicas/20221025003935.jpg","1");





CREATE TABLE `tbltutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `perfil` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbltutor VALUES("1","Juan","garcia","juandavidag4@gmail.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","");





CREATE TABLE `tblusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `idrol` int(1) DEFAULT 2,
  `verify` int(11) DEFAULT 0,
  `perfil` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `FK_tblusuarios_tblrol` (`idrol`),
  CONSTRAINT `FK_tblusuarios_tblrol` FOREIGN KEY (`idrol`) REFERENCES `tblrol` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblusuarios VALUES("1","juan","alzate","juandavidag4@gmail.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","1001724564","","1","1","","1");
INSERT INTO tblusuarios VALUES("3","juan david","alzate","jdalzate4654@misena.edu.co","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","1001724564","","2","1","","1");
INSERT INTO tblusuarios VALUES("4","Joanna","Ofield","jofield3@vinaora.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","0242014089","","2","1","","1");
INSERT INTO tblusuarios VALUES("5","Heather","Duesberry","hduesberry1@studiopress.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","6109873586","","2","1","","1");
INSERT INTO tblusuarios VALUES("6","Carlos","Ramirez Gonzalez","carlos@tutorozizi.co","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","10002222","","2","1","","1");
INSERT INTO tblusuarios VALUES("7","Rojer","Rendón García","rojer@misena.edu.co","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","121212","","2","1","","1");
INSERT INTO tblusuarios VALUES("8","Jodee","Halford","jhalford2@dailymail.co.uk","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","1220071668","","2","1","","1");
INSERT INTO tblusuarios VALUES("9","Tito","Dishman","tdishman0@nydailynews.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","3105493239","","2","1","","1");
INSERT INTO tblusuarios VALUES("10","Luis Mario","Kobel Gracia","luismakg@gmail.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","33331111","","2","1","","1");
INSERT INTO tblusuarios VALUES("11","Kelly","Quadri","Kelly@gmail.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","363636","","2","1","","1");
INSERT INTO tblusuarios VALUES("12","Kevin","Quintero Hernandez","kvquintero@gmail.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","454545","","2","1","","1");
INSERT INTO tblusuarios VALUES("13","Reese","Thorsby","rthorsby3@mlb.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","4687174639","","2","1","","1");
INSERT INTO tblusuarios VALUES("14","Arlinda","Shillington","ashillington4@mysql.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","5516326664","","2","1","","1");
INSERT INTO tblusuarios VALUES("15","Josselyn","Ambrogini","jambrogini2@alibaba.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","6193821708","","2","1","","1");
INSERT INTO tblusuarios VALUES("16","Kendrick","Tidman","ktidman1@multiply.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","6983063716","","2","1","","1");
INSERT INTO tblusuarios VALUES("17","Ronnye","Quadri","rquadri3@upenn.edu","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","7316559977","","2","1","","1");
INSERT INTO tblusuarios VALUES("18","Carla","Doddemeede","cdoddemeede1@usa.gov","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","7376110836","","2","1","","1");
INSERT INTO tblusuarios VALUES("19","Pedro","Guzmán Castillo","pedrogu@gmail.com","$2y$10$os/D5k0/xanDyy2/P6G7KeYaOcU6sEqEiHq7Wx76vsm.PH6Snlef6","878787","","2","1","","1");
INSERT INTO tblusuarios VALUES("20","Andres","kane","juandavidag4@gmail,com","$2y$10$bwLHlPMGo./BRbbcr52aZupBpB7D7fWdb5g/15um1eIHIMIsJ5Ygm","10017245fasd","","2","1","","1");
INSERT INTO tblusuarios VALUES("21","Harry ","Kane","hkean@miaf.sdaf","$2y$10$UoGr7cYB.t1pN6KJF/dkUO3AYH22DxNxNZAY4OyjcE46K6oOAasO6","1246589","","2","1","","1");



