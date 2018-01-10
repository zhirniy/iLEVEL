<!-- Страница добавления записи-->
<!DOCTYPE html>
<html>
<head>
	<title>Добавить запись</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<style>
	#content{
    margin-top:100px;
}
</style>
<!-- Скрипт получения курса доллара и записи в поле sum_dol-->
<script src="js/curs.js" type="text/javascript"></script>
<body>
<a href="{{ url('/') }}" class="btn btn-primary form-control">Вернуться на главную страницу</a>
<!-- Форма создания новой записи-->
<div id="content">
{!! Form::open(['url'=>'all_created']) !!}
<div class="row">
<div class="col-md-3">
<div class="row">
<div class="col-md-4"></div>
</div>
</div>
<div class="col-md-8">
<div class="row">
<div class="col-md-2">
{!! Form::label('number_sum','Сумма (гривна):', ['class'=>'data_on']) !!}
{!! Form::input('number', 'number_sum', '0', ['class'=>'form-control', 'id'=>'number_sum', 'step'=>'0.01']); !!}
</div>
<div class="col-md-2">
{!! Form::label('sum_dol','Сумма($):', ['class'=>'data_on']) !!}
{!! Form::input('number', 'sum_dol', '0', ['class'=>'form-control', 'id'=>'sum_dol', 'step'=>'0.01']); !!}
</div>
<div class="col-md-3">
{!! Form::label('detail','Описание:', ['class'=>'data_on']) !!}
{!! Form::textarea('detail', 'Описание', ['class'=>'form-control']) !!}
</div>
<div class="col-md-2">
{!! Form::label('Запись:','', ['class'=>'data_off']) !!}
{!! Form::submit('Запись', ['class'=>'btn btn-primary form-control']) !!}
</div>
</div>
</div>
{!! Form::close() !!}
</div>
<!-- Форма создания новой записи-->
</body>
</html>