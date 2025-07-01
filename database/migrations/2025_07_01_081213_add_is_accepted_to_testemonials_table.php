<?php

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
        Schema::table('testemonials', function (Blueprint $table) {
            $table->boolean('is_accepted')->nullable()->after('image')->comment('Indicates if the testimonial is accepted by the admin');
            $table->timestamp('accepted_at')->nullable()->after('is_accepted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testemonials', function (Blueprint $table) {
            $table->dropColumn('is_accepted');
            $table->dropColumn('accepted_at');
        });
    }
};
