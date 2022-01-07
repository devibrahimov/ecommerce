-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Oca 2022, 14:45:08
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecommerce`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_aboutus_content`
--

CREATE TABLE `lm_aboutus_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) NOT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_content` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_aboutus_content`
--

INSERT INTO `lm_aboutus_content` (`id`, `about_id`, `lang`, `header`, `content`, `meta_content`, `meta_keywords`, `show`, `created_at`, `updated_at`, `home_content`) VALUES
(1, 1, 'az', 'web agency', '<div class=\"content-box\">\r\n<div class=\"text\">\r\n<p>We teachings of the great explorer of the truth the master some of happiness. No one rejects dislikes or avoids pleasure we get itself because who do not know how to pursue pleasure.</p>\r\n</div>\r\n<div class=\"inner-box\">\r\n<div class=\"single-item\">\r\n<div class=\"icon-box\">&nbsp;</div>\r\nBlackcats in\r\n<h4>Commercial area</h4>\r\n<p>Complete account of the system, and expound the actual.</p>\r\n</div>\r\n<div class=\"single-item\">\r\n<div class=\"icon-box\">&nbsp;</div>\r\nBlackcats in\r\n<h4>Residential area</h4>\r\n<p>Nor again is there anyone loves or pursues or desires too.</p>\r\n</div>\r\n</div>\r\n<div class=\"author-box\">\r\n<figure class=\"image-box\"><img src=\"assets/images/resource/author-3.jpg\" alt=\"\" /></figure>\r\n<figure class=\"signature\"><img src=\"assets/images/icons/signature-1.png\" alt=\"\" /></figure>\r\n<h5>Roman Liam, Ceo &amp; Founder</h5>\r\n</div>\r\n</div>', NULL, NULL, 0, NULL, NULL, '<div class=\"text\">\r\n<p>Teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is who do not know how to pursue pleasure.</p>\r\n</div>\r\n<div class=\"inner-box\">\r\n<figure class=\"image-box\"><img src=\"assets/images/resource/award-1.png\" alt=\"\" /></figure>\r\n<ul class=\"list clearfix\">\r\n<li>Committed to the highest standards</li>\r\n<li>We united around one purpose</li>\r\n<li>Everything we do is built on honesty</li>\r\n</ul>\r\n</div>'),
(2, 1, 'ru', 'Нейрохирург', '<div class=\"content-box\">\r\n<div class=\"text\">\r\n<p>We teachings of the great explorer of the truth the master some of happiness. No one rejects dislikes or avoids pleasure we get itself because who do not know how to pursue pleasure.</p>\r\n</div>\r\n<div class=\"inner-box\">\r\n<div class=\"single-item\">\r\n<div class=\"icon-box\">&nbsp;</div>\r\nBlackcats in\r\n<h4>Commercial area</h4>\r\n<p>Complete account of the system, and expound the actual.</p>\r\n</div>\r\n<div class=\"single-item\">\r\n<div class=\"icon-box\">&nbsp;</div>\r\nBlackcats in\r\n<h4>Residential area</h4>\r\n<p>Nor again is there anyone loves or pursues or desires too.</p>\r\n</div>\r\n</div>\r\n<div class=\"author-box\">\r\n<figure class=\"image-box\"><img src=\"assets/images/resource/author-3.jpg\" alt=\"\" /></figure>\r\n<figure class=\"signature\"><img src=\"assets/images/icons/signature-1.png\" alt=\"\" /></figure>\r\n<h5>Roman Liam, Ceo &amp; Founder</h5>\r\n</div>\r\n</div>', NULL, NULL, 0, NULL, NULL, '<div class=\"text\">\r\n<p>Teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is who do not know how to pursue pleasure.</p>\r\n</div>\r\n<div class=\"inner-box\">\r\n<figure class=\"image-box\"><img src=\"assets/images/resource/award-1.png\" alt=\"\" /></figure>\r\n<ul class=\"list clearfix\">\r\n<li>Committed to the highest standards</li>\r\n<li>We united around one purpose</li>\r\n<li>Everything we do is built on honesty</li>\r\n</ul>\r\n</div>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_about_us`
--

CREATE TABLE `lm_about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_about_us`
--

INSERT INTO `lm_about_us` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '/photos/831626730346.jpg', '2021-06-27 15:11:57', '2021-07-19 17:32:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_adjustment`
--

CREATE TABLE `lm_adjustment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `multilang` tinyint(1) NOT NULL DEFAULT 0,
  `default_lang` varchar(255) NOT NULL DEFAULT 'az',
  `modules` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`modules`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_adjustment`
--

INSERT INTO `lm_adjustment` (`id`, `multilang`, `default_lang`, `modules`, `created_at`, `updated_at`) VALUES
(2, 1, 'az', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_blogcategories`
--

CREATE TABLE `lm_blogcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_blogcategories`
--

INSERT INTO `lm_blogcategories` (`id`, `show`, `created_at`, `updated_at`) VALUES
(4, 0, '2021-07-08 05:59:37', '2021-07-08 05:59:37'),
(5, 0, '2021-07-08 13:03:22', '2021-07-08 13:03:22'),
(6, 0, '2021-07-08 13:03:43', '2021-07-08 13:03:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_blogcategory_contents`
--

CREATE TABLE `lm_blogcategory_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `base_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_blogcategory_contents`
--

INSERT INTO `lm_blogcategory_contents` (`id`, `base_id`, `lang`, `name`, `created_at`, `updated_at`) VALUES
(4, 4, 'az', 'Kök hüceyrələri', NULL, NULL),
(5, 4, 'ru', 'Kök Hücre', NULL, NULL),
(6, 5, 'az', 'PRP', NULL, NULL),
(7, 5, 'ru', 'PRP', NULL, NULL),
(8, 6, 'az', 'Mezoterapiya', NULL, NULL),
(9, 6, 'ru', 'Mezoterapi', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_blogs`
--

CREATE TABLE `lm_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_blogs`
--

INSERT INTO `lm_blogs` (`id`, `image`, `category`, `created_at`, `updated_at`) VALUES
(2, '/photos/blogs/21625915151.jpg', 5, '2021-07-10 07:05:51', '2021-07-10 07:05:51'),
(3, '/photos/blogs/61625915848.jpg', 4, '2021-07-10 07:17:29', '2021-07-10 07:17:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_blog_contents`
--

CREATE TABLE `lm_blog_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_content` varchar(160) DEFAULT NULL,
  `meta_keywords` varchar(800) DEFAULT NULL,
  `show` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_blog_contents`
--

INSERT INTO `lm_blog_contents` (`id`, `lang`, `blog_id`, `name`, `content`, `meta_content`, `meta_keywords`, `show`) VALUES
(3, 'az', 2, 'Davamlı və Zəhlətökən: Siyatik Ağrısı', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: 700 !important;\">V&uuml;cudumuzun en kalın ve en uzun siniri olan siyatik siniri, sıkışması halinde dayanılmaz ağrılara neden olmaktadır.&nbsp;<a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\">Rejeneratif Tıp</a>&nbsp;Uzmanı Aşkın Nasırcılar, siyatik ağrısına &ccedil;are olabilecek doğal tedavi y&ouml;ntemlerini anlattı.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Siyatik sinir, beldeki sinirlerin birleşerek oluşturduğu, el parmağınız kadar kalınlıkta ve v&uuml;cudumuzun en uzun siniridir.&nbsp;<span style=\"box-sizing: border-box; font-weight: 700 !important;\"><a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\">Siyatik siniri</a>&nbsp;</span>oluşturan liflerden birinin herhangi bir sebeple sıkışması durumunda, belden ayak tabanı ve parmaklara kadar yayılan b&ouml;lgede gelişen ağrı&nbsp;<span style=\"box-sizing: border-box; font-weight: 700 !important;\"><a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\">siyatik ağrısı</a>&nbsp;</span>olarak tanımlanır.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\"><a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\"><span style=\"box-sizing: border-box; font-weight: 700 !important;\">Rejeneratif Tıp</span></a>&nbsp;Uzmanı Aşkın Nasırcılar,&nbsp;<span style=\"box-sizing: border-box; font-weight: 700 !important;\"><a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\">siyatik ağrısı</a></span>nın tedavilere olduk&ccedil;a diren&ccedil;li ve can sıkıcı bir ağrı t&uuml;r&uuml; olduğunu belirterek &ldquo;Klasik ağrı kesicilerin fayda sağlamadığı bu rahatsızlıkta hasta, ağrısı nedeniyle g&uuml;&ccedil;l&uuml; ağrı kesicilere y&ouml;nelir ancak bu durum sıklıkla faydadan &ccedil;ok zarara neden olur.&rdquo; diye belirtti.</p>\r\n<h4 style=\"box-sizing: border-box; margin: 0px 0px 14px; line-height: 27px; font-size: 1.4em; color: #0a3380; letter-spacing: -0.05em; -webkit-font-smoothing: antialiased; font-family: Nunito, sans-serif;\"><span style=\"box-sizing: border-box;\">Siyatik Ağrısını Diğer Ağrılarla Karıştırmayın!</span></h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Rejeneratif Tıp Uzmanı Aşkın Nasırcılar, yaşayanlar tarafından diren&ccedil;li ve amansız olarak tanımlanan siyatik ağrısının genellikle;</p>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px;\">\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Bacak arkasında yoğunlaşan, &uuml;st kal&ccedil;adan ayağa doğru yayılan</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Diz dış yanından ayak bileğine doğru yayılan</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kal&ccedil;a arkasında ve ortada yoğunlaşan, şekilde g&ouml;r&uuml;ld&uuml;ğ&uuml;n&uuml; belirtti.</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Siyatik ağrısını şiddetlendirebilen hareketler;</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Omurgayı sıkıştıran veya kısaltan hareketler</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Uzun s&uuml;re kambur pozisyonda oturmak</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Uzun s&uuml;re oturmak</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Uzun s&uuml;reli veya v&uuml;cudu zorlayacak şekilde eğilmek, şeklinde sıralanabilir.</li>\r\n</ul>\r\n<h4 style=\"box-sizing: border-box; margin: 0px 0px 14px; line-height: 27px; font-size: 1.4em; color: #0a3380; letter-spacing: -0.05em; -webkit-font-smoothing: antialiased; font-family: Nunito, sans-serif;\"><span style=\"box-sizing: border-box;\">Siyatik Ağrısı Kimlerde G&ouml;r&uuml;l&uuml;r?</span></h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Uzm. Dr. Aşkın Nasırcılar, siyatik ağrısının t&uuml;m bel ağrılarının yaklaşık %5 ila %10&rsquo;unu oluşturduğunu belirterek, &ldquo;Bu y&uuml;zdeler, kişisel ve mesleki etmenlere bağlı olarak her bireye g&ouml;re değişir. S&ouml;z konusu etmenleri şu şekilde sıralayabiliriz:</p>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px;\">\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Yaşlanma</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Ortalamanın &Uuml;zerinde Boy Uzunluğu</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Stres</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Obezite veya fazla kilo</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Uzun S&uuml;re Oturma</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Sigara Kullanma</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Uzun S&uuml;re Titreşim-Sallanma Hareketine Maruz Kalınan İş veya Etkinlikler (&ouml;rneğin, kamyon s&uuml;r&uuml;c&uuml;leri)</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Yukarıdaki etmenler,&nbsp;<a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\"><span style=\"box-sizing: border-box; font-weight: 700 !important;\">siyatik ağrısı</span></a>na neden olan ve iyileşmeyi zorlaştıran etmenler arasındadır.&rdquo; diye belirtti.</p>\r\n<h4 style=\"box-sizing: border-box; margin: 0px 0px 14px; line-height: 27px; font-size: 1.4em; color: #0a3380; letter-spacing: -0.05em; -webkit-font-smoothing: antialiased; font-family: Nunito, sans-serif;\"><span style=\"box-sizing: border-box;\">Siyatik Ağrısının Tedavisi M&uuml;mk&uuml;n</span></h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Rejeneratif Tıp Uzmanı Aşkın Nasırcılar, kişiyi g&uuml;&ccedil;ten d&uuml;ş&uuml;recek kadar ciddi ağrılara sebep olan siyatik ağrısının yeni tedavi y&ouml;ntemleri ile kontrol edilebildiğini belirtti. Nasırcılar, &ldquo;G&uuml;n&uuml;m&uuml;zde, g&uuml;venli, etkili, minimal girişimsel ve ciddi kronik siyatik ağrısı vakalarını cerrahi veya hastane yatışı olmaksızın iyileştiren ileri rejeneratif tıp teknikleri bulunmaktadır.&rdquo; diye konuştu.</p>\r\n<h4 style=\"box-sizing: border-box; margin: 0px 0px 14px; line-height: 27px; font-size: 1.4em; color: #0a3380; letter-spacing: -0.05em; -webkit-font-smoothing: antialiased; font-family: Nunito, sans-serif;\"><span style=\"box-sizing: border-box;\">Siyatik Tedavisinde İla&ccedil;sız Y&ouml;ntemler</span></h4>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\"><a style=\"box-sizing: border-box; color: #0b71e1; text-decoration-line: none; background-color: transparent; transition: all 0.4s ease 0s; outline: 0px !important;\" href=\"https://www.askinnasircilar.com.tr/\"><span style=\"box-sizing: border-box; font-weight: 700 !important;\">Siyatik ağrısı</span></a>nın genelde tekrarlar nitelikte olduğunu belirten Rejeneatif Tıp Uzmanı Nasırcılar, &ldquo;&Ccedil;oğu hasta g&uuml;&ccedil;l&uuml; (ve genellikle bağımlılık yapan) ağrı kesici ila&ccedil;lara y&ouml;nelir. Bir kısım hastanın da opere olması gerekebilir. Bununla birlikte, bir&ccedil;ok bilimsel &ccedil;alışma, siyatik ağrısının giderilmesinde etkili olan g&uuml;venli tedavilerin olduğunu g&ouml;stermektedir.&rdquo; diye konuştu.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Bu y&ouml;ntemler:</p>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px;\">\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Karyopraktik-Manuel Tedavi</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Akupunktur ve Masaj Tedavisi</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Yoga ve Esneme</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Egzersiz</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Isı Bantları</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Enflamasyonun Giderilmesi</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">SVF ve PRP enjeksiyonları, şeklinde sıralanabilir.</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Yukarıdaki terapi y&ouml;ntemlerinin hepsi uzun bir s&uuml;redir siyatik ağrısı i&ccedil;in g&uuml;venli, etkili, alternatif tedaviler olarak belirlenmiştir.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Kayropraktik, akupunktur, yoga, masaj ve enjeksiyon yoluyla yapılan girişimsel tedavilerle ilgili olumsuz herhangi bir yan etki bulunmadığını belirten Nasırcılar &ldquo;Bu y&ouml;ntemlerin aşağıda sıralanan etmenler de dahil olmak &uuml;zere sağlık i&ccedil;in olduk&ccedil;a faydası vardır:</p>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px;\">\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">D&uuml;ş&uuml;k stres seviyesi</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Hareket aralığında gelişme</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Tekrarlayan yaralanmalara veya yeni yaralanmalara karşı savunma oluşturma</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Bağışıklık sistemini g&uuml;&ccedil;lendirme</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Siyatik tedavisinde Rejeneratif tıbbın b&uuml;y&uuml;k avantajlar sağladığını belirten Aşkın Nasırcılar, &ldquo;Reje</p>', 'Davamlı və Zəhlətökən: Siyatik Ağrısı', 'Davamlı və Zəhlətökən , Siyatik Ağrısı', 0),
(4, 'ru', 2, 'Dirençli ve Can Sıkıcı: Siyatik Ağrısı', NULL, NULL, NULL, 0),
(5, 'az', 3, 'Kök hüceyrələri müalicə etmək üçün hansı xəstəliklərdən istifadə olunur?', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: 700 !important;\">Bu hafta k&ouml;k h&uuml;cre tedavisinin uygulandığı hastalıklardan bahsedeceğim.&nbsp;K&ouml;k h&uuml;crenin kullanıldığı alanlar ve konu ile ilgili ger&ccedil;ekleşen &ccedil;alışmalar giderek artış g&ouml;stermektedir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">K&ouml;k h&uuml;cre tedavisinin uygulanabildiği hastalıklar ve k&ouml;k h&uuml;cre tedavisinin kullanılabilmesi i&ccedil;in &ccedil;alışmaları devam eden rahatsızlıkları ş&ouml;yle sıralayabiliriz;</p>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px;\">\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Eklem Kire&ccedil;lemeleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Romatizmal Hastalıklar,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Dejeneratif Bel, Boyun Rahatsızlıkları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kas, Bağ Yırtıkları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Otoimm&uuml;n Hastalıklar (SLE, Skleroderma, Hashimato vb.),</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Parkinson,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Alzheimer,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">MS,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">İnme ve Travmaya Bağlı Fel&ccedil;,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">N&ouml;ropatiler, Sinir Hasarları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kas Hastalıkları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Şeker Hastalığı,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">B&ouml;brek Yetmezlikleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kalp Yetmezlikleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Karaciğer Yetmezlikleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kronik Obstr&uuml;ktif Akciğer Hastalıkları (KOAH),</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Otizm,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Yeni Doğanlarda Konjenital Diyafragma Hernisi</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Cilt Yenileme Anti-Aging Ama&ccedil;lı</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kadın/Erken Seks&uuml;el Disfonksiyonlar</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Lyme Hastalığı</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">G&ouml;r&uuml;nd&uuml;ğ&uuml; &uuml;zere modern tıbbın g&uuml;n&uuml;m&uuml;zde &ccedil;aresiz kaldığı bir &ccedil;ok kronik hastalıkta k&ouml;k h&uuml;cre ile tedavi imkanından bahseder hale geldik. &Uuml;stelik hi&ccedil;bir yan etkisi olmadan.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Daha ilerisini de s&ouml;ylemek gerekirse; kendi h&uuml;crelerinizle ve &uuml;&ccedil; boyutlu h&uuml;cresel yazıcılarla size ait yeni organ &uuml;retebilme imkanı&hellip; D&uuml;ş&uuml;nmesi bile harika.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Organ nakli bekleyen y&uuml;zbinlerce hastanın ileride kendi h&uuml;crelerinden oluşmuş sıfır kilometre organlara kavuşabilmesi m&uuml;mk&uuml;n olabilecek&hellip;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Normal şartlarda doku nakli işlemlerinde, &ouml;m&uuml;r boyu bağışıklık baskılayıcı ağır ila&ccedil;lar kullanılması gerekir. Ancak yeni gelişmeler ile &ouml;z h&uuml;creler oldukları i&ccedil;in doku reddi gelişmeyeceğinden bu ağır ila&ccedil;lara da gerek kalmayacak.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Şu d&ouml;nemde bile organ yetmezliği hen&uuml;z gelişmeden &ouml;nce damardan k&ouml;k h&uuml;crelerinizi dolaşıma vererek hasarlı organların onarımı ve iyileşmesi g&ouml;zlenebilir.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">D&uuml;nyada bu şekilde erken aşama b&ouml;brek, karaciğer, kalp, akciğer yetmezliği, şeker hastalıklarından kurtulanlar var.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Tıbbi anlamda artık yeni bir &ccedil;ağa giriyoruz.</p>\r\n<div class=\"post-block mt-5 post-share\" style=\"box-sizing: border-box; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px; margin-top: 3rem !important;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Onarım tıbbı &ccedil;ağına&hellip; Evet, hen&uuml;z halen erken ve m&uuml;kemmel değil. Ancak bu tedavilerin başarısını artırmak ve tedavilere ge&ccedil; kalınmadan, erken ulaşabilmek adına t&uuml;m hastaların k&ouml;k h&uuml;cre tedavisini talep etmesi gerekiyor&hellip;</p>', NULL, 'meta, Keywords,data,ves,meta, Keywords,data,ves,meta, Keywords,data,ves,meta, Keywords,data,ves,meta, Keywords,data,ves', 0),
(6, 'ru', 3, 'Kök Hücre Hangi Hastalıkların Tedavisinde Kullanılıyor?', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: 700 !important;\">Bu hafta k&ouml;k h&uuml;cre tedavisinin uygulandığı hastalıklardan bahsedeceğim.&nbsp;K&ouml;k h&uuml;crenin kullanıldığı alanlar ve konu ile ilgili ger&ccedil;ekleşen &ccedil;alışmalar giderek artış g&ouml;stermektedir.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">K&ouml;k h&uuml;cre tedavisinin uygulanabildiği hastalıklar ve k&ouml;k h&uuml;cre tedavisinin kullanılabilmesi i&ccedil;in &ccedil;alışmaları devam eden rahatsızlıkları ş&ouml;yle sıralayabiliriz;</p>\r\n<ul style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px;\">\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Eklem Kire&ccedil;lemeleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Romatizmal Hastalıklar,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Dejeneratif Bel, Boyun Rahatsızlıkları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kas, Bağ Yırtıkları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Otoimm&uuml;n Hastalıklar (SLE, Skleroderma, Hashimato vb.),</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Parkinson,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Alzheimer,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">MS,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">İnme ve Travmaya Bağlı Fel&ccedil;,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">N&ouml;ropatiler, Sinir Hasarları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kas Hastalıkları,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Şeker Hastalığı,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">B&ouml;brek Yetmezlikleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kalp Yetmezlikleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Karaciğer Yetmezlikleri,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kronik Obstr&uuml;ktif Akciğer Hastalıkları (KOAH),</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Otizm,</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Yeni Doğanlarda Konjenital Diyafragma Hernisi</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Cilt Yenileme Anti-Aging Ama&ccedil;lı</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Kadın/Erken Seks&uuml;el Disfonksiyonlar</li>\r\n<li style=\"box-sizing: border-box; line-height: 24px;\">Lyme Hastalığı</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">G&ouml;r&uuml;nd&uuml;ğ&uuml; &uuml;zere modern tıbbın g&uuml;n&uuml;m&uuml;zde &ccedil;aresiz kaldığı bir &ccedil;ok kronik hastalıkta k&ouml;k h&uuml;cre ile tedavi imkanından bahseder hale geldik. &Uuml;stelik hi&ccedil;bir yan etkisi olmadan.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Daha ilerisini de s&ouml;ylemek gerekirse; kendi h&uuml;crelerinizle ve &uuml;&ccedil; boyutlu h&uuml;cresel yazıcılarla size ait yeni organ &uuml;retebilme imkanı&hellip; D&uuml;ş&uuml;nmesi bile harika.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Organ nakli bekleyen y&uuml;zbinlerce hastanın ileride kendi h&uuml;crelerinden oluşmuş sıfır kilometre organlara kavuşabilmesi m&uuml;mk&uuml;n olabilecek&hellip;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Normal şartlarda doku nakli işlemlerinde, &ouml;m&uuml;r boyu bağışıklık baskılayıcı ağır ila&ccedil;lar kullanılması gerekir. Ancak yeni gelişmeler ile &ouml;z h&uuml;creler oldukları i&ccedil;in doku reddi gelişmeyeceğinden bu ağır ila&ccedil;lara da gerek kalmayacak.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Şu d&ouml;nemde bile organ yetmezliği hen&uuml;z gelişmeden &ouml;nce damardan k&ouml;k h&uuml;crelerinizi dolaşıma vererek hasarlı organların onarımı ve iyileşmesi g&ouml;zlenebilir.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">D&uuml;nyada bu şekilde erken aşama b&ouml;brek, karaciğer, kalp, akciğer yetmezliği, şeker hastalıklarından kurtulanlar var.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px;\">Tıbbi anlamda artık yeni bir &ccedil;ağa giriyoruz.</p>\r\n<div class=\"post-block mt-5 post-share\" style=\"box-sizing: border-box; color: #3b4964; font-family: Nunito, sans-serif; font-size: 16px; margin-top: 3rem !important;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #777777; line-height: 26px; font-family: Nunito, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Onarım tıbbı &ccedil;ağına&hellip; Evet, hen&uuml;z halen erken ve m&uuml;kemmel değil. Ancak bu tedavilerin başarısını artırmak ve tedavilere ge&ccedil; kalınmadan, erken ulaşabilmek adına t&uuml;m hastaların k&ouml;k h&uuml;cre tedavisini talep etmesi gerekiyor&hellip;</p>', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_carousel`
--

CREATE TABLE `lm_carousel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `desk` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_carousel`
--

INSERT INTO `lm_carousel` (`id`, `image`, `active`, `desk`, `created_at`, `updated_at`) VALUES
(5, '/photos/carousel/181638949276.jpg', 1, 2, '2021-06-29 02:20:26', '2021-12-08 03:41:16'),
(6, '/photos/carousel/341638949223.jpg', 1, 2, '2021-07-30 06:48:47', '2021-12-08 03:40:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_carousel_content`
--

CREATE TABLE `lm_carousel_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carousel_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_carousel_content`
--

INSERT INTO `lm_carousel_content` (`id`, `carousel_id`, `lang`, `title`, `header`, `content`, `url`) VALUES
(5, 5, 'az', 'Sağlamlıqımızı birlikdə qoruyaq', 'bashliq', 'Sağlamlıqımızı birlikdə qoruyaq', 'http://lumusoft.az/'),
(6, 6, 'az', 'Başlıq data <br> və ikinci başlıq', NULL, 'Oynaq qığırdaqlarında sinir', 'http://lumusoft.az/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_contact`
--

CREATE TABLE `lm_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googlemap` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workinghourstart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workinghourend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_contact`
--

INSERT INTO `lm_contact` (`id`, `number`, `phone`, `fax`, `email`, `address`, `googlemap`, `facebook`, `instagram`, `youtube`, `linkedin`, `workinghourstart`, `workinghourend`, `created_at`, `updated_at`) VALUES
(2, '2131231123', '994879622', '225896', 'lumusoft@gmail.com', 'Azerbaycan baki', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d388948.3248466814!2d49.57477494848202!3d40.394254379738996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d6bd6211cf9%3A0x343f6b5e7ae56c6b!2sBaku!5e0!3m2!1sen!2s!4v1625909388231!5m2!1sen!2s\" width=\"100%\" height=\"400\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'https://facebook.com', 'https://instagram.com', 'https://youtube.com', 'http://linkedin.com', '09:00', '18:00', '2021-06-24 16:28:33', '2021-07-10 05:30:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_customers`
--

CREATE TABLE `lm_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_customers`
--

INSERT INTO `lm_customers` (`id`, `name`, `surname`, `phone_number`, `email`, `adress`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Beyler', 'eliyev', '1111111', 'customer@admin.com', '12344asfasdfsdafsa', NULL, '$2y$10$V820Mw5EqlkpsMrGgE6pHu.sBvlobOrONqkK8b3NSNYMIF9VDrGZe', NULL, NULL, '2021-12-22 11:06:30', '2021-12-30 03:13:19'),
(2, 'Ehmed', 'ibos', '+90 (553) 751 84 12', 'demo@adsmin.com', 'dfsdafasdfa', NULL, '$2y$10$tomMomU0OK/fd6t.qTpUpOLNufRjO2r1/DETENYTQtEqI1FjJccDm', NULL, NULL, '2021-12-23 05:38:24', '2022-01-04 03:09:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_customer_adresses`
--

CREATE TABLE `lm_customer_adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `adress` text NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_customer_cart`
--

CREATE TABLE `lm_customer_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_customer_cart`
--

INSERT INTO `lm_customer_cart` (`id`, `customer_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 12, '2021-12-30 08:12:19', '2021-12-30 08:19:42'),
(2, 1, 11, 8, '2021-12-30 08:15:27', '2021-12-30 08:15:48'),
(61, 2, 12, 1, '2022-01-05 07:03:15', '2022-01-05 07:27:24'),
(62, 2, 1, 2, '2022-01-05 07:03:21', '2022-01-05 07:28:10'),
(63, 2, 11, 1, '2022-01-05 07:03:26', '2022-01-05 07:03:26'),
(64, 2, 13, 1, '2022-01-05 07:03:32', '2022-01-05 07:27:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_customer_reviews`
--

CREATE TABLE `lm_customer_reviews` (
  `cr_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `rate` tinyint(3) UNSIGNED NOT NULL,
  `feedback` varchar(2000) DEFAULT NULL,
  `see` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_customer_reviews`
--

INSERT INTO `lm_customer_reviews` (`cr_id`, `customer_id`, `product_id`, `comment`, `rate`, `feedback`, `see`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Men beyler Your email address will not be published. Required fields are marked *\nYour email address will not be published. Required fields are marked *', 3, 'Lorem Ipsum is simply dummy text of the printing & type setting industry. bu sehrfh sdfdsfdsf dfsdfds fds fd sfdsfdsfdsfdsfdsfdsfdsf sdf sdfds fdsfdsf dsf sdfsdfsdfsdf sdf', 1, '2022-01-06 11:28:20', '2022-01-07 08:23:37'),
(9, 1, 1, 'Men Emin Your email address will not be published. Required fields are marked *\nYour email address will not be published. Required fields are marked *', 4, 'bu sehrfh sdfdsfdsf dfsdfds fds fd sfdsfdsfdsfdsfdsfdsfdsf sdf sdfds fdsfdsf dsf sdfsdfsdfsdf sdf', 1, '2022-01-06 11:28:20', '2022-01-07 08:27:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_customer_wishlist`
--

CREATE TABLE `lm_customer_wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_customer_wishlist`
--

INSERT INTO `lm_customer_wishlist` (`id`, `user_id`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, 1, 1, NULL, '2021-12-28 07:02:45', '2021-12-28 07:02:45'),
(24, 1, 12, NULL, '2021-12-29 06:07:47', '2021-12-29 06:07:47'),
(25, 1, 6, NULL, '2021-12-30 08:25:41', '2021-12-30 08:25:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_failed_jobs`
--

CREATE TABLE `lm_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_faqs`
--

CREATE TABLE `lm_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_faqs`
--

INSERT INTO `lm_faqs` (`id`, `show`, `created_at`, `updated_at`) VALUES
(1, 0, '2021-07-08 17:05:53', '2021-07-08 17:05:53'),
(2, 0, '2021-07-08 17:14:56', '2021-07-08 17:14:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_faq_contents`
--

CREATE TABLE `lm_faq_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) NOT NULL,
  `faq_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_faq_contents`
--

INSERT INTO `lm_faq_contents` (`id`, `lang`, `faq_id`, `question`, `answer`) VALUES
(2, 'az', 1, 'Üstelik hiçbir yan etkisi olmadan. ??', 'Göründüğü üzere modern tıbbın günümüzde çaresiz kaldığı bir çok kronik hastalıkta kök hücre ile tedavi imkanından bahseder hale geldik. Üstelik hiçbir yan etkisi olmadan.\r\n\r\nDaha ilerisini de söylemek gerekirse; kendi hücrelerinizle ve üç boyutlu hücresel yazıcılarla size ait yeni organ üretebilme imkanı… Düşünmesi bile harika.'),
(3, 'az', 2, 'Kök hüceyrələr bədənin hansı hissələrində və hansı xəstəliklərdə tətbiq olunur?', 'Kök hüceyrələr bütün oynaqlara, əzələlərə, onurğa kanalına, dəriyə, ağciyərlərə burun, göz və bütün daxili orqanlara sistemli olaraq damarlardan tətbiq edilə bilər. Bu gün müalicə edilə bilməyən demək olar ki, bütün xroniki xəstəliklərdə tətbiq oluna bilər.'),
(4, 'ru', 2, 'Kök hücre vücudun hangi bölgelerinde ve hangi hastalıklarda uygulanır?', 'ALS gibi nörodejeneratif hastalıklarda, beyin damar felçlerinde, omurilik yaralanmaları ve travmatik beyin zedelenmelerinde, periferik sinir nöropatilerinde, muskuler distrofilerde, kalp, böbrek, karaciğer gibi organ yetmezliklerinde, şeker hastalığında, kronik obstüriktif akciğer hastalığında, yeni doğan konjenital diyafragma hernisi ve Graft versus host hastalıklarında hayat kurtarıcı olarak kullanılırlar. Ayrıca anal fissürlerde tedavi edici etkileri bulunmaktadır.'),
(5, 'ru', 1, 'Üstelik hiçbir yan etkisi olmadan. ?', 'Göründüğü üzere modern tıbbın günümüzde çaresiz kaldığı bir çok kronik hastalıkta kök hücre ile tedavi imkanından bahseder hale geldik. Üstelik hiçbir yan etkisi olmadan.\r\n\r\nDaha ilerisini de söylemek gerekirse; kendi hücrelerinizle ve üç boyutlu hücresel yazıcılarla size ait yeni organ üretebilme imkanı… Düşünmesi bile harika.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_gallery`
--

CREATE TABLE `lm_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(1500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_languages`
--

CREATE TABLE `lm_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_languages`
--

INSERT INTO `lm_languages` (`id`, `name`, `code`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Azərbaycanca', 'az', '1', NULL, NULL),
(2, 'русский ', 'ru', '1', NULL, NULL),
(3, 'English', 'en', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_message`
--

CREATE TABLE `lm_message` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `show` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_message`
--

INSERT INTO `lm_message` (`id`, `name`, `surname`, `email`, `number`, `content`, `show`, `created_at`, `updated_at`) VALUES
(1, 'Əhməd', 'Əliəsədov', 'ahmed5i@gmail.com', 'asdas', 'd', 1, NULL, '2021-07-15 15:10:14'),
(2, 'beyler', 'ibrahimov', 'bay@gmail.com', '03423234057', 'jabsbasidhbas daish dah sdiasd', 1, NULL, '2021-07-15 15:04:30'),
(3, 'qüe', 'asdsadas', 'sadilmaz@gmail.com', '03423234057', 'sadasdasdsa', 1, '2021-07-21 21:51:12', '2021-07-21 17:51:28'),
(4, 'ehmed', 'haradadir', 'beyler_said@mail.ru', '1231231231', 'Bizimlə Əlaqə Qurun Bizimlə Əlaqə Qurun Bizimlə Əlaqə Qurun', 1, '2021-10-17 23:49:46', '2021-10-17 23:50:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_migrations`
--

CREATE TABLE `lm_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_migrations`
--

INSERT INTO `lm_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_06_18_084439__create_laguages_table', 1),
(4, '2021_06_18_171508_create_about_table', 1),
(5, '2021_06_20_125557_create_aboutus_content_table', 1),
(6, '2021_06_22_201624_create_services_table', 1),
(7, '2021_06_22_201659_create_services_content_table', 1),
(8, '2021_06_23_181633_create_siesetting_table', 2),
(9, '2021_06_24_195715_create_contact_table', 3),
(10, '2021_06_25_165015_create_carousel_table', 4),
(11, '2021_06_25_165056_create_carousel_content_table', 4),
(12, '2021_06_26_131846_create_gallery_table', 5),
(13, '2021_06_27_085156_create_adjustment_table', 6),
(14, '2021_06_29_211125_create_press_table', 7),
(15, '2021_07_05_105712_create_blog_categories_create', 8),
(16, '2021_07_05_105714_create_blog_categories_content_create', 8),
(17, '2021_07_08_100429_create_blogs_teblae', 9),
(18, '2021_07_08_100808_create_blog_contents_table', 9),
(19, '2021_07_08_180301_create_faqs_table', 10),
(20, '2021_07_08_185935_create_faq_contents_table', 10),
(21, '2021_07_10_071429_table_press', 11),
(22, '2021_07_10_071553_table_aboutus_content', 11),
(23, '2021_07_15_162138_create_messages_table', 12),
(26, '2021_07_26_172012_create_press_categories_table', 13),
(27, '2021_12_08_080914_create_product_categories_table', 14),
(32, '2021_12_08_080931_create_product_categories_content_table', 15),
(33, '2021_12_08_081026_create_products_content_table', 15),
(34, '2021_12_08_080957_create_products_table', 16),
(35, '2021_12_08_081546_create_products_images_table', 17),
(36, '2021_12_22_073647_create_customers_table', 18),
(37, '2021_12_22_073656_create_customer_adresses_table', 18),
(38, '2021_12_22_073827_create_customer_wishlist_table', 18),
(40, '2021_12_30_112725_create_customer_cart_table', 19);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_press`
--

CREATE TABLE `lm_press` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `content` varchar(500) NOT NULL,
  `url` varchar(1500) NOT NULL,
  `athome` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `movie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_press`
--

INSERT INTO `lm_press` (`id`, `category`, `title`, `image`, `content`, `url`, `athome`, `created_at`, `updated_at`, `movie`) VALUES
(2, 2, 'Committed To Build A Positive', '/photos/press/941626557245.jpg', 'We will work with you to develop individualised care plans, including management of chronic diseases. We are committed to being the region’s premier healthcare network providing patient centered care that inspires clinical and service excellence.', 'https://baskimedya.com/product/14/vinil', 1, '2021-07-05 04:34:12', '2021-07-26 16:49:39', 'https://www.youtube.com/watch?v=midIepOyHdU'),
(4, 1, 'Sayt', '/photos/press/481626557168.jpg', 'ego.az', 'http://ego.az', 0, '2021-07-17 17:26:08', '2021-07-26 16:49:55', NULL),
(5, 2, 'Ezel Ekipman', '/photos/press/461627332618.jpg', 'asdasdadasdadadasd', 'https://demoevim.com', 0, '2021-07-26 16:50:18', '2021-07-26 16:53:00', 'https://www.youtube.com/watch?v=_3AZp9LaCkY');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_presscategories`
--

CREATE TABLE `lm_presscategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_presscategories`
--

INSERT INTO `lm_presscategories` (`id`, `category_id`, `lang`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'az', 'Tv proqramları', NULL, NULL),
(2, 1, 'tr', 'Tv proğramları', NULL, NULL),
(3, 2, 'az', 'Müsahibə', NULL, NULL),
(4, 2, 'tr', 'Röportaj', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_products`
--

CREATE TABLE `lm_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `price` decimal(8,2) DEFAULT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_products`
--

INSERT INTO `lm_products` (`id`, `category_id`, `active`, `price`, `sale_price`, `stock`, `sku`, `created_at`, `updated_at`) VALUES
(1, 14, 1, '12.99', '12.99', 12, NULL, '2021-12-10 06:39:06', '2021-12-22 02:03:00'),
(6, 14, 1, '11.00', '11.00', 21, '12312312343', '2021-12-10 09:17:07', '2022-01-05 08:45:27'),
(11, 14, 1, '12.00', '10.27', 123, '3213123123', '2021-12-21 09:16:05', '2021-12-21 09:16:13'),
(12, 14, 1, '120.00', '110.29', 3, '154189489198129', '2021-12-27 08:01:53', '2021-12-27 08:02:10'),
(13, 14, 1, '234.00', '233.00', 32, '23425223423', '2021-12-28 09:16:46', '2021-12-28 09:17:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_products_content`
--

CREATE TABLE `lm_products_content` (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `meta_content` varchar(160) DEFAULT NULL,
  `meta_keywords` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_products_content`
--

INSERT INTO `lm_products_content` (`content_id`, `product_id`, `lang`, `name`, `content`, `description`, `meta_content`, `meta_keywords`) VALUES
(4, 1, 'az', 'yangin sonduren balon adi yenilendi', '<p>YA ngin sondurme balonu</p>', NULL, 'YA ngin sondurme balonu aciqlama metni yenilendi', 'YA ngin sondurme balonu'),
(5, 6, 'az', 'Siqnalizasiya', '<p>asdasdasdyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine has</p>', '<blockquote>\r\n<p>asdasdasdyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine hasyangin sondr, t&uuml;m yaşam boyunca bedenimizde bulunan ve t&uuml;m h&uuml;cre tiplerine d&ouml;n&uuml;şebilen kaynak h&uuml;crelerdir. K&ouml;k h&uuml;creleri &ouml;zel yapan farklılaşma, kendilerine has</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</blockquote>', 'yangin sondr, tüm yaşam boyunca bedenimizde bulunan ve tüm hücre tiplerine dönüşebilen kaynak hücrelerdir. Kök hücreleri özel yapan farklılaşma, kendilerine has', 'yangin sondurmeyangin sondurmeyangin sondurmeyangin sondurme'),
(7, 1, 'ru', 'yangin sonduren balon adi yenilendi', '<p>yangin sonduren balon adi yenilendi</p>', NULL, 'yangin sonduren balon adi yenilendi', 'yangin sonduren balon adi yenilendi'),
(10, 11, 'az', 'price', NULL, NULL, NULL, NULL),
(11, 12, 'az', 'BMS oyun parklari', '<ul style=\"border: 0px; margin: 0px 0px 24px 15px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px;\">\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Мощность профессионального уровня позволяет эффективно забивать 90 мм строительный гвоздь менее чем за 3 секунды</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">REDLINK&trade; &ndash; защита от перегрузки в инструменте и аккумулятор обеспечивающий лучший в классе уровень защиты</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Превосходные эргономические характеристики &ndash; захват обеспечивает исключительное удобство и контроль</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Помещается там где не возможно размахнуться обычным молотком</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Превосходное время работы: забивает 100 х 90 мм гвоздей на одной зарядке</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Контроль состояния отдельных элементов аккумулятора оптимизирует время работы инструмента и обеспечивает долговечность аккумулятора</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Индикатор уровня заряда</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Гибкая аккумуляторная система: работает со всеми аккумуляторами Milwaukee&reg; M12&trade;</li>\r\n</ul>', NULL, 'BMS oyun parklari', 'BMS oyun parklariBMS oyun parklariBMS oyun parklariBMS oyun parklariBMS oyun parklari'),
(12, 13, 'az', 'Başlıq (Azərbaycanca)', '<ul style=\"border: 0px; margin: 0px 0px 24px 15px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both;\">\r\n<li style=\"border: 0px; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><span style=\"color: #888888; font-family: Muli, sans-serif;\"><span style=\"font-size: 13px; letter-spacing: 0.6px;\">Başlıq (Azərbaycanca)</span></span></li>\r\n<li style=\"color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Сверла по металлу из твёрдой стали DIN 338 для высокоскоростного сверления.</li>\r\n<li style=\"color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Оксидное покрытие для быстрого удаления стружки.</li>\r\n<li style=\"color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Сверла с N дизайном шнека и стандартным углом наклона канавки.</li>\r\n<li style=\"color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Для сверления стали, чугуна, других маталлов и сплавов с пределом прочности на разрыв 800 Н/мм&sup2;.</li>\r\n<li style=\"color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Цвет: черный</li>\r\n</ul>', '<h2 style=\"border: 0px; margin: 0px 0px 15px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; font-size: 14px; line-height: 1; font-family: Muli, Arial, Helvetica, sans-serif; text-transform: capitalize; letter-spacing: 0.6px;\">Description</h2>\r\n<p style=\"border: 0px; margin: 0px 0px 20px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 24px; color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px;\">Диаметр (мм):6.0<br />Кол-во в упаковке:10<br />Общая длина (мм):93, 93<br />Рабочая длина (мм):57</p>', 'Meta Açıqlama (Azərbaycanca)', 'Meta Açar Kəlimələr (Azərbaycanca)'),
(13, 13, 'ru', 'Başlıq (русский )', '<ul style=\"border: 0px; margin: 0px 0px 24px 15px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px;\">\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Сверла по металлу из твёрдой стали DIN 338 для высокоскоростного сверления.</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Оксидное покрытие для быстрого удаления стружки.</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Сверла с N дизайном шнека и стандартным углом наклона канавки.</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Для сверления стали, чугуна, других маталлов и сплавов с пределом прочности на разрыв 800 Н/мм&sup2;.</li>\r\n<li style=\"border: 0px; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Цвет: черный</li>\r\n</ul>', '<h2 style=\"border: 0px; margin: 0px 0px 15px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; font-size: 14px; line-height: 1; font-family: Muli, Arial, Helvetica, sans-serif; text-transform: capitalize; letter-spacing: 0.6px;\">Description</h2>\r\n<p style=\"border: 0px; margin: 0px 0px 20px; outline: 0px; padding: 0px; vertical-align: baseline; line-height: 24px; color: #888888; font-family: Muli, sans-serif; font-size: 13px; letter-spacing: 0.6px;\">Диаметр (мм):6.0<br />Кол-во в упаковке:10<br />Общая длина (мм):93, 93<br />Рабочая длина (мм):57</p>', 'Meta Açıqlama (русский )', 'Meta Açar Kəlimələr (русский )'),
(14, 13, 'en', 'Başlıq (English)', '<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\">Ki&ccedil;ik A&ccedil;ıqlama (English)</label></p>\r\n<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">Ki&ccedil;ik A&ccedil;ıqlama (English)</label></label></p>\r\n<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">Ki&ccedil;ik A&ccedil;ıqlama (English)</label></label></label></p>\r\n<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">Ki&ccedil;ik A&ccedil;ıqlama (English)</label></label></label></label></p>\r\n<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">Ki&ccedil;ik A&ccedil;ıqlama (English)</label></label></label></label></label></p>\r\n<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">&nbsp;</label></label></label></label></label></p>\r\n<div id=\"mceu_139\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_139-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_141\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"mceu_139\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_139-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_141\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"mceu_139\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_139-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_141\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"mceu_139\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_139-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_141\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"mceu_139\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_139-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_140-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_141\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\">Uzun A&ccedil;ıqlama (English)</label><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">Uzun A&ccedil;ıqlama (English)</label></label></p>\r\n<p><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem; color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\" for=\"\"><label style=\"box-sizing: border-box; outline: 0px; display: inline-block; margin-bottom: 0.5rem;\" for=\"\">&nbsp;</label></label></p>\r\n<div id=\"mceu_171\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_171-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_172\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_172-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_173\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"mceu_171\" class=\"mce-tinymce mce-container mce-panel\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 1px solid #c5c5c5; vertical-align: top; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #595959; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; text-shadow: none; float: none; position: relative; width: 1561px; height: auto; white-space: nowrap; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none; visibility: hidden; box-shadow: rgba(0, 0, 0, 0.2) 0px 1px 2px;\" tabindex=\"-1\" role=\"application\">\r\n<div id=\"mceu_171-body\" class=\"mce-container-body mce-stack-layout\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_172\" class=\"mce-top-part mce-container mce-stack-layout-item mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: relative; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_172-body\" class=\"mce-container-body\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border: 0px; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\">\r\n<div id=\"mceu_173\" class=\"mce-container mce-menubar mce-toolbar mce-first\" style=\"box-sizing: content-box; outline: 0px; margin: 0px; padding: 0px; border-width: 0px 0px 1px; border-style: solid; border-color: #e2e4e7; border-image: initial; vertical-align: top; background: transparent; text-shadow: none; float: none; position: static; width: auto; height: auto; cursor: inherit; -webkit-tap-highlight-color: transparent; line-height: normal; direction: ltr; max-width: none;\" role=\"menubar\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Meta Açıqlama (English)', 'Meta Açar Kəlimələr (English)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_products_images`
--

CREATE TABLE `lm_products_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cover` tinyint(1) NOT NULL DEFAULT 0,
  `imagepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_products_images`
--

INSERT INTO `lm_products_images` (`image_id`, `product_id`, `cover`, `imagepath`) VALUES
(1, 1, 1, '/photos/products/981639132746.jpg'),
(4, 6, 1, '/photos/products/541639464331.jpg'),
(14, 1, 0, '/photos/products/881639468336.jpg'),
(18, 6, 0, '/photos/products/121639480079.webp'),
(19, 6, 0, '/photos/products/181639480081.jpg'),
(27, 11, 1, '/photos/products/961640092565.jpg'),
(28, 11, 0, '/photos/products/871640092565.jpg'),
(29, 12, 1, '/photos/products/881640606513.jpg'),
(30, 12, 0, '/photos/products/841640606513.jpg'),
(31, 12, 0, '/photos/products/501640606513.png'),
(32, 13, 1, '/photos/products/581640697406.webp'),
(33, 13, 0, '/photos/products/21640697406.png'),
(34, 13, 0, '/photos/products/251640697406.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_product_categories`
--

CREATE TABLE `lm_product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show` int(11) NOT NULL DEFAULT 1,
  `icon` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_product_categories`
--

INSERT INTO `lm_product_categories` (`id`, `parent_id`, `show`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(12, NULL, 0, NULL, '/photos/categories//711640158243.jpg', '2021-12-16 03:16:17', '2021-12-22 03:30:43'),
(13, NULL, 0, NULL, NULL, '2021-12-16 03:18:35', '2021-12-16 03:25:27'),
(14, NULL, 0, NULL, NULL, '2021-12-16 03:23:19', '2021-12-16 03:23:19'),
(15, 12, 0, NULL, NULL, '2021-12-16 03:32:51', '2021-12-16 03:32:51'),
(16, 13, 0, NULL, NULL, '2021-12-20 03:23:06', '2021-12-20 03:23:06'),
(17, 12, 0, NULL, NULL, '2021-12-21 07:42:22', '2021-12-21 07:42:22'),
(18, 12, 0, NULL, NULL, '2021-12-21 07:42:31', '2021-12-21 07:42:31'),
(19, 15, 0, NULL, NULL, '2021-12-21 07:48:16', '2021-12-21 07:48:16'),
(20, 15, 0, NULL, NULL, '2021-12-21 07:48:34', '2021-12-21 07:48:34'),
(21, NULL, 0, NULL, NULL, '2021-12-22 02:56:19', '2021-12-22 02:56:19'),
(22, NULL, 0, NULL, '/photos/categories//481640156617.jpg', '2021-12-22 03:03:37', '2021-12-22 03:03:37'),
(23, 20, 0, NULL, '/photos/categories//161640262038.jpg', '2021-12-23 08:20:38', '2021-12-23 08:20:38'),
(24, 23, 0, NULL, '/photos/categories//551640267166.png', '2021-12-23 09:46:06', '2021-12-23 09:46:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_product_categories_content`
--

CREATE TABLE `lm_product_categories_content` (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `base_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `lm_product_categories_content`
--

INSERT INTO `lm_product_categories_content` (`content_id`, `base_id`, `lang`, `name`) VALUES
(21, 12, 'az', 'ana kategoriya 1'),
(22, 12, 'ru', 'русский kategoriya 1'),
(23, 13, 'az', 'ana kategoriya 2'),
(24, 13, 'ru', 'ana kategoriya 2'),
(25, 14, 'az', 'ana kategoriya 3'),
(26, 14, 'ru', 'ana kategoriya 3'),
(27, 15, 'az', '1in alt kategori 1'),
(28, 15, 'ru', '1in alt kategori 1'),
(29, 16, 'az', 'alt kategoriya for 2'),
(30, 16, 'ru', 'alt kategoriya русский 2'),
(31, 16, 'en', 'alt kategoriya English 2'),
(32, 17, 'az', 'Siqnalizasiya'),
(33, 17, 'ru', 'русский kategoriya 1'),
(34, 17, 'en', 'Şirkət English'),
(35, 18, 'az', 'yangin sondurmeyangin sondurme'),
(36, 18, 'ru', 'русский kategoriya3'),
(37, 18, 'en', 'alt kategoriya English 2'),
(38, 19, 'az', '15in alti'),
(39, 19, 'ru', '15in alti русский'),
(40, 19, 'en', '15in alti English'),
(41, 20, 'az', 'Siqnalizasiya'),
(42, 20, 'ru', 'dasdas'),
(43, 20, 'en', 'Şirkət English'),
(44, 21, 'az', 'Köpüklər Azərbaycanca'),
(45, 21, 'ru', 'Köpüklər русский'),
(46, 21, 'en', 'KöpüklərEnglish'),
(47, 22, 'az', 'Siqnalizasiya'),
(48, 22, 'ru', 'dasdas'),
(49, 22, 'en', 'Şirkət English'),
(50, 23, 'az', 'Kategoriya adı ( Azərbaycanca )'),
(51, 23, 'ru', 'Kategoriya adı ( русский )'),
(52, 23, 'en', 'Kategoriya adı ( English )'),
(53, 24, 'az', 'Siqnalizasiya'),
(54, 24, 'ru', 'Siqnalizasiya'),
(55, 24, 'en', 'Siqnalizasiya');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_services`
--

CREATE TABLE `lm_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `desk` tinyint(4) NOT NULL DEFAULT 1,
  `show` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_services`
--

INSERT INTO `lm_services` (`id`, `image`, `icon`, `active`, `desk`, `show`, `created_at`, `updated_at`) VALUES
(4, '/photos/services/651639739080.jpg', NULL, 1, 1, 0, '2021-12-17 07:04:40', '2021-12-17 07:25:04'),
(5, '/photos/services/261639740257.jpg', NULL, 1, 2, 0, '2021-12-17 07:24:17', '2021-12-17 07:25:06'),
(6, '/photos/services/221639740298.jpg', NULL, 1, 3, 0, '2021-12-17 07:24:58', '2021-12-17 07:25:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_services_content`
--

CREATE TABLE `lm_services_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_content` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_services_content`
--

INSERT INTO `lm_services_content` (`id`, `service_id`, `lang`, `slug`, `name`, `content`, `meta_content`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(6, 4, 'az', 'sirket', 'Şirkət', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Azərbaycanda inşaat mallarının topdan və pərakəndə satışı &uuml;zrə ən b&ouml;y&uuml;k satış mərkəzlərindən olan &ldquo;OMİD&rdquo; MMC 1994-c&uuml; ildən fəaliyyət g&ouml;stərir. Şirkət ilk mağazasını Bakı şəhərində a&ccedil;ıb. Topdan, pərakəndə və korporativ satış sahəsində zəngin iş təcr&uuml;bəsinə malik &ldquo;OMİD&rdquo; MMC-nin hazırda Bakı şəhəri ilə yanaşı, respublikamızın bir &ccedil;ox b&ouml;lgələrində satış mərkəzləri var. Şirkət təklif etdiyi məhsulun, g&ouml;stərdiyi xidmətin keyfiyyəti ilə rəğbət qazanaraq m&uuml;ştəri bazasını g&uuml;nbəg&uuml;n artırmaqdadır.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Geniş məhsul &ccedil;eşidinə sahib OMİD mağazalarında təmir və dizaynla bağlı d&uuml;nya standartlarının tələblərinə cavab verən hər n&ouml;vdə məhsulu m&uuml;nasib qiymətlərlə əldə etmək m&uuml;mk&uuml;nd&uuml;r. &ldquo;OMİD&rdquo; MMC boya, yapışdırıcı, plastik məhsullar, gips, al&ccedil;ı və digər inşaat məhsullarının, o c&uuml;mlədən təmir prosesində gərəkli olan usta alət və texnikalarını, istilik sistemləri, divar kağızları, &ccedil;il&ccedil;ıraq, m&uuml;xtəlif n&ouml;vdə elektrik, bağ-bağ&ccedil;a, məişət malları və ev aksesuarlarını əldə etmənizə imkan yaradır.</p>\r\n<div style=\"box-sizing: border-box; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px; padding: 20px; background-color: #e9f6ff;\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px;\">Şirkətimiz m&uuml;ştəri məmnuniyyətinə b&ouml;y&uuml;k &ouml;nəm verir. Mağazalarımızda rahat se&ccedil;im və vaxta qənaət &uuml;&ccedil;&uuml;n hər c&uuml;r şərait d&uuml;ş&uuml;n&uuml;l&uuml;b. Satış mərkəzlərimizdə divar kağızları, santexnika, elektrik, boya, xırdavat, bağ-bax&ccedil;a və məişət mallarından ibarət b&ouml;lmələr qurulub. Alıcılara d&uuml;zg&uuml;n məhsul se&ccedil;imində k&ouml;mək məqsədilə hər bir b&ouml;lmə &uuml;zrə peşəkar satış m&uuml;təxəssisləri təyin edilib.</p>\r\n</div>\r\n<div style=\"box-sizing: border-box; font-size: 21px; line-height: 27px; margin-bottom: 10px;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">M&uuml;ştərilərin tələb və ehtiyaclarının qarşılanması istiqamətində OMİD xidmətdə bir &ccedil;ox yenilikləri həyata ke&ccedil;irib. Mağazada quraşdırılan FAB rəngləndirmə sistemi vasitəsilə alıcılar istədikləri rəngdə boyanı vaxt itirmədən, cəmi 5 dəqiqə ərzində əldə etmə imkanı qazanırlar. Eyni zamanda m&uuml;ştərilərin tələb və ehtiyaclarının operativ, &ccedil;evik şəkildə qarşılanması &uuml;&ccedil;&uuml;n 890 qısa n&ouml;mrəsi də istifadəyə verilib. Vətəndaşlarımız həmin n&ouml;mrə ilə əlaqə saxlayıb istədikləri məlumatları asanlıqla əldə edə biləcəklər.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Şirkətimizin əsas missiyası keyfiyyətli məhsulu uyğun qiymətlərlə təklif edən, əməkdaşlıq əlaqələrini genişləndirən, &ccedil;eşid &ccedil;oxluğu, &uuml;st&uuml;n xidmət səviyyəsi ilə rahatlığı, g&uuml;vəni və etibarı fəaliyyətində cəmləşdirən, davamlı inkişaf edən brend kimi tanınmaqdır.</p>', 'Şirkətimiz müştəri məmnuniyyətinə böyük önəm verir. Mağazalarımızda rahat seçim və vaxta qənaət üçün hər cür şərait düşünülüb. Satış mərkəzlərimizdə divar kağız', NULL, NULL, NULL),
(7, 5, 'az', 'xidmetler', 'Xidmətlər', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Azərbaycanda inşaat mallarının topdan və pərakəndə satışı &uuml;zrə ən b&ouml;y&uuml;k satış mərkəzlərindən olan &ldquo;OMİD&rdquo; MMC 1994-c&uuml; ildən fəaliyyət g&ouml;stərir. Şirkət ilk mağazasını Bakı şəhərində a&ccedil;ıb. Topdan, pərakəndə və korporativ satış sahəsində zəngin iş təcr&uuml;bəsinə malik &ldquo;OMİD&rdquo; MMC-nin hazırda Bakı şəhəri ilə yanaşı, respublikamızın bir &ccedil;ox b&ouml;lgələrində satış mərkəzləri var. Şirkət təklif etdiyi məhsulun, g&ouml;stərdiyi xidmətin keyfiyyəti ilə rəğbət qazanaraq m&uuml;ştəri bazasını g&uuml;nbəg&uuml;n artırmaqdadır.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Geniş məhsul &ccedil;eşidinə sahib OMİD mağazalarında təmir və dizaynla bağlı d&uuml;nya standartlarının tələblərinə cavab verən hər n&ouml;vdə məhsulu m&uuml;nasib qiymətlərlə əldə etmək m&uuml;mk&uuml;nd&uuml;r. &ldquo;OMİD&rdquo; MMC boya, yapışdırıcı, plastik məhsullar, gips, al&ccedil;ı və digər inşaat məhsullarının, o c&uuml;mlədən təmir prosesində gərəkli olan usta alət və texnikalarını, istilik sistemləri, divar kağızları, &ccedil;il&ccedil;ıraq, m&uuml;xtəlif n&ouml;vdə elektrik, bağ-bağ&ccedil;a, məişət malları və ev aksesuarlarını əldə etmənizə imkan yaradır.</p>\r\n<div style=\"box-sizing: border-box; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px; padding: 20px; background-color: #e9f6ff;\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px;\">Şirkətimiz m&uuml;ştəri məmnuniyyətinə b&ouml;y&uuml;k &ouml;nəm verir. Mağazalarımızda rahat se&ccedil;im və vaxta qənaət &uuml;&ccedil;&uuml;n hər c&uuml;r şərait d&uuml;ş&uuml;n&uuml;l&uuml;b. Satış mərkəzlərimizdə divar kağızları, santexnika, elektrik, boya, xırdavat, bağ-bax&ccedil;a və məişət mallarından ibarət b&ouml;lmələr qurulub. Alıcılara d&uuml;zg&uuml;n məhsul se&ccedil;imində k&ouml;mək məqsədilə hər bir b&ouml;lmə &uuml;zrə peşəkar satış m&uuml;təxəssisləri təyin edilib.</p>\r\n</div>\r\n<div style=\"box-sizing: border-box; font-size: 21px; line-height: 27px; margin-bottom: 10px;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">M&uuml;ştərilərin tələb və ehtiyaclarının qarşılanması istiqamətində OMİD xidmətdə bir &ccedil;ox yenilikləri həyata ke&ccedil;irib. Mağazada quraşdırılan FAB rəngləndirmə sistemi vasitəsilə alıcılar istədikləri rəngdə boyanı vaxt itirmədən, cəmi 5 dəqiqə ərzində əldə etmə imkanı qazanırlar. Eyni zamanda m&uuml;ştərilərin tələb və ehtiyaclarının operativ, &ccedil;evik şəkildə qarşılanması &uuml;&ccedil;&uuml;n 890 qısa n&ouml;mrəsi də istifadəyə verilib. Vətəndaşlarımız həmin n&ouml;mrə ilə əlaqə saxlayıb istədikləri məlumatları asanlıqla əldə edə biləcəklər.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Şirkətimizin əsas missiyası keyfiyyətli məhsulu uyğun qiymətlərlə təklif edən, əməkdaşlıq əlaqələrini genişləndirən, &ccedil;eşid &ccedil;oxluğu, &uuml;st&uuml;n xidmət səviyyəsi ilə rahatlığı, g&uuml;vəni və etibarı fəaliyyətində cəmləşdirən, davamlı inkişaf edən brend kimi tanınmaqdır.</p>', 'Müştərilərin tələb və ehtiyaclarının qarşılanması istiqamətində OMİD xidmətdə bir çox yenilikləri həyata keçirib. Mağazada quraşdırılan FAB rəngləndirmə sistemi', NULL, NULL, NULL),
(8, 6, 'az', 'catdirilma', 'Çatdırılma', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Azərbaycanda &Ccedil;atdırılmamallarının topdan və pərakəndə satışı &uuml;zrə ən b&ouml;y&uuml;k satış mərkəzlərindən olan &ldquo;OMİD&rdquo; MMC 1994-c&uuml; ildən fəaliyyət g&ouml;stərir. Şirkət ilk mağazasını Bakı şəhərində a&ccedil;ıb. Topdan, pərakəndə və korporativ satış sahəsində zəngin iş təcr&uuml;bəsinə malik &ldquo;OMİD&rdquo; MMC-nin hazırda Bakı şəhəri ilə yanaşı, respublikamızın bir &ccedil;ox b&ouml;lgələrində satış mərkəzləri var. Şirkət təklif etdiyi məhsulun, g&ouml;stərdiyi xidmətin keyfiyyəti ilə rəğbət qazanaraq m&uuml;ştəri bazasını g&uuml;nbəg&uuml;n artırmaqdadır.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Geniş məhsul &ccedil;eşidinə sahib OMİD mağazalarında təmir və dizaynla bağlı d&uuml;nya standartlarının tələblərinə cavab verən hər n&ouml;vdə məhsulu m&uuml;nasib qiymətlərlə əldə etmək m&uuml;mk&uuml;nd&uuml;r. &ldquo;OMİD&rdquo; MMC boya, yapışdırıcı, plastik məhsullar, gips, al&ccedil;ı və digər inşaat məhsullarının, o c&uuml;mlədən təmir prosesində gərəkli olan usta alət və texnikalarını, istilik sistemləri, divar kağızları, &ccedil;il&ccedil;ıraq, m&uuml;xtəlif n&ouml;vdə elektrik, bağ-bağ&ccedil;a, məişət malları və ev aksesuarlarını əldə etmənizə imkan yaradır.</p>\r\n<div style=\"box-sizing: border-box; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px; padding: 20px; background-color: #e9f6ff;\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px;\">Şirkətimiz m&uuml;ştəri məmnuniyyətinə b&ouml;y&uuml;k &ouml;nəm verir. Mağazalarımızda rahat se&ccedil;im və vaxta qənaət &uuml;&ccedil;&uuml;n hər c&uuml;r şərait d&uuml;ş&uuml;n&uuml;l&uuml;b. Satış mərkəzlərimizdə divar kağızları, santexnika, elektrik, boya, xırdavat, bağ-bax&ccedil;a və məişət mallarından ibarət b&ouml;lmələr qurulub. Alıcılara d&uuml;zg&uuml;n məhsul se&ccedil;imində k&ouml;mək məqsədilə hər bir b&ouml;lmə &uuml;zrə peşəkar satış m&uuml;təxəssisləri təyin edilib.</p>\r\n</div>\r\n<div style=\"box-sizing: border-box; font-size: 21px; line-height: 27px; margin-bottom: 10px;\">&nbsp;</div>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">M&uuml;ştərilərin tələb və ehtiyaclarının qarşılanması istiqamətində OMİD xidmətdə bir &ccedil;ox yenilikləri həyata ke&ccedil;irib. Mağazada quraşdırılan FAB rəngləndirmə sistemi vasitəsilə alıcılar istədikləri rəngdə boyanı vaxt itirmədən, cəmi 5 dəqiqə ərzində əldə etmə imkanı qazanırlar. Eyni zamanda m&uuml;ştərilərin tələb və ehtiyaclarının operativ, &ccedil;evik şəkildə qarşılanması &uuml;&ccedil;&uuml;n 890 qısa n&ouml;mrəsi də istifadəyə verilib. Vətəndaşlarımız həmin n&ouml;mrə ilə əlaqə saxlayıb istədikləri məlumatları asanlıqla əldə edə biləcəklər.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; color: #2d2d2d; font-family: Montserrat, sans-serif; text-indent: 15px;\">Şirkətimizin əsas missiyası keyfiyyətli məhsulu uyğun qiymətlərlə təklif edən, əməkdaşlıq əlaqələrini genişləndirən, &ccedil;eşid &ccedil;oxluğu, &uuml;st&uuml;n xidmət səviyyəsi ilə rahatlığı, g&uuml;vəni və etibarı fəaliyyətində cəmləşdirən, davamlı inkişaf edən brend kimi tanınmaqdır.</p>', 'Azərbaycanda Çatdırılmamallarının topdan və pərakəndə satışı üzrə ən böyük satış mərkəzlərindən olan “OMİD” MMC 1994-cü ildən fəaliyyət göstərir. Şirkət ilk mağ', NULL, NULL, NULL),
(9, 4, 'ru', 'sirket-russkii', 'Şirkət русский', NULL, NULL, NULL, NULL, NULL),
(10, 4, 'en', 'sirket-english', 'Şirkət English', '<p><span style=\"color: #7c8798; font-family: Rubik, sans-serif; font-size: 16px;\">English</span></p>', 'English', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_sitesetting`
--

CREATE TABLE `lm_sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_content` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `any_meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_analytcs_script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_sitesetting`
--

INSERT INTO `lm_sitesetting` (`id`, `logo`, `footer_logo`, `favicon`, `site_url`, `title`, `meta_content`, `meta_keywords`, `any_meta_tags`, `g_analytcs_script`, `whatsapp_script`, `chat_script`, `social`, `created_at`, `updated_at`) VALUES
(2, '/photos/site/271639729643.png', '/photos/site/521639729643.png', '/photos/site/611639729643.png', NULL, 'Protool.az', 'Protool', NULL, NULL, NULL, '<script>\r\n    window.onload = function(){\r\n        whatsapp_se_btn_phone = \'+994773294262\'; //Telefon numaramız.\r\n        whatsapp_se_btn_msg = \'Sizinle iletişime geçmek istiyorum.\'; //Yazılmasını istediğimiz hazır mesaj.\r\n        $(document.body).append(\'<div class=\"whatsapp-se-btn\"></div>\'),\r\n            whatsapp_se_btn_base64=\"https://image.flaticon.com/icons/svg/124/124034.svg\",\r\n            $(\".whatsapp-se-btn\").attr(\"style\",\"position:fixed;bottom:15px;left:15px;overflow:hidden;background:#1bd741;color:#ffffff;text-align:center;padding:4px 4px;z-index:9999999;cursor:pointer;box-shadow:#000000 0 0 5px;border-radius:100px;\"),\r\n            $(\".whatsapp-se-btn\").html(\'<img style=\"width: 45px;\" src=\"\'+whatsapp_se_btn_base64+\'\" alt=\"Whatsapp ile İletişime Geç\" />\'),\r\n            $(\".whatsapp-se-btn\").attr(\"onclick\",\'window.open(\"https://wa.me/\'+whatsapp_se_btn_phone+\"?text=\"+whatsapp_se_btn_msg+\'\")\');}\r\n</script>', NULL, NULL, NULL, '2021-12-17 06:20:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lm_users`
--

CREATE TABLE `lm_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lm_users`
--

INSERT INTO `lm_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin efendi', 'demo@admin.com', NULL, '$2y$10$V820Mw5EqlkpsMrGgE6pHu.sBvlobOrONqkK8b3NSNYMIF9VDrGZe', NULL, '2021-06-24 08:23:11', '2021-12-13 07:51:27');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `lm_aboutus_content`
--
ALTER TABLE `lm_aboutus_content`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_about_us`
--
ALTER TABLE `lm_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_adjustment`
--
ALTER TABLE `lm_adjustment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_blogcategories`
--
ALTER TABLE `lm_blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_blogcategory_contents`
--
ALTER TABLE `lm_blogcategory_contents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_blogs`
--
ALTER TABLE `lm_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_blog_contents`
--
ALTER TABLE `lm_blog_contents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_carousel`
--
ALTER TABLE `lm_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_carousel_content`
--
ALTER TABLE `lm_carousel_content`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_contact`
--
ALTER TABLE `lm_contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_customers`
--
ALTER TABLE `lm_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lm_customers_email_unique` (`email`);

--
-- Tablo için indeksler `lm_customer_adresses`
--
ALTER TABLE `lm_customer_adresses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_customer_cart`
--
ALTER TABLE `lm_customer_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lm_customer_cart_customer_id_foreign` (`customer_id`),
  ADD KEY `lm_customer_cart_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `lm_customer_reviews`
--
ALTER TABLE `lm_customer_reviews`
  ADD PRIMARY KEY (`cr_id`);

--
-- Tablo için indeksler `lm_customer_wishlist`
--
ALTER TABLE `lm_customer_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_failed_jobs`
--
ALTER TABLE `lm_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_faqs`
--
ALTER TABLE `lm_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_faq_contents`
--
ALTER TABLE `lm_faq_contents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_gallery`
--
ALTER TABLE `lm_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_languages`
--
ALTER TABLE `lm_languages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_message`
--
ALTER TABLE `lm_message`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_migrations`
--
ALTER TABLE `lm_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_press`
--
ALTER TABLE `lm_press`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_presscategories`
--
ALTER TABLE `lm_presscategories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_products`
--
ALTER TABLE `lm_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_products_content`
--
ALTER TABLE `lm_products_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Tablo için indeksler `lm_products_images`
--
ALTER TABLE `lm_products_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Tablo için indeksler `lm_product_categories`
--
ALTER TABLE `lm_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_product_categories_content`
--
ALTER TABLE `lm_product_categories_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Tablo için indeksler `lm_services`
--
ALTER TABLE `lm_services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_services_content`
--
ALTER TABLE `lm_services_content`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_sitesetting`
--
ALTER TABLE `lm_sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lm_users`
--
ALTER TABLE `lm_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lm_users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `lm_aboutus_content`
--
ALTER TABLE `lm_aboutus_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `lm_about_us`
--
ALTER TABLE `lm_about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `lm_adjustment`
--
ALTER TABLE `lm_adjustment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `lm_blogcategories`
--
ALTER TABLE `lm_blogcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `lm_blogcategory_contents`
--
ALTER TABLE `lm_blogcategory_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `lm_blogs`
--
ALTER TABLE `lm_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `lm_blog_contents`
--
ALTER TABLE `lm_blog_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `lm_carousel`
--
ALTER TABLE `lm_carousel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `lm_carousel_content`
--
ALTER TABLE `lm_carousel_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `lm_contact`
--
ALTER TABLE `lm_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `lm_customers`
--
ALTER TABLE `lm_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `lm_customer_adresses`
--
ALTER TABLE `lm_customer_adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lm_customer_cart`
--
ALTER TABLE `lm_customer_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Tablo için AUTO_INCREMENT değeri `lm_customer_reviews`
--
ALTER TABLE `lm_customer_reviews`
  MODIFY `cr_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `lm_customer_wishlist`
--
ALTER TABLE `lm_customer_wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `lm_failed_jobs`
--
ALTER TABLE `lm_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `lm_faqs`
--
ALTER TABLE `lm_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `lm_faq_contents`
--
ALTER TABLE `lm_faq_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `lm_gallery`
--
ALTER TABLE `lm_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `lm_languages`
--
ALTER TABLE `lm_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `lm_message`
--
ALTER TABLE `lm_message`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `lm_migrations`
--
ALTER TABLE `lm_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `lm_press`
--
ALTER TABLE `lm_press`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `lm_presscategories`
--
ALTER TABLE `lm_presscategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `lm_products`
--
ALTER TABLE `lm_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `lm_products_content`
--
ALTER TABLE `lm_products_content`
  MODIFY `content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `lm_products_images`
--
ALTER TABLE `lm_products_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `lm_product_categories`
--
ALTER TABLE `lm_product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `lm_product_categories_content`
--
ALTER TABLE `lm_product_categories_content`
  MODIFY `content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `lm_services`
--
ALTER TABLE `lm_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `lm_services_content`
--
ALTER TABLE `lm_services_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `lm_sitesetting`
--
ALTER TABLE `lm_sitesetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `lm_users`
--
ALTER TABLE `lm_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `lm_customer_cart`
--
ALTER TABLE `lm_customer_cart`
  ADD CONSTRAINT `lm_customer_cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `lm_customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lm_customer_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `lm_products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
