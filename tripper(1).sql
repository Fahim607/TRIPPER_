-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 08:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripper`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `activity_description` longtext NOT NULL,
  `activity_price` varchar(20) NOT NULL,
  `location` varchar(25) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_name`, `activity_description`, `activity_price`, `location`, `img`) VALUES
(1, 'Beach Volleyball', 'Enjoy a game of beach volleyball on the sandy shores of Cox\'s Bazar.', '50', 'Cox\'s Bazar', '3.jpg'),
(2, 'Parasailing Adventure', 'Soar high above the Bay of Bengal with thrilling parasailing.', '300', 'Cox\'s Bazar', '5.jpg'),
(3, 'Inani Beach Sunset Cruise', 'Take a serene cruise to witness the breathtaking sunset at Inani Beach.', '200', 'Cox\'s Bazar', '4.jpg'),
(4, 'Surfing Lessons', 'Learn to catch the waves with professional surfing instructors.', '250', 'Cox\'s Bazar', '2.jpg'),
(5, 'Beach Volleyball', 'Enjoy a game of beach volleyball on the sandy shores of Cox\'s Bazar.', '50', 'Saint Martin\'s Island', '3.jpg'),
(6, 'Parasailing Adventure', 'Soar high above the Bay of Bengal with thrilling parasailing.', '300', 'Saint Martin\'s Island', '5.jpg'),
(7, 'Inani Beach Sunset Cruise', 'Take a serene cruise to witness the breathtaking sunset at Inani Beach.', '200', 'Saint Martin\'s Island', '4.jpg'),
(8, 'Surfing Lessons', 'Learn to catch the waves with professional surfing instructors.', '250', 'Saint Martin\'s Island', '2.jpg'),
(13, 'Trek to Boga Lake', 'Embark on a challenging trek to the stunning Boga Lake in Bandarban.', '500', 'Bandarban', '6.jpg'),
(14, 'Waterfall Rappelling', 'Experience the adrenaline rush with waterfall rappelling in Bandarban.', '350', 'Bandarban', '9.jpg'),
(15, 'Hiking to Nilgiri Hills', 'Explore the lush greenery with a hike to Nilgiri Hills.', '200', 'Bandarban', '6.jpg'),
(16, 'Zip Lining Adventure', 'Glide through the treetops on an exhilarating zip line adventure.', '150', 'Sajek Valley', '8.jpg'),
(17, 'Cultural Night with Local Tribes', 'Experience the unique culture and traditions of local tribes in Sajek Valley.', '100', 'Sajek Valley', '10.jpg'),
(18, 'Nature Photography Tour', 'Capture the scenic beauty of Sajek Valley with a guided photography tour.', '80', 'Sajek Valley', '13.jpg'),
(19, 'Boat Ride on Kaptai Lake', 'Enjoy a peaceful boat ride on the scenic Kaptai Lake.', '120', 'Rangamati', '14.jpg'),
(20, 'Trekking in Sangu Forest', 'Explore the lush Sangu Forest with a trekking expedition.', '250', 'Rangamati', ''),
(21, 'Visit to Rajban Vihara', 'Discover the ancient Buddhist temple of Rajban Vihara in Rangamati.', '50', 'Rangamati', ''),
(22, 'Sundarbans Jungle Safari', 'Embark on an adventurous jungle safari in the heart of Sundarbans.', '350', 'Sundarbans', ''),
(23, 'Bird Watching Tour', 'Spot rare and exotic bird species during a bird watching tour in Sundarbans.', '100', 'Sundarbans', ''),
(24, 'Tiger Tracking Expedition', 'Join a thrilling expedition to track the elusive Bengal tiger in Sundarbans.', '500', 'Sundarbans', '7.jpg'),
(25, 'Cycling along the Seashore', 'Rent a bicycle and explore the scenic beauty of Kuakata along the seashore.', '40', 'Kuakata', '1.jpg'),
(26, 'Beachside Horseback Riding', 'Enjoy a horseback ride on the picturesque beaches of Kuakata.', '80', 'Kuakata', '11.jpg'),
(27, 'Fishing Trips', 'Experience traditional fishing with local fishermen in Kuakata.', '60', 'Kuakata', '12.jpg'),
(28, 'Snorkeling Adventure', 'Discover the vibrant underwater world of Saint Martin with snorkeling.', '150', 'Saint Martin\'s Island', ''),
(29, 'Island Hopping Tour', 'Explore the neighboring islands of Saint Martin on a guided island hopping tour.', '200', 'Saint Martin\'s Island', ''),
(30, 'Seafood Feast', 'Savor a delicious seafood feast with fresh catches from the Bay of Bengal.', '80', 'Saint Martin\'s Island', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `admin_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(5) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `trans_name` varchar(20) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `no_of_user` varchar(5) NOT NULL,
  `journey_start` varchar(20) NOT NULL,
  `journey_end` varchar(20) NOT NULL,
  `total_amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `room_id`, `room_name`, `trans_name`, `user_id`, `no_of_user`, `journey_start`, `journey_end`, `total_amount`) VALUES
(1, 19, ' Mountain Lodge ', 'Hanif-B2391', '1', '2', '2023-10-03', '2023-10-06', '1440'),
(2, 1, 'Ocean View Resort', 'Hanif-B2390', '1', '2', '2023-10-03', '2023-10-06', '4850'),
(3, 2, 'Ocean View Resort', 'Ocean View Resort', '1', '2', '2023-10-03', '2023-10-04', '31740');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`hotel_id`, `hotel_name`, `location`) VALUES
(1, 'Ocean View Resort', 'Cox\'s Bazar'),
(2, 'Mangrove Lodge', 'Sundarbans'),
(3, 'Hillside Retreat', 'Sylhet'),
(4, 'City Plaza Hotel', 'Dhaka'),
(5, 'Tribal Oasis', 'Chittagong Hill Tracts'),
(6, 'Island Paradise Resort', 'Saint Martin\'s Island'),
(7, 'Mountain Lodge', 'Bandarban'),
(8, 'Riverfront Retreat', 'Rangamati'),
(9, 'Sandy Shores Inn', 'Kuakata'),
(10, 'Historic Guesthouse', 'Paharpur'),
(11, 'Beach Breeze Hotel', 'Maheshkhali Island'),
(12, 'Fort View Inn', 'Lalbagh Fort, Dhaka'),
(13, 'Sunset Beach Resort', 'Ratnodweep, Kuakata'),
(14, 'Tea Garden Inn', 'Jaflong'),
(15, 'Royal Palace Hotel', 'Puthia, Rajshahi'),
(16, 'Waterfall Lodge', 'Madhabkunda Waterfall'),
(17, 'Island Hideaway', 'Moheshkhali, Cox\'s Bazar'),
(18, 'Memorial Hotel', 'Chittagong War Cemetery'),
(19, 'Heritage Inn', 'Bagerhat'),
(20, 'Jungle Retreat', 'Lawachara National Park'),
(21, 'Architect\'s Haven', 'Jatiya Sangsad Bhaban, Dhaka'),
(22, 'Hilltop Homestay', 'Sajek Valley'),
(23, 'Lakefront Resort', 'Kaptai Lake, Rangamati'),
(24, 'Beachfront Haven', 'Kuakata Sea Beach'),
(25, 'Ancient Abode', 'Shalban Vihara, Comilla'),
(26, 'Tea Leaf Lodge', 'Srimangal'),
(27, 'Literary Getaway', 'Nuhash Polli, Gazipur'),
(28, 'Seaside Serenity', 'Ratnodweep Sea Beach, Kuakata'),
(29, 'Mountain View Inn', 'Nilgiri Hills'),
(30, 'City Park Hotel', 'Ramna Park, Dhaka'),
(31, 'Coastal Comfort', 'Charaputia, Cox\'s Bazar'),
(32, 'Lakeside Retreat', 'Foy\'s Lake, Chittagong'),
(33, 'Historic Lodgings', 'Panam Nagar, Sonargaon'),
(34, 'Hillside Haven', 'Boga Lake'),
(35, 'Museum View Hotel', 'Zia Memorial Museum, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `room_id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `room_price` varchar(30) NOT NULL,
  `room_bed` varchar(30) NOT NULL,
  `img1` varchar(250) NOT NULL,
  `room_capacity` varchar(20) NOT NULL,
  `review` varchar(20) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `amenities_1` varchar(40) NOT NULL,
  `amenities_2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`room_id`, `hotel_name`, `room_price`, `room_bed`, `img1`, `room_capacity`, `review`, `rating`, `amenities_1`, `amenities_2`) VALUES
(1, 'Ocean View Resort', '3500', '1', 'hotel1.jpg', '2', '237', '4.8', 'Breakfast', 'Hot Tubs'),
(2, 'Ocean View Resort', '6800', '2', 'hotel2.jpg', '4', '189', '4.6', 'Free Wi-Fi', 'Balcony'),
(3, 'Ocean View Resort', '4200', '2', 'hotel3.jpg', '3', '148', '4.7', 'Swimming Pool', 'Sea View'),
(4, 'Mangrove Lodge', '250', '1', 'hotel4.jpg', '4', '127', '4.5', 'Free Parking', 'Restaurant'),
(5, 'Mangrove Lodge', '210', '2', 'hotel5.jpg', '4', '98', '4.4', 'Wildlife Tours', 'Barbecue'),
(6, 'Mangrove Lodge', '300', '2', 'hotel6.jpg', '3', '75', '4.6', 'Boating', 'Hiking Trails'),
(7, 'Hillside Retreat', '180', '1', 'hotel7.jpg', '2', '145', '4.7', 'Free Breakfast', 'Mountain View'),
(8, 'Hillside Retreat', '210', '2', 'hotel8.jpg', '2', '112', '4.6', 'Free Wi-Fi', 'Balcony'),
(9, 'Hillside Retreat', '250', '2', 'hotel9.jpg', '4', '98', '4.8', 'Restaurant', 'Swimming Pool'),
(10, 'City Plaza Hotel', '120', '1', 'hotel10.jpg', '2', '215', '4.5', 'Free Wi-Fi', 'Restaurant'),
(11, 'City Plaza Hotel', '150', '2', 'hotel1.jpg', '2', '180', '4.4', 'Breakfast', 'Fitness Center'),
(12, 'City Plaza Hotel', '180', '2', 'hotel2.jpg', '3', '155', '4.6', 'Parking', 'Conference Rooms'),
(13, 'Tribal Oasis', '160', '1', 'hotel3.jpg', '2', '98', '4.3', 'Trekking Tours', 'Cultural Shows'),
(14, 'Tribal Oasis', '190', '2', 'hotel4.jpg', '2', '85', '4.2', 'Free Parking', 'Library'),
(15, 'Tribal Oasis', '220', '2', 'hotel5.jpg', '3', '72', '4.4', 'Restaurant', 'Bonfire Nights'),
(16, 'Island Paradise Resort', '280', '1', 'hotel6.jpg', '2', '125', '4.7', 'Beachfront', 'Snorkeling Gear'),
(17, 'Island Paradise Resort', '320', '2', 'hotel7.jpg', '4', '98', '4.6', 'Water Sports', 'Sun Loungers'),
(18, 'Island Paradise Resort', '360', '2', 'hotel8.jpg', '3', '76', '4.8', 'Restaurant', 'Spa Services'),
(19, 'Mountain Lodge', '190', '1', 'hotel9.jpg', '2', '155', '4.6', 'Trekking Tours', 'Hill Views'),
(20, 'Mountain Lodge', '220', '2', 'hotel10.jpg', '2', '120', '4.5', 'Free Wi-Fi', 'Bonfire Nights'),
(21, 'Mountain Lodge', '260', '2', 'hotel1.jpg', '3', '95', '4.7', 'Café', 'Mountain Biking'),
(22, 'Riverfront Retreat', '180', '', 'hotel2.jpg', '2', '135', '4.5', 'Boating', 'Lake Views'),
(23, 'Riverfront Retreat', '210', '2', 'hotel3.jpg', '2', '108', '4.4', 'Free Parking', 'Restaurant'),
(24, 'Riverfront Retreat', '250', '2', 'hotel4.jpg', '3', '92', '4.6', 'Swimming Pool', 'Mountain Biking'),
(25, 'Sandy Shores Inn', '110', '1', 'hotel5.jpg', '2', '198', '4.4', 'Free Breakfast', 'Beachfront'),
(26, 'Sandy Shores Inn', '140', '2', 'hotel6.jpg', '2', '175', '4.3', 'Bicycle Rentals', 'Sea Views'),
(27, 'Sandy Shores Inn', '170', '2', 'hotel7.jpg', '3', '148', '4.5', 'Restaurant', 'Hot Tubs'),
(28, 'Historic Guesthouse', '90', '1', 'hotel8.jpg', '2', '125', '4.2', 'Free Wi-Fi', 'Historical Tours'),
(29, 'Historic Guesthouse', '120', '2', 'hotel9.jpg', '2', '98', '4.1', 'Library', 'Restaurant'),
(30, 'Historic Guesthouse', '150', '2', 'hotel3.jpg', '3', '72', '4.3', 'Garden', 'Cultural Shows'),
(31, 'Beach Breeze Hotel', '120', '1', 'hotel1.jpg', '2', '110', '4.3', 'Beachfront', 'Sea Views'),
(32, 'Beach Breeze Hotel', '150', '2', 'hotel2.jpg', '2', '88', '4.2', 'Free Wi-Fi', 'Restaurant'),
(33, 'Beach Breeze Hotel', '180', '2', 'hotel3.jpg', '3', '67', '4.4', 'Snorkeling Gear', 'Fishing Tours'),
(34, 'Fort View Inn', '100', '1', 'hotel4.jpg', '2', '155', '4.1', 'Free Wi-Fi', 'Historical Tours'),
(35, 'Fort View Inn', '130', '2', 'hotel5.jpg', '2', '128', '4.0', 'Library', 'Restaurant'),
(36, 'Fort View Inn', '160', '2', 'hotel6.jpg', '3', '105', '4.2', 'City Views', 'Cultural Shows'),
(37, 'Sunset Beach Resort', '95', '1', 'hotel7.jpg', '2', '85', '4.0', 'Beachfront', 'Beach Games'),
(38, 'Sunset Beach Resort', '120', '2', 'hotel8.jpg', '2', '70', '3.9', 'Free Wi-Fi', 'Restaurant'),
(39, 'Sunset Beach Resort', '140', '2', 'hotel9.jpg', '3', '55', '4.1', 'Beach Bonfire', 'Snorkeling Gear'),
(40, 'Tea Garden Inn', '110', '1', 'hotel10.jpg', '2', '125', '4.2', 'Free Wi-Fi', 'Garden Views'),
(41, 'Tea Garden Inn', '140', '2', 'hotel1.jpg', '2', '98', '4.1', 'Library', 'Restaurant'),
(42, 'Tea Garden Inn', '170', '2', 'hotel2.jpg', '3', '72', '4.3', 'Tea Plantation Tours', 'Cultural Shows'),
(43, 'Royal Palace Hotel', '90', '1', 'hotel3.jpg', '2', '110', '4.1', 'Free Wi-Fi', 'Historical Tours'),
(44, 'Royal Palace Hotel', '120', '2', 'hotel4.jpg', '2', '88', '4.0', 'Library', 'Restaurant'),
(45, 'Royal Palace Hotel', '150', '2', 'hotel5.jpg', '3', '67', '4.2', 'Garden', 'Cultural Shows'),
(46, 'Waterfall Lodge', '80', '1', 'hotel6.jpg', '2', '95', '4.0', 'Waterfall Views', 'Trekking Tours'),
(47, 'Waterfall Lodge', '100', '2', 'hotel7.jpg', '2', '78', '3.9', 'Free Wi-Fi', 'Restaurant'),
(48, 'Waterfall Lodge', '120', '2', 'hotel8.jpg', '3', '62', '4.1', 'Adventure Activities', 'Bonfire Nights'),
(49, 'Island Hideaway', '140', '1', 'hotel9.jpg', '2', '80', '4.0', 'Beachfront', 'Snorkeling Gear'),
(50, 'Island Hideaway', '170', '2', 'hotel10.jpg', '2', '65', '3.9', 'Free Wi-Fi', 'Restaurant'),
(51, 'Island Hideaway', '200', '2', 'hotel1.jpg', '3', '52', '4.1', 'Boat Tours', 'Fishing Equipment'),
(52, 'Memorial Hotel', '80', '1', 'hotel2.jpg', '2', '75', '4.0', 'Historical Tours', 'Free Parking'),
(53, 'Memorial Hotel', '100', '2', 'hotel3.jpg', '2', '62', '3.9', 'Restaurant', 'Museum Visits'),
(54, 'Memorial Hotel', '120', '2', 'hotel4.jpg', '3', '50', '4.1', 'Garden Views', 'Cultural Shows'),
(55, 'Heritage Inn, Bagerhat', '90', '1', 'hotel5.jpg', '2', '70', '3.8', 'Historical Tours', 'Free Wi-Fi'),
(56, 'Heritage Inn, Bagerhat', '110', '2', 'hotel6.jpg', '2', '55', '3.7', 'Restaurant', 'Library'),
(57, 'Heritage Inn, Bagerhat', '130', '2', 'hotel7.jpg', '3', '45', '3.9', 'Garden Views', 'Cultural Shows'),
(58, 'Jungle Retreat', '80', '1', 'hotel8.jpg', '2', '62', '4.0', 'Jungle Treks', 'Free Wi-Fi'),
(59, 'Jungle Retreat', '100', '2', 'hotel9.jpg', '2', '50', '3.9', 'Bird Watching', 'Restaurant'),
(60, 'Jungle Retreat', '120', '2', 'hotel10.jpg', '3', '42', '4.1', 'Wildlife Tours', 'Camping'),
(61, 'Architect\'s Haven', '95', '1', 'hotel6.jpg', '2', '58', '3.8', 'Historical Tours', 'Free Wi-Fi'),
(62, 'Architect\'s Haven', '120', '2', 'hotel2.jpg', '2', '45', '3.7', 'Library', 'Restaurant'),
(63, 'Architect\'s Haven', '140', '2', 'hotel3.jpg', '3', '38', '3.9', 'City Views', 'Cultural Shows'),
(64, 'Hilltop Homestay', '85', '1', 'hotel4.jpg', '2', '48', '3.7', 'Mountain Views', 'Free Wi-Fi'),
(65, 'Hilltop Homestay', '110', '2', 'hotel5.jpg', '2', '38', '3.6', 'Trekking Tours', 'Restaurant'),
(66, 'Hilltop Homestay', '130', '2', 'hotel6.jpg', '3', '32', '3.8', 'Cultural Shows', 'Bonfire Nights'),
(67, 'Lakefront Resort', '120', '1', 'hotel7.jpg', '2', '52', '3.7', 'Lake Views', 'Free Wi-Fi'),
(68, 'Lakefront Resort', '140', '2', 'hotel8.jpg', '2', '43', '3.6', 'Boating', 'Restaurant'),
(69, 'Lakefront Resort', '160', '2', 'hotel9.jpg', '3', '36', '3.8', 'Swimming Pool', 'Mountain Biking'),
(70, 'Beachfront Haven', '80', '1', 'hotel7.jpg', '2', '35', '3.6', 'Beachfront', 'Free Wi-Fi'),
(71, 'Beachfront Haven', '100', '2', 'hotel1.jpg', '2', '28', '3.5', 'Sun Loungers', 'Restaurant'),
(72, 'Beachfront Haven', '120', '2', 'hotel2.jpg', '3', '25', '3.7', 'Sea Views', 'Beach Games');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(40) NOT NULL,
  `climate` varchar(40) NOT NULL,
  `activities` varchar(250) NOT NULL,
  `budget` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `climate`, `activities`, `budget`, `type`, `location_img`) VALUES
(1, 'Cox\'s Bazar', 'Warm and humid', 'Beach, water sports, seafood', 'Mid-range', 'Coastal', 'img/location/cox.jpg'),
(2, 'Sajek Valley', 'Tropical', 'Hiking, Chander Gari, Golden Temple', 'Medium', 'Mountain', 'img/location/sajek.jpg'),
(3, 'Sundarbans', 'Tropical', 'Wildlife safari, mangrove forest exploration', 'Mid-range', 'Natural', 'img/location/sundor.jpg'),
(4, 'Sylhet', 'Mild and temperate', 'Tea gardens, waterfalls, trekking', 'Budget-friendly', 'Hill station', 'img/location/sylhet.jpg'),
(5, 'Dhaka', 'Tropical', 'Historical sites, shopping, culture', 'Mid-range', 'Urban', 'img/location/dhaka.jpg'),
(6, 'Chittagong Hill Tracts', 'Cool and refreshing', 'Trekking, indigenous culture', 'Mid-range', 'Hill station', 'img/location/chitta.jpg'),
(7, 'Saint Martin\'s Island', 'Tropical', 'Beach, snorkeling, scuba diving', 'Mid-range', 'Coastal', 'img/location/saint.jpg'),
(8, 'Bandarban', 'Cool and refreshing', 'Trekking, tribal culture', 'Mid-range', 'Hill station', 'img/location/bandarban.jpg'),
(9, 'Rangamati', 'Cool and refreshing', 'Boating, hill views, tribal culture', 'Mid-range', 'Hill station', 'img/location/rang.jpg'),
(10, 'Kuakata', 'Warm and humid', 'Beach, sunsets, cycling', 'Budget-friendly', 'Coastal', 'img/location/kuakata.jpg'),
(11, 'Paharpur', 'Tropical', 'Archaeological site, history', 'Budget-friendly', 'Historical', 'img/location/paharpur.jpg'),
(12, 'Maheshkhali Island', 'Tropical', 'Beach, Buddhist temple, fishing', 'Budget-friendly', 'Coastal', 'img/location/mahes.jpg'),
(13, 'Lalbagh Fort, Dhaka', 'Tropical', 'Historical site, architecture', 'Budget-friendly', 'Historical', 'img/location/lalbaghfort.jpg'),
(14, 'Ratnodweep, Kuakata', 'Warm and humid', 'Beach, relaxation', 'Budget-friendly', 'Coastal', 'img/location/ratnodweep.jpg'),
(15, 'Jaflong', 'Mild and temperate', 'Scenic beauty, tea gardens, Khasi culture', 'Mid-range', 'Natural', 'img/location/jaflong.jpg'),
(16, 'Puthia, Rajshahi', 'Tropical', 'Temple complex, historical', 'Budget-friendly', 'Historical', 'img/location/puthia.jpg'),
(17, 'Madhabkunda Waterfall', 'Mild and temperate', 'Waterfall, trekking', 'Budget-friendly', 'Natural', 'img/location/madhabkundawaterfall.jpg'),
(18, 'Moheshkhali, Cox\'s Bazar', 'Tropical', 'Beach, Buddhist temple', 'Budget-friendly', 'Coastal', 'img/location/moheshkhali.jpg'),
(19, 'Chittagong War Cemetery', 'Tropical', 'Historical site, remembrance', 'Budget-friendly', 'Historical', 'img/location/chittagongwarcemetery.jpg'),
(20, 'Bagerhat', 'Tropical', 'Mosque city, history', 'Budget-friendly', 'Historical', 'img/location/bagerhat.jpg'),
(21, 'Lawachara National Park', 'Cool and refreshing', 'Wildlife, trekking', 'Budget-friendly', 'Natural', 'img/location/lawacharanationalpark.jpg'),
(22, 'Jatiya Sangsad Bhaban, Dhaka', 'Tropical', 'Architectural marvel, history', 'Budget-friendly', 'Historical', 'img/location/jatiyasangsadbhaban.jpg'),
(23, 'Sajek Valley', 'Cool and refreshing', 'Hill views, indigenous culture', 'Mid-range', 'Hill station', 'img/location/sajekvalley.jpg'),
(24, 'Kaptai Lake, Rangamati', 'Cool and refreshing', 'Boating, hill views', 'Mid-range', 'Natural', 'img/location/kaptailake.jpg'),
(25, 'Kuakata Sea Beach', 'Warm and humid', 'Beach, sunsets', 'Budget-friendly', 'Coastal', 'img/location/kuakataseabeach.jpg'),
(26, 'Shalban Vihara, Comilla', 'Tropical', 'Archaeological site, history', 'Budget-friendly', 'Historical', 'shalbanvihara.jpg'),
(27, 'Srimangal', 'Mild and temperate', 'Tea gardens, wildlife', 'Mid-range', 'Hill station', 'srimangal.jpg'),
(28, 'Nuhash Polli, Gazipur', 'Tropical', 'Literary heritage, nature', 'Mid-range', 'Natural', 'nuhashpolli.jpg'),
(29, 'Ratnodweep Sea Beach, Kuakata', 'Warm and humid', 'Beach, relaxation', 'Budget-friendly', 'Coastal', 'ratnodweepseabeach.jpg'),
(30, 'Nilgiri Hills', 'Cool and refreshing', 'Hill views, trekking', 'Mid-range', 'Hill station', 'nilgirihills.jpg'),
(31, 'Ramna Park, Dhaka', 'Tropical', 'Park, relaxation', 'Budget-friendly', 'Urban', 'ramnapark.jpg'),
(32, 'Charaputia, Cox\'s Bazar', 'Warm and humid', 'Beach, relaxation', 'Budget-friendly', 'Coastal', 'charaputia.jpg'),
(33, 'Foy\'s Lake, Chittagong', 'Tropical', 'Lake, amusement park', 'Mid-range', 'Natural', 'foyslake.jpg'),
(34, 'Panam Nagar, Sonargaon', 'Tropical', 'Historical site, architecture', 'Budget-friendly', 'Historical', 'panamnagar.jpg'),
(35, 'Boga Lake', 'Cool and refreshing', 'Trekking, lake', 'Mid-range', 'Hill station', 'bogalake.jpg'),
(36, 'Zia Memorial Museum, Dhaka', 'Tropical', 'Museum, history', 'Budget-friendly', 'Historical', 'ziamemorialmuseum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transport_info`
--

CREATE TABLE `transport_info` (
  `transport_id` int(11) NOT NULL,
  `vehicle_no` varchar(30) NOT NULL,
  `com_name` varchar(30) NOT NULL,
  `ticket_price` varchar(20) NOT NULL,
  `depo` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `deperture` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport_info`
--

INSERT INTO `transport_info` (`transport_id`, `vehicle_no`, `com_name`, `ticket_price`, `depo`, `destination`, `deperture`, `arrival`, `type`, `rating`) VALUES
(1, 'Hanif-B2390', 'Hanif', '100', 'Dhaka', 'Cox\'s Bazar', '11.30PM', '6.30AM', 'Bus', '4.2'),
(2, 'GreenLine-A102', 'GreenLine', '120', 'Dhaka', 'Cox\'s Bazar', '10.30PM', '5.30AM', 'Bus', '3.6'),
(3, 'Shyamoli-C305', 'Shyamoli', '110', 'Dhaka', 'Cox\'s Bazar', '11.00PM', '6.00AM', 'Bus', '4.7'),
(4, 'Soudia-G500', 'Soudia', '105', 'Dhaka', 'Cox\'s Bazar', '10.00PM', '5.00AM', 'Bus', '4.1'),
(5, 'Biman-BD202', 'Biman Bangladesh Airlines', '5000', 'Dhaka', 'Cox\'s Bazar', '8.00AM', '9.30AM', 'Airplane', '4.5'),
(6, 'US-BD101', 'US-Bangla Airlines', '4500', 'Dhaka', 'Cox\'s Bazar', '9.30AM', '11.00AM', 'Airplane', '3.9'),
(7, 'Sundarbans-TR20', 'Chittagong Express', '300', 'Dhaka', 'Cox\'s Bazar', '8.30AM', '4.30PM', 'Train', '4.9'),
(8, 'Hanif-B2391', 'Hanif', '100', 'Dhaka', 'Bandarban', '11.30PM', '6.30AM', 'Bus', '4.7'),
(9, 'GreenLine-A103', 'GreenLine', '120', 'Dhaka', 'Bandarban', '10.30PM', '5.30AM', 'Bus', '4.5'),
(10, 'Shyamoli-C306', 'Shyamoli', '110', 'Dhaka', 'Bandarban', '11.00PM', '6.00AM', 'Bus', '4.6'),
(11, 'Biman-BD202', 'Biman Bangladesh Airlines', '5000', 'Dhaka', 'Bandarban', '8.00AM', '9.30AM', 'Airplane', '3.95'),
(12, 'US-BD101', 'US-Bangla Airlines', '4500', 'Dhaka', 'Bandarban', '9.30AM', '11.00AM', 'Airplane', '4.55'),
(13, 'Chittagong-TR20', 'Bandarban Express', '300', 'Dhaka', 'Bandarban', '8.30AM', '4.30PM', 'Train', '4.65'),
(14, 'Hanif-B2392', 'Hanif', '100', 'Dhaka', 'Sajek Valley', '11.30PM', '6.30AM', 'Bus', '4.20'),
(15, 'GreenLine-A102', 'GreenLine', '120', 'Dhaka', 'Sajek Valley', '10.30PM', '5.30AM', 'Bus', '3.95'),
(16, 'Biman-BD202', 'Biman Bangladesh Airlines', '5000', 'Dhaka', 'Sajek Valley', '8.00AM', '9.30AM', 'Airplane', '4.85'),
(17, 'US-BD201', 'US-Bangla Airlines', '4500', 'Dhaka', 'Sajek Valley', '9.30AM', '11.00AM', 'Airplane', '4.8'),
(18, 'Sajek Valley-TR25', 'Sajek Valley Express', '500', 'Dhaka', 'Sajek Valley', '4.30AM', '9.30PM', 'Train', '4.3'),
(19, 'Sajek Valley-TR20', 'Sajek Valley Express', '300', 'Dhaka', 'Sajek Valley', '8.30AM', '4.30PM', 'Train', '4.7');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `joined_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `full_name`, `email`, `phone`, `password`, `address`, `img`, `joined_at`) VALUES
(1, 'Rashedul Islam Uzzal', 'rashed@gmail.com', '01871038150', '123456', 'Baridhara, Dhaka-1212', 'img/user_uploads/profile_1.jpg', '2023-09-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `transport_info`
--
ALTER TABLE `transport_info`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transport_info`
--
ALTER TABLE `transport_info`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
