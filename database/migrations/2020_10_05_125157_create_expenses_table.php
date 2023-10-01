<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exp_cat_id')->unsigned()->index();
            $table->foreign('exp_cat_id')->references('id')->on('expense_categories')->onDelete('cascade');
            $table->string('expense_reason');
            $table->string('slug');
            $table->float('amount', 10, 2);
            $table->date('expense_date');
            $table->string('expense_image')->nullable();
            $table->text('note')->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
