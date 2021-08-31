CREATE TABLE orders (
    usersId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    prdName varchar(300) NOT NULL,
    prdid varchar(300) NOT NULL,
    salePrice int(11),
    coid varchar(300) NOT NULL,
    
    cName varchar(257) NOT NULL,
    ctel varchar(17) NOT NULL,
    cemail varchar(17) NOT NULL,
    csex varchar(10) NOT NULL,
    cadr varchar(300) NOT NULL,
    qtyneed varchar(300) NOT NULL,
    verify tinyint(1) NOT NULL
    ); 
    
      CREATE table shop (
objectid int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    prdName varchar(257) NOT NULL,
          prdid varchar(300) NOT NULL,
    prdsize int(3) NOT NULL,
    prdsex varchar(10) NOT NULL,
    prdprice int(11) NOT NULL,
    prdcat varchar(300) NOT NULL,
    prdpic varchar(300) NOT NULL,
      prddis int(9) NOT NULL,
      prdrating int(1) NOT NULL


  );
create table admin (
   AdminId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    AdminName varchar(257) NOT NULL,
     AdminPwd varchar(300) NOT NULL
   );