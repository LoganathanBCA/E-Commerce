-- User Page
Select products.PNAME, products.TNAME
From products Inner Join
  product_fav On products.PID = product_fav.PID
Where product_fav.UID = 1


-------------------------------------------------------------------
--Admin Page

Select products.PNAME, products.TNAME, product_fav.UID, user_reg.UNAME
From products Inner Join
  product_fav On products.PID = product_fav.PID Inner Join
  user_reg On product_fav.UID = user_reg.UID
  -----------------
  -- Admin Review
Select user_reg.UNAME, review.MES, review.LOGS
From review Inner Join
  user_reg On review.UID = user_reg.UID
  
  
  
  Select offers.PID, products.PNAME, products.TNAME, products.LOC,
  products.OPRICE, products.NPRICE, products.SUB_PRO
From offers Inner Join
  products On offers.PID = products.PID
Where products.SUB_PRO = {$_GET["pid"]}";