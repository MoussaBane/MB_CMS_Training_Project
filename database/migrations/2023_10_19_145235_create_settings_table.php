<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('settings_description');
            $table->string('settings_key');
            $table->text('settings_value');
            $table->string('settings_type');
            $table->integer('settings_must');
            $table->enum('settings_delete', ['0', '1']);
            $table->enum('settings_status', ['0', '1']);
            //Configuration of the de default values of timestamps
            $table->timestamp('created_at')->useCurrent(); // Set the 'created_at' to the current time 
            $table->timestamp('updated_at')->useCurrent(); // Set the 'updated_at' to the current time
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
