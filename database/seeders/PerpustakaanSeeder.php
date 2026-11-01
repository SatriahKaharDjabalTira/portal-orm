<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\MemberCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerpustakaanSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $prog = Category::updateOrCreate(['name' => 'Pemrograman']);
            $basis = Category::updateOrCreate(['name' => 'Basis Data']);
            Category::updateOrCreate(['name' => 'Jaringan']); // sengaja tanpa buku

            $php = Book::updateOrCreate(['code' => 'PHP-01'], [
                'title' => 'Dasar PHP', 'category_id' => $prog->id,
            ]);
            $lrv = Book::updateOrCreate(['code' => 'LRV-01'], [
                'title' => 'Laravel Praktis', 'category_id' => $prog->id,
            ]);
            Book::updateOrCreate(['code' => 'SQL-01'], [
                'title' => 'Belajar SQL', 'category_id' => $basis->id,
            ]);

            $dina = Member::updateOrCreate(['member_no' => 'M001'], ['name' => 'Dina']);
            $eko = Member::updateOrCreate(['member_no' => 'M002'], ['name' => 'Eko']);
            $fani = Member::updateOrCreate(['member_no' => 'M003'], ['name' => 'Fani']);

            MemberCard::updateOrCreate(['member_id' => $dina->id], [
                'card_number' => 'KRT-001', 'expires_at' => '2027-12-31',
            ]);
            MemberCard::updateOrCreate(['member_id' => $eko->id], [
                'card_number' => 'KRT-002', 'expires_at' => '2027-12-31',
            ]);
            // Fani sengaja belum punya kartu

            $dina->books()->sync([
                $php->id => ['status' => 'dipinjam', 'due_date' => '2026-11-15'],
                $lrv->id => ['status' => 'dipinjam', 'due_date' => '2026-11-15'],
            ]);
            $eko->books()->sync([
                $php->id => ['status' => 'kembali', 'due_date' => '2026-11-10'],
            ]);
            $fani->books()->sync([]);
        });
    }
}