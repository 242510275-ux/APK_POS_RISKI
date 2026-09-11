<?php

namespace App\Policies;

use App\Models\Penjualan;
use App\Models\User;

class PenjualanPolicy
{
    public function delete(User $user, Penjualan $penjualan): bool
    {
        return $user->role
            && in_array($user->role->name, ['admin', 'kasir'])
            && $penjualan->status === 'OPEN';
    }

    public function view(User $user, Penjualan $penjualan): bool
    {
        return $user->role
            && $user->role->name === 'admin'
            && $penjualan->status === 'OPEN';
    }
}

