<?php

use App\Models\Lab;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Lab::class);
            $table->foreignId('created_by')->constrained('users', 'id');
            $table->foreignIdFor(Subject::class)->default(1);
            $table->dateTime('effect_date')->default(now());
            $table->dateTime('end_date')->default(now()->addHour());
            $table->boolean('is_repeat')->default(false);
            $table->text('report')->default('Laporan Aktivitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
