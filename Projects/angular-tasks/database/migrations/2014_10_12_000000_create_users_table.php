<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 80);
            $table->string('surname', 80);
            $table->string('email',80)->unique();
            $table->string('phone',80)->unique();
            $table->boolean('gender');

            $table->text('api_token')->nullable();

            $table->tinyInteger('day');
            $table->string('month', 10);
            $table->smallInteger('year');

            $table->tinyInteger('status')->default(\App\Models\User::PENDING);
            $table->string('password', 80)->nullable();
            $table->boolean('is_admin')->default(0);
            $table->timestamps();


            $table->index(['name', 'surname']);
            $table->index('email');
            $table->index('phone');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
