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
	stato ENUM('unprepared', 'unsent', 'delivered'),
    CONSTRAINT ID_ORDINE PRIMARY key (codice_ordine)
);

create table oggetto_in_ordine(
    ID_COPIA int not null,
    ID_ORDINE int not null,
    CONSTRAINT ID_OGGETTO_ORDINE PRIMARY key (ID_COPIA, ID_ORDINE)
);

create table notifica_fine_prodotti(
	codice int not null AUTO_INCREMENT,
	descrizione varchar(256) not null,
	MODELLO_RELATIVO int not null,
	CONSTRAINT ID_NOTIF_FINE PRIMARY key (codice)
);

create table notifica_ordine(
	codice int not null AUTO_INCREMENT,
	descrizione varchar(256) not null,
	ORDINE_RELATIVO int not null,
	CONSTRAINT ID_NOTIF_ORD PRIMARY key (codice)
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
-- notifica fine prodotti
alter table notifica_fine_prodotti add constraint FK_ID_MODELLO_ID foreign key(MODELLO_RELATIVO) references modello(codice);
-- notifica ordine 
alter table notifica_ordine add constraint FK_ID_ORDINE_ID foreign key (ORDINE_RELATIVO) references ordine(codice_ordine);



INSERT INTO modello (nome, scala, tipo_body, elettronica) VALUES 
("105 V Spektre", 25.5, "Flying V", "Neck & Bridge: 105 Duncan Alnico; 5-way-blade"),
("105 Super Idol", 25.4, "SuperStrat", "Bridge: 105 Duncan Alnico"),
("105 Imposter Bass", 24.75, "Clarus", "Bridge: 105 Aktive precision Hmbucker");

INSERT INTO copia (ID_MODELLO, num_corde, colore, materiale, prezzo, front_image, side_image, back_image) VALUES
(1, 6, "black matte", "ebony", 1400, "vspektre-ebony-front.png","vspektre-ebony-side.png","vspektre-ebony-back.png"),
(1, 7, "brown sunburst","swamp ash", 1600, "vspektre-brownsunb-front.png","vspektre-brownsunb-side.png","vspektre-brownsunb-back.png"),
(2, 6, "crimson red","ebony", 1200, "superidol-redebony-front.png","superidol-redebony-side.png","superidol-redebony-back.png"),
(2, 8, "black matte","stainless steel", 10000, "superidol-steel-front.png","superidol-steel-side.png","superidol-steel-back.png"),
(3, 4, "lime green","plywood", 100, "imposter-lime-front.png","imposter-lime-side.png","imposter-lime-back.png"),
(3, 4, "blue sunburst","ebony", 1200, "imposter-ebony-front.png","imposter-ebony-side.png","imposter-ebony-back.png");

INSERT INTO utente () VALUES
("testuser@mail.com", "$2y$10$ZkcEZ33RcH0kUJOlC4g9XO5J9if4RnJepTdlDeOfPqfjgG/l4rj4K", "nome", "cognome", 0),
("testadmin@mail.com", "$2y$10$mzyLF5IEP7sEZEZnhe/JC.AwxQRW9qS9SCj2mOT27DiBGMNdO2Joe", "nome", "cognome", 1);

INSERT INTO ordine (data_ordine, ID_UTENTE, stato) VALUES 
(STR_TO_DATE('1-01-2022', '%d-%m-%Y'), "testuser@mail.com", "unprepared"),
(STR_TO_DATE('4-01-2022', '%d-%m-%Y'), "testuser@mail.com", "unsent"),
(STR_TO_DATE('1-02-2069', '%d-%m-%Y'), "testuser@mail.com", "delivered");
 
