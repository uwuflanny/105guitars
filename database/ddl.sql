drop DATABASE if EXISTS 105guitars;
create DATABASE if not EXISTS 105guitars;
use 105guitars;

create table modello(
    codice int not null AUTO_INCREMENT,
    nome varchar(40) not null,
    scala float not null,
    tipo_body varchar(40) not null,
    elettronica varchar(100) not null,
    CONSTRAINT ID_MODELLO PRIMARY key (codice)
);

create table copia(
	seriale int not null AUTO_INCREMENT,
    ID_MODELLO int not null,
    num_corde int not null,
    colore varchar(40) not null,
    materiale varchar(100) not null,
    prezzo int not null,
    front_image varchar(100) not null,
    side_image varchar(100) not null,
    back_image varchar(100) not null,
    sold bit not null,
    CONSTRAINT ID_COPIA PRIMARY key (seriale)
);

CREATE table utente(
    email varchar(40) unique not null,
    passw varchar(256) not null,
    nome varchar(40) not null,
    cognome varchar(40) not null,
    isadmin boolean not null,
    CONSTRAINT ID_UTENTE PRIMARY key (email)
);

create table oggetto_in_carrello(
    ID_UTENTE varchar(40) not null,
    ID_COPIA int not null,
    CONSTRAINT ID_OGGETTO_CARRELLO PRIMARY key (ID_UTENTE, ID_COPIA)
);

create table ordine(
    codice_ordine int not null AUTO_INCREMENT,
    data_ordine date not null,
    ID_UTENTE varchar(40) not null,
    stato ENUM('unprepared', 'unsent', 'sent', 'delivered'),
    CONSTRAINT ID_ORDINE PRIMARY key (codice_ordine)
);

create table oggetto_in_ordine(
    ID_COPIA int not null,
    ID_ORDINE int not null,
    CONSTRAINT ID_OGGETTO_ORDINE PRIMARY key (ID_COPIA, ID_ORDINE)
);

create table notifica(
    codice int not null AUTO_INCREMENT,
    titolo varchar(256) not null,
    descrizione varchar(1024) not null,
    ID_UTENTE varchar(40) not null,
    relativa_carrello boolean not null,
    invio datetime not null,
    CONSTRAINT ID_NOTIF PRIMARY key (codice)
);

create table carta(
    Nome varchar(40) not null,
    Cognome varchar(40) not null,
    Numero varchar(16) not null,
    Scadenza date not null,
    CVV int(3) not null,
    Ammontare_disponibile float,
    Tipo ENUM('credit', 'debit'),
    PRIMARY key(Nome, Cognome, Numero, Scadenza, CVV, Tipo)
);


-- copia
alter table copia add constraint FK_ID_MODELLO foreign key(ID_MODELLO) references modello(codice);
-- oggetto in carrello
alter table oggetto_in_carrello add constraint FK_ID_UTENTE foreign key(ID_UTENTE) references utente(email);
alter table oggetto_in_carrello add constraint FK_ID_COPIA foreign key(ID_COPIA) references copia(seriale);
-- ordine
alter table ordine add constraint FK_ID_UTENTE_ORD FOREIGN key(ID_UTENTE) references utente(email);
-- oggett in ordine
alter table oggetto_in_ordine add constraint FK_ID_ORDINE foreign key(ID_ORDINE) references ordine(codice_ordine);
alter table oggetto_in_ordine add constraint FK_ID_COPIA_ORD foreign key(ID_COPIA) references copia(seriale);
-- notifica
alter table notifica add constraint FK_ID_UTENT_ID foreign key(ID_UTENTE) references utente(email);


INSERT INTO modello (nome, scala, tipo_body, elettronica) VALUES 
("105 V Spektre", 25.5, "Flying V", "Neck & Bridge: 105 Duncan Alnico; 5-way-blade"),
("105 Super Idol", 25.4, "SuperStrat", "Bridge: 105 Duncan Alnico"),
("105 Imposter Bass", 24.75, "Clarus", "Bridge: 105 Aktive precision Hmbucker");

INSERT INTO copia (ID_MODELLO, num_corde, colore, materiale, prezzo, front_image, side_image, back_image, sold) VALUES
(1, 6, "black matte", "ebony", 1400, "vspektre-ebony-front.png","vspektre-ebony-side.png","vspektre-ebony-back.png", 0),
(1, 7, "brown sunburst","swamp ash", 1600, "vspektre-brownsunb-front.png","vspektre-brownsunb-side.png","vspektre-brownsunb-back.png", 0),
(2, 6, "crimson red","ebony", 1200, "superidol-redebony-front.png","superidol-redebony-side.png","superidol-redebony-back.png", 0),
(2, 8, "black matte","stainless steel", 10000, "superidol-steel-front.png","superidol-steel-side.png","superidol-steel-back.png", 0),
(3, 4, "lime green","plywood", 100, "imposter-lime-front.png","imposter-lime-side.png","imposter-lime-back.png", 0),
(3, 4, "blue sunburst","ebony", 1200, "imposter-ebony-front.png","imposter-ebony-side.png","imposter-ebony-back.png", 0);

INSERT INTO utente () VALUES
("testuser@mail.com", "$2y$10$ZkcEZ33RcH0kUJOlC4g9XO5J9if4RnJepTdlDeOfPqfjgG/l4rj4K", "nome", "cognome", 0),
("testadmin@mail.com", "$2y$10$mzyLF5IEP7sEZEZnhe/JC.AwxQRW9qS9SCj2mOT27DiBGMNdO2Joe", "nome", "cognome", 1);

/*
INSERT INTO ordine (data_ordine, ID_UTENTE, stato) VALUES 
(STR_TO_DATE('1-01-2022', '%d-%m-%Y'), "testuser@mail.com", "unprepared"),
(STR_TO_DATE('1-01-2069', '%d-%m-%Y'), "testuser@mail.com", "unprepared");
INSERT INTO oggetto_in_ordine VALUES (1,1), (2,2);

INSERT into notifica (titolo, descrizione, ID_UTENTE, relativa_carrello, invio) VALUES
('title test', 'desc text', "testuser@mail.com", FALSE, STR_TO_DATE('12-01-2014 1:02:22','%m-%d-%Y %H:%i:%s')),
('title test 2', 'desc text', "testuser@mail.com", FALSE, STR_TO_DATE('12-01-2014 1:02:22','%m-%d-%Y %H:%i:%s')),
('title test 2', 'desc text', "testadmin@mail.com", FALSE, STR_TO_DATE('12-01-2014 1:02:22','%m-%d-%Y %H:%i:%s'));

*/
 
INSERT INTO carta values ('Nome', 'Cognome', '2403237584767354', '2030-02-01', 123, 10000, 'credit');
