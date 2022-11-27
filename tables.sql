CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');


CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `nb_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cars` (`id`, `license_plate`, `color`, `cost`, `nb_seat`) VALUES
(1, 'AB-123-CD', 'red', 7500, 4),
(2, 'EF-456-JH', 'bleu', 10000, 5),
(3, 'IJ-789-KL', 'green', 12500, 6);


CREATE TABLE `carpoolads` (
  `id` int(11) NOT NULL,
  `start_place` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `departure_time` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `carpoolads` (`id`, `start_place`, `destination`, `departure_time`, `price`) VALUES
(1, 'Paris', 'Versailles', '2022-11-30 10:30:00', 10),
(2, 'Limoges', 'Poitiers', '2022-11-26 15:00:00', 20),
(3, 'Rennes', 'Nantes', '2022-12-23 14:00:00', 20);


CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `horary` time NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bookings` (`id`, `day`, `horary`, `number`) VALUES
(1, '2022-11-30', '10:30:00', 2),
(2, '2022-11-30', '10:30:00', 1),
(3, '2022-12-23', '14:00:00', 3);


CREATE TABLE `users_cars` (
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 2),
(1, 2),
(2, 3);


CREATE TABLE `users_carpoolads` (
  `user_id` int(11) NOT NULL,
  `carpoolad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_carpoolads` (`user_id`, `carpoolad_id`) VALUES
(1, 2),
(2, 3),
(3, 1);


CREATE TABLE `users_bookings` (
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_bookings` (`user_id`, `booking_id`) VALUES
(1, 1),
(1, 2),
(3, 2);


CREATE TABLE `carpoolads_cars` (
  `carpoolad_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `carpoolads_cars` (`carpoolad_id`, `car_id`) VALUES
(1, 1),
(2, 3),
(3, 3);


CREATE TABLE `carpoolads_bookings` (
  `carpoolad_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `carpoolads_bookings` (`carpoolad_id`, `booking_id`) VALUES
(1, 1),
(1, 2),
(3, 3);


ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `carpoolads`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `carpoolads_bookings`
  ADD KEY `carpoolad_id` (`carpoolad_id`),
  ADD KEY `booking_id` (`booking_id`);


ALTER TABLE `carpoolads_cars`
  ADD KEY `carpoolad_id` (`carpoolad_id`,`car_id`),
  ADD KEY `car_id` (`car_id`);


ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users_bookings`
  ADD KEY `user_id` (`user_id`,`booking_id`),
  ADD KEY `booking_id` (`booking_id`);


ALTER TABLE `users_carpoolads`
  ADD KEY `user_id` (`user_id`,`carpoolad_id`),
  ADD KEY `carpoolad_id` (`carpoolad_id`);


ALTER TABLE `users_cars`
  ADD KEY `user_id` (`user_id`,`car_id`),
  ADD KEY `car_id` (`car_id`);


ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `carpoolads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `carpoolads_bookings`
  ADD CONSTRAINT `carpoolads_bookings_ibfk_1` FOREIGN KEY (`carpoolad_id`) REFERENCES `carpoolads` (`id`),
  ADD CONSTRAINT `carpoolads_bookings_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);


ALTER TABLE `carpoolads_cars`
  ADD CONSTRAINT `carpoolads_cars_ibfk_1` FOREIGN KEY (`carpoolad_id`) REFERENCES `carpoolads` (`id`),
  ADD CONSTRAINT `carpoolads_cars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);


ALTER TABLE `users_bookings`
  ADD CONSTRAINT `users_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_bookings_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);


ALTER TABLE `users_carpoolads`
  ADD CONSTRAINT `users_carpoolads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_carpoolads_ibfk_2` FOREIGN KEY (`carpoolad_id`) REFERENCES `carpoolads` (`id`);


ALTER TABLE `users_cars`
  ADD CONSTRAINT `users_cars_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `users_cars_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);


