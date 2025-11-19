CREATE TABLE IF NOT EXISTS `agents` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255),
  `surname` VARCHAR(255),
  `nick` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `chats` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `code` INT NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `state` INT DEFAULT 1 COMMENT '0 => closed, 1 => opened',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `close_at` TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `messages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `chat_id` INT NOT NULL,
  `content` TEXT,
  `state` INT DEFAULT 0 COMMENT '0 => not read, 1 => read',
  `sent_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT `fk_messages_chat` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `messageSendBy` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `message_id` INT NOT NULL,
  `agent_id` INT,
  CONSTRAINT `fk_messagesendby_message` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_messagesendby_agent` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE SET NULL
);

INSERT INTO `agents` (`name`, `surname`, `nick`, `password`) VALUES 
('Usuario', 'Anonimo', 'anon', ''),
('Admin', 'Dualgas', 'admin_dualgas', 'b20b0f63ce2ed361e8845d6bf2e59811aaa06ec96bcdb92f9bc0c5a25e83c9a6');
