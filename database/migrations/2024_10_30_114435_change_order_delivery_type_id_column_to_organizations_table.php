<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('organization_settings', static function (Blueprint $table) {
            $table
                ->string('order_delivery_type_id')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};