@extends('layouts.panel')
@section('body')
	<div class="col-md12">
		<div class="well">
			{{ Form::open(array('route' => 'saveSettings', 'class'=>'form-horizontal')) }}
			  <fieldset>
				<legend>Opções</legend>
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#general" data-toggle="tab">Gerais</a></li>
					  <li><a href="#email" data-toggle="tab">Email</a></li>
					  <li><a href="#api" data-toggle="tab">API</a></li>
					</ul>
					<div id="optionstas" class="tab-content">
					  <div class="tab-pane fade active in" id="general"><br>
						  
						<div class="form-group">
						  <label for="siteName" class="col-lg-2 control-label">Nome Do site</label>
						  <div class="col-lg-4">
							{{ Form::text('siteName', settings::get("siteName"), array('class' => 'form-control', 'autofocus' => 'autofocus', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="shortSiteName" class="col-lg-2 control-label">Abreviatura Do Nome</label>
						  <div class="col-lg-4">
							{{ Form::text('shortSiteName', settings::get("shortSiteName"), array('class' => 'form-control', 'maxlength' => '20', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="adminEmail" class="col-lg-2 control-label">Email Do Admin</label>
						  <div class="col-lg-4">
							  {{ Form::email('adminEmail', settings::get("adminEmail"), array('class' => 'form-control', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="captchaStatus" class="col-lg-2 control-label">Captcha</label>
						  <div class="col-lg-10">
							<div class="checkbox">
							  <label>
								@if(settings::get("captchaStatus")==1)
								{{ Form::checkbox('captchaStatus', 1, true) }}
								@else
								{{ Form::checkbox('captchaStatus', 1, false) }}
								@endif
							  </label>
							</div>
						  </div>
						</div>
						<div class="form-group">
						  <label for="generatePassOnImport" class="col-lg-2 control-label">Gerar Password Ao Importar Utilizadores</label>
						  <div class="col-lg-10">
							<div class="checkbox">
							  <label>
								@if(settings::get("generatePassOnImport")==1)
								{{ Form::checkbox('generatePassOnImport', 1, true) }}
								@else
								{{ Form::checkbox('generatePassOnImport', 1, false) }}
								@endif
							  </label>
							</div>
						  </div>
						</div>
						  
					  </div>
					  <div class="tab-pane fade" id="email"><br>
						  
						<div class="form-group">
						  <label for="emailtype" class="col-lg-2 control-label">Tipo De Email</label>
						  <div class="col-lg-2">
							@if(settings::get("emailtype")==1)
							  {{ Form::select('emailtype', ['1' => 'SMTP', '2' => 'PHP Mail'], 1, ['class' => 'form-control']) }}
							@else
							  {{ Form::select('emailtype', ['1' => 'SMTP', '2' => 'PHP Mail'], 2, ['class' => 'form-control']) }}
							@endif
						  </div>
						</div>
						<div class="form-group">
						  <label for="smtpHostname" class="col-lg-2 control-label">SMTP hostname</label>
						  <div class="col-lg-4">
							{{ Form::text('smtpHostname', settings::get("smtpHostname"), array('class' => 'form-control', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="smtpPort" class="col-lg-2 control-label">SMTP port</label>
						  <div class="col-lg-2">
							{{ Form::number('smtpPort', settings::get("smtpPort"), array('class' => 'form-control', 'maxlength' => '5', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="smtpUsername" class="col-lg-2 control-label">SMTP username</label>
						  <div class="col-lg-4">
							{{ Form::text('smtpUsername', settings::get("smtpUsername"), array('class' => 'form-control', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="smtpPassword" class="col-lg-2 control-label">SMTP password</label>
						  <div class="col-lg-4">
							{{ Form::text('smtpPassword', settings::get("smtpPassword"), array('class' => 'form-control', 'required' => 'required')) }}
						  </div>
						</div>
						<div class="form-group">
						  <label for="encryptType" class="col-lg-2 control-label">SMTP Encriptação</label>
						  <div class="col-lg-3">
							@if(settings::get("encryptType")==1)
							  {{ Form::select('encryptType', ['0' => 'Sem Encriptação', '1' => 'Encriptação SSL', '2' => 'Encriptação TLS'], 1, ['class' => 'form-control']) }}
						 	@elseif(settings::get("encryptType")==2)
							  {{ Form::select('encryptType', ['0' => 'Sem Encriptação', '1' => 'Encriptação SSL', '2' => 'Encriptação TLS'], 2, ['class' => 'form-control']) }}
						 	@else
							  {{ Form::select('encryptType', ['0' => 'Sem Encriptação', '1' => 'Encriptação SSL', '2' => 'Encriptação TLS'], 0, ['class' => 'form-control']) }}
							@endif
							</select>
						  </div>
						</div>
						  
					  </div>
					  <div class="tab-pane fade" id="api"><br>
						  
						<div class="form-group">
						  <label for="apiStatus" class="col-lg-2 control-label">API</label>
						  <div class="col-lg-10">
							<div class="checkbox">
							  <label>
								@if(settings::get("apiStatus")==1)
								{{ Form::checkbox('apiStatus', 1, true) }}
								@else
								{{ Form::checkbox('apiStatus', 1, false) }}
								@endif
							  </label>
							</div>
						  </div>
						</div>
						<div class="form-group">
						  <label for="token" class="col-lg-2 control-label">Token</label>
						  <div class="col-lg-4">
							<input class="form-control" id="securityToken" value="{{settings::get("securityToken")}}" type="text" readonly>
						  </div>
						</div>
						<div class="form-group">
						  <div class="col-lg-10 col-lg-offset-2">
							  <button type="button" class="btn btn-warning" onclick="genToken()">Gerar Novo Token</button> 
						  </div>
						</div>
						  
					  </div>
					</div>

				<hr>
				<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					{{Form::submit('Guardar', array('class'=>'btn btn-success'))}}
				  </div>
				</div>
			  </fieldset>
			{{ Form::close() }}
		</div>
	</div>


<!-- Script do evento -->
<script>
function genToken() {
swal({
          title: "Tens a certeza?",
          text: "Vai gerar um novo Token, O Token antigo será invalido.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Sim",
          closeOnConfirm: false
        },
        function(){
          var url = document.URL + '/gen';
          window.location.href = url; 
        });
};
</script>
@stop