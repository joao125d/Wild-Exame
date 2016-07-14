@extends('layouts.panel')
@section('body')

	<div class="col-md-12">
		<div class="well">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#add" data-toggle="tab">Adicionar</a></li>
					  <li><a href="#list" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="dates" class="tab-content">
					  <div class="tab-pane fade" id="list"><br>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Dia</th>
                                            <th>Mês</th>
                                            <th>Ano</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$dates = especialDates::getList();
if(count($dates)){

	foreach(especialDates::getList() as $date){
		echo "<tr>";
		echo "<td>" . $date->ed_name . "</td>";
		echo "<td>" . $date->ed_day . "</td>";
		echo "<td>" . $date->ed_month . "</td>";
		echo "<td>" . $date->ed_year . "</td>";
		echo "<td> <button type=\"button\" class=\"btn pull-right btn-danger\" onclick=\"closeTicket".$date->ed_id."()\">Remover</button> </td>";
		echo "</tr>";
		echo "<!-- Script do evento -->
			<script>
			function closeTicket".$date->ed_id."() {
			swal({
					  title: \"Tens a certeza?\",
					  text: \"A Data Será Removida.\",
					  type: \"warning\",
					  showCancelButton: true,
					  confirmButtonColor: \"#DD6B55\",
					  confirmButtonText: \"Sim, Remova A data!\",
					  closeOnConfirm: false
					},
					function(){
					  var url = \"/admin/remove?id=".$date->ed_id."\";
					  window.location.href = url; 
					});
			};
			</script>";
	}
}

?>
                                    </tbody>
                                </table>
						  
<?php
if(!count($dates)){
	echo "<center><h4>Não existe nenhuma data especial guardada.</h4></center>";
}

$disciplines = DB::table('disciplines')->get();

if(isset($_GET["discipline"])){
	$discipline = DB::table('disciplines')->where('d_id', '=', $_GET["discipline"])->first();
	
	$discipline_name = $discipline->d_name;
	$modules = DB::table('modules')->where('m_id', '=', $_GET["discipline"])->get();
} else {
	$discipline_name = "Selecionar";
}

?>
						  
					  </div>
						
					  <div class="tab-pane fade active in" id="add"><br>

			{{ Form::open(array('route' => 'addEspecialDate', 'class'=>'form-horizontal')) }}
			  <fieldset>

						<div class="form-group">
						  <label for="name" class="col-lg-2 control-label">Disciplina</label>
						  <div class="col-lg-4">
<?php


$start = '<div class="dropdown pull-left">
    <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">'.$discipline_name.'
    <i class="fa fa-caret-down"></i></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
    
foreach($disciplines as $disc){
	$start = $start . '<li role="presentation"><a role="menuitem" tabindex="-1" href="'.URL::to('/exams?discipline='.$disc->d_id) .'">'. $disc->d_name .'</a></li>';
}

$start = $start . '</ul>
  </div>';

echo $start;
?>
						  </div>
						</div>
				  		
						<div class="form-group">
						  <label for="name" class="col-lg-2 control-label">Módulo</label>
						  <div class="col-lg-4">
				  
<?php
if(isset($_GET["discipline"])){
	$modules = DB::table('modules')->where('m_id', '=', $_GET["discipline"])->get();
	
	$start = '<div class="dropdown pull-left">
	    <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Selecionar
	    <i class="fa fa-caret-down"></i></button>
	    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
	    
	foreach($modules as $modu){
		$start = $start . '<li role="presentation"><a role="menuitem" tabindex="-1" href="'.URL::to('/exams?discipline='.$_GET["discipline"].'&module='.$modu->m_id) .'">'. $modu->m_name .'</a></li>';
	}
	
	$start = $start . '</ul>
	  </div>';
	
	echo $start;
}
?>

						  </div>
						</div>
<?php

$hours = array(-1 => "Hora(s)", 0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23);
$minutes = array(-1 => "Minuto(s)", 0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24, 25 => 25, 26 => 26, 27 => 27, 28 => 28, 29 => 29, 30 => 30, 31 => 31, 32 => 32, 33 => 33, 34 => 34, 35 => 35, 36 => 36, 37 => 37, 38 => 38, 39 => 39, 40 => 40, 41 => 41, 42 => 42, 43 => 43, 44 => 44, 45 => 45, 46 => 46, 47 => 47, 48 => 48, 49 => 49, 50 => 50, 51 => 51, 52 => 52, 53 => 53, 54 => 54, 55 => 55, 56 => 56, 57 => 57, 58 => 58, 59 => 59);
$days = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, 11 => 11, 12 => 12, 13 => 13, 14 => 14, 15 => 15, 16 => 16, 17 => 17, 18 => 18, 19 => 19, 20 => 20, 21 => 21, 22 => 22, 23 => 23, 24 => 24, 25 => 25, 26 => 26, 27 => 27, 28 => 28, 29 => 29, 30 => 30, 31 => 31);
$months = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
$currentYear = calendar::getYear();
$nextYear = $currentYear + 1;
$years = array($currentYear => $currentYear, $nextYear => $nextYear);
?>

						<div class="form-group">
						  <label for="name" class="col-lg-2 control-label">Data</label>
							{{ Form::select('day', $days, null, ['class' => 'form-control', 'style' => 'width: 70px; float: left;']) }}
							{{ Form::select('month', $months, null, ['class' => 'form-control', 'style' => 'width: 112px; float: left;']) }}
							{{ Form::select('year', $years, null, ['class' => 'form-control', 'style' => 'width: 100px; float: left;']) }}						 
						</div>
						
						<div class="form-group">
						  <label for="name" class="col-lg-2 control-label">Hora</label>
							{{ Form::select('hour', $hours, null, ['class' => 'form-control', 'style' => 'width: 90px; float: left;']) }}
							{{ Form::select('minutes', $minutes, null, ['class' => 'form-control', 'style' => 'width: 103px; float: left;']) }}					
						</div>
				  
				  <hr>
				  
				<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					{{Form::submit('Adicionar', array('class'=>'btn btn-warning'))}}
				  </div>
				</div>
			  </fieldset>
			{{ Form::close() }}
						
					  </div>
						
				</div>
		</div>
	</div>
	 
@stop