<?php
    $myTemplates = [
        'inputContainer' => '<div class="input-group mb-3">'.
                                '{{content}}'.
                                '<div class="input-group-append">'.
                                    '<div class="input-group-text">'.
                                        '<span class="fas {{fa_icon}}"></span>'.
                                    '</div>'.
                                '</div>'.
                            '</div>',
    ];
    $this->Form->setTemplates($myTemplates);
?>

<p class="login-box-msg">Para comenzar, favor inicie sesión.</p>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <?= $this->Form->control('username',[
        'label' => false,
        'type'  => 'text',
        'class' => 'form-control',
        'placeholder' => 'Nombre de usuario',
        'templateVars' => [
            'fa_icon' => 'fa-user'
        ]
    ]) ?>
    <?= $this->Form->control('password', [
        'label' => false,
        'type'  => 'password',
        'class' => 'form-control',
        'placeholder' => 'Contraseña',
        'templateVars' => [
            'fa_icon' => 'fa-lock'
        ]
    ]) ?>

    <!-- /.col -->
    <div class="col-12">
        <?= $this->Form->button('Entrar', ['class' => 'btn btn-primary btn-block']); ?>
    </div>
    <!-- /.col -->
    </div>
<?= $this->Form->end() ?>
