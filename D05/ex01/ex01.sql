CREATE TABLE IF NOT EXISTS `ft_table` (
    id INT AUTO_INCREMENT PRIMARY_KEY,
    login VARCHAR(8) DEFAULT NOT NULL 'toto',
    group ENUM('staff', 'student', 'other') NOT NULL,
    creation_date DATE NOT NULL
)