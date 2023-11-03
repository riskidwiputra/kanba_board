<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Cards;
use App\Models\labels;
use App\Models\Lists;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $board = Board::factory()->create([
        //     'id_user' => User::first()->id
        // ]);

        // $collaborators = User::factory()->create();

        // $board->collaborators()->attach($collaborators->id);

        // $list1 = Lists::factory()->create([
        //     'name' => 'Backlog',
        //     'id_board' => $board->id,
        // ]);

        // $list2 = Lists::factory()->create([
        //     'name' => 'In Progress',
        //     'id_board' => $board->id,
        // ]);
    
        // $list3 = Lists::factory()->create([
        //     'name' => 'Success',
        //     'id_board' => $board->id,
        // ]);
        // $labele = labels::factory(3)->create();
        // $lists = Lists::all();

        // foreach ($lists as $list) {
        //     // Buat 5 kartu untuk setiap list
        //     $cardse = Cards::factory(5)
        //             ->create([
        //                 'id_list' => $list->id,
        //                  'id_label' => labels::inRandomOrder()->first()
        //             ]);

        //             $cardse->each(function ($card) {
        //                 // Dapatkan pengguna yang ingin Anda hubungkan (misalnya, secara acak)
        //                 $user = User::inRandomOrder()->first();
                
        //                 $card->assigns()->attach($user->id);
        //             });
        // }
    }
}
