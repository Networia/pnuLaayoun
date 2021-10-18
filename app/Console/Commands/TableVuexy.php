<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TableVuexy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vuexy:crud {name} {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command of create vuexy table with controller and view , vuexy:crud {name} {path?}';

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

        $fullPathTo = app_path() . '\Http\Controllers\\' . $this->argument('path');
        $lastfile = app_path() . '\stubs\vuexy\controller.stub';
        $file = $fullPathTo.'\\'.ucfirst($this->argument('name')).'Controller.php';
        $nameSpace = 'App\Http\Controllers';

        //* Create controller

        if ( $this->argument('path')) {
            $nameSpace .=  '\\' . $this->argument('path');
        }

        if (!file_exists($fullPathTo)) {
            mkdir($fullPathTo, 0777, true);
        }

        if (!copy($lastfile, $file)) {
            $this->info("failed to copy $file...\n");
        }

        // $this->info('This file ::: '.$file);
        file_put_contents($file,str_replace(
            [
                '{{ControllerName}}','{{name}}','{{NameSpace}}'
            ],
            [
                ucfirst($this->argument('name')) , $this->argument('name') , $nameSpace
            ]
            ,file_get_contents($file)
        ));

        $this->info('* The Controller created');

        //* Create views
            //* Add
        $fullPathViewTo = resource_path('views\content\\'.$this->argument('path').'\\'.$this->argument('name'));
        $lastfileview = app_path() . '\stubs\vuexy\view_add.stub';
        $newviewfile = $fullPathViewTo.'\add.blade.php';

        if (!file_exists($fullPathViewTo)) {
            mkdir($fullPathViewTo, 0777, true);
        }

        if (!copy($lastfileview, $newviewfile)) {
            $this->info("failed to copy $newviewfile...\n");
        }

        file_put_contents($newviewfile,str_replace(
            [
                '{{name}}'
            ],
            [
                $this->argument('name')
            ]
            ,file_get_contents($newviewfile)
        ));

        $this->info('* The add view created');

        //* Edit
        $fullPathViewTo = resource_path('views\content\\'.$this->argument('path').'\\'.$this->argument('name'));
        $lastfileview = app_path() . '\stubs\vuexy\view_edit.stub';
        $newviewfile = $fullPathViewTo.'\edit.blade.php';

        if (!file_exists($fullPathViewTo)) {
            mkdir($fullPathViewTo, 0777, true);
        }

        if (!copy($lastfileview, $newviewfile)) {
            $this->info("failed to copy $newviewfile...\n");
        }

        file_put_contents($newviewfile,str_replace(
            [
                '{{name}}'
            ],
            [
                $this->argument('name')
            ]
            ,file_get_contents($newviewfile)
        ));

        $this->info('* The edit view created');

        //* Table
        $fullPathViewTo = resource_path('views\content\\'.$this->argument('path').'\\'.$this->argument('name'));
        $lastfileview = app_path() . '\stubs\vuexy\view_table.stub';
        $newviewfile = $fullPathViewTo.'\table.blade.php';

        if (!file_exists($fullPathViewTo)) {
            mkdir($fullPathViewTo, 0777, true);
        }

        if (!copy($lastfileview, $newviewfile)) {
            $this->info("failed to copy $newviewfile...\n");
        }

        file_put_contents($newviewfile,str_replace(
            [
                '{{name}}'
            ],
            [
                $this->argument('name')
            ]
            ,file_get_contents($newviewfile)
        ));

        $this->info('* The table view created');

        //* Table JS
        $fullPathViewTo = public_path('js\scripts\tables\\'.$this->argument('path'));
        $lastfileview = app_path() . '\stubs\vuexy\table.js.stub';
        $newviewfile = $fullPathViewTo.'\\'.$this->argument('name').'-table-datatables-advanced.js';

        if (!file_exists($fullPathViewTo)) {
            mkdir($fullPathViewTo, 0777, true);
        }

        if (!copy($lastfileview, $newviewfile)) {
            $this->info("failed to copy $newviewfile...\n");
        }

        file_put_contents($newviewfile,str_replace(
            [
                '{{name}}'
            ],
            [
                $this->argument('name')
            ]
            ,file_get_contents($newviewfile)
        ));

        $this->info('* The table js view created');
    }
}
