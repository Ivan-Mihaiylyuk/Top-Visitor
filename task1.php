<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Яблоко, Дерево, Сад</head>
<body>
	
</body>
</html>
 <?php
// Добавляем классы 
class garden {
var $tree;
// метод, который присваивает значения
// атрибутам класса
function garden($t="Количество отсутствует"){
$this->tree = $t;

}
//метод для отображения экземпляров класса
function show(){
$art = "<h2>$this->tree</h2>";
echo $art;
}
}
// Определение класса яблоки
class apples {
var $age;
var $color;
var $size;

//метод, который присваивает значения атрибутам класса
function apples($t="Возраст не указан",
$a="Цвет не введен",$d="Размер не указан"){
$this->age = $t;
$this->color = $a;
$this->size = $d;
}
//метод для отображения экземпляров класса
function show(){
$art = "<h2>$this->age</h2>$this->color</font><p>
$this->size
</p>";
echo $art;
}
}
// Далее следует собственно создание и отображение
// экземпляров выбранного класса
if (isset($_GET["art_create"])){ //Если была выбрана 
$art = new garden; // создаем представителя класса 
$art_vars = get_class_vars(get_class($art)); //какие
// аргументы этого класса нужно задать
Make_form($art,$art_vars,"art_create"); //вызов функции
// создания формы
if (isset($_GET["create_real"])){ Show_($art_vars); }
// если данные этой формы отправлены, то вызываем
// функцию показа
}
//то же самое
if (isset($_GET["pers_create"])){
$art = new apples;
$art_vars = get_class_vars(get_class($art));
Make_form($art,$art_vars,"pers_create");
if (isset($_GET["create_real"])){ Show_($art_vars); }
}
// функция создания формы
function Make_form($art,$art_vars,$glob){
$str = "<form>"; // html код формы записывается
// в строку $str
//перебираем список переменных класса объекта $art
foreach ($art_vars as $var_name => $var_value){
$str .="$var_name<input type=text name=$var_name><br>";
//создаем элемент формы с именем свойства класса
}
$str .= "<input type=hidden name=$glob>"; // чтобы не
// забыть, что мы создаем
$str .= "<input type=submit name=create_real
value='Create and Show'></form>";
echo "$str"; // выводим форму
}
// функция показа объекта
function Show_($art_vars){
global $art; //используется глобальное имя объекта
$k = count($art_vars); //число свойств класса
// (переменных в форме)
$p=0; //вспомогательная переменная
foreach ($art_vars as $name => $value){
$p++;
if ($_GET["$name"]=="") $val= $art->$name;
else $val = $_GET["$name"];
if ($p<>$k) $par .='"'. $val.'",';
else $par .='"'. $val.'"';
}
$par = '$art->'.$const ."(" .$par.");";
// теперь $par представляет собой php-код для вызова
// метода класса $art, изначально
// записанного в $par
// например,
 //$art->Person('Vasia','Petrov','vas@intuit.ru');
echo($par); // функция eval выполняет код,
// содержащийся в $par
$art->show();
}
?> 