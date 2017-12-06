<?php
use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
use App\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        // Ask for confirmation to refresh migration
        if ($this->command->confirm('Do you wish to refresh migration before seeding, Make sure it will clear all old data ?')) {
            $this->command->call('migrate:refresh');
            $this->command->warn("Data deleted, starting from fresh database.");
        }
        // Seed the default permissions
        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        $this->command->info('Default Permissions added.');
        // Ask to confirm to assign admin or user role
        if ($this->command->confirm('Create Roles for user, default is admin, editor, user and subscriber? [y|N]', true)) {
            // Ask for roles from input
            $roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,Editor,Author,Subscriber');
            // Explode roles
            $rolesArray = explode(',', $roles);
            // add roles
            foreach($rolesArray as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);
                if( $role->name == 'Admin' ) {
                    // assign all permissions to admin role
                    $role->permissions()->sync(Permission::all());
                    $this->command->info('Admin will have full rights');
                } else if ($role->name == 'Editor') {
                    // for Editors, give access to view only
                    $role->permissions()->sync(Permission::where('name', 'LIKE', 'view_%')->orWhere('name', 'LIKE', 'edit_%')->get());
                } else if ($role->name == 'Author') {
                    // for others, User access to view only
                    $role->permissions()->sync(Permission::where('name', 'LIKE', 'view_%')->orWhere('name', 'LIKE', 'edit_%')->get());
                } else {
                    // for others, no access to back end
                    $role->permissions()->sync(Permission::where('name', '=', 'subscriber')->get());
                }
                // create one user for each role
                $this->createUser($role);
            }
            $this->command->info('Roles ' . $roles . ' added successfully');
        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('By default, User role added.');
        }
      
    }
    /**
     * Create a user with given role
     *
     * @param $role
     */
    private function createUser($role)
    {
        if( $role->name == 'Admin' ) {
            $user = new User;
            $user->name = 'Rick Calder';
            $user->email = 'rick@calder.io';
            $user->password = Hash::make('secret');
            $user->remember_token = str_random(10);

            $user->save();
        } else {
            $user = factory(User::class)->create();
        }
        
        $user->assignRole($role->name);
        if( $role->name == 'Admin' ) {
            $this->command->info('Admin login details:');
            $this->command->warn('Username : '.$user->email);
            $this->command->warn('Password : "secret"');
        }
    }
    
}