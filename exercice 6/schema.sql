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
