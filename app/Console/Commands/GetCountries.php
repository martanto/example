<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $url = 'https://restcountries.eu/rest/v2/all';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function country()
    {
        $countries = collect(Http::get($this->url)->json());
        $countries->transform(function($item, $key) {
            return [
                'name' => $item['name'],
                'code' => $item['alpha2Code'],
                'alpha_three_code' => $item['alpha3Code'],
                'currency_name' => $item['currencies'][0]['name'],
                'currency_code' => $item['currencies'][0]['code'] === '(none)' ? null : $item['currencies'][0]['code'],
                'currency_symbol' => $item['currencies'][0]['symbol'],
            ];
        });
        return $countries;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('countries')->insert($this->country()->toArray());
    }
}
