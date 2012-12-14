<script>
    // ADAPTIVE.JS
    
    var ADAPT_CONFIG = {
        path: '../../css/grid/',

        dynamic: true,
        
        range: [
            '980px  to 1280px = 960.min.css',
            '1280px to 1600px = 1200.min.css',
            '1600px to 1940px = 1560.min.css',
            '1940px to 2540px = 1920.min.css',
            '2540px           = 2520.min.css'
        ]
    };
</script>
<?php echo $this->Form->create(null, array('controller' => 'projects', 'action' => 'evaluate')); ?>
<div class="grid_7 omega">
    <h3>Projeto: <?php echo $projeto['Proposal']['description']; ?></h3>

    <h3>Sumário Executivo</h3>
    <?php echo $projeto['Project']['executive_summary']; ?>

    <h3>Objetivos</h3>
    <?php echo $projeto['Project']['objectives']; ?>

    <h3>Justificativa</h3>
    <?php echo $projeto['Project']['justification']; ?>

    <h3>Metodologia</h3>
    <?php echo $projeto['Project']['methodology']; ?>

    <h3>Resultados Esperados</h3>
    <?php echo $projeto['Project']['expected_results']; ?>

    <h3>Metas</h3>
    <?php echo $projeto['Project']['goals']; ?>
    <h3>Cronograma Macro</h3>
    <div class="grid_3">
        De: <?php echo $projeto['Project']['start_date']; ?>
    </div> 
    <div class="grid_3">
        Até: <?php echo $projeto['Project']['end_date']; ?>
    </div> 
    <h3>Especificações</h3>
    <?php echo $projeto['Project']['specification']; ?>
    <h3>Plano de execução</h3>
    <?php echo $projeto['Project']['execution_plan']; ?>
    <div class="bottom20">

        <?php if (!empty($projeto['InscerResource'])): ?>
            <h3>Recursos requeridos ao InsCer</h3>
            <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
                <tr>
                    <th><?php echo __('Recurso'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($projeto['InscerResource'] as $inscerResource):
                    ?>
                    <tr>
                        <td><?php echo $inscerResource['resource_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="bottom20">
        <?php if (!empty($projeto['ResearchersTraining'])): ?>
            <h3>Treinamentos necessários</h3>
            <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
                <tr>
                    <th><?php echo __('Treinamento'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($projeto['ResearchersTraining'] as $researchersTraining):
                    ?>
                    <tr>
                        <td><?php echo $researchersTraining['taining_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="bottom20">
        <?php if (!empty($projeto['TechnicalTeam'])): ?>
            <h3>Time técnico</h3>
            <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
                <tr>
                    <th><?php echo __('Nome'); ?></th>
                    <th><?php echo __('Função'); ?></th>
                    <th><?php echo __('Área'); ?></th>
                    <th><?php echo __('Instituição'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($projeto['TechnicalTeam'] as $technicalTeam):
                    ?>
                    <tr>
                        <td><?php echo $technicalTeam['participant_name']; ?></td>
                        <td><?php echo $technicalTeam['participant_function']; ?></td>
                        <td><?php echo $technicalTeam['participant_area']; ?></td>
                        <td><?php echo $technicalTeam['participant_institution']; ?></td>
                    <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</div><!-- dados do projeto -->



<div class="grid_5 omega">
    <div id="slider">
        <table>
        <?php
        foreach ($criterios as $criterio) {
            echo '<tr><td>';
            echo "<h4> " . $criterio['EvaluationCriterium']['description'] . "</h4>";
            echo '<input name="data[ProjectsCommiteeMemberEvaluation][MembersScoresByCriterium][' . $criterio['EvaluationCriterium']['id'] . '][score]" type="text" class="amount" value="0" readonly>';
            echo '<div class="grid_5 bottom20 alpha divslider"></div>';
            echo '<input type="hidden" name="data[ProjectsCommiteeMemberEvaluation][MembersScoresByCriterium][' . $criterio['EvaluationCriterium']['id'] . '][evaluation_criterion_id]" value="'.$criterio['EvaluationCriterium']['id'].'">';
            echo '</td></tr>';
        }
        ?>
       </table>
    </div>
    <?php
         echo $this->Form->input('ProjectsCommiteeMemberEvaluation.text_evaluation', array('div' => array(
            'class' => 'omega'
        ), 'class' => 'fill', 'type' => 'prop', 'rows' => 8, 'label' => array('text' => 'Comentários sobre o projeto','class' => 'required')));
         
       echo $this->Form->hidden('ProjectsCommiteeMemberEvaluation.project_id',array('value' => $projeto['Project']['id']));
       echo $this->Form->hidden('ProjectsCommiteeMemberEvaluation.user_id',array('value' => $uid));
    ?>
    <div class="">
        <?php
        $options = array(
            'label' => 'ENVIAR',
            'class' => 'aplha grid_5 omega alpha',
        );
        ?>
        <?php echo $this->Form->end($options); ?>
    </div>
</div><!-- criterios de avaliacao -->



<?php echo $this->Html->script('adapt.min'); ?>
<script>
     ////JQUERY UI SLIDER
    $( "div.divslider" ).each(function() {
        $( this ).slider({
            value:0,
            min: 0,
            max: 10,
            step: 1,
            slide: function( event, ui ) {
                jQuery(this).siblings("input:first").val(ui.value);
            }
        });
    });
    
     $("#ProjectEvaluateForm").click(function(){
            $("input.amount").each(function(){
                $(this).rules("add", {
                    required: true,
                    min: 1,
                    messages: {
                        min: "Este requisito deve ser avaliado"
                    }
                });			
            });
        });
    
    $('#ProjectEvaluateForm').validate({
            rules: {
                "data[ProjectsCommiteeMemberEvaluation][text_evaluation]": "required"
            },
            messages: {
                "data[ProjectsCommiteeMemberEvaluation][text_evaluation]": "Por favor, comente sobre este projeto."
            },                    
            errorClass: "error-message",
            highlight: function(element) {
                $(element).removeClass("error-message");
            }
        });
    
    
   
</script>