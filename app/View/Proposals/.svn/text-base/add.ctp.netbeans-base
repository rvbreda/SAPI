<div class="grid_12">
    <h1>Formulário para submissão de propostas</h1>
</div>
<?php echo $this->Form->create('Proposal');?>
	<fieldset>
	<?php
	        echo $this->Form->hidden('user_id', array('value' => $current_user['id']));
		echo $this->Form->input('area_id', array('div' => array(
                    'class' => 'grid_6 prefix_3 sufix_3'
                ),'class' => 'fill', 'empty' => array('' => 'Selecione')));
                echo $this->Form->input('description', array('div' => array(
                    'class' => 'grid_6 prefix_3 sufix_3'
                ),'class' => 'fill','label' => 'Nome do Projeto'));
		echo $this->Form->input('proposal',array('div' => array(
                    'class' => 'grid_8 prefix_2 sufix_2'
                ),'class' => 'fill', 'type' => 'prop', 'rows' => 12, 'label' => 'Proposta'));
	?>
	</fieldset>
<div class="grid_3 prefix_7 bottom20">
    <?php
    $options = array(
        'label' => 'ENVIAR',
        'class' => 'grid_3',
        'div' => array('class' => 'fill')
    );?>
    <?php echo $this->Form->end($options); ?>
</div>
<script type="text/javascript">
    $('.prop_adicionar').addClass('active');
    $('.prop_adicionar').siblings().removeClass('active');
    
    $('#ProposalAddForm').validate({
            rules: {
                "data[Proposal][area_id]": "required",
                "data[Proposal][proposal]": "required",
                "data[Proposal][description]" : "required"
            },
            messages: {
                "data[Proposal][area_id]": "Selecione a área do seu projeto.",
                "data[Proposal][proposal]": "Por favor preencha o campo Proposta.",
                "data[Proposal][description]": "Por favor preencha o campo Nome do Projeto."
            },                    
            errorClass: "error-message",
            highlight: function(element) {
                $(element).removeClass("error-message");
            }
        });
</script>