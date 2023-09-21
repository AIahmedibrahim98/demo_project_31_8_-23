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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->integer('int_col');
            $table->bigInteger('big_int_col');

            $table->decimal('price_col',10,2);
            $table->float('float_col');
            $table->double('double_col');

            $table->date('date_col');
            $table->dateTime('dateTime_col');
            $table->year('year_col');
            $table->time('time_col');

            $table->string('name_col',150); // Varchar
            $table->char('mobile_col',15)->unique();

            $table->text('text_col');
            $table->mediumText('med_text_col');
            $table->longText('longText_col');

            $table->enum('role_col',['user','admin','instractor'])->default('admin');

            $table->boolean('active_col')->nullable(); // tinyint (1)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
