drop database cubto;
create database cubto;
use cubto;

Create Table User
(
username varchar(20) not null,
password varchar(255) not null,
email varchar(50) not null,
first_name varchar(30),
last_name varchar(30),
question varchar(50), 
answer varchar(100),
gender varchar(20),
birthday date, 
profile_image longblob,
bio varchar(100),

Constraint user_pk1 PRIMARY KEY (username)
);

create Table wishlist
(
username varchar(20) not null,
restaurant_name varchar(100),
ratings float,
restaurant_address varchar(255),
restaurant_type varchar(50),
restaurant_comment varchar(150),
restaurant_description varchar(250),
your_experience int,
food_experience int,
customer_service int,
cleanliness int,

constraint wishlist_pk1 primary key(username,restaurant_name),
constraint wishlist_fk1 foreign key (username) references User(username)
);

