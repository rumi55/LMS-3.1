<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class R0D0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'r0d0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        Schema::disableForeignKeyConstraints();
        foreach ($tableNames as $name) {
            DB::table($name)->truncate();
        }
        Schema::enableForeignKeyConstraints();

        $path = storage_path('app/backup.sql');
        DB::unprepared(file_get_contents($path));
        echo now();
    }
}
