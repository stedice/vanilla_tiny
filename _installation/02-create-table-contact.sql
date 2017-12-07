CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `tel_work` varchar(20) DEFAULT NULL,
  `tel_mobile` varchar(20) DEFAULT NULL,
  `email_work` varchar(64) DEFAULT NULL,
  `email_private` varchar(64) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `note` varchar(512) DEFAULT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;