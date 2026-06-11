CREATE TABLE IF NOT EXISTS access_requests (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  request_type ENUM('business', 'investor', 'vendor', 'internal') NOT NULL,
  organization_name VARCHAR(190) NULL,
  contact_name VARCHAR(190) NOT NULL,
  email VARCHAR(190) NOT NULL,
  phone VARCHAR(80) NULL,
  location VARCHAR(190) NULL,
  category VARCHAR(190) NULL,
  notes TEXT NULL,
  payload_json JSON NULL,
  status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  reviewed_at TIMESTAMP NULL DEFAULT NULL,
  INDEX idx_access_requests_status_created (status, created_at),
  INDEX idx_access_requests_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
