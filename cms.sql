
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


INSERT INTO `posts` (`id`, `date`, `title`, `content`) VALUES
(1, '2024/03/23', 'Into the Wild', 'McCandless destroys his credit cards and identification, donates his savings to Oxfam and sets out on a cross-country drive in his Datsun 210 to experience life in the wilderness. He does not tell his parents nor Carine what he is doing or where he is going and does not contact them after his departure. This causes his parents to become increasingly anxious.', 'McCandless destroys his credit cards and identification, donates his savings to Oxfam and sets out on a cross-country drive in his Datsun 210 to experience life in the wilderness. He does not tell his parents nor Carine what he is doing or where he is going and does not contact them after his departure. This causes his parents to become increasingly anxious.\r\n\r\nAt Lake Mead, McCandless\' car is caught in a flash flood; he abandons it and begins hitchhiking. Burning what remains of his cash, he assumes the name \"Alexander Supertramp\". In Northern California, McCandless encounters hippie couple Jan and Rainey. Rainey tells him his relationship with Jan is failing, which McCandless helps rekindle.\r\n\r\nIn September, McCandless arrives in Carthage, South Dakota, and works for a contract harvesting company owned by Wayne Westerberg. He leaves after Westerberg is arrested for satellite piracy.\r\n\r\nMcCandless kayaks down the Colorado River and, though told by park rangers he may not do so without a license, ignores their warnings and goes downriver to Mexico. His kayak is lost in a dust storm, and he crosses back into the United States on foot. Unable to hitch a ride, he jumps on freight trains to Los Angeles. Not long after arriving, however, he starts feeling \"corrupted\" by modern civilization and leaves. He is forced to resume hitchhiking when railroad police catch and beat him.');

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;