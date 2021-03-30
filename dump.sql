CREATE TABLE IF NOT EXISTS `roles` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `avatar` varchar(255) DEFAULT NULL,
    `about` text,
    `role_id` int NOT NULL DEFAULT '3',
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`),
    KEY `FK_users_roles` (`role_id`),
    CONSTRAINT `FK_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=UTF8;

CREATE TABLE IF NOT EXISTS `posts` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `alias` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `description` text NOT NULL,
    `img` varchar(255) NOT NULL,
    `author_id` int NOT NULL,
    `date` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_posts_users` (`author_id`),
    CONSTRAINT `FK_posts_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comments` (
    `id` int NOT NULL AUTO_INCREMENT,
    `text` text NOT NULL,
    `post_id` int NOT NULL,
    `author_id` int NOT NULL,
    `date` datetime NOT NULL,
    `is_publish` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `FK_comments_posts` (`post_id`),
    KEY `FK_comments_users` (`author_id`),
    CONSTRAINT `FK_comments_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `FK_comments_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `subscriptions` (
    `id` int NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=268;

INSERT INTO `roles` (`id`, `title`, `description`) VALUES
(1, 'Administrator', 'Полный доступ к админке'),
(2, 'Content-manager', 'Может изменять/создавать статьи и модерирует комментарии к ним'),
(3, 'Registered user', 'Может оставлять комментарии'),
(4, 'Unregistred user', 'Может просматривать статьи в блоге, подписаться, авторизоваться и зарегистрироваться');

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `about`, `role_id`) VALUES
(1, 'Admin', 'kolyachervon@yandex.ru', '$2y$10$F37xToVp8OCRL/gIMqONc.1i7tvDYRotLzYhhcELdGkFNld/NS8ue', '33.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ', 1),
	(2, 'User', 'olux.madam@yandex.ru', '$2y$10$qm0u8LfdwyjhzX/qRKAd8uvdfaXhO5VmwTnBhidS2NDFbWBUjQLIS', '34.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2),
(3, 'Николай', 'admin@site.com', '$2y$10$ic/Ws4osFTEfVyhALdIrSe06PbeCGmr/x5cD3wkiBueuK1XWVptKG', '35.jpg', NULL, 3),
(4, '123123', 'FacePass@yandex.ru', '$2y$10$Gwl/NJzVTYti4yko62ZBkeJrrk4HQngPLPGFzKvQ8.anyZclFsm9m', NULL, NULL, 3);

INSERT INTO `posts` (`id`, `title`, `alias`, `content`, `description`, `img`, `author_id`, `date`) VALUES
(1, 'The Best Cat Toys', 'the_best_cat_toys', 'Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '1.jpg', 1, '2021-03-15 18:19:41'),
(2, 'Child Friendly Pets', 'child_friendly_pets', 'Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2.jpg', 1, '2021-03-15 18:19:53'),
(3, 'Taking care of a puppy', 'taking_care_of_a_puppy', 'Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.jpg', 2, '2021-03-15 20:07:39');

INSERT INTO `comments` (`id`, `text`, `post_id`, `author_id`, `date`, `is_publish`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 2, '2021-03-16 12:57:36', 1),
	(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2021-03-16 12:57:57', 1),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2, 2, '2021-03-16 12:58:08', 1),
	(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 1, '2021-03-16 12:58:17', 0),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3, 2, '2021-03-16 12:58:26', 1);

INSERT INTO `subscriptions` (`id`, `email`) VALUES
	(1, 'admin@site.com'),
	(2, 'FacePass@yandex.ru'),
	(3, 'kolyachervon@yandex.ru'),
	(4, 'olux.madam@yandex.ru');