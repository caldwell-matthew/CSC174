create trigger enforce_disjoint_coffee
before insert on coffee
  for each row
    begin
      if new.drink_id in (
        SELECT drink_id
        FROM tea
         UNION
        SELECT drink_id
        FROM soda
        )
        then signal sqlstate '45000'
          SET MESSAGE_TEXT = 'Subclasses must be disjoint';
        end if;
    end;

create trigger enforce_disjoint_tea
before insert on tea
  for each row
    begin
      if new.drink_id in (
        SELECT drink_id
        FROM coffee
         UNION
        SELECT drink_id
        FROM soda
        )
        then signal sqlstate '45000'
          SET MESSAGE_TEXT = 'Subclasses must be disjoint';
        end if;
    end;

create trigger enforce_disjoint_soda
before insert on soda
  for each row
    begin
      if new.drink_id in (
        SELECT drink_id
        FROM coffee
         UNION
        SELECT drink_id
        FROM tea
        )
        then signal sqlstate '45000'
          SET MESSAGE_TEXT = 'Subclasses must be disjoint';
        end if;
    end;

