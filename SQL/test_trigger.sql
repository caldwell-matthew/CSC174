CREATE TRIGGER NEW_SHOP
  BEFORE INSERT ON review
  FOR EACH ROW
  BEGIN
    IF NEW.shop_id not in (select shop_id from shop) THEN
      INSERT INTO shop(shop_id)
      VALUE (NEW.shop_id);
    END IF;
  END;

INSERT INTO user VALUES (2, 'test', 'test@test.com', 'test', 'test', 'test', '2011-01-01');

INSERT INTO drink (drink_id) VALUES (1);

select * from user;

drop trigger NEW_SHOP;

select * from shop;

INSERT INTO review Values (1, 1, 6, 1, 5.4, 'bad latte',2);