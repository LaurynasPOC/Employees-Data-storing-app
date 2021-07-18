Create table positions (
id int(8)AUTO_INCREMENT PRIMARY KEY,
position varchar(40)
);

Create table employees (
id_number int(8)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name varchar(20),
lastname varchar(20),
age int(8),
phone_number int(11),
position_id int(8),
FOREIGN KEY (position_id) REFERENCES positions(id)ON DELETE SET NULL ON UPDATE CASCADE
);

insert into positions(position)
Values 
('Manager'),
('Janitor'),
('IT'),
('Book keeper')

