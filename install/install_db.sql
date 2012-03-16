CREATE TABLE calendar (
	day DATE,
	PRIMARY KEY(day)
);

CREATE TABLE orders (
	id_order INT ,
	id_user CHAR(30),
	name_user CHAR(30),
	surname_user CHAR(30),
	day date,
	PRIMARY KEY(id_order),
	FOREIGN KEY(day)
		REFERENCES calendar(day)
		ON DELETE RESTRICT
);

CREATE TABLE ordered_products(
	id_order INT,
	id_product decimal(10,0),
	nb_product INT,
	PRIMARY KEY(id_order,id_product),
	FOREIGN KEY(id_order)
		REFERENCES orders(id_order)
		ON DELETE CASCADE,
	FOREIGN KEY(id_product)
		REFERENCES articles(code)
		ON DELETE CASCADE
);
