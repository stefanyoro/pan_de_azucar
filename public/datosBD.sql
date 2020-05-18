INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES (NULL, 'Administrador', 'Administrador', NULL, NULL), (NULL, 'Entrenador', 'Entrenador', NULL, NULL), (NULL, 'Nutricionista', 'Nutricionista', NULL, NULL), (NULL, 'Corredor', 'Corredor', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'administrador', 'admin@admin.com', '$2y$10$RGfpQ643xb1.KYiRm5NWoujC3P/3ARhHAb6xJk0da.qAdrFIr.Y4C', '1', NULL, NULL, NULL);

INSERT INTO `persona` (`id`, `user_id`, `nacionalidad`, `tipo_doc`, `sexo`, `numero_doc`, `nombre`, `apellido`, `fecha_nac`, `direccion`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Venezolano', 'cedula', 'M', 'N/A', 'administrador', 'administrador', '2020-05-12', 'N/A', NULL, NULL);

INSERT INTO `administrador` (`id`, `persona_id`, `especialidad`, `grado_Instrucc`, `created_at`, `updated_at`) VALUES (NULL, '1', 'administrador', 'bachiller', NULL, NULL);

INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, 'BANCARIBE C.A. BANCO UNIVERSAL', '0114', NULL, NULL);

INSERT INTO `banco` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES (NULL, '100% BANCO, BANCO UNIVERSAL C.A.', '0156', NULL, NULL);