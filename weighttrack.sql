-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 11:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weighttrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `a_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(2225) NOT NULL,
  `timesubmitted` varchar(255) NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`a_id`, `title`, `body`, `timesubmitted`, `activate`) VALUES
(1, 'Title', 'BodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyy', '2018-07-03 16:29:49', 1),
(4, 'ASD', 'ASD', '2018-07-03 16:50:10', 0),
(5, 'asd', 'asd', '2018-07-03 17:03:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bmi_log`
--

CREATE TABLE `bmi_log` (
  `bmi_log_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `datesubmitted` date NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `bmi` double NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmi_log`
--

INSERT INTO `bmi_log` (`bmi_log_id`, `user_id`, `datesubmitted`, `weight`, `height`, `bmi`, `category`) VALUES
(1, 2, '2018-07-01', 55, 1.2, 38.194444444444, 'Overweight'),
(2, 2, '2018-07-01', 55, 1.2, 38.194444444444, 'Overweight'),
(3, 2, '2018-07-01', 60, 1.8, 18.518518518519, 'Healthy'),
(4, 4, '2018-07-03', 55, 1.7, 19.031141868512, 'Healthy');

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `diet_id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(5555) NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`diet_id`, `name`, `description`, `activate`) VALUES
(1, 'Salad', 'A salad is a dish consisting of a mixture of small pieces of food, usually vegetables. However, different varieties of salad may contain virtually any type of ready-to-eat food.', 1),
(2, 'Boiled Egg', 'Boiled eggs are eggs cooked with their shells unbroken, usually by immersion in boiling water. Hard-boiled eggs are cooked so that the egg white and egg yolk both solidify.', 1),
(3, 'update', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `exercise_id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(765) NOT NULL,
  `filepath` varchar(1025) NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`exercise_id`, `type`, `name`, `description`, `filepath`, `activate`) VALUES
(1, 'Bodybuilding', 'Dumbbell Bench Press', 'The dumbbell bench press is an upper body exercise that strengthens the chest, shoulders, and triceps while improving muscular balance. Using dumbbells allows for a great range of motion in the chest and can also be easier on the shoulders and prevent pain.', 'img/ex-dumbbenchpress.jpg', 1),
(2, 'Bodybuilding', 'Single Leg Press', 'Targets the quadriceps muscles in the front of the thighs, the gluteal muscles in the buttocks, the hamstring muscles in the back of the thighs, and the calves, all in an integrated fashion. It\'s an especially efficient way to strengthen your lower body.', 'img/ex-legpress.jpg', 1),
(3, 'Bodybuilding', 'Incline Hammer Curls', 'The incline hammer curl engages your brachialis and brachioradialis, stabilizing the movement of your arms and accentuating their size. It also trains your flexor muscles, thereby improving grip strength.', 'img/ex-hammer.jpg', 1),
(5, 'Bodybuilding', 'Dips - Triceps Version', 'Dips are a compound push exercise with a small range of motion that primarily works your triceps but also engages your forearms, shoulders, chest and lower back.', 'img/ex-dips.jpg', 1),
(6, 'Bodybuilding', 'Calf Raise', 'Calf raises are a method of exercising the gastrocnemius, tibialis posterior and soleus muscles of the lower leg. The movement performed is plantar flexion, a.k.a. ankle extension.', 'img/ex-calfraise.jpg', 1),
(7, 'Gain', 'Barbell Squat', 'A barbell squat is a push-type, compound exercise which works primarily your quadriceps, but also trains your glutes, hamstrings, and calves, as well as muscles in your lower back.', 'img/ex-gain-barbellsquat.jpg', 1),
(8, 'Gain', 'Ab Roller', 'Building a stable core helps you in all your physical activities and it helps decrease your risk of muscular injury. The exercise wheel is effective in strengthening your core not only because it targets your abs but also because it works the muscles of your lower back.', 'img/ex-gain-abroller.jpg', 1),
(9, 'Lean', 'Sprint', 'Sprinting naturally increases the body\'s endurance strength, making longer cardio and muscle strengthening training sessions easier to complete. Through sprinting and speed training exercises, the body increases its ability to store oxygen, which helps the muscles function in all forms of exercise.', 'img/ex-lean-sprint.jpg', 1),
(10, 'Lean', 'Crunches', 'Abdominal exercises such as traditional crunches can help you flatten your stomach by tightening your muscles.', 'img/ex-lean-crunch.jpg', 1),
(11, 'Gain', 'test', 'test', 'img/applogov3.png', 0),
(15, 'Bodybuilding', 'deleteme', 'deletem', 'img/applogov3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `preferredprogram` varchar(255) NOT NULL,
  `usertype` int(255) NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `password`, `preferredprogram`, `usertype`, `activate`) VALUES
(5, 'Encryt', 'Test', 'user', '86d2eaf3022a257e9d67899fe9cb9378', 'Bodybuilding', 1, 0),
(6, 'sha', 'five', 'sha', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'Bodybuilding', 1, 0),
(7, 'Admin', 'Admin', 'admin', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'Bodybuilding', 2, 1),
(8, 'Noel Anthony', 'Arandilla', 'noel', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'Bodybuilding', 1, 1),
(9, 'Richellou', 'Arbuis', 'arbuis', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 'Gain', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bmi_log`
--
ALTER TABLE `bmi_log`
  ADD PRIMARY KEY (`bmi_log_id`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`exercise_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bmi_log`
--
ALTER TABLE `bmi_log`
  MODIFY `bmi_log_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `diet_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `exercise_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
