<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use Carbon\Carbon;

class MYController_edit extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   //При получении данных от пользователя на редактирование записей выдаем ему список запией для редактирования
          public function edit(){
     //Вывод записей
            $posts =  \DB::table('operations') -> orderBy('id', 'desc') -> get();
            return view('edit', compact('posts'));
             }
      	
   

    //При выборе записи для редактирования возвращаем пользователю форму для редактирования
       public function edit_id($id){

     	     $posts = \DB::table('operations')->where('id', $id)->get();
           return view('edit2', compact('posts'));

      }

    //При получение данных с формы для редактирования - обновляем запись в базе данных и возвращаем список записей для дальнейшего редактирования
      public function edit_update(){
        //Получение данных с формы и валидация в нужный формат  
          $edit_operation = Request::get('edit_operation');
          $edit_id= Request::get('edit_id');
          $edit_date = Request::get('edit_date');
          $edit_detail = Request::get('edit_detail');
          $edit_operation_dol = Request::get('edit_operation_dol');

              \DB::table('operations') ->  where('id', $edit_id) ->update(['operation'=>$edit_operation,
                                                                  'operation_dol'=>$edit_operation_dol,
                                                                  'date'=>$edit_date,
                                                                  'detail'=>$edit_detail

              ]);

              $posts =  \DB::table('operations')-> orderBy('id', 'desc') -> get();  
             return view('edit', compact('posts'));


      }
    
}
