<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <strong>Detail Produk</strong>
                </div>

                <div class="card-body">
                    <?php if($produk->foto): ?>
                        <div class="text-center mb-3">
                            <img src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
                                 class="img-fluid rounded"
                                 style="max-height: 200px">
                        </div>
                    <?php endif; ?>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Nama:</strong> <?php echo e($produk->nama); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Harga Beli:</strong> Rp <?php echo e(number_format($produk->harga_beli)); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Harga Jual:</strong> Rp <?php echo e(number_format($produk->harga_jual)); ?>

                        </li>
                        <li class="list-group-item">
                            <strong>Stok:</strong> <?php echo e($produk->stok); ?>

                        </li>
                    </ul>
                </div>

                <div class="card-footer text-end">
                    <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $produk)): ?>
                        <a href="<?php echo e(route('produk.edit', $produk->id)); ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS\resources\views/produk/show.blade.php ENDPATH**/ ?>