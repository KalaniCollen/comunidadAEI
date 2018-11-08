-- phpmyadmin sql dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- servidor: 127.0.0.1
-- tiempo de generación: 07-11-2018 a las 22:46:35
-- versión del servidor: 10.1.34-mariadb
-- versión de php: 5.6.37

set sql_mode = "no_auto_value_on_zero";
set autocommit = 0;
start transaction;
set time_zone = "+00:00";


/*!40101 set @old_character_set_client=@@character_set_client */;
/*!40101 set @old_character_set_results=@@character_set_results */;
/*!40101 set @old_collation_connection=@@collation_connection */;
/*!40101 set names utf8 */;

--
-- base de datos: `aei`
--
create database if not exists `aei` default character set utf8 collate utf8_swedish_ci;
use `aei`;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `album`
--

create table `album` (
  `id_album` int(11) not null,
  `nombre` varchar(255) not null,
  `slug_album` varchar(255) not null,
  `created_at` timestamp not null default current_timestamp on update current_timestamp,
  `updated_at` timestamp not null default '0000-00-00 00:00:00',
  `id_usuario` int(11) not null
) engine=innodb default charset=utf8;

--
-- estructura de tabla para la tabla `bolsa_trabajo`
--

create table `bolsa_trabajo` (
  `id_trabajo` int(11) not null,
  `nombre` varchar(255) not null,
  `descripcion` varchar(255) not null,
  `created_at` timestamp not null default current_timestamp on update current_timestamp,
  `updated_at` timestamp not null default '0000-00-00 00:00:00'
) engine=innodb default charset=utf8;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `evento`
--

create table `evento` (
  `id_evento` int(10) unsigned not null,
  `nombre_evento` varchar(191) collate utf8_spanish2_ci not null,
  `descripcion_evento` longtext collate utf8_spanish2_ci not null,
  `fecha_registro_evento` datetime not null,
  `hora_inicio` time default null,
  `direccion_evento` longtext collate utf8_spanish2_ci not null,
  `num_invitados` int(10) unsigned not null default '0',
  `costo` int(10) unsigned not null default '0',
  `ponente` varchar(191) collate utf8_spanish2_ci not null default 'ninguno',
  `organizador` varchar(191) collate utf8_spanish2_ci not null,
  `correo_electronico_organizador` varchar(191) collate utf8_spanish2_ci not null,
  `telefono_organizador` bigint(20) unsigned not null default '0',
  `estado_evento` tinyint(1) not null default '0',
  `slug` varchar(255) collate utf8_spanish2_ci not null,
  `id_usuario` int(10) unsigned default null,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `imagenes`
--

create table `imagenes` (
  `id_imagen` int(11) not null,
  `direccion` varchar(255) not null,
  `created_at` timestamp not null default current_timestamp on update current_timestamp,
  `updated_at` timestamp not null default '0000-00-00 00:00:00',
  `id_album` int(11) not null
) engine=innodb default charset=utf8;

--
-- estructura de tabla para la tabla `migrations`
--

create table `migrations` (
  `id` int(10) unsigned not null,
  `migration` varchar(191) collate utf8_spanish2_ci not null,
  `batch` int(11) not null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `notificacion_administrador`
--

create table `notificacion_administrador` (
  `id_notificacion` int(10) unsigned not null,
  `descripcion` longtext collate utf8_spanish2_ci not null,
  `visto` tinyint(1) not null default '0',
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null,
  `id_usuario` int(10) unsigned default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `password_resets`
--

create table `password_resets` (
  `email` varchar(191) collate utf8_spanish2_ci not null,
  `token` varchar(191) collate utf8_spanish2_ci not null,
  `created_at` timestamp null default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `perfil_empresa`
--

create table `perfil_empresa` (
  `id_empresa` int(10) unsigned not null,
  `nombre_empresa` varchar(191) collate utf8_spanish2_ci default 'sin nombre',
  `tipo_empresa` varchar(191) collate utf8_spanish2_ci default 'publica',
  `giro_empresa` varchar(191) collate utf8_spanish2_ci not null default 'comercial',
  `servicio_empresa` varchar(191) collate utf8_spanish2_ci default 'ninguno',
  `producto_empresa` varchar(191) collate utf8_spanish2_ci default 'ninguno',
  `logo_empresa` varchar(191) collate utf8_spanish2_ci not null default '/storage/img/empresa.png',
  `horario_atencion` varchar(191) collate utf8_spanish2_ci default null,
  `telefono_fijo_empresa` bigint(20) unsigned default null,
  `correo_electronico_empresa` varchar(191) collate utf8_spanish2_ci default null,
  `direccion_empresa` longtext collate utf8_spanish2_ci,
  `red_social_twitter_empresa` varchar(191) collate utf8_spanish2_ci default null,
  `pag_web_empresa` varchar(191) collate utf8_spanish2_ci default null,
  `red_social_facebook_empresa` varchar(191) collate utf8_spanish2_ci default null,
  `red_social_instagram` varchar(191) collate utf8_spanish2_ci default null,
  `descripcion` varchar(255) collate utf8_spanish2_ci default null,
  `mis_logros` text collate utf8_spanish2_ci,
  `slug_empresa` varchar(150) collate utf8_spanish2_ci not null,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null,
  `id_usuario` int(10) unsigned default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

--
-- estructura de tabla para la tabla `perfil_usuario`
--

create table `perfil_usuario` (
  `id_perfil` int(10) unsigned not null,
  `fecha_nacimiento` date not null,
  `sexo` varchar(191) collate utf8_spanish2_ci not null,
  `imagen` varchar(191) collate utf8_spanish2_ci not null default '/storage/img/download.png',
  `telefono_movil` bigint(12) default null,
  `privacidad` tinyint(4) default '0',
  `correo_electronico` varchar(255) collate utf8_spanish2_ci default 'example@dominio.com',
  `red_social` varchar(255) collate utf8_spanish2_ci default 'mi red social',
  `slug_usuario` varchar(150) collate utf8_spanish2_ci not null,
  `created_at` timestamp not null default current_timestamp on update current_timestamp,
  `updated_at` timestamp not null default '0000-00-00 00:00:00',
  `id_usuario` int(10) unsigned default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

--
-- estructura de tabla para la tabla `registro_evento`
--

create table `registro_evento` (
  `id_registro_evento` int(10) unsigned not null,
  `fecha_registro_evento` datetime not null,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null,
  `id_usuario` int(10) unsigned default null,
  `id_evento` int(10) unsigned default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `registro_invitado_evento`
--

create table `registro_invitado_evento` (
  `id_invitado` int(10) unsigned not null,
  `nombre_invitado` varchar(191) collate utf8_spanish2_ci not null,
  `apellido_invitado` varchar(191) collate utf8_spanish2_ci not null,
  `correo_electronico_invitado` varchar(191) collate utf8_spanish2_ci not null,
  `edad_invitado` int(10) unsigned not null,
  `sexo_invitado` varchar(191) collate utf8_spanish2_ci not null,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null,
  `id_usuario` int(10) unsigned default null,
  `id_evento` int(10) unsigned default null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `users`
--

create table `users` (
  `id_usuario` int(10) unsigned not null,
  `name` varchar(255) collate utf8_spanish2_ci not null,
  `apellido_paterno` varchar(191) collate utf8_spanish2_ci not null,
  `apellido_materno` varchar(191) collate utf8_spanish2_ci not null,
  `email` varchar(191) collate utf8_spanish2_ci not null,
  `password` varchar(191) collate utf8_spanish2_ci not null,
  `tipo_usuario` varchar(191) collate utf8_spanish2_ci not null default 'no asociado',
  `privilegios_administrador` tinyint(1) not null default '0',
  `status` tinyint(1) not null default '0',
  `notificacion_correo` tinyint(4) default '0',
  `confirmation_code` varchar(191) collate utf8_spanish2_ci default null,
  `remember_token` varchar(100) collate utf8_spanish2_ci default null,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null,
  `slug_empresa` varchar(150) collate utf8_spanish2_ci not null,
  `slug_usuario` varchar(150) collate utf8_spanish2_ci not null
) engine=innodb default charset=utf8 collate=utf8_spanish2_ci;

--
-- estructura de tabla para la tabla `videos`
--

create table `videos` (
  `id_video` int(11) not null,
  `codigo` varchar(255) not null,
  `enlace` varchar(255) not null,
  `tipo` varchar(10) not null,
  `created_at` timestamp not null default current_timestamp on update current_timestamp,
  `updated_at` timestamp not null default '0000-00-00 00:00:00',
  `id_usuario` int(11) not null
) engine=innodb default charset=utf8;


create table `productos` (
    `id_producto` int(11) unsigned not null,
    `nombre` varchar(210) not null,
    `costo` float(15,2) unsigned not null,
    `imagen` varchar(250) not null,
    `descripcion` text not null,
    `tipo` varchar(200) not null,
    `slug` varchar(250) not null,
    `id_usuario` int(11) unsigned not null,
    `descuento` int(10) unsigned not null default '0',
    `created_at` timestamp null default null,
    `updated_at` timestamp null default null
) engine=innodb default charset=utf8;

-- --------------------------------------------------------

--
-- estructura de tabla para la tabla `servicios`
--

create table `servicios` (
    `id_servicio` int(11) unsigned not null,
    `nombre` varchar(210) default null,
    `imagen` varchar(250) default null,
    `descripcion` text,
    `tipo` varchar(200) default null,
    `slug` varchar(250) default null,
    `id_usuario` int(11) unsigned not null,
    `descuento` int(10) unsigned default '0',
    `horario_inicio` time default null,
    `horario_cierre` time default null,
    `created_at` timestamp null default current_timestamp on update current_timestamp,
    `updated_at` timestamp null default '0000-00-00 00:00:00'
) engine=innodb default charset=utf8;

--
-- índices para tablas volcadas
--

--
-- indices de la tabla `album`
--
alter table `album`
  add primary key (`id_album`),
  add key `id_usuario` (`id_usuario`);

--
-- indices de la tabla `bolsa_trabajo`
--
alter table `bolsa_trabajo`
  add primary key (`id_trabajo`);

--
-- indices de la tabla `evento`
--
alter table `evento`
  add primary key (`id_evento`),
  add unique key `evento_correo_electronico_organizador_unique` (`correo_electronico_organizador`),
  add key `evento_id_usuario_foreign` (`id_usuario`);

--
-- indices de la tabla `imagenes`
--
alter table `imagenes`
  add primary key (`id_imagen`),
  add key `id_album` (`id_album`);

--
-- indices de la tabla `migrations`
--
alter table `migrations`
  add primary key (`id`);

--
-- indices de la tabla `notificacion_administrador`
--
alter table `notificacion_administrador`
  add primary key (`id_notificacion`),
  add key `notificacion_administrador_id_usuario_foreign` (`id_usuario`);

--
-- indices de la tabla `password_resets`
alter table `password_resets`
--
  add key `password_resets_email_index` (`email`);

--
-- indices de la tabla `productos`
--
alter table `productos`
add primary key (`id_producto`),
add unique key `slug` (`slug`),
add key `fk_usr_prod` (`id_usuario`);

--
-- indices de la tabla `servicios`
--
alter table `servicios`
add primary key (`id_servicio`),
add unique key `slug` (`slug`),
add key `fk_usr_serv` (`id_usuario`);

--
-- indices de la tabla `perfil_empresa`
--
alter table `perfil_empresa`
  add primary key (`id_empresa`),
  add unique key `slug_empresa` (`slug_empresa`),
  add unique key `perfil_empresa_correo_electronico_empresa_unique` (`correo_electronico_empresa`),
  add unique key `perfil_empresa_red_social_twitter_empresa_unique` (`red_social_twitter_empresa`),
  add unique key `perfil_empresa_pag_web_empresa_unique` (`pag_web_empresa`),
  add unique key `perfil_empresa_red_social_facebook_empresa_unique` (`red_social_facebook_empresa`),
  add unique key `perfil_empresa_red_social_instagram_unique` (`red_social_instagram`),
  add key `perfil_empresa_id_usuario_foreign` (`id_usuario`);

--
-- indices de la tabla `perfil_usuario`
--
alter table `perfil_usuario`
  add primary key (`id_perfil`),
  add unique key `slug_usuario` (`slug_usuario`),
  add key `perfil_usuario_id_usuario_foreign` (`id_usuario`);

--
-- indices de la tabla `registro_evento`
--
alter table `registro_evento`
  add primary key (`id_registro_evento`),
  add key `registro_evento_id_usuario_foreign` (`id_usuario`),
  add key `registro_evento_id_evento_foreign` (`id_evento`);

--
-- indices de la tabla `registro_invitado_evento`
--
alter table `registro_invitado_evento`
  add primary key (`id_invitado`),
  add unique key `registro_invitado_evento_correo_electronico_invitado_unique` (`correo_electronico_invitado`),
  add key `registro_invitado_evento_id_usuario_foreign` (`id_usuario`),
  add key `registro_invitado_evento_id_evento_foreign` (`id_evento`);

--
-- indices de la tabla `users`
--
alter table `users`
  add primary key (`id_usuario`),
  add unique key `users_email_unique` (`email`),
  add unique key `slug_usuario` (`slug_usuario`),
  add unique key `slug_empresa` (`slug_empresa`);

--
-- indices de la tabla `videos`
--
alter table `videos`
  add primary key (`id_video`),
  add key `id_usuario` (`id_usuario`);

--
-- auto_increment de las tablas volcadas
--

--
-- auto_increment de la tabla `album`
--
alter table `album`
  modify `id_album` int(11) not null auto_increment, auto_increment=43;

--
-- auto_increment de la tabla `bolsa_trabajo`
--
alter table `bolsa_trabajo`
  modify `id_trabajo` int(11) not null auto_increment;

--
-- auto_increment de la tabla `evento`
--
alter table `evento`
  modify `id_evento` int(10) unsigned not null auto_increment;


--
-- auto_increment de la tabla `imagenes`
--
alter table `imagenes`
  modify `id_imagen` int(11) not null auto_increment, auto_increment=11;

--
-- auto_increment de la tabla `migrations`
--
alter table `migrations`
  modify `id` int(10) unsigned not null auto_increment;

--
-- auto_increment de la tabla `notificacion_administrador`
--
alter table `notificacion_administrador`
    modify `id_notificacion` int(10) unsigned not null auto_increment;

--
-- auto_increment de la tabla `productos`
--
alter table `productos`
    modify `id_producto` int(11) unsigned not null auto_increment, auto_increment=14;

--
-- auto_increment de la tabla `servicios`
--
alter table `servicios`
    modify `id_servicio` int(11) unsigned not null auto_increment, auto_increment=25;


--
-- auto_increment de la tabla `perfil_empresa`
--
alter table `perfil_empresa`
  modify `id_empresa` int(10) unsigned not null auto_increment, auto_increment=14;

--
-- auto_increment de la tabla `perfil_usuario`
--
alter table `perfil_usuario`
  modify `id_perfil` int(10) unsigned not null auto_increment, auto_increment=14;

--
-- auto_increment de la tabla `registro_evento`
--
alter table `registro_evento`
  modify `id_registro_evento` int(10) unsigned not null auto_increment;

--
-- auto_increment de la tabla `registro_invitado_evento`
--
alter table `registro_invitado_evento`
  modify `id_invitado` int(10) unsigned not null auto_increment;

--
-- auto_increment de la tabla `users`
--
alter table `users`
  modify `id_usuario` int(10) unsigned not null auto_increment, auto_increment=14;

--
-- auto_increment de la tabla `videos`
--
alter table `videos`
  modify `id_video` int(11) not null auto_increment, auto_increment=30;

--
-- restricciones para tablas volcadas
--

--
-- filtros para la tabla `evento`
--
alter table `evento`
  add constraint `evento_id_usuario_foreign` foreign key (`id_usuario`) references `users` (`id_usuario`);

--
-- filtros para la tabla `notificacion_administrador`
--
alter table `notificacion_administrador`
  add constraint `notificacion_administrador_id_usuario_foreign` foreign key (`id_usuario`) references `users` (`id_usuario`);


--
-- filtros para la tabla `productos`
--
alter table `productos`
add constraint `fk_usr_prod` foreign key (`id_usuario`) references `users` (`id_usuario`);

--
-- filtros para la tabla `servicios`
--
alter table `servicios`
add constraint `fk_usr_serv` foreign key (`id_usuario`) references `users` (`id_usuario`);


--
-- filtros para la tabla `perfil_usuario`
--
alter table `perfil_usuario`
  add constraint `perfil_usuario_id_usuario_foreign` foreign key (`id_usuario`) references `users` (`id_usuario`);

--
-- filtros para la tabla `registro_evento`
--
alter table `registro_evento`
  add constraint `registro_evento_id_evento_foreign` foreign key (`id_evento`) references `evento` (`id_evento`),
  add constraint `registro_evento_id_usuario_foreign` foreign key (`id_usuario`) references `users` (`id_usuario`);

--
-- filtros para la tabla `registro_invitado_evento`
--
alter table `registro_invitado_evento`
  add constraint `registro_invitado_evento_id_evento_foreign` foreign key (`id_evento`) references `evento` (`id_evento`),
  add constraint `registro_invitado_evento_id_usuario_foreign` foreign key (`id_usuario`) references `users` (`id_usuario`);

--
-- filtros para la tabla `perfil_empresa`
--
alter table `perfil_empresa`
add constraint `perfil_empresa_id_usuario_foreign` foreign key (`id_usuario`) references `users` (`id_usuario`);

--
-- estructura de tabla para la tabla `calendario_eventos`
--

create table `calendario_eventos` (
  `id` int(10) unsigned not null,
  `fechaini` datetime not null,
  `fechafin` datetime default null,
  `todoeldia` tinyint(1) default null,
  `color` varchar(255) collate utf8_unicode_ci default null,
  `titulo` mediumtext collate utf8_unicode_ci,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null
) engine=innodb default charset=utf8 collate=utf8_unicode_ci;

/*!40101 set character_set_client=@old_character_set_client */;
/*!40101 set character_set_results=@old_character_set_results */;
/*!40101 set collation_connection=@old_collation_connection */;
;
