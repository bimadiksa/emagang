<div class="modal fade" id="newPasswordModal" tabindex="-1" role="dialog" aria-labelledby="newPasswordModalLabel " aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPasswordModalLabel">Masukkan Password Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (isset($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('/newPassword') ?>" method="post">
                    <input type="hidden" name="user_id" value="">
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control <?= ($validation->hasError('new_password')) ? 'is-invalid' : '' ?>" id="new_password" name="new_password" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('new_password') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>