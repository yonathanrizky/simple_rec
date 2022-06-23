<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table)
        {
            $table->id();
            $table->string('job_name');
            $table->text('description');
            $table->bigInteger('job_type_id');
            $table->bigInteger('job_qualification_id');
            $table->bigInteger('company_type_id');
            $table->float('sallary_min', 17, 2);
            $table->float('sallary_max', 17, 2);
            $table->boolean('activate')->default(true);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('day_process');
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
        Schema::dropIfExists('vacancies');
    }
}
