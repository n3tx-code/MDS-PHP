CREATE DATABASE IF NOT EXISTS real_estate CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE real_estate;

CREATE TABLE districts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE agents (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    experience_years INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE properties (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    area INT NOT NULL,
    district_id INT UNSIGNED NOT NULL,
    agent_id INT UNSIGNED,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_properties_district
        FOREIGN KEY (district_id) REFERENCES districts(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_properties_agent
        FOREIGN KEY (agent_id) REFERENCES agents(id)
        ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE agencies (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE agencies_districts (
    agency_id INT UNSIGNED NOT NULL,
    district_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (agency_id, district_id),
    CONSTRAINT fk_agencies_districts_agency
        FOREIGN KEY (agency_id) REFERENCES agencies(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_agencies_districts_district
        FOREIGN KEY (district_id) REFERENCES districts(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
