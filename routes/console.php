<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('iseed {table}', function ($table) {
	$data = DB::table($table)->get();
	$data = json_decode(json_encode($data), true);
	$arr = '[';
	foreach($data as $i => $datval):
		$arr .= "
			$i => [";
		foreach($datval as $key => $val):
			$val = str_replace('\\', '', $val);
			$arr .= "
				'$key' => '$val', ";
		endforeach;
		$arr .= "
			], ";
	endforeach;
	$arr .= '
		]';
	$classname = str_replace('_', '', title_case($table)) . 'TableSeeder';
	$filename = database_path('seeds/'. $classname . '.php');
	$content = '<?php

use Illuminate\Database\Seeder;

class %s extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = %s;
        \DB::table("%s")->delete();
        \DB::table("%s")->insert($users);
    }
}
';
	file_put_contents($filename, sprintf($content, $classname, $arr, $table, $table));
    $this->comment($classname . ' created successfully.');
})->describe('Create seeder of given table');





