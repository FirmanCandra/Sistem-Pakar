<?php

namespace Database\Seeders;

use App\Models\Plant;
use App\Models\Question;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Administrator', 'password' => 'admin123']
        );

        $plants = collect([
            ['name' => 'Sansevieria', 'latin_name' => 'Dracaena trifasciata', 'description' => 'Tanaman tegak yang tahan kondisi indoor dan populer sebagai penyaring udara.', 'care_instructions' => 'Gunakan media porous, hindari genangan air, dan bersihkan daun secara berkala.', 'watering_frequency' => '1-2 minggu sekali', 'light_requirement' => 'Rendah sampai terang tidak langsung', 'humidity_requirement' => 'Rendah sampai sedang', 'difficulty' => 'Mudah'],
            ['name' => 'ZZ Plant', 'latin_name' => 'Zamioculcas zamiifolia', 'description' => 'Tanaman daun mengilap yang sangat toleran terhadap cahaya rendah dan perawatan jarang.', 'care_instructions' => 'Letakkan di pot berdrainase baik dan siram hanya saat media kering.', 'watering_frequency' => '2-3 minggu sekali', 'light_requirement' => 'Rendah sampai sedang', 'humidity_requirement' => 'Rendah sampai sedang', 'difficulty' => 'Mudah'],
            ['name' => 'Spider Plant', 'latin_name' => 'Chlorophytum comosum', 'description' => 'Tanaman gantung ramah pemula dengan anakan menjuntai dan aman untuk rumah dengan hewan peliharaan.', 'care_instructions' => 'Simpan di cahaya tidak langsung dan pangkas daun kering.', 'watering_frequency' => '1 minggu sekali', 'light_requirement' => 'Sedang tidak langsung', 'humidity_requirement' => 'Sedang', 'difficulty' => 'Mudah'],
            ['name' => 'Boston Fern', 'latin_name' => 'Nephrolepis exaltata', 'description' => 'Pakis rimbun yang menyukai ruangan lembab dan memberi nuansa sejuk.', 'care_instructions' => 'Jaga media tetap lembab, semprot daun, dan hindari panas langsung.', 'watering_frequency' => '2-3 kali seminggu', 'light_requirement' => 'Sedang tidak langsung', 'humidity_requirement' => 'Tinggi', 'difficulty' => 'Menengah'],
            ['name' => 'Bamboo Palm', 'latin_name' => 'Chamaedorea seifrizii', 'description' => 'Palem indoor berdaun lembut untuk ruang besar dan suasana tropis.', 'care_instructions' => 'Berikan ruang tumbuh, cahaya terang tidak langsung, dan kelembaban cukup.', 'watering_frequency' => '1-2 kali seminggu', 'light_requirement' => 'Sedang sampai tinggi tidak langsung', 'humidity_requirement' => 'Sedang sampai tinggi', 'difficulty' => 'Menengah'],
            ['name' => 'Pothos', 'latin_name' => 'Epipremnum aureum', 'description' => 'Tanaman rambat yang mudah tumbuh dan cocok untuk pemula dengan budget terbatas.', 'care_instructions' => 'Biarkan media agak kering sebelum disiram dan pangkas sulur sesuai bentuk yang diinginkan.', 'watering_frequency' => '1 minggu sekali', 'light_requirement' => 'Rendah sampai sedang', 'humidity_requirement' => 'Sedang', 'difficulty' => 'Mudah'],
            ['name' => 'Aloe Vera', 'latin_name' => 'Aloe barbadensis miller', 'description' => 'Sukulen kecil yang hemat air dan cocok untuk ruang terbatas.', 'care_instructions' => 'Gunakan media kaktus, pot berdrainase, dan hindari penyiraman berlebihan.', 'watering_frequency' => '2 minggu sekali', 'light_requirement' => 'Rendah sampai terang', 'humidity_requirement' => 'Rendah', 'difficulty' => 'Mudah'],
            ['name' => 'Monstera', 'latin_name' => 'Monstera deliciosa', 'description' => 'Tanaman dekoratif berdaun besar berlubang yang kuat sebagai aksen utama ruangan.', 'care_instructions' => 'Sediakan ajir, lap daun, dan tempatkan di cahaya terang tidak langsung.', 'watering_frequency' => '1 kali seminggu', 'light_requirement' => 'Terang tidak langsung', 'humidity_requirement' => 'Sedang sampai tinggi', 'difficulty' => 'Menengah'],
            ['name' => 'Rubber Plant', 'latin_name' => 'Ficus elastica', 'description' => 'Tanaman berdaun tebal mengilap yang cocok untuk tampilan modern dan ruangan luas.', 'care_instructions' => 'Jaga media sedikit lembab, putar pot berkala, dan hindari perubahan tempat ekstrem.', 'watering_frequency' => '1 minggu sekali', 'light_requirement' => 'Sedang sampai tinggi tidak langsung', 'humidity_requirement' => 'Sedang', 'difficulty' => 'Menengah'],
            ['name' => 'Peace Lily', 'latin_name' => 'Spathiphyllum wallisii', 'description' => 'Tanaman berbunga putih yang menyukai kelembaban dan memberi kesan tenang.', 'care_instructions' => 'Siram saat daun mulai layu ringan dan jauhkan dari cahaya matahari langsung.', 'watering_frequency' => '1-2 kali seminggu', 'light_requirement' => 'Rendah sampai sedang', 'humidity_requirement' => 'Tinggi', 'difficulty' => 'Mudah'],
        ])->mapWithKeys(fn ($plant) => [$plant['name'] => Plant::updateOrCreate(['name' => $plant['name']], $plant)]);

        $questions = [
            'light' => ['Bagaimana intensitas pencahayaan ruangan?', ['sangat_rendah' => 'Sangat rendah', 'rendah' => 'Rendah', 'sedang' => 'Sedang', 'tinggi' => 'Tinggi']],
            'humidity' => ['Bagaimana tingkat kelembaban?', ['rendah' => 'Rendah', 'sedang' => 'Sedang', 'tinggi' => 'Tinggi']],
            'room_size' => ['Bagaimana ukuran ruangan?', ['sangat_kecil' => 'Sangat kecil', 'kecil' => 'Kecil', 'sedang' => 'Sedang', 'besar' => 'Besar']],
            'care' => ['Tingkat perawatan yang diinginkan?', ['minimal' => 'Minimal', 'sedang' => 'Sedang', 'tinggi' => 'Tinggi']],
            'temperature' => ['Bagaimana suhu ruangan?', ['dingin' => 'Dingin', 'sedang' => 'Sedang', 'hangat' => 'Hangat']],
            'airflow' => ['Bagaimana sirkulasi udara?', ['buruk' => 'Buruk', 'sedang' => 'Sedang', 'baik' => 'Baik']],
            'purpose' => ['Apa tujuan memiliki tanaman?', ['estetika' => 'Estetika', 'penyaring_udara' => 'Penyaring udara', 'relaksasi' => 'Relaksasi', 'hobi' => 'Hobi']],
            'experience' => ['Bagaimana pengalaman merawat tanaman?', ['pemula' => 'Pemula', 'menengah' => 'Menengah', 'mahir' => 'Mahir']],
            'budget' => ['Berapa budget?', ['rendah' => 'Rendah', 'sedang' => 'Sedang', 'tinggi' => 'Tinggi']],
            'pets' => ['Apakah memiliki hewan peliharaan?', ['ya' => 'Ya', 'tidak' => 'Tidak']],
        ];

        $questionModels = [];
        $optionModels = [];
        $sort = 1;
        foreach ($questions as $code => [$text, $options]) {
            $question = Question::updateOrCreate(['code' => $code], ['question_text' => $text, 'sort_order' => $sort++]);
            $questionModels[$code] = $question;

            $optionSort = 1;
            foreach ($options as $value => $label) {
                $optionModels[$code][$value] = $question->options()->updateOrCreate(
                    ['value' => $value],
                    ['label' => $label, 'sort_order' => $optionSort++]
                );
            }
        }

        $rules = [
            ['Rule 1', ['light' => 'sangat_rendah', 'care' => 'minimal'], ['Sansevieria', 'ZZ Plant']],
            ['Rule 2', ['pets' => 'ya'], ['Spider Plant', 'Boston Fern', 'Bamboo Palm']],
            ['Rule 3', ['experience' => 'pemula', 'budget' => 'rendah'], ['Pothos', 'Spider Plant', 'Aloe Vera']],
            ['Rule 4', ['purpose' => 'estetika', 'budget' => 'tinggi'], ['Monstera', 'Rubber Plant']],
            ['Rule 5', ['humidity' => 'tinggi', 'temperature' => 'sedang'], ['Peace Lily', 'Boston Fern']],
            ['Rule 6', ['room_size' => 'sangat_kecil', 'light' => 'rendah'], ['Sansevieria', 'Aloe Vera']],
            ['Rule 7', ['purpose' => 'penyaring_udara'], ['Sansevieria', 'Pothos', 'Peace Lily', 'Spider Plant']],
            ['Rule 8', ['experience' => 'mahir', 'care' => 'tinggi'], ['Boston Fern', 'Monstera']],
            ['Rule 9', ['light' => 'tinggi', 'room_size' => 'besar'], ['Monstera', 'Rubber Plant', 'Bamboo Palm']],
            ['Rule 10', ['humidity' => 'rendah', 'care' => 'minimal'], ['Sansevieria', 'ZZ Plant', 'Aloe Vera']],
            ['Rule 11', ['purpose' => 'relaksasi', 'experience' => 'pemula'], ['Peace Lily', 'Spider Plant', 'Pothos']],
            ['Rule 12', ['temperature' => 'hangat', 'humidity' => 'tinggi'], ['Monstera', 'Peace Lily', 'Boston Fern']],
            ['Rule 13', ['airflow' => 'buruk', 'care' => 'minimal'], ['Sansevieria', 'ZZ Plant']],
            ['Rule 14', ['budget' => 'tinggi', 'purpose' => 'hobi'], ['Monstera', 'Rubber Plant', 'Bamboo Palm']],
            ['Rule 15', ['room_size' => 'sangat_kecil', 'budget' => 'rendah'], ['Sansevieria', 'Aloe Vera', 'Spider Plant']],
        ];

        foreach ($rules as [$name, $conditions, $plantNames]) {
            $description = $this->ruleDescription($conditions, $questionModels, $optionModels);
            $rule = Rule::updateOrCreate(
                ['name' => $name],
                [
                    'description' => $description,
                    'plant_ids' => collect($plantNames)->map(fn ($plantName) => $plants[$plantName]->id)->values()->all(),
                ]
            );

            $rule->details()->delete();
            foreach ($conditions as $questionCode => $optionValue) {
                $rule->details()->create([
                    'question_id' => $questionModels[$questionCode]->id,
                    'question_option_id' => $optionModels[$questionCode][$optionValue]->id,
                ]);
            }
        }
    }

    private function ruleDescription(array $conditions, array $questions, array $options): string
    {
        $parts = [];
        foreach ($conditions as $questionCode => $optionValue) {
            $parts[] = $questions[$questionCode]->question_text.' '.$options[$questionCode][$optionValue]->label;
        }

        return 'Direkomendasikan karena '.implode(' dan ', $parts).'.';
    }
}
