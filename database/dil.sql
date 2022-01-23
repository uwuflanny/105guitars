use 105guitars;

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
