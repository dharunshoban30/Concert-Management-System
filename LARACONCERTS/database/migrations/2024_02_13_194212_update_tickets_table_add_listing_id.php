<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('listing_id')->after('user_id')->constrained()->onDelete('cascade');
            // Add any other necessary columns or modifications here
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropConstrainedForeignId('listing_id');
            // Revert any other changes made in the up method
        });
    }
};
