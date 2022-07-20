<?php

namespace Database\Seeders;

use App\Models\Periode;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $periode = array();
        $permintaan = array();

        for ($i = 1; $i <= 12; $i++) {
            $periode[] = [
                'nama_periode' => date('Y-m-d', strtotime('2018-' . $i . '-01')),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $periode[] = [
                'nama_periode' => date('Y-m-d', strtotime('2019-' . $i . '-01')),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $periode[] = [
                'nama_periode' => date('Y-m-d', strtotime('2020-' . $i . '-01')),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $periode[] = [
                'nama_periode' => date('Y-m-d', strtotime('2021-' . $i . '-01')),
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $periode[] = [
                'nama_periode' => date('Y-m-d', strtotime('2022-' . $i . '-01')),
            ];
        }

        $permintaan_2018 = [
            '151742',
            '190285',
            '132906',
            '125811',
            '139020',
            '176317',
            '153453',
            '125749',
            '125903',
            '128464',
            '78739',
            '87731',
        ];

        $produksi_2018 = [
            '101478',
            '100487',
            '53969',
            '38067',
            '68650',
            '1548',
            '17698',
            '26981',
            '0',
            '0',
            '36235',
            '62442',
        ];

        $impor_2018 = [
            '52866',
            '87434',
            '95194',
            '62728',
            '114862',
            '138669',
            '125294',
            '105702',
            '125596',
            '126370',
            '46772',
            '32189',
        ];

        $sisa_2018 = [
            '12629',
            '10313',
            '26402',
            '14947',
            '55966',
            '24877',
            '16281',
            '23693',
            '15932',
            '15546',
            '22090',
            '18259',
        ];

        $produksi_2019 = [
            '76088',
            '44499',
            '53651',
            '50683',
            '59991',
            '56684',
            '69975',
            '21301',
            '69373',
            '101706',
            '50299',
            '97714',
        ];

        $impor_2019 = [
            '101349',
            '137361',
            '90228',
            '77427',
            '115903',
            '87299',
            '116158',
            '88870',
            '85318',
            '109536',
            '63844',
            '72994',
        ];

        $permintaan_2019 = [
            '168763',
            '139246',
            '162513',
            '142653',
            '134134',
            '127073',
            '163883',
            '157944',
            '162185',
            '185946',
            '173347',
            '173422',
        ];

        $sisa_2019 = [
            '15439',
            '46530',
            '29559',
            '7514',
            '28385',
            '33345',
            '51688',
            '52138',
            '45866',
            '55648',
            '56796',
            '54014',
        ];

        $produksi_2020 = [
            '57805',
            '82869',
            '83131',
            '37644',
            '31285',
            '68344',
            '96289',
            '67896',
            '72912',
            '75260',
            '93512',
            '84321',
        ];

        $impor_2020 = [
            '61276',
            '66105',
            '77590',
            '140814',
            '122234',
            '69044',
            '93043',
            '86834',
            '76767',
            '79246',
            '29409',
            '58489',
        ];

        $permintaan_2020 = [
            '137072',
            '97923',
            '126132',
            '130854',
            '133743',
            '131966',
            '144794',
            '117055',
            '140980',
            '129438',
            '79945',
            '111651',
        ];

        $sisa_2020 = [
            '28283',
            '46511',
            '40229',
            '51643',
            '28964',
            '11362',
            '19926',
            '49040',
            '31982',
            '26377',
            '45485',
            '41289',
        ];

        \App\Models\Periode::insert($periode);

        for ($i = 1; $i <= 12; $i++) {
            $id_periode = Periode::where('nama_periode', '=', date('Y-m-d', strtotime('2018-' . sprintf("%02d", $i) . '-01')))->first()->id;

            $permintaan[] = [
                'id_periode' => $id_periode,
                'jumlah_permintaan' => $permintaan_2018[$i - 1],
                'jumlah_produksi' => $produksi_2018[$i - 1],
                'jumlah_impor' => $impor_2018[$i - 1],
                'jumlah_sisa' => $sisa_2018[$i - 1],
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $id_periode = Periode::where('nama_periode', '=', date('Y-m-d', strtotime('2019-' . sprintf("%02d", $i) . '-01')))->first()->id;

            $permintaan[] = [
                'id_periode' => $id_periode,
                'jumlah_permintaan' => $permintaan_2019[$i - 1],
                'jumlah_produksi' => $produksi_2019[$i - 1],
                'jumlah_impor' => $impor_2019[$i - 1],
                'jumlah_sisa' => $sisa_2019[$i - 1],
            ];
        }

        for ($i = 1; $i <= 12; $i++) {
            $id_periode = Periode::where('nama_periode', '=', date('Y-m-d', strtotime('2020-' . sprintf("%02d", $i) . '-01')))->first()->id;

            $permintaan[] = [
                'id_periode' => $id_periode,
                'jumlah_permintaan' => $permintaan_2020[$i - 1],
                'jumlah_produksi' => $produksi_2020[$i - 1],
                'jumlah_impor' => $impor_2020[$i - 1],
                'jumlah_sisa' => $sisa_2020[$i - 1],
            ];
        }

        \App\Models\Permintaan::insert($permintaan);

        $user = [
            [
                'nama' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('12345678'),
                'jabatan' => 'manager',
                'no_hp' => '0812345678',
            ],
            [
                'nama' => 'Kepala',
                'username' => 'kepala',
                'email' => 'kepala@gmail.com',
                'password' => bcrypt('12345678'),
                'jabatan' => 'kepala',
                'no_hp' => '0812345678',
            ],
        ];

        User::insert($user);
    }
}
