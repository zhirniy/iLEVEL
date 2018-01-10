<!-- Страница удаления записей-->
<!DOCTYPE html>
<html>
<head>
	<title>Добавить запись</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">      

<body>
<a href="{{ url('/') }}" class="btn btn-primary form-control">Вернуться на главную страницу</a>
<!-- Список удаления записей-->
<div id="content">
@if(!empty($posts[0]->id))
<div class="row">
<div class="col-md-1 border sum">№</div>
<div class="col-md-2 border sum">Сумма, грн.:</div>
<div class="col-md-2 border sum">Сумма, $.:</div>
<div class="col-md-2 border sum">Дата:</div>
<div class="col-md-3 border sum">Описание:</div>
</div>
@foreach ($posts as $post)
<div class="row">
<div class="col-md-1 border">
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
<div class="col-md-3 border">
{{$post->detail}}
</div>
<div class="col-md-2">
	<a href="{{URL::to('/delete/'.$post->id)}}" class="btn btn-danger form-control">Удалить</a>
</div>
</div>
@endforeach
@else
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 sum">Нет записей для удаления</div>
</div>
@endif
</div>
<!-- Список удаления записей-->
</body>
</html>