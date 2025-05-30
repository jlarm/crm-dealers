<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dealer_email_templates', function (Blueprint $table) {
            $table->text('body')->change();
        });
    }

    public function down(): void
    {
        Schema::table('dealer_email_templates', function (Blueprint $table) {
            $table->string('subject')->change();
        });
    }
};
