<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Expression;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::firstOrCreate([
           'title' => 'Велосипед',
           'description' => 'Велосипе́д (стар. фр. vélocipède, от лат. vēlōx «быстрый» и pes «нога») — колёсное транспортное средство (или спортивный снаряд), приводимое в движение мускульной силой человека через ножные педали или (крайне редко) через ручные рычаги.',
           'price' => 444.99,
           'category_id' => rand(1,3),
           'created_at' => now(),
        ]);


        Product::firstOrCreate([
            'title' => 'Автомобиль',
            'description' => 'Автомоби́ль (от др.-греч. αὐτός — сам и лат. mobilis — подвижной, скорый) — моторное безрельсовое дорожное и/или внедорожное, чаще всего автономное, транспортное средство, используемое для перевозки людей и/или грузов, обычно имеющее не менее четырёх колёс.',
            'price' => 7888545,
            'category_id' => rand(1,3),
            'created_at' => now(),
        ]);

        Product::firstOrCreate([
            'title' => 'Матрас',
            'description' => 'Матра́с, матра́ц (от араб. матра — место, на которое что-либо кладут) — съёмный элемент кровати или дивана, обеспечивающий мягкое и тёплое место для лежания и сидения.',
            'price' => 25000,
            'category_id' => rand(1,3),
            'created_at' => now(),
        ]);

        Product::firstOrCreate([
            'title' => 'Бутылка',
            'description' => 'Буты́лка (от фр. bouteille, возможно, через пол. butelka) — ёмкость для долговременного хранения жидкостей, высокий сосуд преимущественно цилиндрической формы и с узким горлом, удобным для закупоривания пробкой. Большие бутылки иногда именуются бутыля́ми.',
            'price' => 199.99,
            'category_id' => 3,
            'created_at' => now(),
        ]);

        Product::firstOrCreate([
            'title' => 'Телевизор Sony 52UBRD',
            'description' => 'Телеви́зор — электронное устройство для приёма и отображения телевизионных программ, а также изображения и звука от устройств видеовоспроизведения.',
            'price' => 68000,
            'category_id' => 3,
            'created_at' => now(),
        ]);
    }
}
