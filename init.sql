
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255),
    description TEXT,
    date_lost DATE,
    image_path VARCHAR(255)
);
