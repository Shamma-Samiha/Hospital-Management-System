<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('specialty')->after('name');
            $table->text('visiting_days')->after('specialty'); // Store as JSON or comma-separated
            $table->string('qualification')->nullable()->after('visiting_days');
            $table->string('phone')->nullable()->after('qualification');
            $table->string('email')->nullable()->after('phone');
            $table->text('bio')->nullable()->after('email');
            $table->string('image')->nullable()->after('bio');
            $table->boolean('is_active')->default(true)->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'name', 'specialty', 'visiting_days', 'qualification', 
                'phone', 'email', 'bio', 'image', 'is_active'
            ]);
        });
    }
}
