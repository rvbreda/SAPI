<div class="grid_11 prefix_1">
    <?php echo "<h2> Pesquisador (a): " . $proposal[0]['User']['name'] . " " . $proposal[0]['User']['surname'] . "</h2>" ?>
</div>
<div class="grid_11 prefix_1">
    <?php echo "<h3> Projeto: " . $proposal[0]['Proposal']['description'] . " / Área: " . $proposal[0]['Area']['description'] . "</h3>" ?>
</div>

<div class="grid_11 prefix_1">
    Proposta:
</div>
<div class="grid_10 prefix_1 sufix_1 bottom20">
    <?php echo $proposal[0]['Proposal']['proposal'] ?>
</div>

<?php echo $this->Form->create('Proposal', array('controller' => 'proposals', 'action' => 'evaluate')); ?>
<?php
echo $this->Form->input('text_evaluation', array('div' => array(
        'class' => 'grid_10 prefix_1 sufix_1'
    ), 'class' => 'fill', 'type' => 'prop', 'rows' => 12, 'label' => array('text' => 'Avaliação', 'class' => 'required')));
?>
<div class="grid_10 prefix_1 sufix_1 omega">
    <select name="data[Proposal][evaluation_type]" class="fill required" id="ProposalEvaluation">
        <option value="">Selecione sua avaliação</option>
        <option value="APROVADA">APROVAR</option>
        <option value="REPROVADA">REPROVAR</option>
        <option value="REANALISE">REANÁLISE</option>
    </select>
</div>
<div class="grid_3 prefix_8">
    <?php
    $options = array(
        'label' => 'ENVIAR',
        'class' => 'grid_3 bottom20',
    );
    ?>
    <?php echo $this->Form->hidden('proposal_id', array('value' => $proposal[0]['Proposal']['id'])); ?>
    <?php echo $this->Form->hidden('proposal_user_evaluation_id', array('value' => $proposal[0]['ProposalUserEvaluation']['id'])); ?>
    <?php echo $this->Form->end($options); ?>
</div>
<script>

    $(document).ready(function(){
        $('#ProposalEvaluateForm').validate({
            rules: {
                "data[Proposal][text_evaluation]": "required",
                "data[Proposal][evaluation_type]": "required"
            },
            messages: {
                "data[Proposal][text_evaluation]": "Por favor preencha sua avaliação.",
                "data[Proposal][evaluation_type]": "Selecione sua avaliaçao."
            },                    
            errorClass: "error-message",
            highlight: function(element) {
                $(element).removeClass("error-message");
            }
        });
   });
	
</script>