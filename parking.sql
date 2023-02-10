create database parking;
use parking;
create table vehiculo(
    tipoVehiculo varchar(5) primary key,
    placaVehiculo varchar(6) 
);
create table tarifa(
    carroTarifa int(10),
    motoTarifa int(10),
    tipoVehiculo varchar(5),
    foreign key (tipoVehiculo) references vehiculo(tipoVehiculo)
);
create table parking(
    idParking int(10) auto_increment primary key,
    estadoParking bool,
    tipoVehiculo varchar(5),
    foreign key (tipoVehiculo) references vehiculo(tipoVehiculo)
);
create table registro(
    idRegistro int(10) auto_increment primary key,
    ingresoRegistro time,
    salidaRegistro time,
    idParking int(10),
    foreign key (idParking) references parking(idParking)
);

/*Registros sin salida*/ 
select *from registro r 
inner join parking p on r.idParking=p.idParking where isnull(r.salidaRegistro);

/*Registros con salidas*/
select *from registro r 
inner join parking p on r.idParking=p.idParking where !isnull(r.salidaRegistro);

/*Registros de carros*/
select *from registro r
inner join parking p on r.idParking=p.idParking where p.tipoVehiculo='carro';

/*Registros de motos*/
select *from registro r
inner join parking p on r.idParking=p.idParking where p.tipoVehiculo='moto';

/*Ver Parqueaderos y su estado*/
select *from parking;

/*Ver todos los registros*/
select *from registro;

