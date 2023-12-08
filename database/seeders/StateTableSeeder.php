<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'id' => 1,
                'country_id'=> 229,
                'state_name' => 'Alabama'

            ],

            [
                'id' => 2,
                'country_id'=> 229,
                'state_name' => 'Alaska'

            ],

            [
                'id' => 3,
                'country_id'=>229,
                'state_name' => 'Arizona'

            ],
            [
                'id' => 4,
                'country_id'=>229,
                'state_name' => 'Arkansas'

            ],
            [
                'id' => 5,
                'country_id'=>229,
                'state_name' => 'California'

            ],
            [
                'id' => 6,
                'country_id'=>229,
                'state_name' => 'Colorado'

            ],
            [
                'id' => 7,
                'country_id'=>229,
                'state_name' => 'Connecticut'

            ],
            [
                'id' => 8,
                'country_id'=>229,
                'state_name' => 'Delaware'

            ],
            [
                'id' => 9,
                'country_id'=>229,
                'state_name' => 'District of Columbia'

            ],
            [
                'id' => 10,
                'country_id'=>229,
                'state_name' => 'Florida'

            ],
            [
                'id' => 11,
                'country_id'=>229,
                'state_name' => 'Georgia'

            ],
            [
                'id' => 12,
                'country_id'=>229,
                'state_name' => 'Hawaii'

            ],
            [
                'id' => 13,
                'country_id'=>229,
                'state_name' => 'Idaho'

            ],
            [
                'id' => 14,
                'country_id'=>229,
                'state_name' => 'Illinois'

            ],
            [
                'id' => 15,
                'country_id'=>229,
                'state_name' => 'Indiana'

            ],
            [
                'id' => 16,
                'country_id'=>229,
                'state_name' => 'Iowa'

            ],
            [
                'id' => 17,
                'country_id'=>229,
                'state_name' => 'Kansas'

            ],
            [
                'id' => 18,
                'country_id'=>229,
                'state_name' => 'Kentucky'

            ],
            [
                'id' => 19,
                'country_id'=>229,
                'state_name' => 'Louisiana'

            ],
            [
                'id' => 20,
                'country_id'=>229,
                'state_name' => 'Maine'

            ],
            [
                'id' => 21,
                'country_id'=>229,
                'state_name' => 'Maryland'

            ],
            [
                'id' => 22,
                'country_id'=>229,
                'state_name' => 'Massachusetts'

            ],
            [
                'id' => 23,
                'country_id'=>229,
                'state_name' => 'Michigan'

            ],
            [
                'id' => 24,
                'country_id'=>229,
                'state_name' => 'Minnesota'

            ],
            [
                'id' => 25,
                'country_id'=>229,
                'state_name' => 'Mississippi'

            ],
            [
                'id' => 26,
                'country_id'=>229,
                'state_name' => 'Missouri'

            ],
            [
                'id' => 27,
                'country_id'=>229,
                'state_name' => 'Montana'

            ],
            [
                'id' => 28,
                'country_id'=>229,
                'state_name' => 'Nebraska'

            ],
            [
                'id' => 29,
                'country_id'=>95,
                'state_name' => 'Andhra Pradesh'

            ],
            [
                'id' => 30,
                'country_id'=>95 ,
                'state_name' => 'Arunachal Pradesh '
            ],
            [
                'id' => 31,
                'country_id'=>95,
                'state_name' => 'Assam'

            ],
            [
                'id' => 32,
                'country_id'=>95,
                'state_name' => 'Bihar'

            ],
            [
                'id' => 33,
                'country_id'=>95,
                'state_name' => 'Chhattisgarh'

            ],
            [
                'id' => 34,
                'country_id'=>95,
                'state_name' => 'Goa'

            ],
            [
                'id' => 35,
                'country_id'=>95,
                'state_name' => 'Gujarat'

            ],
            [
                'id' => 36,
                'country_id'=>95,
                'state_name' => 'Haryana'

            ],
            [
                'id' => 37,
                'country_id'=>95,
                'state_name' => 'Himachal Pradesh'

            ],
            [
                'id' => 38,
                'country_id'=>95,
                'state_name' => 'Jharkhand'

            ],
            [
                'id' => 39,
                'country_id'=>95,
                'state_name' => 'Karnataka'

            ],
            [
                'id' => 40,
                'country_id'=>95,
                'state_name' => 'Kerala '

            ],
            [
                'id' => 41,
                'country_id'=>95,
                'state_name' => 'Madhya Pradesh'

            ],
            [
                'id' => 42,
                'country_id'=>95,
                'state_name' => 'Maharashtra'

            ],
            [
                'id' => 43,
                'country_id'=>95,
                'state_name' => 'Manipur'

            ],
            [
                'id' => 44,
                'country_id'=>95,
                'state_name' => 'Meghalaya'

            ],
            [
                'id' => 45,
                'country_id'=>95,
                'state_name' => 'Mizoram'

            ],
            [
                'id' => 46,
                'country_id'=>95,
                'state_name' => 'Nagaland'

            ],
            [
                'id' => 47,
                'country_id'=>95,
                'state_name' => 'Odisha'

            ],
            [
                'id' => 48,
                'country_id'=>95,
                'state_name' => 'Punjab'

            ],
            [
                'id' => 49,
                'country_id'=>95,
                'state_name' => 'Rajasthan'

            ],
            [
                'id' => 50,
                'country_id'=>95,
                'state_name' => 'Sikkim'

            ],
            [
                'id' => 51,
                'country_id'=>95,
                'state_name' => 'Tamil Nadu'

            ],
            [
                'id' => 52,
                'country_id'=>95,
                'state_name' => 'Telangana '

            ],
            [
                'id' => 53,
                'country_id'=>95,
                'state_name' => 'Tripura '

            ],
            [
                'id' => 54,
                'country_id'=>95,
                'state_name' => 'Uttar Pradesh'

            ],
            [
                'id' => 55,
                'country_id'=>95,
                'state_name' => 'Uttarakhand'

            ],
            [
                'id' => 56,
                'country_id'=>95,
                'state_name' => 'West Bengal '

            ],
            [
                'id' => 57,
                'country_id'=>95,
                'state_name' => ' Andaman and Nicobar Islands '

            ],
            [
                'id' => 58,
                'country_id'=>95,
                'state_name' => 'Chandigarh'

            ],
            [
                'id' => 59,
                'country_id'=>95,
                'state_name' => 'Dadra and Nagar Haveli and Daman and Diu (DNHDD)'

            ],
            [
                'id' => 60,
                'country_id'=>95,
                'state_name' => 'Delhi'

            ],
            [
                'id' => 61,
                'country_id'=>95,
                'state_name' => 'Jammu and Kashmir '

            ],
            [
                'id' => 62,
                'country_id'=>95,
                'state_name' => 'Ladakh  '

            ],
            [
                'id' => 63,
                'country_id'=>95,
                'state_name' => 'Lakshadweep'

            ],
            [
                'id' => 64,
                'country_id'=>95,
                'state_name' => 'Puducherry'

            ],
        ];

        foreach ($states as $state) {
            $current = DB::table('states')->where('id', $state['id'])->first();

            if (!$current) {
                State::insert($state);
            }
        }
    }
}
