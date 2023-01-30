<main class="content">
    <?php
    renderTitle(
        'Relatório Gerencial',
        'Resumo das horas trabalhadas dos Funcionários',
        'icofont-chart-histogram'
    )
    ?>

    <div class="summary-boxes">
        <div class="sumarry-box bg-primary">
            <i class="icon icofont-users"></i>
            <p class="title">Qtde de Funcionários</p>
            <h3 class="value"><?= $activeUsersCount ?></h3>
        </div>
        <div class="sumarry-box bg-danger">
            <i class="icon icofont-patient-bed"></i>
            <p class="title">Faltas</p>
            <h3 class="value"><?= count($absentUsers) ?></h3>

        </div>
        <div class="sumarry-box bg-success">
            <i class="icon icofont-sand-clock"></i>
            <p class="title">Horas Trabalhadas no Mês</p>
            <h3 class="value"><?= $hoursInMonth ?></h3>
        </div>
    </div>

    <?php if (count($absentUsers) > 0) : ?>

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Faltosos do Dia!</h4>
                <p class="card-category mb-0">Relação dos Funcionários que ainda não bateram o ponto!</p>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <th>Nome:</th>
                    </thead>
                    <tbody>
                        <?php foreach ($absentUsers as $name) : ?>
                            <tr>
                                <td>
                                    <?= $name ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</main>