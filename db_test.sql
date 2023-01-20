-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Ağu 2022, 13:28:57
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `price` double(5,2) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `product_name`, `short_description`, `price`, `is_featured`, `is_active`, `category`) VALUES
(1, 'Blue Jean', 'Blue slim fit jean.', 9.50, 0, 1, 'Clothes'),
(2, 'Red T-Shirt', 'Red regular fit T-Shirt.', 10.50, 0, 1, 'Clothes'),
(3, 'White Jean', 'White slim fit jean.', 11.50, 0, 1, 'Clothes'),
(4, 'White Shirt', 'White regular fit shirt.', 15.50, 0, 1, 'Clothes'),
(24, 'Nvidia 3080', 'nvidia 3080 graphic cart', 99.99, 0, 1, 'Technology'),
(25, 'nvidia 3090', 'nvidia 3090 graphic cart', 99.99, 0, 1, 'Technology');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
