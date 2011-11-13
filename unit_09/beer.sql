use cs445;

drop table if exists orders, beers, customers, order_items
;

create table orders (
  id int not null auto_increment primary key,
  customer_id int,
  sub_total double,
  total double
  )
;

create table beers (
  id int not null auto_increment primary key,
  name varchar(100), 
  price double
  )
;

create table customers (
  id int not null auto_increment primary key,
  name varchar(100)
  )
;

create table order_items (
  id int not null auto_increment primary key,
  order_id int,
  beer_id int,
  count int
  )
;

insert into beers values 
  ('', 'Pabst Blue Ribbon', '0.50'),
  ('', 'Coors Banquet', '0.75'),
  ('', 'Trout Slayer', '1.00')
;