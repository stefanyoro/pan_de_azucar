INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES (NULL, 'Administrador', 'Administrador', NULL, NULL), (NULL, 'Entrenador', 'Entrenador', NULL, NULL), (NULL, 'Nutricionista', 'Nutricionista', NULL, NULL), (NULL, 'Corredor', 'Corredor', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `password`,`password2`, `img`,`rol`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'administrador', 'admin@admin.com', '$2y$10$RGfpQ643xb1.KYiRm5NWoujC3P/3ARhHAb6xJk0da.qAdrFIr.Y4C','$2y$10$RGfpQ643xb1.KYiRm5NWoujC3P/3ARhHAb6xJk0da.qAdrFIr.Y4C', NULL, '1', NULL, NULL, NULL);

INSERT INTO `persona` (`id`, `user_id`, `nacionalidad`, `tipo_doc`, `sexo`, `numero_doc`, `nombre`, `apellido`, `fecha_nac`, `estado`, `ciudad`, `telf_local`,`telf_celular`,`tipo_sangre`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Venezolano', 'cedula', 'M', '6077767', 'Alvaro', 'Linares', '2020-05-12', 'Miranda', 'San Antonio de los Altos', 'N/A','N/A','A+', NULL, NULL);

INSERT INTO `administrador` (`id`, `persona_id`, `especialidad`, `grado_Instrucc`, `created_at`, `updated_at`) VALUES (NULL, '1', 'administrador', 'bachiller', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `password`,`password2`, `img`,`rol`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Clen', 'clenvielma@gmail.com', '$2y$10$RGfpQ643xb1.KYiRm5NWoujC3P/3ARhHAb6xJk0da.qAdrFIr.Y4C', '$2y$10$RGfpQ643xb1.KYiRm5NWoujC3P/3ARhHAb6xJk0da.qAdrFIr.Y4C', 'phpA43B.tmp.jpg', '2', NULL, NULL, NULL);
INSERT INTO `persona` (`id`, `user_id`, `nacionalidad`, `tipo_doc`, `sexo`, `numero_doc`, `nombre`, `apellido`, `fecha_nac`, `estado`, `ciudad`,`telf_local`,`telf_celular`,`tipo_sangre`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Venezolano', 'cedula', 'M', '25278612', 'Clen', 'Vielma', '1994-09-30', 'Miranda', 'San Antonio de los Altos','N/A','N/A','A+', NULL, NULL);
INSERT INTO `entrenador` (`id`, `persona_id`, `especialidad`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Entrenador', NULL, NULL);

INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, '100% BANCO, BANCO UNIVERSAL C.A', '0156', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCAMIGA, BANCO MICROFINANCIERO C.A', '0172', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCARIBE C.A. BANCO UNIVERSAL', '0114', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO ACTIVO', '0171', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO CARONI C.A. BANCO UNIVERSAL', '0128', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO DE LA FANB', '0177', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO DE VENEZUELA', '0102', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO DEL TESORO', '0163', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO EXTERIOR C.A. BANCO UNIVERSAL', '0115', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO MERCANTIL', '0105', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO NACIONAL DE CREDITO', '0191', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO OCCIDENTAL DE DESCUENTO', '0116', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO PLAZA, BANCO UNIVERSAL', '0138', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO PROVINCIAL', '0108', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCO SOFITASA', '0137', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCRECER, S.A. BANCO MICROFINANCIERO', '0168', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANESCO BANCO UNIVERSAL S.A.C.A', '0134', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANPLUS BANCO UNIVERSAL, C.A', '0174', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BFC BANCO FONDO COMUN', '0151', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'DELSUR BANCO UNIVERSAL C.A', '0157', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'MI BANCO, BANCO MICROFINANCIERO C.A', '0169', NULL, NULL);
INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'VENEZOLANO DE CREDITO</option', '0104', NULL, NULL);

INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '1', 'elevacionderodillajpg.jpg', 'Elevación de rodillas', 'En una barra fija colocar las manos al ancho de los hombros', 'Movimiento ascendente con las piernas', 'Inspirar al momento de ascender y exhalar al extender','Psoas iliaco y recto anterior', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '1', 'curlabdominal.png', 'Curl abdominal', 'Acostado, ambas manos detrás de la cabeza', 'Movimiento ascendente contrayendo el abdomen', 'Inspirar al momento de ascender y exhalar al extender','Recto abdominal superior y oblicuos', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '1', 'bicicleta.jpg', 'Bicicleta en el aire', 'Acostado y piernas recogidas en 90 grados', 'Movimiento de contracción del abdomen', 'Inspirar al momento de ascender y exhalar al extender','Psoas iliaco y tensor de la fascia lata', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '2', 'curldebiceps1.jpg', 'Curl de biceps tipo martillo', 'De pie, una mancuerna en cada mano al ancho de los hombros', 'Movimiento ascendente hacia el centro del cuerpo', 'Inspirar al momento de ascender y exhalar al extender','Biceps braquial y braquial anterior', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Press-francés.jpg', 'Press francés en banco', 'Acostado brazo extendido por encima del pecho', 'Movimiento descendente de extensión de los codos', 'Inspirar al momento de ascender y exhalar al extender','Triceps', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '2', 'Extensión-de-tríceps-en-polea-alta.jpg', 'Extensión de triceps en polea', 'De pie al ancho de los hombros con los brazos flexionados', 'Movimiento descendente de contracción de los triceps', 'Inspirar al momento de ascender y exhalar al extender','Triceps', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '3', 'Jalón-o-Polea-al-pecho.jpg', 'Polea al pecho', 'Sentado con barra y espalda recta', 'Tirar de la barra y llevarla al pecho', 'Inspirar al momento de contracción y exhalar al extender','Espalda, trapecio y romboide', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '3', 'remo-en-maquina.jpg', 'Remo en máquina', 'Sentado pecho apoyado y brazos extendidos', 'Movimiento de contracción de la espalda, llevando los brazos hacia atrás', 'Inspirar al momento de contracción y exhalar al extender','Dorsal ancho, redondo mayor, deltoide y trapecio', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '3', 'peso_muerto.jpg', 'Peso muerto', 'Agachado, espalda recta y tronco inclinado', 'Movimiento ascendente de contracción, estirando las piernas', 'Inspirar al momento de contracción y exhalar al extender','Espalda, trapecio y glúteos', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Press-tras-nuca-con-barra.jpg', 'Press trasnuca con barra', 'Sentado, espalda recta con la barra tomada', 'Movimiento de press vertical con barra', 'Inspirar al movimiento descendente y exhalar a la posición inicial','Trapecio, triceps y deltoide', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Elevaciones-laterales-con-mancuernas.jpg', 'Elevación lateral con mancuerna', 'De pie, espalda recta con brazos paralelos al cuerpo', 'Movimiento ascendente llevando las mancuernas a la altura de los hombros', 'Inspirar al efectuar el movimiento ascendente y exhalar a la posicion inicial','Deltoides y trapecio', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '4', 'remo_al_cuello.jpg', 'Remo al cuello', 'De pie, espalda recta con brazos al frente', 'Movimiento ascendente llevando la barra hasta el mentón', 'Inspirar al efectuar el movimiento ascendente y exhalar a la posición inicial','Deltoide y trapecio', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '5', 'press_de_banca.jpg', 'Press de banca', 'Acostado boca arriba', 'Sostener la barra más ancho que los hombros', 'Inspirar al hacer el momento descendente y exhalar al realizar el momento ascendente','Pectoral, hombros y triceps', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '5', 'apertura_con_mancuerna.jpg', 'Aperturas con mancuerna', 'Acostado boca arriba sobre un banco', 'Sostener las mancuernas con los brazos estirados', 'Inspirar al momento de contracción y exhalar al extender','Pectoral, hombros y triceps', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '5', 'pullover.jpg', 'Pull over con barra', 'Apoyar la espalda en un banco', 'Sostener la barra con los brazos extendidos', 'Inspirar al momento de hacer el movimiento descendente y exhalar al ascendente','Pectoral, hombros y triceps', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '6', 'Sentadilla.jpg', 'Sentadillas', 'De pie, con las piernas abiertas y la barra sobre el trapecio', 'Movimiento descendente flexionando las rodillas', 'Inspirar al momento de hacer el movimiento descendente y exhalar a la posicion inicial','Cuádriceps, glúteos y biceps femoral', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '6', 'prensa.jpg', 'Prensa', 'Colocado sobre la máquina y los pies en la plataforma', 'Descienda flexionando ambas rodillas y luego empuje el peso', 'Inspirar al momento de hacer el movimiento descendente y exhalar a la posicion inicial','Cuádriceps, glúteos y biceps femoral', '1', NULL, NULL);
INSERT INTO `ejercicios` (`id`, `zona`, `img`, `nombre`, `posicion`, `ejecucion`, `respiracion`, `musculos`, `estatus`, `created_at`, `updated_at`) VALUES (NULL, '6', 'Extensión-de-piernas-en-máquina.jpg', 'Extensión', 'Sentado a la máquina con ambos pies en los rodillos', 'Efectuar una extensión de piernas', 'Inspirar al momento de hacer el movimiento de extensión y exhalar a la posicion inicial','Cuádriceps', '1', NULL, NULL);

INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Leche entera', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Leche sin lactosa', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Leche de soja', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Leche de arroz', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Leche de almendra', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Leche descremada', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Cuajada', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Nata', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Queso', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Yogurt', NULL, NULL);
INSERT INTO `leche` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Natilla', NULL, NULL);

INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Carne roja', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Carne blanca', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Carne de vacuno', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Carne de ave', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Carne de cerdo', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Carne de conejo', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Merluza', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Rape', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Bacalao', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Rubina', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Anchoa', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Sardina', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Atún', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Salmón', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Trucha', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Dorado', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Huevos de gallina', NULL, NULL);
INSERT INTO `carnes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Huevos de codorniz', NULL, NULL);

INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Alfalfa', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Arvejas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Guisantes', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Frijoles', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Lentejas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Caraotas rojas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Caraotas negras', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Caraotas blancas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Habas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Vainitas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Almendras', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Avellanas', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Nueces', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Cacahuate', NULL, NULL);
INSERT INTO `legumbres` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Maní', NULL, NULL);

INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Apio', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Alcachofa', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Coliflor', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Cebolla', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Lechuga', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Remolacha', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Rabano', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Repollo', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Tomate', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Pepino', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Pimiento', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Espinacas', NULL, NULL);
INSERT INTO `hortalizas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Zanahoria', NULL, NULL);

INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Albaricoques', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Cereza', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Ciruela', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Frambuesa', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Fresa', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Naranja', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Mango', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Manzana', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Durazno', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Melocoton', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Melón', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Mora', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Lechoza', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Piña', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Pera', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Patilla', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Uva', NULL, NULL);
INSERT INTO `frutas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Mamón', NULL, NULL);

INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Arroz', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Maíz', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Trigo', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Centeno', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Avena', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Cebada', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Sorgo', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Quinoa', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Farro', NULL, NULL);
INSERT INTO `cereales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Semillas de seno', NULL, NULL);

INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de linaza', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de sésamo', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de argán', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de canola', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de coco', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de girasol', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de soja', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Aceite de maíz', NULL, NULL);
INSERT INTO `aceites` (`id`, `nombre`, `created_at`, `updated_at`) VALUES (NULL, 'Manteca vegetal', NULL, NULL);