drop database cubto;
create Database Cubto;
use Cubto;

Create Table Restaurant
(
restaurant_id varchar(5) not null,
restaurant_name varchar(50) not null,
category varchar(50) not null,
location varchar(255) not null,
total_rating_score decimal(2,1) not null,

Constraint restaurant_pk1 PRIMARY KEY (restaurant_id)
);

Create Table User
(
user_id int AUTO_INCREMENT,
username varchar(50) not null,
password varchar(255) not null,
email varchar(50) not null,
first_name varchar(30),
last_name varchar(30),
question varchar(50), 
answer varchar(100),
-- gender varchar(1),
-- birthday date, 
-- profile_image longblob,

Constraint user_pk1 PRIMARY KEY (user_id)
);

Create Table ratings
(
restaurant_id varchar(5) not null,
user_id varchar(5) not null,
your_experience int not null,
food_experience int not null,
customer_service int not null,
cleanliness int not null,

constraint ratings_pk1 primary key (restaurant_id,user_id),
constraint ratings_fk1 foreign key (restaurant_id) References restaurant(restaurant_id),
constraint ratings_fk2 foreign key (user_id) References user(user_id)
);


Create Table listing
(
restaurant_id varchar(5) not null,
user_id varchar(5) not null,

constraint listing_pk1 primary key (restaurant_id,user_id),
constraint listing_fk1 foreign key (restaurant_id) References restaurant(restaurant_id),
constraint listing_fk2 foreign key (user_id) References user(user_id)
);

 Create Table profile_liking
(
restaurant_id varchar(5) not null,
user_id varchar(5) not null,
favourites varchar(5),
booking_history varchar(5),

constraint profile_liking_pk1 primary key (restaurant_id,user_id),
constraint profile_liking_fk1 foreign key (restaurant_id) References listing(restaurant_id),
constraint profile_liking_fk2 foreign key (user_id) References listing(user_id)
 )