-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 02:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leadership_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactmessages`
--

CREATE TABLE `contactmessages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactmessages`
--

INSERT INTO `contactmessages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'josh', 'jsambajon92@gmail.com', 'test', '2024-12-02 12:29:50'),
(2, 'test', 'jsambajon92@gmail.com', 'tet', '2024-12-02 12:46:18'),
(3, 'test', 'jsambajon92@gmail.com', 'testtttttttttt', '2024-12-02 12:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `description`, `answer`, `created_at`) VALUES
(1, 'Organisational Requirements', 'A good team leader leads by example. \r\n\r\nDescribe the professional behaviours that you would role model as a leader for your team?', 'Methods:\r\n1. Verbal communication \r\n2. Non-verbal communication (body language) \r\n3. Written communication \r\n5. Listening \r\n6. Visual communication Style used with the team\r\n7. Assertive (achieves goals without hurting others, emotionally expressive, protects own rights and rights of others, speaks with a balanced tone and volume)\r\n', '2024-11-25 07:39:44'),
(2, 'Team Facilitation Techniques', 'Coaching and mentoring are development approaches based on the use of one-to-one conversation to enhance an individual’s skills, knowledge, or work performance. \r\n\r\nDescribe 2 techniques in coaching and mentoring that you will use with your team to support the members.', 'Listening: \r\n1. Note key points which you can summarise for your coachee to help maintain clarity. \r\n2. Pick up on any unfocused statements and encourage more clarity.\r\n3. Note the way your coachee responds to determine any underlying issues through further questioning.\r\n\r\nAsking open-ended questions: \r\n1. First level – describing the issue.  \r\n2. Second level – strategic questions, digging deeper. \r\n3. Third level – strategic questions, helping it change.\r\n', '2024-11-25 07:39:44'),
(3, 'Mentoring and Coaching Techniques', 'Working with teams can be challenging. What does establishing a team performance plan mean, and what are the benefits? How would you handle a potential risk or safety hazard to ensure it did not affect the team’s performance? Provide an example of the risk and your strategy.', 'Establish team performance:\r\n1. Identify desired performance levels,\r\n2. Identify how these levels will be achieved.\r\n3. Provide guidance and direction\r\n4. Measure progress.\r\n\r\nRisk example – COVID:\r\n1. Change meetings to virtual format,\r\n2. Have more frequent check-ins with team members.\r\n\r\nEthical dilemma:\r\n1. Reiterate the code of conduct and organizational policies to the team,\r\n2. Be firm about adhering to ethical standards,\r\n3. Counsel the individual team member if necessary.', '2024-11-25 07:39:44'),
(4, 'Conflict Resolution', 'Project success depends on effective communication. Steady communication from leadership can improve morale and engagement. Describe the different methods and styles of communication that you will use with your team.', '1. Communicate with your staff Regular office meetings and a mission statement encourage team mentality. \r\n2. Commit to staff development: Invest in training and ensure follow-up.\r\n3. Offer feedback: Provide positive and constructive evaluations.\r\n4. Encourage collaboration: Create a space for brainstorming and creativity. \r\n5. Be consistent: Apply policies fairly and communicate openly. Strong teams require effort to foster communication and respect.\r\n', '2024-11-25 07:39:44'),
(5, 'Communication Methods and Styles', 'Personal events can strain teams, requiring contingencies for: \r\n 1. Unplanned leave or absence. \r\n 2. Reallocation of tasks. \r\n 3. Succession planning for important roles. Describe the contingencies for each to ensure project objectives are met.', '1. Prioritise tasks: Base decisions on organizational goals. \r\n2. Skill sets: Assign tasks aligned with team members\' strengths to ensure quality outcomes. \r\n3. Performance management: Identify successors transparently but without guarantees, emphasizing professional development.\r\n', '2024-11-25 07:39:44'),
(6, 'Cross-Cultural Communication', 'When working with teams from other divisions, describe organizational policies you will refer to for alignment and their importance: \r\n 1. Workplace policies \r\n 2. Code of conduct \r\n 3. Reputation and culture \r\n 4. Legislative requirements (EEO, WHS).', '1. Maintain etiquette – adapt to cultural norms. \r\n2. Avoid slang – ensure clarity in communication.\r\n3. Speak slowly – articulate clearly.\r\n4. Keep it simple – avoid unnecessary complexity. When communicating with individuals with special needs, seek feedback on preferred communication methods and show patience and respect.\r\n', '2024-11-25 07:39:44'),
(7, 'Professionalism', 'We work in a diverse community with different cultures and individuals with special needs or disabilities. Describe the principles of communication for these groups and how you would apply these principles with your team.', '1. Being grounded in ethics and integrity: Act responsibly. \r\n2. Building trust: Earn respect through actions. \r\n3. Bringing others along: Help team members grow. \r\n4. Inspiring others: Share a motivational vision. \r\n5. Making decisions: Act with authority and confidence. \r\n6. Rewarding: achievement: Recognize contributions and deliver on promises.\r\n', '2024-11-25 07:39:44'),
(8, ' Workplace Contingencies', 'Cohesive teams accomplish tasks effectively. As a leader, describe strategies to develop team cohesion and effectiveness.', '1. Code of Conduct: Sets expectations for ethical behavior. \r\n2. Corporate Social Responsibility: Defines organizational accountability and social values.\r\n3. Equity and Diversity Policy: Promotes a respectful workplace free from discrimination. \r\n4. OSH Policy: Highlights safety responsibilities for all.\r\n', '2024-11-25 07:39:44'),
(9, 'Teamwork Challenges', 'When conflict is resolved effectively, it benefits team dynamics and outcomes. Outline a strategy to resolve conflict within your team.', '1. Identify common goals. \r\n2. Search for agreement.\r\n3. Explore solutions.\r\n4. Question beliefs. \r\n5. Commit to group resolution. Effective conflict resolution fosters stronger relationships and improved outcomes.\r\n', '2024-11-25 07:39:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactmessages`
--
ALTER TABLE `contactmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactmessages`
--
ALTER TABLE `contactmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
