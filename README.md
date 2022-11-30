# CSC174
Our website allows a user to submit a drink into our mySQL database and see the returned results both utilizing prepared statements.

Our HTML and php code is located within the "index.php" file:
[index.php](https://github.com/caldwell-matthew/CSC174/blob/master/index.php)

The deployment for our website is located here:
[Deployment](https://csc174-final.herokuapp.com/)

# SQL CODE
--	Creating the tables 

CREATE TABLE IF NOT EXISTS user(
    user_id INT,
    username VARCHAR(25) NOT NULL,
    email VARCHAR(45) NOT NULL,
    password VARCHAR(25) NOT NULL,
    fname VARCHAR(15) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    CONSTRAINT user_pk PRIMARY KEY (user_ID)
    );

CREATE TABLE IF NOT EXISTS drink(
    drink_id INT,
    name VARCHAR(25) NOT NULL,
    size NUMERIC,
    calories INT,
    caffeine NUMERIC,
    sugar_qty INT,
    CONSTRAINT drink_pk PRIMARY KEY (drink_id)
    );

CREATE TABLE IF NOT EXISTS coffee(
    drink_id INT,
    coffee_type VARCHAR(30),
    roast VARCHAR(20),
    milk_type VARCHAR(20),
    CONSTRAINT coffee_pk PRIMARY KEY (drink_id),
    CONSTRAINT coffee_drink_fk FOREIGN KEY (drink_id) REFERENCES drink(drink_id)
    );

CREATE TABLE IF NOT EXISTS tea(
    drink_id INT,
    tea_type VARCHAR(20),
    milk_type VARCHAR(20),
    CONSTRAINT tea_pk PRIMARY KEY (drink_id),
    CONSTRAINT tea_drink_fk FOREIGN KEY (drink_id) REFERENCES drink(drink_id)
    );

CREATE TABLE IF NOT EXISTS soda(
    drink_id INT,
    flavor VARCHAR(20),
    CONSTRAINT soda_pk PRIMARY KEY (drink_id),
    CONSTRAINT soda_drink_fk FOREIGN KEY (drink_id) REFERENCES drink(drink_id)
    );

CREATE TABLE IF NOT EXISTS shop(
    shop_id INT,
    name VARCHAR(30) NOT NULL,
    address VARCHAR(60),
    CONSTRAINT shop_pk PRIMARY KEY (shop_id)
    );

CREATE TABLE IF NOT EXISTS review(
    review_id INT,
    user_id INT NOT NULL,
    shop_id INT NOT NULL,
    drink_id INT NOT NULL,
    rating NUMERIC NOT NULL,
    description VARCHAR(50),
    num_visits INT,
    CONSTRAINT review_pk PRIMARY KEY (review_id),
    CONSTRAINT review_uq UNIQUE (user_id, shop_id, drink_id),
    CONSTRAINT review_user_fk FOREIGN KEY (user_id) REFERENCES user (user_id),
    CONSTRAINT review_shop_fk FOREIGN KEY (shop_id) REFERENCES shop (shop_id),
    CONSTRAINT review_drink_fk FOREIGN KEY (drink_id) REFERENCES drink (drink_id)
    );

CREATE TABLE IF NOT EXISTS sells(
    shop_id INT,
    drink_id INT,
    price NUMERIC,
    purchase_qty INT,
    CONSTRAINT sells_pk PRIMARY KEY (shop_id,drink_id),
    CONSTRAINT sells_shop_fk FOREIGN KEY (shop_id) REFERENCES shop (shop_id),
    CONSTRAINT sells_drink_fk FOREIGN KEY (drink_id) REFERENCES drink (drink_id)
    );
