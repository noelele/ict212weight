-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 10:03 AM
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
  `timesubmitted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`a_id`, `title`, `body`, `timesubmitted`) VALUES
(1, 'Title', 'BodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyyBodyydyy', '2018-07-03 16:29:49'),
(4, 'ASD', 'ASD', '2018-07-03 16:50:10'),
(5, 'asd', 'asd', '2018-07-03 17:03:56');

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
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `exercise_id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(765) NOT NULL,
  `filepath` varchar(1025) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`exercise_id`, `type`, `name`, `description`, `filepath`) VALUES
(1, 'Bodybuilding', 'Dumbbell Bench Press', 'The dumbbell bench press is an upper body exercise that strengthens the chest, shoulders, and triceps while improving muscular balance. Using dumbbells allows for a great range of motion in the chest and can also be easier on the shoulders and prevent pain.', 'img/ex-dumbbenchpress.jpg'),
(2, 'Bodybuilding', 'Single Leg Press', 'Targets the quadriceps muscles in the front of the thighs, the gluteal muscles in the buttocks, the hamstring muscles in the back of the thighs, and the calves, all in an integrated fashion. It\'s an especially efficient way to strengthen your lower body.', 'img/ex-legpress.jpg'),
(3, 'Bodybuilding', 'Incline Hammer Curls', 'The incline hammer curl engages your brachialis and brachioradialis, stabilizing the movement of your arms and accentuating their size. It also trains your flexor muscles, thereby improving grip strength.', 'img/ex-hammer.jpg'),
(5, 'Bodybuilding', 'Dips - Triceps Version', 'Dips are a compound push exercise with a small range of motion that primarily works your triceps but also engages your forearms, shoulders, chest and lower back.', 'img/ex-dips.jpg'),
(6, 'Bodybuilding', 'Calf Raise', 'Calf raises are a method of exercising the gastrocnemius, tibialis posterior and soleus muscles of the lower leg. The movement performed is plantar flexion, a.k.a. ankle extension.', 'img/ex-calfraise.jpg'),
(7, 'Gain', 'Barbell Squat', 'A barbell squat is a push-type, compound exercise which works primarily your quadriceps, but also trains your glutes, hamstrings, and calves, as well as muscles in your lower back.', 'img/ex-gain-barbellsquat.jpg'),
(8, 'Gain', 'Ab Roller', 'Building a stable core helps you in all your physical activities and it helps decrease your risk of muscular injury. The exercise wheel is effective in strengthening your core not only because it targets your abs but also because it works the muscles of your lower back.', 'img/ex-gain-abroller.jpg'),
(9, 'Lean', 'Sprint', 'Sprinting naturally increases the body\'s endurance strength, making longer cardio and muscle strengthening training sessions easier to complete. Through sprinting and speed training exercises, the body increases its ability to store oxygen, which helps the muscles function in all forms of exercise.', 'img/ex-lean-sprint.jpg'),
(10, 'Lean', 'Crunches', 'Abdominal exercises such as traditional crunches can help you flatten your stomach by tightening your muscles.', 'img/ex-lean-crunch.jpg');

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
  `usertype` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `password`, `preferredprogram`, `usertype`) VALUES
(1, 'Noel Anthony', 'Arandilla', 'admin', 'admin', 'Lean', 2),
(2, 'Noel Anthony', 'Arandilla', 'user', 'user', 'Gain', 1),
(3, 'Fnae', 'lname', 'mytvadmin', 'admin', 'Lean', 1);

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
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `exercise_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
