<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateLaratrustTables();

        $config = Config::get('laratrust_seeder.roles_structure');
        $region =  [
            "Dakar"=>[
              "Dakar"=>["Dakar", "Plateau", "Médina", "Fann", "Point E", "Mermoz"],
            ],
            "Diourbel"=>[
              "Bambey"=>["Bambey", "Diokoul", "Dianke Makha"],
              "Diourbel"=>["Diourbel", "Ndiaganiao", "Keur Massar"],
              "Mbacké"=>["Mbacké", "Darou Mousty", "Linguère"]
            ],
            "Fatick"=>[
              "Fatick"=>["Fatick", "Gossas", "Sokone"],
              "Foundiougne"=>["Foundiougne", "Djilor", "Passy"],
              "Gossas"=>["Gossas", "Gandiaye", "Niakhar"]
            ],
            "Kaolack"=>[
              "Guinguinéo"=>["Guinguinéo", "Koungheul", "Malem Hodar"],
              "Kaolack"=>["Kaolack", "Nioro du Rip", "Guinguinéo"],
              "Nioro du Rip"=>["Nioro du Rip", "Sindian", "Sagne"]
            ],
            "Kédougou"=>[
              "Kédougou"=>["Kédougou", "Salemata", "Bandafassi"],
              "Salémata"=>["Salémata", "Dialacoto", "Dindéfélo"],
              "Saraya"=>["Saraya", "Batoufam", "Mako"]
            ],
            "Kolda"=>[
              "Kolda"=>["Kolda", "Médina Yoro Foulah", "Vélingara"],
              "Médina Yoro Foulah"=>["Médina Yoro Foulah", "Dabo", "Sinthiou Bamambé"],
              "Vélingara"=>["Vélingara", "Djignaky", "Sare Bidji"]
            ],
            "Louga"=>[
              "Kébémer"=>["Kébémer", "Léona", "Keur Momar Sarr"],
              "Linguère"=>["Linguère", "Thiamène", "Yang-Yang"],
              "Louga"=>["Louga", "Kelle", "Dahra"]
            ],
            "Matam"=>[
              "Kanel"=>["Kanel", "Golléré", "Matam"],
              "Matam"=>["Matam", "Ourossogui", "Nguidjilone"],
              "Ranérou"=>["Ranérou", "Dodel", "Thilogne"]
            ],
            "Saint-Louis"=>[
              "Dagana"=>["Dagana", "Richard Toll", "Ross Bethio"],
              "Podor"=>["Podor", "Golléré", "Guédé"],
              "Saint-Louis"=>["Saint-Louis", "Mpal", "Ndiagne"]
            ],
            "Sédhiou"=>[
              "Bounkiling"=>["Bounkiling", "Saré Coly Sallé", "Sindian"],
              "Goudomp"=>["Goudomp", "Djibanar", "Séléty"],
              "Sédhiou"=>["Sédhiou", "Bambadiong"],
            ]
          
        ];
        $this->command->line($region==null);


        if ($config === null) {
            $this->command->error("The configuration has not been published. Did you run `php artisan vendor:publish --tag=\"laratrust-seeder\"`");
            $this->command->line('');
            return false;
        }

        if ($region === null) {
            $this->command->error("tu n'as pas bien fait");
            $this->command->line('');
            return false;
        }

        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = \App\Models\Role::firstOrCreate([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role ' . strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \App\Models\Permission::firstOrCreate([
                        'name' => $module . '-' . $permissionValue,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

                    $this->command->info('Creating Permission to ' . $permissionValue . ' for ' . $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            if (Config::get('laratrust_seeder.create_users')) {
                $this->command->info("Creating '{$key}' user");
                // Create default user for each role
                $user = \App\Models\User::create([
                    'name' => ucwords(str_replace('_', ' ', $key)),
                    'email' => $key . '@app.com',
                    'password' => bcrypt('password')
                ]);
                $user->attachRole($role);
            }
        }
        foreach ($region as $key => $modules) {

            // Create a new region
            $regio = \App\Models\Region::firstOrCreate([
                'nom' => $key,
            ]);
            $this->command->info('Creating Region ' . strtoupper($key));

            // Reading departement modules
            foreach ($modules as $module => $ville) {

                $depart = \App\Models\Departement::firstOrCreate([
                    'nom' => $module,
                    'region_id' => $regio->id,
                ]);

                $this->command->info('Creating Departement ' . $module);
                foreach ($ville as $v) {
                    $vi = \App\Models\Position::firstOrCreate([
                        'nom'=> $v,
                        'departement_id' => $depart->id,
                    ]);
                    $this->command->info('Creating Position ' . $v);
                }
            }
        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return  void
     */
    public function truncateLaratrustTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();

        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();

        if (Config::get('laratrust_seeder.truncate_tables')) {
            DB::table('roles')->truncate();
            DB::table('permissions')->truncate();

            if (Config::get('laratrust_seeder.create_users')) {
                $usersTable = (new \App\Models\User)->getTable();
                DB::table($usersTable)->truncate();
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
