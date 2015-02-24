SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `title`) VALUES
(2, 'category 1'),
(3, 'category 2');

CREATE TABLE IF NOT EXISTS `goods` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `id_cat` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `goods` (`id`, `title`, `description`, `image`, `price`, `id_cat`) VALUES
(2, 'Sunless Sea', 'Sunless Sea — двухмерная ролевая игра от независимой студии Failbetter Games. Действие Sunless Sea разворачивается в викторианскую эпоху, на вымышленной территории уничтоженного Лондона, а игроки управляют целой командой искателей приключений, отправившихся на поиски сокровищ и реликвий. \r\n\r\nИгроки путешествуют по открытому миру Sunless Sea на борту парового корабля. Боевая система совмещает в себе бои как в реальном времени, так и пошаговые тактические сражения. Корабль можно всячески улучшать — устанавливать более мощные двигатели, пневматические торпедные установки или так называемые свежеватели. \r\n\r\nПомимо того, игроки должны постоянно следить за психическим состоянием своих подчиненных. Чем дальше заплывет корабль, тем выше риск того, что члены команды сойдут с ума и начнут совершать необдуманные поступки, ставящие под угрозу всю экспедицию.', 'Sunless_Sea_card.jpg', 123, 2),
(6, 'Heroes of Might & Magic III', 'Heroes of Might and Magic 3 HD является переизданием оригинальной Heroes of Might and Magic 3, в котором было улучшено графическое и звуковое оформление. Помимо того, в данном издании было добавлено многопользовательское лобби.\r\n\r\nДействие игры разворачивается сразу после смерти короля Эрафии, а сюжет рассказывает о жестоком конфликте, в который оказались втянуты силы людей, демонов, эльфов и нежити.\r\n\r\nВыбрав одну из представленных фракций, игроки должны отстроить крепость, захватывать ресурсы, а также развивать героев и тренировать воинов, чтобы участвовать в пошаговых сражениях с вражескими армиями.', 'Heroes_of_Might_and_Magic_3_HD_card.png', 347345, 2),
(7, 'Life is Strange: Episode 1 - Chrysalis', 'Life is Strange — приключенческая игра, разработанная студией Dontnod Entertainment. Действие игры разворачивается в вымышленном городе Аркадия Бэй (Arcadia Bay), штат Орегон, в который, после пяти лет отсутствия, возвращается студентка Макс Каулфилд (Max Caulfield). Воссоединившись со своей давней подругой Хлоей, девушки попробуют раскрыть неприятную правду о загадочном исчезновении студентки Рэйчел Эмбер (Rachel Amber). Характерной особенностью проекта является умение главной героини отматывать время назад, чтобы изменить принятые ей неверные решения.', 'Life_is_Strange_card.jpg', 233543, 2),
(8, 'The Binding of Isaac: Rebirth', 'The Binding of Isaac: Rebirth — ролевая игра с элементами экшена, разработанная Эдмундом МакМилленом при поддержке студии NICALiS. Когда мать Исаака начинает слышать голос Бога, требующий жертву в знак её верности, Исаак сбегает в подвал, где сталкивается с ордами гротескных чудовищ, потерянными братьями и сестрами, страхами и своей обезумевшей мамой.\r\n\r\nRebirth является улучшенным переизданием оригинальной The Binding of Isaac, в котором было добавлено 150 новых предметов, 3 персонажа, несколько сюжетных глав и 16 боссов. Помимо того, Rebirth включает в себя дополнение Wrath of the Lamb.', 'Binding_of_Isaac_Rebirth_card.jpg', 3534534, 2),
(9, 'BioShock Infinite', 'BioShock Infinite - продолжение экшена от первого лица с элементами РПГ, разработанное студией Irrational Games. \r\n\r\nДействие BioShock Infinite  разворачивается в начале XX века, за 50 лет до событий в Восторге. В 1900 году Америка создала воздушный город Колумбия, который стал чудом среди изобретений человека. Но из-за загадочного инцидента произошло восстание, и город испарился на несколько лет.\r\n\r\nГлавному герою BioShock Infinite, бывшему сотруднику «детективного агентства Пинкертона» Букеру ДеУитту, предстоит отправиться в Колумбию, чтобы закончить старое дело и найти пропавшую Элизабет. Детективу предстоит воспользоваться стрелковым вооружением и различными плазмидами, чтобы сразиться с жителями летающего города и вернуть похищенную девушку домой.', 'BioShock_Infinite_card.jpg', 34656456, 2),
(10, 'Rayman Legends', 'Rayman Legends — аркадный платформер, разработанный студией Ubisoft Montpellier. Rayman Legends рассказывает историю о том, как Rayman, Globox и Teensies путешествуют по сказочным мирам и сражаются со злом.\r\n\r\nВ Rayman Legends представлено множество красочных двухмерных уровней, в том числе и те, которые были в Rayman Origins, а также различные кооперативные и соревновательные игровые режимы.', 'Rayman_Legends_card.jpg', 35345345, 2);


ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `goods`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_goods_categories` (`id_cat`);


ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `goods`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;

ALTER TABLE `goods`
ADD CONSTRAINT `fk_goods_categories` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
