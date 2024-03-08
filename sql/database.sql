CREATE TABLE luxury_cars (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  brand VARCHAR(100) NOT NULL,
  model VARCHAR(100) NOT NULL,
  color VARCHAR(50) NOT NULL,
  year INT UNSIGNED NOT NULL,
  price DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO luxury_cars (brand, model, color, year, price) VALUES('Ferrari', 'LaFerrari', 'Rojo', 2022, 3000000.00);
INSERT INTO luxury_cars (brand, model, color, year, price) VALUES('Lamborghini', 'Aventador', 'Amarillo', 2023, 400000.00);
INSERT INTO luxury_cars (brand, model, color, year, price) VALUES('Rolls-Royce', 'Phantom', 'Negro', 2024, 500000.00);
INSERT INTO luxury_cars (brand, model, color, year, price) VALUES('Bugatti', 'Chiron', 'Azul', 2022, 3500000.00);
INSERT INTO luxury_cars (brand, model, color, year, price) VALUES('Porsche', '911 Turbo S', 'Blanco', 2023, 200000.00);


