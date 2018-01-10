<!-- Стартовая страница-->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel!</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <!-- Скрипт подключения календарей в поля ввода-->
        <script src="js/calendar.js" type="text/javascript"></script>

      
      
    </head>
    <body>
 
<!-- Форма выбора дат и создания, удаления или изменения существующих записей-->

<h3>Учёт личных доходов и расходов:</h3>
{!! Form::open(['url'=>'all']) !!}
<div class="row">
<div class="col-md-4">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
{!! Form::label('data-on','Дата от:', ['class'=>'data_on']) !!}
{!! Form::text('data_on', '', ['class'=>'form-control', 'onfocus'=>'this.select();lcs(this)', 'onclick'=>'event.cancelBubble=true;this.select();lcs(this)', 'required', 'placeholder'=>'dd-mm-yy']) !!}
</div>
<div class="col-md-4">
{!! Form::label('data-off','Дата до:', ['class'=>'data_on']) !!}
{!! Form::text('data_off', '', ['class'=>'form-control', 'onfocus'=>'this.select();lcs(this)', 'onclick'=>'event.cancelBubble=true;this.select();lcs(this)', 'required', 'placeholder'=>'dd-mm-yy']) !!}
</div>
</div>
</div>
<div class="col-md-8">
<div class="row">
<div class="col-md-2">
{!! Form::label('Найти','', ['class'=>'data_off']) !!}
{!! Form::submit('Найти', ['class'=>'btn btn-success form-control']) !!}
</div>
<div class="col-md-2">
{!! Form::label('Очистить','', ['class'=>'data_off']) !!}
<a href="{{ url('/') }}" class="btn btn-secondary form-control">Очистить</a>
</div>
<div class="col-md-2">
{!! Form::label('Добавить','', ['class'=>'data_off']) !!}
<a href="{{ url('/create') }}" class="btn btn-primary form-control">Добавить</a>
</div>
<div class="col-md-2">
{!! Form::label('Редактировать','', ['class'=>'data_off']) !!}
<a href="{{ url('/edit') }}" class="btn btn-warning form-control">Редактировать</a>
</div>
<div class="col-md-2">
{!! Form::label('Удалить','', ['class'=>'data_off']) !!}
<a href="{{ url('/delete') }}" class="btn btn-danger form-control">Удалить</a>
</div>
</div>
</div>
</div>
{!! Form::close() !!}

<!-- Форма выбора дат и создания, удаления или изменения существующих записей-->

<!-- Вывод информации о записях для выбранных дат-->
<div id="content">
@if(isset($posts))
@if(!empty($posts[0]->id))
<div class="row">
<div class="col-md-2 border sum">№</div>
<div class="col-md-2 border sum">Сумма, грн.:</div>
<div class="col-md-2 border sum">Сумма, $:</div>
<div class="col-md-2 border sum">Дата:</div>
<div class="col-md-4 border sum">Описание:</div>
</div>

@foreach ($posts as $post)
@if ($post->operation > 0)
<div class="row debit">
@else
<div class="row kredit">
@endif
<div class="col-md-2 border">
{{$post->id}}
</div>
<div class="col-md-2 border">
{{$post->operation}}
</div>
<div class="col-md-2 border">
{{$post->operation_dol}}
</div>
<div class="col-md-2 border">
{{$post->date}}
</div>
<div class="col-md-4 border">
{{$post->detail}}
</div>
</div>
@endforeach


@foreach ($posts->results1[0] as $post)
@if($post)
<div class="row">
<div class="col-md-2 sum">Итого дебит, грн.:</div>
<div class="col-md-2 sum"> {{$post}}</div>
</div>
@else
<div class="row">
<div class="col-md-2 sum">Итого дебит, грн.:</div>
<div class="col-md-2 sum">0</div>
</div>
@endif
@endforeach

@foreach ($posts->results2[0] as $post)
@if($post)
<div class="row">
<div class="col-md-2 sum">Итого кредит, грн.:</div>
<div class="col-md-2 sum"> {{$post}}</div>
</div>
@else
<div class="row">
<div class="col-md-2 sum">Итого кредит, грн.:</div>
<div class="col-md-2 sum">0</div>
</div>
@endif
@endforeach

@foreach ($posts->results3[0] as $post)
@if($post)
<div class="row">
<div class="col-md-2 sum">Итого дебит, $:</div>
<div class="col-md-2 sum"> {{$post}}</div>
</div>
@else
<div class="row">
<div class="col-md-2 sum">Итого дебит, $:</div>
<div class="col-md-2 sum">0</div>
</div>
@endif
@endforeach

@foreach ($posts->results4[0] as $post)
@if($post)
<div class="row">
<div class="col-md-2 sum">Итого кредит, $:</div>
<div class="col-md-2 sum"> {{$post}}</div>
</div>
@else
<div class="row">
<div class="col-md-2 sum">Итого кредит, $:</div>
<div class="col-md-2 sum">0</div>
</div>
@endif
@endforeach

@else
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 sum">Нет операций за период</div>
</div>
@endif

</div>
@endif

</div>

</div>

<!-- Вывод информации о записях для выбранных дат-->

    </body>

</html>


