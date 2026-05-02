<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the Super Admin user and roles.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions for each resource
        $resources = [
            'setting', 'content_block', 'menu', 'page', 'slider',
            'category', 'product', 'product_variant', 'product_review',
            'order', 'order_tracking', 'address',
            'service', 'feature', 'timeline_event', 'certification',
            'partner', 'team_member', 'career', 'faq',
            'contact_message', 'testimonial', 'user', 'role',
        ];

        $actions = ['view_any', 'view', 'create', 'update', 'delete', 'restore', 'force_delete'];

        $permissions = [];
        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $permissions[] = "{$action}_{$resource}";
            }
        }

        // Add special permissions
        $permissions[] = 'view_activity_log';
        $permissions[] = 'export_data';

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);

        // Super Admin gets all permissions
        $superAdmin->syncPermissions(Permission::all());

        // Admin gets all except role/user management
        $adminPermissions = Permission::where('name', 'not like', '%_role')
            ->where('name', 'not like', '%force_delete%')
            ->get();
        $admin->syncPermissions($adminPermissions);

        // Editor gets view + create + update only (no delete)
        $editorPermissions = Permission::where('name', 'like', 'view%')
            ->orWhere('name', 'like', 'create%')
            ->orWhere('name', 'like', 'update%')
            ->get()
            ->reject(fn ($p) => str_contains($p->name, '_role') || str_contains($p->name, '_user'));
        $editor->syncPermissions($editorPermissions);

        // Create Super Admin user
        $user = User::firstOrCreate(
            ['email' => 'admin@ats.com'],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'password' => Hash::make('password'),
                'phone' => '+966500000000',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole('super_admin');

        $this->command->info('✅ Super Admin user created: admin@ats.com / password');
        $this->command->info('✅ Roles created: super_admin, admin, editor');
        $this->command->info('✅ ' . count($permissions) . ' permissions seeded.');
    }
}
