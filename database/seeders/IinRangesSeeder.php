<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IinRangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iin_ranges')->insert([
            'franchise' => 'American Express',
            'range_from' => '34',
            'range_to' => '34',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'American Express',
            'range_from' => '37',
            'range_to' => '37',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'China T Union',
            'range_from' => '31',
            'range_to' => '31',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'China UnionPay',
            'range_from' => '62',
            'range_to' => '62',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Diners Club International',
            'range_from' => '300',
            'range_to' => '305',
            'priority' => '3',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Diners Club International',
            'range_from' => '309',
            'range_to' => '309',
            'priority' => '3',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Diners Club International',
            'range_from' => '36',
            'range_to' => '36',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Diners Club International',
            'range_from' => '38',
            'range_to' => '39',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Diners Club United States & Canada',
            'range_from' => '54',
            'range_to' => '54',
            'priority' => '2',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Discover Card',
            'range_from' => '6011',
            'range_to' => '6011',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Discover Card',
            'range_from' => '622126',
            'range_to' => '622925',
            'priority' => '6',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Discover Card',
            'range_from' => '644',
            'range_to' => '649',
            'priority' => '3',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'UkrCard',
            'range_from' => '60400100',
            'range_to' => '60420099',
            'priority' => '8',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'RuPay',
            'range_from' => '6521',
            'range_to' => '6522',
            'priority' => '4',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'InterPayment',
            'range_from' => '636',
            'range_to' => '639',
            'priority' => '3',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'JBC',
            'range_from' => '3528',
            'range_to' => '3589',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Laser',
            'range_from' => '6304',
            'range_to' => '6304',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Laser',
            'range_from' => '6706',
            'range_to' => '6706',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Laser',
            'range_from' => '6771',
            'range_to' => '6771',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Laser',
            'range_from' => '6709',
            'range_to' => '6709',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro UK',
            'range_from' => '6759',
            'range_to' => '6759',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro UK',
            'range_from' => '676770',
            'range_to' => '676770',
            'priority' => '6',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro UK',
            'range_from' => '676774',
            'range_to' => '676774',
            'priority' => '6',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '5018',
            'range_to' => '5018',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '5020',
            'range_to' => '5020',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '5038',
            'range_to' => '5038',
            'priority' => '4',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '5893',
            'range_to' => '5893',
            'priority' => '4',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '6304',
            'range_to' => '6304',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '6759',
            'range_to' => '6759',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Maestro',
            'range_from' => '6761',
            'range_to' => '6763',
            'priority' => '4',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'Dankort',
            'range_from' => '5019',
            'range_to' => '5019',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Dankort',
            'range_from' => '4571',
            'range_to' => '4571',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Mir',
            'range_from' => '2200',
            'range_to' => '2204',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Mir',
            'range_from' => '2204',
            'range_to' => '2204',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'NPS Pridnestrovie',
            'range_from' => '6054740',
            'range_to' => '6054744',
            'priority' => '7',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Mastercard',
            'range_from' => '2221',
            'range_to' => '2720',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Mastercard',
            'range_from' => '51',
            'range_to' => '55',
            'priority' => '2',
        ]);


        DB::table('iin_ranges')->insert([
            'franchise' => 'Troy',
            'range_from' => '9',
            'range_to' => '9',
            'priority' => '1',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Troy',
            'range_from' => '6',
            'range_to' => '6',
            'priority' => '1',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa',
            'range_from' => '4',
            'range_to' => '4',
            'priority' => '1',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa Electron',
            'range_from' => '4026',
            'range_to' => '4026',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa Electron',
            'range_from' => '417500',
            'range_to' => '417500',
            'priority' => '6',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa Electron',
            'range_from' => '4506',
            'range_to' => '4508',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa Electron',
            'range_from' => '4844',
            'range_to' => '4844',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa Electron',
            'range_from' => '4913',
            'range_to' => '4913',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Visa Electron',
            'range_from' => '4917',
            'range_to' => '4917',
            'priority' => '4',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'UATP',
            'range_from' => '1',
            'range_to' => '1',
            'priority' => '1',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Verve',
            'range_from' => '506099',
            'range_to' => '506198',
            'priority' => '6',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'Verve',
            'range_from' => '650002',
            'range_to' => '650027',
            'priority' => '6',
        ]);

        DB::table('iin_ranges')->insert([
            'franchise' => 'LankaPay',
            'range_from' => '357111',
            'range_to' => '357111',
            'priority' => '6',
        ]);


    }
}
