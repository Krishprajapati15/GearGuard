CREATE DATABASE gearguard_db;
USE gearguard_db;

-- 1. Maintenance Teams
-- Purpose: Defines specialized groups like IT, Mechanics, Electricians.
CREATE TABLE maintenance_teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100) NOT NULL UNIQUE, -- e.g., 'IT Support', 'Mechanics'
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Users (Technicians & Managers)
-- Purpose: Stores personnel and links them to specific teams.
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Technician') DEFAULT 'Technician',
    team_id INT, -- Link to specialized team
    avatar_url VARCHAR(255), -- For the Kanban avatar indicator
    FOREIGN KEY (team_id) REFERENCES maintenance_teams(id) ON DELETE SET NULL
);

-- 3. Equipment (Assets)
-- Purpose: Central database for company assets.
CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    serial_number VARCHAR(100) UNIQUE NOT NULL,
    department VARCHAR(100), -- For grouping/tracking
    employee_name VARCHAR(100), -- For individual assignment
    location VARCHAR(255), -- Physical location
    purchase_date DATE,
    warranty_info TEXT,
    is_scrapped BOOLEAN DEFAULT FALSE, -- Scrap Logic: Flag for unusable machines
    default_team_id INT, -- Used for Auto-Fill Logic
    FOREIGN KEY (default_team_id) REFERENCES maintenance_teams(id)
);

-- 4. Maintenance Requests (Tickets)
-- Purpose: Handles the transactional lifecycle of repair jobs.
CREATE TABLE maintenance_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject VARCHAR(255) NOT NULL, -- e.g., "Printer not working"
    equipment_id INT NOT NULL,
    request_type ENUM('Corrective', 'Preventive') NOT NULL, -- Unplanned vs Planned
    status ENUM('New', 'In Progress', 'Repaired', 'Scrap') DEFAULT 'New', -- Workflow stages
    scheduled_date DATE, -- Critical for Calendar View
    duration_hours DECIMAL(5,2) DEFAULT 0.00, -- Time spent after repair
    assigned_technician_id INT,
    team_id INT, -- Automatically fetched from Equipment record
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (equipment_id) REFERENCES equipment(id),
    FOREIGN KEY (assigned_technician_id) REFERENCES users(id),
    FOREIGN KEY (team_id) REFERENCES maintenance_teams(id)
);