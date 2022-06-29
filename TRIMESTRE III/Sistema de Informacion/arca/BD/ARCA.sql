-- * Tablas

-- Usuarios
create DATABASE arca;
use arca;


create table tipo_documento(
    idTDD varchar(10) not null,
    nombreTDD varchar(45) not null,
    primary key(idTDD)
);

create table usuario(
    fk_pk_tipo_documentoU varchar(10) not null,
    documento_U int not null,
    pNombre_U varchar(30) not null,
    sNombre_U varchar(30) null,
    pApellido_U varchar(30) not null,
    sApellido_U varchar(30) null,
    fechaNacimiento_U date null,
    direccion_U varchar(40) null,
    correoElectronico_U varchar(45) not null,
    telefono_U bigint not null,
    claveU varchar(20) not null,
    fk_pregunta_seg int null,
    resp_preg varchar(100) null,
    primary key(documento_U, fk_pk_tipo_documentoU)
);

create table pregunta_seguridad (
    n_pregunta int not null, 
    pregunta_seg varchar(100) not null,
    estado_pregunta boolean not null,
    primary key(n_pregunta)
); 

create table roles (
    cod_rol int not null,
    desc_rol varchar(30) not null,
    primary key (cod_rol)
);

create table usuario_has_roles (
    usuario_tdoc varchar(10) not null,
    usuario_id int not null,
    usuario_rol int not null,
    estado_rol boolean not null,
    primary key (usuario_tdoc, usuario_id, usuario_rol)
);

create table paciente(
    fk_pk_usuario_TipoDocumento varchar(10) not null,
    fk_pk_usuario_Documento_U int not null,
    EPS_P varchar(20) null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

create table especialidad (
    idEspecialidad int not null auto_increment,
    nombreEspecialidad varchar(45) not null,
    primary key (idEspecialidad)
);


create table doctor (
    fk_pk_usuario_TipoDocumento varchar(10) not null,
    fk_pk_usuario_Documento_U int not null,
    fk_especialidad int null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

create table secretaria (
    fk_pk_usuario_TipoDocumento varchar(10) not null,
    fk_pk_usuario_Documento_U int not null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

create table administrador (
    fk_pk_usuario_TipoDocumento varchar(10) not null,
    fk_pk_usuario_Documento_U int not null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

-- Citas

create table citasAgendadas(
    idCitas int NOT NULL auto_increment,
    dia_hora_cita datetime,
    estadoCita tinyint,
    Observaciones varchar(45),
    fk_pk_idTipocita int,
    fk_paciente_TipoDocumento varchar(10) not null,
    fk_paciente_Documento_U int not null,
    fk_doctor_TipoDocumento varchar(10) not null,
    fk_doctor_Documento_U int not null,
    primary key(idCitas, fk_pk_idTipocita)
);

create table tiposdecita(
    idTiposCita int NOT NULL auto_increment,
    NombreTipoCita varchar(45),
    primary key(idTiposCita)
);

-- PQRSF

create table tipoPQRSF(
    idTipoPQRSF INT NOT NULL auto_increment,
    TipoPQRSF varchar(20) NOT NULL,
    PRIMARY KEY (idTipoPQRSF)
);

create table PQRSF(
    NumeroRadicacion INT NOT NULL auto_increment,
    MotivoPQRSF varchar(50) NOT NULL,
    RazonesApoyoPQRSF LONGBLOB NOT NULL,
    FechaPQRSF DATE NOT NULL,
    EstadoPQRSF TINYINT NOT NULL,
    fk_pk_idTipoPQRSF INT NOT NULL,
    fk_usuario_TipoDocumento varchar(10) not null,
    fk_usuario_Documento_U int not null,
    PRIMARY KEY (NumeroRadicacion, fk_pk_idTipoPQRSF)
);

-- * Relaciones 

-- Usuario - tipo documento
alter table usuario
add foreign key(fk_pk_tipo_documentoU) references tipo_documento(idTDD);

--Usuario - pregunta seguridad
alter table usuario
add foreign key (fk_pregunta_seg) references pregunta_seguridad(n_pregunta);

-- Usuario - paciente
alter table paciente
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references usuario(fk_pk_tipo_documentoU, documento_U);

-- Usuario - Secretaria
alter table secretaria
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references usuario(fk_pk_tipo_documentoU, documento_U);

-- Usuario - admin
alter table administrador
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references usuario(fk_pk_tipo_documentoU, documento_U);

-- Usuario - doctor
alter table doctor
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references usuario(fk_pk_tipo_documentoU, documento_U);

-- doctor - especialidad
alter table doctor
add foreign key(fk_especialidad) references especialidad(idEspecialidad);

-- TipoPqrsf - pqrsf
alter table PQRSF
add foreign key(fk_pk_idTipoPQRSF) references tipoPQRSF(idTipoPQRSF);

-- PQRSF - Paciente
alter table PQRSF
add foreign key(fk_usuario_TipoDocumento, fk_usuario_Documento_U) references paciente(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U);

-- Citas agendadas - tipoCita
alter table citasAgendadas
add foreign key(fk_pk_idTipocita) references tiposdecita(idTiposCita);

-- Citas agendadas - Paciente
alter table citasAgendadas
add foreign key(fk_paciente_TipoDocumento,fk_paciente_Documento_U) references paciente(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U);

-- Citas agendadas - doctor
alter table citasAgendadas
add foreign key(fk_doctor_TipoDocumento, fk_doctor_Documento_U) references doctor(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U);

alter table usuario_has_roles
add foreign key(usuario_tdoc, usuario_id) references usuario(fk_pk_tipo_documentoU, documento_U);




-- Insercion de datos

insert into tipo_documento (idTDD,nombreTDD)
values ('TI', 'Tarjeta de Identidad'),
('CC', 'Cédula de Ciudadanía'),
('CE', 'Cédula de Extranjería');

insert into roles values (1, 'Administrador'), (2, 'Secretaria'), (3, 'Doctor'), (4, 'Paciente');

INSERT INTO `pregunta_seguridad`(`n_pregunta`, `pregunta_seg`, `estado_pregunta`) 
VALUES ('1','¿Cuál era el nombre de su primera mascota?','1'), 
('2','¿Cual es el nombre de la ciudad en la que naciste?','1');

insert into usuario (documento_U,pNombre_U,sNombre_U,pApellido_U,sApellido_U,fechaNacimiento_U,direccion_U,correoElectronico_U,telefono_U,claveU,fk_pk_tipo_documentoU, fk_pregunta_seg, resp_preg) values
(52876456,'Juan','Daniel','Rojas','Diaz','1974-02-25','Carrera 49B #60-50','rojas23@arca.com',3024567687,'PAtERNiX', 'CC', null, null),
(721827383,'Yeraldin','Marcela','Vega','Sanchez','1994-12-08','Calle 45 No 60-32','vega4965@arca.com',3145604949,'OunChLIc', 'CC', null, null),
(1023937291,'Alejandra','Maria','Vargas','Torres', '2006-12-20','Av. Ciudad de Cali No. 6C-09','maleja67@gmail.com',3058765432,'ZvXfkeZD', 'TI', 1, 'Titan'),
(9876256,'Daniela','Maria','Beltran','Jimenez','1967-11-06','Cra 90b #50A-12','beltran4051@arca.com',3118765421,'pqYXkNVc', 'CC', null, null),
(748323632,'Pablo','Jose','Cortez','Blanco','1983-04-06','Calle 48b sur No. 21-13','pablito73@outlook.com',3129876543,'SbbArGDh', 'CE', 2, 'Bogota'),
(1049204933,'Carlos','Manuel','Soler','Rosas','1985-10-10','Calle 90B sur #13-27','soler52@arca.com',3132095640,'amgCtEdr', 'CC', null, null),
(1034586848,'Andres','','Escobar','Castiblanco','1987-09-03','Carrera 29B #10-15','pablito67@arca.com',3156633198,'TroNTEro', 'CC', null, null),
(1019877654,'Jorge','','VIlla','Sanchez', '1993-10-09','Calle 10A #20-19','villa4032@arca.com',3056786452,'plIGhTRE', 'CC', null, null),
(12673126,'Tatiana','','Ospina','Martinez','1999-05-19','Avenida Cra. 60 No. 57-60','taty999@gmail.com',3202876543,'orEdUght', 'CC', 2, 'Santa Marta'),
(1203827182,'Carlos','Emmanuel','Cruz','Ramirez','2007-09-07','Calle 24 No 5-60','caemcruz32@gmail.com',3117865243,'HYDRomIs', 'TI', 1, 'Max'),
(102128331,'Santiago','','Flores','Gomez','1970-04-27','Calle 43 No. 27-12','flores3261@arca.com',3145439850,'CierSuPi', 'CC', null, null),
(1018726753,'Flor','','Amaya','Arevalo','1995-05-07','Cra 97c #47C - 78','arevalo45@arca.com',3027685642,'weACOCKp', 'CE', null, null),
(281379387,'Maria','Jose','Perez','Rojas','1999-3-11','Calle 11 No. 4 - 14','maria32@outlook.com',3219787661,'UryonTrA', 'CE', 2, 'Bogota'),
(1040340344,'Martha','Cecilia','Fonseca','Acevedo','2005-05-20','Av. Ciudad de Cali No. 9C-76','acevado@arca.com',3145439851,'nSCRUETi', 'CC', null, null);

insert into administrador (fk_pk_usuario_Documento_U,fk_pk_usuario_TipoDocumento)
values (102128331,'CC'),		
(1040340344,'CC');

insert into secretaria (fk_pk_usuario_Documento_U,fk_pk_usuario_TipoDocumento)
values 	(1049204933,'CC'),	
(1034586848,'CC');

insert into especialidad (idEspecialidad,nombreEspecialidad)
values (41,'Medico General'),
(42,'Psicologo');

insert into paciente (fk_pk_usuario_Documento_U,fk_pk_usuario_TipoDocumento,EPS_P) VALUES
(281379387,'CE','Sanitas'),
(1203827182,'TI','Cafam'),		
(1023937291,'TI','Sura'),
(748323632,'CE','Compensar'),		
(12673126,'CC','Sura');


insert into doctor (fk_pk_usuario_Documento_U,fk_pk_usuario_TipoDocumento,fk_especialidad)
values (52876456,'CC',41),
(721827383,'CC',42),
(9876256,'CC',42),
(1019877654,'CC',41),
(1018726753,'CE',41);

insert into tiposdecita (idTiposCita,NombreTipoCita)
values (501,'General'),
(502,'Psicologo');

INSERT INTO `citasAgendadas` (`idCitas`, `dia_hora_cita`, `estadoCita`, `Observaciones`, `fk_pk_idTipocita`, `fk_paciente_TipoDocumento`, `fk_paciente_Documento_U`, `fk_doctor_TipoDocumento`, `fk_doctor_Documento_U`) VALUES ('701', '2022-06-06 14:00:00', '1', 'Se nota una leve mejoría', '501', 'CE', '281379387', 'CC', '52876456'), 
('702', '2022-03-18 09:00:00', '1', 'Su avance no ha sido el esperado', '502', 'TI', '1023937291', 'CC', '721827383'), 
('703', '2022-07-23 16:00:00', '0', 'c', '502', 'TI', '1023937291', 'CC', '9876256'), 
('704', '2022-11-26 12:30:00', '0', 'c', '501', 'CE', '748323632', 'CC', '1019877654'), 
('705', '2022-04-14 17:00:00', '1', 'Su avance no ha sido el esperado', '501', 'CC', '12673126', 'CE', '1018726753');

insert into tipoPQRSF (idTipoPQRSF,TipoPQRSF)
values (1001,'Queja'),
(1002,'Felicitaciones'),
(1003,'Peticiones'),
(1004,'Reclamos'),
(1005,'Sugerencias');

insert into PQRSF (NumeroRadicacion,MotivoPQRSF,RazonesApoyoPQRSF,FechaPQRSF,EstadoPQRSF,fk_pk_idTipoPQRSF,fk_usuario_TipoDocumento,fk_usuario_Documento_U)
values (43245,'No permite descargar informe','El sistema no permite descargar el informe de la cita del dia 03-06-2021','2021-06-04', 0 ,1001,'CE',281379387),
(53522,'Buena interfaz del sistema','Felicitacion por la buena interfaz que tiene el sistema','2021-07-15',1,1002,'TI',1203827182),
(36652,'Dificultades para obtener cita medica','Desde el dia 15-05-2050 no he podido programar una cita medica.','2022-05-22',1,1004,'TI',1023937291),
(87262,'Sugerencia de diseno','La letra podria ser mas grande para mayor visibilidad.','2021-09-08',0,1005,'CC',12673126);


insert into usuario_has_roles values 
('CC', 52876456, 3, 1),
('CC', 721827383, 3, 1),
('TI', 1023937291, 4, 1),
('CC', 9876256, 3, 1),
('CE', 748323632, 4, 1),
('CC', 1049204933, 2, 1),
('CC', 1034586848, 2, 1),
('CC', 1019877654, 3, 1),
('CC', 12673126, 4, 1),
('TI', 1203827182, 4, 1),
('CC', 102128331, 1, 1),
('CE', 1018726753, 3, 1),
('CE', 281379387, 4, 1),
('CC', 1040340344, 1, 1);
create table pqrs(
    tipo_documento varchar(30)not null,
    documento_ int not null,
    pNombre_ varchar(30) not null,
    sNombre_ varchar(30) null,
    pApellido_ varchar(30) not null,
    sApellido_ varchar(30) null,
    Numero_telefono int (15)not null,
    Telefono_fijo int (10)not null,
    Correo date null,
    Tipo_de_solucitud varchar(20)not null,
    fechaRadicacion date null,
    Motivopqrs varchar(30) not null,
    Detallepqrs varchar(40) not null,
    Adjuntar_soporte  date not null
    );