<?php

use App\Eloquents\Brand;
use App\Eloquents\Project;
use App\Eloquents\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->truncate();
        $brand = new Brand;
        $brand->brand_name = 'patagonia';
        $brand->logo_path = 'https://cdn-ak.f.st-hatena.com/images/fotolife/S/SikisimaHisayuki/20170905/20170905123623.jpg';
        $brand->save();

        DB::table('projects')->truncate();
        Db::table('projects')->insert([
            [
                'name' => '環境と人にやさしいデニムをつくる',
                'caption' => '従来のコットンの栽培方法やデニムの製造方法を知ってしまった私たちは、業界を変えるべく奮起しています。パタゴニアのデニムはGMO（遺伝子組み換え）の種子、化学肥料、殺虫剤／除草剤を一切使用していない、オーガニックコットン100％素材で作られています。それらに革新的な染色処理を採用することにより、水とエネルギーと化学薬品の使用量と二酸化炭素の排出量を、従来のデニム染色工程に比べて大幅に削減することが可能になりました。さらに縫製はフェアトレード・サーティファイドの認証済みです。',
                'brand_id' => '1',
                'product_id' => '1'
            ],
            [
                'name' => '環境への負担が低い天然繊維ヘンプで最高の製品を…。',
                'caption' => '代替天然繊維であるヘンプは環境への負担が低い方法で栽培されます。灌漑や農薬および合成肥料を必要とせず、収穫と加工も手作業で行われます。地球上でもっとも丈夫な天然繊維のひとつで、リネンのような美しいドレープを描きます。残念なことに、ヘンプを産業用に栽培することはほぼ世界中で禁じられています。政府関連機関の大部分は依然としてヘンプを大麻と結びつけて考えているからです。パタゴニアは現在、中国から品質の高いヘンプを輸入していますが、ふたたび世界のどこででも自由にヘンプを栽培できる日がやってくることを願っています。',
                'brand_id' => '1',
                'product_id' => '2'
            ]
        ]);

        DB::table('project_images')->truncate();
        DB::table('project_images')->insert([
            [
                'path' => 'https://image.wwdjapan.com/production/optimize?src=https://s3-ap-northeast-1.amazonaws.com/src.wwdjapan.com/admin/v2/wp-content/uploads/2016/07/07024703/150730_ptgn_001.jpg',
                'caption' => '『デニムは汚いビジネスだから』',
                'project_id' => '1'
            ],
            [
                'path' => 'https://image.wwdjapan.com/production/optimize?src=https://s3-ap-northeast-1.amazonaws.com/src.wwdjapan.com/admin/v2/wp-content/uploads/2016/07/07024704/150730_ptgn_002.jpg',
                'caption' => '私たちはデニムの製造基準に関する問題解決にフォーカスしています。',
                'project_id' => '1'
            ],
            [
                'path' => 'https://image.wwdjapan.com/production/optimize?src=https://s3-ap-northeast-1.amazonaws.com/src.wwdjapan.com/admin/v2/wp-content/uploads/2016/07/07024704/150730_ptgn_003.jpg',
                'caption' => '従来のデニムは汚いビジネスだ。だから私たちはジーンズの製造方法を変えることにした。他の製造者たちが私たちのあとに続き、デニム業界を変える手助けとなることを期待している',
                'project_id' => '1'
            ],
            [
                'path' => 'https://www.patagonia.jp/dis/dw/image/v2/ABBM_PRD/on/demandware.static/-/Sites-patagonia-master/default/dw461f8d10/images/hi-res/56025_DDNM.jpg?sw=2000&sh=2000&sm=fit&sfrm=png',
                'caption' => '環境に優しいだけではいけない。手にとってもらうための美しさが必要だ。',
                'project_id' => '1'
            ],
            [
                'path' => 'https://media3.s-nbcnews.com/j/newscms/2018_50/2682811/181213-hemp-farm-se-721p_25fe521bff30f5573830316b820150ae.fit-2000w.jpg',
                'caption' => 'ヘンプは土壌を回復する効果もあります。',
                'project_id' => '2'
            ],
            [
                'path' => 'http://ja.ecofortex.com/Content/upload/2018239024/201801051319174818116.JPG',
                'caption' => '我々は、厳格な基準が満たされている素晴らしい工場が仲間です。',
                'project_id' => '2'
            ],
            [
                'path' => 'https://www.patagonia.jp/dis/dw/image/v2/ABBM_PRD/on/demandware.static/-/Sites-patagonia-master/default/dw105aae87/images/hi-res/52550_OPIC.jpg?sw=750&sh=750&sm=fit&sfrm=png',
                'caption' => '環境に優しいだけではいけない。手にとってもらうための美しさが必要だ。',
                'project_id' => '2'
            ],
            [
                'path' => 'https://www.patagonia.jp/dis/dw/image/v2/ABBM_PRD/on/demandware.static/-/Sites-patagonia-master/default/dw39ea6eec/images/hi-res/52550_OPIB_LS.jpg?sw=750&sh=750&sm=fit&sfrm=png',
                'caption' => '海上がりにヘンプ素材はピッタリです。',
                'project_id' => '2'
            ]
        ]);
    }
}
