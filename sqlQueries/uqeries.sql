
--database
CREATE DATABASE systemdb;

-- create user table
CREATE TYPE user_role as ENUM ('admin','member');
CREATE TABLE users(
id_user VARCHAR(10) primary key not null,
firstname VARCHAR(50) not null,
lastname VARCHAR(50) not null,
email VARCHAR(100)not null,
role user_role DEFAULT 'member'
);

-- create activities table

CREATE TABLE activities (
    id_activity INT PRIMARY KEY AUTO_INCREMENT,
    name_activity VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    start_date DATE,
    end_date DATE,
    capacity INT(3) NOT NULL

);

--create reservations table


CREATE TYPE reser_status as ENUM ('pending','accepted','refused','cancel');
 CREATE TABLE reservations (
   id_reservation SERIAL PRIMARY KEY,
   id_user VARCHAR(10),
   id_activity int,
   date_reservation date,
   status reser_status DEFAULT 'pending';
   FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (id_activity) REFERENCES activities(id_activity) ON DELETE CASCADE ON UPDATE CASCADE

);