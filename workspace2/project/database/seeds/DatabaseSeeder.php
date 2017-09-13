<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BoardTableSeeder::class);
        $this->call(FleaThTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(GoodsApplysTableSeeder::class);
        $this->call(SellerApplysTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(flea_accountsTableSeeder::class);
        $this->call(myshopTableSeeder::class);
        $this->call(seller_accountsTableSeeder::class);
        $this->call(LabAccountTableSeeder::class);
        $this->call(BlockPlanTableSeeder::class);
        $this->call(BoothTableSeeder::class);
        $this->call(FleamarketTableSeeder::class);
        $this->call(SurveyQuastionTableSeeder::class);
        $this->call(SurveyExampleTableSeeder::class);
        $this->call(SurveyAnswerTableSeeder::class);
        $this->call(RecommendBuyTableSeeder::class);
        $this->call(RecommendInfoTableSeeder::class);
        $this->call(ImageTableSeeder::class);
    }
}
