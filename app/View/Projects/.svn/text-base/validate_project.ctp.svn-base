<div class="grid_12">
    <h1>Validar aprovação do projeto</h1>
</div>
<dl>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Nome do projeto'); ?></dt>
        <dd>
            <h4><?php echo $project['Proposal']['description']; ?></h4>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <?php echo __('<b>Parecer dos avaliadores da comissão</b>'); ?>
        <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
            <tr>
                <th>Avaliador</th>
                <th>Nota final</th>
                <th>Parecer</th>
            </tr>
            <?php foreach ($projectEvaluations as $evaluation) { ?>
                <tr>
                    <td><?php echo $evaluation['User']['name'] . ' ' . $evaluation['User']['surname'] ;?></td>
                    <td><?php echo $this->Number->precision($evaluation['ProjectsCommiteeMemberEvaluation']['evaluation_final_score'], 2); ?></td>
                    <td><a href="#" id="parecer<?php echo $evaluation['ProjectsCommiteeMemberEvaluation']['id'] ?>">Parecer</a></td>
                </tr>
            <?php } ?>
            <tfoot>
                <td>Média final</td>
                <td><?php echo $this->Number->precision($project['Project']['final_score'], 2); ?></td>
                <td>&nbsp;</td>
            </tfoot>
        </table>
        <?php foreach ($projectEvaluations as $evaluation) { ?>
        <div class="popmod" style="margin: 0; border: 0px solod black;" id="<?php echo $evaluation['ProjectsCommiteeMemberEvaluation']['id'] ?>" title="Avaliação">
            <p>Por: <?php echo $evaluation['User']['name'] . ' ' . $evaluation['User']['surname'] ;?></p>
            <p><?php echo $evaluation['ProjectsCommiteeMemberEvaluation']['text_evaluation'] ?></p>
        </div>
        <?php } ?>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Status do projeto'); ?></dt>
        <dd>
            <?php echo $project['ProjectStatus']['status_name']; ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Professor co-participante'); ?></dt>
        <dd>
            <?php echo h($project['Project']['teacher_name_coparticipant']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Objetivos'); ?></dt>
        <dd>
            <?php echo h($project['Project']['objectives']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Comitê de ética'); ?></dt>
        <dd>
            Instituição: <?php echo h($project['Project']['ethics_committee_name']); ?>
            &nbsp;
            Protocolo: <?php echo h($project['Project']['ethics_committee_protocol']); ?>
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Sumário executivo'); ?></dt>
        <dd>
            <?php echo h($project['Project']['executive_summary']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Justificativa'); ?></dt>
        <dd>
            <?php echo h($project['Project']['justification']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Metodologia'); ?></dt>
        <dd>
            <?php echo h($project['Project']['methodology']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Resultados esperados'); ?></dt>
        <dd>
            <?php echo h($project['Project']['expected_results']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Metas'); ?></dt>
        <dd>
            <?php echo h($project['Project']['goals']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Cronograma previsto'); ?></dt>
        <dd>
            Início: <?php echo $this->Time->format('d/m/Y', h($project['Project']['start_date'])); ?>
            &nbsp;
            Data Final: <?php echo $this->Time->format('d/m/Y', h($project['Project']['end_date'])); ?>
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Especificações'); ?></dt>
        <dd>
            <?php echo h($project['Project']['specification']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Plano de execução'); ?></dt>
        <dd>
            <?php echo h($project['Project']['execution_plan']); ?>
            &nbsp;
        </dd>
    </div>
    <div class="grid_10 prefix_1 suffix_1 bottom20">
        <dt><?php echo __('Data de submissão'); ?></dt>
        <dd>
            <?php echo $this->Time->format('d/m/Y', h($project['Project']['created'])); ?>
            &nbsp;
        </dd>
    </div>
</dl>

<div class="grid_10 prefix_1 suffix_1 bottom20">
    <?php echo __('<b>Recursos financeiros</b>'); ?>
    <?php if (!empty($project['FinancialResource'])): ?>
        <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
            <tr>
                <th><?php echo __('Instituição'); ?></th>
                <th><?php echo __('Valor'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($project['FinancialResource'] as $financialResource):
                ?>
                <tr>
                    <td><?php echo $financialResource['institution']; ?></td>
                    <td><?php echo $this->Number->currency($financialResource['value'], 'EUR', array('before' => 'R$ ')); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<div class="grid_10 prefix_1 suffix_1 bottom20">
    <?php echo __('<b>Recursos requeridos ao InsCer</b>'); ?>
    <?php if (!empty($project['InscerResource'])): ?>
        <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
            <tr>
                <th><?php echo __('Recurso'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($project['InscerResource'] as $inscerResource):
                ?>
                <tr>
                    <td><?php echo $inscerResource['resource_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<div class="grid_10 prefix_1 suffix_1 bottom20">
    <?php echo __('<b>Treinamentos necessários</b>'); ?>
    <?php if (!empty($project['ResearchersTraining'])): ?>
        <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
            <tr>
                <th><?php echo __('Treinamento'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($project['ResearchersTraining'] as $researchersTraining):
                ?>
                <tr>
                    <td><?php echo $researchersTraining['taining_name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<div class="grid_10 prefix_1 suffix_1 bottom20">
    <?php echo __('<b>Time técnico</b>'); ?>
    <?php if (!empty($project['TechnicalTeam'])): ?>
        <table class="fill" cellpadding = "0" cellspacing = "0" id="rounded-corner">
            <tr>
                <th><?php echo __('Nome'); ?></th>
                <th><?php echo __('Função'); ?></th>
                <th><?php echo __('Área'); ?></th>
                <th><?php echo __('Instituição'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($project['TechnicalTeam'] as $technicalTeam):
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

<div class="grid_10 prefix_1 suffix_1 bottom20">
    <?php echo __('<b>Arquivo</b>'); ?>
    
    <?php if($project['Project']['file'] != '')
       echo $this->Html->link('Download', $this->Html->webroot('../files'.DS.'project'.DS.'file'. DS . $project['Project']['file_dir'] . DS . $project['Project']['file'])); 
     ?>
</div>

<?php echo $this->Form->create('Projects', array('action' => 'portfolio_projects')); ?>
<div class="grid_10 prefix_1">
    <?php
    echo $this->Form->input('status_id', array('label' => false, 'options' => $statuses,
        'empty' => 'SELECIONE', 'class' => 'fill'));
    ?>
</div>
<div class="grid_2 prefix_9 bottom20">
    <?php 
    $options = array(
        'label' => '       ENVIAR       ',
        'class' => 'fill',
    );
    echo $this->Form->end($options);
    ?>
</div>

<script type="text/javascript">
    
    var options = {
            autoOpen: false,
            maxWidth: 700,
            maxHeight: 500,
            minHeight: 200,
            minWidth: 300,
            height: 400,
            width: 600,
            modal: true
    };
    
    $("div.popmod").each(function() {
            var dlg = $(this).dialog(options);
            $('#parecer' + $(this).attr("id")).click(function() {
                    dlg.dialog("open");
                    return false;
            });
    });
    
    $('.proj_list').addClass('active');
    $('.proj_list').siblings().removeClass('active');
</script>