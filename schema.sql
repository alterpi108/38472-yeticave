CREATE DATABASE yeticave;

USE yeticave;

CREATE TABLE category (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name CHAR(255) NOT NULL
);

CREATE TABLE lot (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_id INT UNSIGNED NOT NULL,
  user_id INT UNSIGNED NOT NULL,
  winner_id INT UNSIGNED,
  date_add DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_close DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  title CHAR(255) NOT NULL,
  description TEXT,
  image CHAR(255),
  initial_rate INT UNSIGNED NOT NULL,
  rate_step INT UNSIGNED NOT NULL,
  fav_count INT UNSIGNED DEFAULT 0
);

CREATE TABLE bet (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  lot_id INT UNSIGNED NOT NULL,
  user_id INT UNSIGNED NOT NULL,
  date_add DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  rate INT UNSIGNED NOT NULL
);

CREATE TABLE user (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  date_add DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  email CHAR(128) NOT NULL,
  password CHAR(64) NOT NULL,
  name CHAR(255) NOT NULL,
  avatar CHAR(255),
  contact TEXT
);

CREATE INDEX title ON lot(title);
CREATE UNIQUE INDEX lot_id ON lot(id);
CREATE UNIQUE INDEX email ON user(email);
