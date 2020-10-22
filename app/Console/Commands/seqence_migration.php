<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class seqence_migration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seqence_migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php \n Drop all the table in db before execute the command.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $migrations = [ 
                        '2014_10_12_000000_create_users_table.php',
                        '2014_10_12_100000_create_password_resets_table.php',
                        '2019_08_19_000000_create_failed_jobs_table.php',
                        '2020_10_21_235825_tbl_restaurants.php',
                        '2020_10_21_235846_tbl_rest_category.php',
                        '2020_10_21_235548_tbl_branch.php',
                        '2020_10_21_234322_create_customer_table.php',
                        '2020_10_21_235603_tbl_cust_address.php',
                        '2020_10_21_235655_tbl_employee.php',
                        '2020_10_21_235803_tbl_offers.php',
                        '2020_10_21_235753_tbl_menu_category.php',
                        '2020_10_21_235742_tbl_menu.php',
                        '2020_10_21_235707_tbl_invoices.php',
                        '2020_10_21_235855_tbl_tables.php',
                        '2020_10_21_235813_tbl_order_list.php',
                        '2020_10_21_235727_tbl_invoices_order_relation.php',
                        '2020_10_21_235535_tbl_add_ons.php',

                    ];

        foreach($migrations as $migration)
        {
           $basePath = 'database/migrations/';          
           $migrationName = trim($migration);
           $path = $basePath.$migrationName;
           $this->call('migrate:refresh', [
            '--path' => $path ,            
           ]);
        }
    }
}
