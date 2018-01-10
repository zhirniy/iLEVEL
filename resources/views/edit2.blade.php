<!-- Страница редактирования записи-->
<!DOCTYPE html>
<html>
<head>
	<title>Добавить запись</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
<style>
	#content{
    margin-top:100px;
    margin-left:18%;
    margin-right:18%;
}

input{
	width:100px;
}
.doublesize{
	width:200px;
}
</style>
<script>
	function curs_(){
		var edit_operation = document.getElementById("edit_operation");
		var edit_operation_dol = document.getElementById("edit_operation_dol");
		edit_operation_dol.value = (edit_operation.value/28).toFixed(2);
	}
</script>
<body>
<a href="{{ url('/') }}" class="btn btn-primary form-control">Вернуться на главную страницу</a>
<!-- Форма редактирования записи-->
<div id="content">
<div class="row">
<div class="col-md-1 border sum">№</div>
<div class="col-md-2 border sum">Сумма, грн.:</div>
<div class="col-md-2 border sum">Сумма, $:</div>
<div class="col-md-2 border sum">Дата :</div>
<div class="col-md-3 border sum">Описание:</div>
</div>
{!! Form::open(['url'=>'edit3']) !!}
@foreach ($posts as $post)
<div class="row">
<div class="col-md-1 border">
{!! Form::text('edit_id', "$post->id", ['class'=>'form-control']) !!}
</div>
<div class="col-md-2 border">
{!! Form::text('edit_operation', "$post->operation", ['class'=>'form-control', 'id'=>'edit_operation', 'onChange'=>'curs_()']) !!}
</div>
<div class="col-md-2 border">
{!! Form::text('edit_operation_dol', "$post->operation_dol", ['class'=>'form-control', 'id'=>'edit_operation_dol', 'step'=>'0.01']) !!}
</div>
<div class="col-md-2 border">
{!! Form::text('edit_date', "$post->date", ['class'=>'form-control']) !!}
</div>
<div class="col-md-3 border">
{!! Form::text('edit_detail', "$post->detail", ['class'=>'form-control']) !!}
</div>
<div class="col-md-2">
<div class="row">
<div class="col-md-12">
	{!! Form::submit('Редактировать', ['class'=>'btn btn-warning form-control']) !!}
</div>	
</div>
</div>
</div>
@endforeach
</div>
</div>
<!-- Форма редактирования записи-->
</body>
</html>