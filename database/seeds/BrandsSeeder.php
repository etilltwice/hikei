<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Eloquents\Brand::class, 10)->create()->each(
            function ($brand) {
                // ブランドユーザー作成
                factory(App\Eloquents\BrandUser::class, 10)->create([
                    'brand_id' => $brand->id
                ]);

                //プロダクトとプロジェクトの作成処理
                for ($i = 0; $i < 2; $i++) {
                    // プロダクト関連
                    $product = factory(App\Eloquents\Product::class, 1)
                        ->create([])
                        ->each(function ($product) {
                            factory(App\Eloquents\ProductImage::class, 2)->create([
                                'product_id' => $product->id
                            ]);
                        })->first();

                    // プロジェクト関連
                    factory(App\Eloquents\Project::class, 1)
                        ->create([
                            'brand_id' => $brand->id,
                            'product_id' => $product->id
                        ])->each(function ($project) {
                            factory(App\Eloquents\ProjectImage::class, 2)
                                ->create([
                                    'project_id' => $project->id,
                                ]);
                        });
                }
            }
        );

        // tempimages生成
        factory(App\Eloquents\TempImage::class, 10)->create();
    }
}
