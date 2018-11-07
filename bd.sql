use aei;
create table productos (
  id int(11) not null auto_increment,
  nombre varchar(210) not null,
  costo float(15,2) unsigned not null,
  imagen varchar(250) not null,
  descripcion text not null,
  tipo varchar(200) not null,
  fecha_publicacion date not null,
  slug varchar(250) not null,
  constraint pk_productos primary key(id)
);

create table prestador(
  id int(11) not null auto_increment,
  nombre varchar(50) not null,
  paterno varchar(50) not null,
  materno varchar(50) not null,
  correo varchar(180) not null unique,
  telefono int(11) not null,
  constraint pk_prestador primary key(id)
);

create table telefonos (
  id int(11) not null,
  prestador int(11) not null,
  telefono varchar(20) not null,
  constraint pk_telefonos primary key(id)
);

create table servicios (
  id int(11) not null auto_increment,
  nombre varchar(210) not null,
  imagen varchar(250) not null,
  descripcion text not null,
  tipo varchar(200) not null,
  horario varchar(40) not null,
  fecha_publicacion date not null,
  slug varchar(250) not null,
  prestador int(11) not null,
  constraint pk_servicios primary key(id)
);

-- Agregando llaves foraneras
alter table prestador add constraint fk_telefono foreign key(telefono) references telefonos(id) on update restrict on delete restrict;

alter table telefonos add constraint fk_prestador_tel foreign key(prestador) references prestador(id) on update restrict on delete restrict;

alter table servicios add constraint fk_prestador foreign key(prestador) references prestador(id) on update restrict on delete restrict;
