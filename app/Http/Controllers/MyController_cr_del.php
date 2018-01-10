<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use Carbon\Carbon;

class MYController_cr_del extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    //При  нажатии пользователем кнопки создания новой записи возвращаем шаблон для создания
     public function create(){

           return view('create');
     
     }
    //При  нажатии пользователем кнопки удаления возвращаем шаблон для удаления записей
    public function delete(){

            $posts =  \DB::table('operations') -> orderBy('id', 'desc') -> get();
            return view('delete', compact('posts'));
     
     }

  //При получении данных от пользователя на добавление записи производим запись в базу данных и показываем ему записи за сегодня с новой записью
     public function all_created(){

           $operation = Request::get('number_sum');
           $operation_dol = Request::get('sum_dol');
           $date = Carbon::now();
           $detail = Request::get('detail');

          \DB::table('operations') -> insert(['operation'=>$operation, 'operation_dol'=> $operation_dol,'date'=>$date, 'detail'=>$detail]);
            $date = substr($date, 0, 10);
             $posts =  \DB::table('operations') ->where('date', $date) ->orderBy('id', 'desc') -> get();
            $date = '\''.$date.'\'';
             $results1 = \DB::select('select sum(operation) from operations where date = '.$date. ' and operation > 0');
            $posts->results1  = $results1;
            $results2 = \DB::select('select sum(operation) from operations where date = '.$date. ' and operation < 0');
            $posts->results2  = $results2;
            $results3 = \DB::select('select sum(operation_dol) from operations where date = '.$date. ' and operation > 0');
            $posts->results3  = $results3;
            $results4 = \DB::select('select sum(operation_dol) from operations where date = '.$date. ' and operation < 0');
            $posts->results4  = $results4;
            $posts->date = $date;
            return view('index',compact('posts'));

     }

     //При  выборе пользователем записи которую нужно удалить - удаляем её и возращаем пользователя на страницу для удалений
     public function delete_id($id){

         	  $posts = \DB::table('operations')->where('id', $id) -> delete();
    	      return redirect()->back();
     
     }

    
}
