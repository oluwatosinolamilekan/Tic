<?= $this->extend('master') ?>

<?= $this->section('content') ?>
    <div class="row my-auto" style="height: 100vh">
        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex align-items-center" style="height: 100vh">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="text-center bg-light p-2 mb-3">Tic-Tac-Toe Game</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">First Player</th>
                            <th scope="col">Second Player</th>
                            <th scope="col">Winner Player</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($users as $item):?>
                                <td><?= $item['first_player_name'] ?></td>
                                <td><?= $item['second_player_name'] ?></td>
                                <td><?= $item['winner'] ?></td>
                            <?php endforeach;?>
                            </tr>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
    </div>
<?= $this->endSection() ?>