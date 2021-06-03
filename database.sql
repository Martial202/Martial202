use caderac;
 create table client(
 	id_client int(11) not null auto_increment,
 	enseigne varchar(100) not null,
 	logo varchar(100) not null,
 	numclient varchar(100) not null,
 	codeclient varchar(100) not null,
 	NameUser varchar(100) not null,
 	password varchar(100) not null,
 	primary key(id_client)

 	);
 create table chauffeur(
     id_chauff int(11) not null auto_increment,
     Namedriver varchar(100) not null,
     firstNamesdriver varchar(100) not null,
     numdriver varchar(100) not null,
     matdriver varchar(100) not null,
     codechauf varchar(100) not null,
     id_client int(11) not null,
     primary key(id_chauff),
     foreign key(id_client) references client(id_client)
 	);

 create table bon(
     id_bon int(11) not null auto_increment,
     libelle varchar(100) not null,
     remise varchar(100) not null,
     primary key(id_bon)
 	);

 create table bordereau(
     id_bord int(11) not null auto_increment,
     refbord varchar(100) not null,
     heigth varchar(100) not null,
     nbreCharge varchar(100) not null,
     dat varchar(100) not null,
     heure varchar(100) not null,
     id_client int(11) not null,
     id_bon int(11) not null,
     foreign key(id_client) references client(id_client),
     foreign key(id_bon) references bon(id_bon),
     primary key(id_bord)
 	);
create table Facture(
     id_fact int(11) not null auto_increment,
     refFact varchar(100) not null,
     montTot varchar(100) not null,
     monaPyer varchar(100) not null,
     modepyemnt varchar(100) not null,
      dat varchar(100) not null,
     heure varchar(100) not null,
     id_bord int(11) not null,
     primary key(id_fact),
     foreign key(id_bord) references bordereau(id_bord)
 	);
