<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Profile;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrmDemoSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $if = StudyProgram::updateOrCreate(['name' => 'Informatika']);
            $si = StudyProgram::updateOrCreate(['name' => 'Sistem Informasi']);

            $alya = Student::updateOrCreate(['nim' => '2026001'], [
                'name' => 'Alya', 'study_program_id' => $if->id,
            ]);
            $bima = Student::updateOrCreate(['nim' => '2026002'], [
                'name' => 'Bima', 'study_program_id' => $if->id,
            ]);
            $citra = Student::updateOrCreate(['nim' => '2026003'], [
                'name' => 'Citra', 'study_program_id' => $si->id,
            ]);

            Profile::updateOrCreate(['student_id' => $alya->id], [
                'phone' => '081200000001', 'address' => 'Palopo',
            ]);
            Profile::updateOrCreate(['student_id' => $bima->id], [
                'phone' => '081200000002', 'address' => 'Palopo',
            ]);

            $web = Course::updateOrCreate(['code' => 'WEB-A-26G'], [
                'name' => 'Pengembangan Web A', 'semester' => '2026 Ganjil',
            ]);
            $db = Course::updateOrCreate(['code' => 'BD-A-26G'], [
                'name' => 'Basis Data A', 'semester' => '2026 Ganjil',
            ]);
            Course::updateOrCreate(['code' => 'API-A-26G'], [
                'name' => 'Web Service A', 'semester' => '2026 Ganjil',
            ]);

            $alya->courses()->sync([
                $web->id => ['enrolled_at' => '2026-09-01'],
                $db->id => ['enrolled_at' => '2026-09-01'],
            ]);
            $bima->courses()->sync([
                $web->id => ['enrolled_at' => '2026-09-01'],
            ]);
            $citra->courses()->sync([]);
        });
    }
}