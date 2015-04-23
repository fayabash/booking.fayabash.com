<div class="artists form">
    <?php echo $this->Form->create('Artist', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo __('Admin Add Artist'); ?></legend>
        <?php
        echo $this->Form->input('name', array('class' => 'form-control'));
        echo $this->Form->input('bio', array('class' => 'form-control'));
        echo $this->Form->input('links', array('class' => 'form-control'));
        ?>
        
        <p>
            exemple: [Nom du lien](http://google.com/)
        </p>
        
        <?php
        echo $this->element('Attachment/add', array(
            'settings' => array(
                'relations' => 'habtm',
                'maxsize' => 30, // 30MB
                'types' => array(
                    'image/jpeg',
                    'image/png',
                    'application/pdf',
                    'application/zip'
                )
            )
        ));
        ?>
    </fieldset>
    <hr>
    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
    <?php echo $this->Form->end(); ?>
</div>
