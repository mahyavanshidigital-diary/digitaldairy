CREATE TABLE `di_events` (
 `event_id` int(11) NOT NULL AUTO_INCREMENT,
 `event_title` varchar(255) NOT NULL,
 `event_description` text NOT NULL,
 `event_images` varchar(250) NOT NULL,
 `created_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`event_id`)
) ENGINE=InnoDB