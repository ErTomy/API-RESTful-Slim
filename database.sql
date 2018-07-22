CREATE TABLE `clientes` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	`nombre` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`apellidos` VARCHAR(100) NOT NULL COLLATE 'utf8_unicode_ci',
	`email` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	`telefono` VARCHAR(10) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `clientes_email_uniq` (`email`)
);


CREATE TABLE `conductores` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	`nombre` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`token` VARCHAR(100) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `conductores_token_unique` (`token`)
);


CREATE TABLE `pedidos` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	`cliente_id` INT(10) UNSIGNED NOT NULL,
	`conductor_id` INT(10) UNSIGNED NOT NULL,
	`fecha_entrega` DATE NOT NULL,
	`hora_desde` INT(11) NOT NULL,
	`hora_hasta` INT(11) NOT NULL,
	`direccion` VARCHAR(250) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`),
	INDEX `pedidos_cliente_id_foreign` (`cliente_id`),
	INDEX `pedidos_conductor_id_foreign` (`conductor_id`),
	CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
	CONSTRAINT `pedidos_conductor_id_foreign` FOREIGN KEY (`conductor_id`) REFERENCES `conductores` (`id`)
);