@extends('layouts.panel')
@section('body')
<ul class="nav nav-tabs">
  <li class="active"><a aria-expanded="false" href="#tprofessor" data-toggle="tab">Importar Do TProfessor</a></li>
  <li class=""><a aria-expanded="false" href="#importEmails" data-toggle="tab">Importar Emails</a></li>
</ul>
<div id="myTabContent" class="tab-content">
	
  <div class="tab-pane fade active in" id="tprofessor">
	  
	<div class="col-md12">
		<div class="well">
			<center>
				<img src="{{ URL::to('packages/images/default/tprofessor.png') }}" alt="TProfessor" width="400" height="70">
				<br>
				<h4>Para importar os alunos e os modulos da aplicação TProfessor, exporte uma tabela para exel parecida com a seguinte, faça isso com todas as disciplinas de todas as turmas que deseja importar.</h4>
				<br>
				<img src="{{ URL::to('packages/images/default/tprofessortable.png') }}" alt="TProfessorTable">
				<br>
				<h4>De seguida selecione uma tabela de cada vez e clique em importar.</h4>
				<br>
				{{ Form::open(array('route' => 'importTP', 'class'=>'form-signin', 'files'=> true)) }}
				
					<div class="form-group">
						  <label for="emailtype" class="col-lg-2 control-label">Início do ano letivo</label>
						  <div class="col-lg-2">
							{{ Form::select('startYear', [date("Y")-1 => date("Y")-1, date("Y") => date("Y")], date("Y")-1, ['class' => 'form-control']) }}
						  </div>
					</div>
				
					{{Form::file('exel')}}<br>
					{{Form::submit('Importar', array('class'=>'btn btn-info'))}}
				{{ Form::close() }}
			</center>
		</div>
	</div>
	  
  </div>
	
<div class="tab-pane fade" id="importEmails">
	  
	<div class="col-md12">
		<div class="well">
			<center>
				<h4>Para importar corretamente a lista de emails copie todos os números de processos para a 1 coluna de um ficheiro vazio de exel, e de seguida copie todos os emails correspondentes para a seguinte coluna.<br><small>Lembrando que a primeira linha das duas colunas é a identificação da coluna, por isso essa primeira linha não vai ser importada.</small><br></h4>
				<br>
				<img src="{{ URL::to('packages/images/default/importEmails.png') }}" alt="emailsExemple">
				<br>
				<h4>Siga o exemplo da imagem</h4>
				<br>
				{{ Form::open(array('route' => 'importEmails', 'class'=>'form-signin', 'files'=> true)) }}
					{{Form::file('exel')}}<br>
					{{Form::submit('Importar', array('class'=>'btn btn-info'))}}
				{{ Form::close() }}
			</center>
		</div>
	</div>
	  
  </div>
</div>
@stop