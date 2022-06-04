-- * Tablas

-- Usuarios

create table Tipo_documento(
    idTDD int not null auto_increment,
    nombreTDD varchar(45) not null,
    primary key(idTDD)
);

create table Usuario(
    documento_U int not null,
    pNombre_U varchar(15) not null,
    sNombre_U varchar(15) null,
    pApellido_U varchar(15) not null,
    sApellido_U varchar(15) null,
    fechaNacimiento_U date not null,
    direccion_U varchar(40) not null,
    correoElectronico_U varchar(45) not null,
    telefono_U int(10) not null,
    claveU varchar(20) not null,
    fk_pk_tipo_documentoU int not null,
    primary key(documento_U, fk_pk_tipo_documentoU)
);

create table Paciente(
    fk_pk_usuario_TipoDocumento int not null,
    fk_pk_usuario_Documento_U int not null,
    EPS_P varchar(20) not null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

create table Especialidad (
    idEspecialidad int not null auto_increment,
    nombreEspecialidad varchar(45) not null,
    primary key (idEspecialidad)
);


create table Doctor (
    fk_pk_usuario_TipoDocumento int not null,
    fk_pk_usuario_Documento_U int not null,
    fk_especialidad int not null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

create table Secretaria (
    fk_pk_usuario_TipoDocumento int not null,
    fk_pk_usuario_Documento_U int not null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

create table Administrador (
    fk_pk_usuario_TipoDocumento int not null,
    fk_pk_usuario_Documento_U int not null,
    primary key (fk_pk_usuario_Documento_U, fk_pk_usuario_TipoDocumento)
);

-- Citas

create table CitasAgendadas(
    idCitas int NOT NULL auto_increment,
    DiaCita date,
    HoraCita datetime,
    estadoCita tinyint,
    Observaciones varchar(45),
    fk_pk_idTipocita int,
    fk_paciente_TipoDocumento int not null,
    fk_paciente_Documento_U int not null,
    fk_doctor_TipoDocumento int not null,
    fk_doctor_Documento_U int not null,
    primary key(idCitas, fk_pk_idTipocita)
);

create table Tiposdecita(
    idTiposCita int NOT NULL auto_increment,
    NombreTipoCita varchar(45),
    primary key(idTiposCita)
);

-- PQRSF

create table TipoPQRSF(
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
    fk_usuario_TipoDocumento int not null,
    fk_usuario_Documento_U int not null,
    PRIMARY KEY (NumeroRadicacion, fk_pk_idTipoPQRSF)
);

-- * Relaciones 

-- Usuario - tipo documento
alter table Usuario
add foreign key(fk_pk_tipo_documentoU) references Tipo_documento(idTDD);

-- Usuario - paciente
alter table Paciente
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references Usuario(fk_pk_tipo_documentoU, documento_U);

-- Usuario - Secretaria
alter table Secretaria
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references Usuario(fk_pk_tipo_documentoU, documento_U);

-- Usuario - admin
alter table Administrador
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references Usuario(fk_pk_tipo_documentoU, documento_U);

-- Usuario - doctor
alter table Doctor
add foreign key(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U) references Usuario(fk_pk_tipo_documentoU, documento_U);

-- doctor - especialidad
alter table Doctor
add foreign key(fk_especialidad) references Especialidad(idEspecialidad);

-- TipoPqrsf - pqrsf
alter table PQRSF
add foreign key(fk_pk_idTipoPQRSF) references TipoPQRSF(idTipoPQRSF);

-- PQRSF - Paciente
alter table PQRSF
add foreign key(fk_usuario_TipoDocumento, fk_usuario_Documento_U) references Paciente(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U);

-- Citas agendadas - tipoCita
alter table CitasAgendadas
add foreign key(fk_idTipocita) references Tiposdecita(idTiposCita);

-- Citas agendadas - Paciente
alter table CitasAgendadas
add foreign key(fk_paciente_TipoDocumento,fk_paciente_Documento_U) references Paciente(fk_pk_usuario_TipoDocumento, fk_pk_usuario_Documento_U);

-- Citas agendadas - doctor
alter table CitasAgendadas
add foreign key(fk_doctor_TipoDocumento, fk_doctor_Documento_U) references Doctor(fk_pk_usuario_TipoDocumento, fk_pk_usuario_TipoDocumento);