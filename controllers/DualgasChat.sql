CREATE TABLE IF NOT EXISTS `agents` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `surname` varchar(255),
  `nick` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255),
  `created_at` timestamp DEFAULT (now())
);

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `code` int UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` int COMMENT '0 => closed, 1 => opened',
  `created_at` timestamp DEFAULT (now()),
  `close_at` timestamp DEFAULT (now())
);

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `chat_id` int NOT NULL,
  `content` varchar(255),
  `state` int COMMENT '0 => not readed, 1 => readed',
  `sent_at` timestamp DEFAULT (now())
);

CREATE TABLE IF NOT EXISTS `messageSendBy` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `message_id` int,
  `agent_id` int COMMENT 'agent_id 1 is a user message'
);

ALTER TABLE `messageSendBy` ADD FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`);

ALTER TABLE `messageSendBy` ADD FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`);

ALTER TABLE `messages` ADD FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`);

INSERT INTO `agents` VALUES ('', 'Usuario', 'Anonimo', 'anon', '', '');
INSERT INTO `agents` VALUES ('', 'Admin', 'Dualgas', 'admin_dualgas', 'b20b0f63ce2ed361e8845d6bf2e59811aaa06ec96bcdb92f9bc0c5a25e83c9a6', '')
