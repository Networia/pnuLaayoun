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
    protected $signature = 'vuexy:table {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command of create vuexy table with controller and view';

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
        $file = $fullPathTo.'\TestController.php';
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
                ucfirst('test') , 'test' , $nameSpace
            ]
            ,file_get_contents($file)
        ));

        
    }
}
