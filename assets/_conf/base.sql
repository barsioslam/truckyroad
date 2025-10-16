-- TABLE UTILISATEURS
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    role ENUM('user', 'truck_owner', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- TABLE FOOD TRUCKS
CREATE TABLE trucks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    cuisine_type VARCHAR(100),
    website VARCHAR(255),
    phone VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- TABLE DES POSITIONS (HISTORIQUE OU ACTUELLES)
CREATE TABLE truck_locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    truck_id INT NOT NULL,
    latitude DECIMAL(9,6) NOT NULL,
    longitude DECIMAL(9,6) NOT NULL,
    address VARCHAR(255),
    start_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    end_time DATETIME NULL,
    FOREIGN KEY (truck_id) REFERENCES trucks(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- TABLE MENUS DU TRUCK
CREATE TABLE truck_menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    truck_id INT NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(8,2),
    FOREIGN KEY (truck_id) REFERENCES trucks(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- TABLE HORAIRES RÉCURRENTS
CREATE TABLE truck_schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    truck_id INT NOT NULL,
    day_of_week TINYINT NOT NULL CHECK (day_of_week BETWEEN 0 AND 6), -- 0 = Dimanche
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    latitude DECIMAL(9,6),
    longitude DECIMAL(9,6),
    address VARCHAR(255),
    FOREIGN KEY (truck_id) REFERENCES trucks(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- TABLE AVIS
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    truck_id INT NOT NULL,
    rating TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (truck_id) REFERENCES trucks(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- TABLE FAVORIS
CREATE TABLE favorites (
    user_id INT NOT NULL,
    truck_id INT NOT NULL,
    PRIMARY KEY (user_id, truck_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (truck_id) REFERENCES trucks(id) ON DELETE CASCADE
) ENGINE=InnoDB;
