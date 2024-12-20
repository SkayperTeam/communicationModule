<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Infrastructure\Persistence\Eloquent\WelcomeGroup\Models\WelcomeGroupFood;
use Infrastructure\Persistence\Eloquent\WelcomeGroup\Models\WelcomeGroupModifier;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('welcome_group_food_modifiers', static function (Blueprint $table) {
            $table->id();
            $table
                ->foreignIdFor(WelcomeGroupFood::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table
                ->foreignIdFor(WelcomeGroupModifier::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->unsignedBigInteger('external_id');
            $table->unsignedBigInteger('external_food_id');
            $table->unsignedBigInteger('external_modifier_id');
            $table->integer('weight');
            $table->integer('caloricity');
            $table->integer('price');
            $table->integer('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_group_food_modifiers');
    }
};
