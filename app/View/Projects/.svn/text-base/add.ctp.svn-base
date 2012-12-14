<div class="grid_12">
    <h1>Formulário para submissão de projetos</h1>
</div>
<?php echo $this->Form->create('Project', array('type' => 'file', 'id' => 'projectForm')); ?>
<fieldset>
    <div class="grid_8 prefix_2 sufix_2 omega">
        <label class="alpha">Este projeto é proveniente da PUCRS?</label>
        <input id="radioprofessornao" type="radio" name="data[Project][professor]" value="0"> <label style="display:inline-block;" for="radioprofessornao" class="">Não</label>
        <input id="radioprofessorsim"type="radio" name="data[Project][professor]" value="1" checked> <label style="display:inline-block;" for="radioprofessorsim" >Sim</label>
        <div id="campos-professor">
            <?php
            echo $this->Form->input('teacher_name_coparticipant', array('div' => array(
                    'class' => 'grid_7 sufix_5 required'
                ), 'class' => 'fill', 'label' => array('text' => 'Nome do professor/pesquisador responsável')));
            ?>
        </div>
        <hr />
    </div>

    <!-- COMITE DE ETICA -->
    <div class="grid_8 prefix_2 sufix_2 omega">
        <label class="alpha">Este projeto tem a aprovação de um comite de ética?</label>
        <input id="radiocomitenao" type="radio" name="data[Project][comite]" value="0" checked> <label style="display:inline-block;" for="radiocomitenao" class="">Não</label>
        <input id="radiocomitesim"type="radio" name="data[Project][comite]" value="1"> <label style="display:inline-block;" for="radiocomitesim" >Sim</label>
        <div id="campos-comite">
            <?php
            echo $this->Form->input('ethics_committee_name', array('div' => array(
                    'class' => 'grid_4 required'
                ), 'class' => 'fill', 'label' => array('text' => 'Instituição')));

            echo $this->Form->input('ethics_committee_protocol', array('div' => array(
                    'class' => 'grid_3 required'
                ), 'class' => 'fill', 'label' => 'Protocolo'));
            ?>
        </div>
        <hr />
    </div>

    <!-- PERÍODO -->
    <div class="grid_8 prefix_2 sufix_2 omega">
        <label class="alpha">Cronograma previsto</label>
        <?php
        echo $this->Form->input('start_date', array('div' => array(
                'class' => 'grid_3 required'
            ), 'label' => 'Data de Início', 'class' => 'datepicker fill', 'type' => 'text'));

        echo $this->Form->input('end_date', array('div' => array(
                'class' => 'grid_3 required'
            ), 'label' => 'Data Final', 'class' => 'datepicker', 'type' => 'text'));
        ?>
    </div>

    <!-- RECURSOS FINANCEIROS -->
    <div class="grid_8 prefix_2 sufix_2">
        <label class="alpha">Este projeto conta com apoio financeiro?</label>
        <div class="field_holder">
            <input type="radio" name="data[Project][recursosfinanceirosradio]" id="recursosfinanceirosnao" value="0" checked> <label style="display:inline-block;" for="recursosfinanceirosnao" class="">Não</label>
            <input type="radio" name="data[Project][recursosfinanceirosradio]" id="recursosfinanceirossim" value="1" > <label style="display:inline-block;" for="recursosfinanceirossim" class="">Sim</label>
            <table id="tabela-recursos-financeiros"></table>
            <a id="adicionarrecursofinanceiro" class="btn-adicionar float_right"  href="#" >Adicionar</a>
        </div>
    </div>

    <!-- EQUITE TECNICA -->
    <div class="grid_8 prefix_2 sufix_2">
        <label class="alpha">Equipe técnica</label>
        <div class="field_holder">
            <input type="radio" name="data[Project][equipetecnicaradio]" id="equipetecnicanao" value="0" checked> <label style="display:inline-block;" for="equipetecnicanao" class="">Não</label>
            <input type="radio" name="data[Project][equipetecnicaradio]" id="equipetecnicasim" value="1" > <label style="display:inline-block;" for="equipetecnicasim" class="">Sim</label>
            <table id="tabela-equipe-tecnica"></table>
            <a id="adicionarequitetecnica" class="btn-adicionar float_right"  href="#" >Adicionar</a>
        </div>
    </div>

    <!-- TREINAMENTO DO PESQUISADOR -->
    <div class="grid_8 prefix_2 sufix_2">
        <label class="alpha">Para que este projeto ocorra, você necessita de algum tipo de treinamento?</label>
        <div class="field_holder">
            <input type="radio" name="data[Project][trainingradio]" id="trainingnao" value="0" checked> <label style="display:inline-block;" for="trainingnao" class="">Não</label>
            <input type="radio" name="data[Project][trainingradio]" id="trainingsim" value="1" > <label style="display:inline-block;" for="trainingsim" class="">Sim</label>
            <table id="tabela-treinamentos"></table>
            <a id="adicionartreinamento" class="btn-adicionar float_right"  href="#" >Adicionar</a>
        </div>
    </div>

    <!-- RECURSOS INSCER -->
    <div class="grid_8 prefix_2 sufix_2">
        <label class="alpha">Recursos do InsCer</label>
        <div class="field_holder">
            <input type="radio" name="data[Project][recursosinscerradio]" id="recursosinscernao" value="0" checked> <label style="display:inline-block;" for="recursosinscernao" class="">Não</label>
            <input type="radio" name="data[Project][recursosinscerradio]" id="recursosinscersim" value="1" > <label style="display:inline-block;" for="recursosinscersim" class="">Sim</label>
            <table id="tabela-recursos-inscer"></table>
            <a id="adicionarrecursoinscer" class="btn-adicionar float_right" href="#" >Adicionar</a>
        </div>
    </div>

    <?php
    echo $this->Form->input('executive_summary', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2'
        ), 'class' => 'fill', 'type' => 'prop', 'placeholder' => 'Expressa uma síntese do que será apresentado na sequência.', 'rows' => 8, 'label' => 'Sumário Executivo'));

    echo $this->Form->input('justification', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => 'Justificativa', 'placeholder' => 'Exalta a importância do tema a ser estudado.'));

    echo $this->Form->input('methodology', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => 'Metodologia', 'placeholder' => 'Explicação minuciosa, detalhada, rigorosa e exata de toda ação desenvolvida no método (caminho) do trabalho de pesquisa.'));

    echo $this->Form->input('expected_results', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => 'Resultados Esperados', 'placeholder' => 'Forma concreta em que se espera alcançar os objetivos específicos “Quais os impactos prováveis do projeto?”'));

    echo $this->Form->input('goals', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => 'Metas', 'placeholder' => 'Resultados sucessivos a obter na programação de um trabalho.'));

    echo $this->Form->input('specification', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => 'Especificação', 'placeholder' => 'Determinar a área de execução da pesquisa.'));

    echo $this->Form->input('execution_plan', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => 'Plano de Execução', 'placeholder' => 'Descreve, organiza e estrutura como as disciplinas serão executadas na fase executiva do projeto.'));

    echo $this->Form->input('objectives', array('div' => array(
            'class' => 'grid_8 prefix_2 sufix_2 required'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'placeholder' => "Objetivos gerais e específicos.", 'label' => 'Objetivos'));

    echo $this->Form->input('file', array('type' => 'file', 'div' => array(
            'class' => 'grid_8 prefix_2 sufix_2'
        ), 'class' => 'fill', 'label' => array('text' => 'Caso desejar, é possível enviar seu projeto.', 'class' => 'norequire')));

    echo $this->Form->hidden('proposal_id', array('value' => $proposalId));
    echo $this->Form->hidden('project_status_id', array('value' => 1));
    echo $this->Form->input('Project.file_dir', array('type' => 'hidden'));
    ?>
</fieldset>

<div class="grid_3 prefix_8 sufix_2 bottom20">
    <?php
    $options = array(
        'label' => 'ENVIAR',
        'class' => 'aplha grid_2 fill omega',
    );
    ?>
    <?php echo $this->Form->end($options); ?>
</div>
<script>

    $(document).ready(function(){
        
        //QUANDO O FORM FOR SUBMETIDO, ESSA FUNCAO VARRE OS CAMPOS A PROCURA DE ERROS E OS VALIDA     
        $("#projectForm").click(function(){
            $("input.rec_institution").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe a instituição"
                    }
                } );			
            });
        
            $("input.req_value").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe o valor"
                    }
                } );			
            });
        
            $("input.inscer_res_name").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe o recurso desejado"
                    }
                } );			
            });
        
            $("input.tra_name").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Especifique o treinamento"
                    }
                } );			
            });
        
            $("input.team_name").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe o nome do integrante"
                    }
                } );			
            });
        
            $("input.team_function").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe a função"
                    }
                } );			
            });
        
            $("input.team_area").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe a área"
                    }
                } );			
            });
        
        
            $("input.team_institution").each(function(){
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Informe a instituição"
                    }
                } );			
            });
        });
        
       //MÉTODO PARA VALIDACAO DE DATA NO PADRAO PTBR
       jQuery.validator.addMethod("datebr", function(value, element) { 
            var regex = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/((19|20)\d\d)$/;
            return this.optional(element) || regex.test(value);
        }, "required datebr");

        
        $('#projectForm').validate({
            rules: {
                "data[Project][teacher_name_coparticipant]": "required",
                "data[Project][ethics_committee_protocol]": "required",
                "data[Project][ethics_committee_name]" : "required",
                "data[Project][start_date]": {datebr: "datebr",required: true},
                "data[Project][end_date]": {datebr: "datebr",required: true},
                "data[Project][justification]":"required",
                "data[Project][methodology]":"required",
                "data[Project][expected_results]":"required",
                "data[Project][goals]":"required",
                "data[Project][specification]":"required",
                "data[Project][execution_plan]":"required",
                "data[Project][objectives]": "required"
            },
            messages: {
                "data[Project][teacher_name_coparticipant]": "Informe o nome do professor/pesquisador responsável.",
                "data[Project][ethics_committee_name]": "Informe a instituição",
                "data[Project][ethics_committee_protocol]": "Informe o protocolo.",
                "data[Project][start_date]": "Selecione a data de início",
                "data[Project][end_date]": "Selecione a data final",
                "data[Project][justification]":"Preencha a justificativa",
                "data[Project][methodology]":"Preencha a metodologia",
                "data[Project][expected_results]":"Preencha os resultados esperados",
                "data[Project][goals]":"Preencha as metas",
                "data[Project][specification]":"Preencha a especificação",
                "data[Project][execution_plan]":"Preencha o plano de execução",
                "data[Project][objectives]": "Preencha os objetivos"
            },                    
            errorClass: "error-message",
            highlight: function(element) {
                $(element).removeClass("error-message");
            }
        });
        
        $( ".datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        //eventos de click para os radio buttons de comite
        $('#radiocomitenao').on('click', function(){
            $('#campos-comite').hide();
        });

        $('#radiocomitesim').on('click', function(){
            $('#campos-comite').show();
        });

        //------------- RECURSOS FINANCEIROS -------
        $('#recursosfinanceirosnao').on('click', function(){
            $('#tabela-recursos-financeiros').html('');
        });

        $('#recursosfinanceirossim').on('click', function(){
            var tableLength = $('#tabela-recursos-financeiros tr').length;
            if(!tableLength > 0)
                addElementsToFinancialResources('tabela-recursos-financeiros', tableLength);
        });

        $('#adicionarrecursofinanceiro').click( function(event){
            event.preventDefault();
            if($('#recursosfinanceirosnao').is(':checked')){
                $('#recursosfinanceirossim').prop('checked',':checked');
            }
            addElementsToFinancialResources('tabela-recursos-financeiros', $('#tabela-recursos-financeiros tr').length);
        });

        function addElementsToFinancialResources(tableid, contagemlinhas){
            var tabela =  "#" + tableid;
            $(tabela).append( $('<tr />').append(
            $("<td />", {
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[FinancialResource][" + contagemlinhas + "][institution]",
                    "class": "fill rec_institution",
                    "placeholder": "Recurso"
                }),
                "class":"grid_3"
            })
        ).append(
            $("<td />", {
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[FinancialResource][" + contagemlinhas + "][value]",
                    "class": "fill req_value",
                    "placeholder": "Valor",
                    blur : function(){
                        formatReal(jQuery(this));
                    }
                }),
                "class":"grid_3"
            })
        ).append(
            jQuery("<td />", {
                html: jQuery("<button />", {
                    "text": "X",
                    "class": "btn-remove",
                    click: function() { jQuery(this).closest("tr").remove();
                        if($('#tabela-recursos-financeiros tr').length === 0){
                            $('#recursosfinanceirosnao').prop('checked',':checked');
                        }
                    }
                }),
                "class" : "grid_1 omega"
            })
        ));
        }

        //-------- RECURSOS INSCER ---------

        $('#recursosinscernao').on('click', function(){
            $('#tabela-recursos-inscer').html('');
        });

        $('#recursosinscersim').on('click', function(){
            var tableLength = $('#tabela-recursos-inscer tr').length;
            if(!tableLength > 0)
                addElementsToInsCerResources('tabela-recursos-inscer', tableLength);
        });

        $('#adicionarrecursoinscer').click( function(event){
            event.preventDefault();
            if($('#recursosinscernao').is(':checked')){
                $('#recursosinscersim').prop('checked',':checked');
            }

            addElementsToInsCerResources('tabela-recursos-inscer', $('#tabela-recursos-inscer tr').length);
        });
        
        function addElementsToInsCerResources(tableid, contagemlinhas){
            var tabela =  "#" + tableid;
            $(tabela).append( $('<tr />').append(
            $("<td />", {
                "class":"grid_6",
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[InscerResource][" + contagemlinhas + "][resource_name]",
                    "class": "fill inscer_res_name",
                    "placeholder": "Recurso"
                })
            })
        ).append(
            jQuery("<td />", {
                "class": "grid_1 omega",
                html: jQuery("<button />", {
                    "text": "X",
                    "class": "btn-remove",
                    click: function() { jQuery(this).closest("tr").remove();
                        if($('#tabela-recursos-inscer tr').length === 0){
                            $('#recursosinscernao').prop('checked',':checked');
                        }
                    }
                })
            })
        ));
        }
        
        
        //-------- TREINAMENTOS DO PESQUISADOR ---------

        $('#trainingnao').on('click', function(){
            $('#tabela-treinamentos').html('');
        });

        $('#trainingsim').on('click', function(){
            var tableLength = $('#tabela-treinamentos tr').length;
            if(!tableLength > 0)
                addElementsToTraining('tabela-treinamentos', tableLength);
        });

        $('#adicionartreinamento').click( function(event){
            event.preventDefault();
            if($('#trainingnao').is(':checked')){
                $('#trainingsim').prop('checked',':checked');
            }

            addElementsToTraining('tabela-treinamentos', $('#tabela-treinamentos tr').length);
        });
        
        function addElementsToTraining(tableid, contagemlinhas){
            var tabela =  "#" + tableid;
            $(tabela).append( $('<tr />').append(
            $("<td />", {
                "class":"grid_6",
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[ResearchersTraining][" + contagemlinhas + "][training_name]",
                    "class": "fill tra_name",
                    "placeholder": "Treinamento"
                })
            })
        ).append(
            jQuery("<td />", {
                "class": "grid_1 omega",
                html: jQuery("<button />", {
                    "text": "X",
                    "class": "btn-remove",
                    click: function() { jQuery(this).closest("tr").remove();
                        if($('#tabela-treinamentos tr').length === 0){
                            $('#trainingnao').prop('checked',':checked');
                        }
                    }
                })
            })
        ));
        }
        
        //------------- TIME TECNICO -------
        $('#equipetecnicanao').on('click', function(){
            $('#tabela-equipe-tecnica').html('');
        });

        $('#equipetecnicasim').on('click', function(){
            var tableLength = $('#tabela-equipe-tecnica tr').length;
            if(!tableLength > 0)
                addElementsToTechnicalTeam('tabela-equipe-tecnica', tableLength);
        });

        $('#adicionarequitetecnica').click( function(event){
            event.preventDefault();
            if($('#equipetecnicanao').is(':checked')){
                $('#equipetecnicasim').prop('checked',':checked');
            }
            addElementsToTechnicalTeam('tabela-equipe-tecnica', $('#tabela-equipe-tecnica tr').length);
        });

        function addElementsToTechnicalTeam(tableid, contagemlinhas){
            var tabela =  "#" + tableid;
            $(tabela).append( $('<tr />').append(
            $("<td />", {
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[TechnicalTeam][" + contagemlinhas + "][participant_name]",
                    "class": "fill team_name",
                    "placeholder": "Nome"
                }),
                "class":"grid_3"
            })
        ).append(
            $("<td />", {
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[TechnicalTeam][" + contagemlinhas + "][participant_function]",
                    "class": "fill team_function",
                    "placeholder": "Função"
                }),
                "class":"grid_3"
            })
        ).append(
            $("<td />", {
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[TechnicalTeam][" + contagemlinhas + "][participant_area]",
                    "class": "fill team_area",
                    "placeholder": "Área"
                }),
                "class":"grid_3"
            })
        ).append(
            $("<td />", {
                "html": $("<input />", {
                    "type": "text",
                    "name": "data[TechnicalTeam][" + contagemlinhas + "][participant_institution]",
                    "class": "fill team_institution",
                    "placeholder": "Instituto"
                }),
                "class":"grid_3"
            })
        ).append(
            jQuery("<td />", {
                html: jQuery("<button />", {
                    "text": "X",
                    "class": "btn-remove",
                    click: function() { jQuery(this).closest("tr").remove();
                        if($('#tabela-equipe-tecnica tr').length === 0){
                            $('#equipetecnicanao').prop('checked',':checked');
                        }
                    }
                }),
                "class" : "grid_1 omega"
            })
        ));
        }

        function formatReal(field)  
        {  
            var tmp = field.val()+'';
            tmp = tmp.replace(',','');
            tmp = tmp.replace('.','');
            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");  
            if( tmp.length > 6 )  
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");  
            field.val(tmp);  
        }  
        
        $('#radioprofessornao').on('click', function(){
            $('#campos-professor').show();
        });

        $('#radioprofessorsim').on('click', function(){
            $('#campos-professor').hide();
        });
        
        if(!Modernizr.input.placeholder){
            Placeholder.init();
        }
    });		
</script>