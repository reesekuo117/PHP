
INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '橘胖2', '0987654321', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59.000000');

INSERT INTO `address_book` 
(`name`, `mobile`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
('橘胖3', '0987654321', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59.000000');

INSERT INTO `address_book` 
(`name`, `mobile`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
('橘胖3', '', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59.000000');

INSERT INTO `address_book` 
(`name`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
('橘胖3', 'ming@gmail.com', '2015-04-30', '新北市', '2022-08-16 05:56:59.000000');
-- 手機欄位mac會出現錯誤

INSERT INTO `address_book` 
(`name`, `mobile`, `email`, `address`, `created_at`) 
VALUES 
('橘胖2', '0987654321', 'ming@gmail.com', '新北市', '2022-08-16 05:56:59.000000'),
('橘胖2', '0987654321', 'ming@gmail.com', '新北市', '2022-08-16 05:56:59.000000'),
('橘胖2', '0987654321', 'ming@gmail.com', '新北市', '2022-08-16 05:56:59.000000');
-- 上傳多筆 val逗號分開

-- 刪除
DELETE FROM address_book WHERE `sid` = 4;

-- 全部刪除
DELETE FROM address_book;

--修改單筆
UPDATE `address_book` SET `mobile` = '0987654322' WHERE `address_book`.`sid` = 6;

--全部修改
UPDATE `address_book` SET `mobile` = '0987654322';

--排序
SELECT * FROM `address_book` ORDER BY `address_book`.`sid` ASC; --升冪
SELECT * FROM `address_book` ORDER BY `address_book`.`sid`; --升冪
SELECT * FROM `address_book` ORDER BY `address_book`.`sid` DESC; --降冪

SELECT * FROM `address_book` ORDER BY `name` ASC,`sid` DESC; --升冪
SELECT * FROM `address_book` ORDER BY `name` ,`sid` DESC; --升冪,ASC可省略


-- 查詢
select



-- CRUD
-- create  read  updata  delete
-- 新增 讀取  更新 刪除