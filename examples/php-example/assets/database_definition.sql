CREATE TABLE countries (
    country_id INT AUTO_INCREMENT PRIMARY KEY,
    country_name VARCHAR(255),
    country_code VARCHAR(3)
);

CREATE TABLE towns (
    town_id INT AUTO_INCREMENT PRIMARY KEY,
    town_name VARCHAR(255),
    country_code VARCHAR(3)                         /* The country of the current town */
);