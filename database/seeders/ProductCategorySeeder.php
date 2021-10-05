<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $product;
    public $product_category;
    public $product_detail;

    public function __construct() {
        $this->product = new Product;
        $this->product_category = new ProductCategory;
        $this->product_detail = new ProductDetail;
    }
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $faker->addProvider(new \FakerRestaurant\Provider\id_ID\Restaurant($faker));
        
        for ($i=0; $i < 1000; $i++) { 
            $persen = $faker->numberBetween($min = 1, $max = 100);
            $code_produk = $faker->numerify('P###');
            $apa = $faker->randomElement(['makanan','minuman','susu','sayuran','buah','daging']) ;
            $makanan = $faker->foodName();
            switch ($apa) {
                case 'makanan':
                    $ct = $faker->foodName();
                    break;
                case 'minuman':
                    $ct = $faker->beverageName();
                    break;
                case 'susu':
                    $ct = $faker->dairyName();
                    break;
                case 'sayuran':
                    $ct = $faker->vegetableName();
                    break;
                case 'buah':
                    $ct = $faker->fruitName();
                    break;
                case 'daging':
                    $ct = $faker->meatName();
                    break;
            }
            
            // $saus = $faker->sauceName();
            // $makan = compact('makanan','minuman','susu','sayuran','buah','daging','saus');
            // dump($makan);

            // $pc = new ProductCategory;
            $pc = ProductCategory::firstOrCreate(
                ['name' => $ct],
                ['code' => $code_produk,]
            );

            // $pc->code = $code_produk;
            // $pc->name = $ct;
            // $pc->save();
            if($pc)
            {
                $pd = new ProductDetail;
                $pd->kalori = $persen;
                $pd->protein = $persen;
                $pd->karbohidrat = $persen;
                $pd->lemak = $persen;
                $pd->komposisi = $persen;
                $pd->save();
                $p = Product::firstOrCreate(
                    ['name' => $ct],
                    [
                        'category' => $apa,
                        'desc'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
                        'price' => $faker->numberBetween($min = 10000, $max = 100000),
                        'discount' => $faker->numberBetween($min = 1, $max = 50),
                        'product_detail_id' => $pd->id,
                        'product_category_id' =>  $pc->id,
                        ]
                );
            }
            
            

            // $p = new Product;
            

            // $p->name = $ct;
            // $p->category = $apa;
            // $p->desc = $faker->sentence($nbWords = 6, $variableNbWords = true);
            // $p->price = $faker->numberBetween($min = 10000, $max = 100000);
            // $p->discount = $faker->numberBetween($min = 1, $max = 50);
            // $p->product_detail_id = $pd->id;
            // $p->product_category_id =  $pc->id;
            // $p->save();
        }
        
        // $data = [
        //     ['name'=>'','code'=>'']
        // ]
    }
}