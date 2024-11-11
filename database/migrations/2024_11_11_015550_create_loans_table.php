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
            $table->unsignedBigInteger('id');
            $table->foreignIdFor(Lab::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Subject::class)->default(1);
            $table->dateTime('effect_date');
            $table->dateTime('end_date');
            $table->boolean('repeat')->default(false);
            $table->foreignId('approval_by')->constrained('users', 'id');
            $table->text('report')->default('');
            $table->timestamps();

            $table->unique(['lab_id', 'id']);
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
