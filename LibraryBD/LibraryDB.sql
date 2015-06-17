-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-06-15 11:48:04
-- 服务器版本: 5.5.43-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `LibraryDB`
--

-- --------------------------------------------------------

--
-- 表的结构 `Advice`
--

CREATE TABLE IF NOT EXISTS `Advice` (
  `fbid` int(11) NOT NULL,
  `userid` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Advice`
--

INSERT INTO `Advice` (`fbid`, `userid`, `username`, `content`, `date`) VALUES
(0, '0', '0', '0', '0000-00-00'),
(3, '234', '234', 'Hello World !', '2015-06-10'),
(4, '234', '234', 'Hello World\r\n!', '2015-06-13'),
(5, '234', '234', 'BiuBiuBiu\r\nBiuBiu\r\nBiu', '2015-06-14'),
(6, '234', '234', 'Biu\r\nBiuBiu\r\nBiuBiuBiu', '2015-06-14'),
(7, '13307130501', '史明阳', 'lalala', '2015-06-14'),
(8, '890', '890', '啊啊啊\r\n啊啊\r\n啊', '2015-06-15');

-- --------------------------------------------------------

--
-- 表的结构 `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `bookid` char(9) NOT NULL,
  `isbn` char(17) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `bookname` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `press` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `callnumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `state` varchar(10) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `readid` varchar(13) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL,
  `times` int(11) NOT NULL,
  `bookimg` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Book`
--

INSERT INTO `Book` (`bookid`, `isbn`, `bookname`, `author`, `press`, `branch`, `callnumber`, `state`, `readid`, `times`, `bookimg`) VALUES
('800001.01', '978-7-111-40085-1', '数据库系统概念', 'Abraham Silberschatz;Henry F.Korth', '机械工业出版社', '邯郸分馆理科图书馆', 'HL-1-1-1-1', '可借阅', NULL, 2, 'http://shopimg.kongfz.com.cn/20131211/1597758/1597758iVWKx0_b.jpg'),
('800001.02', '978-7-111-40085-1', '数据库系统概念', 'Abraham Silberschatz;Henry F.Korth', '机械工业出版社', '张江分馆', 'ZJ-1-1-1-1', '可借阅', NULL, 2, 'http://shopimg.kongfz.com.cn/20131211/1597758/1597758iVWKx0_b.jpg'),
('800002.01', '978-7-115-25305-7', '离散数学', '赵一鸣；阚海斌；吴永辉', '人民邮电出版社', '邯郸分馆理科图书馆', 'HL-1-1-1-2', '可借阅', NULL, 3, 'http://images.zxhsd.com/photo/book_b/C/01231/97871152530572074089-fm-b.jpg'),
('800002.02', '978-7-115-25305-7', '离散数学', '赵一鸣；阚海斌；吴永辉', '人民邮电出版社', '邯郸分馆理科图书馆', 'HL-1-1-1-2', '可借阅', NULL, 1, 'http://images.zxhsd.com/photo/book_b/C/01231/97871152530572074089-fm-b.jpg'),
('800002.03', '978-7-115-25305-7', '离散数学', '赵一鸣；阚海斌；吴永辉', '人民邮电出版社', '张江分馆', 'ZJ-1-1-1-2', '可借阅', NULL, 1, 'http://images.zxhsd.com/photo/book_b/C/01231/97871152530572074089-fm-b.jpg'),
('800002.04', '978-7-115-25305-7', '离散数学', '赵一鸣；阚海斌；吴永辉', '人民邮电出版社', '张江分馆', 'ZJ-1-1-1-2', '可借阅', NULL, 1, 'http://images.zxhsd.com/photo/book_b/C/01231/97871152530572074089-fm-b.jpg'),
('800003.01', '978-7-535-73230-9', '时间简史（插图本）', '史蒂芬·霍金', '湖南科技出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-1', '可借阅', NULL, 1, 'http://img35.ddimg.cn/69/27/463785-1_u_1.jpg'),
('800003.02', '978-7-535-73230-9', '时间简史（插图本）', '史蒂芬·霍金', '湖南科技出版社', '张江分馆', 'ZJ-1-1-1-3', '可借阅', NULL, 1, 'http://img35.ddimg.cn/69/27/463785-1_u_1.jpg'),
('800003.03', '978-7-535-73230-9', '时间简史（插图本）', '史蒂芬·霍金', '湖南科技出版社', '江湾分馆', 'JW-1-1-1-1', '可借阅', NULL, 1, 'http://img35.ddimg.cn/69/27/463785-1_u_1.jpg'),
('800003.04', '978-7-535-73230-9', '时间简史（插图本）', '史蒂芬·霍金', '湖南科技出版社', '枫林分馆', 'FL-1-1-1-1', '可借阅', NULL, 1, 'http://img35.ddimg.cn/69/27/463785-1_u_1.jpg'),
('800004.01', '978-7-302-28756-8', 'Java从入门到精通（第3版）', '明日科技', '清华大学出版社', '邯郸分馆理科图书馆', 'HL-1-1-1-3', '可借阅', NULL, 1, 'http://img30.ddimg.cn/89/19/22862060-1_u_1.jpg'),
('800004.02', '978-7-302-28756-8', 'Java从入门到精通（第3版）', '明日科技', '清华大学出版社', '张江分馆', 'ZJ-1-1-1-4', '可借阅', NULL, 1, 'http://img30.ddimg.cn/89/19/22862060-1_u_1.jpg'),
('800004.03', '978-7-302-28756-8', 'Java从入门到精通（第3版）', '明日科技', '清华大学出版社', '江湾分馆', 'JW-1-1-1-2', '可借阅', NULL, 1, 'http://img30.ddimg.cn/89/19/22862060-1_u_1.jpg'),
('800004.04', '978-7-302-28756-8', 'Java从入门到精通（第3版）', '明日科技', '清华大学出版社', '枫林分馆', 'FL-1-1-1-2', '可借阅', NULL, 1, 'http://img30.ddimg.cn/89/19/22862060-1_u_1.jpg'),
('800005.01', '978-7-535-46708-9', '小时代1.0折纸时代', '郭敬明', '长江文艺出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-3', '已借出', '13307130501', 2, 'http://img34.ddimg.cn/4/23/23262034-1_u_1.jpg'),
('800005.02', '978-7-535-46708-9', '小时代1.0折纸时代', '郭敬明', '长江文艺出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-3', '可借阅', NULL, 2, 'http://img34.ddimg.cn/4/23/23262034-1_u_1.jpg'),
('800006.01', '978-7-535-47260-1', '小时代2.0虚铜时代', '郭敬明', '长江文艺出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-3', '可借阅', NULL, 1, 'http://img35.ddimg.cn/89/29/23506055-1_u_2.jpg'),
('800006.02', '978-7-535-47260-1', '小时代2.0虚铜时代', '郭敬明', '长江文艺出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-3', '可借阅', NULL, 1, 'http://img35.ddimg.cn/89/29/23506055-1_u_2.jpg'),
('800007.01', '978-7-535-47261-8', '小时代3.0刺金时代', '郭敬明', '长江文艺出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-3', '可借阅', NULL, 1, 'http://img36.ddimg.cn/90/30/23506056-1_u_2.jpg'),
('800007.02', '978-7-535-47261-8', '小时代3.0刺金时代', '郭敬明', '长江文艺出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-3', '可借阅', NULL, 1, 'http://img36.ddimg.cn/90/30/23506056-1_u_2.jpg'),
('800008.01', '978-7-544-25860-9', '白夜行', '东野圭吾', '南海出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-4', '可借阅', NULL, 1, 'http://img33.ddimg.cn/25/30/22935553-1_u_1.jpg'),
('800009.01', '978-7-544-26761-8', '嫌疑人X的献身', '东野圭吾', '南海出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-4', '可借阅', NULL, 1, 'http://img33.ddimg.cn/25/30/22935553-1_u_1.jpg'),
('800010.01', '978-7-562-01767-7', '法理学：法律哲学与法律方法', '博登海默', '中国政法大学出版社', '江湾分馆', 'JW-1-1-1-3', '可借阅', NULL, 1, 'http://images.dangdang.com/images/8833280.jpg'),
('800011.01', '978-7-121-08511-6', '程序员的自我修养—链接、装载与库', '俞甲子；石凡；潘爱民', '电子工业出版社', '张江分馆', 'ZJ-1-1-1-5', '可借阅', NULL, 1, 'http://img13.360buyimg.com/n0/jfs/t325/190/1572176159/24685/b9bb0e48/543ddd26N395291fc.jpg'),
('800012.01', '9-787-549-52266-8', '演员自我修养 第一部', '斯坦尼斯拉夫斯基', '广西师范大学出版社', '邯郸分馆文科图书馆', 'HW-1-1-1-5', '可借阅', NULL, 1, 'http://img31.ddimg.cn/32/26/23174051-1_u_1.jpg'),
('800013.01', '9-787-122-20011-2', '自卫防身术', '董世彪', '化学工业出版社', '江湾分馆', 'JW-1-1-1-3', '可借阅', NULL, 1, 'http://img35.ddimg.cn/73/29/23466835-1_u_1.jpg'),
('800013.02', '9-787-122-20011-2', '自卫防身术', '董世彪', '化学工业出版社', '枫林分馆', 'FL-1-1-1-3', '可借阅', NULL, 1, 'http://img35.ddimg.cn/73/29/23466835-1_u_1.jpg'),
('800014.01', '12345678912345678', '1', '1', '1', '邯郸校区理科图书馆', 'HL-1-1-1-58', '可借阅', NULL, 0, '1111'),
('800014.02', '12345678912345678', '1', '1', '1', '邯郸校区文科图书馆', 'HW-1-1-1-58', '可借阅', NULL, 0, '1111');

-- --------------------------------------------------------

--
-- 表的结构 `Branch`
--

CREATE TABLE IF NOT EXISTS `Branch` (
  `branchid` char(2) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `floor` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `barnum` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`branchid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Branch`
--

INSERT INTO `Branch` (`branchid`, `branchname`, `floor`, `part`, `barcode`, `barnum`, `sum`) VALUES
('FL', '枫林校区分馆', 1, 1, 1, 34, 34),
('HL', '邯郸校区理科图书馆', 1, 1, 1, 58, 58),
('HW', '邯郸校区文科图书馆', 1, 1, 1, 58, 58),
('JW', '江湾校区分馆', 1, 1, 1, 34, 34),
('ZJ', '张江校区分馆', 1, 1, 1, 34, 34);

-- --------------------------------------------------------

--
-- 表的结构 `Brwlist`
--

CREATE TABLE IF NOT EXISTS `Brwlist` (
  `brwid` int(11) NOT NULL,
  `bookid` varchar(16) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `userid` varchar(13) NOT NULL,
  `bdate` date NOT NULL,
  `rdate` date NOT NULL,
  `redate` date DEFAULT NULL,
  PRIMARY KEY (`brwid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Brwlist`
--

INSERT INTO `Brwlist` (`brwid`, `bookid`, `bookname`, `userid`, `bdate`, `rdate`, `redate`) VALUES
(1, '800005.01', '小时代1.0折纸时代', '13307130501', '2015-06-14', '2015-07-14', NULL),
(2, '800001.01', '数据库系统概念', '13307130501', '2015-06-14', '2015-07-14', '2015-06-14'),
(3, '800001.02', '数据库系统概念', '13307130501', '2015-06-14', '2015-07-14', '2015-06-14'),
(4, '800002.01', '离散数学', '13307130501', '2015-06-14', '2015-07-14', '2015-06-15'),
(5, '800002.01', '离散数学', '890', '2015-06-15', '2015-07-15', '2015-06-15'),
(6, '800005.02', '小时代1.0折纸时代', '13307130501', '2015-06-15', '2015-07-15', '2015-06-15');

-- --------------------------------------------------------

--
-- 表的结构 `Class`
--

CREATE TABLE IF NOT EXISTS `Class` (
  `classid` varchar(10) NOT NULL,
  `maxnum` int(11) NOT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Class`
--

INSERT INTO `Class` (`classid`, `maxnum`) VALUES
('博士生', 15),
('教师', 30),
('本科生', 17),
('校外人员', 5),
('研究生', 15);

-- --------------------------------------------------------

--
-- 表的结构 `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `staffid` varchar(13) NOT NULL,
  `staffname` varchar(50) NOT NULL,
  `smail` varchar(50) NOT NULL,
  `spassword` varchar(16) NOT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Staff`
--

INSERT INTO `Staff` (`staffid`, `staffname`, `smail`, `spassword`) VALUES
('111', 'admin', 'admin@admin', 'Whoisadmin'),
('1234', '1234', '1234', '1234567'),
('2000', '111', '111', '111111');

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `userid` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upassword` varchar(16) NOT NULL,
  `type` varchar(20) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `brwnum` int(11) NOT NULL,
  `logged` int(11) NOT NULL,
  `times` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`userid`, `username`, `upassword`, `type`, `umail`, `dept`, `brwnum`, `logged`, `times`) VALUES
('123', '123', '123456', '本科生', '123', '', 15, 0, 0),
('1231', '1231', '123123', '本科生', '123', '中国语言文学系', 1, 0, 1),
('13307130501', '史明阳', '111111', '本科生', '13307130501@fudan.edu.cn', '计算机科学技术学院', 0, 0, 44),
('234', '234', '234567', '本科生', '324', '化学系', 0, 0, 1),
('321', '123', '321321', '本科生', '123', '新闻学院', 0, 0, 0),
('369', '369', '369369', '本科生', '369@123', '中国语言文学系', 0, 0, 0),
('555', '555', '555555', '本科生', '555555', '哲学学院', 0, 0, 1),
('666', '666', '666666', '本科生', '666666', '新闻学院', 0, 0, 0),
('777', '777', '888888', '研究生', '777', '外国语言文学学院', 0, 0, 1),
('789', '789', '999999', '本科生', '999', '哲学学院', 0, 0, 0),
('890', '890', '111111', '本科生', '9123@23', '经济学院', 0, 0, 1),
('999', '999', '999999', '本科生', '999', '中国语言文学系', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
