<?php
namespace App\Filter;

use Illuminate\Support\Facades\Auth;
use TakiElias\Tablar\Menu\Filters\FilterInterface;

class RolePermissionMenuFilter implements FilterInterface
{
    public function transform($item)
    {
        return $this->isVisible($item) ? $item['header'] ?? $item : false;
    }

    protected function isVisible($item)
    {
        $user = Auth::user();

        // Verificar roles específicos
        $hasAnyRole = $item['hasAnyRole'] ?? null;

        // Ocultar el botón si el usuario tiene uno de los roles en hasAnyRole
        if ($hasAnyRole && $user->hasAnyRole($hasAnyRole)) {
            return false;
        }

        return $this->checkPermissions($item, $user) ?? true;
    }

    protected function checkPermissions($item, $user)
    {
        $hasAnyPermission = $item['hasAnyPermission'] ?? null;
        return $hasAnyPermission ? $user->hasAnyPermission($hasAnyPermission) : null;
    }
}


