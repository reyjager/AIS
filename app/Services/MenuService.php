<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class MenuService
{
    public static function getMenuItems()
    {
        return [
            [
                'title' => 'Dashboard',
                'icon' => 'bi-house',
                'url' => '/dashboard',
                'active' => ['dashboard'],
                'submenu' => null
            ],
            [
                'title' => 'User Account',
                'icon' => 'bi-person',
                'url' => '#userAccountSubmenu',
                'active' => ['profile', 'service'],
                'submenu' => [
                    [
                        'title' => 'My Profile',
                        'url' => '/profile',
                        'active' => ['profile']
                    ],
                    [
                        'title' => 'My Services',
                        'url' => '/services',
                        'active' => ['services']
                    ],
                    [
                        'title' => 'Admin Panel',
                        'url' => '/admin',
                        'icon' => 'fas fa-cogs',
                        'active' => ['admin*'],
                        'show' => Auth::user()->isAdmin ?? false
                    ]
                ]
            ],
            [
                'title' => 'User Management',
                'icon' => 'bi-people',
                'url' => '#userManagementSubmenu',
                'active' => ['users*', 'roles*'],
                'submenu' => [
                    [
                        'title' => 'User Profiles',
                        'url' => '/users',
                        'active' => ['users*']
                    ],
                    [
                        'title' => 'Account Services',
                        'url' => '/account-services',
                        'active' => ['account-services*']
                    ],
                    [
                        'title' => 'System Settings',
                        'url' => '/system-settings',
                        'icon' => 'fas fa-tools',
                        'active' => ['system-settings*'],
                        'show' => Auth::user()->isAdmin ?? false
                    ]
                ]
            ],
            [
                'title' => 'System Settings',
                'icon' => 'bi-gear',
                'url' => '/settings',
                'active' => ['settings*'],
                'submenu' => null
            ]
        ];
    }
}