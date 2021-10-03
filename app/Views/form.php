<?= $this->extend('master') ?>

<?= $this->section('content') ?>
    <div class="row my-auto" style="height: 100vh">
        <div class="col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4"></div>
        <div class="col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4 d-flex align-items-center" style="height: 100vh">
            <div class="card w-100">
            <?= $validation->listErrors() ?>
                <div class="card-body">
                    <h4 class="text-center bg-light p-2 mb-3">Tic-Tac-Toe Game</h4>
                    <form method="POST" action="/submit-names">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">First Player Name</label>
                            <input type="text" class="form-control" id="first_player_name" name="first_player_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Second Player Name</label>
                            <input type="text" class="form-control" id="second_player_name" name="second_player_name" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4"></div>
    </div>
<?= $this->endSection() ?>