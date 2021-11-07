
CREATE TABLE users (
    user_id int NOT NULL AUTO_INCREMENT,
    user_email varchar(70) NOT NULL,
    user_password  varchar (70),
    user_roll      varchar (70),
    PRIMARY KEY (user_id)
)

CREATE TABLE customer(
    customer_id int NOT NULL AUTO_INCREMENT,
    customer_name  varchar(70)  NOT NULL, 
    customer_email  varchar(70) NOT NULL,
    customer_contact_number  varchar(70),
    customer_adderess         varchar(70),
    user_id int,
    PRIMARY KEY (customer_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)

)

CREATE TABLE seller(
    seller_id int NOT NULL AUTO_INCREMENT,
    seller_name  varchar(70)  NOT NULL, 
    seller_email  varchar(70) NOT NULL,
    seller_contact_number  varchar(70),
    seller_address         varchar(70),
    user_id int,
    PRIMARY KEY (seller_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)

)


CREATE TABLE admin(
    admin_id int NOT NULL AUTO_INCREMENT,
    admin_name  varchar(70)  NOT NULL, 
    admin_email  varchar(70) NOT NULL,
    admin_contact_number  varchar(70),
    user_id int,
    PRIMARY KEY (admin_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
)

CREATE TABLE category(
    category_id int NOT NULL AUTO_INCREMENT,
    category_name varchar(70)  NOT NULL,
    PRIMARY KEY (category_id)
    
)

CREATE TABLE product(
    product_id  int NOT NULL AUTO_INCREMENT,
    product_name     varchar(70) NOT NULL,
    product_unit_price   DECIMAL(10,2) NOT NULL,
    product_description    varchar(70) NOT NULL,
    category_id int,
    PRIMARY KEY (product_id),
    FOREIGN KEY (category_id) REFERENCES category( category_id)
)

CREATE TABLE `order`(
    `order_id`  int NOT NULL AUTO_INCREMENT,
    order_date  date  NOT NULL,
    order_quantity  BIGINT NOT NULL,
    order_price     DECIMAL(10,2) NOT NULL,
    order_payment_method   varchar(70) NOT NULL,
    product_id int,
    customer_id int,
    seller_id  int ,
    PRIMARY KEY (order_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
    FOREIGN KEY (seller_id) REFERENCES seller(seller_id)
)

CREATE TABLE upload(
    upload_id   int NOT NULL AUTO_INCREMENT,
    upload_date    date NOT NULL,
    upload_product_quanity  BIGINT NOT NULL,
    product_id int,
    customer_id int,
    PRIMARY KEY (upload_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id)
)

CREATE  TABLE sales_report (
    sales_report_id int NOT NULL AUTO_INCREMENT,
    quantity_sold BIGINT NOT NULL,
    quantity_left  BIGINT NOT NULL,
    sold_date   date NOT NULL,
    product_id  int,
    customer_id  int,
    seller_id   int,
    PRIMARY KEY (sales_report_id),
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    FOREIGN KEY (customer_id) REFERENCES customer(customer_id),
    FOREIGN KEY (seller_id) REFERENCES seller(seller_id)
)
