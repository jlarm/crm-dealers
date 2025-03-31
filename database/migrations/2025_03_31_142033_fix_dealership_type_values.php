<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('dealerships')
            ->where('type', 'Association')
            ->update(['type' => 'association']);

        DB::table('dealerships')
            ->where('type', 'Automotive')
            ->update(['type' => 'automotive']);

        DB::table('dealerships')
            ->where('type', 'RV')
            ->update(['type' => 'rv']);

        DB::table('dealerships')
            ->where('type', 'Motorsports')
            ->update(['type' => 'motorsports']);

        DB::table('dealerships')
            ->where('type', 'Maritime')
            ->update(['type' => 'maritime']);

        DB::table('dealerships')
            ->where('type', '')
            ->update(['type' => 'automotive']);
    }

    public function down(): void
    {
        DB::table('dealerships')
            ->where('type', 'association')
            ->update(['type' => 'Association']);

        DB::table('dealerships')
            ->where('type', 'Automotive')
            ->update(['type' => 'automotive']);

        DB::table('dealerships')
            ->where('type', 'RV')
            ->update(['type' => 'rv']);

        DB::table('dealerships')
            ->where('type', 'Motorsports')
            ->update(['type' => 'motorsports']);

        DB::table('dealerships')
            ->where('type', 'Maritime')
            ->update(['type' => 'maritime']);

        DB::table('dealerships')
            ->where('type', '')
            ->update(['type' => 'automotive']);
    }
};
