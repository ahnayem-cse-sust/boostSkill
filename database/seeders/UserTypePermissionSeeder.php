<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTypes = [
            ADMIN_TYPE_ADMIN,
            ADMIN_TYPE_MANAGER,
            ADMIN_TYPE_ACCOUNTANT,
            USER_TYPE_TEACHER,
            USER_TYPE_STUDENT
        ];

        $permissionTypes =[
            PERMISSION_TYPE_READ,
            PERMISSION_TYPE_CREATE,
            PERMISSION_TYPE_UPDATE,
            PERMISSION_TYPE_DELETE,
        ];

        $modulePermissions = [
            MODULE_NAME_ADMIN => [
                ADMIN_TYPE_ADMIN =>[
                    PERMISSION_TYPE_READ,
                    PERMISSION_TYPE_CREATE,
                    PERMISSION_TYPE_UPDATE,
                    PERMISSION_TYPE_DELETE
                ]
            ],
            MODULE_NAME_USER => [
                ADMIN_TYPE_ADMIN =>[
                    PERMISSION_TYPE_READ,
                    PERMISSION_TYPE_CREATE,
                    PERMISSION_TYPE_UPDATE,
                    PERMISSION_TYPE_DELETE
                    ],
                ADMIN_TYPE_MANAGER=>[
                    PERMISSION_TYPE_READ,
                    PERMISSION_TYPE_CREATE,
                    PERMISSION_TYPE_UPDATE,
                    PERMISSION_TYPE_DELETE
                ]
            ],
            MODULE_NAME_COURSE => [
                ADMIN_TYPE_ADMIN =>[
                    PERMISSION_TYPE_READ,
                    PERMISSION_TYPE_CREATE,
                    PERMISSION_TYPE_UPDATE,
                    PERMISSION_TYPE_DELETE
                    ],
                ADMIN_TYPE_MANAGER=>[
                    PERMISSION_TYPE_READ,
                    PERMISSION_TYPE_CREATE,
                    PERMISSION_TYPE_UPDATE,
                    PERMISSION_TYPE_DELETE
                ],
                USER_TYPE_TEACHER=>[
                    PERMISSION_TYPE_READ,
                ],
                USER_TYPE_STUDENT=>[
                    PERMISSION_TYPE_READ,
                ]
            ],

        ];

        foreach($modulePermissions as $moduleKey=>$module){
            foreach($module as $userTypeKey=>$userType){
                foreach($userType as $permission){
                    DB::table('user_type_permissions')->insert([
                        'user_type' => $userTypeKey,
                        'module_name' => $moduleKey,
                        'permission_type' => $permission,
                        'has_permission' => HAS_PERMISSION_YES
                    ]);
                }
            }
        }
        
        
    }
}
