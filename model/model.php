<?php

class Model
{
	// todo: передать массив ПОСТ в аргумнгтах метода
	public function addNote(...)
  {
		if ($comment = R::dispense('comment')) {

			$arr_table = ['name', 'message'];


		// $comment->name = $_POST['name'];
		// $comment->message = $_POST['message'];
		// $comment->date = date("l d F Y");
		// $comment->date_calendar = date("m/d/y");
		// $comment->time = date("h:i:s");

 		R::store($comment);
  }
	public function deleteNote($id)
	{
		$delete_id = R::hunt('comment', 'id = ?', [$id]);
	}
	public function addDate()
	{
		//Добавляет даты, которые можно выделить и узнать сколько записей именно в этой дате
		$date_calendar = R::getCol('SELECT date_calendar FROM comment');
		$date_view = $_GET['date_calendar'];
		$comments = R::getAll('SELECT `date_calendar` FROM `comment` WHERE `date_calendar` = ?', [$date_view]);

			foreach ($comments as $comment){
			  echo $comment['date_calendar'].'<br>';
			}
	}
	public function deleteDate()
	{
		$date_calendar = R::getCol('SELECT date_calendar FROM comment');
		$id_calendar = R::getCol('SELECT id FROM comment');
		$comments = R::loadAll('comment', $id_calendar);
		//Убирает повторяющиеся значения из массива
		$date_calendar_unique = array_unique($date_calendar); echo "<br>";
		foreach ($date_calendar_unique as $value) {
			// создает ссылку при нажатии на которую в URL передается дата
			echo "<a href='../date/adddate.php?date_calendar=$value'>".$value.'</a>';
			echo $value;
			echo $comment->date_calendar;
			echo "<br>";
		}
		echo "<br>";
		print_r ($date_calendar);


		foreach ($comments as $comment){
		echo "date_calendar: ".$comment->date_calendar.'; ';
		  echo "<br>";
		}
	}
	public function showNotes()
	{
		// Выбирает все id из таблицы comment, выводит их в массив и циклом выводит всю информацию по каждому id
		$ids = R::getCol('SELECT id FROM comment');
		print_r ($ids);
		echo "<br><br>";

		$comments = R::loadAll('comment', $ids);
		foreach ($comments as $comment){
		  echo "id: ".$comment->id.'; ';
		 	echo "Имя: ".$comment->name.'; ';
		  echo "Сообщение: ".$comment->message.'; ';
		  echo "Время: ".$comment->time.'; ';
		  echo "Дата: ".$comment->date_calendar.'; ';
		  echo "<br>";
		  // создает ссылку при нажатии на которую в URL передается id
		  echo "<a href='deletenote.php?id=$comment->id'>удоли</a>";
		  echo "<br>";
		}
	}

}






 ?>