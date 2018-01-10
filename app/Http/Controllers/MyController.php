<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use Carbon\Carbon;




class MYController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   //При входе на страницу или при нажатии пользователем кнопки очистить просто показываем шаблон стартовой странцы
    public function index(){
      return view('index');
    }

//Если есть запрос от пользователя даём выборку запией
   public function all(){
 //Получение данных с формы и валидация в нужный формат  
      $data_on = Request::get('data_on');
  	  $data_on = substr($data_on, 6).substr($data_on, 2, 4).substr($data_on, 0, 2);
  	  $date_ = '\''.$data_on.'\'';
      $data_off = Request::get('data_off');
      $data_off = substr($data_off, 6).substr($data_off, 2, 4).substr($data_off, 0, 2);
  	  $date__ = '\''.$data_off.'\'';
 //Отправляем запрос к базе данных о записях за период и записываем результат в переменную $posts
      $posts =  \DB::table('operations') ->where([
                                                 ['date', '>=', $data_on],
                                                 ['date', '<=', $data_off]
     	]) ->orderBy('id', 'desc') -> get();
 //Отправляем запрос к базе данных для получения сумм за период и записываем результат  в свойства переменной $posts
       $results1 = \DB::select('select sum(operation) from operations where date >= '.$date_.' and date <='.$date__.' and operation > 0');
       $posts->results1  = $results1;
       $results2 = \DB::select('select sum(operation) from operations where date >= '.$date_.' and date <='.$date__.' and operation < 0');
       $posts->results2  = $results2;
       $results3 = \DB::select('select sum(operation_dol) from operations where date >= '.$date_.' and date <='.$date__.' and operation > 0');
       $posts->results3  = $results3;
       $results4 = \DB::select('select sum(operation_dol) from operations where date >= '.$date_.' and date <='.$date__.' and operation < 0');
       $posts->results4  = $results4;

//Возвращаем шаблон стартовой страницы и передаём в него массив данных полученный с базы данных
       return view('index', compact('posts'));
    }


    
}
