
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


-- 累加
UPDATE `products` SET `pages`=`pages`+1 WHERE sid=1

-- 合併查詢

SELECT * FROM `products` JOIN `categories`;

SELECT * FROM `products` 
    JOIN `categories` 
    ON  products.category_sid=`categories`.sid;


SELECT `products`.*, `categories`.`name` FROM `products` 
    JOIN `categories` 
    ON  products.category_sid=`categories`.sid;


-- 別名
SELECT p.*, c.`name` FROM `products` AS p
    JOIN `categories` AS c
    ON p.`category_sid` = c.`sid`;

SELECT p.*, c.`name` FROM `products` p
    JOIN `categories` c
    ON p.`category_sid` = c.`sid`;
    -- 省略AS

SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON p.`category_sid` = c.`sid`;
    -- 查詢欄位的名稱自訂為‘分類名稱’

-- left join
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON p.`category_sid` = c.`sid`;
    -- 左邊 FROM `products` 所有的值都會出現

SELECT p.*, c.`name` 分類名稱 FROM `categories` c
    LEFT JOIN `products` p
    ON p.`category_sid` = c.`sid`;
-- 以上兩種搜尋的資料會不同 依左邊的表為主
-- 其他對不到的顯示NULL

-- join對到on
-- where只能有一個
-- NULL
-- 取出某欄為空值
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON p.`category_sid` = c.`sid`
    where c.`sid` is NULL;
-- 取出某欄不為空值
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON p.`category_sid` = c.`sid`
    where c.`sid` is NOT NULL;

-- 模糊搜尋
SELECT * FROM `products` WHERE `author` LIKE '平田';
SELECT * FROM `products` WHERE `author` LIKE '平%';
SELECT * FROM `products` WHERE `author` LIKE '平田%';
SELECT * FROM `products` WHERE `author` LIKE '陳%';
SELECT * FROM `products` WHERE `author` LIKE '%陳%';
SELECT * FROM `products` WHERE `author` LIKE '%陳%' OR `bookname` LIKE '%設計%';


SELECT * FROM `products` LIMIT 0,5 ;
SELECT * FROM `products` LIMIT 6,5 ;
-- LIMIT 0,5  從第一筆開始取五筆
-- LIMIT 5,5  從第五筆開始取五筆
-- 前密的數字是索引 後面是要取的數量

-- where
-- where in 
-- 順序不會依照括號內順序 會依照迴圈順序的236
SELECT * FROM `products` WHERE sid=6 OR sid=2 OR sid=3;
SELECT * FROM `products` WHERE `sid` IN (6, 2, 3);

-- 遞減 632
SELECT * FROM `products` WHERE sid IN (6, 2, 3) ORDER BY sid DESC;
-- 亂數排序
SELECT * FROM `products` WHERE `sid` IN (6, 2, 3) ORDER BY RAND();

-- 計算總筆數
SELECT COUNT(*) FROM `products`;
SELECT COUNT(sid) FROM `products`;

-- where 0只沒有 1搜尋全部
-- 結果23
SELECT COUNT(1) FROM `products` WHERE 1;
-- 結果都是1
SELECT 1 FROM `products` WHERE 1;
-- 結果23
SELECT COUNT(1) FROM `products` ;
-- `category_sid`=1 的總比數
SELECT COUNT(1) FROM `products` where`category_sid`=1 ;

-- SUM() 總合
SELECT * FROM `products` WHERE sid IN (1,2);
SELECT SUM(`price`) FROM `products` WHERE sid IN (1,2);


-- GROUP BY: 群組
-- 相同分類的全組起來（沒啥作用）
select * FROM `products` GROUP BY `category_sid`;
-- 通常搭配count查詢每個分類的筆數
SELECT `category_sid`, COUNT(1) FROM `products` GROUP BY
`category_sid`;
-- 查詢
SELECT p.`category_sid`, 
        c.`name`分類名稱,
        COUNT(1) 筆數
    FROM `products` p 
    JOIN `categories` c 
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;

SELECT p.`category_sid`, 
        c.`name`分類名稱,
        COUNT(1) 筆數
    FROM `products` p 
    LEFT JOIN `categories` c 
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;



-- MySQL 8 無法執行
SELECT *, COUNT(1) num FROM `products` GROUP BY `category_sid`;

-- 某一筆訂單明細
SELECT o.*, od.price, od.quantity, p.bookname FROM `orders` o
    JOIN order_details od ON o.sid = od.order_sid
    JOIN products p ON p.sid = od.product_sid
    WHERE o.sid = 11;



-- 查詢某一天的訂單
-- 時間一定要 年月日 不然會判斷為數字
-- 正確寫法
SELECT * FROM `orders` WHERE `order_date` > '2016-03-25' AND `order_date` < '2016-03-26'

SELECT * FROM `orders` WHERE `order_date` >= '2016-03-01' AND `order_date` < '2016-04-01'

SELECT * FROM `orders` WHERE `order_date` >= '2016-03-01 12:00:00' AND `order_date` < '2016-04-01 13:00:00'

-- 錯誤 會回傳空值
SELECT * FROM `orders` WHERE `order_date` > '2016' AND `order_date` < '2016'
SELECT * FROM `orders` WHERE `order_date` > '2016-03' AND `order_date` < '2016-03'

-- 子查詢要用小括號包起來
-- 子查詢裡面不可以有分號
SELECT * FROM `products` WHERE `sid` IN
(
SELECT `product_sid`
FROM `order_details`
WHERE `order_sid` = 11
);
-- 錯誤 裡面不可以有分號
SELECT * FROM `products` WHERE `sid` IN
(
SELECT *
FROM `order_details`
WHERE `order_sid` = 11;
)

-- 大部分的狀況要給別名 where in 不用給別名
SELECT p.*, od.price od_price
FROM products p
JOIN
(SELECT `product_sid`, `price` FROM `order_details`
WHERE `order_sid` = 11) od <<<<<<<<<<<<<<<<這是別名od
ON p.sid = od.product_sid;

SELECT p.*, od.price od_price
FROM products p
JOIN
(SELECT `product_sid`, `price` FROM `order_details`
WHERE `order_sid` = 11) od 
ON p.sid = od.product_sid;



-- 檢視表
CREATE VIEW product_cate_view AS  
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON p.`category_sid` = c.`sid`;
