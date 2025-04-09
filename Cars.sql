CREATE TABLE `parks` (
  `id` integer PRIMARY KEY,
  `addres` varchar(150) NOT NULL
);

CREATE TABLE `cars` (
  `id` integer PRIMARY KEY,
  `park_id` integer NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` float NOT NULL
);

CREATE TABLE `drivers` (
  `id` integer PRIMARY KEY,
  `car_id` integer NOT NULL,
  `name` varchar(10) NOT NULL,
  `phone` varchar(255)
);

CREATE TABLE `orders` (
  `id` integer PRIMARY KEY,
  `driver_id` integer NOT NULL,
  `custumer_id` integer NOT NULL,
  `start` text NOT NULL,
  `finish` text NOT NULL,
  `total` float NOT NULL
);

CREATE TABLE `customers` (
  `id` integer PRIMARY KEY,
  `name` varchar(10) NOT NULL,
  `phone` varchar(255)
);

ALTER TABLE `cars` ADD FOREIGN KEY (`park_id`) REFERENCES `parks` (`id`);

ALTER TABLE `drivers` ADD FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`custumer_id`) REFERENCES `customers` (`id`);
