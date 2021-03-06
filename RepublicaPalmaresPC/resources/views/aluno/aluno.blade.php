@extends('layouthome')

@section('link')
    <link rel="stylesheet" href="<?php echo asset('css/plugins/dataTables/datatables.min.css')?>">
    <link href="<?php echo asset('css/plugins/switchery/switchery.css')?>" rel="stylesheet">
    <link href="<?php echo asset('css/plugins/clockpicker/clockpicker.css') ?>" rel="stylesheet">
    <link href="<?php echo asset('css/plugins/chosen/chosen.css')?>" rel="stylesheet">
@endsection

@section('conteudo')
    <div class="wrapper wrapper-content animated fadeInRight"> 
                    
        <div class="row m-b-lg">
            
            <div class="ibox-content panel-body">
                    
                <div class="col-sm-12 m-b-lg">
                    <h2 class="text-uppercase text-center">
                        Cadastrar Aluno
                    </h2>
                </div>

                <div class="p-sm">
                <div class="row">
                        
                        <form action="cadastraraluno" method="POST" id="cadastrar_Aluno">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modalidade_aluno" class="label-control">Modalidade</label>
                                    <select data-placeholder="Selecione a modalidade..." id="modalidade_aluno" name="modalidade_aluno" class="chosen-select form-control"  tabindex="1">
                                        @foreach ($modalidades as $modalidade)
                                            <option value="{{ $modalidade->id }}">{{ $modalidade->modalidade }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="curso_aluno" class="label-control">Curso</label>
                                    <select data-placeholder="Selecione o curso..." id="curso_aluno" name="curso_aluno" class="chosen-select form-control"  tabindex="1">
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->modalidade_id }}">{{ $curso->nome }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="doc_Aluno" class="label-control">CPF/ CNPJ</label>
                                    <select data-placeholder="Selecione o documento..." id="doc_Aluno" name="doc_Aluno" class="chosen-select form-control"  tabindex="1">
                                        <option value="">Selecione..</option>
                                        @foreach ($pessoas as $pessoa)
                                            <option value="{{ $pessoa->id }}">{{ $pessoa->cpf }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>
                            
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="nome_Aluno" class="label-control">Aluno</label>
                                    <select data-placeholder="Selecione o aluno..." id="nome_Aluno" name="nome_Aluno" class="chosen-select form-control"  tabindex="1">
                                        <option value="">Selecione..</option>
                                        @foreach ($pessoas as $pessoa)
                                        <option id="{{ $pessoa->id }}" value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="graduacao_aluno" class="label-control">Graduação</label>
                                    <select data-placeholder="Selecione a modalidade..." id="graduacao_aluno" name="graduacao_aluno" class="chosen-select form-control"  tabindex="1">
                                        <option value="">Selecione..</option>
                                        @foreach ($graduacoes as $graduacao)
                                            <option value="{{ $graduacao->id }}">{{ $graduacao->nome }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" id="data_1">
                                    <label for="data_matricula" class="label-control">Data de Matricula</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span> 
                                        <input type="text" id="data_matricula" class="form-control" value="03/09/2019">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="label-control" for="responsavel_aluno">Nome responsável (opcional)</label>
                                    <input name="responsavel_aluno" class="form-control" id="responsavel_aluno" placeholder="Nome responsável"></textarea> 
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center m-b-md m-t-sm">
                                    <button id="cancelar_modalidade" class="btn btn-warning text-uppercase" type="reset" value="Cancelar">Cancelar</button>

                                    <button class="btn  btn-primary text-uppercase" type="submit" value="Adicionar">Salvar</button>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>                    
        </div>
    </div>    
@endsection

@section('scripts')
    <script src="<?php echo asset('js/plugins/switchery/switchery.js')?>"></script>
    <script src="<?php echo asset('js/plugins/datapicker/bootstrap-datepicker.js')?>"></script>
    <!-- Chosen -->
    <script src="<?php echo asset('js/plugins/chosen/chosen.jquery.js')?>"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo asset('js/plugins/validate/jquery.validate.min.js')?>"></script>
    <script src="<?php echo asset('js/plugins/jqmask/jquery_mask.js')?>"></script>
    <script src="<?php echo asset('js/pages/validator.js')?>"></script>  
@endsection

@section('scriptUnico')
    <script>
        $(document).ready(function(){
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:30},
                '.chosen-select-no-results': {no_results_text:'Não encontrado'},
                '.chosen-select-width'     : {width:"100%"},
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        })

        // function mudarCurso(){
        //     var idModalidade = $("#modalidade_aluno").val();
        //     $("#curso_aluno option[value=" + idModalidade + "]").hide();
        //     var el = $('.chosen-single span').text();
        //     console.log(el);
        // }
    </script>    
@endsection