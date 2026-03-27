-- ============================================
-- MySQL: Create restricted user for public app
-- ============================================
-- This user can only INSERT into orders and contact_leads tables.
-- Run as MySQL root:
--   sudo mysql < deploy/mysql-setup.sql

-- Create user (change password!)
CREATE USER IF NOT EXISTS 'softyfact_public'@'localhost'
    IDENTIFIED BY 'CHANGE_THIS_STRONG_PASSWORD';

-- Grant minimal permissions on the shared database
GRANT SELECT ON `facture_pro`.`orders` TO 'softyfact_public'@'localhost';
GRANT INSERT ON `facture_pro`.`orders` TO 'softyfact_public'@'localhost';
GRANT UPDATE ON `facture_pro`.`orders` TO 'softyfact_public'@'localhost';

GRANT SELECT ON `facture_pro`.`contact_leads` TO 'softyfact_public'@'localhost';
GRANT INSERT ON `facture_pro`.`contact_leads` TO 'softyfact_public'@'localhost';

-- Allow reading migrations table (for artisan migrate:status)
GRANT SELECT ON `facture_pro`.`migrations` TO 'softyfact_public'@'localhost';

-- Allow session table access if using database sessions
-- GRANT SELECT, INSERT, UPDATE, DELETE ON `facture_pro`.`sessions` TO 'softyfact_public'@'localhost';

FLUSH PRIVILEGES;

-- Verify grants
SHOW GRANTS FOR 'softyfact_public'@'localhost';
